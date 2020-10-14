@php
    $item=config('langs')[Session::get('lang')]['secciones']['cintillos'];
@endphp
<footer id="contacto">
    <div id="divContainerDetFooter" class="container">
        <div class="row clsContBtns">
            <div class="col-6">
                <a class="clsABtns" href="/blog">
                    <div class="clsBtnBlog clsFLX">
                        <div class="clsTextoBlog">{{$item[0]}}</div>
                    </div>
                </a>
            </div>
            <div class="col-6">
                <div class="clsBtnChat clsFLX clsOpenChat">
                    <div class="clsTextoChat">
                        <a href="https://api.whatsapp.com/send?phone=529515484693&text=Hola! Le escribo desde su sitio web."
                            target="_blank">
                            {{$item[1]}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="divWhatsApp">
                <a href="https://api.whatsapp.com/send?phone=529515484693&text=Hola! Le escribo desde su sitio web."
                    target="_blank">
                    <i class="fab fa-whatsapp-square"></i>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="divContTelefono">
                    <div class="clsTelefono clsFLX">
                        <a class="aTelefono" href="tel:9513511764">
                            Tel. 52 (951) 3511764&nbsp;
                        </a>
                        <a class="aTelefono" href="tel:9513511769">
                            y 52 (951) 3511769
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="divTextoDireccion" class="clsFLX">
                    Av. Independencia 1310 Col. Centro, Oaxaca de Juárez, Oax.
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="divContRedesContacto" class="clsFLX">
                    <a href="https://www.facebook.com/oaxaca4meetings" target="_blank"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/oax4meetings" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/oaxaca4meetings/" target="_blank"><i
                            class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="divUp" class="clsFLX">
                    <a href="javascript:topFunction()">
                        <img src="{{ url('/') }}/images/arrow-circle-up.svg" alt="arrow-circle-up" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
<script>
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

</script>
<script src="{{url('/')}}/plugins/SlidePushMenus/classie.js"></script>
<script>
    $("#aBtnX-L").click(function() {
        classie.toggle(this, 'cbp-active');
        classie.toggle(menuLeft, 'cbp-spmenu-open');
        disableOther('showLeft');
        $('#aBtnX-L').removeClass('cbp-active');

        return false;
    });

    $(".clsAMenu").click(function() {
        $('.clsAMenu').removeClass('cbp-active');

        classie.toggle(this, 'cbp-active');
        classie.toggle(menuLeft, 'cbp-spmenu-open');
        disableOther('showLeft');

        $('html, body').animate({
            scrollTop: $($(this).attr('href')).offset().top - 50
        }, 500);
        //window.location.hash = "";
        $(this).addClass('cbp-active');
        return false;
    });


    var menuLeft = document.getElementById('cbp-spmenu-s1'),
        body = document.body;

    showLeft.onclick = function() {
        classie.toggle(this, 'cbp-active');
        classie.toggle(menuLeft, 'cbp-spmenu-open');
        disableOther('showLeft');
    };

    function disableOther(button) {
        if (button !== 'showLeft') {
            classie.toggle(showLeft, 'disabled');
        }
    }


    $(".clsOpenChat").click(function() {
        $(".converse-menu-icon").click();
    });

</script>
<link media="screen" href="{{url('/')}}/plugins/dreamerslab-jquery.msg/jquery.msg.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="{{url('/')}}/plugins/dreamerslab-jquery.msg/jquery.center.min.js"></script>
<script type="text/javascript" src="{{url('/')}}/plugins/dreamerslab-jquery.msg/jquery.msg.min.js"></script>
