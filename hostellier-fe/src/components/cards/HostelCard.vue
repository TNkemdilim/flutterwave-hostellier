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
        <button class="ui primary button">Purchase ₦ {{room.price * 1000 | parseToDecimal}}</button>
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

export default {
  name: "hostel-card",
  props: ["room"],
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
