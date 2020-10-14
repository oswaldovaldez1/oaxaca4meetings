<template>
  <div class="content">
    <div class="md-layout">
      <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100">
        <md-card>
          <md-card-header data-background-color="blue-900">
            <h4 class="title">Blog</h4>
            <md-button class="md-dense md-info btn-absolute" to="/admin/publicacion/agregar">
              <md-icon>playlist_add</md-icon>Agregar Publicaión
            </md-button>
          </md-card-header>
          <md-card-content>
            <simple-table
              table-header-color="blue-900"
              :datos="blogList"
              sort="titulo_publicacion"
              :itemsData="items"
              :edicion="edicion"
            ></simple-table>
          </md-card-content>
        </md-card>
      </div>
    </div>
  </div>
</template>

<script>
import { SimpleTable } from "../../components";

export default {
  data() {
    return {
      blogList: [],
      edicion: {
        url: "/admin/publicacion/",
        id: "id_publicacion",
        delete: {
          url: "/api/blog/",
          message: "¿Desea usted eliminar este Post?",
          title: "Eliminar Post",
        },
        isEditing: true,
        isDeleting: true,
      },
      items: [
        {
          name: "titulo_publicacion",
          label: "Titulo",
        },
        {
          name: "lang",
          label: "Idioma",
        },
        {
          name: "fecha_publicacion",
          label: "Fecha de Publicación",
        },
        {
          name: "status_publicacion",
          label: "Estatus",
        },
      ],
    };
  },
  computed: {},
  methods: {
    getAllPub() {
      let user = JSON.parse(this.$session.get("user"));

      this.axios
        .get("/api/blog", {
          headers: {
            Authorization: user.token_type + " " + user.access_token,
          },
        })
        .then((response) => {
          this.blogList = response.data;
        });
    },
  },
  created() {
    this.getAllPub();
  },
  components: {
    SimpleTable,
  },
};
</script>
