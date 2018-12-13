<!DOCTYPE html> 
<html lang="es"> 
    <head>
        <title><?php echo $__env->yieldContent('seccion'); ?>/ El baúl del código</title>
        <meta charset="utf-8" />
        <link rel="shortcut icon" href="<?php echo e(asset('/')); ?>img/BaulCode.png" type="image/png" />
        <meta content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=yes" name="viewport">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link href='http://fonts.googleapis.com/css?family=Josefin+Sans:300,400,600' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo e(asset('/css/normalize.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('/fonts/style.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('/css/footer.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('/css/style.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('/css/nav.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('/css/materialize.css')); ?>">
    </head>   
    <body>
        <input type="checkbox" id="nav-toggle" />
        <nav class="nav" style="overflow-y: autoo;">
            <div class="nav-div">
                <label for="nav-toggle" class="nav-toggle" onclick>☰</label>
                <ul class="ul">
                    <li>
                        <a href="">
                            <span class="nav-ul-li-span" style="display: unset;">El baúl del código</span>
                        </a>
                    </li>
                    <li>
                        <a href="tus-puntos">
                            <i class="icon-lifebuoy" style="display: unset;"></i>&nbsp; Tus Puntos
                        </a>
                    </li>
                    <li>
                        <a href="tus-preguntas">
                            <i class="icon-notification" style="display: unset;"></i>&nbsp; Tus Preguntas
                        </a>
                    </li>
                    <li>
                        <a href="tus-respuestas">
                            <i class="icon-compass" style="display: unset;"></i>&nbsp; Tus Respuestas
                        </a>
                    </li>
                    <li>
                        <a href="dudas">
                            <i class="icon-question" style="display: unset;"></i>&nbsp; ¿ Necesitas ayuda.? Pregunta ahora!
                        </a>
                    </li>
                    <li>
                        <a href="reponde">
                            <i class="icon-checkmark2" style="display: unset;"></i>&nbsp; Responder
                        </a>
                    </li>
                    
                    <li>
                        <a href="favoritos">
                            <i class="icon-star-half" style="display: unset;"></i>&nbsp; Favoritos
                        </a>
                    </li>
                    <li>
                        <a href="configuracion">
                            <i class="icon-cogs" style="display: unset;"></i>&nbsp; Configuración
                        </a>
                    </li>
                </ul>
                <div class="nav-div-footer">
                    <img src="<?php echo e(asset('/')); ?>img/usuarios/img_default.png" alt="usuario nombre" class="nav-div-img">
                    <span class="nav-div-span">Usuario</span>
                </div>
            </div>
        </nav>
        <nav>
            <div class="nav-wrapper">
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="/admin/">Administrar</a></li>
                    <li><a href="/post/create">Publicar</a></li>
                    <li><a href="/post/showUser">Mis publicaciones</a></li>
                </ul>
            </div>
        </nav>
        <div class="contenedor">
        
            <?php echo $__env->yieldContent('contenido'); ?>
        </div>
        <?php echo $__env->yieldContent('footer'); ?>
        <script type="text/javascript" src="<?php echo e(asset('/js/jquery-1.11.1.min.js')); ?>"></script>
        <script src="<?php echo e(asset('/js/admin.js')); ?>"></script>
        <script src="<?php echo e(asset('/js/modernizr.js')); ?>"></script>
        <script src="<?php echo e(asset('/materialize/js/materialize.min.js')); ?>"></script>
        <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
        <script type="text/javascript">
            <?php echo $__env->yieldContent('javascript'); ?>
        </script>
    </body>
</html>