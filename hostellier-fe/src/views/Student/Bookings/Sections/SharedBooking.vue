<template>
  <div class="ui grid centered shared-booking-notification">
    <br>
    <h5>
      <i class="huge icon home"></i>
      <br><br>
      You are currently not qualified for shared booking.
    </h5>
  </div>
</template>

<script>
export default {
  name: "SharedBookingsSection",
  components: {}
};
</script>

<style lang="scss" scoped>
.shared-booking-notification {
  margin: 10px !important;
  padding: 0% 3% 3% 3% !important;
  background-color: rgba(0, 0, 0, 0.05) !important;
  opacity: 0.5;
}
</style>
