<template>
    <div class="container-fluid">
        <div class="container">
            <div class="wrapper row row-cols-lg-4 row-cols-md-3 row-cols-2">
                <div class="card mb-4" v-for="(product, index) in data" :key="index">
                    <router-link :to="{ name: 'detail_product', params: { id: product.product_id } }"
                        class="wrapper-card nav-link">
                        <img class="card-img-top" :src="urlBack + product.product_image">
                        <div class="card-body">
                            <p class="product-title">{{ product.product_title }}</p>
                            <p class="product-price "><span>Giá lên tới</span> <span> {{ product.product_price
                            }}đ</span>
                            </p>
                            <div class="wrapper-endow">
                                Mua Office Home & Student 2021 kèm Macbook chỉ còn 2,090,000
                            </div>
                        </div>
                    </router-link>
                    <div class="card-footer">
                        <div class="card-footer-child">
                            <span><font-awesome-icon :icon="['fas', 'star']" /></span>
                            <span><font-awesome-icon :icon="['fas', 'star']" /></span>
                            <span><font-awesome-icon :icon="['fas', 'star']" /></span>
                            <span><font-awesome-icon :icon="['fas', 'star']" /></span>
                            <span><font-awesome-icon :icon="['fas', 'star']" /></span>
                        </div>
                        <div class="favorite d-flex justify-content-end mt-3">
                            <span>Yêu thích</span>
                            <span @click="isFavorite[index] = !isFavorite[index]">
                                <font-awesome-icon :icon="['far', 'heart']" size="xl" v-if="!isFavorite[index]" />
                                <font-awesome-icon :icon="['fas', 'heart']" size="xl" v-if="isFavorite[index]" />
                            </span>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { reactive, ref } from 'vue';
import ax from '../axios';
import { onMounted } from 'vue';
import { useRoute } from 'vue-router';
const isFavorite = reactive({})
const route=useRoute()
console.log(route);
const data = ref({})
onMounted(() => {
    getData()
})
const urlBack = ref("http://127.0.0.1:8000/")
const search=ref(route.query.s??"")
async function getData() {
    try {
        const response = await ax.get(`admin/product?s=${search.value}`)
        data.value = response.data.data


        for (let i = 1; i <= data.value.length; i++) {
            isFavorite[i] = false
        }
    }
    catch (error) {
        console.log(error);
    }
}
</script>
<style scoped lang="scss">
$color_start: #f59e0b;

.card {
    .wrapper-card {
        display: block;
        cursor: pointer;
    }

    .card-footer {
        background-color: transparent !important;

        .card-footer-child {
            display: flex;

            span {
                margin-right: 3px;
                color: $color_start !important;
            }
        }
    }
    .favorite span:nth-child(1) {
        font-size: 17px;
        margin-right: 5px;
    }

    .favorite span:nth-child(2) {
        color: #d70018;
        cursor: pointer;
    }


    .product-title {
        font-size: 17px;
        font-weight: bold;
    }
    .product-price span:nth-child(1) {
        font-weight: 400;
    }
    .product-price span:nth-child(2) {
        color: #d70018;
        display: inline-block;
        font-size: 19px;
        font-weight: 700;
        line-height: 1.1;
        margin-bottom: 10px !important;
    }
    .wrapper-endow {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f3f4f6;
        border: 1px solid #e5e7eb;
        font-size: 15px;
    }
}
</style>