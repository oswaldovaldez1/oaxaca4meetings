<template>
  <div class="w-100">
    <button class="btn btn-info w-100" @click="loguear">
      <i class="fab fa-facebook-f" aria-hidden="true"></i>
      Facebook
    </button>
  </div>
</template>

<script>
import { firebase, auth } from "../../firebase";

export default {
  data() {
    return {
      usuario: {
        uid: "",
        nombre: "",
        email: "",
        photo: "",
        phone: "",
      },
    };
  },
  methods: {
    async loguear() {
      const provider = new firebase.auth.FacebookAuthProvider();
      firebase.auth().languageCode = "es";

      try {
        const result = await firebase.auth().signInWithPopup(provider);
        this.usuario.uid = result.user.uid;
        this.usuario.nombre = result.user.displayName;
        this.usuario.email = result.user.email;
        this.usuario.photo = result.user.photoURL;
        this.usuario.phone = result.user.phoneNumber;
      } catch (error) {
        console.log(error);
      }
    },
  },
  mounted() {},
  components: {},
};
</script>

<style></style>
