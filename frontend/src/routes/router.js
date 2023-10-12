import { createRouter, createWebHistory, useRouter } from "vue-router";
import ax from "../axios.js";
const router = createRouter({
  history: createWebHistory(),
  scrollBehavior: (to, from, savedPosition) => {},
  routes: [
    {
      path: "/",
      component: () => import("../pages/home.vue"),
      alias: "/home",
      name: "home",
    },
    {
      path: "/login",
      component: () => import("../pages/login.vue"),
      alias: ["/Login"],
      name: "login",
    },
    {
      path: "/register",
      component: () => import("../pages/register.vue"), 
      name: "register",
      alias: ["/Register"],
    },
    {
      path:"/cart",
      component:()=>import("../pages/cart.vue"),
      name:"cart",
      alias:["/Cart"]
    },
    {
      path: "/product/p/:id(\\d+)",
      component: () => import("../pages/detailProduct.vue"),
      name: "detail_product",
      props: true,
      
    },

    {
      path: "/admin",
      component: () => import("../pages/admin/dashboard.vue"),
      name: "admin",
      children: [
        {
          path: "product",

          children: [
            {
              path: "",
              name: "admin_product",
              components: {
                admin_main: () =>
                  import("../components/dashboard/product/product.vue"),
              },
            },

            {
              path: "add",
              name: "admin_product_add",
              components: {
                admin_main: () =>
                  import("../components/dashboard/product/add.vue"),
              },
            },
            {
              path: ":id(\\d+)",
              name: "admin_product_show",
              components: {
                admin_main: () =>
                  import("../components/dashboard/product/show.vue"),
              },
              props: true,
            },
            {
              path: "edit/:id(\\d+)",
              name: "admin_product_edit",
              components: {
                admin_main: () =>
                  import("../components/dashboard/product/edit.vue"),
              },
              props: true,
            },
          ],
        },
      ],
      beforeEnter: () => {
        const router = useRouter();
        const token = window.localStorage.getItem("token");
        if (token) {
          ax.get("/user", {
            headers: { Authorization: `Bearer ${token}` },
          }).then(function (response) {
            console.log(response.data);
            if (response.data.role != 4) {
              router.push({ name: "home" });
            }
          });
        } else {
          router.push({ name: "login" });
        }
      },
    },
  ],
});
export default router;
