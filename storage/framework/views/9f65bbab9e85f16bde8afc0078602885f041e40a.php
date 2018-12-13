<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Crear nueva entrada</title><meta charset="UTF-8">
        <link rel="shortcut icon" href="<?php echo e(asset('/img/claves-elbauldelcodigo_ico.png')); ?>" type="image/png" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="<?php echo e(asset('/css/materialize.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('/css/index.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('/fonts/style.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('/css/print-index.css')); ?>" type="text/css" media="print" />
        <link rel="image_src"  href="https://fonts.googleapis.com/css?family=Poiret+One">
        <link rel="image_src"  href="https://fonts.googleapis.com/css?family=Kavivanar|Pacifico">
	</head>
	<body>
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">Logo</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="sass.html">Sass</a></li>
                    <li><a href="badges.html">Components</a></li>
                    <li><a href="collapsible.html">JavaScript</a></li>
                </ul>
            </div>
        </nav>
		<div class="container">
            <div class="row">&nbsp;</div>
			<?php echo $__env->yieldContent('content'); ?>
        </div>
        <script src="<?php echo e(asset('/js/jquery-1.11.1.min.js')); ?>"></script>
        <script src="<?php echo e(asset('/materialize/js/bin/materialize.min.js')); ?>"></script>
        <script src="<?php echo e(asset('/js/index.js')); ?>"></script>
        <script type="text/javascript">
            <?php echo $__env->yieldContent('javascript'); ?>
        </script>
	</body>
</html>