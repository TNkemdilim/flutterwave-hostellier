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
#loginModal {
  background-image: radial-gradient(
    circle farthest-corner at 10% 20%,
    rgba(51, 51, 81, 1) 0%,
    rgba(34, 72, 86, 1) 90%
  );
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  font-size: 16px;
  height: auto;
  padding: 10px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="text"] {
  margin-bottom: -1px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
.account-wall {
  margin-top: 20px;
  padding: 40px 0px 20px 0px;
  background-color: #f7f7f7c0;
  -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}

.modal-content {
  background-color: transparent;
  border: none;
}

.login-title {
  color: #ffffff;
  font-size: 18px;
  font-weight: 400;
  display: block;
}

.login-title-caption {
  color: #ffffff;
  opacity: 0.5;
}

.profile-img {
  width: 96px;
  height: 96px;
  margin: 0 auto 10px;
  display: block;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  border-radius: 50%;
}
.need-help {
  display: block;
  margin-top: 10px;
  color: #ffffff;
}
.new-account {
  margin-top: 10px;
}
</style>
