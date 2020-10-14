<html>

<head>
    <title></title>
</head>

<body
    style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:11px;vertical-align:center;text-align:left;background-color: #FFFFFF;color:#000000;">
    <b>Nombre:&nbsp;</b>{{ $datos->txtNombre }}<br /><br />
    <b>Tel&eacute;fono:&nbsp;</b><a href="tel:{{ $datos->txtTelefono }}">{{ $datos->txtTelefono }}</a> <br /><br />
    <b>E-mail:&nbsp;</b><a href="mailto:{{ $datos->txtEmail }}">{{ $datos->txtEmail }}</a> <br /><br />
    <b>Empresa:&nbsp;</b>{{ $datos->txtEmpresa }} <br /><br />
    <b>Mensaje:&nbsp;</b>{{ $datos->txtMensaje }}<br /><br />
    <br /><br />
    <center>
</body>

</html>
