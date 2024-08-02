<script setup>
import InfoBox from "../../components/InfoBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import ItemBox from "../../components/ItemBox.vue";
import { useRoute, useRouter } from "vue-router";
import { getQuestions, nextPageName } from "../../modules/config";
import { useTestStore } from "../../store/TestStore";

import imgGirl1 from "../../assets/girl-q9-1.png";
import imgGirl2 from "../../assets/girl-q9-2.png";
import imgBoy1 from "../../assets/boy-q9-1.png";
import imgBoy2 from "../../assets/boy-q9-2.png";

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
      <QuestionBox class="mb-3"
        ><p>{{ questions[$route.name]?.question }}</p></QuestionBox
      >

      <InfoBox class="">
        <p>
          حقیقت علمی : میدونستی خیلی از اوقات غذا میخوری در حالی که بدنت اصلا
          بهش نیاز نداشته؟!
        </p>
      </InfoBox>

      <div class="flex flex-col gap-4">
        <ItemBox
          class="px-2 !gap-2 !text-lg"
          @click="operation(1)"
          :select="testStore.test?.other?.[route.name] == 1"
        >
          <div
            class="pt-2 h-full relative flex items-center justify-center w-20 overflow-clip shrink-0"
          >
            <div
              class="w-full h-full relative z-10 bg-contain bg-no-repeat bg-center"
              :style="{
                'background-image':
                  'url(' +
                  (testStore.test?.gender == 'male' ? imgBoy1 : imgGirl1) +
                  ')',
              }"
            ></div>
          </div>
          <p>{{ questions[$route.name]?.options?.[1] }}</p>
        </ItemBox>
        <ItemBox
          class="px-2 !gap-2 !text-lg"
          @click="operation(2)"
          :select="testStore.test?.other?.[route.name] == 2"
        >
          <div
            class="pt-2 h-full relative flex items-center justify-center w-20 overflow-clip shrink-0"
          >
            <div
              class="w-full h-full relative z-10 bg-contain bg-no-repeat bg-center"
              :style="{
                'background-image':
                  'url(' +
                  (testStore.test?.gender == 'male' ? imgBoy2 : imgGirl2) +
                  ')',
              }"
            ></div>
          </div>
          <p>{{ questions[$route.name]?.options?.[2] }}</p>
        </ItemBox>
      </div>
    </div>
  </Base>
</template>
