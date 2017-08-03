<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dealer extends MY_Controller
{
	var $empty_html = "
	<li>
		<div class='msgSign'>
			<div class='contF'>
				<h4>暂无信息！</h4>
				<p class='addr'></p>
				<p class='tel'></p>
			</div>
		</div>
	</li>
	";

	protected function change_resion()
	{
		$id = intval($this->uri->segment(3,1));
		$html = '';
		if(!$id == '0')
		{
			$this->load->database();
			$city_data = get_Simplify('boc_city','id,yid,title',array('parent_id'=>$id),'1');
			foreach($city_data as $row)
			{
				$html .= "<option value='$row->yid'>$row->title</option>";
			}
		} else {
			$html = "<option value='0'>请选择</option>";
		}
		echo $html;
	}

	function jxs_resion()
	{
		$this->load->database();
		$city_id = intval($this->uri->segment(3,1));
		$type = $this->uri->segment(4,1);
		$sql = "select d.id,d.title,d.provinceid,d.cityid,d.address,d.lal,d.telphone,d.mobile from boc_city as c left join boc_dealer as d on c.yid = d.cityid where c.yid = '$city_id' AND d.audit = 1 AND d.show = 1 AND d.cid = 6";
		$dealer_data = $this->db->query($sql)->result();
		$this->printHtml($dealer_data,$type);
	}

	function dealer_resion()
	{
		$this->load->database();
		$this->load->helpers("url_helper");
		// url不支持英文字母获取。改获取字符串
		$url_str = uri_string(); 
		$url_array = explode("/",$url_str);

		$city_id = isset($url_array['2']) ? intval($url_array['2']): 0;
		$type = isset($url_array['3']) ? intval($url_array['3']): 0;
		$sql = "select d.id,d.title,d.provinceid,d.cityid,d.address,d.lal,d.telphone,d.mobile from boc_city as c left join boc_dealer as d on c.yid = d.cityid where c.yid = '$city_id' AND d.audit = 1 AND d.show = 1 AND d.cid = 6";
		$dealer_data = $this->db->query($sql)->result();
		$this->printHtml($dealer_data,$type);
	}

	function printHtml($dealer_data,$type)
	{
		if($type == '1')
		{
			$html = '';
			if(!empty($dealer_data['0']))
			{
				foreach($dealer_data as $row){
					$html .= "<option value='$row->id'>$row->title</option>";
				}
			} else {
				$html = "<option value='0'>请选择</option>";
			}
		} else {
			$html = '<ul>';
			if(!empty($dealer_data))
			{
				if(!$dealer_data[0]->id == '')
				{
					foreach($dealer_data as $row)
					{
						$html.= "
						<li data-id='$row->cityid"."_"."$row->id'>
							<div class='msgSign'>
								<div class='contF'>
									<h4>$row->title</h4>
									<p class='addr'>$row->address</p>
									<p class='tel'></p>
								</div>
							</div>
						</li>
						";
					}
				} else {
					$html .= $this->empty_html;
				}
			} else {
				$html .= $this->empty_html;
			}
			$html .= "</ul>";
		}
		echo $html;
	}

	function jxs_resion_map()
	{
		$this->load->helper('js');
		$this->load->database();
		$city_id = intval($this->uri->segment(3,0));
		$where = array('cityid'=>$city_id,'cid'=>6);
		$map_data = $this->db->select('id,title,address,lal,telphone,mobile')->get_where('dealer',$where)->result();
		echo js_encode(array('data'=>$map_data));
	}

	function dealer_resion_map()
	{
		$this->load->helper('js');
		$this->load->database();
		// url不支持英文字母获取。改获取字符串
		$url_str = uri_string(); 
		$url_array = explode("/",$url_str);

		$city_id = isset($url_array['2']) ? intval($url_array['2']): 0;
		$where = array('cityid'=>$city_id,'cid'=>6);
		$map_data = $this->db->select('id,title,address,lal,telphone,mobile')->get_where('dealer',$where)->result_array();
		echo js_encode(array('data'=>$map_data));
	}
}