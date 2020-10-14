<template>
  <div class="content">
    <div class="md-layout">
      <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100">
        <md-card>
          <md-card-header data-background-color="blue-900">
            <h4 class="title">Usuarios</h4>
            <!-- <p class="category">Here is a subtitle for this table</p> -->
            <md-button class="md-dense md-info btn-absolute" to="/admin/usuario/agregar">
              <md-icon>person_add</md-icon>Agregar Usuario
            </md-button>
          </md-card-header>
          <md-card-content>
            <simple-table
              table-header-color="blue-900"
              :datos="userList"
              sort="name"
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
      userList: [],
      edicion: {
        url: "/admin/usuario/",
        delete: {
          url: "/api/auth/user/",
          message: "¿Desea usted eliminar este Usuario?",
          title: "Eliminar Usuario",
        },
        id: "id",
        isEditing: true,
        isDeleting: true,
      },
      items: [
        {
          name: "name",
          label: "Usuario",
        },
        {
          name: "email",
          label: "Correo",
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
    getAllUser() {
      let user = JSON.parse(this.$session.get("user"));

      this.axios
        .get("/api/user", {
          headers: {
            Authorization: user.token_type + " " + user.access_token,
          },
        })
        .then((response) => {
          this.userList = response.data;
        });
    },
  },
  created() {
    this.getAllUser();
  },
  components: {
    SimpleTable,
  },
};
</script>
