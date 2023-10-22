<template>
    <div class="layout">
        <Header @search="update"></Header>
        <Category></Category>
        <SlideAds></SlideAds>
        <FilterProduct></FilterProduct>
        <Suspense>
            <template #default>
                <ShowProduct v-if="showProduct"></ShowProduct>
            </template>
            <template #fallback>
                <LazyLoadingProduct></LazyLoadingProduct>
            </template>
        </Suspense>
        <Chat></Chat>
        <New></New>
        <Footer></Footer>
        <Transition name="scrollTo" duration="500">
            <ScrollTop v-if="showScroll"></ScrollTop>
        </Transition>
    </div>
</template>
<script setup>
import LazyLoadingProduct from "../components/LazyLoadingProduct.vue";
import ScrollTop from "../components/ScrollTop.vue";
import Chat from "../components/Chat.vue";
import Footer from "../components/Footer.vue";
import Header from '../components/Header.vue';
import Category from '../components/Category.vue';
import SlideAds from '../components/SlideAds.vue';
import FilterProduct from "../components/FilterProduct.vue"
import ShowProduct from '../components/ShowProduct.vue';
import New from "../components/New.vue";
import { ref, nextTick  } from 'vue';

const showProduct = ref(true)
const showScroll = ref(false)
function update() {
    showProduct.value = false
    nextTick(() => {
        showProduct.value = true
    })
}
document.addEventListener("scroll", () => {
    showScroll.value = window.scrollY > 200 ? true : false
})
</script>
<style scoped lang="scss">
.scrollTo-enter-from,
.scrollTo-leave-to {
    opacity: 0;
}

.scrollTo-enter-to,
.scrollTo-leave-from {
    opacity: 1;
}

.scrollTo-enter-active,
.scrollTo-leave-active {
    transition: all 0.5s ease;
}</style>
