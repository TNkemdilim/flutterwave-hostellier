<template>
  <div class="card">
    <div class="image">
      <img style="height: 200px;" :src="hostelImage">
    </div>
    <div class="content">
      <div class="header">One Bedroom Flat</div>
      <div class="meta">
        <span class="date">Ikeja, Lagos</span>
      </div>
      <div class="description">
        {{ trimTo160Characters('The Hotel Hesperia is the right choice for visitors who are searching for a combination of charm, peace and quiet, and a convenient position from which to explore Venice. It is a small, comfortable hotel, situated on the Canale di Cannaregio. ... The hotel provides an internet point, and a Wi-Fi service.') }}
      </div>
    </div>
    <div class="extra content">
      <span class="right floated">
        <button class="ui primary button">Purchase $100</button>
      </span>
      <span>
        <i class="clock icon"></i>
        11 hours ago
      </span>
    </div>
  </div>
</template>

<script>
import HostelImage from "../../assets/img/hostel.jpg";

export default {
  name: "hostel-card",
  components: {},
  data() {
    return {
      hostelImage: HostelImage
    };
  },
  methods: {
    trimTo160Characters: function(s) {
      return s.substr(0, 160) + "...";
    }
  }
};
</script>
