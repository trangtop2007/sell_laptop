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
      path: "/user",
      component: () => import("../pages/user.vue"),
      name: "user",
      children: [
        {
          path: "",
          redirect: { name: "user_account" },
        },
        {
          path: "account",
          name: "user_account",
          components: {
            user: () => import("../components/user/profile/Profile.vue"),
          },
        },
      ],
      beforeEnter: (to, from, next) => {
        const token = window.localStorage.getItem("token");
        if (!token) {
          next({ name: "login" });
        }
        ax.get("user", { headers: { Authorization: `Bearer ${token}` } }).then(
          (response) => {
            if (!response.data) {
              next({ name: "login" });
            }
          }
        );
        next()
      },
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
      path: "/cart",
      component: () => import("../pages/cart.vue"),
      name: "cart",
      alias: ["/Cart"],
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
        {
          path: "new",
          children: [
            {
              path: "",
              components: {
                admin_main: () =>
                  import(".././components/dashboard/new/new.vue"),
              },
              name: "admin_new",
            },
            {
              path: "add",
              name: "admin_new_add",
              components: {
                admin_main: () =>
                  import(".././components/dashboard/new/add.vue"),
              },
            },
          ],
        },
      ],
      beforeEnter: (to, from, next) => {
        const token = window.localStorage.getItem("token");
        if (token) {
          ax.get("/user", {
            headers: { Authorization: `Bearer ${token}` },
          }).then(function (response) {
            console.log(response.data);
            if (response.data.role != 4) {
              next({ name: "home" });
            }
          });
        } else {
          next({ name: "login" });
        }
      },
    },
    {
      path: "/:pathMatch(.*)*",
      redirect: {
        name: "home",
      },
    },
  ],
});
export default router;
