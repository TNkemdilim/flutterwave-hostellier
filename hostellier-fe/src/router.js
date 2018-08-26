import Vue from "vue";
import Router from "vue-router";
import HomeOffCampus from "./views/HomeOffCampus.vue";
import HomeOnCampus from "./views/HomeOnCampus.vue";
import StudentProfile from "./views/Student/Profile/Profile.vue";

// Student > Booking
import StudentBookings from "./views/Student/Bookings/Home.vue";
import OffCampusBookingSection from "./views/Student/Bookings/Sections/OffCampus.vue";
import OnCampusBookingSection from "./views/Student/Bookings/Sections/OnCampus.vue";
import SharedBookingSection from "./views/Student/Bookings/Sections/SharedBooking.vue";

// Student > Profile
import StudentViewProfileSection from "./views/Student/Profile/Sections/ViewProfile";
import StudentChangePasswordSection from "./views/Student/Profile/Sections/ChangePassword";

Vue.use(Router);

export default new Router({
  mode: "history",
  routes: [
    {
      path: "/",
      alias: "/off-campus",
      name: "HomeOffCampus",
      component: HomeOffCampus
    },
    {
      path: "/on-campus",
      name: "HomeOnCampus",
      component: HomeOnCampus
    },
    {
      path: "/me",
      name: "MyProfile",
      component: StudentProfile,
      children: [
        {
          path: "/",
          name: "StudentViewProfileSection",
          component: StudentViewProfileSection
        },
        {
          path: "change-password",
          name: "StudentChangePasswordSection",
          component: StudentChangePasswordSection
        }
      ]
    },
    {
      path: "/me/bookings",
      name: "MyBookings",
      component: StudentBookings,
      children: [
        {
          path: "off-campus",
          alias: "/",
          name: "OffCampusBookingsSection",
          component: OffCampusBookingSection
        },
        {
          path: "on-campus",
          name: "OnCampusBookingsSection",
          component: OnCampusBookingSection
        },
        {
          path: "shared-booking",
          name: "SharedBookingsSection",
          component: SharedBookingSection
        }
      ]
    }
  ]
});
