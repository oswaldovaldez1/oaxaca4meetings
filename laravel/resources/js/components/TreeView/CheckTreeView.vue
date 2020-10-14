<template>
  <div class="list">
    <md-list class="treeList">
      <div v-for="(item,index) in listCheck" v-show="listCheck!=null" :key="index">
        <div class="treeItem expand" v-if="isExist(item,'child')">
          <ListItemCheckViewExpand :checkView="item"></ListItemCheckViewExpand>
        </div>
        <div class="treeItem single" v-else>
          <ListItemCheckViewSimple :checkView="item"></ListItemCheckViewSimple>
        </div>
      </div>
    </md-list>
  </div>
</template>

<script>
import ListItemCheckViewExpand from "./TreeItemView/ListItemCheckViewExpand";
import ListItemCheckViewSimple from "./TreeItemView/ListItemCheckViewSimple";
export default {
  props: ["dataCheck"],
  data() {
    return {
      listCheck: this.dataCheck,
    };
  },
  methods: {
    isExist(object, key) {
      return object[key] != undefined;
    },
  },
  components: {
    ListItemCheckViewExpand,
    ListItemCheckViewSimple,
  },
  mounted() {},
};
</script>
<style lang="scss" scoped>
.list {
  overflow: hidden;
}
.treeItem {
  padding-left: 20px;
  position: relative;

  &.expand {
    &.md-list-expand {
      overflow: auto;
    }
  }

  &.single::before {
    content: " ";
    width: 0px;
    height: 50px;
    border-left: 1px solid grey;
    position: absolute;
    top: -25px;
  }
  &.expand::before {
    content: " ";
    width: 0px;
    height: 100%;
    border-left: 1px solid grey;
    position: absolute;
    top: -25px;
  }
  &::after {
    content: " ";
    width: 20px;
    height: 0px;
    position: absolute;
    border-top: 1px solid grey;
    top: 25px;
  }
}
</style>

