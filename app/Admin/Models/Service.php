<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use App\Admin\Models\Setting;

class Service extends Model
{
    private static $instance = null;
 

    public function __construct() 
    {

        $this->configAry = Setting::getGlobalSetting();
        //dd($this->configAry);
        //define('SERV_WEB_URL_ROOT', $this->configAry['remoteAddress']);
        //define('CORP_CODE', $this->configAry['corp_code']);//盘口ID
        //define('MD5_KEY', md5($this->configAry['secretKey']));
        //define('SERV_TOKEN', $configAry['token']);
        $this->SERV_WEB_URL_ROOT = $this->configAry['remoteAddress'];
        $this->CORP_CODE = $this->configAry['corp_code'];
        $this->MD5_KEY = md5($this->configAry['secretKey']);
        $this->SERV_TOKEN = $this->configAry['token'];
        //$username = 'caizhu';
        //$userModel = Model('fUser');
        //dd($this->MD5_KEY);
        // $paramsArr
        //$inData = array('sUserID'=>$username,'sPassword'=>md5('123456'.MD5_KEY));
        //$result = $userModel->canLogin($inData);
        //$result = $userModel->canLogin(array('sUserID'=>$_POST['username'],'sPassword'=>md5($_POST['passwd'].MD5_KEY)));

        
    }

    public static function getInstance() {
        if (self::$instance === null || !(self::$instance instanceof Service)) {
            self::$instance = new Service ();
        }
        return self::$instance;
    }
    /**
    * 取得IP
    * @return string 字符串类型的返回结果
    */
    function getIp($isProxyPass = true) {
        static $ip = null;
        //return '61.216.144.186';
        if (!is_null($ip)) {
            return $ip;
        }
        if (!empty($_SERVER['HTTP_X_REAL_IP'])) {
            $ip = $_SERVER['HTTP_X_REAL_IP'];
            if (!empty($ip)) {
                return $ip;
            }
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
            if (!empty($ip)) {
                return $ip;
            }
            if ($_SERVER['HTTP_CLIENT_IP'] && $_SERVER['HTTP_CLIENT_IP'] != 'unknown') {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif ($_SERVER['HTTP_X_FORWARDED_FOR'] && $_SERVER['HTTP_X_FORWARDED_FOR'] != 'unknown') {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            if(strlen($ip)>15){
                return '';
            }
            
            return preg_match('/^\d[\d.]+\d$/', $ip) ? $ip : '';
        }
    }

    /**
     * 获取访客agent信息
     * @return string
     */
    function getAgentInfo() {
        //return 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.4 (KHTML, like Gecko) Chrome/22.0.1229.94 Safari/537.4';
        $agent = $_SERVER['HTTP_USER_AGENT'];
        if (empty($agent)) {    //当浏览器没有发送访问者的信息的时候
            return '';
        }
        if(strlen($agent) > 64){
            return '';
        }
        return $agent;
    }
    
    public function webPostInvokeIDollService($method, $paramsArr = array(), $returnArrayType = false) {
        $url = $this->SERV_WEB_URL_ROOT.':9998/'.$method.'/';
        $paramsArr['From'] = 1;
        $paramsArr['CurUserKey']='' ;
        $paramsArr['CurPassword']='';
        $paramsArr['IP']=  self::getIp();
        $paramsArr['FromBrowser']= self::getAgentInfo();
        $paramsArr['TimeStap']=time();
        $paramsArr['sCorpCode']= $this->CORP_CODE;
        $paramsArr['CurTime']= date('YmdHis');
        if(!$this->checkData($paramsArr)){
            return json_decode(json_encode(array('Result'=>false,'Desc'=>'传输的字符串过长或未通过安全检查！')),false);
        }
        $this->sort($paramsArr);
        //var_dump($paramsArr);
        $paramsArr['Token']=$this->getToken($paramsArr);
        dd([$url, $paramsArr]);
       // var_dump($url);die;
        $return_str = $this->post($url,$paramsArr);
        dd(var_dump( json_decode(trim($return_str))));die;
        $returnData = $returnArrayType == true ? json_decode(trim($return_str), true) : json_decode(trim($return_str));
       //var_dump($returnData);exit;
        // if(!$returnArrayType){
        //     if(property_exists($returnData, 'CorpStatus')){
        //         capError($returnData,1);
        //     }
        // }else{
        //     if(isset($returnData['CorpStatus'])){
        //         capError($returnData,2);
        //     }
        // }
        //var_dump($return_str);exit;
       //Log::record($method.json_encode($paramsArr));
        return $returnData;
    }
    
    //获取服务端返回数据
    // public function invokeIDollServiceWithoutEncrypt($url, $method, $paramsArr = array(), $returnArrayType = false) {
    //     $webBaseObj = WebBase::getInstance();
    //     $currUrl = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    //     $currentUserId = $_SESSION['login_id'];
    //     $arrayHeader = array('CurUserID' => $currentUserId ? $currentUserId : '', 'IP' => getIp(), 'FromUrl' => $currUrl, 'FromBrowser' => getAgentInfo(), 'FromOS' =>  getCustomerName());
    //     $paramsArr = array_merge($paramsArr, $arrayHeader);
    //     $paramsArr = json_encode($paramsArr, JSON_UNESCAPED_UNICODE);
    //     $response = $webBaseObj->requestData($url, $method, $paramsArr);
    //     //$responseJson = $desObj->decrypt($response, DECRYPT_CODE);
    //     $result = $returnArrayType == true ? json_decode(trim($response), true) : json_decode(trim($response));
    //     return $result;
    // }
    private function post($url,$param){
        $curl = curl_init();
        $ip = self::getIp();
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("X-Forwarded-For: $ip"));
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("HTTP_X_REAL_IP: $ip"));
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_NOBODY, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_TIMEOUT,130);  //超时间
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($param));
        //记录时间
        $startTime=time();
        $result = curl_exec($curl);
        curl_close($curl);
        $endTime = time();
        if($endTime - $startTime > 1){
           // Log::record('慢日志'.$url);
        }
        return $result;
    }
    public function getToken($inData = array()) {
        $paramStr = '';
        //var_dump($inData);
        foreach ($inData as $key => $val) {
            if (is_array($val)) {//数组
            //exit("aaa");
                $paramStr .= json_encode($val);
            } else {
                $paramStr .= $val;
            }
        }
        var_dump($paramStr);
        $paramStr = @preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $paramStr);
        //var_dump($paramStr);die;
        //$paramStr = @preg_replace("#\\\u([0-9a-f]{4})#i", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $paramStr);
        $paramStr .= $this->SERV_TOKEN;
        return md5($paramStr);
    }

    private function sort(&$inData) {
        //整理数组
        $tmpData = array();
        foreach ($inData as $key=>$val) {
            $tmpKey = strtolower($key);
            $tmpData[$tmpKey]['key'] = $key;
            $tmpData[$tmpKey]['val'] = $val;
        }
        ksort($tmpData);
        //重新组装
        $inData = array();
        foreach ($tmpData as $item) {
            $inData[$item['key']] = $item['val'];
        }
    }
    
    private function checkData(&$inData){
        //return true;
        if(!is_array($inData)){
            return false;
        }
        foreach($inData as $key=>$val){
            if(is_array($val)){
                $this->checkData($val);
            }else{
                 if(in_array($key, array('TOP','PageIndex','PageRecordCount'))){
                        $val = (int) $val;
                    }
                 else if(in_array($key,array('FromBrowser','sBetCode','BetKeyList','sGamePeriodList'))){//撤单的skey连表可能1000多个字符。
                        if(strlen($val) > 1200){
                           return false;
                        }
                    }
                else if(in_array($key,array('sEndOpenTime','sStartOpenTime','sOrderByField','sOrderByValue'))){
                     if(strlen($val) > 20){
                            return false;
                        }
                }
                else if(strlen($val) > 64) {
                           return false;
                       }
                   if (preg_match('/select|insert|update |delete |union|into|load_file|outfile|\'|declare|reverse|\;|script|ifram/i', $val)) {//过滤sql注入关键字
                       return false;
                    }
                    
               $inData[$key]=str_replace("\'", "''", trim(addslashes($val)));   
            }
        }
        return true;
    }
}