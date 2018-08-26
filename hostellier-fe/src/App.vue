<template>
  <div id="app">
    <navbar/>
    <router-view id="content"/>
    <inverted-footer />
  </div>
</template>

<script>
import { Navbar, Footer } from "@/components";
import StudentAuth from "@/utilities/auth/student";
import StudentManager from "@/utilities/dataManager/studentManager";
import * as types from "@/store/mutation-types.js";

export default {
  components: {
    Navbar,
    "inverted-footer": Footer
  },
  created() {
    let userData = StudentManager.getStudentData();
    userData =
      userData !== null
        ? userData
        : {
            email: ""
          };
    this.$store.commit(types.UPDATE_LOGIN_STATUS, StudentAuth.isLoggedIn());
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
