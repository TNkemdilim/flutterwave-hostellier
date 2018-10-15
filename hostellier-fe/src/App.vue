<template>
  <div id="app">
    <navbar/>
    <router-view id="content"/>
    <inverted-footer />
  </div>
</template>

<script>
import { Navbar, Footer } from "@/components";
import StudentManager from "@/utilities/dataManager/studentManager";
import AdminManager from "@/utilities/dataManager/adminManager";
import * as types from "@/store/mutation-types.js";

export default {
  components: {
    Navbar,
    "inverted-footer": Footer
  },
  created() {
    // Try student
    let userData = StudentManager.getStudentData();
    let isLoggedIn = true;

    if (userData === null) {
      // Try admin
      userData = AdminManager.getAdminData();
    }

    if (userData === null) {
      isLoggedIn = false;
      userData = {
        email: ""
      };
    }

    this.$store.commit(types.UPDATE_LOGIN_STATUS, isLoggedIn);
    this.$store.commit(types.UPDATE_USER, userData);
    this.$store.commit(
      types.USER_TOKEN,
      userData !== null ? userData.token : null
    );
  }
};
</script>

<style lang="scss">
@import "../node_modules/bootstrap/scss/bootstrap.scss";
@import "./assets/scss/main.scss";
</style>
