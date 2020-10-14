@php
    $item=config('langs')[Session::get('lang')]['secciones']['experiencias'];
@endphp
<div id="experiencias">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cls-titulo-1">{{$item[0]}}</div>
                <div class="cls-titulo-2">{{$item[1]}}</div>
            </div>
        </div>


    </div>
    @include('menus.viajes')
</div>
