<template>
  <div class="ui inverted vertical footer segment">
    <div class="ui center aligned container">
      <div class="ui stackable inverted divided grid">
        <div class="three wide column">
          <h4 class="ui inverted header">Our Products</h4>
          <div class="ui inverted link list">
            <a href="#" class="item">Hotels</a>
            <a href="#" class="item">Estates</a>
            <a href="#" class="item">Communities</a>
            <a href="#" class="item">Mansions</a>
          </div>
        </div>
        <div class="three wide column">
          <h4 class="ui inverted header">Services</h4>
          <div class="ui inverted link list">
            <a href="#" class="item">Homepage</a>
            <a href="#" class="item">Bokings</a>
            <a href="#" class="item">Purchase</a>
            <a href="#" class="item">3rd Party Client</a>
          </div>
        </div>
        <div class="three wide column">
          <h4 class="ui inverted header">Our Regions</h4>
          <div class="ui inverted link list">
            <a href="#" class="item">Asia</a>
            <a href="#" class="item">Africs</a>
            <a href="#" class="item">America</a>
            <a href="#" class="item">Australia</a>
          </div>
        </div>
        <div class="seven wide column">
          <h4 class="ui inverted header">Contact details</h4>
          <p>
            Block 254, Adeola Crescent, Osun State, Nigeria.<br><br>
            Tel no: +234-812-3454-940<br>
            Email:  support@hostellier.ng<br>
          </p>
        </div>
      </div>
      <div class="ui inverted section divider"></div>
      <i class="large ui icon home"></i>
      <br>
      <!-- <img src="assets/images/logo.png" class="ui centered mini image"> -->
      <div class="ui horizontal inverted small divided link list">
        <a class="item" href="#">Site Map</a>
        <a class="item" href="#">Contact Us</a>
        <a class="item" href="#">Terms and Conditions</a>
        <a class="item" href="#">Privacy Policy</a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Footer",
  data() {
    return {};
  }
};
</script>

<style lang="scss" scoped>
.footer {
  padding: 50px !important;
}
</style>
