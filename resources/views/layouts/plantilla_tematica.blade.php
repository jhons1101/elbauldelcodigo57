@section('tematica')  
<div class="col s12 m12 l12 tematica">
    <div class="col s12">
        <div class="row">
            <div class="col s12 subtitle">{{ trans('message.visitPub') }}</div>
        </div>
        <ul class="collapsible" data-collapsible="accordion">
            @foreach ($temas as $tema)
                <li>
                    <div class="collapsible-header"><i class="icon-{{$tema->tema_img}}"></i>{{$tema->tema_txt}}</div>
                    <div class="collapsible-body">                       
                        @foreach ($entradas as $entrada)
                            @if ($entrada->tema_txt == $tema->tema_txt)
                                <div class="tema-collapsible">
                                    <a href="{{ asset('/post') }}/{{$entrada->slug}}" title="Por : {{$entrada->name}} el {{$entrada->post_fec}}" target="_blank">
                                        <b>* </b>{{$entrada->post_tit}}
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@stop