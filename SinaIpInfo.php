<?php 
namespace mrfeng\ipinfo;
/**
* Sina ip info
* @param ip
* @return address
* @author MRfeng<https://github.com/MRfeng85>
*/
class SinaIpInfo
{
	public $url = 'http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip=';
	public function getinfo($ip){
		$this->url .= $ip;
		$ch = curl_init($this->url);
		curl_setopt($ch,CURLOPT_ENCODING,'utf8');
		curl_setopt($ch,CURLOPT_TIMEOUT,10);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		$resurl = curl_exec($ch);
		$resurl = json_decode($resurl);
		curl_close($ch);
		if($resurl===FALSE) return "";
		if(empty($resurl->desc)){
			$address = $resurl->province.$resurl->city.$resurl->district.$resurl->isp;
		}else{
			$address = $resurl->desc;
		}

		return $address;
	}
}
?>