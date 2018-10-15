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
        :hidePaymentButton=true
        :key="index"
      >
        <div slot="button">
          <button @click="deleteRoom(room)"  class="negative ui button">Delete Room</button>
        </div>
      </off-campus-room-card>
    </div>
  </div>
</template>

<script>
import { OffCampusRoomCard } from "@/components";
import { OffCampusRooms } from "@/services/backendApi/rooms";
import Admin from "@/utilities/auth/admin";

const OffCampusRoomsApi = new OffCampusRooms(Admin.getBearerHeader());

export default {
  name: "get-all-off-campus",
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

    deleteRoom: async function(room) {
      let result = await OffCampusRoomsApi.deleteOffCampusRoomById(room.id);

      if (result.status === true) {
        this.$toasted.success("\tSuccessfully deleted room.");
        this.deleteRoomLocally(room);
      } else {
        this.$toasted.error("\tFailed to delete room.");
      }
    },

    /**
     * Deletes the specified room from the available rooms list (locally).
     */
    deleteRoomLocally: function(room) {
      let selectedIndex = this.rooms.findIndex(x => x.id === room.id);
      if (selectedIndex > 0) {
        this.rooms.splice(selectedIndex, 1);
      }
    }
  }
};
</script>
