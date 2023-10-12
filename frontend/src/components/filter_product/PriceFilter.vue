<template>
    <div class="wrapper-price card">
        <div class="card-header">
            <span>{{ price.min }}đ</span>
            <span>{{ price.max }}đ</span>
        </div>
        <div class="card-body">

        </div>
        <div class="card-footer">
            
        </div>
    </div>
</template>
<script setup>
import { reactive } from 'vue';

const price=reactive({
    min:0,
    max:179999000
})
</script>