<script setup>
import user from "@/modules/user";
import axios from "axios";
import { onMounted, watchEffect } from "vue";
import { useTestStore } from "./store/TestStore";
import { useRoute, useRouter } from "vue-router";

const testStore = useTestStore();
const route = useRoute();
const router = useRouter();

router.beforeEach((to, from, next) => {
  if (from.query.test_id && !to.query.test_id) {
    next({ name: to.name, query: { test_id: from.query.test_id } });
  } else {
    next();
  }
});

onMounted(async () => {
  await router.isReady();
  await user.initial();
  const pathPart = route.path.split("/");
  console.log("rrrr", pathPart);
  if (pathPart[1] == "weight-less" && useTestStore.test == undefined) {
    axios
      .get(`/api/get-latest-test`)
      .then(function (response) {
        console.log(response.data);
      })
      .catch(function (error) {
        console.log(error.message);
      })
      .finally(function () {});
  }
});
axios.interceptors.request.use(
  function (config) {
    // Do something before request is sent
    if (route.query.test_id) {
      config.params = { ...config.params, test_id: route.query.test_id };
    }
    return config;
  },
  function (error) {
    // Do something with request error
    return Promise.reject(error);
  }
);
axios.interceptors.response.use(
  function (response) {
    if (response.data.latest_test) {
      testStore.test = response.data.latest_test;
    }

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
    console.log(error.response.data);

    return Promise.reject(error);
  }
);
</script>

<template>
  <div>
    <router-view></router-view>
  </div>
</template>
