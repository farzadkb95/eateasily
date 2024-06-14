<script setup>
import ItemBox from "../../components/ItemBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import image1 from "@/assets/hand1.png";
import image2 from "@/assets/hand2.png";
import image3 from "@/assets/hand3.png";
import image4 from "@/assets/hand4.png";
import { useRoute, useRouter } from "vue-router";
import { nextPageName } from "../../modules/config";
import { useTestStore } from "../../store/TestStore";

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
          فرم انگشتان شما در کدام تصویر بهتر نمایش داده می‌شود؟
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
              class="bg-green-200 rounded-full absolute z-0 w-14 -bottom-3 right-3 aspect-square"
            ></div>
            <div
              class="w-full h-full relative z-10 bg-contain bg-no-repeat bg-center"
              :style="{ 'background-image': 'url(' + image1 + ')' }"
            ></div>
          </div>
          <div>تپل و کوتاه</div>
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
              class="bg-green-200 rounded-full absolute z-0 w-14 -bottom-3 right-3 aspect-square"
            ></div>
            <div
              class="w-full h-full relative z-10 bg-contain bg-no-repeat bg-center"
              :style="{ 'background-image': 'url(' + image2 + ')' }"
            ></div>
          </div>
          <div>تپل و دراز</div>
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
              class="bg-green-200 rounded-full absolute z-0 w-14 -bottom-3 right-3 aspect-square"
            ></div>
            <div
              class="w-full h-full relative z-10 bg-contain bg-no-repeat bg-center"
              :style="{ 'background-image': 'url(' + image3 + ')' }"
            ></div>
          </div>
          <div>لاغر و کوتاه</div>
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
              class="bg-green-200 rounded-full absolute z-0 w-14 -bottom-3 right-3 aspect-square"
            ></div>
            <div
              class="w-full h-full relative z-10 bg-contain bg-no-repeat bg-center"
              :style="{ 'background-image': 'url(' + image4 + ')' }"
            ></div>
          </div>
          <div>لاغر و دراز</div>
        </ItemBox>
      </div>
    </div>
  </Base>
</template>
