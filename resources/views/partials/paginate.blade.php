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
        <li @if ($currentPage == $firtsPage) class="disabled anchoauto" @else class="anchoauto" @endif title="Primera página">
            <a @if ($currentPage > $firtsPage) href="{{ $paginate->url($firtsPage)}}" @else href="#" @endif>Primera</a>
        </li>
        {{-- Página anterior --}}
        <li @if ($currentPage == $firtsPage) class="disabled" @endif title="Página anterior">
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
        <li @if ($currentPage == $lastPage) class="disabled" @endif title="Siguiente página">
            <a @if ($currentPage < $lastPage) href="{{ $paginate->url($nextPage)}}" @else href="#" @endif>>></a>
        </li>
        {{-- Última página --}}
        <li @if ($currentPage == $lastPage) class="disabled anchoauto" @else class="anchoauto" @endif title="Última página">
            <a @if ($currentPage < $lastPage) href="{{ $paginate->url($lastPage)}}" @else href="#" @endif>Última</a>
        </li>
    </ul>
</div>