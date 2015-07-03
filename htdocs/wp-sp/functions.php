<?php

/***********************************************************
* スクリプト読み込み
***********************************************************/
function register_script(){
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'wp_head', get_bloginfo( 'stylesheet_directory') . '/js/wp_head.js', array(), false, false );
}
add_action('init','register_script');

/***********************************************************
* 管理画面 （非表示）
***********************************************************/
function remove_menu() {
remove_menu_page('index.php');// ダッシュボード
//remove_menu_page('edit.php');// 投稿

//remove_menu_page('edit.php?post_type=blog');// 投稿
// 固定ページ remove_menu_page('edit.php?post_type=page');
remove_menu_page('edit-comments.php'); // コメント
// 外観　remove_menu_page('themes.php');
// 設定　remove_menu_page('options-general.php');
// プラグイン　remove_menu_page('plugins.php');
}
add_action('admin_menu', 'remove_menu');

/***********************************************************
* body_class()にページスラッグを追加。
***********************************************************/
function pagename_class($classes = '') {
	if (is_page()) {
		$page = get_page(get_the_ID());
		$classes[] = $page->post_name;
	}
	return $classes;
}
add_filter('body_class','pagename_class');

/***********************************************************
* 管理画面　（メニュー並び替え）
***********************************************************/
function custom_menu_order($menu_ord) {
	if (!$menu_ord) return true;

	return array(
		// 最初の区切り線'separator1',
		// 二つ目の区切り線'separator2',
		//'separator-last', // 最後の区切り線

		'index.php', // ダッシュボード
		'edit.php', // 投稿
		//カスタム投稿
		'edit.php?post_type=execution',
		'edit.php?post_type=executionnew',

		'edit.php?post_type=customer',
		'edit.php?post_type=blog',
		'edit.php?post_type=column',
		'separator1',
		'upload.php', // メディア
		'link-manager.php', // リンク
		'edit.php?post_type=page', // 固定ページ
		'edit-comments.php', // コメント
		'themes.php', // 外観
		'plugins.php', // プラグイン
		'users.php', // ユーザー
		'tools.php', // ツール
		'options-general.php', // 設定
	);
}
add_filter('custom_menu_order', 'custom_menu_order');
 // Activate custom_menu_order
add_filter('menu_order', 'custom_menu_order');

/***********************************************************
* カスタム投稿
* 長文につき、別ファイル『custompost.php』をインクルードします。
***********************************************************/
require_once locate_template('custompost.php');

/***********************************************************
* アイキャッチ切り抜きサイズ
***********************************************************/
add_theme_support( 'post-thumbnails' );
add_image_size( 'thumb', 140, 105, true );
add_image_size( 'single', 240, 153, true );

/***********************************************************
* クエリー設定
***********************************************************/
function MyDefaultQuery( $query ) {
		if ( is_admin() || ! $query->is_main_query() )
			return;
	if ( is_home() ) {
			$query->set( 'posts_per_page', '3' );
			$query->set( 'post_type', 'execution' );
			return;
	}
	if ( is_archive() ) {
			$query->set( 'posts_per_page', '12' );
			return;
	}
}
add_action( 'pre_get_posts', 'MyDefaultQuery', 1 );

/***********************************************************
* 抜粋文の文字数調節
***********************************************************/
function new_excerpt_mblength($length) {
	if (is_post_type_archive('blog')||is_tax('blog_category')||is_post_type_archive('column')||is_tax('column_category')){
		//アーカイブ（ブログ・コラム）
		return 110;
	}
	else{
		return 46;
	}
}
add_filter('excerpt_mblength', 'new_excerpt_mblength');

function new_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

/***********************************************************
* ページネーション
***********************************************************/
function pagination($pages = '', $range = 2)
{
	 $showitems = ($range * 2)+1;//表示するページ数（５ページを表示）

	 global $paged;//現在のページ値
	 if(empty($paged)) $paged = 1;//デフォルトのページ

	 if($pages == '')
	 {
		 global $wp_query;
		 $pages = $wp_query->max_num_pages;//全ページ数を取得
		 if(!$pages)//全ページ数が空の場合は、１とする
		 {
			 $pages = 1;
		 }
	 }

	 if(1 != $pages)//全ページが１でない場合はページネーションを表示する
	 {
echo "<ul>\n";
//Prev：現在のページ値が１より大きい場合は表示
		 if($paged > 1) echo "<li class=\"prev\"><a href='".get_pagenum_link($paged - 1)."'>◀</a></li>\n";

		 for ($i=1; $i <= $pages; $i++)
		 {
			 if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
			 {
				//三項演算子での条件分岐
				echo ($paged == $i)? "<li class=\"current\">".$i."</li>\n":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>\n";
			 }
		 }
//Next：総ページ数より現在のページ値が小さい場合は表示
if ($paged < $pages) echo "<li class=\"next\"><a href=\"".get_pagenum_link($paged + 1)."\">▶</a></li>\n";
echo "</ul>\n";
	 }
}

/***********************************************************
* 投稿画面用 ショートコード
***********************************************************/
add_shortcode( 'get_template', 'tpGetImg' );
function tpGetImg( $atts, $content = '' ) {
return get_template_directory_uri().$content;
}

add_shortcode( 'wp_home', 'tpGetLink' );
function tpGetLink( $atts, $content = '' ) {
return home_url().$content;
}

/***********************************************************
* カスタム投稿タイプの月別アーカイブ表示
***********************************************************/
add_filter( 'getarchives_where', 'my_getarchives_where', 10, 2 );
function my_getarchives_where( $where, $r ) {
  global $taxonomy_getarchives_data;
  if ( isset($r['post_type']) ){
    $taxonomy_getarchives_data['post_type'] = $r['post_type'];
    $where = str_replace( '\'post\'', '\'' . $r['post_type'] . '\'',
             $where );
  }
  return $where;
}

function archive_link_for_taxonomy($url){
  global $taxonomy_getarchives_data;
  if (isset($taxonomy_getarchives_data['post_type'])){
    $url .= strpos($url, '?') === false ? '?' : '&';
    $url .= 'post_type=' . $taxonomy_getarchives_data['post_type'];
  }
  return $url;
}
add_filter('year_link', 'archive_link_for_taxonomy');
add_filter('month_link', 'archive_link_for_taxonomy');
add_filter('day_link', 'archive_link_for_taxonomy');




function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];
 
if(empty($first_img)){ //Defines a default image
        $first_img = "http://detarame.moo.jp/wp/wp-content/themes/whbk5/images/default.jpg";
    }
    return $first_img;
}

