<template>
  <div class="ui divided items">
    <on-campus-room-card 
      v-for="(booking, index) in onCampusRoomBookings" 
      :key="index" 
      :room="booking.room_details" 
      :hidePaymentButton="true"
    />
  </div>
</template>

<script>
import { OnCampusRoomCard } from "@/components/";
import { Profile } from "@/services/backendApi/student";
import Student from "@/utilities/auth/student";

const StudentProfileApi = new Profile(Student.getBearerHeader());
import { TOTAL_ON_CAMPUS_ROOMS_BOOKED } from "@/store/mutation-types";

export default {
  name: "OnCampusBookingsSection",
  components: {
    OnCampusRoomCard
  },
  created() {
    this.getOffCampusBookings();
  },
  data() {
    return {
      onCampusRoomBookings: []
    };
  },
  methods: {
    getOffCampusBookings: async function() {
      let profileResponse = await StudentProfileApi.getOffCampusBookings();
      this.onCampusRoomBookings = profileResponse.data.bookings;

      this.$store.commit(
        TOTAL_ON_CAMPUS_ROOMS_BOOKED,
        this.onCampusRoomBookings.length
      );
    }
  }
};
</script>
