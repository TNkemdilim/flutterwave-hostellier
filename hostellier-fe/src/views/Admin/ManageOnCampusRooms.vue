<template>
  <div class="container page-body">
    <div class="container">
      <h1>
        <i class="icon home"></i>
        Off Campus
      </h1>
      <p>All rooms available for rent for students.</p>
    </div>
    <br><br>
    <div class="ui divided items">
      <on-campus-room-card 
        v-for="(room, index) in rooms"
        @booked="deleteRoom(room)" 
        :room="room" 
        :hidePaymentButton=true
        :key="index"
        :showNoOfOccupants=true
        :showPrice=true
      >
        <div slot="button">
          <button @click="deleteRoom(room)"  class="ui right floated negative ui button">Delete Room</button>
        </div>
      </on-campus-room-card>
    </div>
  </div>
</template>

<script>
import { OnCampusRoomCard } from "@/components";
import { OnCampusRooms } from "@/services/backendApi/rooms";
import Admin from "@/utilities/auth/admin";

const OnCampusRoomsApi = new OnCampusRooms(Admin.getBearerHeader());

export default {
  name: "get-all-off-campus",
  components: {
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
     * Get all the available on-campus rooms available.
     */
    getRooms: async function() {
      let roomsResponse = await OnCampusRoomsApi.getAllOnCampusRooms();
      this.rooms = roomsResponse.data;
    },

    deleteRoom: async function(room) {
      let result = await OnCampusRoomsApi.deleteOnCampusRoomById(room.id);

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
