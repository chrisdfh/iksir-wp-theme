<?php
get_header();
?>

<div class="container resultados">

    <div class="iksir-archive-title titulo-bloque ps-4 pt-4 pb-5 text-capitalize">
        <?= single_cat_title(  )?>
    </div>
    <div class="row">
        <div class="col-12 col-md-8">
            <?php if (have_posts(  )): while(have_posts(  )): the_post();?>
            <div class="row pb-2 mb-4 border-b-ccc">
            <div class="col-8 offset-2 offset-md-0 col-md-3 ">
                <a href="<?php the_permalink()?>">
                    <div  class="img-res-busq">
                        <img src="<?= ( has_post_thumbnail(  ) ) ? the_post_thumbnail_url( 'md' ) : '' ?>" alt="">
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-9 ">
                <div class="cabecera-post">
                    <span class="fecha"><i class="fa-regular fa-calendar-days"></i> <?= get_the_date() ?></span>
                    <span class="vistas puntuacion">
                        <i class="fa fa-eye"></i>
                    <?php
                        $post_views_count = get_post_meta( get_the_ID(), '_post_views_count', true );
                        if ( ! empty( $post_views_count ) ) {
                            echo  $post_views_count;
                        }
                    ?>
                    </span>
                </div>
                <div class="titulo-post">
                    <a href="<?php the_permalink() ?>">
                        <?php the_title() ?>
                    </a>
                </div>
                <div class="contenido">
                    <?php the_excerpt() ?>
                </div>
                <?php if (has_tag( )): ?>
                    <div class="tags">
                        <?php the_tags('<span class="tag"><i class="fa fa-tag"></i>','</span><span class="tag"><i class="fa fa-tag"></i>','</span>') ?>  
                    </div>
                <?php endif?>

                <div class="btn-iks">
                    <a href="<?php the_permalink() ?>" class="btn btn-primary btn-archive">Leer m&aacute;s</a>
                </div>
            </div>
                
            </div>   
            <?php endwhile;endif;?>
        </div>
        <div class="col-12 col-md-4">
            <div class="msg">
                aqui va el feed de twitter o cualquier otro feed que se desee colocar
            </div>
        </div>
    </div>
    <?php //if (have_posts(  )): while(have_posts(  )): the_post();?>
            <?php //the_date() ?>
            <?php //the_post_thumbnail(  )?>
            <?php //the_excerpt() ?>
            <?php //the_tags('<span class="tag"><i class="fa fa-tag"></i>','</span><span class="tag"><i class="fa fa-tag"></i>','</span>') ?>  
            <?php //the_category( ) ?>
            
            <?php //$tags=get_the_tags() ?>
            <?php //foreach($tags as $tag){echo '<span class="tag"><i class="fa fa-tag"></i>'.$tag->name .'</span>';}?>

</div>

<div class="paginador">
    <?php the_posts_pagination(  ) ?>
</div>







    

<?php
get_footer();
?>