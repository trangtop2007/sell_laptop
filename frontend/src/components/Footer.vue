<template>
    <div class="container-fluid py-3 mt-5" style="background-color: rgb(228, 228, 228);">
        <div class="container">
            <div class="row row-cols-xxl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 ">
                
                <ul class="nav mb-5 flex-column">
                    <li><router-link :to="{ name: 'home' }" class="nav-link">Giới thiệu về công ty</router-link></li>
                    <li><router-link :to="{ name: 'home' }" class="nav-link">Chính sách bảo mật</router-link></li>
                    <li><router-link :to="{ name: 'home' }" class="nav-link">Quy chế hoạt động</router-link></li>
                    <li><router-link :to="{ name: 'home' }" class="nav-link">Kiểm tra hóa đơn điện tử</router-link></li>
                    <li><router-link :to="{ name: 'home' }" class="nav-link">Tra cứu thông tin bảo hành</router-link></li>
                    <li><router-link :to="{ name: 'home' }" class="nav-link">Câu hỏi thường gặp mua hàng</router-link></li>
                </ul>
                <ul class="nav mb-5 flex-column">
                    
                    <li><router-link :to="{ name: 'home' }" class="nav-link">Tin tuyển dụng</router-link></li>
                    <li><router-link :to="{ name: 'home' }" class="nav-link">Tin khuyến mãi</router-link></li>
                    <li><router-link :to="{ name: 'home' }" class="nav-link">Hướng dẫn mua online</router-link></li>
                    <li><router-link :to="{ name: 'home' }" class="nav-link">Hướng dẫn mua trả góp</router-link></li>
                    <li><router-link :to="{ name: 'home' }" class="nav-link">Chính sách trả góp</router-link></li>
                    <li><router-link :to="{ name: 'home' }" class="nav-link">Chính sách thu thập và xử lý dữ liệu cá nhân</router-link></li>
                </ul>
                <ul class="nav mb-5 flex-column">
                    <li><router-link :to="{ name: 'home' }" class="nav-link">Hệ thống cửa hàng</router-link></li>
                    <li><router-link :to="{ name: 'home' }" class="nav-link">Chính sách đổi trả</router-link></li>
                    <li><router-link :to="{ name: 'home' }" class="nav-link">Hệ thống bảo hành</router-link></li>
                    <li><router-link :to="{ name: 'home' }" class="nav-link">Giới thiệu máy đổi trả</router-link></li>
                </ul>
                <ul class="nav mb-5 flex-column">
                    <li>
                        <p class="h6">Tư vấn mua hàng (Miễn phí)</p>
                        <router-link :to="{name:'home'}" class="nav-link" style="white-"><span class="text-danger h5 me-2">1800 6601</span><span class="h6 text-dark">(Nhánh 1)</span></router-link>
                    </li>
                    <li>
                        <p class="h6">Hỗ trợ kỹ thuật</p>
                        <router-link :to="{name:'home'}" class="nav-link"><span class="text-danger h5 me-2">1800 6602</span><span class="h6 text-dark">(Nhánh 2)</span></router-link>
                    </li>
                    <li>
                        <p class="h6">Góp ý, khiếu nại (8h00 - 22h00)</p>
                        <router-link :to="{name:'home'}" class="nav-link"><span class="text-danger h5 me-2">1800 6616</span><span class="h6 text-dark">(Nhánh 3)</span></router-link>
                    </li>
                </ul>
                <ul  style="list-style: none;">
                    <li>
                        <p class="h6">Kết nối với chúng tôi: <a href="http://fb.com" target="_blank"><img height="25" src="../assets//img/icon-facebook.png" alt=""></a> <a href=""><img src="../assets/img/icon-zalo.png" height="25" alt=""></a></p>
                    </li>
                </ul>
            </div>
            <p class="text-center">&copy; Copyright by Nguyễn Phong Tráng</p>
        </div>
    </div>
</template>
<style scoped lang="scss">

</style>
