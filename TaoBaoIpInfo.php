<?php
	namespace mrfeng\ipinfo;
	/**
	* Tao Bao Ip Info
	* @author Mrfeng<https://github.com/MRfeng85>
	*/
	class TaoBaoIpinfo
	{
		public $url = 'http://ip.taobao.com/service/getIpInfo.php?ip=';
		
		public function getinfo($ip){
			$this->url .= $ip;
			$ch = curl_init($this->url);
			$ch = curl_setopt($ch,CURLOPT_ENCODING,'utf-8');
			$ch = curl_setopt($ch,CURLOPT_TIMEOUT,10);
			$ch = curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
			$resurl = curl_exec($ch);
			$resurl = json_decode($resurl);
			curl_close($ch);
			if($resurl->code) return "";
			return  $resurl->code?"":$resurl->data;
		}
	}
?>