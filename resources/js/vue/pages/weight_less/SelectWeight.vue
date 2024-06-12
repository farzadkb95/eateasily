<script setup>
import InfoBox from "../../components/InfoBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import Btn from "../../components/Btn.vue";
import Input from "../../components/Input.vue";
import { useRoute, useRouter } from "vue-router";
import { nextPageName } from "../../modules/config";
import { ref, watchEffect } from "vue";
import { useTestStore } from "../../store/TestStore";

const route = useRoute();
const router = useRouter();
const weight = ref(null);
const testStore = useTestStore();

watchEffect(() => {
  weight.value = testStore.test?.weight;
});

function operation() {
  axios
    .post(`/api/weight-less/select-weight`, {
      weight: weight.value,
      step: route.name,
    })
    .then(function (response) {
      console.log(response.data);
    })
    .catch(function (error) {
      console.log(error.message);
    })
    .finally(function () {});

  router.push({ name: nextPageName(route.name) });
}
</script>

<template>
  <Base>
    <div class="c-box">
      <QuestionBox><p>وزنت چقدره؟</p></QuestionBox>

      <Input placeholder="kg (کیلو گرم)" v-model="weight" type="number" />

      <Btn class="w-full mt-6 !rounded-xl !h-14" @click="operation">ثبت</Btn>
    </div>
  </Base>
</template>
