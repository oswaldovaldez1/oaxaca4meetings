<template>
  <div class="wrapper" :class="{ 'nav-open': $sidebar.showSidebar }">
    <side-bar
      :sidebar-item-color="sidebarBackground"
      :sidebar-background-image="sidebarBackgroundImage"
    >
      <md-list :md-expand-single="true">
        <div v-for="(ruta, index) of rutas" :key="index">
          <sidebar-link :to="ruta.url" v-if="ruta.single">
            <md-icon>{{ ruta.icon }}</md-icon>
            <p>{{ ruta.name }}</p>
          </sidebar-link>

          <md-list-item class="white" style="padding-left:12px;" md-expand v-else>
            <md-icon>{{ ruta.icon }}</md-icon>
            <p>{{ ruta.name }}</p>

            <md-list slot="md-expand">
              <md-list-item class="md-inset" v-for="(route, index) of ruta.rutas" :key="index">
                <sidebar-link :to="route.url">
                  <md-icon>{{ route.icon }}</md-icon>
                  <p>{{ route.name }}</p>
                </sidebar-link>
              </md-list-item>
            </md-list>
          </md-list-item>
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
      this.toggleSidebar();
    },
  },
  methods: {
    toggleSidebar() {
      this.$sidebar.displaySidebar(!this.$sidebar.showSidebar);
    },
  },
};
</script>
