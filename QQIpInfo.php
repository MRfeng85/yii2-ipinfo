<?php 
namespace mrfeng\ipinfo;
/**
* QQ ip share
* @param ip
* @return address
* @author MRfeng<https://github.com/MRfeng85>
*/
class QQIpInfo
{
	
	public $url = 'http://ip.qq.com/cgi-bin/searchip?searchip1=';

	public function getinfo($ip){
		$this->url .=$ip;
		$ch = curl_init($this->url);
		curl_setopt($ch,CURLOPT_ENCODING,'gb2312');
		curl_setopt($ch,CURLOPT_TIMEOUT,10);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		$resurl = curl_exec($ch);
		$resurl = mb_convert_encoding($resurl,'utf-8','gb2312');//Code conversion
		curl_close($ch);
		preg_match("@<span>(.*)</span></p>@iU",$resurl,$ipArray);//Format page code
		return $ipArray[1];
	}

}

?>