<template>
  <md-list-item md-expand class="treeListItem">
    <md-checkbox v-model="checked.check" :indeterminate="isIndeterminate" @change="changeGroup" />
    <md-icon>{{ checked.icon }}</md-icon>
    <span class="md-list-item-text">{{checked.title}}</span>

    <md-list slot="md-expand">
      <div class="treeItem single" v-for="(item,index) in  checkView.child" :key="index">
        <ListItemCheckViewSimple :checkView="item"></ListItemCheckViewSimple>
      </div>
    </md-list>
  </md-list-item>
</template>

<script>
import ListItemCheckViewSimple from "./ListItemCheckViewSimple";
export default {
  props: ["checkView"],
  data() {
    return {
      checked: this.checkView,
      isIndeterminate: false,
    };
  },
  components: {
    ListItemCheckViewSimple,
  },
  mounted() {
    this.isCheched();
  },
  watch: {
    checked: {
      handler(val) {
        this.isCheched();
      },
      deep: true,
    },
  },
  methods: {
    changeGroup() {
      if (this.isIndeterminate === true) {
        this.isIndeterminate = false;
        for (let x = 0; x < this.checked.child.length; x++) {
          this.checked.child[x].check = true;
        }
        this.checked.check = true;
      } else {
        if (this.checked.check === true) {
          for (let x = 0; x < this.checked.child.length; x++) {
            this.checked.child[x].check = false;
          }
          this.checked.check = false;
        } else {
          for (let x = 0; x < this.checked.child.length; x++) {
            this.checked.child[x].check = false;
          }
          this.checked.check = false;
        }
      }
    },
    isCheched() {
      let principan = false;
      let secundario = false;
      for (let x = 0; x < this.checked.child.length; x++) {
        if (x === 0) {
          principan = this.checked.child[x].check;
          secundario = this.checked.child[x].check;
        } else {
          principan = principan || this.checked.child[x].check;
          secundario = secundario && this.checked.child[x].check;
        }
      }
      this.checked.check = principan;
      this.isIndeterminate = !secundario;
    },
  },
};
</script>

<style lang="scss" scoped>
.single {
  padding-left: 20px;
  position: relative;
  &::before {
    content: " ";
    width: 0px;
    height: 100%;
    border-left: 1px solid grey;
    position: absolute;
    top: -50%;
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
