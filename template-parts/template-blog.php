<div class="row">
        <div class="col-12 col-md-8 border-end pt-4">
            <div class="post-title titulo-bloque text-center pb-4">
                <?php the_title() ?>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="img-post-16-9">
                        <?php if(has_post_thumbnail(  )):?>
                            <img src="<?= the_post_thumbnail_url() ?>" alt="" class="img-fluid">
                        <?php endif?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="cuerpo-nota p-3 p-md-5">
                            <div class="fecha pb-3">
                            <i class="fa-regular fa-calendar-days"></i> <?= the_date() ?>
                            </div>
                            <?php the_content() ?>
                            <div class="archivados-bajo">
                                <span>
                                    Categoría:
                                </span>
                                <span>
                                    <?php the_category(  ) ?>
                                </span>
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