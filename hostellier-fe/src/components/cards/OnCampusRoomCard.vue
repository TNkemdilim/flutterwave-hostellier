<template>
  <div class="item">
    <div class="image">
      <img :src="room.picture">
    </div>
    <div class="content">
      <a class="header">{{ room.title }}</a>
      <div class="meta">
        <span class="cinema">{{ room.hall_name + ', ' + room.hall_location }}</span>
      </div>
      <div class="description">
        <p>
          {{ room.description }}
        </p>
      </div>
      <div class="extra">
        <div>
          <span class="ui label"><i class="man icon"></i> Male</span>
          <span class="ui label"><i class="bed icon"></i> {{ room.students_per_room }} Students</span>
        </div>

        <div>
          <paystack-button
              v-if="!hidePaymentButton"
              :amount="room.price * 100"
              :email="user.email"
              :paystackkey=PAYSTACK_KEY
              :reference="reference"
              :callback="callback"
              :close="() => {}"
              :embed="false"
              :text="'Purchase room for $' + room.price"
              class="ui right floated green button"
          >
            <i class="icon cart"></i>
            Purchase for ${{ room.price }}
          </paystack-button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Student from "@/utilities/auth/student";
import PaystackButton from "../buttons/PaystackButton";
import { OnCampusBooking } from "@/services/backendApi/booking";
import { generateRandomReferenceHash } from "@/helpers/encryption";

const PAYSTACK_KEY = process.env.VUE_APP_PAYSTACK_PUBLIC_KEY;
const OnCampusBookingApi = new OnCampusBooking(Student.getBearerHeader());

export default {
  components: {
    PaystackButton
  },
  props: {
    room: {
      type: Object,
      required: true
    },
    hidePaymentButton: {
      type: Boolean,
      default: false,
      required: false
    }
  },
  computed: {
    user() {
      return this.$store.getters.user;
    },
    reference() {
      return generateRandomReferenceHash();
    }
  },
  data() {
    return {
      PAYSTACK_KEY
    };
  },
  methods: {
    callback: async function(response) {
      let payload = {
        on_campus_room_id: this.room.id,
        transaction_reference: response.trxref
      };

      let bookingResult = await OnCampusBookingApi.createOnCampusBooking(
        payload
      );

      if (bookingResult.status === true) {
        this.$toasted.success(`\t${bookingResult.message}`);
        this.$emit("booked", this.room);
        return;
      }
      this.$toasted.error(`\t${bookingResult.message}`);
    }
  }
};
</script>
