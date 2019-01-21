@if (!isset($sinPaginate))
<div class="right-align">
    @php
        $currentPage = $paginate->currentPage();
        $maxPages    = $currentPage + 5;
        $firtsPage   = 1;
        $lastPage    = $paginate->lastPage();
        $nextPage    = $currentPage + 1;
        $forwardPage = $currentPage - 1;
        $paginate->setPath('');
    @endphp
    
    <ul class="pagination">
        {{-- Primera Página --}}
        <li @if ($currentPage == $firtsPage) class="disabled anchoauto" @else class="anchoauto" @endif title="{{trans('message.firstPage')}}">
            <a @if ($currentPage > $firtsPage) href="{{ $paginate->url($firtsPage)}}" @else href="#" @endif>{{trans('message.first')}}</a>
        </li>
        {{-- Página anterior --}}
        <li @if ($currentPage == $firtsPage) class="disabled" @endif title="{{trans('message.previousPage')}}">
            <a @if ($currentPage > $firtsPage) href="{{ $paginate->url($forwardPage)}}" @else href="#" @endif><<</a>
        </li>
        {{-- Númeración de paginas hasta el máximo permitido --}}
        @for ($x = $currentPage; $x < $maxPages; $x++)
            @if ($x <= $lastPage)
                <li @if ($x == $currentPage) class="active" @endif>
                    <a href="{{ $paginate->url($x) }}">{{ $x }}</a>
                </li>
            @endif
        @endfor
        {{-- Siguiente Página --}}
        <li @if ($currentPage == $lastPage) class="disabled" @endif title="{{trans('message.nextPage')}}">
            <a @if ($currentPage < $lastPage) href="{{ $paginate->url($nextPage)}}" @else href="#" @endif>>></a>
        </li>
        {{-- Última página --}}
        <li @if ($currentPage == $lastPage) class="disabled anchoauto" @else class="anchoauto" @endif title="{{trans('message.lastPage')}}">
            <a @if ($currentPage < $lastPage) href="{{ $paginate->url($lastPage)}}" @else href="#" @endif>{{trans('message.last')}}</a>
        </li>
    </ul>
</div>
@endif