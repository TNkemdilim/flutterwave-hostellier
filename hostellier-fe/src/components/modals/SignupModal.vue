<template>
  <div class="signup">
    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="col-sm-12 col-md-12 text-center">
              <h1 class="login-title">Register on Hostellier</h1>
              <p class="login-title-caption">
                <em>Fatest way to book hostels on and out of campus.</em>
              </p>
              <div class="account-wall">
                <img class="profile-img" :src="'https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120'" alt="">
                <form class="form-signin">
                  <input type="text" v-model="formData.firstname" class="form-control" placeholder="Firstname" required autofocus>
                  <input type="text" v-model="formData.lastname" class="form-control" placeholder="Lastname" required>
                  <select v-model="formData.level" class="form-control form-control-lg" id="inlineFormCustomSelect">
                    <option value="" selected="selected" disabled >Academic level</option>
                    <option v-for="(level, index) in [1, 2,3,4]" :key=index :value=level>{{ level * 100}}</option>
                  </select>
                  <input v-model="formData.email" type="text" class="form-control" placeholder="Email" required autofocus>
                  <input v-model="formData.password" type="password" class="form-control" placeholder="Password" required>
                  <input v-model="formData.c_password" type="password" class="form-control" placeholder="Password Confirmation" required>
                  
                  <br>
                  <button @click="registerStudent($event)" class="btn btn-lg btn-primary btn-block">
                    Register
                  </button>
                  <label class="checkbox pull-left">
                      <input type="checkbox" value="remember-me">
                      Remember me
                  </label>
                  <br>
                  <a href="#" class="text-center new-account">Login</a>
                </form>
              </div>
                <a data-toggle="modal" data-target="#loginModal" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <login-modal />
  </div>
</template>

<script>
const USER_IMAGE =
  "https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120";
import LoginModal from "@/components/modals/LoginModal.vue";
import { StudentAuth } from "../../services/backendApi/auth/index.js";

export default {
  name: "signup-modal",
  components: {
    LoginModal
  },
  data() {
    return {
      userImage: USER_IMAGE,
      formData: {
        email: null,
        password: null,
        c_password: null,
        firstname: null,
        lastname: null,
        level: null
      }
    };
  },
  methods: {
    registerStudent: async function(event) {
      event.preventDefault();
      this.$loading("Registering student.");
      let result = await StudentAuth.register(this.formData);

      this.$loading.close();
      if (result.status === true) {
        this.$toasted.success(result.message);
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
