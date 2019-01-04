<?php

function post_select_mode() {
  // 输出响应
  $mode = $_POST['nowMode'];
  $outputData = array();
  /*$myArr = array(
  	'temp'=>'123',
  	'myArr' => ['one','two','three'],
  );
  echo json_encode($myArr);*/
  if(strcmp($mode,'time')==0){
  	$outputData = array(
  		'selectTxt' => ['股票_time','期貨_time','黃金_time','其他_time'],
  		'selectValue' => ['stock','stack','gold','other'],
  	);
  	
  }elseif(strcmp($mode,'company')==0){
  	$outputData = array(
  		'selectTxt' => ['股票_company','期貨_company','黃金_company','其他_company'],
  		'selectValue' => ['stock','stack','gold','other'],
  	);
  }elseif(strcmp($mode,'income')==0){
  	$outputData = array(
  		'selectTxt' => ['股票_income','期貨_income','黃金_income','其他_income'],
  		'selectValue' => ['stock','stack','gold','other'],
  	);
  }elseif(strcmp($mode,'other')==0){
  	$outputData = array(
  		'selectTxt' => ['股票_other','期貨_other','黃金_other','其他_other'],
  		'selectValue' => ['stock','stack','gold','other'],
  	);
  }
  echo json_encode($outputData);
  exit;//这个停止一定要写
}
//函数名对应添加上，第一个表示用户没有登录时，这里全部都一样处理
add_action( 'wp_ajax_nopriv_post_select_mode', 'post_select_mode' );
add_action( 'wp_ajax_post_select_mode', 'post_select_mode' );


function post_select_category() {
  $mode = $_POST['nowCate'];
  $outputData = array();
  if(strcmp($mode,'stock')==0){
  	$outputData = array(
  		'selectTxt' => ['台積電_stock','台泥_stock','華碩_stock','其他_stock'],
  		'selectValue' => ['TSMC','TCC','ASUS','other'],
  	);
  	
  }elseif(strcmp($mode,'stack')==0){
  	$outputData = array(
  		'selectTxt' => ['台灣50_stack','電子期貨_stack','金融期貨_stack','其他_stack'],
  		'selectValue' => ['TW50','EE','Finance','other'],
  	);
  }elseif(strcmp($mode,'gold')==0){
  	$outputData = array(
  		'selectTxt' => ['8K_gold','16K_gold','24K_gold','其他_gold'],
  		'selectValue' => ['8K','16K','24K','other'],
  	);
  }elseif(strcmp($mode,'other')==0){
  	$outputData = array(
  		'selectTxt' => ['其他_other'],
  		'selectValue' => ['other'],
  	);
  }else{
  	$outputData = array(
  		'selectTxt' => ['Nothing'],
  		'selectValue' => ['Nothing'],
  	);
  }
  echo json_encode($outputData);
  exit;
}
add_action( 'wp_ajax_nopriv_post_select_category', 'post_select_category' );
add_action( 'wp_ajax_post_select_category', 'post_select_category' );
