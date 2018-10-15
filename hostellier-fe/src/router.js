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

// Admin > Dashboard
import AdminDashboard from "./views/Admin/ManageOffCampusRooms";

// Admin > Rooms Management
import AddOffCampusRoom from "./views/Admin/Rooms/AddOffCampusRoom";
import AddOnCampusRoom from "./views/Admin/Rooms/AddOnCampusRoom";
import ManageOffCampusRooms from "./views/Admin/ManageOffCampusRooms";
import ManageOnCampusRooms from "./views/Admin/ManageOnCampusRooms";

// Middlewares
import VerifyIfStudent from "@/middlewares/verifyIfStudent";
import VerifyIfAdmin from "@/middlewares/verifyIfAdmin";

Vue.use(Router);

export default new Router({
  mode: "history",
  routes: [
    {
      path: "/",
      alias: "/off-campus",
      beforeEnter: VerifyIfStudent,
      name: "HomeOffCampus",
      component: HomeOffCampus
    },
    {
      path: "/on-campus",
      beforeEnter: VerifyIfStudent,
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
      beforeEnter: VerifyIfStudent,
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
    },

    // Admin
    {
      path: "/admin/rooms",
      beforeEnter: VerifyIfAdmin,
      alias: "/admin",
      name: "AdminDashboard",
      component: AdminDashboard
    },
    {
      path: "/admin/rooms/off-campus",
      alias: "/",
      name: "ManageOffCampusRooms",
      component: ManageOffCampusRooms
    },
    {
      path: "/admin/rooms/on-campus",
      name: "ManageOnCampusRooms",
      component: ManageOnCampusRooms
    },
    {
      path: "/admin/rooms/on-campus/add",
      beforeEnter: VerifyIfAdmin,
      name: "Add On Campus Room",
      component: AddOnCampusRoom
    },
    {
      path: "/admin/rooms/off-campus/add",
      beforeEnter: VerifyIfAdmin,
      name: "Add Off Campus Room",
      component: AddOffCampusRoom
    }
  ]
});
