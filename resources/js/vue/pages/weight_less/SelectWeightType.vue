<script setup>
import ItemBox from "../../components/ItemBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import image1 from "@/assets/woman-p-7-1.png";
import image2 from "@/assets/woman-p-7-5.png";
import image3 from "@/assets/woman-p-7-3.png";
import image4 from "@/assets/woman-p-7-4.png";
import image5 from "@/assets/woman-p-7-2.png";
import menImage1 from "@/assets/man-p-7-1.png";
import menImage2 from "@/assets/man-p-7-5.png";
import menImage3 from "@/assets/man-p-7-3.png";
import menImage4 from "@/assets/man-p-7-2.png";
import menImage5 from "@/assets/man-p-7-4.png";
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
      <QuestionBox
        ><p>
          {{ questions[$route.name]?.question }}
        </p></QuestionBox
      >
      <div class="flex flex-col gap-4">
        <ItemBox
          class="!font-normal pe-1 !text-base"
          @click="operation(1)"
          :select="testStore.test?.other?.[route.name] == 1"
        >
          <div
            class="pt-2 ms-3 h-full relative flex items-center justify-center w-20 overflow-clip shrink-0"
          >
            <div
              class="bg-green-200 rounded-full absolute z-0 w-16 -bottom-3 right-2 aspect-square"
            ></div>
            <div
              class="w-full h-full relative z-10 bg-contain bg-no-repeat bg-center"
              :style="{
                'background-image':
                  'url(' +
                  (testStore.test?.gender == 'male' ? menImage1 : image1) +
                  ')',
              }"
            ></div>
          </div>
          <div>{{ questions[$route.name]?.options?.[1] }}</div>
        </ItemBox>
        <ItemBox
          class="!font-normal pe-1 !text-base"
          @click="operation(2)"
          :select="testStore.test?.other?.[route.name] == 2"
        >
          <div
            class="pt-2 ms-3 h-full relative flex items-center justify-center w-20 overflow-clip shrink-0"
          >
            <div
              class="bg-green-200 rounded-full absolute z-0 w-16 -bottom-3 right-2 aspect-square"
            ></div>
            <div
              class="w-full h-full relative z-10 bg-contain bg-no-repeat bg-center"
              :style="{
                'background-image':
                  'url(' +
                  (testStore.test?.gender == 'male' ? menImage2 : image2) +
                  ')',
              }"
            ></div>
          </div>
          <div>{{ questions[$route.name]?.options?.[2] }}</div>
        </ItemBox>
        <ItemBox
          class="!font-normal pe-1 !text-base"
          @click="operation(3)"
          :select="testStore.test?.other?.[route.name] == 3"
        >
          <div
            class="pt-2 ms-3 h-full relative flex items-center justify-center w-20 overflow-clip shrink-0"
          >
            <div
              class="bg-green-200 rounded-full absolute z-0 w-16 -bottom-3 right-2 aspect-square"
            ></div>
            <div
              class="w-full h-full relative z-10 bg-contain bg-no-repeat bg-center"
              :style="{
                'background-image':
                  'url(' +
                  (testStore.test?.gender == 'male' ? menImage3 : image3) +
                  ')',
              }"
            ></div>
          </div>
          <div>{{ questions[$route.name]?.options?.[3] }}</div>
        </ItemBox>
        <ItemBox
          class="!font-normal pe-1 !text-base"
          @click="operation(4)"
          :select="testStore.test?.other?.[route.name] == 4"
        >
          <div
            class="pt-2 ms-3 h-full relative flex items-center justify-center w-20 overflow-clip shrink-0"
          >
            <div
              class="bg-green-200 rounded-full absolute z-0 w-16 -bottom-3 right-2 aspect-square"
            ></div>
            <div
              class="w-full h-full relative z-10 bg-contain bg-no-repeat bg-center"
              :style="{
                'background-image':
                  'url(' +
                  (testStore.test?.gender == 'male' ? menImage4 : image4) +
                  ')',
              }"
            ></div>
          </div>
          <div>{{ questions[$route.name]?.options?.[4] }}</div>
        </ItemBox>
        <ItemBox
          class="!font-normal pe-1 !text-base"
          @click="operation(5)"
          :select="testStore.test?.other?.[route.name] == 5"
        >
          <div
            class="pt-2 ms-3 h-full relative flex items-center justify-center w-20 overflow-clip shrink-0"
          >
            <div
              class="bg-green-200 rounded-full absolute z-0 w-16 -bottom-3 right-2 aspect-square"
            ></div>
            <div
              class="w-full h-full relative z-10 bg-contain bg-no-repeat bg-center"
              :style="{
                'background-image':
                  'url(' +
                  (testStore.test?.gender == 'male' ? menImage5 : image5) +
                  ')',
              }"
            ></div>
          </div>
          <div>{{ questions[$route.name]?.options?.[5] }}</div>
        </ItemBox>
      </div>
    </div>
  </Base>
</template>
