<template>
  <form novalidate @submit.prevent="validateUser">
    <md-card>
      <md-card-header :data-background-color="dataBackgroundColor">
        <h4 class="title">Agregar Usuario</h4>
        <!-- <p class="category">Complete your profile</p> -->
        <div class="activo">
          <md-switch v-model="usuario.status">Estatus</md-switch>
        </div>
      </md-card-header>

      <md-card-content>
        <div class="md-layout">
          <div class="md-layout-item md-small-size-100 md-size-33">
            <md-field :class="getValidationClass('userName')">
              <label for="username">Usuario</label>
              <md-input
                v-model="usuario.userName"
                type="text"
                :disabled="sending"
                name="username"
                id="username"
              ></md-input>
              <span class="md-error" v-if="!$v.usuario.userName.required">The first name is required</span>
              <span class="md-error" v-else-if="!$v.usuario.userName.minlength">Invalid first name</span>
            </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-33">
            <md-field>
              <label>Correo</label>
              <md-input v-model="usuario.emailAddress" type="email"></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-33">
            <md-field>
              <label>Contraseña</label>
              <md-input v-model="usuario.password" type="password"></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-50">
            <md-field>
              <label>Nombre</label>
              <md-input v-model="usuario.firstName" type="text"></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-50">
            <md-field>
              <label>Apellidos</label>
              <md-input v-model="usuario.lastName" type="text"></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-size-100">
            <md-field>
              <label>Tipo de Usuario</label>
              <md-select v-model="usuario.tipoUser" name="tipoUser" id="tipoUser">
                <md-option value="Administrador">Administrador</md-option>
                <md-option value="Usuario">Usuario</md-option>
              </md-select>
            </md-field>
          </div>

          <div class="md-layout-item md-size-100">
            <label class="labelField">Nivel de Acceso</label>
            <CheckTreeView :dataCheck="usuario.nivelAcceso"></CheckTreeView>
          </div>

          <div class="md-layout-item md-size-100">
            <md-field maxlength="5">
              <label>Descripción</label>
              <md-textarea v-model="usuario.aboutMe"></md-textarea>
            </md-field>
          </div>
          <div class="md-layout-item md-size-100 text-right">
            <md-button class="md-raised md-success" type="submit" :disabled="sending">
              <md-icon>send</md-icon>
            </md-button>
          </div>
        </div>
      </md-card-content>
    </md-card>

    <md-snackbar :md-active.sync="userSaved">The user {{ lastUser }} was saved with success!</md-snackbar>
  </form>
</template>
<script>
import { validationMixin } from "vuelidate";
import { CheckTreeView } from "../../components";
import {
  required,
  email,
  minLength,
  maxLength,
} from "vuelidate/lib/validators";

export default {
  name: "edit-profile-form",
  mixins: [validationMixin],
  props: {
    dataBackgroundColor: {
      type: String,
      default: "",
    },
    user: Object,
  },
  data() {
    return {
      usuario: this.user,
      userSaved: false,
      sending: false,
      lastUser: null,
    };
  },
  validations: {
    usuario: {
      userName: {
        required,
        minLength: minLength(3),
      },
      //   firstName: {
      //     required,
      //     minLength: minLength(3),
      //   },
      //   lastName: {
      //     required,
      //     minLength: minLength(3),
      //   },
      //   email: {
      //     required,
      //     email,
      //   },
    },
  },
  methods: {
    getValidationClass(fieldName) {
      const field = this.$v.usuario[fieldName];

      if (field) {
        return {
          "md-invalid": field.$invalid && field.$dirty,
        };
      }
    },
    clearForm() {
      this.$v.$reset();
      this.usuario.userName = "";
      this.usuario.emailAddress = "";
      this.usuario.lastName = "";
      this.usuario.firstName = "";
      this.usuario.aboutMe = "";
      this.usuario.tipoUser = "";
      this.usuario.password = "";
      this.usuario.status = true;
      this.userImg = "/images/icono-oaxaca4meeting.png";
    },
    saveUser() {
      this.sending = true;

      // Instead of this timeout, here you can call your API
      console.log(`${this.usuario.firstName} ${this.usuario.lastName}`);
      window.setTimeout(() => {
        this.lastUser = `${this.usuario.firstName} ${this.usuario.lastName}`;
        console.log(this.lastUser);
        this.userSaved = true;
        this.sending = false;
        this.clearForm();
      }, 1500);
    },
    validateUser() {
      this.$v.$touch();

      if (!this.$v.$invalid) {
        this.saveUser();
      }
    },
  },
  components: {
    CheckTreeView,
  },
};
</script>
<style lang="scss" scoped>
.labelField {
  font-size: 0.6875rem;
  font-weight: 400;
  color: #aaaaaa !important;
  line-height: 1.4;
}
.md-card-header {
  position: relative;
  & .activo {
    width: 100px;
    position: absolute;
    right: 2%;
    top: 10%;
  }
}
</style>
