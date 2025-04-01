<?php
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

add_theme_support('post-thumbnails');

register_nav_menus([
	'categorias' => 'Categorias'
]);

function custom_post_type($post_type, $singular_name, $plural_name)
{
	$labels = array(
		'name' => $plural_name,
		'singular_name' => $singular_name,
		'menu_name' => $plural_name,
		'add_new' => 'Adicionar Novo',
		'add_new_item' => 'Adicionar Novo',
		'edit' => 'Editar',
		'edit_item' => 'Editar',
		'new_item' => 'Novo',
		'view' => 'Ver',
		'view_item' => 'Ver',
		'search_items' => 'Procurar',
		'not_found' => 'Nenhum slide encontrado',
		'not_found_in_trash' => 'Nenhum slide encontrado no Lixo',
	);

	$args = array(
		'label' => $plural_name,
		'description' => $plural_name,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => $post_type, 'with_front' => true),
		'query_var' => true,
		'supports' => array('title', 'thumbnail'),
		'labels' => $labels,
	);

	register_post_type($post_type, $args);
}

add_action('init', function () {
	custom_post_type('carrossel', 'Carrossel', 'Carrossel');
});

function enqueue_slick_scripts()
{
	wp_enqueue_style('slick-carousel-css', get_template_directory_uri() . '/js/slick-1.8.1/slick/slick.css', array(), '1.8.1');

	wp_enqueue_script('slick-carousel-js', get_template_directory_uri() . '/js/slick-1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true);
}

add_action('wp_enqueue_scripts', 'enqueue_slick_scripts');

// API Google Maps do ACF
function my_acf_google_map_api($api)
{
	$api['key'] = 'AIzaSyB5p2aQx2VTFTZT0QtiSV4v_xp-OMEL5Uk';
	return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

// Alterar nome 'Post'
function alterar_nome_menu_posts()
{
	global $menu;
	$menu[5][0] = 'Empreendimentos'; // 'Posts' para 'Empreendimentos'
}
add_action('admin_menu', 'alterar_nome_menu_posts');

function enqueue_gallery_scripts()
{
	// FlexSlider CSS (usado pelo WooCommerce)
	wp_enqueue_style('flexslider', 'https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/flexslider.min.css');

	// FlexSlider JS
	wp_enqueue_script('flexslider', 'https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider-min.js', array('jquery'), '2.7.2', true);

	// Zoom (para efeito de hover igual ao WooCommerce)
	wp_enqueue_script('zoom', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.min.js', array('jquery'), '1.7.21', true);

	// Lightbox (opcional, para popup)
	wp_enqueue_script('lightbox', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js', array('jquery'), '2.11.3', true);
	wp_enqueue_style('lightbox', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css');
}
add_action('wp_enqueue_scripts', 'enqueue_gallery_scripts');