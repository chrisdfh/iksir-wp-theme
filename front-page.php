<?php
get_header();
?>

<div class="container-fluid g-0">
    <!-- <h1><?= get_bloginfo( 'name' )?></h1> -->
<?php $p=0 ?>
<?php //OBTENER PRIMERAS NOTAS DEL CAROUSEL
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'category_name' => 'carousel-inicial',
    'posts_per_page' => 5,
);
$arr_posts = new WP_Query( $args ); //BÚSQUEDA EN BD DE LAS NOTAS CON LAS CARACTERÍSTICAS

//OBTENER NOTAS DE NUESTRAS RECETAS
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'category_name' => 'receta',
    'posts_per_page' => 15,
);
$arr_recetas = new WP_Query( $args ); //BÚSQUEDA EN BD DE LAS NOTAS CON LAS CARACTERÍSTICAS

//OBTENER NOTAS DE RECETA DE LA SEMANA
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'category_name' => 'receta-semana',
    'posts_per_page' => 3,
);
$arr_semana = new WP_Query( $args ); //BÚSQUEDA EN BD DE LAS NOTAS CON LAS CARACTERÍSTICAS

//OBTENER NOTAS DE BLOG
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'category_name' => 'blog',
    'posts_per_page' => 3,
);
$arr_blog = new WP_Query( $args ); //BÚSQUEDA EN BD DE LAS NOTAS CON LAS CARACTERÍSTICAS


$counter=0;
if ( $arr_posts->have_posts() ) :
$bg_light=get_template_directory_uri()."/assets/car-bg1.jpg";
$bg_dark=get_template_directory_uri()."/assets/car-bg2.jpg";

?>


<div id="carousel-1" class="carousel slide alto-pantalla" data-bs-ride="carousel"> 
    <div class="carousel-inner">
            <?php while ( $arr_posts->have_posts() ) :
                    $arr_posts->the_post();
                    ?>
        <div class="carousel-item <?= ($counter==0)?'active':'' ?>" id="post-<?php the_ID(); ?>" >
            <div class="row bg-carousel-1" style="background-image:url('<?= ($counter%2==0)? $bg_dark:$bg_light ?>')">
                <div class="col-12 col-md-6 alto-pantalla <?= ($counter%2==0)? 'car-bg-dark':'car-bg-light' ?>">
                    <div class="wrapper-data-carousel ">
                        <div class="titulo">
                            <?php the_title() ?>
                        </div>

                        <div class="resumen pt-4 text-center">
                            <?php the_excerpt(  )?>
                        </div>

                        <div class="img-destacada d-block d-md-none text-center spin">
                            <img src="<?= (has_post_thumbnail()) ? the_post_thumbnail_url():'' ?>" alt="">
                        </div>


                        <div class=" vistas pt-4">
                            <?php
                            $views = 0;
                            $post_views_count = get_post_meta( get_the_ID(), 'post_views_count', true );
                            if ( ! empty( $post_views_count ) ) {
                                $views =  $post_views_count;
                            }
                            ?>
                            <div class="car-vistas">
                                <?= $views ?> Vistas
                                <?=(!empty(get_post_custom()['valor'][0]) ? ' ('.get_post_custom()['valor'][0].' Estrellas)':' (Sin Valoraci&oacute;n)' )?>  
                            </div>
                        </div>


                        <div class="row pt-4">
                            <div class="col-4">
                                <div class="datos-carousel text-center">
                                    <div class="icono-carousel">
                                        <i class="fa-solid fa-stopwatch"></i>
                                    </div>
                                    <div class="dato">
                                        Tiempo de cocci&oacute;n
                                    </div>
                                    <div class="valor">
                                        <?=get_post_custom()['Tiempo_de_coccion'][0]?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="datos-carousel text-center">
                                    <div class="icono-carousel">
                                        <i class="fa-solid fa-basket-shopping"></i>
                                    </div>
                                    <div class="dato">
                                        Ingredientes
                                    </div>
                                    <div class="valor">
                                        <?=get_post_custom()['Ingredientes'][0]?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="datos-carousel text-center">
                                    <div class="icono-carousel">
                                        <i class="fa-solid fa-heart-pulse"></i>
                                    </div>
                                    <div class="dato">
                                        Calor&iacute;as
                                    </div>
                                    <div class="valor">
                                        <?=get_post_custom()['Caloria'][0]?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="boton-ik pt-4 pb-4 text-center">
                            <a href="<?php the_permalink(  )?>" class="btn btn-light btn-tema">Ver receta</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 d-none d-md-block alto-pantalla">
                    <div class="img-carousel spin">
                        <img src="<?= (has_post_thumbnail()) ? the_post_thumbnail_url():'' ?>" class="w-100 d-block" alt="">
                    </div>
                </div>

            </div>
            </div>
        <?php $counter++;endwhile ?>
    </div>
    <div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-1" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel-1" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>    
</div>  
<?php
endif;
?>


<div class="alto-pantalla bloque-bienvenida b-bien">
    <div class="titulo-bloque text-center">
        Ofrecemos
    </div>
    <div class="pt-5">
        <div class="container">
            <div class="row m-0">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="texto-bienvenida">
                        <ul>
                            <li>Alimentos duraderos de versatil aplicaciones culinarias</li>
                            <li>Alimentos funcionales de calidad e inocuos</li>
                            <li>Alimentos de consumo instant&aacute;neo y/o para cocci&oacute;n</li>
                            <li>Alimentos que satisfacen las necesidades nutricionales de consumidores con requerimientos especiales de alimentaci&oacute;n, libres de gluten, altos en prote&iacute;na, diur&eacute;ticos, altos en fibra y/o energ&eacute;ticos</li>
                        </ul>
                    </div>

                <div class="lista-categories pt-5">
                    <a href="<?= home_url( ) ?>/category/receta/desayuno/" class="categories" style="background-image: url(<?=get_template_directory_uri()?>/assets/bf.jpg);">
                        <span class="categories-details">
                            <div class="icon"><img src="<?=get_template_directory_uri()?>/assets/bf.svg" alt="Desayuno"></div>
                            <div class="info">Desayuno</div>
                        </span>
                    </a>
                    <a href="<?= home_url( ) ?>/category/receta/almuerzo/" class="categories" style="background-image: url(<?=get_template_directory_uri()?>/assets/lunch.jpg);">
                        <span class="categories-details">
                            <div class="icon"><img src="<?=get_template_directory_uri()?>/assets/lunch.svg" alt="Desayuno"></div>
                            <div class="info">Almuerzo</div>
                        </span>
                    </a>
                    <a href="<?= home_url( ) ?>/category/receta/cena/" class="categories" style="background-image: url(<?=get_template_directory_uri()?>/assets/dinner.jpg);">
                        <span class="categories-details">
                            <div class="icon"><img src="<?=get_template_directory_uri()?>/assets/dinner.svg" alt="Desayuno"></div>
                            <div class="info">Cena</div>
                        </span>
                    </a>
                    <a href="<?= home_url( ) ?>/category/receta/postre/" class="categories" style="background-image: url(<?=get_template_directory_uri()?>/assets/desserts.jpg);">
                        <span class="categories-details">
                            <div class="icon"><img src="<?=get_template_directory_uri()?>/assets/desserts.svg" alt="Desayuno"></div>
                            <div class="info">Postre</div>
                        </span>
                    </a>
                    <a href="<?= home_url( ) ?>/category/receta/vegana/" class="categories" style="background-image: url(<?=get_template_directory_uri()?>/assets/veg.jpg);">
                        <span class="categories-details">
                            <div class="icon"><img src="<?=get_template_directory_uri()?>/assets/veg.svg" alt="Desayuno"></div>
                            <div class="info">Vegana</div>
                        </span>
                    </a>
                    <a href="<?= home_url( ) ?>/category/receta/vegetariana/" class="categories" style="background-image: url(<?=get_template_directory_uri()?>/assets/seafood.jpg);">
                        <span class="categories-details">
                            <div class="icon"><img src="<?=get_template_directory_uri()?>/assets/seafood.svg" alt="Desayuno"></div>
                            <div class="info">Vegetariana</div>
                        </span>
                    </a>
                    <a href="<?= home_url( ) ?>/category/receta/bebida/" class="categories" style="background-image: url(<?=get_template_directory_uri()?>/assets/drinks.jpg);">
                        <span class="categories-details">
                            <div class="icon"><img src="<?=get_template_directory_uri()?>/assets/drinks.svg" alt="Desayuno"></div>
                            <div class="info">Bebidas</div>
                        </span>
                    </a>
                </div>


                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-0">
    <div class="col-md-4">
        <div class="pub-recetas sticky-top">
            <div class="img-fondo d-100vh">
                <img src="<?=get_template_directory_uri()?>/assets/side.jpg" alt="">
            </div>
            <div class="overlay">

            </div>
            <div class="info-txt-recetas centrar-abs text-center z-10">
                <div class="titulo-bloque blanco">
                    Nuestras Recetas
                </div>

                <div class="boton-ik pt-4 pb-4 text-center">
                    <a href="<?= home_url( ) ?>/category/receta/" class="btn btn-light btn-tema">VER TODAS</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="row g-0">

            <?php
            if ( $arr_recetas->have_posts() ) :
                $counter=0;
                while ( $arr_recetas->have_posts() ) :
                    $arr_recetas->the_post();
            ?>

            <div class="col-6 col-md-4">
                <div class="info-nuestra-receta">
                    <div class="card">
                        <a href="<?php the_permalink(  )?>" class="card-body">
                            <div class="img-nuestra-receta hover--spin hover-beat">
                                <img src="<?= (has_post_thumbnail()) ? the_post_thumbnail_url():'' ?>" class="w-75 d-block" alt="">
                            </div>
                            <div class="authoring-nuestra-receta">
                                <div class="autor-nuestra-receta">
                                    De: <strong><?php the_author(  )?></strong>
                                </div>
                                <div class="puntuacion">
                                    <i class="fa-solid fa-eye"></i>
                                    <?php
                                    $post_views_count = get_post_meta( get_the_ID(), '_post_views_count', true );
                                    if ( ! empty( $post_views_count ) ) {
                                        echo  $post_views_count;
                                    }
                                    ?>

                                </div>
                            </div>
                            <div class="titulo-nuestra-receta">
                                <?php the_title(); ?>
                            </div>
                            <div class="fecha-pie">
                                <i class="fa-regular fa-calendar-days"></i>&nbsp;<?= get_the_date( 'F j, Y' ); ?>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        <?php endwhile;endif ?>
        </div>

    </div>
</div>

<?php
if ( $arr_semana->have_posts() ) :
?>
<div class="container alto-pantalla position-relative">  
    <div class="wrapper-receta-semana">
        <div class="titulo-bloque gris ps-4">
            Receta de la Semana
        </div>
        <div class="caja-flotante d-flex">

            <div id="carousel-2" class="carousel slide" data-bs-ride="carousel"> 
                <div class="carousel-inner">
                    <?php $counter=0;while ( $arr_semana->have_posts() ) :
                            $arr_semana->the_post();
                            ?>
                    <div class="carousel-item <?= ($counter==0)?'active':'' ?>" id="post-<?php the_ID(); ?>" >
                        <div class="row g-0">
                            <div class="col-md-5">
                                <a href="<?php the_permalink() ?>">
                                    <div class="img-semana">
                                        <img class="w-100" src="<?= (has_post_thumbnail()) ? the_post_thumbnail_url():'' ?>" alt="">
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-7">
                                <div class="position-relative h-100">
                                <div class="wrapper-info-semana">
                                    <a href="<?php the_permalink() ?>">
                                        <div class="titulo-semana">
                                            <?php the_title() ?>
                                        </div>
                                    </a>
                                    <div class="resumen">
                                        <?php the_excerpt(  ) ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="datos-carousel text-center">
                                                <div class="icono-carousel">
                                                    <i class="fa-solid fa-stopwatch"></i>
                                                </div>
                                                <div class="dato">
                                                    Tiempo de cocci&oacute;n
                                                </div>
                                                <div class="valor">
                                                    <?=get_post_custom()['Tiempo_de_coccion'][0]?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="datos-carousel text-center">
                                                <div class="icono-carousel">
                                                    <i class="fa-solid fa-basket-shopping"></i>
                                                </div>
                                                <div class="dato">
                                                    Ingredientes
                                                </div>
                                                <div class="valor">
                                                    <?=get_post_custom()['Ingredientes'][0]?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="datos-carousel text-center">
                                                <div class="icono-carousel">
                                                    <i class="fa-solid fa-heart-pulse"></i>
                                                </div>
                                                <div class="dato">
                                                    Calor&iacute;as
                                                </div>
                                                <div class="valor">
                                                    <?=get_post_custom()['Caloria'][0]?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-5">
                                        <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-tema-light"> Ver Receta</a>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php $counter++;endwhile?>
            </div>
                <button class="carousel-control-prev top-prev" type="button" data-bs-target="#carousel-2" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon text-black" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next top-next" type="button" data-bs-target="#carousel-2" data-bs-slide="next">
                    <span class="carousel-control-next-icon text-black" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>

<?php endif?>
 


<?php
if ( $arr_blog->have_posts() ) :
?>
<div id="blog">
    <div class="container">
        <div class="titulo-bloque text-center">
            Blog
        </div>
        <div class="row m-0 pb-5">
            <div class="col-md-6 offset-md-3">
                <div class="intro-blog">
                    A continuaci&oacute;n est&aacute;n las &uacute;ltimas entradas a nuestro BLOG, para verlas todas haz click <strong><a href="<?= home_url( ) ?>/category/blog/">Aqu&iacute;</a></strong>.
                </div>
            </div>
        </div>

        <div class="row m-0 justify-content-center pb-5">
            <div class="col-1">
                <div class="divisor-blog">
                </div>
            </div>
        </div>

        <div class="row m-0">

        <?php $counter=0;while ( $arr_blog->have_posts() ) :
                            $arr_blog->the_post();
                            ?>
            <div class="col-md-4 pt-4 pb-5 ps-3 pe-3">
                <div class="card2 bg-white  p-0 h-100">
                    <div class="card2-img">
                        <img src="<?= (has_post_thumbnail()) ? the_post_thumbnail_url():'' ?>" alt="">
                    </div>
                    <div class="card2-body position-relative p-5">
                        <div class="titulo-card2">
                            <?php the_title() ?>
                        </div>
                        <div class="resumen-card2 pt-3">
                            <?php the_excerpt(  )?>
                        </div>
                        <div class="boton pt-4">
                            <a href="<?php the_permalink() ?>" class="btn btn-primary btn-tema text-white"> Leer m&aacute;s&hellip;</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile ?>
        </div>
    </div>
</div>
<?php
endif
?>


<?php
get_footer();
?>