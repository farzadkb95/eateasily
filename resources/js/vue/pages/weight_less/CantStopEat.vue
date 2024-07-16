<script setup>
import InfoBox from "../../components/InfoBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import ItemBox from "../../components/ItemBox.vue";
import { useRoute, useRouter } from "vue-router";
import { getQuestions, nextPageName } from "../../modules/config";
import { useTestStore } from "../../store/TestStore";
import imgBerger from "../../assets/berger.png";
import imgDrink from "../../assets/drink.png";
import imgIceCream from "../../assets/icecream.png";
import imgCake from "../../assets/deser-p21-1.png";

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
      <QuestionBox class="mb-5"
        ><p>{{ questions[$route.name]?.question }}</p></QuestionBox
      >

      <InfoBox class="!my-5">
        <p>
          درسته که عادات غذایی روی چربی سوزی اثر دارن ولی محدودیت در خوراکی راه
          حل لاغری نیست!
        </p>
      </InfoBox>

      <div class="flex flex-col gap-4">
        <ItemBox
          class="px-2 !gap-2 !text-lg"
          @click="operation(1)"
          :select="testStore.test?.other?.[route.name] == 1"
        >
          <div
            class="py-1 h-full relative flex items-center justify-center w-20 overflow-clip shrink-0"
          >
            <div
              class="w-full h-full relative z-10 bg-contain bg-no-repeat bg-center"
              :style="{
                'background-image': 'url(' + imgBerger + ')',
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
            class="py-1 h-full relative flex items-center justify-center w-20 overflow-clip shrink-0"
          >
            <div
              class="w-full h-full relative z-10 bg-contain bg-no-repeat bg-center"
              :style="{
                'background-image': 'url(' + imgDrink + ')',
              }"
            ></div>
          </div>
          <p>{{ questions[$route.name]?.options?.[2] }}</p>
        </ItemBox>
        <ItemBox
          class="px-2 !gap-2 !text-lg"
          @click="operation(3)"
          :select="testStore.test?.other?.[route.name] == 3"
        >
          <div
            class="py-1 h-full relative flex items-center justify-center w-20 overflow-clip shrink-0"
          >
            <div
              class="w-full h-full relative z-10 bg-contain bg-no-repeat bg-center"
              :style="{
                'background-image': 'url(' + imgIceCream + ')',
              }"
            ></div>
          </div>
          <p>{{ questions[$route.name]?.options?.[3] }}</p>
        </ItemBox>
        <ItemBox
          class="px-2 !gap-2 !text-lg"
          @click="operation(4)"
          :select="testStore.test?.other?.[route.name] == 4"
        >
          <div
            class="py-1 h-full relative flex items-center justify-center w-20 overflow-clip shrink-0"
          >
            <div
              class="w-full h-full relative z-10 bg-contain bg-no-repeat bg-center"
              :style="{
                'background-image': 'url(' + imgCake + ')',
              }"
            ></div>
          </div>
          <p>{{ questions[$route.name]?.options?.[4] }}</p>
        </ItemBox>
      </div>
    </div>
  </Base>
</template>
