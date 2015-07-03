<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title><?php bloginfo('name'); ?></title>
	<meta name="google-site-verification" content="mtNXRsITLDVt0jolKx1mWNOQwj65-s3c6iumPX8yvHI" />
	<meta name="viewport" content="width=device-width,user-scalable=no,maximum-scale=1" />
	<meta name="robots" content="index,follow">
	<link rel="stylesheet" type="text/css" media="all" href="style.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/assets/css/jquery.btnmenu.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/common.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/android-landscape.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/btnmenu.js"></script>
	<?php wp_head(); ?>
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46677094-17', 'okakenreform.com');
  ga('send', 'pageview');

</script>
</head>
<body>
	<header class="l-header cf">
		<h1 class="header-logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/layout/header/header_logo.png" width="421" height="80" alt="おかけんリフォーム"></h1>
		<a id="btnMenu" class="btn-menu"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/layout/header/header_btn_menu.png" width="80" height="80" alt="menu"></a>
	</header><!-- /.l-header -->

	<nav class="l-navi" id="menu">
		<ul>
			<li class="menu-top"><a href="<?php echo home_url('/'); ?>">TOP</a></li>
			<li><a href="<?php echo home_url('expectation/'); ?>">おかけんの理念</a></li>
			<li><a href="<?php echo home_url('advantage/'); ?>">他店との違い</a></li>
			<li><a href="<?php echo home_url('customer/'); ?>">お客様の声</a></li>
			<li><a href="<?php echo home_url('execution/'); ?>">ご近所の施工例</a></li>
			<li><a href="<?php echo home_url('masscommunication/'); ?>">マスコミ取材</a></li>
			<li><a href="<?php echo home_url('company/'); ?>">会社概要</a></li>
			<li><a href="<?php echo home_url('plan/'); ?>">無料お見積り</a></li>
			<li><a href="<?php echo home_url('contact/'); ?>">お問い合わせ</a></li>
		</ul>
	</nav><!-- /.l-navi -->