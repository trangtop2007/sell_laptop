<template>
  <div class="wrapper-header">
    <div class="container-fluid" style="background-color: #e9efff">
      <div class="container">
        <div class="banner-image d-lg-flex d-none">
          <img src="../assets//img//top-banner-chinh-sach-bao-hanh-doi-tra.webp" alt="" class="flex-fill" />
          <img src="../assets//img//top-banner-chinh-hang-xuat-vat-day-du.webp" alt="" class="flex-fill" />
          <img src="../assets//img/top-banner-giao-nhanh-mien-phi.webp" alt="" class="flex-fill" />
        </div>

        <div id="carouselId" class="carousel slide d-lg-none d-block" data-bs-ride="carousel">
          <ul class="carousel-indicators d-none" style="list-style: none">
            <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true"
              aria-label="First slide"></li>
            <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
            <li data-bs-target="#carouselId" data-bs-slide-to="2" aria-label="Third slide"></li>
          </ul>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="../assets//img//top-banner-chinh-sach-bao-hanh-doi-tra.webp" alt="" class="w-100" />
            </div>
            <div class="carousel-item">
              <img src="../assets//img//top-banner-chinh-hang-xuat-vat-day-du.webp" alt="" class="w-100" />
            </div>
            <div class="carousel-item">
              <img src="../assets//img/top-banner-giao-nhanh-mien-phi.webp" alt="" class="w-100" />
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
    <div class="conatiner-fluid" style="background-color: rgb(213, 13, 30)">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center wrapper-navbar">
          <router-link :to="{ name: 'home' }" class="navbar-item nav-link brand">Shop NPT</router-link>
          <div class="nav-item wrapper-location d-xl-flex d-none">
            <div class="icon-navbar">
              <font-awesome-icon :icon="['fas', 'location-dot']" />
            </div>
            <div>
              <div style="font-size: 14px">Địa chỉ</div>
              <div style="font-size: 17px">Hà Nội</div>
            </div>
          </div>
          <form @submit.prevent="onSearch" class="wrapper-search nav-item">
            <input type="text" name="s" id="search" placeholder="Bạn cần tìm gì..." autocomplete="off"
              v-model="searchText" />
            <span id="icon-search"><font-awesome-icon :icon="['fas', 'magnifying-glass']" /></span>
          </form>
          <div class="wrapper-hotline nav-item d-lg-flex d-none">
            <div class="icon-navbar">
              <font-awesome-icon :icon="['fas', 'phone']" />
            </div>
            <div>
              <div class="badge-hotline">Gọi mua hàng</div>
              <div>0363129468</div>
            </div>
          </div>
          <div class="wrapper-cart nav-item">
            <div class="icon-navbar d-md-block d-none">
              <font-awesome-icon :icon="['fas', 'cart-shopping']" />
            </div>
            <router-link :to="{ name: 'cart' }" class="nav-link">Giỏ hàng</router-link>
          </div>
          <button class="dropdown-toggle account nav-item btn text-white d-flex align-items-center"
            data-bs-toggle="dropdown" v-if="user">
            <font-awesome-icon :icon="['fas', 'user']" class="icon-navbar d-md-inline-block d-none" />

            <span>Tài khoản</span>
          </button>
          <router-link :to="{ name: 'login' }" class="wrapper-account nav-link nav-item" v-else>
            <div>
              <font-awesome-icon :icon="['fas', 'user']" />
            </div>
            <div>Đăng nhập</div>
          </router-link>
          <div class="dropdown-menu">
            <router-link class="dropdown-item" :to="{ name: 'home' }">
              Thông tin
            </router-link>
            <button class="dropdown-item" @click="logout">Đăng xuất</button>
          </div>
        </div>
      </div>
    </div>
    <BreadCrumb :product_category="data_breadcrumb.product_category" :other="data_breadcrumb.other"
      :product_name="data_breadcrumb.product_name" :product_title="data_breadcrumb.product_title"></BreadCrumb>
  </div>
</template>
<script setup>
import BreadCrumb from "../components/BreadCrumb.vue";
import { ref } from "vue";

import ax from "../axios.js";
import { useRouter } from "vue-router";
const token = window.localStorage.getItem("token")
const user = ref("");
const router = useRouter()
const searchText = ref("")
const emits=defineEmits(["search"])
const data_breadcrumb = defineProps({
  product_category: {
    type: String
  }, product_title: {
    type: String
  }, product_name: {
    type: String
  },
  other: {
    type: String
  }
})


function onSearch() {
  emits("search", "")
  router.replace({ name: 'home', query: { s: searchText.value } })
}
ax.get("/user", { headers: { Authorization: `Bearer ${token}` } }).then(
  (response) => {
    const isObjectEmpty = (objectName) => {
      return Object.keys(objectName).length === 0;
    };
    if (!isObjectEmpty(response.data)) {
      user.value = response.data;
    }
  }
);

function logout() {
  window.localStorage.removeItem("token");
  window.location.reload()
}
</script>
<style scoped lang="scss">
$color_nav_item: hsla(0, 0%, 100%, 0.2);
$height_nav_item: 50px;
$color_icon_search: #707070;
$color_red: rgb(213, 13, 30);

* {
  font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
    Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
}

.wrapper-header {
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  z-index: 10000;
}

.wrapper-search {
  height: 40px;
  position: relative;
}

#icon-search {
  position: absolute;
  font-size: 20px;
  color: $color_icon_search;
  left: 25px;
  top: 50%;
  transform: translate(-50%, -50%);
}

.nav-item:not(.wrapper-search) {
  height: $height_nav_item;
  background-color: $color_nav_item;
  padding: 0 10px;
  border-radius: 10px;
  transition: all 0.2s ease-in;
}

.nav-item:not(.wrapper-search):hover {
  background-color: transparent;
  cursor: pointer;
}

@media screen and (max-width: 768px) {
  .brand {
    font-size: 17px !important;
  }

  #search {
    width: 220px !important;
  }
}

.wrapper-account {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  color: white;
}

.brand {
  font-size: 30px;
  color: white;
}

.wrapper-location,
.wrapper-hotline,
.wrapper-cart {
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 14px;
  color: white;
}

.badge-hotline {
  font-size: 14px !important;
}

#search {
  height: 100%;
  outline: none;
  border: none;
  border-radius: 10px;
  font-size: 18px;
  width: 300px;
  padding-left: 50px;
}

.icon-navbar {
  font-size: 25px;
  margin-right: 10px;
}

.wrapper-navbar {
  height: 70px;
}
</style>
