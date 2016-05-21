<?php
	namespace mrfeng\ipinfo;
	/**
	* Tao Bao Ip Info
	* API(GET) http://ip.taobao.com/service/getIpInfo.php?ip=
	* Response information (JSON format) Country,Region,City,County,ISP
	* Return data format:
	* {"code":0,"data":{"ip":"210.75.225.254","country":"\u4e2d\u56fd","area":"\u534e\u5317","region":"\u5317\u4eac\u5e02","city":"\u5317\u4eac\u5e02","county":"","isp":"\u7535\u4fe1","country_id":"86","area_id":"100000","region_id":"110000","city_id":"110000","county_id":"-1","isp_id":"100017"}}
	* code:1 (Failed)  code:0 (success) 
	* @param  Ip
	* @return String Address
	* @author Mrfeng<https://github.com/MRfeng85>
	*/
	class TaoBaoIpinfo
	{
		public $url = 'http://ip.taobao.com/service/getIpInfo.php?ip=';

		public function getinfo($ip){
			$this->url .= $ip;
			$ch = curl_init($this->url);
			curl_setopt($ch,CURLOPT_ENCODING,'utf-8');
			curl_setopt($ch,CURLOPT_TIMEOUT,10);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
			$resurl = curl_exec($ch);
			$resurl = json_decode($resurl);
			curl_close($ch);
			$address = $resurl->data->country.$resurl->data->region.$resurl->data->city.$resurl->data->county.'('.$resurl->data->isp.')';
			return  $resurl->code?"":$address;
		}
	}
?>