<template>
    <div class="wrapper">
        <div class="wrapper-brand">
            <router-link :to="{name:'home'}" class="h2 text-decoration-none">Shop NPT</router-link>
        </div>
        <div class="wrapper-dashboard">
            <span>
                <font-awesome-icon :icon="['fas', 'house']" />
            </span>
            <span>Trang quản lý</span>
        </div>
        <div class="wrapper-manage">
            <div class="email">
                <span><font-awesome-icon :icon="['fas', 'envelope']" /></span>
                <span>Email</span>
            </div>
            <div class="chat">
                <span><font-awesome-icon :icon="['fas', 'comment']" /></span>
                <span>Nhắn tin</span>
            </div>
            <div class="user">
                <span><font-awesome-icon :icon="['fas', 'user']" /></span>
                <span>Người dùng</span>
            </div>
                <router-link :to="{name:'admin_product'}" tag="div" class="product nav-link" :class="{'manage-active':route.fullPath.split('/').includes('product')&&route.fullPath.split('/').includes('admin')}">
                <span><font-awesome-icon :icon="['fas', 'laptop']" /></span>
                <span>Sản phẩm</span>
                
            </router-link>
        </div>
    </div>
</template>
<script setup>
import { useRoute } from 'vue-router';

const route=useRoute()

</script>
<style scoped lang="scss">
.wrapper{
    display: flex;
    flex-direction: column;
    height: 100vh;
    background-color:rgba(46, 50, 72,0.9);
    padding:15px;
    color: rgb(208,212,241);
    &-brand{
        margin-left: 20px;
        cursor: pointer;
    }
    &-dashboard{
        cursor: pointer;
        border-radius: 8px;
        padding: 7px 10px;
        span:nth-child(1){
            font-size: 22px;
            margin: 0px 10px;
        }
        span:nth-child(2){
            font-size: 18px;
        }
        &:hover{
            background-color: rgb(46, 50, 72);
        }
    }
    &-manage{
        
        display: flex;
        flex-direction: column;
        .chat,.user,.email,.product{
            border-radius: 8px;
            padding: 7px 10px;
            cursor: pointer;
            span:nth-child(1){
                font-size: 22px;
                margin:0px 10px;
            }
            span:nth-child(2){
                font-size: 18px;
            }   
        }
        .chat:hover,.user:hover,.email:hover,.product:hover{
            background-color: rgb(46, 50, 72);
        }
        .manage-active{
            background-color: rgb(46, 50, 72);
        }
    }
}
</style>