<!-- Modal para botón código embebido -->
<div id="modal1" class="modal modal-fixed-footer" style="width: 550px;height: 320px;">
<div class="modal-content">
        <div class="text-description">{{ trans('message.copyCode') }}</div>
        <br />
        <script>
            document.write('<p>&#60;iframe width="560" height="315" src="'+document.URL+'" frameborder="0" allowfullscreen>&#60;/iframe&#62;</p>')
        </script>
        <br />
        <span class="text-description">{{ trans('message.changeProperties') }}</span>
</div>
    <div class="modal-footer">
        <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">{{ trans('message.accept') }}</a>
    </div>
</div>

<!-- Modal para botón compartir URL -->
<div id="modal2" class="modal modal-fixed-footer" style="width: 550px;height: 210px;">
<div class="modal-content">
        <div class="text-description">{{ trans('message.copyCode') }}</div>
        <br />
        <script>
            document.write('<p>&#60;a href="'+document.URL+'" target="_blank">{{ trans('message.visitNow') }}&#60;/a&#62;</p>')
        </script>
    </div>
    <div class="modal-footer">
        <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">{{ trans('message.accept') }}</a>
    </div>
</div>