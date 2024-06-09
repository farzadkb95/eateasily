<script setup>
import InfoBox from "../../components/InfoBox.vue";
import ItemBox from "../../components/ItemBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";

import image1 from "@/assets/18woman.png";
import image2 from "@/assets/30woman.png";
import image3 from "@/assets/40woman.png";
import image4 from "@/assets/50woman.png";

import { useRoute, useRouter } from "vue-router";
import { nextPageName } from "../../modules/config";

const route = useRoute();
const router = useRouter();

function operation() {
  router.push({ name: nextPageName(route.name) });
}
</script>

<template>
  <Base>
    <div class="c-box">
      <QuestionBox><p>چند سالته؟</p></QuestionBox>
      <div class="flex flex-col gap-4">
        <ItemBox class="text-lg font-semibold" @click="operation">
          <div class="pt-2 ms-1 h-full relative">
            <div
              class="bg-green-200 rounded-full absolute z-0 w-[3.3rem] -bottom-1 right-2 aspect-square"
            ></div>
            <div
              class="h-full w-20 relative z-10 bg-contain bg-no-repeat bg-center"
              :style="{ 'background-image': 'url(' + image1 + ')' }"
            ></div>
          </div>
          <div>18 تا 30</div>
        </ItemBox>
        <ItemBox class="text-lg font-semibold" @click="operation">
          <div class="pt-2 ms-1 h-full relative">
            <div
              class="bg-green-200 rounded-full absolute z-0 w-[3.3rem] -bottom-1 right-2 aspect-square"
            ></div>
            <div
              class="h-full w-20 relative z-10 bg-contain bg-no-repeat bg-center"
              :style="{ 'background-image': 'url(' + image2 + ')' }"
            ></div>
          </div>
          <div>18 تا 30</div>
        </ItemBox>
        <ItemBox class="text-lg font-semibold" @click="operation">
          <div class="pt-2 ms-1 h-full relative">
            <div
              class="bg-green-200 rounded-full absolute z-0 w-[3.3rem] -bottom-1 right-2 aspect-square"
            ></div>
            <div
              class="h-full w-20 relative z-10 bg-contain bg-no-repeat bg-center"
              :style="{ 'background-image': 'url(' + image3 + ')' }"
            ></div>
          </div>
          <div>18 تا 30</div>
        </ItemBox>
        <ItemBox class="text-lg font-semibold" @click="operation">
          <div class="pt-2 ms-1 h-full relative">
            <div
              class="bg-green-200 rounded-full absolute z-0 w-[3.3rem] -bottom-1 right-2 aspect-square"
            ></div>
            <div
              class="h-full w-20 relative z-10 bg-contain bg-no-repeat bg-bottom"
              :style="{ 'background-image': 'url(' + image4 + ')' }"
            ></div>
          </div>
          <div>18 تا 30</div>
        </ItemBox>
      </div>
    </div>
  </Base>
</template>
