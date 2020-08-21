<template>
  <div class="content">
    <div class="md-layout direccion-column">
      <div class="md-layout-item md-medium-size-100 md-size-66">
        <edit-profile-form :user="usuario" data-background-color="blue-900"></edit-profile-form>
      </div>
      <div class="md-layout-item md-medium-size-100 md-size-33">
        <user-card :user="usuario"></user-card>
      </div>
    </div>
  </div>
</template>

<script>
import { EditProfileForm, UserCard } from "../../pages";

export default {
  data() {
    return {
      usuario: {
        userImg: "/images/icono-oaxaca4meeting.png",
        userName: "",
        emailAddress: "",
        status: true,
        password: "",
        lastName: "",
        firstName: "",
        aboutMe:
          "Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.",
        tipoUser: "",
        nivelAcceso: [
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
        ],
      },
    };
  },
  components: {
    EditProfileForm,
    UserCard,
  },
};
</script>
