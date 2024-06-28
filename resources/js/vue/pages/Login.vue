<script setup>
import Input from "../components/Input.vue";
import Btn from "../components/Btn.vue";
import { ref } from "vue";
import user from "../modules/user";

const email = ref(null);
const password = ref(null);

function login() {
  axios
    .post(`/api/login`, {
      email: email.value,
      password: password.value,
    })
    .then(function (response) {
      console.log(response.data);
      localStorage.setItem("token", response.data.token);
      axios.defaults.headers["Authorization"] =
        "Bearer " + localStorage.getItem("token");
      user.setUser(response.data.user);
      data.value = null;
      code.value = null;
      password.value = null;
    })
    .catch(function (error) {
      console.log(error.message);
    })
    .finally(function () {});
}
</script>

<template>
  <div class="h-screen flex items-center justify-center">
    <div class="w-96 p-5 rounded-md shadow-md">
      <form @submit.prevent="login">
        <Input v-model="email" dir="ltr" placeholder="email" />
        <Input
          v-model="password"
          dir="ltr"
          placeholder="password"
          type="password"
        />
        <Btn class="mt-5 w-full" type="submit">ورود</Btn>
      </form>
    </div>
  </div>
</template>
