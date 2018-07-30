<template>
  <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Hostellier</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <!-- <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li> -->
      <li class="nav-item">
        <router-link to="/" class="nav-link">Book Off Campus</router-link>
      </li>
      <li class="nav-item">
        <router-link to="/on-campus" class="nav-link">Book On Campus</router-link>
      </li>
    </ul>
    
    <ul v-if="loggedIn" class="navbar-nav form-inline my-2 my-lg-0">
      <li class="nav-item">
        <a class="text-white">Hello Tochukwu</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="icon user big circle"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">
            <i class="icon warehouse"></i>
            My Bookings
          </a>
          <a class="dropdown-item" href="#">
            <i class="icon user"></i>
            Profile
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">
            <i class="icon sign-out"></i>
            Logout
          </a>
        </div>
      </li>
    </ul>

    <ul v-else class="navbar-nav form-inline my-2 my-lg-0">
      <button class="ui right inverted button my-2 my-sm-0" data-toggle="modal" data-target="#loginModal">Login</button>
      <button class="ui right orange button my-2 my-sm-0" data-toggle="modal" data-target="#signupModal">Signup</button>
    </ul>
  </div>
  
  <login-modal />
  <signup-modal />
</nav>
</template>

<script>
import LoginModal from "@/components/modals/LoginModal.vue";
import SignupModal from "@/components/modals/SignupModal.vue";

export default {
  name: "navbar",
  components: {
    LoginModal,
    SignupModal
  },
  data() {
    return {
      loggedIn: true
    };
  },
  methods: {}
};
</script>

<style lang="scss" scoped>
.form-inline button {
  margin-left: 10px;
}
</style>
