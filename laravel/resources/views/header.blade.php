<div id="divContMenuPrincipal" data-spy="affix" data-offset-top="380">
    <nav id="divMenuPrincipal" class="navbar navbar-default navbar-fixed-top container">
        <div class="navbar-header">
            <h1 id="logo">
                <a id="aBrand" class="navbar-brand" href="/">
                    <img id="imgLogo" src="{{ url('/') }}/images/logo-oaxaca4meeting.png"
                        alt="imgLogo" />Oaxaca4Meetings
                </a>
            </h1>
        </div>
        <div id="navbar" class="navbar-collapse collapse_ clsNoMargin">
            <ul id="ulNavBar" class="nav navbar-nav navbar-right">
            @foreach (config('langs')[Session::get('lang')]['menu'] as $item)
            
                <li>
                    <a class="{{$item['class']}}" href="{{$item['url']}}">
                        {!!$item['titulo']!!}
                    </a>
                </li>
                <li class="clsAMenuPrincipalDivision"></li>
            @endforeach
                {{-- <li>
                    <a class="clsAMenuPrincipal" href="#por-que">
                        <div>¿Por qué</div>
                        <div>elegirnos?</div>
                    </a>
                </li>
                <li class="clsAMenuPrincipalDivision"></li>
                <li>
                    <a class="clsAMenuPrincipal" href="#acercade">
                        <div>Acerca de</div>
                        <div>la empresa</div>
                    </a>
                </li>
                <li class="clsAMenuPrincipalDivision"></li>
                <li>
                    <a class="clsAMenuPrincipal" href="#experiencias">
                        <div>Viajes de incentivo</div>
                        <div>Experiencias</div>
                    </a>
                </li>
                <li class="clsAMenuPrincipalDivision"></li>
                <li>
                    <a class="clsAMenuPrincipal" href="#eventos">
                        <div>Eventos</div>
                        <div>Especiales</div>
                    </a>
                </li>
                <li class="clsAMenuPrincipalDivision"></li>
                <li>
                    <a class="clsAMenuPrincipal" href="#destinos">
                        <div>Nuestros</div>
                        <div>Destinos</div>
                    </a>
                </li>
                <li class="clsAMenuPrincipalDivision"></li>
                <li>
                    <a class="clsAMenuPrincipal clsAMenuBlog" href="/blog">
                        <div>BLOG</div>
                    </a>
                </li>
                <li class="clsAMenuPrincipalDivision"></li>
                <li>
                    <a class="clsAMenuPrincipal clsExeContacto" href="#">
                        <div>CONTACTO</div>
                    </a>
                </li>
                <li class="clsAMenuPrincipalDivision"></li> --}}
                <li>
                    <select class="custom-select selectLang" id="selectLang">
                        <option value="ES" @if (Session::get('lang') === 'ES')
                            {{ 'selected' }}
                            @endif>{{ country_flag('MX') }}</option>
                        <option value="EN" @if (Session::get('lang') === 'EN')
                            {{ 'selected' }}
                            @endif>{{ country_flag('US') }}</option>
                    </select>
                </li>
            </ul>
        </div>
        <!--/.nav-collapse -->
        @include('menus.movil')
    </nav>
</div>
