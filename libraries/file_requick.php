<?php
	$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
	if ($page <= 0) $page = 1;
	$data = array(
		array("tbl"=>"product_list","field"=>"idl","source"=>"product","com"=>"san-pham","type"=>"product"),
		array("tbl"=>"product_cat","field"=>"idc","source"=>"product","com"=>"san-pham","type"=>"product"),
		array("tbl"=>"product","field"=>"id","source"=>"product","com"=>"san-pham","type"=>"product"),
		array("tbl"=>"baiviet","field"=>"id","source"=>"news","com"=>"tin-tuc","type"=>"tintuc"),
		array("tbl"=>"baiviet","field"=>"id","source"=>"news","com"=>"dich-vu","type"=>"dichvu"),
		array("tbl"=>"baiviet","field"=>"id","source"=>"news","com"=>"tu-van-mua-hang","type"=>"tuvan"),
		array("tbl"=>"baiviet","field"=>"id","source"=>"news","com"=>"chinh-sach","type"=>"chinhsach"),
		array("tbl"=>"info","field"=>"id","source"=>"about","com"=>"gioi-thieu","type"=>"gioithieu"),
		array("tbl"=>"tags","field"=>"id","source"=>"tags","com"=>"tags-product","type"=>"tags_product"),
		array("tbl"=>"tags","field"=>"id","source"=>"tags","com"=>"tags-post","type"=>"tags_post"),
	);
    if($com){
		foreach($data as $k=>$v){
			if(isset($com) && $v['tbl']!='info'){
				$d->query("select id from #_".$v['tbl']." where tenkhongdau='".$com."' and type='".$v['type']."' and hienthi=1");
				if($d->num_rows()>=1){
					$row = $d->fetch_array();
					$_GET[$v['field']] = $row['id'];
					$com = $v['com'];	
					break;
				}
			}
		}
    }
	switch($com){
		case 'ngon-ngu':
			$_SESSION['lang']=$_GET['lang'];
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		break;
		case 'tags-product':
			$source = "tags";
			$template = "product";
			$type_og = "article";
			$title_detail = "Tags từ khóa";
			$type_bar = 'tags_product';
		break;
		case 'tags-post':
			$source = "tags";
			$template = "news";
			$type_og = "article";
			$title_detail = "Tags từ khóa";
			$type_bar = 'tags_post';
		break;
		case 'gioi-thieu':
			$source = "about";
			$template = "about";
			$type_og = "article";
			$title_detail = "Giới thiệu";
			$type_bar = 'gioithieu';
		break;
		case 'gioi-thieu':
			$source = "about";
			$template = "about";
			$type_og = "article";
			$title_detail = "Giới thiệu";
			$type_bar = 'gioithieu';
		break;
		case 'tin-tuc':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_og = isset($_GET['id']) ? "article" : "object";
			$type_bar = 'tintuc';
			$title_detail = _tintuc;
		break;
		case 'dich-vu':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_og = isset($_GET['id']) ? "article" : "object";
			$type_bar = 'dichvu';
			$title_detail = "Dịch vụ";
		break;
		case 'chinh-sach':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_og = isset($_GET['id']) ? "article" : "object";
			$type_bar = 'chinhsach';
			$title_detail = _chinhsach;
		break;
		case 'tu-van-mua-hang':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_og = isset($_GET['id']) ? "article" : "object";
			$type_bar = 'tuvan';
			$title_detail = "Tư vấn mua hàng";
		break;
		case 'san-pham':
			$source = "product";
			$template =isset($_GET['id']) ? "product_detail" : "product";
			$type_og = isset($_GET['id']) ? "article" : "object";
			$title_detail = _sanpham;
			$type_bar = 'product';	
		break;
		case 'lien-he':
			$source = "contact";
			$template = "contact";
		break;
		case 'tim-kiem':
			$source = "search";
			$template = "product";
		break;
		case '': 
			$source = 'index';
			$template = 'index'; 
			$type_og = "website";
			break;
		default:
			header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
	        include_once '404.php';
	        exit();
	}
	/*if($_SERVER["REQUEST_URI"]=='/index.php'){
		header("location:"$http.$config_url);
	}*/	
	if($source!="") include _source.$source.".php";
?>