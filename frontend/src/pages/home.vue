<template>
    <div class="layout">
        <Header @search="update"></Header>
        <Category></Category>
        <SlideAds></SlideAds>
        <FilterProduct></FilterProduct>
        <ShowProduct :key="product"></ShowProduct>
    </div>
    
</template>
<script setup>
const product=ref(1)
function update(){
    product.value++
}
import Header from '../components/Header.vue';
import Category from '../components/Category.vue';  
import SlideAds from '../components/SlideAds.vue';
import FilterProduct from "../components/FilterProduct.vue"
import ShowProduct from '../components/ShowProduct.vue';
import { ref } from 'vue';
</script>
