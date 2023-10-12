<template>
    <div class="wrapper-ram">
        <div class="parent-ram">
            <button>4GB</button>
            <button>8GB</button>
            <button>12GB</button>
            <button>16GB</button>
            <button>32GB</button>
            <button>64GB</button>
            <button>32GB</button>
        </div>
        <div class="footer-ram">
            <button class="btn">Đóng</button>
            <button class="btn">Xem kết quả</button>
        </div>
    </div>
</template>
<script setup>
import { onMounted } from 'vue';

onMounted(() => {
    var btn = document.querySelectorAll(".parent-ram button")
    btn.forEach(element => {
        element.addEventListener("click", function (e) {
            element.classList.toggle("btn-ram-active")

        })
    });

})
</script>
<style scoped lang="scss">

.footer-ram {
    margin-top: 10px;
    display: flex;
    justify-content: space-between;
    button:nth-child(1){
        background-color: #feecf0;
        color: #cc0f35;
        font-size:16px;
        width: calc(50% - 5px);
        font-weight: 500;
    }
    button:nth-child(1):hover{
        background-color: #fdd6df;
    }
    button:nth-child(2){
        background-color: #d70018;
        color: #fff;
        font-size: 16px;
        width: calc(50% - 5px);
        font-weight: 500;
    }
    
    
}

.wrapper-ram {
    z-index: 1000;
    position: absolute;
    background-color: white;
    box-shadow: 0 0 8px 1px rgb(0, 0, 0, 0.2);
    width: 350px;
    padding: 20px;
    border-radius: 8px;

}

.btn-ram-active{
    background: #fef2f2 !important;
    border: 2px solid #d70018 !important;
    color: #d70018 !important;
}

.parent-ram>button {
    background: #f3f4f6;
    border: 1px solid #e5e7eb;
    border-radius: 10px;
    color: #444;
    cursor: pointer;
    font-size: 12px;
    height: 34px;
    margin: 0 10px 15px 0;
    padding: 5px 10px;
    font-size: 16px;
    white-space: nowrap;
}
</style>