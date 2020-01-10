<?php 
	session_start();
	@define ( '_lib' , './libraries/');
	include_once _lib."config.php";
	$d = new database($config['database']);
	$time_sitemap = time();
	$index = true;
	$data = array();
	function get_http(){
		$pageURL = 'http';
		if ($_SERVER["HTTPS"] == "on") {
			$pageURL .= "s";
		}
		$pageURL .= "://";
		return $pageURL;
	}
	function utf8_for_xml($string){
		return preg_replace ('/[^\x{0009}\x{000a}\x{000d}\x{0020}-\x{D7FF}\x{E000}-\x{FFFD}]+/u', ' ', $string);
	}
	
	function urlElement($url,$pri,$time) {
		global $config_url; 
		$url = get_http().$config_url.'/'.$url;
		$str_sitemap='<url>'; 
		$str_sitemap.='<loc>'.$url.'</loc>'; 
		$str_sitemap.='<lastmod>'.date("c",$time).'</lastmod>';
		$str_sitemap.='<changefreq>daily</changefreq>'; 
		$str_sitemap.='<priority>'.$pri.'</priority>';
		$str_sitemap.='</url>';
		echo utf8_for_xml($str_sitemap);
	} 
	function CreateXML($tbl='',$com='',$type='',$priority = 1.0){
		global $d,$data;
		if($tbl=='') return false;
		$d->reset();
		$d->query("SELECT tenkhongdau,ngaytao,ngaysua FROM table_$tbl where type='".$type."' and hienthi=1 order by ngaytao desc");
		$result_data = $d->result_array();

		foreach ($result_data as $k => $v) {
			$create_time = ($v['ngaysua']!=0) ? $v['ngaysua'] : $v['ngaytao']; 
			$data[] = array('url'=>$com.'/'.$v['tenkhongdau'],'pri'=>$priority,'date'=>$create_time);
		}
	}
	function CreateXML2($tbl='',$com='',$type='',$priority=1){
		global $d,$data;
		if($tbl=='') return false;
		$d->reset();
		$sql = "SELECT id,tenkhongdau,ngaytao,ngaysua FROM table_$tbl where type='".$type."' and hienthi=1 order by ngaytao desc";
		$d->query($sql);
		$result_data = $d->result_array();
		foreach ($result_data as $key => $v) { 
			$create_time = ($v['ngaysua']!=0) ? $v['ngaysua'] : $v['ngaytao']; 
			$data[] = array('url'=>$com.'/'.$v['tenkhongdau'].'-'.$v['id'],'pri'=>$priority,'date'=>$create_time);
		}	
	}


	header("Content-Type: application/xml; charset=utf-8"); 
	echo '<?xml version="1.0" encoding="UTF-8"?>'; 
	echo '<?xml-stylesheet type="text/xsl" href="http://'.$config_url.'/sitemap/sitemap.xsl"?>';
	echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">'; 

	$data[] = array('url'=>'','pri'=>'1.0','date'=>$time_sitemap);
	$data[] = array('url'=>'gioi-thieu','pri'=>'1.0','date'=>$time_sitemap);
	
	$data[] = array('url'=>'thuc-pham-chuc-nang','pri'=>'1.0','date'=>$time_sitemap);
	CreateXML('product_list','thuc-pham-chuc-nang','product',0.8);
	CreateXML('product_cat','thuc-pham-chuc-nang','product',0.8);
	CreateXML2('product','thuc-pham-chuc-nang','product',1.0);

	$data[] = array('url'=>'duoc-my-pham','pri'=>'1.0','date'=>$time_sitemap);
	CreateXML('product_list','duoc-my-pham','cosmeceuticals',0.8);
	CreateXML('product_cat','duoc-my-pham','cosmeceuticals',0.8);
	CreateXML2('product','duoc-my-pham','cosmeceuticals',1.0);

	$data[] = array('url'=>'cham-soc-ca-nhan','pri'=>'1.0','date'=>$time_sitemap);
	CreateXML('product_list','cham-soc-ca-nhan','personalcare',0.8);
	CreateXML('product_cat','cham-soc-ca-nhan','personalcare',0.8);
	CreateXML2('product','cham-soc-ca-nhan','personalcare',1.0);

	$data[] = array('url'=>'goc-suc-khoe','pri'=>'1.0','date'=>$time_sitemap);
	CreateXML('baiviet_list','goc-suc-khoe','gocsuckhoe',0.8);
	CreateXML('baiviet_cat','goc-suc-khoe','gocsuckhoe',0.8);
	CreateXML2('baiviet','goc-suc-khoe','gocsuckhoe',1.0);

	$data[] = array('url'=>'thuoc','pri'=>'1.0','date'=>$time_sitemap);
	CreateXML('baiviet_list','thuoc','thuoc',0.8);
	CreateXML2('baiviet','thuoc','thuoc',1.0);

	$data[] = array('url'=>'benh','pri'=>'1.0','date'=>$time_sitemap);
	CreateXML('baiviet_list','benh','benh',0.8);
	CreateXML2('baiviet','benh','benh',1.0);
	
	$data[] = array('url'=>'vi-sao-chon-chung-toi','pri'=>'1.0','date'=>$time_sitemap);
	CreateXML2('baiviet','vi-sao-chon-chung-toi','about',1.0);

	$data[] = array('url'=>'chinh-sach','pri'=>'1.0','date'=>$time_sitemap);
	CreateXML2('baiviet','chinh-sach','chinhsach',1.0);

	$total_page = ceil(count($data)/200);
	$act = (int)$_GET['act'];
	if($act != 0 && $act <= $total_page){
		$index = false;
		$max = $act*200;
		for($i = $max-200;$i < $max;$i++){
			if(isset($data[$i])){
				urlElement($data[$i]['url'],$data[$i]['pri'],$data[$i]['date']);
			}
		}
	}
	if($index){
		for($i=1;$i<=$total_page;$i++){
			urlElement('sitemap'.$i.'.xml',1.0,$time_sitemap);
		}
	}
	echo '</urlset>'; 
?>