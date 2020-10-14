<template>
  <div class="content">
    <div class="md-layout direccion-column">
      <div class="md-layout-item md-medium-size-100 md-size-66">
        <edit-profile-form
          :user="usuario"
          :updated="isUpdated"
          data-background-color="blue-900"
          v-if="isloading"
        ></edit-profile-form>
      </div>
      <div class="md-layout-item md-medium-size-100 md-size-33">
        <user-card :user="usuario" v-if="isloading"></user-card>
      </div>
    </div>
  </div>
</template>

<script>
import { EditProfileForm, UserCard } from "../../pages";

export default {
  data() {
    return {
      isloading: false,
      isUpdated: false,
      usuario: {
        userImg: "/images/icono-oaxaca4meeting.png",
        name: "",
        email: "",
        status: true,
        password: "",
        lastName: "",
        firstName: "",
        aboutMe:
          "Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.",
        tipoUser: "",
        nivelAcceso: [],
      },
    };
  },
  methods: {
    getNivel() {
      return [
        {
          check: true,
          title: "Usuarios",
          icon: "person",
          child: [
            {
              check: false,
              title: "Agregar Usuario",
              icon: "person_add",
            },
            {
              check: true,
              title: "Listar Usuarios",
              icon: "people",
            },
          ],
        },
        {
          check: true,
          title: "Publicaciones",
          icon: "view_list",
          child: [
            {
              check: false,
              title: "Agregar Publicación",
              icon: "playlist_add",
            },
            {
              check: true,
              title: "Listar Publicaciones",
              icon: "playlist_add_check",
            },
          ],
        },
        {
          check: true,
          title: "Experiencias",
          icon: "folder",
          child: [
            {
              check: false,
              title: "Agregar Experiencia",
              icon: "create_new_folder",
            },
            {
              check: true,
              title: "Listar Experiencias",
              icon: "topic",
            },
          ],
        },
        {
          check: true,
          title: "Secciones",
          icon: "view_compact",
        },
      ];
    },
    getUserById(id) {
      let user = JSON.parse(this.$session.get("user"));
      this.axios
        .get("/api/user/" + id, {
          headers: {
            Authorization: user.token_type + " " + user.access_token,
          },
        })
        .then((response) => {
          this.usuario = response.data;

          if (this.usuario.nivelAcceso === "") {
            this.usuario.nivelAcceso = this.getNivel();
          } else {
            this.usuario.nivelAcceso = JSON.parse(this.usuario.nivelAcceso);
          }
          if (this.usuario.roles.length === 0) {
            this.usuario.tipoUser = "user";
          } else {
            this.usuario.tipoUser = this.usuario.roles[0].name;
          }
          if (this.usuario.userImg === null) {
            this.usuario.userImg = "/images/icono-oaxaca4meeting.png";
          }
          this.usuario.status = this.usuario.status === 1;
          this.isUpdated = true;
          this.isloading = true;
        });
    },
  },
  created() {},
  mounted() {},
  watch: {
    "$route.params.id": {
      handler: function (id) {
        if (typeof id === "undefined") {
          this.usuario = {
            userImg: "/images/icono-oaxaca4meeting.png",
            name: "",
            email: "",
            status: true,
            password: "",
            lastName: "",
            firstName: "",
            aboutMe:
              "Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.",
            tipoUser: "",
            nivelAcceso: this.getNivel(),
          };
          this.isloading = true;
        } else {
          this.getUserById(parseInt(id));
        }
      },
      deep: true,
      immediate: true,
    },
  },
  computed: {},
  components: {
    EditProfileForm,
    UserCard,
  },
};
</script>
