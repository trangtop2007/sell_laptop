<template>
    <div class="layout">
        <Header :product_category="data.product_category" :product_name="data.product_name"
            :product_title="data.product_title"></Header>
    </div>

    <div class="container-fluid wrapper">
        <div class="container">
            <div class="product_title">
                <h1 class="h5 mb-4">{{ data.product_title }} </h1>
                <div class="row">
                    <div class="col-lg-8 col-12 ">
                        <div class="wrapper-img-description rounded-4 d-flex flex-sm-column flex-md-row">
                            <img :src="urlBack + data.product_image" alt="" class="rounded-3 my-3" height="300">
                            <ul class="description">
                                <h4 class="text-center">Tính năng nổi bật</h4>
                                <ul>
                                    <li v-for="(item, index) in product_description" :key="index">
                                        {{ item }}
                                    </li>
                                </ul>
                            </ul>
                        </div>

                    </div>
                    <div class="col">
                        <h4 class="h4">Nâng cấp máy tính</h4>
                        <div class="d-flex flex-wrap justify-content-between">
                            <router-link :to="{ name: 'detail_product', params: { id: item.product_id } }"
                                v-for="(item, index) in productRelation" :key="index"
                                :class="{ 'product_relation_active': item.product_id == data.product_id }"
                                class="btn d-flex flex-column align-items-center product-relation">
                                <span>{{ item.product_ram }} - {{ item.product_memory }}</span>
                                <span>{{ item.product_price }} đ</span>
                            </router-link>
                        </div>
                        <div class="btn-price">
                            <span class="me-2">Giá lên tới:</span>
                            <span>{{ product_price }}đ</span>
                        </div>
                        <button class="btn-sell">
                            <span>Mua ngay</span>
                            <span>(Giao nhanh từ 2 giờ nhận tại cửa hàng)</span>
                        </button>
                        <button class="btn-cart" @click="addCart">
                            <span>Thêm vào giỏ hàng</span>
                        </button>


                    </div>
                    <div class="wrapper-appreciate">
                        <h5>Đánh giá & nhận xét {{ data.product_title }} </h5>
                        <div class="row">
                            <div class="col-5 d-flex flex-column align-items-center">
                                <span class="h3">5.0/5</span>
                                <div class="appreciate-star">
                                    <span><font-awesome-icon :icon="['fas', 'star']" /></span>
                                    <span><font-awesome-icon :icon="['fas', 'star']" /></span>
                                    <span><font-awesome-icon :icon="['fas', 'star']" /></span>
                                    <span><font-awesome-icon :icon="['fas', 'star']" /></span>
                                    <span><font-awesome-icon :icon="['fas', 'star']" /></span>
                                </div>
                                <router-link :to="{ name: 'home' }" class="appreciate">
                                    <span>1 đánh giá</span>
                                </router-link>
                            </div>
                            <div class="col-7">

                                <div class="star-5 d-flex align-items-center mb-2">
                                    <div class="star">
                                        <span>5</span> <span> <font-awesome-icon :icon="['fas', 'star']" /></span>
                                    </div>
                                    <progress value="32" max="100" class="progress-appreciate"></progress>
                                </div>

                                <div class="star-4 d-flex align-items-center mb-2 ">
                                    <div class="star">
                                        <span>4</span> <span> <font-awesome-icon :icon="['fas', 'star']" /></span>
                                    </div>
                                    <progress value="32" max="100" class="progress-appreciate"></progress>
                                </div>

                                <div class="star-3 d-flex align-items-center mb-2 ">
                                    <div class="star">
                                        <span>3</span> <span> <font-awesome-icon :icon="['fas', 'star']" /></span>
                                    </div>
                                    <progress value="32" max="100" class="progress-appreciate"></progress>
                                </div>

                                <div class="star-2 d-flex align-items-center mb-2 ">
                                    <div class="star">
                                        <span>2</span> <span> <font-awesome-icon :icon="['fas', 'star']" /></span>
                                    </div>
                                    <progress value="32" max="100" class="progress-appreciate"></progress>
                                </div>

                                <div class="star-1 d-flex align-items-center mb-2 ">
                                    <div class="star">
                                        <span>1</span> <span> <font-awesome-icon :icon="['fas', 'star']" /></span>
                                    </div>
                                    <progress value="32" max="100" class="progress-appreciate"></progress>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex flex-column align-items-center">
                            <h5 class="mb-4">Bạn đánh giá sao về sản phẩm này?</h5>
                            <button class="btn btn-danger">Đánh giá ngay</button>
                        </div>
                        <hr>
                        <div class="wrapper-comment">
                            <div class="wrapper-filter-comment">
                                <h5>Lọc theo</h5>
                                <div class="status-filter mb-3">
                                    <button class="btn btn-outline-dark me-3 ">Tất cả</button>
                                    <button class="btn btn-outline-dark me-3">Có hình ảnh</button>
                                    <button class="btn btn btn-outline-dark me-3">Đã mua hàng</button>
                                </div>
                                <div class="star-filter d-flex ">
                                    <button class="btn btn-outline-dark star me-3"><span>5</span><span>
                                            <font-awesome-icon :icon="['fas', 'star']" /></span></button>
                                    <button class="btn btn-outline-dark star me-3"><span>4</span><span>
                                            <font-awesome-icon :icon="['fas', 'star']" /></span></button>
                                    <button class="btn btn-outline-dark star me-3"><span>3</span><span>
                                            <font-awesome-icon :icon="['fas', 'star']" /></span></button>
                                    <button class="btn btn-outline-dark star me-3"><span>2</span><span>
                                            <font-awesome-icon :icon="['fas', 'star']" /></span></button>
                                    <button class="btn btn-outline-dark star me-3"><span>1</span><span>
                                            <font-awesome-icon :icon="['fas', 'star']" /></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="toast show" v-if="isNotification" style="position:fixed;right:10px;bottom:15px">
            <div class="toast-header d-flex justify-content-between align-items-center">
                <div>
                    <small class="me-2 text-primary"><font-awesome-icon :icon="['fas', 'bell']" size="xl" /></small>
                    <strong class="text-primary">Thông báo</strong>
                </div>
                <button class="btn-close " data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body">
                <h6 class="text-success">Thêm vào giỏ hàng thành công!</h6>
            </div>
        </div>
    </div>
    <button ref="btn_modal" data-bs-target="#modalId" class="btn btn-primary d-none" data-bs-toggle="modal"></button>
    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-modal="true"
        role="dialog" aria-labelledby="modalTitleId">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title text-success" id="modalTitleId">Thông báo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-target="#modalId"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="h5 text-white">Để mua hàng bạn cần phải đăng nhập!</p>
                </div>
                <div class="modal-footer">
                    <button data-bs-dismiss="modal" ref="btn_dismiss" data-bs-target="#modalId" class="btn btn-secondary">Trở lại</button>
                    <router-link :to="{ name: 'login' }" class="btn btn-primary">Đăng nhập</router-link>
                </div>
            </div>
        </div>
    </div>
    <Footer></Footer>
</template>
<script setup>
import ax from '../axios';
import Footer from '../components/Footer.vue';
import Header from '../components/Header.vue';
import { onMounted } from 'vue';
import { ref } from 'vue';
import { onBeforeRouteUpdate,onBeforeRouteLeave } from "vue-router"
const btn_modal = ref()
const btn_dismiss=ref()
onBeforeRouteUpdate((to, from, next) => {
    
    next()
    setTimeout(() => {
        window.location.reload()
    }, 10)
})
onBeforeRouteLeave(()=>{
    btn_dismiss.value.click()
})
const { id } = defineProps({
    id: {
        type: String
    }
})
function showErrorSell() {
    console.log(btn_modal.value.click());
}
onMounted(() => {
    getData(),
        getUser()
})
const isNotification = ref(false)
const product_description = ref({})
const product_price = ref("")
const urlBack = "http://127.0.0.1:8000/"
const data = ref({})
const productRelation = ref({})
const user = ref({})
async function getProductRelation(product_name) {
    try {
        const response = await ax.get(`product/getRelation/${product_name}`)
        productRelation.value = response.data

    } catch (error) {
        console.error(error);
    }
}
async function getUser() {
    try {
        const response = await ax.get("user", { headers: { Authorization: `Bearer ${window.localStorage.getItem("token")}` } })
        user.value = response.data
    }
    catch (error) {
        console.log(error);
    }
}
async function addCart() {
    if (user.value) {
        showErrorSell()
    } else {
        const formData = new FormData()
        formData.append("product_id", data.value.product_id)
        formData.append("user_id", user.value.id)
        try {
            const response = await ax.post("cart", formData)
            if (response.data.status == "OK") {
                isNotification.value = true
            }
        } catch (error) {
            console.error(error);
        }
    }

}
function analysisPrice(price) {
    price = String(price)
    const arr = price.split("")
    for (let i = -3; i > -arr.length; i -= 4) {
        arr.splice(i, 0, ".")
    }
    return arr.join("")
}
async function getData() {
    try {
        const response = await ax.get(`admin/product/${id}`)
        data.value = response.data
        product_price.value = analysisPrice(data.value.product_price)
        product_description.value = data.value.product_description.split(".")
        getProductRelation(data.value.product_name)
    }
    catch (error) {
        console.error(error);
    }
}
</script>
<style lang="scss" scoped>
.wrapper {
    padding-top: 190px;
    background-color: rgb(237, 240, 243);

    &-img-description {
        background: linear-gradient(90deg, #dd5e89, #f7bb97);
        display: flex;
        justify-content: space-around;
        align-items: center;
        padding: 20px;
    }

    .product_relation_active {
        border: 1px solid rgb(213, 13, 30) !important;
    }

    .product-relation {
        border: 1px solid rgb(213, 13, 30);
        margin-bottom: 15px;
        background: #fff;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        color: #444;
        cursor: pointer;

        span:nth-child(1) {
            font-weight: 500;
        }
    }

    progress {
        height: 11px;
        width: 320px;
        border: 0.1px solid rgb(207, 200, 200);
        border-radius: 10px;
    }

    progress::-webkit-progress-bar {
        background-color: rgb(237, 237, 237);
    }

    progress::-webkit-progress-value {
        background-color: rgb(213, 13, 30);
    }

    .btn-price {
        cursor: pointer;
        width: 100%;
        border: 1px solid rgb(213, 13, 30);
        box-shadow: 0 0 8px 0.5px rgba(0, 0, 0, 0.2);
        color: rgb(213, 13, 30);
        font-size: 21px;
        font-weight: bold;
        padding: 10px 0px;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        margin-bottom: 20px;

        span:nth-child(1) {
            color: rgb(116, 92, 92) !important;
        }

        &::after {
            position: absolute;
            bottom: -30px;
            content: "";
            width: 0;
            height: 0;
            border: 15px solid;
            border-color: rgb(213, 13, 30) transparent transparent transparent;
        }
    }

    .btn-sell {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: rgb(213, 13, 30);
        color: white;
        border: none;
        outline: none;
        padding: 10px 0px;
        border-radius: 10px;
        margin-bottom: 9px;
    }

    .btn-cart {

        width: 100%;
        padding: 10px;
        background-color: green;
        color: white;
        border: none;
        outline: none;
        height: 60px;
        font-size: 18px;
        border-radius: 10px;
    }

    .wrapper-appreciate {
        margin-top: 20px;
        box-shadow: 0 0 2px 0px rgb(122, 113, 113);
        padding: 20px;
        border-radius: 10px;

        .appreciate-star {
            display: flex;

            span {
                color: #f59e0b !important;
                margin-right: 10px;
            }
        }
    }

    .star {
        display: flex;

        span:nth-child(1) {
            font-weight: bold;
            margin-right: 5px;
        }

        span:nth-child(2) {
            margin-right: 3px;
            color: #f59e0b !important;
            margin-right: 10px;
        }

    }





}</style>