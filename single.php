<?php
get_header();
customSetPostViews(get_the_ID());//single.php
?>

<div class="container post">
    <!-- <h1><?= get_bloginfo( 'name' )?></h1> -->

    <?php if (have_posts(  )): while(have_posts(  ) ): the_post();?>

        <?php if (has_category( 'receta' ) ){
            get_template_part( 'template-parts/template', 'receta' );
        } else {
            get_template_part( 'template-parts/template', 'blog' );
        }
        ?>
    <?php endwhile;endif;?>
</div>

<?php
get_footer();
?>