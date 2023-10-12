<template>
    <header>
        <div class="container-fluid bg-light">
            <div class="container">
                <div class="navbar">
                    <div class="navbar-brand">
                        <router-link :to="{name:'home'}" class="brand">Shop NPT</router-link>
                        <span class="type-page">{{ brand }}</span>
                    </div>
                   
                    <router-link to="/" class="nav-link help">Bạn cần giúp đỡ gì?</router-link>
                </div>
            </div>
        </div>
    </header>
</template>
<script setup>
const {brand} =defineProps({
    brand:{
        type:String,
        default:"",
        required:true
    }
})
</script>
<style scoped lang="scss">
$color_header:"";

.navbar{
    height: 84px;
}
.brand{
    color: transparent;
    display: inline-block;
    background-image: linear-gradient(to right,#f1142d ,#f59b8d);
    -webkit-background-clip: text;
    background-clip: text;
    font-weight: 500;
    font-size:30px;
}
.type-page{
    font-size: 22px;
    margin-left: 10px;
}
.help{
    color: #f1142d;
    font-size: 16px;
}
</style>