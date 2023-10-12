import { useRouter } from "vue-router";
function checkLogin() {
  const router = useRouter();
  const token = window.localStorage.getItem("token");
  if (!token) {
    router.push({ name: "login" });
  }
}
export default checkLogin;
