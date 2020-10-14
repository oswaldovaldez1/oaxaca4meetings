<template>
  <div>
    <md-dialog-confirm
      :md-active.sync="active"
      :md-title="edicion.delete.title"
      :md-content="edicion.delete.message"
      md-confirm-text="Eliminar"
      md-cancel-text="Cancelar"
      @md-cancel="onCancel"
      @md-confirm="onConfirm"
    />
    <md-table
      v-model="datas"
      md-sort="sort"
      md-sort-order="asc"
      :table-header-color="tableHeaderColor"
      md-fixed-header
    >
      <md-table-toolbar>
        <md-field md-clearable class="md-toolbar-section-end">
          <md-input placeholder="Buscar..." v-model="search" @input="busqueda" />
        </md-field>
      </md-table-toolbar>

      <md-table-row slot="md-table-row" slot-scope="{ item }">
        <md-table-cell
          v-for="(itemx,index) in itemsData"
          :key="index"
          :md-label="itemx.label"
          :md-sort-by="itemx.name"
          class="paso"
        >
          <div v-if="itemx.label==='Estatus'">
            <span
              :class="['material-icons', getColor(item[itemx.name])]"
            >{{getIcons(item[itemx.name])}}</span>
          </div>
          <div v-else-if="itemx.label==='Idioma'">
            <span v-if="item[itemx.name]=='es'">🇲🇽</span>
            <span v-else>🇺🇸</span>
          </div>
          <div v-else>{{ item[itemx.name] }}</div>
        </md-table-cell>

        <!-- <md-table-cell md-label="Name" md-sort-by="name">{{ item.name }}</md-table-cell>
        <md-table-cell md-label="Country" md-sort-by="country">{{ item.country }}</md-table-cell>
        <md-table-cell md-label="City" md-sort-by="city">{{ item.city }}</md-table-cell>
        <md-table-cell md-label="Salary" md-sort-by="salary">{{ item.salary }}</md-table-cell>-->

        <md-table-cell md-label="Editar" v-if="edicion.isEditing">
          <md-button class="md-dense md-info" :to="edicion.url+'actualizar/'+item[edicion.id]">
            <md-icon>edit</md-icon>
          </md-button>
        </md-table-cell>
        <md-table-cell md-label="Eliminar" v-if="edicion.isDeleting">
          <md-button class="md-dense md-danger" @click="active=true; idItem=item[edicion.id]">
            <md-icon>delete</md-icon>
          </md-button>
        </md-table-cell>
      </md-table-row>
    </md-table>
    <md-snackbar :md-active.sync="respuesta.realizado">{{ respuesta.texto }}</md-snackbar>
  </div>
</template>

<script>
export default {
  name: "simple-table",
  props: {
    tableHeaderColor: {
      type: String,
      default: "",
    },
    datos: {
      type: Array,
      default: [],
    },
    sort: {
      type: String,
      default: "",
    },
    itemsData: {
      type: Array,
      default: [],
    },
    edicion: {
      type: Object,
      default: {},
    },
  },
  data() {
    return {
      idItem: 0,
      active: false,
      selected: [],
      datas: [],
      search: "",
      respuesta: { realizado: false },
    };
  },
  created() {},
  mounted() {},
  watch: {
    datos: {
      handler(val) {
        if (val.length > 0) {
          this.datas = val;
        }
      },
      deep: true,
    },
  },
  computed: {},
  methods: {
    onCancel() {},
    deleteItem() {
      let i = this.datos.findIndex((item) => item.id === this.idItem);
      this.datos.splice(i, 1);
    },
    onConfirm() {
      let user = JSON.parse(this.$session.get("user"));
      this.axios
        .delete(this.edicion.delete.url + this.idItem, {
          headers: {
            Authorization: user.token_type + " " + user.access_token,
          },
        })
        .then((response) => {
          this.deleteItem();
          this.respuesta.realizado = true;
          this.respuesta.texto = response.data.message;
        })
        .catch((error) => {
          console.log(error.response.data);
        });
    },
    getColor(value) {
      return value === 0 ? "text-danger" : "text-success";
    },
    getIcons(value) {
      return value === 0 ? "assignment_late" : "assignment_turned_in";
    },
    getKeyByValue(object, value) {
      return object[value];
    },
    busqueda() {
      this.datas = this.datos.filter(
        (item) =>
          item[this.sort].toLowerCase().search(this.search.toLowerCase()) != -1
      );
    },
    toLower(text) {
      return text.toString().toLowerCase();
    },

    searchByName(items, term) {
      if (term) {
        return items.filter((item) => {
          this.toLower(item[this.sort]).search(term.toLowerCase()) != -1;
        });
      }

      return items;
    },
  },
};
</script>
