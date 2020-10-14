<template>
  <div class="content">
    <md-dialog-confirm
      :md-active.sync="active"
      md-title="¿Eliminar Evento?"
      md-content="¿Desea usted eliminar este Evento?."
      md-confirm-text="Eliminar"
      md-cancel-text="Cancelar"
      @md-cancel="onCancel"
      @md-confirm="onConfirm"
    />
    <md-dialog-confirm
      :md-active.sync="activeImg"
      md-title="¿Eliminar Imagen?"
      md-content="¿Desea usted eliminar esta imagen?."
      md-confirm-text="Eliminar"
      md-cancel-text="Cancelar"
      @md-cancel="onCancel"
      @md-confirm="onConfirmImg"
    />
    <div class="md-layout">
      <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100">
        <div>
          <md-card>
            <md-card-header data-background-color="blue-900">
              <h4 class="title">{{seccion.ubicacion}}</h4>
              <p class="category"></p>
              <md-button class="md-dense md-info btn-absolute" @click="nuevo">
                <md-icon>add</md-icon>Agregar Evento
              </md-button>
            </md-card-header>
            <md-card-content>
              <div class="md-layout">
                <div class="md-layout-item md-small-size-50 md-size-50">
                  <md-content class="md-scrollbar">
                    <md-list>
                      <draggable v-model="gallery" class="drop" v-bind="dragOptions" @end="onEnd">
                        <md-list-item
                          v-for="(item,index) in gallery"
                          :key="index"
                          class="drag2"
                          @click="updated(item)"
                        >
                          <a href="javascript:void(1)" @click="active=true;id=item.id">
                            <md-icon>clear</md-icon>
                          </a>
                          <span class="md-list-item-text" v-html="item.titulo">}</span>
                        </md-list-item>
                      </draggable>
                    </md-list>
                  </md-content>
                </div>
                <div class="md-layout-item md-small-size-50 md-size-50">
                  <div class="md-layout-item md-small-size-100 md-size-100">
                    <md-field>
                      <label>Portada</label>
                      <md-file v-model="imgPreview" accept="image/*" @change="onFileUpload" />
                    </md-field>
                  </div>
                  <div class="md-layout-item md-small-size-100 md-size-100">
                    <img
                      v-if="isUpdate===true && isChange===false"
                      :src="'/'+img.portada"
                      style="width:150px;"
                    />
                    <div v-else>
                      <img v-if="image!=null" :src="image" style="width:150px;" />
                    </div>
                  </div>
                  <div class="md-layout-item md-small-size-100 md-size-100">
                    <md-field>
                      <label>Título</label>
                      <md-input v-model="img.titulo" type="text"></md-input>
                    </md-field>
                  </div>
                  <div class="md-layout-item md-small-size-100 md-size-100">
                    <label>Contexto</label>

                    <vue-editor v-model="img.contexto" :editor-toolbar="customToolbar"></vue-editor>
                  </div>
                  <div class="md-layout-item md-small-size-100 md-size-100">
                    <md-field>
                      <label>Imagen</label>
                      <md-file
                        v-model="imgPreviewGallery"
                        accept="image/*"
                        @change="onFileUploadGallery"
                      />
                    </md-field>
                  </div>
                  <div class="md-layout-item md-small-size-100 md-size-100">
                    <p>Galeria</p>
                    <md-content class="md-scrollbar">
                      <md-list>
                        <draggable
                          v-model="imgGallery"
                          v-bind="dragOptions"
                          @end="onEndGallery"
                          class="drop"
                        >
                          <md-list-item
                            v-for="(item,index) in imgGallery"
                            :key="index"
                            class="drag2"
                          >
                            <a href="javascript:void(1)" @click="activeImg=true;id=item.id">
                              <md-icon>clear</md-icon>
                            </a>
                            <img v-if="isUpdate" :src="'/'+item.img" style="width:150px;" />
                            <img v-else :src="item.img" style="width:150px;" />
                          </md-list-item>
                        </draggable>
                      </md-list>
                    </md-content>
                  </div>
                </div>
              </div>

              <div class="md-layout-item md-size-100 text-right">
                <md-button class="md-raised md-success" type="button" @click="savePost">
                  <md-icon>send</md-icon>
                </md-button>
              </div>
            </md-card-content>
          </md-card>
        </div>
      </div>
    </div>
    <md-snackbar :md-active.sync="respuesta.realizado">{{ respuesta.texto }}</md-snackbar>
  </div>
</template>

<script>
import { VueEditor } from "vue2-editor";
import draggable from "vuedraggable";
export default {
  data() {
    return {
      id: 0,
      seccion: {},
      respuesta: { realizado: false },
      gallery: [],
      imgGallery: [],
      _imgGallery: [],
      isChange: false,
      img: {},
      active: false,
      activeImg: false,
      imgs: "",
      image: null,
      _image: null,
      imgPreview: "",
      imgPreviewGallery: "",
      isUpdate: true,
      customToolbar: [
        ["bold", "italic", "underline", "strike"],
        [
          { align: "" },
          { align: "center" },
          { align: "right" },
          { align: "justify" },
        ],
        [{ list: "ordered" }, { list: "bullet" }],
      ],
    };
  },
  methods: {
    onEnd() {
      this.gallery.map((item, index) => {
        let user = JSON.parse(this.$session.get("user"));
        this.axios
          .put(
            "/api/gallery/orden/" + item.id,
            { orden: index + 1 },
            {
              headers: {
                Authorization: user.token_type + " " + user.access_token,
              },
            }
          )
          .then((response) => {});
        return (item.posicion = index + 1);
      });
    },
    onEndGallery() {
      this.imgGallery.map((item, index) => {
        let user = JSON.parse(this.$session.get("user"));
        this.axios
          .put(
            "/api/galleryimage/orden/" + item.id,
            { orden: index + 1 },
            {
              headers: {
                Authorization: user.token_type + " " + user.access_token,
              },
            }
          )
          .then((response) => {});
        return (item.posicion = index + 1);
      });
    },
    onConfirm() {
      let user = JSON.parse(this.$session.get("user"));
      this.axios
        .delete("/api/gallery/" + this.id, {
          headers: {
            Authorization: user.token_type + " " + user.access_token,
          },
        })
        .then((response) => {
          this.respuesta.realizado = true;
          this.respuesta.texto = response.data.message;
          this.getGallery();
        })
        .catch((error) => {
          console.log(error.response);
        });
    },
    onConfirmImg() {
      let user = JSON.parse(this.$session.get("user"));
      this.axios
        .delete("/api/galleryimage/" + this.id, {
          headers: {
            Authorization: user.token_type + " " + user.access_token,
          },
        })
        .then((response) => {
          this.respuesta.realizado = true;
          this.respuesta.texto = response.data.message;
          this.imgGallery = response.data.images;
        })
        .catch((error) => {
          console.log(error.response);
        });
    },
    onCancel() {},
    onFileUpload(event) {
      let File = event.target.files[0];
      this._image = File;
      this.image = URL.createObjectURL(File);
      this.isChange = true;
    },
    onFileUploadGallery(event) {
      if (!this.isUpdate) {
        let File = event.target.files[0];
        this._imgGallery.push(File);
        let imageTmp = URL.createObjectURL(File);
        this.imgGallery.push({ img: imageTmp });
      } else {
        let File = event.target.files[0];
        let formData = new FormData();
        formData.append("img", File);
        formData.append("orden", this.imgGallery.length + 1);
        formData.append("_method", "PATCH");
        let user = JSON.parse(this.$session.get("user"));

        this.axios
          .post("/api/galleryimage/" + this.img.idbase, formData, {
            headers: {
              Authorization: user.token_type + " " + user.access_token,
              "Content-Type": "multipart/form-data",
            },
          })
          .then((response) => {
            this.imgGallery = response.data.galeria;
            this.respuesta.realizado = true;
            this.respuesta.texto = response.data.message;
            this.isUpdate = true;
            this.isChange = false;
          })
          .catch((error) => {});
      }
    },
    updated(item) {
      this.isUpdate = true;
      this.image = null;
      this.img = item;
    },
    nuevo() {
      this.isUpdate = false;
      this.image = null;
      this._image = null;
      this.img = {};
      this.img.titulo = "";
      this.imgGallery = [];
      this._imgGallery = [];
      this.imgPreview = "";
      this.imgPreviewGallery = "";
    },
    getSeccion(id) {
      let user = JSON.parse(this.$session.get("user"));
      this.axios
        .get("/api/seccion/" + id, {
          headers: {
            Authorization: user.token_type + " " + user.access_token,
          },
        })
        .then((response) => {
          this.seccion = response.data;
          this.getGallery();
        });
    },
    getGallery() {
      let user = JSON.parse(this.$session.get("user"));
      this.axios
        .get("/api/gallery/", {
          headers: {
            Authorization: user.token_type + " " + user.access_token,
            lang: this.seccion.lang,
          },
        })
        .then((response) => {
          this.gallery = response.data;

          this.img = this.gallery[0];
          this.getGalleryImage();
        });
    },
    getGalleryImage(id) {
      let user = JSON.parse(this.$session.get("user"));
      this.axios
        .get("/api/galleryimage/", {
          headers: {
            Authorization: user.token_type + " " + user.access_token,
            id: this.img.idbase,
          },
        })
        .then((response) => {
          this.imgGallery = response.data;
        });
    },
    newGallery() {
      let formData = new FormData();
      formData.append("portada", this._image);
      formData.append("titulo", this.img.titulo);
      formData.append("contexto", this.img.contexto);
      formData.append("lang", this.seccion.lang);
      this._imgGallery.map((value, index) => {
        formData.append("galeria" + index, value);
      });

      let user = JSON.parse(this.$session.get("user"));

      this.axios
        .post("/api/gallery/", formData, {
          headers: {
            Authorization: user.token_type + " " + user.access_token,
            "Content-Type": "multipart/form-data",
          },
        })
        .then((response) => {
          this.gallery = response.data.galeria;
          this.respuesta.realizado = true;
          this.respuesta.texto = response.data.message;
          this.updated(this.gallery[this.gallery.length - 1]);
          this.isUpdate = true;
          this.isChange = false;
        })
        .catch((error) => {});
    },
    updateGallery() {
      let formData = new FormData();
      formData.append("portada", this._image);
      formData.append("titulo", this.img.titulo);
      formData.append("contexto", this.img.contexto);
      formData.append("_method", "PATCH");

      let user = JSON.parse(this.$session.get("user"));

      this.axios
        .post("/api/gallery/" + this.img.id, formData, {
          headers: {
            Authorization: user.token_type + " " + user.access_token,
            "Content-Type": "multipart/form-data",
          },
        })
        .then((response) => {
          this.img = response.data.img;
          this.respuesta.realizado = true;
          this.respuesta.texto = response.data.message;
          this.isUpdate = true;
          this.isChange = false;
        })
        .catch((error) => {});
    },
    savePost() {
      if (this.isUpdate) {
        this.updateGallery();
      } else {
        this.newGallery();
      }
    },
  },
  watch: {
    "$route.params.id": {
      handler: function (id) {
        this.getSeccion(id);
      },
      deep: true,
      immediate: true,
    },
    img: function (newValue, oldValue) {
      var doc = new DOMParser().parseFromString(newValue.titulo, "text/html");
      this.img.titulo = doc.body.textContent;
      this.getGalleryImage();
    },
  },
  computed: {
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

<style>
</style>

