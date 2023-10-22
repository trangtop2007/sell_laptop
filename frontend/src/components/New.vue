<template>
    <div class="container-fluid">
        <div class="container">
            <div class="wrapper">
                <h3>Tin tức</h3>
                <ul class="nav flex-column">
                    <li v-for="(item,index) in data" :key="item.id">
                        <div class="nav-item new_title h3">
                            {{ item.new_title }}
                        </div>
                        <img :src="urlBack+item.new_img" alt="" class="w-50 my-4 img-thumbnail">
                        <div class="nav-item new_description" v-html="item.new_description" style="font-size: 17px;" ></div>
                    </li>
                </ul>
            </div>
            
        </div>
    </div>
</template>
<script setup>
import { onMounted, ref } from 'vue';
import ax from '../axios';
const urlBack="http://127.0.0.1:8000/"
onMounted(()=>{
    getData()
})
const data=ref({})
async function getData(){
    try{
        const response=await ax.get("admin/new")
        data.value=response.data
    }catch(error){
        console.log(error);
    }
}
</script>
<style lang="scss" scoped>
.wrapper{
    box-shadow: 0 0 8px 1px rgba($color: #000000, $alpha: 0.2);
    border-radius: 8px;
    padding: 10px;
}
.nav-item h4{
    margin-top: 20px !important;
}
</style>