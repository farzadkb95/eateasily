<script setup>
import InfoBox from "../../components/InfoBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import ItemBox from "../../components/ItemBox.vue";
import image1 from "@/assets/girl-p28-1.png";
import image2 from "@/assets/girl-p28-2.png";
import menImage1 from "@/assets/boy-q29-2.png";
import menImage2 from "@/assets/boy-q29-1.png";
import { useRoute, useRouter } from "vue-router";
import { nextPageName } from "../../modules/config";
import { useTestStore } from "../../store/TestStore";
import { questions } from "../../modules/config";

const route = useRoute();
const router = useRouter();
const testStore = useTestStore();

function operation(index) {
  axios
    .post(`/api/weight-less/set-other`, {
      value: index,
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
      <QuestionBox class="mb-10"
        ><p>{{ questions[$route.name]?.question }}</p></QuestionBox
      >

      <div class="flex gap-5">
        <div
          class="p-5 border-2 border-zinc-200 bg-zinc-50 rounded-3xl flex flex-col items-center shrink-0 w-1/2 cursor-pointer"
          :class="{
            '!bg-green-50 !border-green-400':
              testStore.test?.other?.[route.name] == 1,
          }"
          @click="operation(1)"
        >
          <div
            class="w-full aspect-square relative z-10 bg-contain bg-no-repeat bg-bottom"
            :style="{
              'background-image':
                'url(' +
                (testStore.test?.gender == 'male' ? menImage2 : image2) +
                ')',
            }"
          ></div>
          <div class="mt-5 text-lg">
            {{ questions[$route.name]?.options?.[1] }}
          </div>
        </div>
        <div
          class="p-6 border-2 border-zinc-200 bg-zinc-50 rounded-3xl flex flex-col items-center shrink-0 w-1/2 cursor-pointer"
          :class="{
            '!bg-green-50 !border-green-400':
              testStore.test?.other?.[route.name] == 2,
          }"
          @click="operation(2)"
        >
          <div
            class="w-full aspect-square relative z-10 bg-contain bg-no-repeat bg-bottom"
            :style="{
              'background-image':
                'url(' +
                (testStore.test?.gender == 'male' ? menImage1 : image1) +
                ')',
            }"
          ></div>
          <div class="mt-5 text-lg">
            {{ questions[$route.name]?.options?.[2] }}
          </div>
        </div>
      </div>
    </div>
  </Base>
</template>
