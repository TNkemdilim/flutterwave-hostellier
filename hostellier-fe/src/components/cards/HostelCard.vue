<template>
  <div class="card">
    <div class="image">
      <img style="height: 200px;" :src="hostelImage">
    </div>
    <div class="content">
      <div class="header">{{room.title}}</div>
      <div class="meta">
        <span class="date">{{room.city}}, {{room.country}}</span>
      </div>
      <div class="description">
        {{ trimTo160Characters(room.description) }}
      </div>
    </div>
    <div class="extra content">
      <span class="right floated">
        <!-- <button class="ui primary button">Purchase ₦ {{room.price * 1000 | parseToDecimal}}</button> -->
        <paystack
            :amount="room.price * 100"
            :email="user.email"
            :paystackkey=PAYSTACK_KEY
            :reference="reference"
            :callback="callback"
            :close="close"
            :embed="false"
            :text="'Purchase $' +  parseToDecimal(room.price)"
            class="ui primary button"
        >
        </paystack>
      </span>
      <span>
        <i class="clock icon"></i>
        <timeago :datetime="room.created_at"></timeago>
      </span>
    </div>
  </div>
</template>

<script>
import HostelImage from "../../assets/img/hostel.jpg";
import Student from "@/utilities/auth/student";
import { OffCampusBooking } from "@/services/backendApi/booking";
import paystack from "vue-paystack";

const OffCampusBookingApi = new OffCampusBooking(Student.getBearerHeader());
const PAYSTACK_KEY = process.env.VUE_APP_PAYSTACK_PUBLIC_KEY;

export default {
  name: "hostel-card",
  props: ["room"],
  created() {},
  components: {
    paystack
  },
  data() {
    return {
      hostelImage: HostelImage,
      PAYSTACK_KEY
    };
  },
  methods: {
    trimTo160Characters: function(s) {
      return s.substr(0, 160) + "...";
    },

    parseToDecimal: function(value) {
      return parseFloat(value).toFixed(2);
    },

    callback: async function(response) {
      let payload = {
        off_campus_room_id: this.room.id,
        transaction_reference: response.trxref,
        purchase_count: 1
      };

      let bookingResult = await OffCampusBookingApi.createOffCampusBooking(
        payload
      );

      if (bookingResult.status === true) {
        this.$toasted.success(`\t${bookingResult.message}`);
        this.$emit("booked", this.room);
        return;
      }
      this.$toasted.error(`\t${bookingResult.message}`);
    },

    close: function() {}
  },
  computed: {
    user() {
      return this.$store.getters.user;
    },

    reference() {
      let text = "";
      let possible =
        "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

      for (let i = 0; i < 10; i++)
        text += possible.charAt(Math.floor(Math.random() * possible.length));

      return text;
    }
  }
};
</script>
