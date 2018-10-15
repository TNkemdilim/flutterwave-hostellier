<template>
  <div class="container page-body">
    <h1>Add Off Campus Room</h1>
    <hr>
    <h6>Feel free to add more off-campus rooms below.</h6>
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
          <h3 class="header">City</h3>
          <div class="ui input big">
            <input type="text" v-model="formData.city" name="city" placeholder="City">
          </div>
        </div>
        <div class="field">
          <h3 class="header">State</h3>
          <div class="ui input big">
            <input type="text" v-model="formData.state" name="state" placeholder="State">
          </div>
        </div>
        <div class="field">
          <h3 class="header">Country</h3>
          <div class="ui input big">
            <input type="text" v-model="formData.country" name="country" placeholder="Country">
          </div>
        </div>
      </div>

      <button v-if="formComplete" @click="addRoom"  class="positive ui button large">Add Off-Campus Room</button>
      <button  v-else disabled="disabled"  class="positive ui button large">Add Off-Campus Room</button>
    </div>
  </div>
</template>

<script>
import { OffCampusRooms } from "@/services/backendApi/rooms";
import Admin from "@/utilities/auth/admin";

const OffCampusRoomsApi = new OffCampusRooms(Admin.getBearerHeader());

export default {
  component: {},
  computed: {
    formComplete() {
      return (
        this.formData.title !== "" &&
        this.formData.city !== "" &&
        this.formData.state !== "" &&
        this.formData.country !== "" &&
        this.formData.description !== "" &&
        this.formData.price >= 1 &&
        this.formData.picture !== ""
      );
    }
  },
  data() {
    return {
      formData: {
        title: "",
        city: "",
        state: "",
        country: "",
        description: "",
        price: 0,
        picture: ""
      }
    };
  },
  methods: {
    async addRoom() {
      this.$loading("Attempting to add room.");
      let result = await OffCampusRoomsApi.addOffCampusRoom(this.formData);

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
      this.formData.city = "";
      this.formData.state = "";
      this.formData.country = "";
      this.formData.description = "";
      this.formData.price = 0;
      this.formData.picture = "";
    }
  }
};
</script>
