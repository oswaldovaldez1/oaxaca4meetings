<template>
  <div class="content">
    <div class="md-layout">
      <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100">
        <md-card>
          <md-card-header data-background-color="blue-900">
            <h4 class="title">Secciones</h4>
          </md-card-header>
          <md-card-content>
            <simple-table
              table-header-color="blue-900"
              :datos="secciones"
              sort="ubicacion"
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
import { mapGetters, mapActions } from "vuex";

export default {
  data() {
    return {
      secciones: [],
      edicion: {
        url: "/admin/seccion/",
        id: "id",
        delete: {
          url: "",
          message: "",
          title: "",
        },
        isEditing: true,
        isDeleting: false,
      },
      items: [
        {
          name: "ubicacion",
          label: "Ubicación",
        },
        {
          name: "lang",
          label: "Idioma",
        },
      ],
    };
  },
  computed: {},
  methods: {
    getSeccions() {
      let user = JSON.parse(this.$session.get("user"));
      this.axios
        .get("/api/seccion", {
          headers: {
            Authorization: user.token_type + " " + user.access_token,
          },
        })
        .then((response) => {
          this.secciones = response.data;
        });
    },
  },
  created() {
    this.getSeccions();
  },
  components: {
    SimpleTable,
  },
};
</script>
