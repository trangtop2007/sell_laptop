<template>
    <div class="container-fluid" style="margin-top: 160px">
        <div class="container">
            <button class="btn d-lg-none " @click="showSlider"><font-awesome-icon size="xl"
                    :icon="['fas', 'bars']" /></button>
            <div class="wrapper row py-3">
                <div class="slider col-lg-3 col-12 d-lg-block d-none" id="slider" ref="slider">
                    <div class="wrapper-intro d-flex align-items-center mb-4">
                        <img src="../../assets//img/user.png" alt="user" class="rounded-circle me-2" height="50">
                        <span class="name h6">Nguyễn Phong Tráng</span>
                    </div>
                    <a href="#list-profile" data-bs-toggle="collapse" class="wrapper-profile nav-link">
                        <font-awesome-icon :icon="['far', 'user']" class="text-primary me-2" size="lg" />
                        <span>Tải khoản của tôi</span>
                    </a>
                    <ul style="list-style:none " class="list-profile collapse" id="list-profile">
                        <li><router-link :to="{ name: 'user' }" class="nav-link my-2">Hồ sơ</router-link>
                        </li>
                        <li><router-link :to="{ name: 'user' }" class="nav-link">Đổi mât khẩu</router-link></li>
                    </ul>
                    <router-link class="nav-link wrapper-bill " :to="{ name: 'user' }">
                        <font-awesome-icon :icon="['far', 'file-lines']" class="text-primary me-3" size="xl" />
                        <span>Đơn mua</span>
                    </router-link>
                    <router-link class="nav-link wrapper-notification" :to="{ name: 'user' }">
                        <font-awesome-icon :icon="['far', 'bell']" class="text-danger me-3" size="xl" />
                        <span>Thông báo</span>
                    </router-link>
                    <router-link class="nav-link wrapper-voucher" :to="{ name: 'user' }">
                        <font-awesome-icon :icon="['far', 'credit-card']" class="text-danger me-3" size="lg" />
                        <span>Phiếu giảm giá</span>
                    </router-link>

                </div>
                <div class="main col-lg-9 col-sm-12 rounded-4 p-3">
                    <router-view name="user" :dataUser="dataUser"></router-view>
                </div>
            </div>

        </div>

    </div>
</template>
<script setup>
import { onMounted, ref } from 'vue';
import ax from '../../axios';

const slider = ref()
function showSlider() {
    if (slider.value.classList.value.includes("d-none")) {
        slider.value.classList.remove("d-none")
    } else {
        slider.value.classList.add("d-none")
    }

}const dataUser=ref({})

</script>
<style scoped lang="scss">
.wrapper-bill,
.wrapper-notification,
.wrapper-voucher,
.wrapper-profile {
    font-size: 17px;
    margin-bottom: 15px;

    &:hover {
        color: #d70018;
        font-weight: 500;
    }
}

.list-profile {
    li {
        &:hover {
            color: #d70018;
        }
    }
}

.main {

    background-color: white;
    box-shadow: 0 0 10px 0px rgba(0, 0, 0, 0.2);
}

@media screen and (max-width: 992px) {
    .slider {
        background-color: white;
        box-shadow: 0 0 10px 0px rgba(0, 0, 0, 0.2);
        margin-bottom: 20px;
        padding: 10px 20px;
        border-radius: 8px;
        animation: showSlider 0.5s linear forwards;
    }

    @keyframes showSlider {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }
}
</style>