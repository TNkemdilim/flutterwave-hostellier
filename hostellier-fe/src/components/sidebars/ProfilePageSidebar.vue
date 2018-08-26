<template>
  <div class="ui vertical menu profile-sidebar">
    <a class="item bg-dark text-light">
      <i class="settings icon"></i> 
      <strong>Account Settings</strong>
    </a>
    <router-link to="/me" class="item">
      View Profile
    </router-link>
    
    <router-link to="/me/change-password" class="item">
      Change Password
    </router-link>
  </div>
</template>


<script>
export default {
  components: "Sidebar",

  computed: {
    totalOnCampusRoomsBooked() {
      return this.$store.getters.totalOnCampusRoomsBooked;
    },
    totalOffCampusRoomsBooked() {
      return this.$store.getters.totalOffCampusRoomsBooked;
    }
  }
};
</script>

<style lang="scss" scoped>
.profile-sidebar {
  .router-link-active {
    background-color: rgba(0, 0, 0, 0.05) !important;

    div.label {
      background-color: #f2711c !important;
      border-color: #f2711c !important;
      color: #fff !important;
    }
  }
}

a.item i {
  float: left !important;
  margin-right: 10px !important;
}
</style>
