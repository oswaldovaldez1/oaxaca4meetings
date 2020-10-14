<template>
  <div class="content">
    <md-dialog-confirm
      :md-active.sync="active"
      md-title="¿Eliminar Imagen?"
      md-content="¿Desea usted eliminar esta imagen?."
      md-confirm-text="Eliminar"
      md-cancel-text="Cancelar"
      @md-cancel="onCancel"
      @md-confirm="onConfirm"
    />
    <md-dialog :md-active.sync="showDialog">
      <md-dialog-title>Preview</md-dialog-title>
      <img :src="getImg" width="300" />
      <md-dialog-actions></md-dialog-actions>
    </md-dialog>

    <div class="md-layout">
      <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100">
        <!-- <form novalidate @submit.prevent="savePost"> -->
        <div>
          <!-- <form> -->
          <md-card>
            <md-card-header data-background-color="blue-900">
              <h4 class="title">{{titulo}}</h4>
              <div class="activo">
                <md-switch v-model="experiencia.status">Estatus</md-switch>
              </div>
              <p class="category"></p>
            </md-card-header>
            <md-card-content>
              <div class="md-layout">
                <div class="md-layout-item md-small-size-100 md-size-33">
                  <md-field>
                    <label>Título</label>
                    <md-input v-model="experiencia.titulo" type="text"></md-input>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-33">
                  <md-field>
                    <label>Subtítulo</label>
                    <md-input v-model="experiencia.subtitulo" type="text"></md-input>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-15">
                  <md-field>
                    <label for="font">Idioma</label>
                    <md-select v-model="experiencia.lang" name="font" id="font">
                      <md-option value="es">🇲🇽</md-option>
                      <md-option value="en">🇺🇸</md-option>
                    </md-select>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-95 md-size-35">
                  <md-field>
                    <label>Portada</label>
                    <md-file
                      v-model="experiencia.portada"
                      accept="image/*"
                      @change="onFileUploadPortada"
                    />
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-5 md-size-5">
                  <md-field>
                    <a href="javascript:void(1)" @click=" preview='portada'; showDialog = true">
                      <md-icon>insert_photo</md-icon>
                    </a>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-95 md-size-35">
                  <md-field>
                    <label>Fondo</label>
                    <md-file
                      v-model="experiencia.imgint"
                      accept="image/*"
                      @change="onFileUploadFondo"
                    />
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-5 md-size-5">
                  <md-field>
                    <a href="javascript:void(1)" @click=" preview='fondo'; showDialog = true;">
                      <md-icon>insert_photo</md-icon>
                    </a>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-95 md-size-35">
                  <md-field>
                    <label>Galeria</label>
                    <md-file
                      v-model="experiencia.imggal"
                      accept="image/*"
                      @change="onFileUploadGaleria"
                    />
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-5 md-size-5">
                  <md-field>
                    <a href="javascript:void(1)" @click=" preview='galeria'; showDialog = true;">
                      <md-icon>insert_photo</md-icon>
                    </a>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-15">
                  <md-field>
                    <label>Color</label>
                    <md-input v-model="experiencia.color" type="text" :disabled="true"></md-input>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-15">
                  <md-field>
                    <label>Color del titulo</label>
                    <md-input v-model="experiencia.color_titulo" type="text"></md-input>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-33">
                  <md-field>
                    <label>Duración</label>
                    <md-input v-model="experiencia.duracion" type="text"></md-input>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-33">
                  <md-field>
                    <label>Reservación</label>
                    <md-input v-model="experiencia.reservacion" type="text"></md-input>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-33">
                  <md-field>
                    <label>Salida</label>
                    <md-input v-model="experiencia.salida" type="text"></md-input>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-50">
                  <md-field>
                    <label>Incluye</label>
                    <md-input v-model="experiencia.include" type="text"></md-input>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-50">
                  <md-field>
                    <label>Recomendación</label>
                    <md-input v-model="experiencia.recomendacion" type="text"></md-input>
                  </md-field>
                </div>

                <div class="md-layout-item md-small-size-100 md-size-100">
                  <vue-editor v-model="experiencia.contenido"></vue-editor>
                </div>
              </div>

              <div class="md-layout-item md-size-100 text-right">
                <md-button
                  class="md-raised md-success"
                  type="button"
                  :disabled="sending"
                  @click="savePosts"
                >
                  <md-icon>send</md-icon>
                </md-button>
              </div>
            </md-card-content>
          </md-card>
          <!-- </form> -->
        </div>
      </div>
    </div>
    <md-snackbar :md-active.sync="respuesta.realizado">{{ respuesta.texto }}</md-snackbar>
  </div>
</template>

<script>
import { VueEditor } from "vue2-editor";
import draggable from "vuedraggable";
import * as Vibrant from "node-vibrant";
import analyze from "rgbaster";

export default {
  data() {
    return {
      titulo: "Agregar Experiencia",
      respuesta: { realizado: false },
      experiencia: {
        titulo: "",
        subtitulo: "",
        imggal: "",
        imgint: "",
        portada: "",
        color: "",
        color_titulo: "",
        lang: "",
        contenido: "",
        duracion: "",
        reservacion: "",
        salida: "",
        sugerencia: "",
        include: "",
        recomendacion: "",
        status: false,
      },
      colores: [],
      indexImg: 0,
      sending: false,
      isUpdated: false,
      showDialog: false,
      active: false,
      image: "",
      img: "",
      FilePortada: null,
      FileGaleria: null,
      FileFondo: null,
      preview: "",
      tmp: {
        portada: null,
        galeria: null,
        fondo: null,
      },
    };
  },
  methods: {
    getPubById(id) {
      let user = JSON.parse(this.$session.get("user"));
      this.axios
        .get("/api/experiencias/" + id, {
          headers: {
            Authorization: user.token_type + " " + user.access_token,
          },
        })
        .then((response) => {
          this.experiencia = response.data;
          this.experiencia.status = this.experiencia.status === 1;
          this.isUpdated = true;
        });
    },
    onFileUploadPortada(event) {
      this.FilePortada = event.target.files[0];
      this.tmp.portada = URL.createObjectURL(this.FilePortada);
    },
    onFileUploadGaleria(event) {
      this.FileGaleria = event.target.files[0];
      this.tmp.galeria = URL.createObjectURL(this.FileGaleria);
    },
    async onFileUploadFondo(event) {
      this.FileFondo = event.target.files[0];
      this.tmp.fondo = URL.createObjectURL(this.FileFondo);
      const result = await analyze(this.tmp.fondo);
      let color = result[0].color;
      color = color.replace("rgb", "");
      color = color.replace("(", "");
      color = color.replace(")", "");

      this.experiencia.color = this.rgbToHexFull(color);
    },
    rgbToHex(rgb) {
      var hex = Number(rgb).toString(16);
      if (hex.length < 2) {
        hex = "0" + hex;
      }
      return hex;
    },
    rgbToHexFull(rgb) {
      rgb = rgb.split(",");
      return (
        "#" +
        this.rgbToHex(rgb[0]) +
        this.rgbToHex(rgb[1]) +
        this.rgbToHex(rgb[2])
      );
    },
    savePosts() {
      if (!this.isUpdated) {
        savePost();
      } else {
        this.updatePost();
      }
    },
    savePost() {
      let user = JSON.parse(this.$session.get("user"));
      let formData = new FormData();
      formData.append("portada", this.FilePortada);
      formData.append("galeria", this.FileGaleria);
      formData.append("fondo", this.FileFondo);
      formData.append("body", JSON.stringify(this.experiencia));
      this.axios
        .post("/api/experiencias", formData, {
          headers: {
            Authorization: user.token_type + " " + user.access_token,
            "Content-Type": "multipart/form-data",
          },
        })
        .then((response) => {
          this.experiencia = response.data.experiencia;
          this.experiencia.status = this.experiencia.status === 1;
          this.respuesta.realizado = true;
          this.respuesta.texto = response.data.message;
        })
        .catch((error) => {
          console.log(error.response.data);
        });
    },
    updatePost() {
      let user = JSON.parse(this.$session.get("user"));
      let formData = new FormData();
      if (this.FilePortada != null) {
        formData.append("portada", this.FilePortada);
      }
      if (this.FileGaleria != null) {
        formData.append("galeria", this.FileGaleria);
      }
      if (this.FileFondo != null) {
        formData.append("fondo", this.FileFondo);
      }

      formData.append("body", JSON.stringify(this.experiencia));

      formData.append("_method", "PATCH");
      this.axios
        .post("/api/experiencias/" + this.experiencia.id, formData, {
          headers: {
            Authorization: user.token_type + " " + user.access_token,
            "Content-Type": "multipart/form-data",
          },
        })
        .then((response) => {
          this.experiencia = response.data.experiencia;
          this.experiencia.status = this.experiencia.status === 1;
          this.respuesta.realizado = true;
          this.respuesta.texto = response.data.message;
        })
        .catch((error) => {});
    },
    onConfirm() {},
    onCancel() {},
  },
  created() {},
  mounted() {},
  watch: {
    "$route.params.id": {
      handler: function (id) {
        if (typeof id === "undefined") {
          (FilePortada = null), (FileGaleria = null);
          FileFondo = null;
          this.experiencia = {
            titulo: "",
            subtitulo: "",
            imggal: "",
            imgint: "",
            portada: "",
            color: "",
            color_titulo: "",
            lang: "",
            contenido: "",
            duracion: "",
            reservacion: "",
            salida: "",
            sugerencia: "",
            include: "",
            recomendacion: "",
            status: false,
          };
          this.isUpdated = false;
          this.titulo = "Agregar Experiencia";
        } else {
          this.getPubById(parseInt(id));
          this.titulo = "Actualizar Experiencia";
          this.isUpdated = true;
        }
      },
      deep: true,
      immediate: true,
    },
  },
  computed: {
    getImg() {
      switch (this.preview) {
        case "portada": {
          if (this.tmp.portada === null) {
            return this.experiencia.portada;
          } else {
            return this.tmp.portada;
          }
        }
        case "galeria": {
          if (this.tmp.portada === null) {
            return this.experiencia.imggal;
          } else {
            return this.tmp.galeria;
          }
        }
        case "fondo": {
          if (this.tmp.portada === null) {
            return this.experiencia.imgint;
          } else {
            return this.tmp.fondo;
          }
        }
      }
    },
  },
  components: {
    VueEditor,
    draggable,
  },
};
</script>

<style lang="scss" scoped>
.md-card-header {
  position: relative;
  & .activo {
    width: 100px;
    position: absolute;
    right: 2%;
    top: 10%;
  }
}
.md-content {
  max-height: 300px;
  overflow: auto;
}
// .drop {
//   display: inline-block;
//   vertical-align: top;
//   padding: 15px;
//   margin-bottom: 20px;
//   width: auto;
//   height: auto;
// }
// .drag2 {
//   position: relative !important;
//   width: 200px;
// }
</style>
