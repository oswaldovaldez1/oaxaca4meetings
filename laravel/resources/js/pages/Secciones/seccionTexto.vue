<template>
  <div class="content">
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
                <div class="md-layout-item md-small-size-100 md-size-33">
                  <md-field>
                    <label>Título1</label>
                    <md-input v-model="seccion.titulo1" type="text"></md-input>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-33">
                  <md-field>
                    <label>Título2</label>
                    <md-input v-model="seccion.titulo2" type="text"></md-input>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-33">
                  <md-field>
                    <label>Subtítulo</label>
                    <md-input v-model="seccion.subtitulo" type="text"></md-input>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-15">
                  <md-field>
                    <label for="font">Idioma</label>
                    <md-select v-model="seccion.lang" name="font" id="font" :disabled="true">
                      <md-option value="es">🇲🇽</md-option>
                      <md-option value="en">🇺🇸</md-option>
                    </md-select>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-50">
                  <md-field>
                    <label>Fuente</label>
                    <md-input v-model="seccion.fuente" type="text"></md-input>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-100">
                  <label>Contexto</label>

                  <vue-editor v-model="seccion.contexto" :editor-toolbar="customToolbar"></vue-editor>
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

export default {
  data() {
    return {
      seccion: {},
      respuesta: { realizado: false },
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
        });
    },
    savePost() {
      let user = JSON.parse(this.$session.get("user"));
      this.axios
        .put("/api/seccion/" + this.seccion.id, this.seccion, {
          headers: {
            Authorization: user.token_type + " " + user.access_token,
          },
        })
        .then((response) => {
          this.respuesta.realizado = true;
          this.respuesta.texto = response.data.response;
        });
    },
    onConfirm() {},
    onCancel() {},
  },
  created() {},
  mounted() {},
  watch: {
    "$route.params.id": {
      handler: function (id) {
        this.getSeccion(id);
      },
      deep: true,
      immediate: true,
    },
  },
  computed: {},
  components: {
    VueEditor,
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
</style>

