<template>
  <div>
    <div id="divContButtonMenu" class="clsIcoMenuTop">
      <button id="showLeft" @click="showLeft"></button>
    </div>

    <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
      <div>
        <a id="aBtnX-L" class="clsBtnX" href="javascript:void" @click="close">
          <div>
            <img id="imgCloseMenu" src="/images/close-menu.svg" />
          </div>
        </a>
      </div>
      <a class="clsAMenu" href="/#por-que" @click="close">
        <div class="clsItemMenuMovil">¿Por qué elegirnos?</div>
      </a>
      <a class="clsAMenu" href="/#acercade" @click="close">
        <div class="clsItemMenuMovil">Acerca de la empresa</div>
      </a>
      <a class="clsAMenu" href="/#experiencias" @click="close">
        <div class="clsItemMenuMovil">Viajes de incentivo</div>
      </a>
      <a class="clsAMenu" href="/#eventos" @click="close">
        <div class="clsItemMenuMovil">Eventos Especiales</div>
      </a>
      <a class="clsAMenu" href="/#destinos" @click="close">
        <div class="clsItemMenuMovil">Nuestros destinos</div>
      </a>
      <a class="clsAMenu" href="/blog" @click="close">
        <div class="clsItemMenuMovil">Blog</div>
      </a>
      <a class="clsAMenu_ clsExeContacto" href="javascript:void(0);" @click="close">
        <div class="clsItemMenuMovil">Contacto</div>
      </a>
    </nav>
  </div>
</template>
<script>
import classie from "classie";
export default {
  methods: {
    showLeft() {
      var menuLeft = document.getElementById("cbp-spmenu-s1");
      var showLeft = document.getElementById("showLeft");
      classie.toggle(showLeft, "cbp-active");
      classie.toggle(menuLeft, "cbp-spmenu-open");
      this.disableOther("showLeft");
    },
    disableOther(button) {
      var showLeft = document.getElementById("showLeft");
      if (button !== "showLeft") {
        classie.toggle(showLeft, "disabled");
      }
    },
    close() {
      var menuLeft = document.getElementById("cbp-spmenu-s1");
      var aBtnXL = document.getElementById("aBtnX-L");

      classie.toggle(aBtnXL, "cbp-active");
      classie.toggle(menuLeft, "cbp-spmenu-open");
      this.disableOther("showLeft");
      aBtnXL.classList.remove("cbp-active");
    },
  },
};
</script>
