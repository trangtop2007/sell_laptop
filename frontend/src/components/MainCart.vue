<template>
    <div class="container-fluid wrapper">
        <div class="container">
            <h4>Có {{ data.length }} sản phẩm trong giỏ hàng</h4>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <th><input class="form-check-input mx-1" type="checkbox" v-model="checkAll"> Tất cả</th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Số tiền</th>
                        <th>Thao tác</th>
                    </thead>
                    <tbody>

                        <tr v-for="(product, index) in data" :key="index">
                            <td>
                                <input class="form-check-input" type="checkbox" v-model="check_item[index]">
                                <img :src="url_backend + product.product.product_image" alt="" height="100"
                                    style="mix-blend-mode:multiply;">
                            </td>
                            <td>
                                <span>{{ product.product.product_title }}</span>
                            </td>
                            <td>
                                <span>{{ analysisPrice(product.product.product_price) }}₫</span>
                            </td>
                            <td>
                                <input type="number" v-model="product.product_amount"
                                    @input="update_total($event, index, product.product.product_price)" min="1"
                                    style="width: 40px;" >
                            </td>
                            <td>
                                <span>{{ analysisPrice(total_price[index]) }}₫</span>
                            </td>
                            <td>
                                <router-link :to="{ name: 'detail_product', params: { id: product.product.product_id } }"
                                    class="btn btn-primary me-2 " style="white-space:nowrap">Chi tiết</router-link>
                                <button class="btn btn-danger">Xóa</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="sell">
        <div class="container-fluid">
            <div class="container bg-white d-flex justify-content-between align-items-center px-4" style="height: 80px;">
                <div class="d-flex align-items-center">
                    <div class="form-check form-check-inline d-flex align-items-center">
                        <input class="form-check-input me-2" type="checkbox" v-model="checkAll2" id="checkAll2">
                        <label class="form-check-label h5 m-0" for="checkAll2">Chọn tất cả</label>
                    </div>
                    <button class="btn btn-danger">Xóa</button>
                </div>
                <div class="d-flex justify-content-between aligns-items-center">
                    <p class="h5 me-5 m-0 d-flex align-items-center">Tổng thanh toán ({{ sell_amount }}): <span class="text-danger mx-2">{{ analysisPrice(total) }}₫</span> </p>
                    <button class="btn btn-success">Mua Hàng</button>
                </div>
            </div>
        </div>
    </div>
   
</template>
<script setup>
import ax from '../axios';
import { computed, onMounted, reactive, ref, watchEffect } from 'vue';


const checkAll = ref(true)
const check_item = reactive([])
const user = ref({})
const checkAll2 = ref(true)
const data = ref({})
const url_backend = ref("http://127.0.0.1:8000/")
const total_price = reactive([])
watchEffect(() => {
    if (checkAll.value == false) {
        for (let i = 0; i < check_item.length; i++) {
            check_item[i] = false
        }
    } else {
        for (let i = 0; i < check_item.length; i++) {
            check_item[i] = true
        }
    }
})
watchEffect(() => {
    checkAll2.value == true ? checkAll.value = true : checkAll.value = false
})
const total = computed(() => {
    var price = 0
    total_price.forEach((item) => {
        price += item
    })
    return price
})
const sell_amount = computed(() => {
    var count = 0
    for (let i = 0; i < check_item.length; i++) {
        check_item[i] ? count += 1 : ""
    }
    return count
})
function analysisPrice(price) {
    price = String(price)
    const arr = price.split("")
    for (let i = -3; i > -arr.length; i -= 4) {
        arr.splice(i, 0, ".")
    }
    return arr.join("")
}
function update_total(event, index, price) {
    console.log(event.target.value, index, price);
    total_price[index] = event.target.value * price
}
onMounted(() => {
    getUser()
})
async function getUser() {
    try {
        const response = await ax.get("user", { headers: { Authorization: `Bearer ${window.localStorage.getItem("token")}` } })
        user.value = response.data
        getData()

    } catch (error) {
        console.error(error);
    }
}
async function getData() {
    try {
        const response = await ax.get(`cart/u/${user.value.id}`)
        data.value = response.data
        for (let i = 1; i <= data.value.length; i++) {
            total_price[i - 1] = data.value[i - 1].product_amount * data.value[i - 1].product.product_price
        }
        for (let i = 0; i < data.value.length; i++) {
            check_item[i] = true
        }

    } catch (error) {
        console.log(error);
    }
}
</script>
<style scoped lang="scss">
.wrapper {
    height: 100vh;
    padding-top: 165px;
    background-color: rgb(237, 240, 243);

    .form-check-input {
        transform: scale(1.2);
    }

}
.sell{
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    #checkAll2{
        transform: scale(1.5);
    }
}
</style>