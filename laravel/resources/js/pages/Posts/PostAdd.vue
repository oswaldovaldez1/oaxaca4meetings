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

      <img :src="'/publicaciones/'+publicacion.imagen_publicacion" width="300" v-if="!isFile" />
      <img v-else :src="imgFile" width="300" />
      <md-dialog-actions>
        <md-button class="md-raised md-white" @click="showDialog = false">Cerar</md-button>
      </md-dialog-actions>
    </md-dialog>

    <div class="md-layout">
      <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100">
        <!-- <form novalidate @submit.prevent="savePost"> -->
        <div>
          <!-- <form> -->
          <md-card>
            <md-card-header data-background-color="blue-900">
              <h4 class="title">Agregar Publicación</h4>
              <div class="activo">
                <md-switch v-model="publicacion.status_publicacion">Estatus</md-switch>
              </div>
              <p class="category"></p>
            </md-card-header>
            <md-card-content>
              <div class="md-layout">
                <div class="md-layout-item md-small-size-100 md-size-33">
                  <md-field>
                    <label>Título</label>
                    <md-input v-model="publicacion.titulo_publicacion" type="text"></md-input>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-33">
                  <md-field>
                    <label>Subtítulo</label>
                    <md-input v-model="publicacion.sub_titulo_publicacion" type="text"></md-input>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-33">
                  <md-datepicker v-model="publicacion.fecha_publicacion">
                    <label>Fecha</label>
                  </md-datepicker>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-15">
                  <md-field>
                    <label for="font">Idioma</label>
                    <md-select v-model="publicacion.lang" name="font" id="font">
                      <md-option value="es">🇲🇽</md-option>
                      <md-option value="en">🇺🇸</md-option>
                    </md-select>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-95 md-size-30">
                  <md-field>
                    <label>Imagen</label>
                    <md-file
                      v-model="publicacion.imagen_publicacion"
                      accept="image/*"
                      @change="onFileUpload"
                    />
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-5 md-size-5">
                  <md-field>
                    <a href="javascript:void(1)" @click="showDialog = true">
                      <md-icon>insert_photo</md-icon>
                    </a>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-50">
                  <md-chips class="md-primary" v-model="publicacion.etiquetas">
                    <label>Etiquetas</label>
                  </md-chips>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-100">
                  <vue-editor v-model="publicacion.contenido_publicacion"></vue-editor>
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

              <div :class="getClass">
                <md-list>
                  <md-list-item md-expand>
                    <md-icon>photo_library</md-icon>
                    <span class="md-list-item-text">Galeria</span>

                    <md-list slot="md-expand">
                      <md-list-item class="md-inset">
                        <div class="md-layout">
                          <div class="md-layout-item md-small-size-100 md-size-100">
                            <md-field>
                              <label>Imagen</label>
                              <md-file v-model="img" accept="image/*" @change="onFileUploadSlide" />
                            </md-field>
                          </div>
                          <div class="md-layout-item md-small-size-50 md-size-50">
                            <md-content class="md-scrollbar">
                              <md-list>
                                <draggable
                                  v-model="publicacion.images"
                                  v-bind="dragOptions"
                                  :move="checkMove"
                                  @end="onEnd"
                                  class="drop"
                                >
                                  <md-list-item
                                    v-for="(item,index) in publicacion.images"
                                    :key="index"
                                    class="drag2"
                                    @click="image={url:item.archivo_imagen_publicacion,id:item.id_img_publicacion}"
                                  >
                                    <a
                                      href="javascript:void(1)"
                                      @click="active=true;image={url:item.archivo_imagen_publicacion,id:item.id_img_publicacion}"
                                    >
                                      <md-icon>clear</md-icon>
                                    </a>
                                    <span
                                      class="md-list-item-text"
                                    >{{item.archivo_imagen_publicacion}}</span>
                                  </md-list-item>
                                </draggable>
                              </md-list>
                            </md-content>
                          </div>
                          <div class="md-layout-item md-small-size-50 md-size-50">
                            <img :src="'/publicaciones/'+image.url" v-if="image!==''" />
                          </div>
                        </div>
                      </md-list-item>
                    </md-list>
                  </md-list-item>
                </md-list>
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
import { forEach } from "lodash";
import { VueEditor } from "vue2-editor";
import draggable from "vuedraggable";

export default {
  data() {
    return {
      publicacion: {
        etiquetas: [],
        titulo_publicacion: "",
        sub_titulo_publicacion: "",
        contenido_publicacion: "",
        imagen_publicacion: "",
        fecha_publicacion: "",
        status_publicacion: false,
        lang: "es",
      },
      sending: false,
      isUpdated: false,
      titulo: "Agregar Publicación",
      showDialog: false,
      active: false,
      image: "",
      img: "",
      File: null,
      isFile: false,
      imgFile: "",
      respuesta: { realizado: false },
    };
  },
  methods: {
    onEnd(event) {
      this.publicacion.images.map((item, index) => {
        let user = JSON.parse(this.$session.get("user"));
        this.axios
          .put(
            "/api/blog/pub/" + item.id_img_publicacion,
            { orden: index + 1 },
            {
              headers: {
                Authorization: user.token_type + " " + user.access_token,
              },
            }
          )
          .then((response) => {});

        return (item.pos_imagen_publicacion = index + 1);
      });
    },
    getPubById(id) {
      let user = JSON.parse(this.$session.get("user"));
      this.axios
        .get("/api/blog/" + id, {
          headers: {
            Authorization: user.token_type + " " + user.access_token,
          },
        })
        .then((response) => {
          this.publicacion = response.data;
          if (this.publicacion.etiquetas === null) {
            this.publicacion.etiquetas = [];
          } else {
            this.publicacion.etiquetas = JSON.parse(this.publicacion.etiquetas);
          }
          this.publicacion.status_publicacion =
            this.publicacion.status_publicacion === 1;
          this.image = {
            url: this.publicacion.images[0].archivo_imagen_publicacion,
            id: this.publicacion.images[0].id_img_publicacion,
          };
          this.isUpdated = true;
        });
    },
    onFileUpload(event) {
      this.File = event.target.files[0];
      this.imgFile = URL.createObjectURL(this.File);
      this.isFile = true;
    },
    onFileUploadSlide(event) {
      let fileSlide = event.target.files[0];
      let formData = new FormData();
      formData.append("img", fileSlide);
      let user = JSON.parse(this.$session.get("user"));
      this.axios
        .post("/api/blog/image", formData, {
          headers: {
            Authorization: user.token_type + " " + user.access_token,
            "Content-Type": "multipart/form-data",
            id: this.publicacion.idbase,
          },
        })
        .then((response) => {
          this.img = "";
          this.publicacion.images = response.data.images;
          this.respuesta.realizado = true;
          this.respuesta.texto = response.data.message;
        })
        .catch((error) => {});
    },
    savePosts() {
      if (this.isUpdated) {
        this.updatePost();
      } else {
        this.savePost();
      }
    },
    savePost() {
      let user = JSON.parse(this.$session.get("user"));
      let formData = new FormData();

      formData.append("portada", this.File);
      this.publicacion.id_usuarios = user.id;
      formData.append("body", JSON.stringify(this.publicacion));
      this.axios
        .post("/api/blog", formData, {
          headers: {
            Authorization: user.token_type + " " + user.access_token,
            "Content-Type": "multipart/form-data",
          },
        })
        .then((response) => {
          this.publicacion = response.data.publicacion;
          this.publicacion.status_publicacion =
            this.publicacion.status_publicacion === 1;
          this.respuesta.realizado = true;
          this.respuesta.texto = response.data.message;
        })
        .catch((error) => {});
    },
    updatePost() {
      let user = JSON.parse(this.$session.get("user"));
      this.publicacion.id_usuarios = user.id;
      let formData = new FormData();
      formData.append("portada", this.File);
      formData.append("body", JSON.stringify(this.publicacion));
      formData.append("_method", "PATCH");
      this.axios
        .post("/api/blog/" + this.publicacion.id_publicacion, formData, {
          headers: {
            Authorization: user.token_type + " " + user.access_token,
            "Content-Type": "multipart/form-data",
          },
        })
        .then((response) => {
          this.publicacion = response.data.publicacion;
          this.publicacion.status_publicacion =
            this.publicacion.status_publicacion === 1;
          this.respuesta.realizado = true;
          this.respuesta.texto = response.data.message;
        })
        .catch((error) => {});
    },
    onConfirm() {
      let user = JSON.parse(this.$session.get("user"));
      this.axios
        .delete("/api/blog/image/" + this.image.id, {
          headers: {
            Authorization: user.token_type + " " + user.access_token,
          },
        })
        .then((response) => {
          this.publicacion.images = response.data.images;
          this.respuesta.realizado = true;
          this.respuesta.texto = response.data.message;
        })
        .catch((error) => {});
    },
    onCancel() {},
  },
  created() {},
  mounted() {},
  watch: {
    "$route.params.id": {
      handler: function (id) {
        if (typeof id === "undefined") {
          this.publicacion = {
            etiquetas: [],
            titulo_publicacion: "",
            sub_titulo_publicacion: "",
            contenido_publicacion: "",
            imagen_publicacion: "",
            fecha_publicacion: "",
            status_publicacion: false,
            lang: "es",
          };
          this.isUpdated = false;
          this.titulo = "Agregar Publicación";
        } else {
          this.getPubById(parseInt(id));
          this.isUpdated = true;
          this.titulo = "Actualizar Publicación";
        }
      },
      deep: true,
      immediate: true,
    },
  },
  computed: {
    getClass() {
      if (typeof this.publicacion.id_publicacion === "undefined") {
        return ["list", "d-none"];
      } else {
        return ["list"];
      }
    },
    dragOptions() {
      return {
        animation: 200,
        group: "description",
        disabled: false,
        ghostClass: "ghost",
      };
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
