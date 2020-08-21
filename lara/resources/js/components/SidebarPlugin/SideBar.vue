<template>
  <div
    class="sidebar"
    :data-color="sidebarItemColor"
    :data-image="sidebarBackgroundImage"
    :style="sidebarStyle"
  >
    <div class="logo">
      <div class="logo-img" @click="toggleSidebar">
        <img :src="imgLogo" alt />
      </div>
      <div class="menuUser">
        <div>
          <router-link to="/admin/dashboard" class="itemMenuUser">
            <md-icon>settings</md-icon>
          </router-link>
        </div>
        <div>
          <router-link to="/admin/dashboard" class="itemMenuUser" @click="toggleSidebar">
            <md-icon>power_settings_new</md-icon>
          </router-link>
        </div>
      </div>
      <div class="menuUserNombre">
        <p>Administrador</p>
        <span>admin@admin.com</span>
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
