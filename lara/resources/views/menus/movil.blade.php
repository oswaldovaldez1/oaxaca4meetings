<div id="divContButtonMenu" class="clsIcoMenuTop"><button id="showLeft"></button></div>

<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
    <div><a id="aBtnX-L" class="clsBtnX" href="#">
            <div><img id="imgCloseMenu" src="images/close-menu.svg" alt="destino" /></div>
        </a></div>
    <a class="clsAMenu" href="#por-que">
        <div class="clsItemMenuMovil">¿Por qué elegirnos?</div>
    </a>
    <a class="clsAMenu" href="#acercade">
        <div class="clsItemMenuMovil">Acerca de la empresa</div>
    </a>
    <a class="clsAMenu" href="#experiencias">
        <div class="clsItemMenuMovil">Viajes de incentivo</div>
    </a>
    <a class="clsAMenu" href="#eventos">
        <div class="clsItemMenuMovil">Eventos Especiales</div>
    </a>
    <a class="clsAMenu" href="#destinos">
        <div class="clsItemMenuMovil">Nuestros destinos</div>
    </a>
    <a class="clsAMenu" href="/blog">
        <div class="clsItemMenuMovil">Blog</div>
    </a>
    <a class="clsAMenu_ clsExeContacto" href="javascript:void(0);">
        <div class="clsItemMenuMovil">Contacto</div>
    </a>
    <a class="clsAMenu_ " href="javascript:void(0);">
        <div class="clsItemMenuMovil">
            <select class="custom-select selectLang" id="selectLang">
                <option value="MX" @if (Session::get('lang') === 'MX')
                    {{ 'selected' }}
                    @endif>{{ country_flag('MX') }}</option>
                <option value="US" @if (Session::get('lang') === 'US')
                    {{ 'selected' }}
                    @endif>{{ country_flag('US') }}</option>
            </select>
        </div>
    </a>
</nav>
