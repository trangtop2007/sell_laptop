<template >
    <button @click="scrollTo"><font-awesome-icon :icon="['fas', 'angle-up']" /></button>
</template>
<script setup>

function scrollTo(){
    window.scrollTo({
        top:0,
        behavior:"smooth"
    })
}
</script>
<style scoped lang="scss">
button{
    position: fixed;
    right: 20px;
    z-index: 999999;
    bottom: 90px;
    border:none;
    outline: none;
    background-color:  rgb(213, 13, 30) ;
    color: white;
    font-size: 25px;
    height: 50px;
    width: 50px;
    border-radius: 50%;

}
</style>