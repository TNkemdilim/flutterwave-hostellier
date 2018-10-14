<template>
  <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Hostellier</a>
    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <router-link to="/" class="nav-link">Book Off Campus</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/on-campus" class="nav-link">Book On Campus</router-link>
        </li>
      </ul>
      
      <ul v-if="isLoggedIn" class="navbar-nav my-2 my-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <a class="text-white">Hello Tochukwu</a>&nbsp;
            <i class="icon user big circle"></i>
          </a>
          
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <router-link class="dropdown-item" to="/me/bookings/on-campus">
              <i class="icon warehouse"></i>
              My Bookings
            </router-link>
            <router-link class="dropdown-item" to="/me">
              <i class="icon user"></i>
              Profile
            </router-link>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <i class="icon sign-out"></i>
              Logout
            </a>
          </div>
        </li>
      </ul>

      <ul v-else class="navbar-nav my-2 my-lg-0">
        <button class="ui right inverted button my-2 my-sm-0" data-toggle="modal" data-target="#loginModal">Login</button>
        <button class="ui right orange button my-2 my-sm-0" data-toggle="modal" data-target="#signupModal">Signup</button>
      </ul>
    </div>
    
    <login-modal />
    <signup-modal />
  </nav>
</template>

<script>
import { LoginModal, SignupModal } from "@/components";

export default {
  name: "navbar",
  components: {
    LoginModal,
    SignupModal
  },
  created() {},
  data() {
    return {};
  },
  computed: {
    isLoggedIn() {
      return this.$store.getters.isLoggedIn;
    },
    user() {
      return this.$store.getters.user;
    }
  }
};
</script>

<style lang="scss" scoped>
.form-inline button {
  margin-left: 10px;
}
</style>
