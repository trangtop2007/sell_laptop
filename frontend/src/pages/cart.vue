<template>
    <div class="layout">
        <Header :other="brand"></Header>
        <MainCart></MainCart>
    </div>
   
</template>
<script setup>
import { ref } from 'vue';
import Header from '../components/Header.vue';
import MainCart from '../components/MainCart.vue';
const brand=ref("Giò hàng")
</script>
