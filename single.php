<?php
get_header();
customSetPostViews(get_the_ID());//single.php
?>

<div class="container post">
    <!-- <h1><?= get_bloginfo( 'name' )?></h1> -->

    <?php if (have_posts(  )): while(have_posts(  ) ): the_post();?>
        <?php 
            $hijo_de_receta = false;
            $recetasID = get_cat_ID('Recetas');
            foreach(wp_get_post_categories(get_the_ID()) as $category){
                if (cat_is_ancestor_of($recetasID,$category)){
                    $hijo_de_receta = true;
                }
            }
        ?>
        <?php if (has_category( 'receta' ) || $hijo_de_receta){
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