<template>
  <div class="card">
    <div class="image">
      <img style="height: 200px;" :src="room.picture">
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
            v-if="!hidePaymentButton"
            :amount="room.price * 100"
            :email="user.email"
            :paystackkey="PAYSTACK_KEY"
            :reference="reference"
            :callback="callback"
            :close="close"
            :embed="false"
            :text="'Purchase N' +  parseToDecimal(room.price)"
            class="ui primary button"
        >
        </paystack>
        <slot name="button">
        </slot>
      </span>
      <span>
        <i class="clock icon"></i>
        <timeago :datetime="room.created_at"></timeago>
      </span>
    </div>
  </div>
</template>

<script>
import paystack from "vue-paystack";
import Student from "@/utilities/auth/student";
import { parseToDecimal } from "@/helpers/maths";
import { trimTo160Characters } from "@/helpers/strings";
import { OffCampusBooking } from "@/services/backendApi/booking";
import { generateRandomReferenceHash } from "@/helpers/encryption";

const OffCampusBookingApi = new OffCampusBooking(Student.getBearerHeader());
const PAYSTACK_KEY = process.env.VUE_APP_PAYSTACK_PUBLIC_KEY;

export default {
  name: "hostel-card",
  props: ["room", "hidePaymentButton"],
  created() {},
  components: {
    paystack
  },
  data() {
    return {
      PAYSTACK_KEY
    };
  },
  computed: {
    user() {
      return this.$store.getters.user;
    },

    reference() {
      return generateRandomReferenceHash();
    }
  },
  methods: {
    trimTo160Characters: function(string) {
      return trimTo160Characters(string);
    },

    parseToDecimal: function(string) {
      return parseToDecimal(string);
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
  }
};
</script>
