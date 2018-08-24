import Vue from "vue";
import Router from "vue-router";
import HomeOffCampus from "./views/HomeOffCampus.vue";
import HomeOnCampus from "./views/HomeOnCampus.vue";
import StudentProfile from "./views/Student/Profile.vue";
import StudentBookings from "./views/Student/MyBookings.vue";

Vue.use(Router);

export default new Router({
  mode: "history",
  routes: [
    {
      path: "/",
      alias: "/off-campus",
      name: "home-off-campus",
      component: HomeOffCampus
    },
    {
      path: "/on-campus",
      name: "home-on-campus",
      component: HomeOnCampus
    },
    {
      path: "/me",
      name: "my-profile",
      component: StudentProfile
    },
    {
      path: "/me/bookings",
      name: "my-bookings",
      component: StudentBookings
    }
  ]
});
