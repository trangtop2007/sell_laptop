<template>
    <div class="wrapper">
        <h1 class="h3">Quản lý sản phẩm</h1>
        <div class="d-flex justify-content-between align-items-center mt-4">
            <form action="" method="get" class="form d-flex">
                <div class="me-2">
                    <select class="form-select form-select-md" name="" id="">
                        <option selected disabled>Sắp xếp</option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                </div>
                <div class="me-3">
                    <input type="text" name="product_search" id="product_search" class="form-control" placeholder="Tìm sản phẩm"
                        aria-describedby="helpId">
                </div>
                <div>
                    <input type="submit" value="OK" class="form-control btn btn-primary">
                </div>
            </form>
            <router-link :to="{name:'admin_product_add'}" tag="button" class="btn btn-success ">Thêm sản phẩm</router-link>
        </div>
        
        <div class="wrapper-product mt-3">
            <div class="table-responsive">
                <table class="table table-primary table-hover">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Pin</th>
                            <th scope="col">Ram</th>
                            <th scope="col">Bảo hành</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Bộ nhớ</th>
                            <th scope="col">Chi tiết</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(product,index) in data" :key="product.product_id">
                            <td scope="col">{{product.product_id}}</td>
                            <td class="product_title" :title="product.product_title"><p>{{product.product_title}}</p></td>
                            <td>{{product.product_price}}đ</td>
                            <td>{{product.product_capacity}}</td>
                            <td>{{product.product_ram}}</td>
                            <td>{{product.product_guarantee}}</td>
                            <td>{{product.product_amount}}</td>
                            <td>{{product.product_memory}}</td>
                            <td><router-link :to="{name:'admin_product_show',params:{id:product.product_id} }" class="btn btn-primary">Chi tiết</router-link></td>
                            <td><router-link :to="{name:'admin_product_edit',params:{id:product.product_id} }" class="btn btn-warning">Sửa</router-link></td>
                            <td><button @click="deleteProduct(product.product_id)" class="btn btn-danger">Xóa</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>  
            
        </div>
    </div>
</template>
<script setup>
import { onMounted } from 'vue';
import { ref } from 'vue';
import ax from "../../../axios.js"
const data=ref({})
onMounted(()=>{
    getData()
})
async function deleteProduct(id){
    try{
        const response=await ax.delete(`admin/product/${id}`)
        window.location.reload()
    }
    catch(error){
        console.error(error);
    }
}
async function getData(){
    try{
        const response=await ax.get("admin/product")
        data.value=response.data.data
    }catch(err){
        console.log(err);
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
thead th{
    white-space: nowrap;
    text-align: center;
}.product_title p{
    
    width:300px !important;
    text-wrap: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    text-align: start;
}
tbody tr td{
    cursor: pointer;
    white-space: "";
    text-wrap: nowrap;
    text-align: center;
}
</style>