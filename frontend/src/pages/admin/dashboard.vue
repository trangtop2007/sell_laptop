<template>
    <div class="wrapper">
        <div class="wrapper-slider d-lg-block d-none">
            <Slider></Slider>
        </div>
        <div class="wrapper-header-main d-flex flex-column">
            <HeaderDashboard></HeaderDashboard>
            <Main></Main>
        </div>
    </div>
    
</template>
<script setup>
import HeaderDashboard from '../../components/dashboard/HeaderDashboard.vue';
import Main from '../../components/dashboard/Main.vue';
import Slider from '../../components/dashboard/Slider.vue';
</script>
<style scoped lang="scss">
.wrapper{
    display: flex;
  @media  screen and (min-width: 992px) {
    &-slider{
      display: block !important;
      width: 288px !important;
    }
    &-header-main{
      width: calc(100% - 288px) !important;
    }
  }
  &-header-main{
    width: 100%;
  }
  
  
}
</style>