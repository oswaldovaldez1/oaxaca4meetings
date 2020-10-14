<template>
  <div
    class="sidebar"
    :data-color="sidebarItemColor"
    :data-image="sidebarBackgroundImage"
    style="background-image: url('/images/destinos/destinos-2.jpg');"
  >
    <div class="logo">
      <div class="logo-img" @click="toggleSidebar" :style="setClass">
        <!-- <img :src="usuario.img" alt /> -->
      </div>
      <div class="menuUser">
        <div>
          <router-link to="/admin/dashboard" class="itemMenuUser">
            <md-icon>settings</md-icon>
          </router-link>
        </div>
        <div>
          <div @click="logOut">
            <md-icon @click="logOut">power_settings_new</md-icon>
          </div>
        </div>
      </div>
      <div class="menuUserNombre">
        <p>{{usuario.nombre}}</p>
        <span>{{usuario.correo}}</span>
      </div>
    </div>
    <div class="sidebar-wrapper">
      <slot name="content"></slot>
      <md-list class="nav">
        <slot>
          <sidebar-link
            v-for="(link, index) in sidebarLinks"
            :key="link.name + index"
            :to="link.path"
            :link="link"
          ></sidebar-link>
        </slot>
      </md-list>
    </div>
  </div>
</template>
<script>
import SidebarLink from "./SidebarLink.vue";

export default {
  data() {
    return {
      usuario: {
        nombre: "Usuario",
        correo: "user@oaxaca4meetings.com",
        img: "/images/icono-oaxaca4meeting.png",
      },
    };
  },
  components: {
    SidebarLink,
  },
  props: {
    title: {
      type: String,
      default: "Administrador",
    },
    sidebarBackgroundImage: {
      type: String,
      default: "/assets/img/sidebar-2.jpg",
    },
    imgLogo: {
      type: String,
      default: "/images/icono-oaxaca4meeting.png",
    },
    sidebarItemColor: {
      type: String,
      default: "green",
      validator: (value) => {
        let acceptedValues = ["", "purple", "blue", "green", "orange", "red"];
        return acceptedValues.indexOf(value) !== -1;
      },
    },
    sidebarLinks: {
      type: Array,
      default: () => [],
    },
    autoClose: {
      type: Boolean,
      default: true,
    },
  },
  provide() {
    return {
      autoClose: this.autoClose,
    };
  },
  computed: {
    sidebarStyle() {
      return {
        backgroundImage: `url(${this.sidebarBackgroundImage})`,
      };
    },
  },
  methods: {
    toggleSidebar() {
      this.$sidebar.displaySidebar(!this.$sidebar.showSidebar);
    },
    getData() {
      let user = JSON.parse(this.$session.get("user"));

      this.usuario.nombre = user.name;
      this.usuario.correo = user.email;
      this.usuario.img = user.image;
    },
    logOut() {
      this.$session.remove("user");
      this.$router.push({
        name: "login",
      });
    },
  },
  computed: {
    setClass() {
      return {
        "background-image": "url(" + this.usuario.img + ")",
        "background-size": "cover",
        "background-position": "center",
      };
    },
  },
  mounted() {
    if (this.$session.has("user")) {
      this.getData();
      setInterval(this.getData, 5000);
    }
  },
};
</script>
<style>
@media screen and (min-width: 991px) {
  .nav-mobile-menu {
    display: none;
  }
}
</style>
