<template>
    <div class="wrapper">
        <h1>Chi tiết sản phẩm</h1>
        <div class="table-responsive-md">
            <table class="table table-primary">
                <tr>
                    <th>ID</th>
                    <td>{{data.id}}</td>
                </tr>
                <tr>
                    <th>Tiêu đề</th>
                    <td>{{data.product_title}}</td>
                </tr>
                <tr>
                    <th>Tên sản phẩm</th>
                    <td> {{ data.product_name }} </td>
                </tr>
                <tr>
                    <th>Giá sản phẩm</th>
                    <td>{{data.product_price}}</td>
                </tr>
                <tr>
                    <th>Dung lượng Pin</th>
                    <td>{{data.product_capacity}}</td>
                </tr><tr>
                    <th>Dung lượng Ram</th>
                    <td>{{data.product_ram}}</td>
                </tr><tr>
                    <th>Số lượng</th>
                    <td>{{data.product_amount}}</td>
                </tr><tr>
                    <th>Bộ nhớ</th>
                    <td>{{data.product_memory}}</td>
                </tr><tr>
                    <th>Bảo hành</th>
                    <td>{{data.product_guarantee}}</td>
                </tr><tr>
                    <th>Nhà sản xuất</th>
                    <td>{{data.product_category}}</td>
                </tr><tr>
                    <th>Ngày tạo</th>
                    <td>{{data.created_at}}</td>
                </tr><tr>
                    <th>Ngày sửa</th>
                    <td>{{data.updated_at}}</td>
                </tr>
                <tr>
                    <th>Mô tả</th>
                    <td>{{data.product_description}}</td>
                </tr>
                <tr>
                    <th>Hình ảnh</th>
                    <td><img :src="linkImage" alt=""></td>
                </tr>
            </table>
        </div>

    </div>
</template>
<script setup>
import ax from '../../../axios.js';
import { onMounted, ref } from 'vue';

const { id } = defineProps({
    id: {
        type: Number,
        required: true,
        default: 0
    }
})
const linkImage=ref("")
onMounted(() => {
    getData()
   
})
const data=ref({})
async function getData() {
    try {
        const response = await ax.get(`admin/product/${id}`)
        data.value=response.data
        linkImage.value=`http://127.0.0.1:8000/${response.data.product_image}`
    }
    catch (error) {
        console.log(error);
    }

}

</script>
<style scoped lang="scss">
.wrapper {
    background-color: #F1EFEF;
    height: 100%;
    width: 100%;
    padding: 20px;
}
th{
    text-wrap: nowrap;
}
</style>