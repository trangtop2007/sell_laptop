<template>
    <div id="wrapper">
        <HeaderAccount :brand="brand"></HeaderAccount>
        <main>
            <div class="container d-flex justify-content-lg-end justify-content-center">
                <form action="" method="post" class="form form-login mt-5" @submit.prevent="login">
                    <div class="mb-3">
                        <h1 class="text-center h2">Đăng nhập</h1>
                    </div>
                    <div class="mb-3 wrapper-username">
                        <label for="username" class="form-label">Tên đăng nhập</label>
                        <input type="text" name="username" id="username" class="form-control" autofocus
                            placeholder="Nhập tên đăng nhập hoặc Email" aria-describedby="helpId"
                            :class="{ 'is-invalid': errors.username }" v-model="data.username">
                        <div class="invalid-feedback" v-if="errors.username">
                            {{ errors.username[0] }}
                        </div>
                        <span class="icon"><font-awesome-icon :icon="['fas', 'user']" /></span>
                    </div>
                    <div class="mb-3 wrapper-password">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Nhập mật khẩu" aria-describedby="helpId" v-model="data.password"
                            :class="{ 'is-invalid': errors.password }">
                        <div class="invalid-feedback" v-if="errors.password">
                            {{ errors.password[0] }}
                        </div>
                        <span class="icon"><font-awesome-icon :icon="['fas', 'key']" /></span>
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" value="remember" id="remember"
                            v-model="data.rememberMe">
                        <label class="form-check-label" for="remember">
                            Nhớ tài khoản
                        </label>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Đăng nhập" class="form-control">
                    </div>
                    <div class="mb-3">
                        <p>Nếu bạn chưa có tài khoản hãy <router-link class="nav-link d-inline-block text-danger fw-bold"
                                :to="{ name: 'register' }">Đăng ký</router-link></p>
                    </div>

                </form>
            </div>
        </main>
    </div>
</template>
<script setup>
import { onMounted, reactive, ref } from "vue";
import { useRouter } from "vue-router";
import HeaderAccount from "../components/HeaderAccount.vue"
import ax from "../axios.js";
const brand = ref("Đăng nhập")
const router = useRouter()
const data = reactive({
    username: "",
    password: "",   
    rememberMe:false

})
const errors = reactive({
    username: "",
    password: "",
})
async function login() {
    console.log(data.rememberMe);
    try {
        const response = await ax.post("/login", data)
        if (response.data) {
            window.localStorage.setItem("token", response.data.token)
            router.push({ name: "home" })
        }   



    }
    catch (error) {
        errors.username = error.response.data.username
        errors.password = error.response.data.password
    }
}

</script>
<style scoped  lang="scss">
@media screen and (min-width: 576px) {
    #wrapper {
        height: 100vh;
        background: url(../assets//img//pexels-lisa-fotios-1006293.jpg) no-repeat center/cover;
        backdrop-filter: blur(10px);
    }
}

.wrapper-username,
.wrapper-password {
    position: relative;
}

#wrapper {
    height: 100vh;
}

#username,
#password {
    padding-left: 50px;
}

.form-login {
    width: 555.5555555px;
    padding: 30px;
    background-color: white;
    height: 500px;
    border-radius: 10px;
}

.icon {
    position: absolute;
    left: 25px;
    top: 39px;
    font-size: 20px;
    transform: translateX(-50%);
    color: rgb(185, 185, 185);
}

#username:focus~span,
#password:focus~span {
    color: gray;
}
</style>