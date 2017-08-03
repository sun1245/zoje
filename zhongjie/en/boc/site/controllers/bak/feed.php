<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class Feed extends MY_Controller 
 * @author 
 */
class Feed extends MY_Controller
{
	// $rssname 应该为 cid(栏目ID) 或 cid的英文别名
	public function index($rssname=false)
	{
		$this->load->library('Rss2');
		$this->rss2->set_xsl(site_url('feed/xsl'));

		// 取材文章 ，应传入cid 来($rssname)
		$this->load->model('article_model','ma');
		$list = $this->ma->get_list(10,0);
		$date = $list[0]['timeline'];

		// 设定头部
		$this->rss2->set_channel(
			'信息测试',               // title
			current_url(),            // url
			'简介',                   // description
			'所属权',                 // copyright
			date('D, d M Y H:i:s O',$date), // pubDate
			date('D, d M Y H:i:s O',$date), // lastBulidDate
			'zh-cn'                   // 可忽略
		);

		// 设定信息
		foreach ($list as $v){
			$this->rss2->item_add(
			$v['title'],              // title
			site_url('list/info/'.$v['id']),     // link
			date('D, d M Y H:i:s O',$v['timeline']), // pubDate
			'bocms',                // author
			$v['content']             // description or content
			);
		}

		// 输出
		header( $this->rss2->headers());
		echo $this->rss2->render();
	}

	public function xsl()
	{
		header('Content-Type: application/xslt');
		$data['feed_url'] = site_url('feed/index');
		$this->load->view('feed_xsl',$data);
	}
}
?>