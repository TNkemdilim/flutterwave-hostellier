<template>
  <div class="container-fluid page-body">
    <div class="container">
      <h1>
        <i class="icon home"></i>
        Off Campus
      </h1>
      <p>All rooms available for rent for students.</p>
    </div>
    <br><br>
    <div class="container-fluid ui link cards grid centered">
      <off-campus-room-card 
        v-for="(room, index) in rooms"
        @booked="deleteRoom(room)" 
        :room="room" 
        :key="index"
      />
    </div>
  </div>
</template>

<script>
import { OffCampusRoomCard } from "@/components";
import { OffCampusRooms } from "../services/backendApi/rooms";

export default {
  name: "home-off-campus",
  components: {
    OffCampusRoomCard
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
     * Get all the available off-campus rooms available.
     */
    getRooms: async function() {
      let roomsResponse = await OffCampusRooms.getAllOffCampusRooms();
      this.rooms = roomsResponse.data;
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
