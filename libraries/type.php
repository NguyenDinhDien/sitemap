<?php
	$type = (isset($_REQUEST['type'])) ? addslashes($_REQUEST['type']) : "";	
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$act = explode('_',$act);
	if(count($act>1)){
		$act = $act[1];
	} else {
		$act = $act[0];
	}
	switch($type){
		//-------------product------------------
		case 'product':
			switch($act){
				case 'list':
					$title_main = "Danh mục cấp 1";
					$config_images = "true";
					$config_mota= "false";
					$config_noidung= "false";
					$config_noibat= "false";
					$config_slider="false";
					@define ( _width_thumb , 290 );
					@define ( _height_thumb ,380 );
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				case 'cat':
					$title_main = "Danh mục cấp 2";
					$config_images = "true";
					$config_mota= "false";
					$config_noidung= "false";
					$config_noibat = "false";
					@define ( _width_thumb , 200 );
					@define ( _height_thumb , 200 );
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				case 'item':
					$title_main = "Danh mục cấp 3";
					$config_images = "false";
					$config_mota= "false";
					$config_noidung= "false";
					@define ( _width_thumb , 555 );
					@define ( _height_thumb , 232 );
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;

				case 'sub':
					$title_main = "Danh mục cấp 4";
					$config_images = "false";
					$config_mota= "false";
					$config_noidung= "false";
					@define ( _width_thumb , 555 );
					@define ( _height_thumb , 232 );
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				
				default:
					$title_main = "Sản Phẩm";
					$config_images = "true";
					$config_mota= "true";
					$config_properties = "false";
					$config_banchay = "false";
					$config_moi = "false";
					$config_khuyenmai = "false";
					$config_tags = "true";
					$config_list = "true";
					$config_cat = "true";
					$config_item = "false";
					$config_sub = "false";
					@define ( _width_thumb , 280 );
					@define ( _height_thumb , 260 );
					@define ( _style_thumb , 1 );
					$ratio_ = 3;
					break;
				}
				@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			break;
		case 'properties':
			switch($act){
				case 'list':
					$title_main = "danh mục thuộc tính";
					$config_images = "false";
					$config_phiship = "true";
					$config_mota= "false";
					$config_noidung= "false";
					$config_noibat= "false";
					@define ( _width_thumb , 40 );
					@define ( _height_thumb , 37 );
					@define ( _style_thumb , 1 );
					$ratio_ = 2;
					break;
				default:
					$title_main = "thuộc tính";
					$config_images = "true";
					$config_mota= "false";
					$config_list = "true";
					@define ( _width_thumb , 290 );
					@define ( _height_thumb , 290 );
					@define ( _style_thumb , 1 );
					$ratio_ = 3;
					break;
				}
				@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			break;
		
		case 'tintuc':
			$title_main = "Tin tức";
			$config_images = "true";
			$config_mota= "true";
			$config_tags = "true";
			$config_noibat = "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_sub = "false";
			@define ( _width_thumb , 290 );
			@define ( _height_thumb , 290 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 2;
		break;


		
		case 'dichvu':
			$title_main = "Dịch vụ";
			$config_images = "true";
			$config_mota= "true";
			$config_tags = "true";
			$config_noibat = "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_sub = "false";
			@define ( _width_thumb , 300 );
			@define ( _height_thumb , 300 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 2;
			break;
		case 'chinhsach':
			$title_main = "Chính sách";
			$config_images = "true";
			$config_mota= "true";
			$config_tags = "true";
			$config_noibat = "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_sub = "false";
			@define ( _width_thumb , 290 );
			@define ( _height_thumb , 290 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 2;
			break;
		case 'album':
			$title_main = "thư viện ảnh";
			$config_images = "true";
			$config_mota= "true";
			$config_noibat = "true";
			$config_list = "false";
			@define ( _width_thumb , 800 );
			@define ( _height_thumb , 500 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
		break;
		case 'video':
			$title_main = "Video clip";
			$config_images = "true";
			$config_mota= "true";
			$config_noibat = "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_sub = "false";
			@define ( _width_thumb , 800 );
			@define ( _height_thumb , 500 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
		break;
		//-------------info------------------
		case 'gioithieu':
			$title_main = 'giới thiệu';
			$config_ten = 'true';
			$config_mota = 'true';
			$config_images = 'true';
			@define ( _width_thumb , 593 );
			@define ( _height_thumb , 405 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			break;
		
		case 'lienhe':
			$title_main = 'Liên hệ';
			$config_ten = 'true';
			break;

		
		case 'bgemail':
			$title_main = 'Background đăng ký nhận tin';
			$config_multi_lang = "false";
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb ,350);
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF|swf' );
			$ratio_ = 1;
			break;
		case 'bgfooter':
			$title_main = 'Background footer';
			$config_multi_lang = "false";
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb , 430);
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF|swf' );
			$ratio_ = 1;
			break;
		case 'banner':
			$title_main = 'Banner';
			$config_multi_lang = "true";
			@define ( _width_thumb , 668 );
			@define ( _height_thumb , 143 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF|swf' );
			$ratio_ = 1;
			break;
		case 'bgbanner':
			$title_main = 'Background banner';
			$config_multi_lang = "false";
			$links_ = "false";
			$config_hienthi = "true";
			@define ( _width_thumb , 1366);
			@define ( _height_thumb , 110 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF|swf' );
			$ratio_ = 1;
			break;
		
		case 'logo':
			$title_main = 'Logo';
			$config_multi_lang = "false";
			@define ( _width_thumb , 215 );
			@define ( _height_thumb , 71 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'popup':
			$title_main = 'Popup';
			$config_multi_lang = "false";
			$links_ = 'true';
			$config_hienthi = 'true';
			@define ( _width_thumb , 900 );
			@define ( _height_thumb , 500 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		

		case 'favicon':
			$title_main = 'Favicon';
			$config_multi_lang = "false";
			@define ( _width_thumb , 40 );
			@define ( _height_thumb , 40 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		case 'bgweb':
			$title_main = 'background web';
			@define ( _width_thumb , 500 );
			@define ( _height_thumb , 120 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		//-------------photo------------------
		case 'slider':
			$title_main = "Hình ảnh slider";
			$config_multi_lang = "false";
			$config_list = "false";
			$config_mota = "true";
			@define ( _width_thumb ,1366);
			@define ( _height_thumb ,512);
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = "true";
			break;

		case 'partner':
		    $title_main = "Đối tác";
		    $config_multi_lang = "false";
			@define ( _width_thumb , 460 );
			@define ( _height_thumb , 330 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 2;
			$links_ = "true";
			break;

		case 'advertise':
		    $title_main = "Quảng cáo";
		    $config_multi_lang = "true";
			@define ( _width_thumb , 580 );
			@define ( _height_thumb ,210 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = "true";
			break;
		
		#lkweb
		case 'mxh':
		    $title_main = "Mạng xã hội";
		    $config_link = "true";
		    $config_images= "true";
			$config_ngonngu= "false";
			@define ( _width_thumb , 42 );
			@define ( _height_thumb , 42 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'mxh2':
		    $title_main = "Mạng xã hội";
		    $config_link = "true";
		    $config_images= "true";
			$config_ngonngu= "false";
			@define ( _width_thumb , 44 );
			@define ( _height_thumb , 45 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'tailieu':
			$title_main = 'Quản lý tài liệu';
			$config_link = "false";
			$config_list = "true";
			$config_img = "true";
			@define ( _width_thumb , 27 );
			@define ( _height_thumb , 27 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'color':
			$title_main = 'màu';
			$config_link = "false";
		    $config_images= "false";
		    @define ( _width_thumb , 27 );
			@define ( _height_thumb , 27 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'tags_post':
			$title_main = 'Tags Seo Bài Viết';
			$config_link = "false";
		    $config_images= "false";
		    @define ( _width_thumb , 27 );
			@define ( _height_thumb , 27 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'tags_product':
			$title_main = 'Tags Seo Sản Phẩm';
			$config_link = "false";
		    $config_images= "false";
		    @define ( _width_thumb , 27 );
			@define ( _height_thumb , 27 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'lang':
			$title_main = 'Define ngôn ngữ';
			$config_multi_lang = "true";
			break;
		case 'title':
			$title_main = 'Quản lý title,keywords,description';
			$config_developer = "true";
			$config_delete = "true";
			break;
		//--------------defaut---------------
		default: 
			$source = "";
			$template = "index";
			break;
	}

?>