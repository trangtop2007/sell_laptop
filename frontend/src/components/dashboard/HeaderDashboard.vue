<template>
    <header  class="d-flex justify-content-between align-items-center">
        <form action="" method="get">
            <div class="input-group">
                <span class="input-group-text icon-search">
                    <font-awesome-icon :icon="['fas', 'magnifying-glass']" />
                </span>
                <input type="text" name="" id="search" placeholder="Tìm kiếm..." class="form-control">
            </div>
        </form>
        <div>
            <router-link :to="{name:'home'}" class="me-3"><font-awesome-icon class="icon" :icon="['fas', 'bell']" /></router-link>
            <span class="me-3"><font-awesome-icon class="icon" :icon="['fas', 'user']" /></span>
        </div>
    </header>

</template>
<style scoped lang="scss">
header{
    background-color:rgb(46, 50, 72) ;
    height: 60px;
    padding: 20px;
}
.icon{
    color:white;
    font-size: 25px;
}
#search{
    background-color: transparent;
    color: white;
    font-size: 18px;
    border: none;

}
#search::placeholder{
    color: white;
}
.icon-search{
    background-color: transparent;
    color: white;
    border: none;
}
</style>