<?php $__env->startSection('post'); ?>
    <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col s12 m4 l4">
        <div class="card basic">
            <div class="card-image waves-effect waves-block waves-light">
                <div class="cardHeader">
                    <h3 class="cardHeaderText">
                        <a href="<?php echo e(asset('/tema')); ?>/<?php echo e($post->slug); ?>" target="_blank">
                            <?php echo e($post->tema_txt); ?>

                        </a>
                    </h3>
                </div>
            </div>
            <a href="<?php echo e(asset('/post')); ?>/<?php echo e($post->slug); ?>">
                <div class="card-content">
                    <h2 class="card-title activator grey-text text-darken-4"><?php echo e($post->post_tit); ?></h2>
                </div>
            </a>
            <div class="cardFooter"><a href="<?php echo e(asset('/post')); ?>/<?php echo e($post->slug); ?>">Leer Mas..!</a></div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.plantilla_footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layout.plantilla_tematica', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layout.plantilla_autor', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layout.plantilla_header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layout/index', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>