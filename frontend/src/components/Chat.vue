<template>
    <div class="container-fluid my-5">
        <div class="container">
            <div class="wrapper">
                <h1 class="h4">Hỏi và đáp</h1>
                <form @submit.prevent="chat">
                    <div class="mb-3 ">
                        <div class="input-group my-3">
                            <div class="input-group-text d-flex flex-column justify-content-start">
                                <img src="../assets/img/chibi2.webp" alt="">
                            </div>
                            <textarea v-model="data_input.chat_content" :class="{ 'is-invalid': errors.chat_content }"
                                class="form-control wi-" name="" id="" rows="3"
                                placeholder="Xin mời để lại câu hỏi, Shop NPT sẽ trả lời lại trong 1h, các câu hỏi sau 22h - 8h sẽ được trả lời vào sáng hôm sau"></textarea>
                            <div class="invalid-feedback" v-if="errors.chat_content" v-text="errors.chat_content[0]"></div>
                        </div>
                        <div class="mb-3 d-flex justify-content-end align-items-center">
                            <button type="submit" class="btn btn-danger"><font-awesome-icon
                                    :icon="['fas', 'paper-plane']" /> Gửi</button>
                        </div>
                    </div>
                </form>
                <div class="wrapper-chat">
                    <div v-for="(chat,index) in data" :key="chat.id" class="mb-5">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="h6">
                                <span class="bg-danger text-white py-1 px-2 rounded-circle me-2">{{ chat.user.slice(0, 1) }} </span>
                            <span>{{ chat.user }}</span>
                            </div>
                            
                            <span> <font-awesome-icon :icon="['fas', 'clock']" /> {{ analytic(chat.created_at) }} trước </span>
                        </div>
                        <div class="chat_content">
                            <p>{{ chat.chat_content }}</p>
                            <div @click="list_reply[index]=!list_reply[index]" class="text-danger  align-self-end h6 cursor" style="cursor:pointer"><font-awesome-icon
                                    :icon="['fas', 'message']" /> Trả lời</div>
                        </div>
                        
                        <div v-if="list_reply[index]">
                            <form @submit.prevent="chat">
                                <div class="mb-3 ">
                                    <div class="input-group my-3">
                                        <div class="input-group-text d-flex flex-column justify-content-start">
                                            <img src="../assets/img/chibi2.webp" alt="">
                                        </div>
                                        <textarea v-model="data_input.chat_content" :class="{ 'is-invalid': errors.chat_content }"
                                            class="form-control wi-" name="" id="" rows="3" autofocus></textarea>
                                        <div class="invalid-feedback" v-if="errors.chat_content" v-text="errors.chat_content[0]"></div>
                                    </div>
                                    <div class="mb-3 d-flex justify-content-end align-items-center">
                                        <button type="submit" class="btn btn-danger"><font-awesome-icon
                                                :icon="['fas', 'paper-plane']" /> Gửi</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { onMounted, reactive, ref } from 'vue';
import ax from '../axios';
const list_reply=reactive([])
const user = ref({})
const data = ref({})
async function getUser() {
    try {
        const response = await ax.get("user", { headers: { Authorization: `Bearer ${window.localStorage.getItem("token")}` } })
        user.value = response.data
    } catch (error) {
        console.error(error);
    }
}

async function getData() {
    try {
        const response = await ax.get("chat")
        data.value = response.data
        for(let i=0;i<data.value.length;i++){
            list_reply[i]=false
        }
       
    } catch (err) {
        console.log(err);
    }
}

const data_input = reactive({
    chat_content: ""
})
const errors = reactive({
    chat_content: ""
})
function analytic(isoTime){
    var t=new Date(isoTime)
    var current_t=new Date()
    var iso=current_t-t
    if(iso>(1000*60*60*24)){
        return Math.floor(iso/(1000*60*60*24))+" ngày"
    }else{
        if(iso>1000*60*60){
            return Math.floor(iso/(1000*60*60))+" giờ"
        }
        else{
            if(iso>1000*60){
                return Math.floor(iso/(1000*60))+" phút"
            }
            else{
                return Math.floor(iso/(1000))+" giây"
            }
        }
    }
}
onMounted(() => {
    getUser(),
    getData()

})
async function chat() {
    try {
        data_input["user_id"] = user.value.id
        const response = await ax.post("chat", data_input);
        getData()
        errors.chat_content = ""
        data_input.chat_content = ""

    } catch (error) {
        errors.chat_content = error.response.data.chat_content
    }
}
</script>
<style scoped lang="scss">
.wrapper {
    box-shadow: 0 0 8px 1px rgba($color: #000000, $alpha: 0.2);
    border-radius: 8px;
    padding: 10px;

    .chat_content {
        box-shadow: 0 0 8px 0px rgba($color: #000000, $alpha: 0.2);
        padding: 10px 12px;
        margin-left: 30px;
        border-radius: 15px;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
    }

}
</style>