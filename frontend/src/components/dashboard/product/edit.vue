<template>
    <div class="wrapper">
        <h1>Thêm sản phẩm</h1>
        <form @submit.prevent="edit" enctype="multipart/form-data">
            <div class="wrapper-input row row-cols-sm-2">


                <div class="mb-3">
                    <label for="product_title" class="form-label">Tiêu đề sản phẩm</label>
                    <input type="text" name="product_title" id="product_title" class="form-control"
                        placeholder="Nhập tiêu đề" v-model="data.product_title"
                        :class="{ 'is-invalid': errors.product_title }" aria-describedby="helpId">
                    <div class="invalid-feedback" v-if="errors.product_title">
                        {{ errors.product_title[0] }}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="product_name" class="form-label">Tên sản phẩm</label>
                    <input type="text" name="product_name" id="product_name" class="form-control"
                        placeholder="Nhập tên sản phẩm" v-model="data.product_name"
                        :class="{ 'is-invalid': errors.product_name }" aria-describedby="helpId">
                    <div class="invalid-feedback" v-if="errors.product_name">
                        {{ errors.product_name[0] }}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="product_price" class="form-label">Giá sản phẩm</label>
                    <input type="number" name="product_price" id="product_price" class="form-control"
                        placeholder="Nhập giá sản phẩm (9999)" v-model="data.product_price"
                        :class="{ 'is-invalid': errors.product_price }" aria-describedby="helpId">
                    <div class="invalid-feedback" v-if="errors.product_price">
                        {{ errors.product_price[0] }}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="product_memory" class="form-label">Bộ nhớ sản phẩm</label>
                    <select class="form-select form-select-md" name="product_memory" id="product_memory"
                        v-model="data.product_memory" :class="{ 'is-invalid': errors.product_memory }">
                        <option selected style="display: none;" value="">Nhập bộ nhớ</option>
                        <option value="64GB">64GB</option>
                        <option value="128GB">128GB</option>
                        <option value="256GB">256GB</option>
                        <option value="512GB">512GB</option>
                        <option value="1TB">1TB</option>
                    </select>
                    <div class="invalid-feedback" v-if="errors.product_memory">
                        {{ errors.product_memory[0] }}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="product_ram" class="form-label">Ram sản phẩm</label>
                    <select class="form-select form-select-md" name="product_ram" id="product_ram"
                        v-model="data.product_ram" :class="{ 'is-invalid': errors.product_ram }">
                        <option selected disabled style="display:none" value="">Lựa chọn Ram</option>
                        <option value="2GB">2GB</option>
                        <option value="4GB">4GB</option>
                        <option value="8GB">8GB</option>
                        <option value="12GB">12GB</option>
                        <option value="16GB">16GB</option>
                        <option value="32GB">32GB</option>
                        <option value="64GB">64GB</option>
                    </select>
                    <div class="invalid-feedback" v-if="errors.product_ram">
                        {{ errors.product_ram[0] }}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="product_capacity" class="form-label">Dung lương Pin</label>
                    <input type="text" name="product_capacity" id="product_capacity" class="form-control"
                        placeholder="Nhập dung lương Pin VD:2500" aria-describedby="helpId" v-model="data.product_capacity"
                        :class="{ 'is-invalid': errors.product_capacity }">
                    <div class="invalid-feedback" v-if="errors.product_capacity">
                        {{ errors.product_capacity[0] }}
                    </div>
                </div>

                <div class="mb-3">
                    <label for="product_amount" class="form-label">Số lượng sản phẩm</label>
                    <input type="text" name="product_amount" id="product_amount" class="form-control"
                        placeholder="Nhập số lượng" v-model="data.product_amount"
                        :class="{ 'is-invalid': errors.product_amount }" aria-describedby="helpId">
                    <div class="invalid-feedback" v-if="errors.product_amount">
                        {{ errors.product_amount[0] }}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="product_image" class="form-label">Hình ảnh sản phẩm</label>
                    <input type="file" class="form-control" name="product_image" id="product_image" ref="image"
                        placeholder="Lựa chọn hình ảnh" :class="{ 'is-invalid': errors.product_image }">
                    <div class="invalid-feedback" v-if="errors.product_image">
                        {{ errors.product_image[0] }}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="product_guarantee" class="form-label">Bảo hành</label>
                    <input type="text" name="product_guarantee" id="product_guarantee" class="form-control"
                        v-model="data.product_guarantee" :class="{ 'is-invalid': errors.product_guarantee }"
                        placeholder="Nhập thời gian bảo hành" aria-describedby="helpId">
                    <div class="invalid-feedback" v-if="errors.product_guarantee">
                        {{ errors.product_guarantee[0] }}
                    </div>
                </div>

                <div class="mb-3">
                    <label for="product_category" class="form-label">Hãng sản xuất</label>
                    <input type="text" list="datalist" name="product_category" id="product_category" class="form-control"
                        v-model="data.product_category" :class="{ 'is-invalid': errors.product_category }"
                        placeholder="Hãng sản xuất" aria-describedby="helpId">
                    <datalist id="datalist">
                        <option value="ASUS"></option>
                        <option value="MSI"></option>
                        <option value="MAC BOOK"></option>
                        <option value="HP"></option>
                        <option value="LENOVO"></option>
                        <option value="ACER"></option>
                        <option value="DELL"></option>
                        <option value="LG"></option>
                        <option value="HUAWEI"></option>
                    </datalist>
                    <div class="invalid-feedback" v-if="errors.product_category">
                        {{ errors.product_category[0] }}
                    </div>
                </div>

                <div class="mb-3">
                    <label for="product_description" class="form-label">Miêu tả</label>
                    <textarea class="form-control" name="product_description" id="product_description" rows="2"
                        v-model="data.product_description" :class="{ 'is-invalid': errors.product_description }"
                        placeholder="Miêu tả sản phẩm"></textarea>
                    <div class="invalid-feedback" v-if="errors.product_description">
                        {{ errors.product_description[0] }}
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end align-items-center">
                <input type="submit" value="Sửa sản phẩm" class="btn btn-primary">
            </div>
        </form>
    </div>
</template>
<script setup>
import { reactive, ref } from 'vue';
import ax from "../../../axios.js"
import { onMounted } from 'vue';
import { useRoute } from "vue-router"
const route = useRoute()
const id = route.params.id

const image = ref("")
const errors = reactive({
    product_title: "",
    product_name: "",
    product_price: "",
    product_capacity: "",
    product_ram: "",
    product_amount: "",
    product_memory: "",
    product_guarantee: "",
    product_description: "",
    product_category: "",
    product_image: ""
})
const data = reactive({
    product_id: "",
    product_title: "",
    product_name: "",
    product_price: "",
    product_capacity: "",
    product_ram: "",
    product_amount: "",
    product_memory: "",
    product_guarantee: "",
    product_description: "",
    product_category: "",
    product_image: ""
})
function setDefaultImage(path) {
    const defaultFile = new File([""], `D:/fullstack/backend/public/${path}`)
    const dataTransfer = new DataTransfer()
    dataTransfer.items.add(defaultFile)
    image.value.files = dataTransfer.files
}
function getData() {
    ax.get(`admin/product/${id}`)
        .then((response) => {
            data.product_amount = response.data.product_amount
            data.product_capacity = response.data.product_capacity
            data.product_category = response.data.product_category
            data.product_description = response.data.product_description
            data.product_guarantee = response.data.product_guarantee
            data.product_memory = response.data.product_memory
            data.product_name = response.data.product_name
            data.product_price = response.data.product_price
            data.product_title = response.data.product_title
            data.product_ram = response.data.product_ram
            data.product_id = response.data.product_id,
            data.product_image = response.data.product_image
            setDefaultImage(data.product_image)
        })
        .catch((error) => {
            console.error(error);
        })
}
onMounted(() => {
    getData()
});

function edit() {
    var formData = new FormData()
    var img = image.value.files[0]
    formData.append("product_id", data.product_id)
    formData.append("product_image", img)
    formData.append("product_title", data.product_title)
    formData.append("product_name", data.product_name)
    formData.append("product_price", data.product_price)
    formData.append("product_capacity", data.product_capacity)
    formData.append("product_ram", data.product_ram)
    formData.append("product_amount", data.product_amount)
    formData.append("product_memory", data.product_memory)
    formData.append("product_guarantee", data.product_guarantee)
    formData.append("product_category", data.product_category)
    formData.append("product_description", data.product_description)
    console.log(formData.get("product_image"));
    ax.post(`admin/product/${id}`, formData, {headers:{"Content-Type":"multipart/form-data"}})
        .then((response) => {
            console.log(response.data);

        })
        .catch((error) => {
            console.log(error);
            errors.product_amount = error.response.data.product_amount
            errors.product_capacity = error.response.data.product_capacity
            errors.product_category = error.response.data.product_category
            errors.product_description = error.response.data.product_description
            errors.product_guarantee = error.response.data.product_guarantee
            errors.product_memory = error.response.data.product_memory
            errors.product_name = error.response.data.product_name
            errors.product_price = error.response.data.product_price
            errors.product_title = error.response.data.product_title
            errors.product_ram = error.response.data.product_ram
            errors.product_image = error.response.data.product_image


        })
}
</script>
<style scoped lang="scss">
.wrapper {
    background-color: #F1EFEF;
    height: 100%;
    width: 100%;
    padding: 20px;
}
</style>