<?php 
/**
 * Class Rss2 
 * @author 
 */
class Rss2 
{
	public $xsl ;
	public $channel = array();
	public $items = array();

	/**
	 * @brief 设定 xsl
	 * @param $xsl
	 * @return 
	 */
	public function set_xsl($xsl)
	{
		$this->xsl = $xsl;
	}
	

	public function set_channel($title,$link,$description,$copyright,$pubDate,$lastBulidDate,$language='zh-cn')
	{

		$channel = array();
		$this->_set_attribute($channel,'title',$title);
		$this->_set_attribute($channel,'link',$link);
		$this->_set_attribute($channel,'description',$description);
		$this->_set_attribute($channel,'copyright',$copyright);
		$this->_set_attribute($channel,'pubDate',$pubDate);
		$this->_set_attribute($channel,'lastBuildDate',$lastBulidDate);
		$this->_set_attribute($channel,'language',$language);
		$this->_set_attribute($channel,'generator','rss 2.0');
		$this->channel = $channel;
	}
	
	public function item_add($title,$link,$pubDate,$author,$description){
		$item = array();
		$this->_set_attribute($item,'title',$title);
		$this->_set_attribute($item,'link',$link);
		$this->_set_attribute($item,'pubDate',$pubDate);
		$this->_set_attribute($item,'author',$author);
		$this->_set_attribute($item,'description',$description);
		array_push($this->items,$item);
	}


	/**
	 * @brief 添加节点内容
	 *
	 * @param $obj channel or item
	 * @param $key
	 * @param $value
	 * @param $attributes  attr="val"
	 *
	 * return $obj
	 */
	public function _set_attribute(&$obj, $key, $value, $attributes=false)
	{
		if ($attributes) {
			$obj[$key.' '.$attributes] = $value;
		}else{
			$obj[$key] = $value;
		}
		return $obj;
	}
	
	public function headers()
	{
		return 'Content-Type: application/xml';
	}

	/**
	 * @brief 输出
	 *
	 * @return xml string 
	 */
	public function render()
	{
		$xml = array();
		$xml[] = '<?xml version="1.0" encoding="UTF-8"?>';
		$xml[] = '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">';
	/*
		$xml[] = '<?xml-stylesheet type="text/xsl" media="screen"  href="'.$this->xsl.'"?>';
		$xml[] = '<?xml-stylesheet type="text/css" media="screen" href="'.STATIC_URL.'feed.css"?>';
		$xml[] = '<rss xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:wfw="http://wellformedweb.org/CommentAPI/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/" xmlns:slash="http://purl.org/rss/1.0/modules/slash/" xmlns:feedburner="http://rssnamespace.org/feedburner/ext/1.0" version="2.0"> ';
	 */
		# channel
		$xml[] = '<channel>';
		$xml[] = '<atom:link href="'.$this->channel["link"].'" rel="self" type="application/rss+xml" />';
		foreach($this->channel as $key => $v){
			if ($key == 'description') {
				$str = '<'.$key.'>'.'<![CDATA[ '.nl2br($v).']]>'.'</'.$key.'>';
			}else{
				$str = '<'.$key.'>'.nl2br($v).'</'.$key.'>';
			}
			$xml[] = $str;
		}
		# item
		foreach ($this->items as $item){
		$xml[] = '<item>';
			foreach ($item as $key=>$v){
				if ($key == 'description') {
					$str = '<'.$key.'>'.'<![CDATA[ '.nl2br($v).']]>'.'</'.$key.'>';
				}else{
					$str = '<'.$key.'>'.nl2br($v).'</'.$key.'>';
				}
				$xml[] = $str;		    
			}
		$xml[] = '</item>';
		}
		$xml[] = '</channel>';
		$xml[] = '</rss>';
		return implode($xml);
	}

	/**
	 * timestamp2pubDate
	 * @brief 时间戳格式化为 pubDate
	 * @param $timestamp
	 * @return pubDate
	 */
	public function timestamp2pubDate($timestamp)
	{
		$year = substr($timestamp, 0, 4);
		$month = substr($timestamp, 4, 2);
		$day = substr($timestamp, 6, 2);
		$hour = substr($timestamp, 8, 2);
		$min = substr($timestamp, 10, 2);
		$sec = substr($timestamp, 12, 2);
		$pubdate = date('D, d M Y H:i:s O', mktime($hour, $min, $sec, $month, $day, $year));
		return $pubdate;
	}
}

