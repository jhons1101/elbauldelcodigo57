@if (session('msgStatus'))
    @if (session('status') == 1)
        <div class="card-panel  green-text text-darken-4 green lighten-5">
            {{ session('msgStatus') }}
        </div>
    @else
        <div class="card-panel red-text text-darken-4 red lighten-5">
            {{ session('msgStatus') }}
        </div>
    @endif
<br />
@endif