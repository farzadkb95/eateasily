<script setup>
import InfoBox from "../../components/InfoBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import Btn from "../../components/Btn.vue";
import Input from "../../components/Input.vue";
import { useRoute, useRouter } from "vue-router";
import { getQuestions, nextPageName } from "../../modules/config";
import { ref, watchEffect } from "vue";
import { useTestStore } from "../../store/TestStore";
import { Icon } from "@iconify/vue";

const questions = getQuestions();
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
      <QuestionBox
        ><p>{{ questions[$route.name]?.question }}</p></QuestionBox
      >

      <form @submit.prevent="operation">
        <Input placeholder="kg (کیلو گرم)" v-model="weight" type="number">
          <template #start
            ><Icon icon="icon-park-outline:weight" class="w-6 h-full"
          /></template>
        </Input>

        <Btn
          class="w-full mt-6 !rounded-xl !h-14"
          type="submit"
          :disabled="!weight"
          >ثبت</Btn
        >
      </form>
    </div>
  </Base>
</template>
