@php
    $item=config('langs')[Session::get('lang')]['secciones']['destinos'];
@endphp
<div id="destinos">
    <div class="container-fluid clsNoPadding">
        <div class="row no-gutters">
            <div class="col-12">
                <div class="cls-titulo-1">{{$item[0]}}</div>
                <div class="cls-titulo-2">{{$item[1]}}</div>
            </div>
        </div>
        @include('menus.eventos')
    </div>
</div>
