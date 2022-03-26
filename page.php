<?php
get_header();
customSetPostViews(get_the_ID());//page.php
?>

<div class="container post">
    <!-- <h1><?= get_bloginfo( 'name' )?></h1> -->

    <?php if (have_posts(  )): while(have_posts(  ) ): the_post();?>
        <?php
            get_template_part( 'template-parts/template', 'blog' );
        ?>
    <?php endwhile;endif;?>
</div>
<style>
body.page{
    background-color: #f9f9f9;
}
body.page .fecha{
    display: none;
}
body.page .container.post{
    background-color: white;
    color:#555;
}
body.page .img-post{
    aspect-ratio: 1/1;
}
body.page .img-post img{
    width: 100%;
    height: 100%;
    object-fit: cover;
}
body.page .bg-datos{
    background-color: #e7e7e7;
}
body.page .dato-receta-titulo{
    color:#555;
    font-size: 20px;
    text-align: center;
    padding-bottom:15px;
    letter-spacing: 0;
}
body.page .valor{
    font-family: "Noto Sans", sans-serif ;
}
body.page .tags{
    font-size: 0.8em;
    margin-top:8px;
}
body.page .tag {
    padding-right:10px;
}
body.page .tag i{
    padding-right:2px;
}
body.page .post-categories{
    list-style: none;
    display:flex;
    padding-left:0px;
    margin-bottom:0;
    margin-top:0;
    flex-wrap: wrap;
}
body.page .archivados-bajo {
    display:flex;
    font-size: 0.8em;
    padding-top:20px;
    align-items: flex-end;
}
body.page .post-categories li{
    margin-right:5px;
    padding:2px 3px;
    background:#444;
    color:white;
    line-height: 1.1;
    margin-top:3px;
    margin-bottom:0;
    border-radius: 2px;
    box-shadow:1px 1px 3px #777;
    transition: 0.3s;
    transform:skew(-15deg)
}
body.page .post-categories li:hover{
    box-shadow:none;
}
body.page .post-categories li a{
    color:white
}
body.page .post-categories:before{
    content:'Categorías:';
    position: relative;
    top:4px;
    padding-right:5px;
    display: block;
}
body.page .cuerpo-nota{
    font-family: "Noto Sans", sans-serif ;
    font-size: 14px;
}
body.page .img-post-16-9{
    aspect-ratio: 16 / 9;
}
body.page .img-post-16-9 img{
    height: 100%;
    width: 100%;
    object-fit: cover;
}
body.page .post-title{
    font-size: 32px;
}
body.page .fecha{
    font-size: 0.9em;
    color:#777;
}
@media (min-width: 768px) {

    body.page{
        padding-top:75px;
    }
    body.page .info-dato-receta{
        width:calc(100% - 21px);
        position:absolute;
        top:50%;
        left:50%;
        transform: translate(-50%, -50%);
    }
    body.page .post-title{
        font-size: 42px;
    }
}
</style>
<?php
get_footer();
?>