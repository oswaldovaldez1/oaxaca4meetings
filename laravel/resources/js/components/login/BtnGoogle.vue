<template>
  <div class="w-100">
    <md-button class="md-raised md-danger" @click="loguear">
      <span class="fab fa-google" aria-hidden="true"></span>
      &nbsp;Google
    </md-button>
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
      const provider = new firebase.auth.GoogleAuthProvider();
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
      /*.then(function(result) {
                    // This gives you a Google Access Token.
                    console.log(result);
                    var token = result.credential.accessToken;
                    // The signed-in user info.
                    var user = result.user;
                })
                .catch(function(error) {
                    var errorCode = error.code;
                    var errorMessage = error.mesaage;
                    var email = error.email;
                    var credential = error.credential;
                });*/
      //console.log("google");
    },
  },
  mounted() {},
  components: {},
};
//239672439560-drg5c5ff0cia7deauqspm60jm3raijk8.apps.googleusercontent.com
//3gDVv5-EdTYQH-K88FOkuvwb
</script>

<style></style>
