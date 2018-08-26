<template>
  <div class="ui link cards">
    <off-campus-room-card 
      v-for="(booking, index) in offCampusRoomBookings" 
      :key="index" 
      :room="booking.room_details" 
      :hidePaymentButton="true"
    />
  </div>
</template>

<script>
import { OffCampusRoomCard } from "@/components/";
import { Profile } from "@/services/backendApi/student";
import Student from "@/utilities/auth/student";

const StudentProfileApi = new Profile(Student.getBearerHeader());
import { TOTAL_OFF_CAMPUS_ROOMS_BOOKED } from "@/store/mutation-types";

export default {
  name: "OffCampusBookingsSection",
  components: {
    OffCampusRoomCard
  },
  created() {
    this.getOffCampusBookings();
  },
  data() {
    return {
      offCampusRoomBookings: []
    };
  },
  methods: {
    getOffCampusBookings: async function() {
      let profileResponse = await StudentProfileApi.getOffCampusBookings();
      this.offCampusRoomBookings = profileResponse.data.bookings;

      this.$store.commit(
        TOTAL_OFF_CAMPUS_ROOMS_BOOKED,
        this.offCampusRoomBookings.length
      );
    }
  }
};
</script>
