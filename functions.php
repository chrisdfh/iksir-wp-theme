<?php

    function load_style_sheets(){
        wp_register_style('stylesheet',get_template_directory_uri().'/css/bootstrap.min.css',array(), 5,'all');
        wp_enqueue_style('stylesheet');

        wp_register_style('fontawesome','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css',array(), 1,'all');
        wp_enqueue_style('fontawesome');
        
        wp_register_style('my_style',get_template_directory_uri().'/style.css',array(), 2.3,'all');
        wp_enqueue_style('my_style');

        wp_register_style('a_style',get_template_directory_uri().'/assets/alert.css',array(), 2.3,'all');
        wp_enqueue_style('a_style');

    }
    add_action('wp_enqueue_scripts',load_style_sheets());

    function load_js(){
        wp_register_script('myJs',get_template_directory_uri().'/js/scripts.js',array(),1,true);
        wp_enqueue_script('myJs');
        wp_register_script('bsJs',get_template_directory_uri().'/js/bootstrap.bundle.min.js',array(),1,true);
        wp_enqueue_script('bsJs');
        wp_register_script('aJs',get_template_directory_uri().'/assets/alert.js',array(),1,true);
        wp_enqueue_script('aJs');

    }
    add_action('wp_enqueue_scripts',load_js());

    
    function register_navwalker(){
        require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
    }
    add_action( 'after_setup_theme', 'register_navwalker' );


    //OPENGRAPH DATA
    function doctype_opengraph($output) {
        return $output . '
        xmlns:og="http://opengraphprotocol.org/schema/"
        xmlns:fb="http://www.facebook.com/2008/fbml"';
    }
    add_filter('language_attributes', 'doctype_opengraph');


    function fb_opengraph() {
        global $post;
     
        if(is_single()) {
            if(has_post_thumbnail($post->ID)) {
                $img_src = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'medium');
            } else {
                $img_src = get_stylesheet_directory_uri() . '/assets/og.png';
            }
            if($excerpt = $post->post_excerpt) {
                $excerpt = strip_tags($post->post_excerpt);
                $excerpt = str_replace("", "'", $excerpt);
            } else {
                $excerpt = get_bloginfo('description');
            }
            ?>
        <!-- OG DATA -->
        <link rel="canonical" href="<?php echo the_permalink(); ?>">

        <meta property="og:title" content="<?php echo the_title(); ?>"/>
        <meta property="og:description" content="<?php echo $excerpt; ?>"/>
        <meta property="og:type" content="article"/>
        <meta property="og:url" content="<?php echo the_permalink(); ?>"/>
        <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
        <meta property="og:image" content="<?= (is_array($img_src)) ? $img_src[0]:$img_src; ?>"/>

        <meta name="twitter:card" content="summary_large_image">
        <meta property="twitter:domain" content="iksir.com.ve">
        <meta property="twitter:url" content="<?php echo the_permalink(); ?>">
        <meta name="twitter:title" content="<?php echo the_title(); ?>">
        <meta name="twitter:description" content="<?php echo $excerpt; ?>">
        <meta name="twitter:image" content="<?= (is_array($img_src)) ? $img_src[0]:$img_src; ?>">

        <!-- END OG DATA -->
    <?php
        } else {
?>
        <!-- OG DATA DEL HOME -->
        <link rel="canonical" href="https://www.iksir.com.ve/">
        <meta name="description" content="Fabricante, comercializador y distribuidor de Harina precocida de garbanzos, Harina de berenjena asada, hierbas y plantas para preparar infusiones">
        <meta property="og:url" content="https://www.iksir.com.ve/">
        <meta property="og:type" content="website">
        <meta property="og:title" content="Iksir Extractos Esenciales">
        <meta property="og:description" content="Fabricante, comercializador y distribuidor de Harina precocida de garbanzos, Harina de berenjena asada, hierbas y plantas para preparar infusiones">
        <meta property="og:image" content="<?= get_stylesheet_directory_uri() . '/assets/og.png'?>">
        
        <meta name="twitter:card" content="summary_large_image">
        <meta property="twitter:domain" content="iksir.com.ve">
        <meta property="twitter:url" content="https://www.iksir.com.ve/">
        <meta name="twitter:title" content="<?php wp_title()?>">
        <meta name="twitter:description" content="Fabricante, comercializador y distribuidor de Harina precocida de garbanzos, Harina de berenjena asada, hierbas y plantas para preparar infusiones">
        <meta name="twitter:image" content="<?= get_stylesheet_directory_uri() . '/assets/og.png'?>">
        <!-- END OG DATA -->
<?php
            return;
        }
    }
    add_action('wp_head', 'fb_opengraph', 5);

    register_nav_menus(
        array(
            'top-menu' => __('Menú Superior','theme'),
            'footer-menu' => __('Menú Inferior','theme'),
        )
    );
    function customSetPostViews($postID) {
        $countKey = '_post_views_count';
        $count = get_post_meta($postID, $countKey, true);
        if($count==''){
            $count = 0;
            delete_post_meta($postID, $countKey);
            add_post_meta($postID, $countKey, '1');
        }else{
            $count++;
            update_post_meta($postID, $countKey, $count);
        }
    }
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo',array(
        'height'=>183,
        'width'=>500
    ));
    add_image_size( 'md', 450, 450, true );

?>