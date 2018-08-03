import Vue from "vue";

Vue.filter("parseToDecimal", value => {
  return parseFloat(value).toFixed(2);
});
