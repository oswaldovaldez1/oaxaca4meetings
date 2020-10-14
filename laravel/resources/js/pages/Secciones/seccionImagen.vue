<template>
  <div class="content">
    <md-dialog-confirm
      :md-active.sync="active"
      md-title="¿Eliminar Imagen?"
      md-content="¿Desea usted eliminar esta Imagen?."
      md-confirm-text="Eliminar"
      md-cancel-text="Cancelar"
      @md-cancel="onCancel"
      @md-confirm="onConfirm"
    />
    <div class="md-layout">
      <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100">
        <div>
          <md-card>
            <md-card-header data-background-color="blue-900">
              <h4 class="title">{{seccion.ubicacion}}</h4>
              <p class="category"></p>
            </md-card-header>
            <md-card-content>
              <div class="md-layout">
                <div class="md-layout-item md-small-size-100 md-size-100">
                  <md-field>
                    <label>Imagen</label>
                    <md-file v-model="image" accept="image/*" @change="onFileUploadSlide" />
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-50 md-size-50">
                  <md-content class="md-scrollbar">
                    <md-list>
                      <draggable
                        v-model="seccion.images"
                        v-bind="dragOptions"
                        @end="onEnd"
                        class="drop"
                      >
                        <md-list-item
                          v-for="(item,index) in seccion.images"
                          :key="index"
                          class="drag2"
                          @click="img=item"
                        >
                          <a href="javascript:void(1)" @click="active=true;id=item.id">
                            <md-icon>clear</md-icon>
                          </a>
                          <span class="md-list-item-text">{{item.img}}</span>
                        </md-list-item>
                      </draggable>
                    </md-list>
                  </md-content>
                </div>
                <div class="md-layout-item md-small-size-50 md-size-50">
                  <div class="md-layout-item md-small-size-100 md-size-100">
                    <img :src="'/'+img.titulo+img.img" />
                  </div>
                  <div class="md-layout-item md-small-size-100 md-size-100">
                    <label>Contexto</label>

                    <vue-editor v-model="img.pie_pagina" :editor-toolbar="customToolbar"></vue-editor>
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
      seccion: {},
      respuesta: { realizado: false },
      img: {},
      id: 0,
      active: false,
      image: "",
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
    onCancel() {},
    onConfirm() {
      let user = JSON.parse(this.$session.get("user"));
      this.axios
        .delete("/api/seccionimage/" + this.id, {
          headers: {
            Authorization: user.token_type + " " + user.access_token,
          },
        })
        .then((response) => {
          this.seccion.images = response.data.images;
          this.respuesta.realizado = true;
          this.respuesta.texto = response.data.message;
        })
        .catch((error) => {
          console.log(error.response);
        });
    },
    onEnd(event) {
      this.seccion.images.map((item, index) => {
        let user = JSON.parse(this.$session.get("user"));
        this.axios
          .put(
            "/api/seccionimage/orden/" + item.id,
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
    onFileUploadSlide(event) {
      let File = event.target.files[0];

      let formData = new FormData();
      formData.append("img", File);
      formData.append("id_seccion", this.seccion.id);
      formData.append("ubicacion", this.seccion.ubicacion);

      let user = JSON.parse(this.$session.get("user"));

      this.axios
        .post("/api/seccionimage/", formData, {
          headers: {
            Authorization: user.token_type + " " + user.access_token,
            "Content-Type": "multipart/form-data",
          },
        })
        .then((response) => {
          this.seccion.images = response.data.images;
          this.respuesta.realizado = true;
          this.respuesta.texto = response.data.message;
        })
        .catch((error) => {});
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
          this.img = this.seccion.images[0];
        });
    },
    savePost() {
      let user = JSON.parse(this.$session.get("user"));
      this.axios
        .put("/api/seccionimage/" + this.img.id, this.img, {
          headers: {
            Authorization: user.token_type + " " + user.access_token,
          },
        })
        .then((response) => {
          this.respuesta.realizado = true;
          this.respuesta.texto = response.data.response;
        });
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
