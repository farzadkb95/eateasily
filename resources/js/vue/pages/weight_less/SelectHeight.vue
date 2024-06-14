<script setup>
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
const height = ref(null);
const testStore = useTestStore();

watchEffect(() => {
  height.value = testStore.test?.height;
});

function operation() {
  axios
    .post(`/api/weight-less/select-height`, {
      height: height.value,
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
      <QuestionBox><p>قد خودت رو وارد کن!</p></QuestionBox>

      <form @submit.prevent="operation">
        <Input placeholder="cm (سانتی متر)" v-model="height" type="number" />

        <Btn
          class="w-full mt-6 !rounded-xl !h-14"
          type="submit"
          :disabled="!height"
          >ثبت</Btn
        >
      </form>
    </div>
  </Base>
</template>
