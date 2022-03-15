<div class="row">
    <div class="col-12 col-md-8 border-end pt-4">
        <div class="post-title titulo-bloque text-center pb-4">
            <?php the_title() ?>
        </div>
    
        <div class="row">
            <div class="col-12 col-md-6 pe-md-0">
                <div class="img-post">
                    <?php if(has_post_thumbnail(  )):?>
                        <img src="<?= the_post_thumbnail_url() ?>" alt="" class="img-fluid">
                    <?php endif?>
                </div>
            </div>
            <div class="col-12 col-md-6 bg-datos position-relative ps-md-0">
                <div class="info-dato-receta pb-4 pb-md-0">
                    <div class="dato-receta-titulo titulo-bloque pt-4 pt-md-0">
                        Datos de la receta
                    </div>
                    <div class="d-flex justify-content-around position-relative">
                        <div class="datos-carousel  text-center">
                            <div class="icono-carousel">
                                <i class="fa-solid fa-stopwatch"></i>
                            </div>
                            <div class="valor">
                                <?=get_post_custom()['Tiempo_de_coccion'][0]?>
                            </div>
                        </div>
                        <div class="datos-carousel  text-center">
                            <div class="icono-carousel">
                                <i class="fa-solid fa-basket-shopping"></i>
                            </div>
                            <div class="valor">
                                <?=get_post_custom()['Ingredientes'][0]?>
                            </div>
                        </div>
                        <div class="datos-carousel text-center">
                            <div class="icono-carousel">
                                <i class="fa-solid fa-heart-pulse"></i>
                            </div>
                            <div class="valor">
                                <?=get_post_custom()['Caloria'][0]?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="cuerpo-nota p-3 p-md-5">
                        <div class="fecha pb-3 ">
                            <i class="fa-regular fa-calendar-days"></i> <?= the_date( ) ?>
                        </div>
                        <?php the_content() ?>
                        <div class="archivados-bajo">
                                <!-- Categoría: -->
                                <?php the_category(  ) ?>
                        </div>
                        <?php if (has_tag( )): ?>
                            <div class="tags">
                                Etiquetas: <?php the_tags('<span class="tag"><i class="fa fa-tag"></i>','</span><span class="tag"><i class="fa fa-tag"></i>','</span>') ?>  
                            </div>
                        <?php endif?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4 h-100 pt-4">
        Lo que se quiera colocar de este lado
    </div>
</div>