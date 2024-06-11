<script setup>
import user from "@/modules/user";
import axios from "axios";
import { onMounted } from "vue";

onMounted(async () => {
  await user.initial();
});
axios.interceptors.response.use(
  function (response) {
    if (response.data.gid) {
      localStorage.setItem("gid", response.data.gid);
      axios.defaults.headers["gid"] = response.data.gid;
      if (localStorage.getItem("token") && response.data.user == null) {
        localStorage.removeItem("token");
        axios.defaults.headers["Authorization"] = null;
      }
    }

    return response;
  },
  function (error) {
    if (error.response.status >= 500) {
      notify({
        type: "error",
        text: "خطای سرور",
      });
    } else if (error.response.status >= 400) {
      notify({
        type: "error",
        text: error.response.data.message,
      });
    }

    return Promise.reject(error);
  }
);
</script>

<template>
  <div>
    <router-view></router-view>
  </div>
</template>
