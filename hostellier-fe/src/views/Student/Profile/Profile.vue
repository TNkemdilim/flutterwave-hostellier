<template>
  <div class="container page-body">
    <h1>
      <i class="icon user"></i>
      Account Settings
    </h1>
    <p>Manage your acount details.</p>
    <br>

    <div class="ui grid stackable">
      <div class="four wide column">
        <profile-page-sidebar />
      </div>

      <div class="twelve wide column">
        <router-view />
      </div>
    </div>
  </div>
</template>

<script>
import { ProfilePageSidebar } from "@/components";

export default {
  name: "Home",
  components: {
    ProfilePageSidebar
  }
};
</script>
