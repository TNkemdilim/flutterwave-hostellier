<template>
  <div id="app">
    <navbar />
    <router-view/>
  </div>
</template>

<script>
import Navbar from "@/components/Navbar.vue";
import StudentAuth from "./utilities/auth/student";
import * as types from "./store/mutation-types.js";

export default {
  components: {
    Navbar
  },
  created() {
    this.$store.commit(types.UPDATE_LOGIN_STATUS, StudentAuth.isLoggedIn());
  }
};
</script>


<style lang="scss">
@import "../node_modules/bootstrap/scss/bootstrap.scss";
</style>
