<template>
  <div class="container-fluid off-campus">
    <h1>
      <i class="icon home"></i>
      Off Campus
    </h1>
    <p>All rooms available for rent for students.</p>
    <br><br>
    <div class="ui link cards">
      <hostel-card v-for="item in [1,2,3,5,6]" :key="item"/>
    </div>
  </div>
</template>

<script>
import HostelCard from "@/components/cards/HostelCard.vue";

export default {
  name: "home-off-campus",
  components: {
    HostelCard
  },
  data() {
    return {};
  },
  methods: {}
};
</script>

<style lang="scss" scoped>
.off-campus {
  margin: 20px !important;
}
</style>
