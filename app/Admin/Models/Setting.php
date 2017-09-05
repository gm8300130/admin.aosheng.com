<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public static function getGlobalSetting() {
        // $cache = Cache::getInstance('file');
        // $cacheKey =  DOMAIN.'_globalSet';
        // $outData = $cache->get($cacheKey);
        // if (empty($outData)) {
            // $res=$this->webInvoke('',array('domain'=>DOMAIN));//TODO BY SEVEN调中间件取配置
            $outData = array(
                'remoteAddress' => '119.9.124.151',
                'tplPath' => '500vip',
                'siteName'=>'500VIP彩票网',
                'secretKey'=>'bf48241adc63a8b4d54a14b0cec6ddc8',
                'cacheHost'=>'redis',
                'cachePort'=>'6379',
                'cachePwd'=>'ZTU59eN8Wt69',
                'token'=>'3cbbbc5ff11b4d418d7a9b7c394c78a8',
                'corp_code'=>'ysc'
                );
            //$cache->set($cacheKey, $outData); //设置缓存
        //}
       if (empty($outData['remoteAddress']) || empty($outData['tplPath'])||empty($outData['secretKey'])||empty($outData['cacheHost'])) {//未配置必要参数
            exit;
        }
        return $outData;
    }

}