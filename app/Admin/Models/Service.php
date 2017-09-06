<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use App\Admin\Models\Setting;

class Service extends Model
{
    private static $instance = null;
    /**
     * $method = 'RepFirstCost';
     * $paramsArr['sStartTime'] = '2017-09-01 00:00:00';//，开始时间，格式 YYYY-MM-DD HH:MM:SS
     * $paramsArr['sEndTime'] = '2017-09-02 00:00:00';//，结束时间
     *
    */
    
    /** 
     * object(stdClass)[314]
        public 'RecordCount' => int 9
        public 'Records' => 
            array (size=9)
            0 => 
                object(stdClass)[316]
                public 'uId' => string 'a4241470' (length=8)
                public 'uKey' => int 386993
                public 'betAmount' => int 1019925
                public 'betCount' => int 228
                public 'winTotal' => float -100260.8
            1 => 
                object(stdClass)[331]
                public 'uId' => string 'aaron1234' (length=9)
                public 'uKey' => int 397485
                public 'betAmount' => int 460
                public 'betCount' => int 65
                public 'winTotal' => float 351.9
            2 => 
                object(stdClass)[313]
                public 'uId' => string 'bage1' (length=5)
                public 'uKey' => int 76302
                public 'betAmount' => int 521
                public 'betCount' => int 39
                public 'winTotal' => int 483
            3 => 
                object(stdClass)[323]
                public 'uId' => string 'ella' (length=4)
                public 'uKey' => int 55494
                public 'betAmount' => int 846
                public 'betCount' => int 37
                public 'winTotal' => float -93.425
            4 => 
                object(stdClass)[333]
                public 'uId' => string 'gate01' (length=6)
                public 'uKey' => int 53152
                public 'betAmount' => int 4
                public 'betCount' => int 4
                public 'winTotal' => int 4
            5 => 
                object(stdClass)[329]
                public 'uId' => string 'jdaili1' (length=7)
                public 'uKey' => int 54392
                public 'betAmount' => float 265987.33
                public 'betCount' => int 152
                public 'winTotal' => float 146460.171
            6 => 
                object(stdClass)[330]
                public 'uId' => string 'renee' (length=5)
                public 'uKey' => int 386670
                public 'betAmount' => int 706
                public 'betCount' => int 55
                public 'winTotal' => float -166.88
            7 => 
                object(stdClass)[337]
                public 'uId' => string 'terry001' (length=8)
                public 'uKey' => int 386793
                public 'betAmount' => float 458.86
                public 'betCount' => int 72
                public 'winTotal' => float -1194.072
            8 => 
                object(stdClass)[334]
                public 'uId' => string 'testben' (length=7)
                public 'uKey' => int 386482
                public 'betAmount' => int 15
                public 'betCount' => int 5
                public 'winTotal' => float 1.02
        public 'PageIndex' => int 1
        public 'PageCount' => int 1
        public 'PageRecordCount' => int 20
        public 'PageAllRecordCount' => int 9
        public 'sFunc' => string 'RepFirstCost' (length=12)
        public 'Func' => string 'RepFirstCost' (length=12)
        public 'Result' => int 1
        public 'Desc' => string 'OK' (length=2)
     */
    /**
     * object(stdClass)[313]
        public 'RecordCount' => int 22
        public 'Records' => 
            array (size=22)
            0 => 
                object(stdClass)[315]
                public 'iGameId' => int 1
                public 'sGameName' => string '福彩3D' (length=8)
                public 'iCloseTimeSet' => int 300
                public 'fSingleBetMaxWin' => int 1000000
                public 'iEnable' => int 0
                public 'iStop' => int 0
                public 'iSort' => int 8
                public 'iGameParentId' => int 1
                public 'iClass1' => int 5
                public 'iClass2' => int 2
                public 'sShortDesc' => string '' (length=0)
            1 => 
                object(stdClass)[330]
                public 'iGameId' => int 2
                public 'sGameName' => string '排列三' (length=9)
                public 'iCloseTimeSet' => int 300
                public 'fSingleBetMaxWin' => int 1000000
                public 'iEnable' => int 0
                public 'iStop' => int 0
                public 'iSort' => int 9
                public 'iGameParentId' => int 2
                public 'iClass1' => int 5
                public 'iClass2' => int 2
                public 'sShortDesc' => string '' (length=0)
            2 => 
                object(stdClass)[312]
                public 'iGameId' => int 3
                public 'sGameName' => string '上海时时乐' (length=15)
                public 'iCloseTimeSet' => int 30
                public 'fSingleBetMaxWin' => int 1000000
                public 'iEnable' => int 0
                public 'iStop' => int 0
                public 'iSort' => int 100
                public 'iGameParentId' => int 3
                public 'iClass1' => int 1
                public 'iClass2' => int 1
                public 'sShortDesc' => string '' (length=0)
            3 => 
                object(stdClass)[322]
                public 'iGameId' => int 4
                public 'sGameName' => string '天津时时彩' (length=15)
                public 'iCloseTimeSet' => int 60
                public 'fSingleBetMaxWin' => int 1000000
                public 'iEnable' => int 0
                public 'iStop' => int 0
                public 'iSort' => int 100
                public 'iGameParentId' => int 4
                public 'iClass1' => int 1
                public 'iClass2' => int 1
                public 'sShortDesc' => string '' (length=0)
     */

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
        
        $method = 'RepFirstCost';
        $paramsArr['sStartTime'] = '2017-09-01 00:00:00';//，开始时间，格式 YYYY-MM-DD HH:MM:SS
        $paramsArr['sEndTime'] = '2017-09-02 00:00:00';//，结束时间
        
        $url = $this->SERV_WEB_URL_ROOT.':9998/'.$method.'/';
        // $paramsArr['From'] = 1;
        // $paramsArr['CurUserKey']='' ;
        // $paramsArr['CurPassword']='';
        // $paramsArr['IP']=  self::getIp();
        // $paramsArr['FromBrowser']= self::getAgentInfo();
        // $paramsArr['TimeStap']=time();
        // $paramsArr['sCorpCode']= $this->CORP_CODE;
        // $paramsArr['CurTime']= date('YmdHis');

        

        if(!$this->checkData($paramsArr)){
            return json_decode(json_encode(array('Result'=>false,'Desc'=>'传输的字符串过长或未通过安全检查！')),false);
        }
        $this->sort($paramsArr);
        //var_dump($paramsArr);
        $paramsArr['Token']=$this->getToken($paramsArr);
        //dd([$url, $paramsArr]);
       // var_dump($url);die;
        $return_str = $this->post($url,$paramsArr);
        dd( json_decode(trim($return_str)));die;
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
            var_dump($url);
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
        //$paramStr = @preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $paramStr);
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