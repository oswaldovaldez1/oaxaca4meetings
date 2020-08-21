<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Oaxaca4Meetings</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/') }}/favicon.png">
    <link rel="stylesheet" href="{{ url('/') }}/plugins/bootstrap/css/bootstrap.min.css" />
    <link href="{{ url('/') }}/css/app.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/plugins/SlidePushMenus/component.css" />

    {{--
    <link href="{{ url('/') }}/css/paginacion.css" type="text/css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ url('/') }}/plugins/fontawesome/css/brands.css" />
    <link rel="stylesheet" href="{{ url('/') }}/plugins/fontawesome/css/fontawesome.css" />
    <link rel="stylesheet" href="{{ url('/') }}/plugins/fontawesome/css/all.css" />
    <script src="{{ url('/') }}/js/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/plugins/slider-pro/css/slider-pro.css" media="screen" />

</head>

<body>
    <link href="{{ url('/') }}/plugins/please-wait/css/please-wait.css" rel="stylesheet">
    <script type="text/javascript" src="{{ url('/') }}/plugins/please-wait/js/please-wait.min.js"></script>
    <script type="text/javascript">
        window.loading_screen = window.pleaseWait({
            logo: "{{ url('/') }}/images/logo-oaxaca4meeting.png",
            backgroundColor: '#FFFFFF',
            loadingHtml: ""
        });
        jQuery(document).ready(function() {
            window.loading_screen.finish();
        });

    </script>
    @include('header2')


    @yield('content')
    @include('modal')
    @include('footer')
    <script src="{{ url('/') }}/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/plugins/slider-pro/js/jquery.sliderPro.js"></script>
    <script type="text/javascript">
        var tipoDato = "";

        function problemas(datos) {}

        function fnCargaDatos(datos) {
            jQuery("#jquery-msg-overlay").hide();

            var obj = jQuery.parseJSON(datos);
            var strResp = obj.Resp;

            $("#frmContacto").addClass("clsDisplayNone");
            $(".clsContPriMsjContacto").removeClass("clsDisplayNone");

            $("#frmContacto").trigger("reset");

        }

        function fnIiniciaEnvio() {
            strMsj = 'Enviando...';
            jQuery.msg({
                content: strMsj,
                timeOut: 1000
            });
        }

        function eliminaEspacios(cadena) {
            while (cadena.charAt(cadena.length - 1) == " ") cadena = cadena.substr(0, cadena.length - 1);
            while (cadena.charAt(0) == " ") cadena = cadena.substr(1, cadena.length - 1);
            return cadena;
        }

        function fnEnviaEmail() {
            var txtNombre = document.getElementById("txtNombre").value;
            var txtEmail = document.getElementById("txtEmail").value;
            var txtTelefono = document.getElementById("txtTelefono").value;
            var txtEmpresa = document.getElementById("txtEmpresa").value;
            var txtMensaje = document.getElementById("txtMensaje").value;
            txtEmail = eliminaEspacios(txtEmail);

            if (txtNombre == null || txtNombre.length == 0 || /^\s+$/.test(txtNombre)) {
                strMsj = 'Tiene que escribir su nombre.';
                jQuery.msg({
                    content: strMsj
                });
                document.getElementById("txtNombre").focus();
                return false;
            }

            if (txtEmail == null || txtEmail.length == 0 || /^\s+$/.test(txtEmail)) {
                strMsj = 'Tiene que escribir su e-mail.';
                jQuery.msg({
                    content: strMsj
                });
                document.getElementById("txtEmail").focus();
                return false;
            } else {
                if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(txtEmail)) {
                    if (txtMensaje == null || txtMensaje.length == 0 || /^\s+$/.test(txtMensaje)) {
                        strMsj = 'Tiene que escribir su comentario.';
                        //capa.innerHTML='Tiene que escribir su comentario.';
                        jQuery.msg({
                            content: strMsj
                        });
                        document.getElementById("txtMensaje").focus();
                        return false;
                    }
                    jQuery.ajax({
                        async: true,
                        type: "POST",
                        dataType: "html",
                        contentType: "application/x-www-form-urlencoded",
                        url: "ajax/ajaxEnviaEmail.php", //modificar ruta
                        data: "submit=&txtNombre=" + txtNombre + "&txtEmail=" + txtEmail + "&txtTelefono=" +
                            txtTelefono + "&txtEmpresa=" + txtEmpresa + "&txtMensaje=" + txtMensaje,
                        beforeSend: fnIiniciaEnvio,
                        success: fnCargaDatos,
                        timeout: 4000,
                        error: problemas
                    });
                    return false;
                } else {
                    strMsj = 'La direcci&oacute;n de e-mail es incorrecta.';
                    jQuery.msg({
                        content: strMsj
                    });
                    document.getElementById("txtEmail").focus();
                    return (false);
                }
            }
        }

    </script>
    <script type="text/javascript">
        $(document).ready(function($) {
            $(".selectLang").change(function() {
                window.location.href = "{{ url('/') }}/session/" + $(this).val();
            });

            $(".clsExeContacto").click(function() {
                $("#frmContacto").removeClass('clsDisplayNone');
                $("#frm-contacto").removeClass('clsDisplayNone');
                $(".clsContPriMsjContacto").addClass("clsDisplayNone");
            });
            $(".clsCloseContacto").click(function() {
                $("#frm-contacto").addClass('clsDisplayNone');
            });
            $(".btn-enviar").click(function() {
                fnEnviaEmail();
            });
            $('.cont-btn-contacto').hover(
                function() {
                    $('.cont-btn-contacto img').attr("src", "images/contacto/btn-flecha-over.png");
                }, //shows when hovering over
                function() {
                    $('.cont-btn-contacto img').attr("src", "images/contacto/btn-flecha.png");
                } //shows when hovering over
            );

            function fnColocaFrmContacto() {
                var altoInicio = $("#inicio").height();
                var altoUnete = $("#divUnete").height();
                var altoFrmContacto = $("#frm-contacto").height();
                var posFrmContacto = altoInicio - altoUnete;
                posFrmContacto = posFrmContacto - altoFrmContacto;

                if ($(window).width() < 767) {
                    posFrmContacto = "0% !important";
                    $("#frm-contacto").css("top", posFrmContacto);
                } else if ($(window).width() >= 768) {
                    //posFrmContacto = posFrmContacto + 200;
                    posFrmContacto = "300px";
                    $("#frm-contacto").css("top", posFrmContacto);
                }
            }

            function fnColocablogContacto() {
                var altoImg = $(".img-menu-blog-footer").height();
                //$(".cont-blog-contacto").css("height", altoImg);
            }
            $(window).resize(function() {
                fnColocaFrmContacto();
                fnColocablogContacto();
            });
            fnColocaFrmContacto();
            fnColocablogContacto();
        });

    </script>


</body>

</html>
