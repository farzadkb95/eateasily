<script setup>
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import { useRoute, useRouter } from "vue-router";
import { getQuestions, nextPageName } from "../../modules/config";
import { useTestStore } from "../../store/TestStore";

const questions = getQuestions();
const route = useRoute();
const router = useRouter();
const testStore = useTestStore();

function operation(index) {
  axios
    .post(`/api/weight-less/set-other`, {
      value: index,
      step: route.name,
    })
    .then(function (response) {})
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
      <QuestionBox class="mb-10"
        ><p>{{ questions[$route.name]?.question }}</p></QuestionBox
      >

      <div class="flex gap-5">
        <div
          class="p-5 border-2 border-zinc-200 bg-zinc-50 rounded-3xl flex items-center shrink-0 w-1/2 cursor-pointer"
          :class="{
            '!bg-green-50 !border-green-400':
              testStore.test?.other?.[route.name] == 1,
          }"
          @click="operation(1)"
        >
          <img
            src="@/assets/food-p27-2.png"
            :alt="questions[$route.name]?.options?.[1]"
          />
        </div>
        <div
          class="p-6 border-2 border-zinc-200 bg-zinc-50 rounded-3xl flex items-center shrink-0 w-1/2 cursor-pointer"
          :class="{
            '!bg-green-50 !border-green-400':
              testStore.test?.other?.[route.name] == 2,
          }"
          @click="operation(2)"
        >
          <img
            src="@/assets/food-p27-1.png"
            :alt="questions[$route.name]?.options?.[2]"
          />
        </div>
      </div>
    </div>
  </Base>
</template>
