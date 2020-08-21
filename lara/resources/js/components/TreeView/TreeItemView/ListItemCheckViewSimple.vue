<template>
  <md-list-item class="treeListItem">
    <md-checkbox v-model="checked.check" />
    <md-icon>{{ checked.icon }}</md-icon>
    <span class="md-list-item-text">{{checked.title}}</span>
  </md-list-item>
</template>

<script>
export default {
  props: ["checkView"],
  data() {
    return {
      checked: this.checkView,
    };
  },
};
</script>

<style>
</style>
