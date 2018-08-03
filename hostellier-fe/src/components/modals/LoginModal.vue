<template>
  <div v-if="!closeModal" class="login">
    <div class="modal fade}" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="false">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="col-sm-12 col-md-12 text-center">
              <h1 class="login-title">Sign in to Hostellier</h1>
              <p class="login-title-caption">
                <em>Fatest way to book hostels on and out of campus.</em>
              </p>
              <div class="account-wall">
                <img class="profile-img" :src="userImage" alt="">
                <form class="form-signin">
                  <input v-model="formData.email" type="text" class="form-control" placeholder="Email" required autofocus>
                  <input v-model="formData.password" type="password" class="form-control" placeholder="Password" required>
                  <button @click="loginStudent($event)" class="btn btn-lg btn-primary btn-block">
                    Sign in
                  </button>
                  <br>
                  <label class="checkbox pull-left">
                      <input type="checkbox" value="remember-me">
                      Remember me
                  </label>
                  <br>
                  <a href="#" class="text-center new-account">Create an account </a>
                </form>
              </div>
                <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
const USER_IMAGE =
  "https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120";

import StudentAuth from "../../utilities/auth/student";
// import router from "../../helpers/routing";
import { UPDATE_LOGIN_STATUS } from "../../store/mutation-types";

export default {
  name: "login-modal",
  data() {
    return {
      userImage: USER_IMAGE,
      formData: {
        email: null,
        password: null
      },
      closeModal: false
    };
  },
  methods: {
    loginStudent: async function(event) {
      event.preventDefault();
      this.$loading("Trying Log you in.");
      let result = await StudentAuth.login(this.formData);

      this.$loading.close();
      if (result.status === true) {
        this.$toasted.success("\tSuccessfully logged in.");
        this.$store.commit(UPDATE_LOGIN_STATUS, true);
        this.closeModalNow();
      } else {
        this.$toasted.error(result.message);
      }
    },
    closeModalNow: function() {
      this.closeModal = true;
    }
  }
};
</script>


<style lang="scss" scoped>
</style>
