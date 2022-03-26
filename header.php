<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&family=Noto+Serif:wght@400;700&family=Raleway&display=swap&display=swap" rel="stylesheet">
    <?php
        wp_head();
    ?>
    <!-- <title>Iksir <?php wp_title()?></title> -->
</head>
<body <?php body_class(); ?>>
<?php 
    if (has_custom_logo()){
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        $logo = $image[0];
    } else {
        $logo = get_home_url()."/wp-content/themes/iksir-wp/assets/iksir.png";
    }
?>
<header class="">
    <div class="container ps-0 pe-0">
        <div class="navbar navbar-expand-md  fixed-md-top pt-0 pb-0 ps-md-3 pe-md-3">
            <div class="container ps-0 pe-0">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="fa-solid fa-bars"></i>
                </span>
            </button>
            <a class="navbar-brand" href="<?= get_home_url();?>">
                <img src="<?= $logo ?>" alt="">
            </a>
                <?php
                wp_nav_menu( array(
                    'theme_location'    => 'top-menu',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse justify-content-end',
                    'container_id'      => 'navbar',
                    'menu_class'        => 'nav navbar-nav',
                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'            => new WP_Bootstrap_Navwalker(),
                ) );
                ?>
                
            </div>
        </div>
    </div>
</header>
 