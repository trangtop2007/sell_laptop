<template>
    <div class="wrapper">
        <HeaderAccount :brand="brand"></HeaderAccount>
        <main>
            <div class="container d-flex justify-content-lg-end justify-content-center">
                <form action="" method="post" class="form form-register mt-4" @submit.prevent="register">
                    <div class="mb-3">
                        <h1 class="text-center h2">Đăng ký</h1>
                    </div>
                    <div class="wrapper-input row row-cols-2">
                        <div class="mb-3 col">
                            <label for="fullname" class="form-label">Họ và tên</label>
                            <input type="text" name="fullname" id="fullname" class="form-control"
                                placeholder="Nhập họ và tên" :class="{'is-invalid':errors.fullname}" aria-describedby="helpId" v-model="data.fullname">
                            <div class="invalid-feedback" v-if="errors.fullname" >
                                {{errors.fullname[0]}}
                            </div>
                            
                        </div>
                        
                        <div class="mb-3 col">
                            <label for="username" class="form-label">Tên đăng nhập</label>
                            <input type="text" name="username" id="username" class="form-control"
                                placeholder="Nhập tên đăng nhập hoặc email" :class="{'is-invalid':errors.username}" aria-describedby="helpId" v-model="data.username">
                            <div class="invalid-feedback" v-if="errors.username" >
                                {{errors.username[0]}}
                            </div>
                        </div>
                        <div class="mb-3 col">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Nhập mật khẩu" :class="{'is-invalid':errors.password}" aria-describedby="helpId" v-model="data.password">
                            <div class="invalid-feedback" v-if="errors.password" >
                                {{errors.password[0]}}
                            </div>
                        </div>
                        <div class="mb-3 col">
                            <label for="password_confirmation" class="form-label">Xác nhận mật khẩu</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control" placeholder="Xác nhận mật khẩu" :class="{'is-invalid':errors.password_confirmation}" aria-describedby="helpId" v-model="data.password_confirmation">
                            <div class="invalid-feedback" v-if="errors.password_confirmation" >
                                {{errors.password_confirmation[0]}}
                            </div>
                        </div>

                        <div class="mb-3 col">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Nhập số điện thoại" v-model="data.phone"
                                :class="{'is-invalid':errors.phone}" aria-describedby="helpId">
                            <div class="invalid-feedback" v-if="errors.phone" >
                                {{errors.phone[0]}}
                            </div>
                        </div>
                        <div class="mb-3 col">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Nhập địa chỉ" v-model="data.address"
                                :class="{'is-invalid':errors.address}" aria-describedby="helpId">
                            <div class="invalid-feedback" v-if="errors.address" >
                                {{errors.address[0]}}
                            </div>
                        </div>
                    </div>
                    <div class="form-check mb-3 form-switch ">
                      <input class="form-check-input" type="checkbox" id="accept_policy" v-model="data.check_policy" :class="{'is-invalid':errors.check_policy}">
                      <label class="form-check-label" for="accept_policy">
                        Chấp nhận với <router-link :to="{name:'home'}" class="text-decoration-none text-primary">chính sách</router-link> của Shop NPT 
                      </label>
                    </div>
                   
                    <div class="mb-3">
                        <input type="submit" value="Đăng ký" class="form-control">
                    </div>
                </form>
            </div>
        </main>
    </div>
</template>
<script setup>
import {  reactive, ref, watch } from 'vue';
import HeaderAccount from '../components/HeaderAccount.vue';
const brand = ref("Đăng ký")
import ax from "../axios.js"
import {useRouter} from "vue-router"
const router=useRouter()
const data=reactive({
    fullname:"",
    username:"",
    password:"",
    password_confirmation:"",
    address:"",
    phone:"",
    check_policy:""
})
const errors=reactive({
    fullname:"",
    username:"",
    password:"",
    password_confirmation:"",
    address:"",
    phone:"",
    check_policy:false

})
watch(data.check_policy,function(new_,old){
    console.log(new_,old);
})
async function register(){
    try{
        const response=await ax.post("/register",data)
        router.push({name:"login"})
        console.log(response.data);

    }
    catch(error){
        errors.fullname=error.response.data.fullname
        errors.username=error.response.data.username
        errors.password=error.response.data.password
        errors.password_confirmation=error.response.data.password_confirmation
        errors.address=error.response.data.address
        errors.phone=error.response.data.phone
        errors.check_policy=error.response.data.check_policy
        console.log(errors);

       
    }
}


</script>
<style scoped lang="scss">
.wrapper {
    height: 100vh;
    background: url(../assets//img//pexels-antonio-borriello-1297611.jpg) no-repeat center/cover;
    backdrop-filter: blur(2px);

}

.form-register {
    width: 700px;
    padding: 30px;
    background-color: white;
    border-radius: 10px;
}

</style>