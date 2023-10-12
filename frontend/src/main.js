import { createApp } from "vue";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { library } from "@fortawesome/fontawesome-svg-core";
import {
  faHeart as fasHeart,
  faStar,
  faPhone,
  faLocationDot,
  faCartShopping,
  faUser,
  faMagnifyingGlass,
  faHome,
  faFilter,
  faArrowDownWideShort,
  faBell,
  faTruckFast,
  faHardDrive,
  faMoneyBill,
  faServer,
  faLaptop,
  faKey,
  faComment,
  faEnvelope,
} from "@fortawesome/free-solid-svg-icons";
import { faHeart as farHeart } from "@fortawesome/free-regular-svg-icons";
// Add the Font Awesome icon(s) you want to use to the library

library.add(
  farHeart,
  faStar,
  fasHeart,
  faLocationDot,
  faPhone,
  faCartShopping,
  faUser,
  faMagnifyingGlass,
  faHome,
  faFilter,
  faArrowDownWideShort,
  faTruckFast,
  faHardDrive,
  faMoneyBill,
  faServer,
  faLaptop,
  faKey,
  faBell,
  faComment,
  faEnvelope
);
import App from "./App.vue";
import router from "./routes/router.js";
import axios from "axios";
import "../node_modules/bootstrap/dist/css/bootstrap.css";
import "../node_modules/bootstrap/dist/js/bootstrap.bundle";
window.axios = axios;


import gAuthPlugin from "vue3-google-oauth2"
const app = createApp(App);
app.use(gAuthPlugin,{
  clientId:import.meta.env.VITE_CLIENT_ID,
  scope:"email",
  prompt:"consent"
})
app.use(router);
app.component("font-awesome-icon", FontAwesomeIcon);
app.mount("#app");
