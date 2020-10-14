<template>
  <form novalidate @submit.prevent="validateUser">
    <md-card>
      <md-card-header :data-background-color="dataBackgroundColor">
        <h4 class="title">{{titulo}}</h4>
        <!-- <p class="category">Complete your profile</p> -->
        <div class="activo">
          <md-switch v-model="usuario.status">Estatus</md-switch>
        </div>
      </md-card-header>

      <md-card-content>
        <div class="md-layout">
          <div class="md-layout-item md-small-size-100 md-size-33">
            <md-field :class="getValidationClass('name')">
              <label for="name">Usuario</label>
              <md-input
                v-model="usuario.name"
                type="text"
                :disabled="sending"
                name="username"
                id="username"
              ></md-input>
              <span class="md-error" v-if="!$v.usuario.name.required">The first name is required</span>
              <span class="md-error" v-else-if="!$v.usuario.name.minlength">Invalid first name</span>
            </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-33">
            <md-field>
              <label>Correo</label>
              <md-input v-model="usuario.email" type="email" :disabled="isUpdated"></md-input>
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
                <md-option value="admin">Administrador</md-option>
                <md-option value="user">Usuario</md-option>
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

    <md-snackbar :md-active.sync="respuesta.realizado">{{ respuesta.texto }}</md-snackbar>
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
    updated: {
      type: Boolean,
      default: false,
    },
  },
  data() {
    return {
      usuario: this.user,
      titulo: "Agregar Usuario",
      respuesta: { realizado: false },
      sending: false,
      lastUser: null,
      isUpdated: this.updated,
    };
  },
  validations: {
    usuario: {
      name: {
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
  watch: {
    user: {
      handler(val) {
        this.usuario = val;
      },
      deep: true,
    },
    updated: {
      handler(val) {
        this.isUpdated = val;
        if (val) {
          this.titulo = "Actualizar Usuario";
        }
      },
      deep: true,
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
      this.usuario.name = "";
      this.usuario.email = "";
      this.usuario.lastName = "";
      this.usuario.firstName = "";
      this.usuario.aboutMe = "";
      this.usuario.tipoUser = "";
      this.usuario.password = "";
      this.usuario.status = true;
      this.userImg = "/images/icono-oaxaca4meeting.png";
    },
    updatedUser() {
      let user = JSON.parse(this.$session.get("user"));
      this.axios
        .put("/api/auth/user/" + this.usuario.id, this.usuario, {
          headers: {
            Authorization: user.token_type + " " + user.access_token,
          },
        })
        .then((response) => {
          this.respuesta.realizado = true;
          this.respuesta.texto = response.data.message;
        })
        .catch((error) => {});
    },
    saveUser() {
      this.sending = true;

      //let user = JSON.parse(this.$session.get("user"));
      this.axios
        .post("/api/auth/signup", this.usuario, {
          // headers: {
          //     Authorization: user.token_type + " " + user.access_token
          // }
        })
        .then((response) => {
          this.respuesta.realizado = true;
          this.respuesta.texto = response.data.message;
        })
        .catch((error) => {
          let errors = error.response.data.errors;
        });
      // Instead of this timeout, here you can call your API

      window.setTimeout(() => {
        this.lastUser = `${this.usuario.firstName} ${this.usuario.lastName}`;

        this.userSaved = true;
        this.sending = false;
        this.clearForm();
      }, 1500);
    },
    validateUser() {
      this.$v.$touch();

      if (!this.$v.$invalid) {
        if (!this.isUpdated) {
          this.saveUser();
        } else {
          this.updatedUser();
        }
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
