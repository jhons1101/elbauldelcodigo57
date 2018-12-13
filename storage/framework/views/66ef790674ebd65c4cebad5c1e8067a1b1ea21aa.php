<!-- sección de imagenes para cada post -->
<?php $__env->startSection('img-for-share'); ?>
    <!--<meta property="og:image" content="<?php echo e(asset('/img/curso-de-plsql-elbauldelcodigo.jpg')); ?>" />
    <link href="<?php echo e(asset('/img/curso-de-plsql-elbauldelcodigo.jpg')); ?>" rel="image_src" />
    <link href="<?php echo e(asset('/img/curso-de-plsql-elbauldelcodigo.jpg')); ?>" rel="image_src" />
    <meta name="twitter:image" content="<?php echo e(asset('/img/curso-de-plsql-elbauldelcodigo.jpg')); ?>">
    <meta name="twitter:image" content="<?php echo e(asset('/img/curso-de-plsql-elbauldelcodigo.jpg')); ?>">-->
    <!-- Resumen de la tarjeta de Twitter con la imagen grande debe ser al menos 280x150px -->
    <!--<meta name="twitter:image:src" content="<?php echo e(asset('/img/curso-de-plsql-elbauldelcodigo.jpg')); ?>">
    <meta name="twitter:image:src" content="<?php echo e(asset('/img/curso-de-plsql-elbauldelcodigo.jpg')); ?>">
    <meta itemprop="image" content="<?php echo e(asset('/img/curso-de-plsql-elbauldelcodigo.jpg')); ?>">
    <meta itemprop="image" content="<?php echo e(asset('/img/curso-de-plsql-elbauldelcodigo.jpg')); ?>">-->
<?php $__env->stopSection(); ?>


<!-- sección de javascript propios del post -->
<?php $__env->startSection('javascript'); ?>

<?php $__env->stopSection(); ?>


<!-- sección de css propios de este post -->
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>


<!-- sección para pintar el listado de las descriciones de los post -->
<?php $__env->startSection('TagsPost'); ?>
    <?php $__currentLoopData = $txtTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="/tags/<?php echo e($tag); ?>" target="_blank"> <?php echo e($tag); ?> </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<!-- sección para el contenido introductorio del post -->
<?php $__env->startSection('PostContent'); ?>
<?php echo e($Posts[0]->desc_post); ?>

<?php $__env->stopSection(); ?>


<!-- sección para definir el código fuente y los detalles del post -->
<?php $__env->startSection('CodigoFte'); ?>
<?php echo e($Posts[0]->des_code); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.plantilla_footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layout.plantilla_header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layout.plantilla_post', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>