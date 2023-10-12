<template>
    <div class="container-fluid wrapper-breadcrumb">
        <div class="container">
            <div class="breadcrumb">
                <router-link :to="{name:'home'}" class="breadcrumb-item nav-link">
                    <span class="icon-home"><font-awesome-icon :icon="['fas', 'house']" /></span>
                    <span>Trang chủ</span>
                </router-link>
                <router-link :to="{name:'cart'}" class="breadcrumb-item nav-link" v-if="data_breadcrumb.other">
                    <span>{{data_breadcrumb.other}}</span>
                </router-link>
                <router-link :to="{ name: 'home' }" class="breadcrumb-item nav-link" v-if="data_breadcrumb.product_category">
                    <span>{{ data_breadcrumb.product_category }}</span>
                </router-link>
                <router-link :to="{ name: 'home' }" class="breadcrumb-item nav-link" v-if="data_breadcrumb.product_name">
                    <span>{{ data_breadcrumb.product_name }}</span>
                </router-link>
                <div class="breadcrumb-item active" v-if="data_breadcrumb.product_title">
                    <span>{{ data_breadcrumb.product_title }}</span>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
const data_breadcrumb = defineProps({
    product_category: {
        type: String
    }, product_title: {
        type: String
    }, product_name: {
        type: String
    },
    other:{
        type:String
    }
})
</script>
<style scoped lang="scss">
$color_red: rgb(213, 13, 30);

.icon-home {
    color: $color_red;
    font-size: 17px;
    margin-right: 10px;
}

.container-fluid {
    box-shadow: 0 0 8px 1px rgba(0, 0, 0, 0.2);
}

.breadcrumb {
    padding: 5px 0px;
}

.wrapper-breadcrumb {
    background-color: white;
}

.breadcrumb-item {
    font-size: 15px;
}</style>