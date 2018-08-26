<template>
  <div class="container page-body">
    <h1>
      <i class="icon home"></i>
      My Bookings
    </h1>
    <p>View and manage all your previous bookings.</p>
    <br>

    <div class="ui grid stackable">
      <div class="four wide column">
        <booking-page-sidebar />
      </div>

      <div class="twelve wide column">
        <router-view />
      </div>
    </div>
  </div>
</template>

<script>
import { BookingPageSidebar } from "@/components";

export default {
  name: "Home",
  components: {
    BookingPageSidebar
  }
};
</script>
