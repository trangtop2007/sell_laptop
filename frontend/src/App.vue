<template>
  Type a number: <input v-model.number="number" />
  <p>{{ tweened.number.toFixed(0) }}</p>
</template>
<script setup>
import { ref, reactive, watch } from 'vue'
import gsap from 'gsap'

const number = ref(0)
const tweened = reactive({
  number: 0
})

watch(number, (n) => {
  gsap.to(tweened, { duration: 0.5, number: Number(n) || 0 })
})</script>
<!-- <template>
  <div>
    <button @click="login">Login Using Google</button>
    <div v-if="userDetails">
      <h2>User Details</h2>
      <p>Name: {{ userDetails.name }}</p>
      <p>Email: {{ userDetails.email }}</p>
      <p>Profile Picture: <img :src="userDetails.picture" alt="Profile Picture"></p>
    </div>
  </div>
</template>

<script>
import { googleSdkLoaded } from "vue3-google-login";
import axios from "axios";

export default {
  data() {
    return {
      userDetails: null
    };
  },
  name: "YourComponent",
  methods: {
    login() {
      googleSdkLoaded(google => {
        google.accounts.oauth2
          .initCodeClient({
            client_id:
              import.meta.env.VITE_CLIENT_ID,
            scope: "email profile openid",
            callback: response => {
              if (response.code) {
                this.sendCodeToBackend(response.code);
              }
            }
          })
          .requestCode();
      });
    },
    async sendCodeToBackend(code) {
      try {
        const response = await axios.post(
          "https://oauth2.googleapis.com/token",
          {
            code, 
            client_id:
              import.meta.env.VITE_CLIENT_ID,
            client_secret: import.meta.env.VITE_SECRET_ID,
            redirect_uri: "postmessage",
            grant_type: "authorization_code"
          }
        );

        const accessToken = response.data.access_token;
        console.log(accessToken);

        // Fetch user details using the access token
        const userResponse = await axios.get(
          "https://www.googleapis.com/oauth2/v3/userinfo",
          {
            headers: {
              Authorization: `Bearer ${accessToken}`
            }
          }
        );

        if (userResponse && userResponse.data) {
          // Set the userDetails data property to the userResponse object
          this.userDetails = userResponse.data;
          console.log(userResponse.data);
        } else {
          // Handle the case where userResponse or userResponse.data is undefined
          console.error("Failed to fetch user details.");
        }
      } catch (error) {
        console.error("Token exchange failed:", error.response.data);
      }
    }
  }
};
</script> -->