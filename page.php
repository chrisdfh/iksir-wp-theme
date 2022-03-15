<?php
get_header();
customSetPostViews(get_the_ID());//single.php
?>

<div class="container">
    <h1><?= get_bloginfo( 'name' )?></h1>
    <h3><?=  the_title()?></h3>
    <?= get_the_ID(  )?>
    <?php if (have_posts(  )): while(have_posts(  ) ): the_post();?>
        <?php if(has_post_thumbnail(  )):?>
            <div>
                <img src="<?= the_post_thumbnail_url('xs') ?>" alt="" class="img-fluid">
            </div>
        <?php endif?>
        <?php echo "Categoría" ; the_category( ); echo "The post "; echo get_post_custom()['Tiempo_de_coccion'][0];echo "<br>"?>
        <div>tags:</div>


        <?php the_tags('<span class="tag"><i class="fa fa-tag"></i>','</span><span class="tag"><i class="fa fa-tag"></i>','</span>') ?>  
            


        <?php //$tags=get_the_tags() ?>
        <?php //foreach($tags as $tag){echo '<div>'.$tag->name .'</div>';}?>
        <?php the_title() ?>
        <?php the_content() ?>

    <?php endwhile;endif;?>
</div>

<?php
get_footer();
?>