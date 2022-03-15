<?php
    wp_footer();
?>
<style>
html{ 
    height:100%; 
}
body{ min-height:100%;
    padding:0;
    margin:0;
    position:relative; 
}
body::after{
    content:'';
    display:block;
    height:35px; 
}
.iksir-footer{ 
    position:absolute; 
    bottom:0; 
    width:100%; 
    height:35px; 
    overflow: hidden;
    font-family: Raleway,Roboto,Arial,Arial, Helvetica, sans-serif;
    font-size: 12px;
    line-height: 0.9;
}
</style>
    <footer class="iksir-footer">
        <div class="d-flex justify-content-between ps-3 pe-3 pt-2 pb-2">
            <div class="div copyright">
                &copy; IKSIR Todos los derechos reservados
            </div>
            <div class="autor-plantilla">
                WEB por Christian De Freitas
            </div>
        </div>
    </footer>
</body>
</html>