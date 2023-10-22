<template>
    <div class="wrapper">
        <p class="wrapper-title">Hồ sơ của tôi</p>
        <p class="wrapper-description">Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
        <hr>
        <form action="" class="row">
            <div class="col-8">
                <div class="mb-3">
                    <label for="fullname" class="form-label">Họ và tên</label>
                    <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Nhập họ và tên"
                        aria-describedby="helpId">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Nhập số điện thoại"
                        aria-describedby="helpId">
                </div>
                <div class="mb-3">
                    <label for="address">Địa chỉ</label>
                    <textarea name="address" id="address" cols="30" class="form-control"
                        placeholder="Nhập địa chỉ"></textarea>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label me-3">Giới tính</label>


                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sex" id="male">
                        <label class="form-check-label" for="male">
                            Nam
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sex" id="female">
                        <label class="form-check-label" for="female">
                            Nữ
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="">Ngày sinh</label>
                    <div class="d-flex justify-content-between align-items-center">
                        <select name="day" id="day" class="form-select">
                            <option v-for="day in days" :key="day">
                                Ngày {{ day }}
                            </option>
                        </select>
                        <select name="month" id="month" class="form-select">
                            <option v-for="month in months" :key="month">
                                Tháng {{ month }}
                            </option>
                        </select>
                        <select name="year" id="year" class="form-select">
                            <option v-for="year in years" :key="year">
                                Năm {{ year }}
                            </option>
                        </select>
                    </div>

                </div>
                <div class="my-4 d-flex justify-content-end">
                    <input type="submit" value="Lưu" class="btn btn-primary btn-xxl">
                </div>
            </div>
            <div class="col-4 mt-5 d-flex justify-content-center ">
                <div class="wrapper-image">
                    <img :src="urlImage" alt="" class="rounded-circle mb-4" height="110" width="110">
                    <label for="image" class="btn btn-outline-dark mb-3">Chọn ảnh</label>
                    <input type="file" name="image" id="image" class="d-none" @change="createImage($event)">
                    <p>Dụng lượng file tối đa 2 MB
                        Định dạng:.JPEG, .PNG</p>
                </div>
            </div>
        </form>
    </div>
</template>
<script setup>
import { ref,onMounted } from 'vue';
onMounted(()=>{
    getUser()
})
const dataUser=ref({})
async function getUser(){
    try{
        const response=await ax.get("user",{headers:{Authorization:`Bearer ${window.localStorage.getItem("token")}`}})
        dataUser.value=response.data
    }catch(err){
        console.error(err);
    }
}
const days = []
const months = []
const years = []
const urlImage=ref("/src/assets/img/user.png")
for (let i = 1960; i <= 2023; i++) {
    years.push(i)
}
for (let i = 1; i <= 31; i++) {
    if (i <= 12) {
        months.push(i)
    }
    days.push(i)
}
function createImage(e){
    urlImage.value=URL.createObjectURL(e.target.files[0])

}
</script>
<style scoped lang="scss">
.wrapper {
    &-title {
        font-size: 23px;
        margin: 0;
    }

    &-description {
        color: rgb(78, 78, 78);
        font-size: 16px;
    }

    hr {
        opacity: 0.1;
    }
    .wrapper-image{
        display: flex;
        flex-direction: column ;
        align-items: center;
        width:200px;
        img{
            object-fit: cover;
        }
    }
}
</style>