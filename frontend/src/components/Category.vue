<template>
    <div class="container-fluid" style="margin-top: 165px;">
        <div class="container rounded-pill wrapper over-hidden">
            <nav class="nav wrapper-category" ref="nav">
                <router-link :to="{ name: 'home' }" class="nav-category"
                    :class="{ 'nav-active': route.path == '/' }">Tất
                    cả</router-link>
                <router-link :to="{ name: 'home' }" class="nav-category"
                    :class="{ 'nav-active': route.path == '/mac-book*' }">Mac Book</router-link>
                <router-link :to="{ name: 'home' }" class="nav-category "
                    :class="{ 'nav-active': route.path == '/asus*' }">Asus</router-link>
                <router-link :to="{ name: 'home' }" class="nav-category"
                    :class="{ 'nav-active': route.path == '/lenovo' }">Lenovo</router-link>
                <router-link :to="{ name: 'home' }" class="nav-category"
                    :class="{ 'nav-active': route.path == '/msi' }">MSI</router-link>
                <router-link :to="{ name: 'home' }" class="nav-category "
                    :class="{ 'nav-active': route.path == '/hp' }">Hp</router-link>
                <router-link :to="{ name: 'home' }" class="nav-category"
                    :class="{ 'nav-active': route.path == '/acer' }">Acer</router-link>
                <router-link :to="{ name: 'home' }" class="nav-category"
                    :class="{ 'nav-active': route.path == '/dell' }">Dell</router-link>
                <router-link :to="{ name: 'home' }" class="nav-category"
                    :class="{ 'nav-active': route.path == '/lg' }">LG</router-link>
                <router-link :to="{ name: 'home' }" class="nav-category"
                    :class="{ 'nav-active': route.path == '/huawei' }">Huawei</router-link>
            </nav>
        </div>
    </div>
</template>
<script setup>
import { isRef, onMounted, ref } from "vue";
import { useRoute, useRouter } from "vue-router"
const route = useRoute()
const nav=ref(null)
var isScroll=false
onMounted(()=>{
    nav.value.addEventListener("mousedown",function(e){
        isScroll=true
    })
    nav.value.addEventListener("mousemove",function(e){
        if(isScroll==true){
            nav.value.scrollLeft-=e.movementX
        }
    })
    document.addEventListener("mouseup",function(e){
        isScroll=false
    })
    
})
</script>
<style scoped lang="scss">
$color_red: rgb(213, 13, 30);
$color_nav: #fca5a5;

.wrapper {
    background-color: $color_nav;
}

.nav-category {
    color: white;
    font-size: 17px;
    font-weight: 500;
    white-space: nowrap;
    text-decoration: none;
    display: inline-block;
    padding: 7px 20px;
    margin: 0px 20px;
    -webkit-user-drag: none;
    user-select: none;
    -webkit-user-select: none;
    
    
}
.wrapper-category{
    display: flex;
    align-items: center;
    padding: 5px 0px;
    overflow-x: scroll;
    flex-wrap: nowrap;

    
}
.wrapper-category::-webkit-scrollbar{
    display: none;
}
.nav-active {
    background-color: $color_red;
    border-radius: 20px;
}</style>