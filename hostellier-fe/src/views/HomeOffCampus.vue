<template>
  <div class="container-fluid off-campus">
    <h1>
      <i class="icon home"></i>
      Off Campus
    </h1>
    <p>All rooms available for rent for students.</p>
    <br><br>
    <div class="ui link cards">
      <hostel-card v-for="(room, index) in rooms" :room="room" :key="index"/>
    </div>
  </div>
</template>

<script>
import HostelCard from "@/components/cards/HostelCard.vue";
import { OffCampusRooms } from "../services/backendApi/rooms";

export default {
  name: "home-off-campus",
  components: {
    HostelCard
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
    getRooms: async function() {
      let roomsResponse = await OffCampusRooms.getAllOffCampusRooms();
      console.log(roomsResponse.data);
      this.rooms = roomsResponse.data;
    }
  }
};
</script>

<style lang="scss" scoped>
.off-campus {
  margin: 20px !important;
}
</style>
