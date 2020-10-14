<template>
  <md-card class="md-card-profile">
    <div class="md-card-avatar">
      <!-- <img class="img" :src="cardUserImage" /> -->
      <div class="Img" :style="{backgroundImage:'url('+usuario.userImg+')'}">
        <input type="file" class="ImgFile" @change="onFileChange" />
      </div>
    </div>

    <md-card-content>
      <h6 class="category text-gray">{{usuario.tipoUser}}</h6>
      <h4 class="card-title">{{usuario.firstName+' '+usuario.lastName}}</h4>
      <p class="card-description">{{usuario.aboutMe}}</p>
    </md-card-content>
    <md-snackbar :md-active.sync="respuesta.realizado">{{ respuesta.texto }}</md-snackbar>
  </md-card>
</template>
<script>
export default {
  name: "user-card",
  props: {
    cardUserImage: {
      type: String,
      default: "/assets/img/faces/marc.jpg",
    },
    user: Object,
  },
  data() {
    return {
      usuario: this.user,
      files: [],
      respuesta: { realizado: false },
    };
  },
  watch: {
    user: {
      handler(val) {
        this.usuario = val;
      },
      deep: true,
    },
  },
  methods: {
    onFileChange(e) {
      const file = e.target.files[0];
      this.usuario.userImg = URL.createObjectURL(file);
      const files = e.target.files;
      Array.from(files).forEach((file) => this.addImage(file));
      this.upload();
      this.files = [];
    },
    addImage(file) {
      if (!file.type.match("image.*")) {
        return;
      }
      this.files.push(file);
    },
    async upload() {
      const formData = new FormData();

      let user = JSON.parse(this.$session.get("user"));

      this.files.forEach((file) => {
        formData.append("name[]", file, file.name);
      });
      await this.axios
        .post("/api/auth/setimage", formData, {
          headers: {
            Authorization: user.token_type + " " + user.access_token,
            "Content-Type": "multipart/form-data",
            id: this.usuario.id,
          },
        })
        .then((response) => {
          this.respuesta.realizado = true;
          this.respuesta.texto = response.data.message;
          let usr = response.data.user;

          if (usr.id === user.id) {
            user.image = usr.userImg;
            this.$session.set("user", JSON.stringify(user));
          }
        })
        .catch((error) => {
          console.log(error.response.data);
        });
    },
  },
};
</script>
<style></style>
