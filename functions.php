<?php

    function load_style_sheets(){
        wp_register_style('stylesheet',get_template_directory_uri().'/css/bootstrap.min.css',array(), 5,'all');
        wp_enqueue_style('stylesheet');

        wp_register_style('fontawesome','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css',array(), 1,'all');
        wp_enqueue_style('fontawesome');

        wp_register_style('my_style',get_template_directory_uri().'/style.css',array(), 2.3,'all');
        wp_enqueue_style('my_style');
    }
    add_action('wp_enqueue_scripts',load_style_sheets());

    function load_js(){
        wp_register_script('myJs',get_template_directory_uri().'/js/scripts.js',array(),1,true);
        wp_enqueue_script('myJs');
        wp_register_script('bsJs',get_template_directory_uri().'/js/bootstrap.bundle.min.js',array(),1,true);
        wp_enqueue_script('bsJs');
    }
    add_action('wp_enqueue_scripts',load_js());

    
    function register_navwalker(){
        require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
    }
    add_action( 'after_setup_theme', 'register_navwalker' );


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
    // add_theme_support('custom-logo');
    add_image_size( 'md', 450, 450, true );

?>