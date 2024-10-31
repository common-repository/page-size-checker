<?PHP
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Page Size Checker</title>
<?PHP
	wp_register_style( 'pagesizecheckerstyle', plugin_dir_url( __FILE__ ) .'assets/css/style.css' );
	wp_enqueue_style('pagesizecheckerstyle');
	wp_enqueue_script( 'jquery');		
?>
<script>
$j=jQuery.noConflict();
$j(document).ready(function(){
    $j(".sizecheckerlist").click(function(){
	var urls = $j(this).attr("data");
	
	$j('.loadingimg').show();
	 $j.ajax({
      url:"http://seorankanalyser.com/Pagesizechecker/pagesizechecker_url_size/",
	  data: "url=" + urls,
      type: "GET",
      success: function(data){
		
		 $j("#pagesizecheckerresult").show();
           $j("#pagesizecheckerresult").html("Page: " + urls + data);
		  
		   
		   $j(".loadingimg").hide();
		   
		  	  }
});
	
	});
	
	
	
	 $j("#pagesizecheckerresult").click(function(){
			$j("#pagesizecheckerresult").hide();							   
	 });
	});

</script>

</head>

<body class="pagesizecheckerbody" >
<div style="clear:both;"></div>
<div class="pagesizecheckercontents" >
<div class="pagesizecheckerinfo"> Your website will load very slow if its content is big. Page Size Checker will help you to find exact size of web pages while it loads in user end. It is very easy, fast and powerful tool to check size for all pages of website. Keep in mind that more page size means more bandwidth. It also help you to manage your limited bandwidth as well as user data package.  You can freequently check your page size when you update it.  <br /> <a href="http://seorankanalyser.com/" target="_blank">Signup for Detail Analysis</a><br />For Support / Feedback:  support@seorankanalyser.com <br />A product of <a href="http://seorankanalyser.com/" target="_blank">SEO Rank Analyser</a>
</div>
<?php

	
	echo '<img src ="' . plugin_dir_url( __FILE__ ) .'assets/images/pagesizechecker.png" id="pagesizecheckerlogo"/><h1 id="pagesizecheckertitle"> Page Size <span id="panda">Checker</span></h1>';
	
	
	
	
?>
<div id="pagesizecheckerpagelist">
<h3 id="posttitle">Click on individual title below to get its size</h3>
<div id="pagesizecheckerpages">
<img src="<?php echo plugin_dir_url( __FILE__ ) ;?>assets/images/loading.gif" class="loadingimg" />
<div id="pagesizecheckerresult"></div>
<h3 id="h3subtitle">Pages</h3>

<?PHP
$arr = get_pages();
foreach($arr as $arr1){
	if(isset($arr1->post_title)){
echo "<div class='pagesizecheckersitelist'><img src ='" . plugin_dir_url( __FILE__ ) . "assets/images/arrow.png' width=12 height=12 /> <a data='" . get_page_link( $arr1->ID )  . "' target='_blank' class='sizecheckerlist'>" .  $arr1->post_title . "</a></div>";
	}
}


?>
</div>
<div id="pagesizecheckerposts">
<h3 id="h3subtitle">Posts</h3>

<?PHP
$arr = get_posts();
foreach($arr as $arr1){
	if(isset($arr1->post_title)){
echo "<div class='pagesizecheckersitelist'><img src ='" . plugin_dir_url( __FILE__ ) . "assets/images/arrow.png' width=12 height=12 /> <a data='" . get_page_link( $arr1->ID )  . "' target='_blank' class='sizecheckerlist'>" .  $arr1->post_title . "</a></div>";
	}
}


?>
</div>
</div>


