<script setup>
import InfoBox from "../../components/InfoBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import ItemBox from "../../components/ItemBox.vue";
import { ref, watchEffect } from "vue";
import ItemCheckBox from "../../components/ItemCheckBox.vue";
import image1 from "@/assets/deser-p21-1.png";
import image2 from "@/assets/deser-p21-2.png";
import image3 from "@/assets/drink.png";
import image4 from "@/assets/deser-p21-4.png";
import image5 from "@/assets/deser-p21-5.png";
import image6 from "@/assets/deser-p21-6.png";
import Btn from "../../components/Btn.vue";
import { useRoute, useRouter } from "vue-router";
import { getQuestions, nextPageName } from "../../modules/config";
import { useTestStore } from "../../store/TestStore";

const questions = getQuestions();
const items = ref([]);

const route = useRoute();
const router = useRouter();
const testStore = useTestStore();

watchEffect(() => {
  items.value = testStore.test?.other?.[route.name] || [];
});

function operation() {
  axios
    .post(`/api/weight-less/set-other`, {
      value: items.value,
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
      <QuestionBox class="mb-5"
        ><p>{{ questions[$route.name]?.question }}</p></QuestionBox
      >

      <InfoBox class="!my-5">
        <p>
          اصلا نگران کالری نباش فقط غذایی که واقعا با خوردنش شاد میشی رو انتخاب
          کن.
        </p>
      </InfoBox>

      <div class="flex flex-col gap-4">
        <ItemBox class="!text-lg">
          <ItemCheckBox
            value="1"
            v-model="items"
            class="px-3 h-full w-full cursor-pointer"
          >
            <div
              class="py-1 ms-3 h-full relative flex items-center justify-center w-20 overflow-clip shrink-0"
            >
              <div
                class="w-full h-full relative z-10 bg-contain bg-no-repeat bg-center"
                :style="{ 'background-image': 'url(' + image1 + ')' }"
              ></div>
            </div>
            <span>{{
              questions[$route.name]?.options?.[1]
            }}</span></ItemCheckBox
          >
        </ItemBox>
        <ItemBox class="!text-lg">
          <ItemCheckBox
            value="2"
            v-model="items"
            class="px-3 h-full w-full cursor-pointer"
          >
            <div
              class="py-1 ms-3 h-full relative flex items-center justify-center w-20 overflow-clip shrink-0"
            >
              <div
                class="w-full h-full relative z-10 bg-contain bg-no-repeat bg-center"
                :style="{ 'background-image': 'url(' + image2 + ')' }"
              ></div>
            </div>
            <span>{{
              questions[$route.name]?.options?.[2]
            }}</span></ItemCheckBox
          >
        </ItemBox>
        <ItemBox class="!text-lg">
          <ItemCheckBox
            value="3"
            v-model="items"
            class="px-3 h-full w-full cursor-pointer"
          >
            <div
              class="py-1 ms-3 h-full relative flex items-center justify-center w-20 overflow-clip shrink-0"
            >
              <div
                class="w-full h-full relative z-10 bg-contain bg-no-repeat bg-center"
                :style="{ 'background-image': 'url(' + image3 + ')' }"
              ></div>
            </div>
            <span>{{
              questions[$route.name]?.options?.[3]
            }}</span></ItemCheckBox
          >
        </ItemBox>
        <ItemBox class="!text-lg">
          <ItemCheckBox
            value="4"
            v-model="items"
            class="px-3 h-full w-full cursor-pointer"
          >
            <div
              class="py-1 ms-3 h-full relative flex items-center justify-center w-20 overflow-clip shrink-0"
            >
              <div
                class="w-full h-full relative z-10 bg-contain bg-no-repeat bg-center"
                :style="{ 'background-image': 'url(' + image4 + ')' }"
              ></div>
            </div>
            <span>{{
              questions[$route.name]?.options?.[4]
            }}</span></ItemCheckBox
          >
        </ItemBox>
        <ItemBox class="!text-lg">
          <ItemCheckBox
            value="5"
            v-model="items"
            class="px-3 h-full w-full cursor-pointer"
          >
            <div
              class="py-1 ms-3 h-full relative flex items-center justify-center w-20 overflow-clip shrink-0"
            >
              <div
                class="w-full h-full relative z-10 bg-contain bg-no-repeat bg-center"
                :style="{ 'background-image': 'url(' + image5 + ')' }"
              ></div>
            </div>
            <span>{{
              questions[$route.name]?.options?.[5]
            }}</span></ItemCheckBox
          >
        </ItemBox>
        <ItemBox class="!text-lg">
          <ItemCheckBox
            value="6"
            v-model="items"
            class="px-3 h-full w-full cursor-pointer"
          >
            <div
              class="py-1 ms-3 h-full relative flex items-center justify-center w-20 overflow-clip shrink-0"
            >
              <div
                class="w-full h-full relative z-10 bg-contain bg-no-repeat bg-center"
                :style="{ 'background-image': 'url(' + image6 + ')' }"
              ></div>
            </div>
            <span>{{
              questions[$route.name]?.options?.[6]
            }}</span></ItemCheckBox
          >
        </ItemBox>
      </div>
      <Btn class="w-full mt-6 !rounded-xl !h-14" @click="operation">ثبت</Btn>
    </div>
  </Base>
</template>
