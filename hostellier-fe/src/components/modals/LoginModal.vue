<template>
  <div class="login">
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
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
                  <input type="text" class="form-control" placeholder="Email" required autofocus>
                  <input type="password" class="form-control" placeholder="Password" required>
                  <button class="btn btn-lg btn-primary btn-block" type="submit">
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

export default {
  name: "login-modal",
  data() {
    return {
      userImage: USER_IMAGE
    };
  }
};
</script>


<style lang="scss" scoped>
</style>
