<script setup>
import ItemBox from "../../components/ItemBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import image1 from "@/assets/woman-p-7-1.png";
import image2 from "@/assets/woman-p-7-2.png";
import image3 from "@/assets/woman-p-7-3.png";
import image4 from "@/assets/woman-p-7-4.png";
import image5 from "@/assets/woman-p-7-5.png";
import { useRoute, useRouter } from "vue-router";
import { nextPageName } from "../../modules/config";
import { useTestStore } from "../../store/TestStore";

const route = useRoute();
const router = useRouter();
const testStore = useTestStore();
const items = [
  "لاغر هستم و فقط شکم و پهلو دارم",
  "چاق هستم و بیشترین چربی در شکم و پهلو است(سیبی)",
  "قسمت ران و باسن چاق تری دارم",
  "بالاتنه چاقی دارم (سینه، شانه و بازو)",
  "چاقی به صورت متوازن و سراسری در بدن من وجود دارد (بادکنکی)",
];

function operation(index) {
  axios
    .post(`/api/weight-less/set-other`, {
      key: route.name,
      value: items[index],
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
          کدام گزینه تجمع چربی در بدن شما رو بهتر توصیف می‌کنه؟
        </p></QuestionBox
      >
      <div class="flex flex-col gap-4">
        <ItemBox
          class="!font-normal pe-1 !text-base"
          @click="operation(0)"
          :select="testStore.test?.other?.[route.name] == items[0]"
        >
          <div
            class="pt-2 ms-3 h-full relative flex items-center justify-center w-20 overflow-clip shrink-0"
          >
            <div
              class="bg-green-200 rounded-full absolute z-0 w-16 -bottom-3 right-2 aspect-square"
            ></div>
            <div
              class="w-full h-full relative z-10 bg-contain bg-no-repeat bg-center"
              :style="{ 'background-image': 'url(' + image1 + ')' }"
            ></div>
          </div>
          <div>{{ items[0] }}</div>
        </ItemBox>
        <ItemBox
          class="!font-normal pe-1 !text-base"
          @click="operation(1)"
          :select="testStore.test?.other?.[route.name] == items[1]"
        >
          <div
            class="pt-2 ms-3 h-full relative flex items-center justify-center w-20 overflow-clip shrink-0"
          >
            <div
              class="bg-green-200 rounded-full absolute z-0 w-16 -bottom-3 right-2 aspect-square"
            ></div>
            <div
              class="w-full h-full relative z-10 bg-contain bg-no-repeat bg-center"
              :style="{ 'background-image': 'url(' + image2 + ')' }"
            ></div>
          </div>
          <div>{{ items[1] }}</div>
        </ItemBox>
        <ItemBox
          class="!font-normal pe-1 !text-base"
          @click="operation(2)"
          :select="testStore.test?.other?.[route.name] == items[2]"
        >
          <div
            class="pt-2 ms-3 h-full relative flex items-center justify-center w-20 overflow-clip shrink-0"
          >
            <div
              class="bg-green-200 rounded-full absolute z-0 w-16 -bottom-3 right-2 aspect-square"
            ></div>
            <div
              class="w-full h-full relative z-10 bg-contain bg-no-repeat bg-center"
              :style="{ 'background-image': 'url(' + image3 + ')' }"
            ></div>
          </div>
          <div>{{ items[2] }}</div>
        </ItemBox>
        <ItemBox
          class="!font-normal pe-1 !text-base"
          @click="operation(3)"
          :select="testStore.test?.other?.[route.name] == items[3]"
        >
          <div
            class="pt-2 ms-3 h-full relative flex items-center justify-center w-20 overflow-clip shrink-0"
          >
            <div
              class="bg-green-200 rounded-full absolute z-0 w-16 -bottom-3 right-2 aspect-square"
            ></div>
            <div
              class="w-full h-full relative z-10 bg-contain bg-no-repeat bg-center"
              :style="{ 'background-image': 'url(' + image4 + ')' }"
            ></div>
          </div>
          <div>{{ items[3] }}</div>
        </ItemBox>
        <ItemBox
          class="!font-normal pe-1 !text-base"
          @click="operation(4)"
          :select="testStore.test?.other?.[route.name] == items[4]"
        >
          <div
            class="pt-2 ms-3 h-full relative flex items-center justify-center w-20 overflow-clip shrink-0"
          >
            <div
              class="bg-green-200 rounded-full absolute z-0 w-16 -bottom-3 right-2 aspect-square"
            ></div>
            <div
              class="w-full h-full relative z-10 bg-contain bg-no-repeat bg-center"
              :style="{ 'background-image': 'url(' + image5 + ')' }"
            ></div>
          </div>
          <div>{{ items[4] }}</div>
        </ItemBox>
      </div>
    </div>
  </Base>
</template>
