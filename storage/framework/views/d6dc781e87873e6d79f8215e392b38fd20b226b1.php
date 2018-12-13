<?php $__env->startSection('tematica'); ?>  
<div class="col s12 m12 l12 tematica">
    <div class="col s12">
        <div class="row">
            <div class="col s12 subtitle">Visita nuestras publicaciones</div>
        </div>
        <ul class="collapsible" data-collapsible="accordion">
            <?php $__currentLoopData = $temas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tema): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <div class="collapsible-header"><i class="icon-<?php echo e($tema->tema_img); ?>"></i><?php echo e($tema->tema_txt); ?></div>
                <div class="collapsible-body">                       
                    <?php $__currentLoopData = $entradas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entrada): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($entrada->tema_txt == $tema->tema_txt): ?>
						<div class="tema-collapsible">
							<a href="<?php echo e(asset('/')); ?>" title="Por : <?php echo e($entrada->usuarios_name); ?> el <?php echo e($entrada->post_fec); ?>" target="_blank">
								<b>* </b><?php echo e($entrada->post_tit); ?>

							</a>
						</div>
						<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
<?php $__env->stopSection(); ?>