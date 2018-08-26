<template>
  <div class="ui vertical menu profile-sidebar">
    <a class="item bg-dark text-light">
      <i class="home icon"></i> 
      <strong>Bookings</strong>
    </a>
    <router-link to="/me/bookings/on-campus" class="item">
      On Campus
      <div class="ui left pointing label">{{ totalOffCampusRoomsBooked }}</div>
    </router-link>

    <router-link to="/me/bookings/off-campus" class="item">
      Off Campus
      <div class="ui label">{{ totalOffCampusRoomsBooked }}</div>
    </router-link>
    
    <router-link to="/me/bookings/shared-booking" class="item">
      Shared Bookings
      <div class="ui label">0</div>
    </router-link>

    <div class="item">
      <div class="ui transparent icon input">
        <input type="text" placeholder="Search bookings...">
        <i class="search icon"></i>
      </div>
    </div>
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
