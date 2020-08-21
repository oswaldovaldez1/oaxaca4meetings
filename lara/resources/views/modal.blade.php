 <div id="frm-contacto" class="container_ clsDisplayNone">
     <div class="clsCloseContacto"><img src="{{ url('/') }}/images/close-modal.svg" alt="close" /></div>
     <div class="row no-gutters">
         <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 clsContactoIzq">
             <div class="row no-gutters clsHeight100">
                 <div class="col-8">
                     <div class="cont-text-hola">
                         <div class="text-hola">¡Hola!</div>
                         <div class="text-deja-msj">
                             <div>Déjanos un mensaje</div>
                             <div>y permítenos contribuir</div>
                             <div>al éxito de tu evento.</div>
                         </div>
                     </div>
                 </div>
                 <div class="col-4">
                     <div class="text-contacto">
                         <div>CON</div>
                         <div>TAC</div>
                         <div>TO</div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 clsContactoDer clsContPriFormContacto">
             <form id="frmContacto" name="frmContacto" method="post" enctype="application/x-www-form-urlencoded"
                 accept-charset="utf-8" autocomplete="off" role="form" class="form-horizontal clsHeight100">
                 <div class="clsContFormContacto clsHeight100" class="container">
                     <div class="row">
                         <div class="col-12 frm-fields">Nombre*:</div>
                         <div class="col-12">
                             <input type="text" id="txtNombre" name="txtNombre" />
                         </div>
                         <div class="col-12 frm-fields">Empresa:</div>
                         <div class="col-12">
                             <input type="text" id="txtEmpresa" name="txtEmpresa" />
                         </div>
                         <div class="col-12 frm-fields">Correo electrónico*:</div>
                         <div class="col-12">
                             <input type="text" id="txtEmail" name="txtEmail" />
                         </div>
                         <div class="col-12 frm-fields">Teléfono contacto:</div>
                         <div class="col-12">
                             <input type="text" id="txtTelefono" name="txtTelefono" />
                         </div>
                         <div class="col-12 frm-fields">Mensaje*:</div>
                         <div class="col-12">
                             <textarea type="text" id="txtMensaje" name="txtMensaje"></textarea>
                         </div>
                     </div>
                     <div class="row clsHeight20P">
                         <div class="col-6">
                             <div class="cont-text-campos">*Campos obligatorios.</div>
                         </div>
                         <div class="col-6">
                             <div class="cont-btn-contacto">
                                 <button type="button" class="btn-enviar">Enviar <img
                                         src="{{ url('/') }}/images/contacto/btn-flecha.png" alt="enviar" /></button>
                             </div>
                         </div>
                     </div>
                 </div>
             </form>
         </div>
         <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 clsContPriMsjContacto clsDisplayNone">
             <div class="clsRespContacto row no-gutters">
                 <div class="col-md-12">
                     <div class="row no-gutters">
                         <div class="col-3 col-sm-2 col-md-2 clsFLX">
                             <img src="{{ url('/') }}/images/icono-oaxaca4meeting.png" alt="icono" />
                         </div>
                         <div class="col-9 col-sm-10 col-md-10 clsNoPadding">
                             <div class="clsRespGracias">¡Gracias por escribirnos!</div>
                             <div class="clsRespMsj">En breve nos pondremos en contacto contigo.</div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
