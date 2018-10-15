<template>
  <div class="container page-body">
    <h1>Add On Campus Room</h1>
    <hr>
    <h6>Feel free to add more on-campus rooms below.</h6>
    <br><br>

    <div class="ui form">
      <div class="field">
        <h3 class="header">Room Title</h3>
        <div class="ui input big">
          <input type="text" v-model="formData.title" name="title" placeholder="Room title">
        </div>
      </div>

      <div class="field">
        <h3 class="header">Description</h3>
        <div class="ui input big">
          <textarea  rows="5" v-model="formData.description" name="description" placeholder="Description"></textarea>
        </div>
      </div>

      <div class="two fields">
        <div class="field">
          <h3 class="header">Price</h3>
          <div class="ui input big">
            <input type="text" v-model="formData.price" name="price" placeholder="Price">
          </div>
        </div>
        <div class="field">
          <h3 class="header">Picture Url</h3>
          <div class="ui input big">
            <input type="text"  v-model="formData.picture" name="picture" placeholder="Picture Url">
          </div>
        </div>
      </div>

      <div class="three fields">
        <div class="field">
          <h3 class="header">Maximum no. student (per room)</h3>
          <div class="ui input big">
            <input type="number" v-model="formData.maxStudentPerRoom" name="maxStudentPerRoom" placeholder="Maximum no. student (per room)">
          </div>
        </div>
        <div class="field">
          <h3 class="header">Hall Name</h3>
          <div class="ui input big">
            <input type="text" v-model="formData.hallName" name="hallName" placeholder="Hall Name">
          </div>
        </div>
        <div class="field">
          <h3 class="header">Hall Location</h3>
          <div class="ui input big">
            <input type="text" v-model="formData.hallLocation" name="hallLocation" placeholder="Hall Location">
          </div>
        </div>
      </div>

      <button v-if="formComplete" @click="addRoom"  class="positive ui button large">Add On-Campus Room</button>
      <button  v-else disabled="disabled"  class="positive ui button large">Add On-Campus Room</button>
    </div>
  </div>
</template>

<script>
import { OnCampusRooms } from "@/services/backendApi/rooms";
import Admin from "@/utilities/auth/admin";

const OnCampusRoomsApi = new OnCampusRooms(Admin.getBearerHeader());

export default {
  component: {},
  computed: {
    formComplete() {
      return (
        this.formData.title !== "" &&
        this.formData.description !== "" &&
        this.formData.price > 0 &&
        this.formData.picture !== "" &&
        this.formData.hallName !== "" &&
        this.formData.hallLocation !== "" &&
        this.formData.maxStudentPerRoom > 0
      );
    }
  },
  data() {
    return {
      formData: {
        title: "",
        description: "",
        price: 0,
        picture: "",
        hallName: "",
        hallLocation: "",
        maxStudentPerRoom: 4
      }
    };
  },
  methods: {
    async addRoom() {
      let payload = this.formData;
      payload["hall_name"] = payload.hallName;
      payload["hall_location"] = payload.hallLocation;
      payload["students_per_room"] = payload.maxStudentPerRoom;

      this.$loading("Attempting to add room.");
      let result = await OnCampusRoomsApi.addOnCampusRoom(payload);

      this.$loading.close();
      if (result.status === true) {
        this.$toasted.success("\tSuccessfully added room.");
        this.clearFormData();
      } else {
        this.$toasted.error(result.message);
      }
    },

    clearFormData() {
      this.formData.title = "";
      this.formData.description = "";
      this.formData.price = 0;
      this.formData.picture = "";
      this.formData.hallName = "";
      this.formData.hallLocation = "";
      this.formData.maxStudentPerRoom = 4;
    }
  }
};
</script>
