<template>
  <div>
    <md-table
      v-model="users"
      md-sort="name"
      md-sort-order="asc"
      :table-header-color="tableHeaderColor"
      md-fixed-header
    >
      <md-table-row slot="md-table-row" slot-scope="{ item }">
        <md-table-cell md-label="Name" md-sort-by="name">{{ item.name }}</md-table-cell>
        <md-table-cell md-label="Country" md-sort-by="country">{{ item.country }}</md-table-cell>
        <md-table-cell md-label="City" md-sort-by="city">{{ item.city }}</md-table-cell>
        <md-table-cell md-label="Salary" md-sort-by="salary">{{ item.salary }}</md-table-cell>
        <md-table-cell md-label="Editar">
          <md-button class="md-dense md-info">
            <md-icon>edit</md-icon>
          </md-button>
        </md-table-cell>
        <md-table-cell md-label="Eliminar">
          <md-button class="md-dense md-danger">
            <md-icon>delete</md-icon>
          </md-button>
        </md-table-cell>
      </md-table-row>
    </md-table>
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
  },
  data() {
    return {
      selected: [],
      users: [
        {
          name: "Dakota Rice",
          salary: "$36,738",
          country: "Niger",
          edit: "",
          delete: "",
          city: "Oud-Turnhout",
        },
        {
          name: "Minerva Hooper",
          salary: "$23,738",
          country: "Curaçao",
          edit: "",
          delete: "",
          city: "Sinaai-Waas",
        },
        {
          name: "Sage Rodriguez",
          salary: "$56,142",
          country: "Netherlands",
          edit: "",
          delete: "",
          city: "Overland Park",
        },
        {
          name: "Philip Chaney",
          salary: "$38,735",
          country: "Korea, South",
          edit: "",
          delete: "",
          city: "Gloucester",
        },
        {
          name: "Doris Greene",
          salary: "$63,542",
          country: "Malawi",
          edit: "",
          delete: "",
          city: "Feldkirchen in Kārnten",
        },
        {
          name: "Mason Porter",
          salary: "$78,615",
          country: "Chile",
          edit: "",
          delete: "",
          city: "Gloucester",
        },
        {
          name: "Dakota Rice",
          salary: "$36,738",
          country: "Niger",
          edit: "",
          delete: "",
          city: "Oud-Turnhout",
        },
        {
          name: "Minerva Hooper",
          salary: "$23,738",
          country: "Curaçao",
          edit: "",
          delete: "",
          city: "Sinaai-Waas",
        },
        {
          name: "Sage Rodriguez",
          salary: "$56,142",
          country: "Netherlands",
          edit: "",
          delete: "",
          city: "Overland Park",
        },
        {
          name: "Philip Chaney",
          salary: "$38,735",
          country: "Korea, South",
          edit: "",
          delete: "",
          city: "Gloucester",
        },
        {
          name: "Doris Greene",
          salary: "$63,542",
          country: "Malawi",
          edit: "",
          delete: "",
          city: "Feldkirchen in Kārnten",
        },
        {
          name: "Mason Porter",
          salary: "$78,615",
          country: "Chile",
          edit: "",
          delete: "",
          city: "Gloucester",
        },
        {
          name: "Dakota Rice",
          salary: "$36,738",
          country: "Niger",
          edit: "",
          delete: "",
          city: "Oud-Turnhout",
        },
        {
          name: "Minerva Hooper",
          salary: "$23,738",
          country: "Curaçao",
          edit: "",
          delete: "",
          city: "Sinaai-Waas",
        },
        {
          name: "Sage Rodriguez",
          salary: "$56,142",
          country: "Netherlands",
          edit: "",
          delete: "",
          city: "Overland Park",
        },
        {
          name: "Philip Chaney",
          salary: "$38,735",
          country: "Korea, South",
          edit: "",
          delete: "",
          city: "Gloucester",
        },
        {
          name: "Doris Greene",
          salary: "$63,542",
          country: "Malawi",
          edit: "",
          delete: "",
          city: "Feldkirchen in Kārnten",
        },
        {
          name: "Mason Porter",
          salary: "$78,615",
          country: "Chile",
          edit: "",
          delete: "",
          city: "Gloucester",
        },
      ],
    };
  },
};
</script>
