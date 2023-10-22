<template>
    <div class="wrapper">
        <h1 class="h3">Quản lý tin tức</h1>
        <div class="d-flex justify-content-between align-items-center mt-4">
            <form action="" method="get" class="form d-flex">
                <div class="me-2">
                    <select class="form-select form-select-md" name="" id="">
                        <option selected disabled>Sắp xếp</option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                </div>
                <div class="me-3">
                    <input type="text" name="product_search" id="product_search" class="form-control" placeholder="Tìm tin tức"
                        aria-describedby="helpId">
                </div>
                <div>
                    <input type="submit" value="OK" class="form-control btn btn-primary">
                </div>
            </form>
            <router-link :to="{name:'admin_product_add'}" tag="button" class="btn btn-success ">Thêm tin tức</router-link>
        </div>
        <div class="wrapper-new mt-3">
            <div class="table-responsive">
                <table class="table table-primary">
                    <thead>
                        <th>STT</th>
                        <th>Tiêu đề</th>
                        <th>Nội dung</th>
                        <th>Hình ảnh</th>
                    </thead>
                    <tbody>
                        <tr></tr>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
    
</template>
<style scoped lang="scss">
.wrapper {
    background-color: #F1EFEF;
    height: 100%;
    width: 100%;
    padding: 20px;
}
</style>
