<!-- sección de javascript propios del post -->
<?php $__env->startSection('javascript'); ?>

    $(document).ready(function(){
        $('select').material_select();
    });


    tinymce.init({
        selector: '.textareaTiny',
        theme: 'modern',
        plugins: [
            'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'save table contextmenu directionality emoticons template paste textcolor'
        ],
        content_css: 'css/tidy.css',
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview media fullpage | forecolor backcolor'
    });
<?php $__env->stopSection(); ?>

<!-- secciónpara cargar la foto del usuario de la sessión del post -->
<?php $__env->startSection('img-usuario'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('contenido'); ?>
    <div class="row">
        <h2>Crear nuevo POST</h2>
        <hr />
    </div>
    <div class="row">
        <div class="col s12 m12 l12">
            <form class="" action="/post" method="POST">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col s12 m6 l6">
                        <div class="input-field">
                            <label for="tit_post" data-error="wrong" data-success="right" class="labelbk">Título</label>
                            <input type="text" class="" id="tit_post" name="txtTitPost">
                        </div>
                    </div>
                    <div class="col s12 m6 l6">
                        <div class="input-field">
                            <select id="tem_post" name="txtTemPost">
                                <?php $__currentLoopData = $temaPost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tema): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($tema->tema_id); ?>"><?php echo e($tema->tema_txt); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <label>Tema principal</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 l6">
                        <div class="input-field">
                            <label for="slug_post" data-error="wrong" data-success="right" class="labelbk">Slug</label>
                            <input type="text" class="" id="usu_post" name="txtUsuPost" value="1" style="display:none;">
                            <input type="text" class="" id="slug_post" name="txtSlugPost">
                        </div>
                    </div>
                    <div class="col s12 m6 l6">
                        <div class="input-field">
                            <select multiple name="txtTagsPost">
                                <option value="" selected>Seleccione</option>
                                <?php $__currentLoopData = $tagsPost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($tag->tag_id); ?>"><?php echo e($tag->tag_txt); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <label>Tags</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="input-field">
                            <label for="key_post" data-error="wrong" data-success="right" class="labelbk">Keys</label>
                            <input type="text" class="" id="key_post" name="txtKeyPost">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="input-field">
                            <label for="des_post" data-error="wrong" data-success="right" class="labelbk">Describe</label>
                            <input type="text" class="" id="des_post" name="txtDesPost">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="input-field">
                            <textarea class="textareaTiny" name="textareaPost">Ingrese la descripcion del post</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="input-field">
                            <textarea class="textareaTiny" name="textareaCode">Ingrese la información complementaria, código fuente y evidencias del código que se está probando</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 l6">
                        <label for="txtPubPost" data-error="wrong" data-success="right" class="labelbk">Publicar</label>
                        <div class="switch">
                            <label>
                                NO
                                <input type="checkbox" name="txtPubPost" id="txtPubPost">
                                <span class="lever"></span>
                                SI
                            </label>
                        </div>
                    </div>
                    <div class="col s12 m6 l6">
                        <div class="input-field">
                            <select id="tip_post" name="txtTipPost">
                                <?php $__currentLoopData = $tipoPost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($tipo->tipo_id); ?>"><?php echo e($tipo->tipo_txt); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <label>Tipo de entrada</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="input-field">
                            <button class="waves-effect waves-light btn-large" type="submit" name="action">Guardar
                                <i class="material-icons right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('sistemaAdmin/footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layout/admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>