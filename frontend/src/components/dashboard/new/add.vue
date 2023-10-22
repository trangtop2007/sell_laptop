<template>
    <div class="wrapper">
        <h1 class="h3">Thêm tin tức</h1>
        <form @submit.prevent="add" method="post">
            <div class="mb-3">
                <label for="new_title" class="form-label">Tiêu đề</label>
                <input type="text" name="new_title" id="new_title" class="form-control" placeholder="Nhập tiêu đề tin"
                    aria-describedby="helpId" v-model="data.new_title" :class="{'is-invalid':errors.new_title}">
                <div class="invalid-feedback" v-if="errors.new_title">
                    {{ errors.new_title[0] }}
                </div>
            </div>
            <div class="mb-3">
                <label for="new_img" class="form-label">Chọn hình ảnh</label>
                <input type="file" class="form-control" ref="new_img" name="new_img" id="new_img" placeholder="Chọn hình ảnh" :class="{'is-invalid':errors.new_img}"
                    aria-describedby="fileHelpId">
                <div class="invalid-feedback" v-if="errors.new_img">
                    {{ errors.new_img[0] }}
                </div>
            </div>
            <div class="mb-3">
                <label for="new_description" class="form-label">Miêu tả</label>
                <textarea class="form-control" name="new_description" :class="{'is-invalid':errors.new_description}" v-model="data.new_description" id="new_description" rows="8" placeholder="Nhập miêu tả tin tức"></textarea>
                <div class="invalid-feedback" v-if="errors.new_description">
                    {{ errors.new_description[0] }}
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-end aling-items-center">
                <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
            </div>
        </form>
    </div>
</template>
<script setup>
import { reactive, ref } from 'vue';
import ax from '../../../axios';

const new_img=ref()
const data=reactive({
    new_description:"",
    new_title:""
})
const errors=reactive({
    new_description:"",
    new_title:"",
    new_img:""
})
async function add(){
    const formData=new FormData()
    formData.append("new_title",data.new_title)
    formData.append("new_description",data.new_description)
    formData.append("new_img",new_img.value.files[0])
    try{
        const response=await ax.post("admin/new",formData,{headers:{"Content-Type":"multipart/form-data"}})
        console.log(response.FormData);
    }catch(error){
        errors.new_description=error.response.data.new_description
        errors.new_title=error.response.data.new_title
        errors.new_img=error.response.data.new_img
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
</style>
