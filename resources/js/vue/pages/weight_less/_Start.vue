<script setup>
import { useRouter } from "vue-router";
import axios from "axios";
import { ref } from "vue";
import Btn from "../../components/Btn.vue";
import { getPages } from "../../modules/config";

const pages = getPages();
const router = useRouter();
const guest = ref(null);

function getRunningTest() {
  axios
    .get(`/api/get-latest-test`)
    .then(function (response) {
      guest.value = response.data.guest;
      if (response.data?.guest?.latest_test?.status != "in_process") {
        newTest();
      }
    })
    .catch(function (error) {
      console.log(error.message);
    })
    .finally(function () {});
}
getRunningTest();

function newTest() {
  axios
    .post(`/api/new-test`)
    .then(function (response) {
      router.replace({ name: pages[0][0] });
    })
    .catch(function (error) {
      console.log(error.message);
    })
    .finally(function () {});
}

function continueTest() {
  router.replace({ name: guest.value.latest_test?.step || pages[0][0] });
}
</script>

<template>
  <div class="min-h-screen flex items-center justify-center">
    <div class="w-96">
      <p v-if="guest === null">در حال بررسی</p>
      <div
        v-else-if="guest.latest_test?.status == 'in_process'"
        class="flex flex-col gap-4"
      >
        <Btn class="w-full" @click="continueTest">ادامه تست قبلی</Btn>
        <Btn class="w-full" @click="newTest">شروع تست جدید</Btn>
      </div>
    </div>
  </div>
</template>
