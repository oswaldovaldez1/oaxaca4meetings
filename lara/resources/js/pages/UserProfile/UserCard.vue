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
    };
  },
  methods: {
    onFileChange(e) {
      const file = e.target.files[0];
      this.usuario.userImg = URL.createObjectURL(file);
      //this.cardUserImage = URL.createObjectURL(file);
    },
  },
};
</script>
<style></style>
