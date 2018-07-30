<template>
  <div class="container on-campus">
    <h1>
      <i class="icon home"></i>
      On Campus
    </h1>
    <p>Room is displayed based on your course of study.</p>
    <br>
    <div class="ui divided items">
      <div class="item">
        <div class="image">
          <img src="https://semantic-ui.com/images/wireframe/image.png">

          <div class="extra">
              <button class="ui right floated orange button">
                <i class="icon money"></i>
                $500
              </button>
            </div>
        </div>
        <div class="content">
          <a class="header">4-Bunk Bed Hostel (Peter Hall)</a>
          <div class="meta">
            <span class="cinema">Peter Hall, Ogun</span>
          </div>
          <div class="description">
            <p>
              "On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains."
            </p>
            <br>
            <p>
              "On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains."
            </p>
          </div>
          <div class="extra">
            <div class="ui label"><i class="man icon"></i> Male</div>
            <div class="ui label"><i class="bed icon"></i> 4 bunks</div>

            <div class="extra">
              <paystack-button
                  :amount="10"
                  :email="'nkemdilimtochukwu@gmail.com'"
                  :paystackkey="'paystackkey'"
                  :reference="'reference'"
                  :callback="() => {}"
                  :close="() => {} "
                  :embed="false"
                  :text="'Purchase room for $100'"
                  class="ui right floated green button"
              >
              <i class="icon cart"></i>
              Purchase for $500
              </paystack-button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import PaystackButton from "@/components/buttons/PaystackButton.vue";

export default {
  name: "home-on-campus",
  components: {
    PaystackButton
  }
};
</script>

<style lang="scss" scoped>
.on-campus {
  margin: 20px !important;
}
</style>
