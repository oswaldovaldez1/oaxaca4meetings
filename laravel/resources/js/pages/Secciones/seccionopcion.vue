<template>
  <div>
    <seccionGaleria v-if="seccion.tipo==='G'"></seccionGaleria>
    <seccionImage v-else-if="seccion.tipo==='S'"></seccionImage>
    <seccionTexto v-else-if="seccion.tipo==='T'"></seccionTexto>
  </div>
</template>

<script>
import seccionGaleria from "./seccionGaleria";
import seccionImage from "./seccionImagen";
import seccionTexto from "./seccionTexto";

export default {
  data() {
    return {
      seccion: {},
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
  components: {
    seccionGaleria,
    seccionImage,
    seccionTexto,
  },
};
</script>

<style>
</style>
