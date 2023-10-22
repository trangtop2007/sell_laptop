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
  faNewspaper,
  faPaperPlane,
  faMessage,
  faClock,
  faAngleUp,
  faBars
} from "@fortawesome/free-solid-svg-icons";
import {
  faHeart as farHeart,
  faUser as farUser,
  faFileLines as farFileLines,
  faBell as farBell,
  faCreditCard as faCreditCard
} from "@fortawesome/free-regular-svg-icons";

library.add(
  faBars,
  faCreditCard,
  farBell,
  farFileLines,
  farUser,
  faAngleUp,
  faClock,
  faMessage,
  faPaperPlane,
  faNewspaper,
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
const app = createApp(App);
app.use(router);
app.component("font-awesome-icon", FontAwesomeIcon);
app.mount("#app");
