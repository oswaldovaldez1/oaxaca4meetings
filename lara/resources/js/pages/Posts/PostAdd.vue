<template>
  <div class="content">
    <div class="md-layout">
      <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100">
        <!-- <form novalidate @submit.prevent="validateUser"> -->
        <form>
          <md-card>
            <md-card-header data-background-color="blue-900">
              <h4 class="title">Agregar Publicación</h4>
              <div class="activo">
                <md-switch v-model="publicacion.status">Estatus</md-switch>
              </div>
              <p class="category"></p>
            </md-card-header>
            <md-card-content>
              <div class="md-layout">
                <div class="md-layout-item md-small-size-100 md-size-33">
                  <md-field>
                    <label>Título</label>
                    <md-input v-model="publicacion.titulo" type="text"></md-input>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-33">
                  <md-field>
                    <label>Subtítulo</label>
                    <md-input v-model="publicacion.subTitulo" type="text"></md-input>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-33">
                  <md-datepicker v-model="publicacion.fecha">
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
                <div class="md-layout-item md-small-size-100 md-size-30">
                  <md-field>
                    <label>Imagen</label>
                    <md-file v-model="publicacion.portada" accept="image/*" />
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-30">
                  <md-chips class="md-primary" v-model="publicacion.etiquetas">
                    <label>Etiquetas</label>
                  </md-chips>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-100">
                  <vue-editor v-model="publicacion.content"></vue-editor>
                </div>
              </div>
              <!-- <div class="ql-editor" v-html="publicacion.content"></div> -->
              <!-- <div>{{publicacion.content}}</div> -->

              <!-- <div contenteditable="true" v-html="publicacion.content"></div> -->
              <div class="list">
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
                              <md-file v-model="publicacion.portada" accept="image/*" />
                            </md-field>
                          </div>
                          <div class="md-layout-item md-small-size-50 md-size-50">
                            <md-content class="md-scrollbar">
                              <md-list>
                                <draggable v-model="countries" class="drop">
                                  <md-list-item
                                    v-for="(item,index) in countries"
                                    :key="index"
                                    class="drag2"
                                  >
                                    <span class="md-list-item-text">{{item}}</span>
                                  </md-list-item>
                                </draggable>
                              </md-list>
                            </md-content>
                          </div>
                          <div class="md-layout-item md-small-size-50 md-size-50">
                            <img src="/publicaciones/2018_11_9_img_TeatroMacedonioAlcal.jpg" />
                          </div>
                        </div>
                      </md-list-item>
                    </md-list>
                  </md-list-item>
                </md-list>
              </div>
            </md-card-content>
          </md-card>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { VueEditor } from "vue2-editor";
import draggable from "vuedraggable";
export default {
  data() {
    return {
      publicacion: {
        etiquetas: [],
      },
      countries: [
        "Algeria",
        "Argentina",
        "Brazil",
        "Canada",
        "Italy",
        "Japan",
        "United Kingdom",
        "United States",
      ],
    };
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
