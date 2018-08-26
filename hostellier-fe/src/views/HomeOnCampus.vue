<template>
  <div class="container page-body">
    <h1>
      <i class="icon home"></i>
      On Campus
    </h1>
    <p>Room is displayed based on your course of study.</p>
    <br>
    <div class="ui divided items">
      <on-campus-room-card 
        v-for="(room, index) in rooms"
        @booked="deleteRoom(room)" 
        :key="index" 
        :room=room
      />
    </div>
  </div>
</template>

<script>
import { PaystackButton, OnCampusRoomCard } from "@/components";
import Student from "@/utilities/auth/student";
import { OnCampusRooms } from "@/services/backendApi/rooms";

const OnCampusRoomsApi = new OnCampusRooms(Student.getBearerHeader());

export default {
  name: "home-on-campus",
  components: {
    PaystackButton,
    OnCampusRoomCard
  },
  created() {
    this.getRooms();
  },
  data() {
    return {
      rooms: []
    };
  },
  methods: {
    /**
     * Get all the available on-campus rooms for student.
     */
    getRooms: async function() {
      let roomResponse = await OnCampusRoomsApi.getAllOnCampusRooms();
      this.rooms = roomResponse.data;
    },

    /**
     * Deletes the specified room from the available rooms list (locally).
     */
    deleteRoom: function(room) {
      let selectedIndex = this.rooms.findIndex(x => x.id === room.id);
      if (selectedIndex > 0) {
        this.rooms.splice(selectedIndex, 1);
      }
    }
  }
};
</script>

<style lang="scss" scoped>
</style>
