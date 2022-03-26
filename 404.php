<?php
get_header();
show_admin_bar(false);

$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 4,
);
$arr_posts = new WP_Query( $args ); //BÚSQUEDA EN BD DE LAS NOTAS CON LAS CARACTERÍSTICAS

?>
<div class="container error404 d-flex flex-column">
    <div class="titulo msg-error text-center">
        404
    </div>
    <div class="msg-error text-center">
        La página que estás buscando no puede ser mostrada, Puede que no exista, que su dirección haya sido cambiada o que temporalmente no esté disponible.
    </div>
    <style>
        .img-404{
            aspect-ratio: 1/1;
        }
        .img-404 img{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .titulo-notas-404{
            font-family: "Noto Serif", serif;
            font-size:14px;
            font-weight: bold;
            line-height: 1.2;
            text-align: center;
        }
        .titulo-bloque-recientes{
            font-family: "Noto Serif", serif;
            font-size:24px;
            font-weight: bold;
            line-height: 1.2;
        }
    </style>


    <?php if ( $arr_posts->have_posts() ) :?>
        <div class="titulo-bloque-recientes pt-5 pb-4">
            Nuestras &uacute;ltimas entradas
        </div>
        <?php //var_dump($arr_posts)?>
        <div class="row pb-5">
            <?php while($arr_posts->have_posts(  )): $arr_posts->the_post();?>
            <div class="col-6 col-md-3">
                <div class="card-404">
                    <div class="img-404 pb-2">
                        <img src="<?= ( has_post_thumbnail(  ) ) ? the_post_thumbnail_url( 'md' ) : '' ?>" alt="">
                    </div>
                    <div class="titulo-notas-404 pb-2">
                        <?php the_title(  ) ?>
                    </div>
                    <div class="text-center">
                        <a href="<?php the_permalink(  )?>" class="btn btn-dark btn-404">Leer</a>
                    </div>
                </div>
            </div>
            <?php endwhile;?>
        </div>


        <?php endif?>


</div>


<?php
get_footer();
?>