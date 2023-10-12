<template>
    <div class="wrapper">
        <router-view name="admin_main" @notification="show_notification"></router-view>
        <div class="toast show" id="toast" v-if="isNotification" style="position: absolute; bottom: 25px; right: 25px;">
            <div class="toast-header d-flex justify-content-between">
                <div>
                    <span class="me-2"><font-awesome-icon :icon="['fas', 'bell']" size="xl" style="color: #245ec2;" /></span>
                    <strong>Thông báo</strong>
                </div>
               
                <span type="button" class="ml-2 mb-1 btn-close" data-dismiss="toast" aria-label="Close">
                </span>
            </div>
            <div class="toast-body">
                <p>{{ notification }}</p>
            </div>
        </div>
    </div>
</template>
<script setup>
import { ref } from 'vue';

const notification=ref("")
const isNotification=ref(false)
function show_notification(data) {
    console.log(data);
    notification.value=data
    isNotification.value=true
}
</script>
<style scoped lang="scss">
.wrapper {
    height: calc(100vh - 60px);
    overflow-y: scroll;
}
</style>