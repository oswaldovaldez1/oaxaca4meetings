<div id="divContButtonMenu" class="clsIcoMenuTop"><button id="showLeft"></button></div>

<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
    <div><a id="aBtnX-L" class="clsBtnX" href="/#">
            <div><img id="imgCloseMenu" src="{{url('/')}}/images/close-menu.svg" alt="destino" /></div>
        </a></div>
        @foreach (config('langs')[Session::get('lang')]['menu'] as $item)
        @if ($item['url']==='#')
            <a class="clsAMenu_ clsExeContacto" href="{{$item['url']}}">
                <div class="clsItemMenuMovil">
                    {{$item['movil']}}
                </div>
            </a>  
        @else
            <a class="clsAMenu" href="{{$item['url']}}">
                <div class="clsItemMenuMovil">
                    {{$item['movil']}}
                </div>
            </a>  
        @endif
            
        @endforeach
    {{-- <a class="clsAMenu" href="/#por-que">
        <div class="clsItemMenuMovil">¿Por qué elegirnos?</div>
    </a>
    <a class="clsAMenu" href="/#acercade">
        <div class="clsItemMenuMovil">Acerca de la empresa</div>
    </a>
    <a class="clsAMenu" href="/#experiencias">
        <div class="clsItemMenuMovil">Viajes de incentivo</div>
    </a>
    <a class="clsAMenu" href="/#eventos">
        <div class="clsItemMenuMovil">Eventos Especiales</div>
    </a>
    <a class="clsAMenu" href="/#destinos">
        <div class="clsItemMenuMovil">Nuestros destinos</div>
    </a>
    <a class="clsAMenu" href="/blog">
        <div class="clsItemMenuMovil">Blog</div>
    </a>
    <a class="clsAMenu_ clsExeContacto" href="javascript:void(0);">
        <div class="clsItemMenuMovil">Contacto</div>
    </a> --}}
    <a class="clsAMenu_ " href="javascript:void(0);">
        <div class="clsItemMenuMovil">
            <select class="custom-select selectLang" id="selectLang">
                <option value="ES" @if (Session::get('lang') === 'ES')
                    {{ 'selected' }}
                    @endif>{{ country_flag('MX') }}</option>
                <option value="EN" @if (Session::get('lang') === 'EN')
                    {{ 'selected' }}
                    @endif>{{ country_flag('US') }}</option>
            </select>
        </div>
    </a>
</nav>
