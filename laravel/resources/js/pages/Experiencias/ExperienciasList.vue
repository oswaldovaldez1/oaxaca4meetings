<template>
  <div class="content">
    <div class="md-layout">
      <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100">
        <md-card>
          <md-card-header data-background-color="blue-900">
            <h4 class="title">Experiencias</h4>
            <md-button class="md-dense md-info btn-absolute" to="/admin/experiencia/agregar">
              <md-icon>playlist_add</md-icon>Agregar Experiencia
            </md-button>
          </md-card-header>
          <md-card-content>
            <simple-table
              table-header-color="blue-900"
              :datos="blogList"
              sort="titulo"
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
        url: "/admin/experiencia/",
        id: "id",
        delete: {
          url: "/api/experiencias/",
          message: "¿Desea usted eliminar esta Experiencia?",
          title: "Eliminar Experiencia",
        },
        isEditing: true,
        isDeleting: true,
      },
      items: [
        {
          name: "titulo",
          label: "Titulo",
        },
        {
          name: "lang",
          label: "Idioma",
        },
        {
          name: "status",
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
        .get("/api/experiencias", {
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
