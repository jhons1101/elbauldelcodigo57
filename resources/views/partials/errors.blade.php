@if (session('msgStatus'))
    @if (session('status') == 1)
        <div class="card-panel  green-text text-darken-4 green lighten-5">
            {{ trans('message.saveOk', ['module' => trans('message.'.session('statusModule'))]) }}
        </div>
    @else
        <div class="card-panel red-text text-darken-4 red lighten-5">
            {{ trans('message.saveBad', ['module' => trans('message.'.session('statusModule')), 'sqlerror' => session('sqlerror')]) }}
        </div>
    @endif
@endif