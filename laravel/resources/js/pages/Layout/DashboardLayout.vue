<template>
  <div class="wrapper" :class="{ 'nav-open': $sidebar.showSidebar }">
    <side-bar
      :sidebar-item-color="sidebarBackground"
      :sidebar-background-image="sidebarBackgroundImage"
    >
      <md-list :md-expand-single="true" v-if="opciones.length>0">
        <div v-for="(ruta, index) of rutas" :key="index">
          <div v-if="isChecked(ruta.name)">
            <sidebar-link :to="ruta.url" v-if="ruta.single">
              <md-icon>{{ ruta.icon }}</md-icon>
              <p>{{ ruta.name }}</p>
            </sidebar-link>

            <md-list-item class="white" style="padding-left:12px;" md-expand v-else>
              <md-icon>{{ ruta.icon }}</md-icon>
              <p>{{ ruta.name }}</p>

              <md-list slot="md-expand">
                <div v-for="(route, index) of ruta.rutas" :key="index">
                  <md-list-item class="md-inset" v-if="isCheckedChild(route.name,ruta.name)">
                    <sidebar-link :to="route.url">
                      <md-icon>{{ route.icon }}</md-icon>
                      <p>{{ route.name }}</p>
                    </sidebar-link>
                  </md-list-item>
                </div>
              </md-list>
            </md-list-item>
          </div>
        </div>
      </md-list>
    </side-bar>

    <div class="main-panel">
      <top-navbar></top-navbar>

      <dashboard-content></dashboard-content>
    </div>
  </div>
</template>

<script>
import TopNavbar from "./TopNavbar.vue";

import DashboardContent from "./Content.vue";

export default {
  components: {
    TopNavbar,
    DashboardContent,
  },
  data() {
    return {
      sidebarBackground: "green",
      sidebarBackgroundImage: "/images/destinos/destinos-2.jpg",
      opciones: [],
      rutas: [
        {
          url: "/admin/dashboard",
          name: "Dashboard",
          icon: "dashboard",
          single: true,
          rol: "Any",
        },
        {
          name: "Usuarios",
          icon: "person",
          single: false,
          rol: "Admin",
          rutas: [
            {
              url: "/admin/usuario/listar",
              name: "Listar Usuarios",
              icon: "people",
            },
            {
              url: "/admin/usuario/agregar",
              name: "Agregar Usuario",
              icon: "person_add",
            },
          ],
        },
        {
          name: "Publicaciones",
          icon: "view_list",
          single: false,
          rol: "Admin",
          rutas: [
            {
              url: "/admin/publicacion/listar",
              name: "Listar Publicaciones",
              icon: "playlist_add_check",
            },
            {
              url: "/admin/publicacion/agregar",
              name: "Agregar Publicación",
              icon: "playlist_add",
            },
          ],
        },
        {
          name: "Experiencias",
          icon: "folder",
          single: false,
          rol: "Admin",
          rutas: [
            {
              url: "/admin/experiencia/listar",
              name: "Listar Experiencias",
              icon: "topic",
            },
            {
              url: "/admin/experiencia/agregar",
              name: "Agregar Experiencia",
              icon: "create_new_folder",
            },
          ],
        },
        {
          url: "/admin/secciones",
          name: "Secciones",
          icon: "view_compact",
          single: true,
          rol: "Any",
        },
      ],
    };
  },
  watch: {
    $route(to, from) {
      if (this.$sidebar.showSidebar === true) {
        this.toggleSidebar();
      }
    },
  },
  methods: {
    toggleSidebar() {
      this.$sidebar.displaySidebar(!this.$sidebar.showSidebar);
    },
    isCheckedChild(nombre, parent) {
      let padre = this.opciones.find((item) => item.title === parent);

      let child = padre.child.find((item) => item.title === nombre);
      return child.check;
    },
    isChecked(nombre) {
      if (nombre === "Dashboard") {
        return true;
      }
      let encontrado = this.opciones.find((item) => item.title === nombre);
      return encontrado.check;
    },
  },
  mounted() {
    if (this.$session.has("user")) {
      let user = JSON.parse(this.$session.get("user"));
      this.opciones = user.lavel;
    }
  },
};
</script>
