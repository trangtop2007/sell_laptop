<template>
    <div class="container-fluid mt-4">
        <div class="container">
            <div class="wrapper">
                <h1 class="h4">Chọn theo tiêu chí</h1>
                <div class="wrapper-filter" ref="wrapper_filter">
                    <div>
                        <button class="btn-filter"><font-awesome-icon class="icon" :icon="['fas', 'filter']" /> Bộ
                            lọc</button>
                    </div>
                    <div>
                        <button class="btn-filter"><font-awesome-icon class="icon" :icon="['fas', 'truck-fast']" /> Sẵn
                            sàng</button>

                    </div>
                    <div>
                        <button class="btn-filter"><font-awesome-icon class="icon" :icon="['fas', 'money-bill']" />
                            Giá</button>
                    </div>
                    <div>
                        <button @click="show_filter.driver = true" class="btn-filter">
                            <font-awesome-icon class="icon" :icon="['fas', 'hard-drive']" /> <span>Ổ cứng</span>
                        </button>
                        <DriverHardfilter v-show="show_filter.driver"></DriverHardfilter>
                    </div>
                    <div>
                        <button class="btn-filter" @click="show_filter.ram=true">Dung lượng RAM</button>
                        <CapacityRamFilter v-show="show_filter.ram"></CapacityRamFilter>
                    </div>
                    <div>
                        <button class="btn-filter"><font-awesome-icon class="icon" :icon="['fas', 'server']" /> CPU</button>
                    </div>
                    <div>
                        <button class="btn-filter"><font-awesome-icon class="icon" :icon="['fas', 'laptop']" /> Kích thước
                            màn hình</button>
                    </div>
                    <div>
                        <button class="btn-filter">Độ phân giải</button>
                    </div>
                    <div>
                        <button class="btn-filter">Card đồ họa</button>
                    </div>
                    <div>
                        <button class="btn-filter">Tính năng đặc biệt</button>
                    </div>
                    <div>
                        <button class="btn-filter">Hãng sản suất</button>

                    </div>
                </div>

            </div>
            <h1 class="h4 mt-4">Sắp xếp theo</h1>
            <div class="wrapper-sorted">
                <button>Giá Cao - Thấp</button>
                <button>Giá Thấp - Cao</button>
                <button>Xem nhiều nhất</button>
            </div>
        </div>
        <div class="modal__filter" v-show="show_filter.driver||show_filter.ram" @click.self="inactive_filter"></div>
    </div>
</template>
<script setup>
import { onMounted, reactive, ref } from 'vue';
import DriverHardfilter from './filter_product/DriverHardfilter.vue';
import CapacityRamFilter from './filter_product/CapacityRamFilter.vue';
const show_filter = reactive({
    driver: false,
    ram:false
})
const wrapper_filter=ref(null)
onMounted(()=>{
    var btn_filter=document.querySelectorAll(".btn-filter")
    btn_filter.forEach(element => {
        element.addEventListener("click",function(){
            element.classList.add("btn-filter-active")

        })
    });
    var scroll_active=false

    wrapper_filter.value.addEventListener("mousedown",function(){
        scroll_active=true
    })
    wrapper_filter.value.addEventListener("mouseup",function(){
        scroll_active=false
    })
    wrapper_filter.value.addEventListener("mousemove",(e)=>{
        if(scroll_active==true) 
        {
            wrapper_filter.value.scrollLeft-=e.movementX
        }
    })


})
function inactive_filter(){
    show_filter.driver=false
    show_filter.ram=false
    var btn_filter_active=document.querySelectorAll(".btn-filter-active")
    btn_filter_active.forEach(element => {
        element.classList.remove("btn-filter-active")
    });
}
</script>

<style scoped lang="scss">
.wrapper-filter{
    display: flex;
    overflow-x: scroll;
}
.btn-filter,.wrapper-sorted button {
    background: #f3f4f6;
    border: 1px solid #e5e7eb;
    border-radius: 10px;
    color: #444;
    cursor: pointer;
    font-size: 12px;
    height: 34px;
    margin: 0 10px 10px 0;
    padding: 5px 10px;
    font-size: 16px;
    white-space: nowrap;
    -webkit-user-select: none;
    user-select: none;
}

.icon {
    margin-right: 5px;
}

.btn-filter-active {
    background: #fef2f2;
    border: 1px solid #d70018;
    color: #d70018;
}
.modal__filter {
    height: 100vh;
    position: fixed;
    width: 100%;
    left: 0;
    top: 0;
    background-color: rgba(255, 255, 255, 0.1);
    z-index: 999;

}</style>