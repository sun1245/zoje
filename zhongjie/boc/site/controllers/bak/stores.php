<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class stores extends MY_Controller
{
	public function index()
	{
    	// seo
		$data['header']=header_seoinfo(6,0);
		$data['header']['title']=$this->mcfg->get_config('site','title_suffix').'-'.'城市门店';

		// $IP = get_ip();
		$IP='121.41.128.239';
		$IP_data = get_adress_tb($IP);
		if (!(array_key_exists('region',$IP_data) && is_array($IP_data)))
		{
			$region = '';
			$city = '';
		} else {
			$region = trim($IP_data['region']);
			if ($IP_data['city'] == '')
			{
				$city = '';
			} else {
				$city = trim($IP_data['city']);
			}
		}
		$region_data = get_region('boc_city','id,yid,title');
		$city_parent_id = get_Simplify('boc_city','yid',array('title'=>$region));
		if (!empty($city_parent_id))
		{
			$city_data = get_Simplify('boc_city','id,yid,title',array('parent_id'=>$city_parent_id->yid),'1');
		}
		$dealer_data = get_dealer("c.title = '" . $city . "'");

		$data['region']=$region;
		$data['city']=$city;
		$data['city_data']=$city_data;
		$data['region_data']=$region_data;
		$data['dealer_data']=$dealer_data;

		$this->load->view('stores',$data);

	}



}