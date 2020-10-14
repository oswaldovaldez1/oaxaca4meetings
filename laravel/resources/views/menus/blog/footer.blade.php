@php
    $item=config('langs')[Session::get('lang')]['secciones']['blog'];
@endphp    
<div id="menu-blog-footer" class="clsNoPadding_">
    <div class="row no-gutters_">
        <div class="col-12 clsNoPadding">
            <img class="img-menu-blog-footer" src="{{url('/')}}/images/contacto/banner_contactanos.jpg"/>
            <div class="cont-blog-contacto">
                <a class="clsExeContacto" href="#">{{$item[5]}}</a>
            </div>
        </div>
    </div>
</div>
