<script setup>
import Base from "../../layouts/Base.vue";
import Btn from "../../components/Btn.vue";
import { useTestStore } from "../../store/TestStore";
import { useRoute, useRouter } from "vue-router";
import { nextPageName } from "../../modules/config";
import { computed } from "vue";

import lunch1 from "@/assets/food-p-20-1.png";
import lunch2 from "@/assets/food-p-20-2.png";
import lunch3 from "@/assets/food-p-20-3.png";
import lunch4 from "@/assets/food-p-20-4.png";
import lunch5 from "@/assets/food-p-20-5.png";
import lunch6 from "@/assets/food-p-20-6.png";
import lunch7 from "@/assets/food-p-20-7.png";
import lunch8 from "@/assets/food-p-20-8.png";
import deser1 from "@/assets/deser-p21-1.png";
import deser2 from "@/assets/deser-p21-2.png";
import deser3 from "@/assets/drink.png";
import deser4 from "@/assets/deser-p21-4.png";
import deser5 from "@/assets/deser-p21-5.png";
import deser6 from "@/assets/deser-p21-6.png";

const lunch = {
  1: lunch1,
  2: lunch2,
  3: lunch3,
  4: lunch4,
  5: lunch5,
  6: lunch6,
  7: lunch7,
  8: lunch8,
};

const deser = {
  1: deser1,
  2: deser2,
  3: deser3,
  4: deser4,
  5: deser5,
  6: deser6,
};

const testStore = useTestStore();
const router = useRouter();
const route = useRoute();

const foods = computed(() => {
  let foods = [];
  (testStore.test?.other?.["weight-less|select-lunch"] || []).forEach((i) => {
    foods.push(lunch[i]);
  });
  (testStore.test?.other?.["weight-less|cant-loose-food"] || []).forEach(
    (i) => {
      foods.push(deser[i]);
    }
  );
  return foods.slice(0, 6);
});

function operation() {
  router.push({ name: nextPageName(route.name) });
}
</script>

<template>
  <Base>
    <div class="c-box">
      <div class="w-[400px] my-auto max-w-full flex mx-auto mt-10 relative">
        <img
          src="@/assets/hold-man.png"
          class="w-full"
          alt=""
          v-if="testStore?.test?.gender == 'male'"
        />
        <img src="@/assets/hold-woman.png" class="w-full" alt="" v-else />
        <div
          class="w-3/5 aspect-square absolute right-3 top-3 flex flex-wrap items-center justify-center"
        >
          <div
            class="w-1/2 px-5 py-1 flex items-center justify-center"
            v-for="(food, index) in foods"
            :key="index"
          >
            <img :src="food" class="h-12" alt="" />
          </div>
        </div>
      </div>

      <p class="mt-5 w-[300px] mx-auto">
        <span class="text-green-500">90%</span> افراد با ایت ایزیلی هر چی که دوست دارن میخورن!
        <br>
        اونقدر که سیر بشن و لذت ببرن 
چون ایت ایزیلی بر اساس احساس راحتی و لذت تو طراحی شده.
      </p>

      <Btn class="w-full mt-6 !rounded-xl !h-14" @click="operation">ادامه</Btn>
    </div>
  </Base>
</template>
