<script setup>
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";

import image1 from "@/assets/18woman.png";
import image2 from "@/assets/30woman.png";
import image3 from "@/assets/40woman.png";
import image4 from "@/assets/50woman.png";

import mImage1 from "@/assets/18man.png";
import mImage2 from "@/assets/30man.png";
import mImage3 from "@/assets/40man.png";
import mImage4 from "@/assets/50man.png";

import { useRoute, useRouter } from "vue-router";
import { getQuestions, nextPageName } from "../../modules/config";
import { useTestStore } from "../../store/TestStore";
import Btn from "../../components/Btn.vue";
import Input from "../../components/Input.vue";
import { computed, ref, watchEffect } from "vue";

const questions = getQuestions();
const route = useRoute();
const router = useRouter();
const testStore = useTestStore();
const age = ref(null);

watchEffect(() => {
  age.value = testStore.test?.age;
});

const image = computed(() => {
  if (testStore.test?.gender == "male") {
    if (age.value >= 50) {
      return mImage4;
    } else if (age.value >= 40) {
      return mImage3;
    } else if (age.value >= 30) {
      return mImage2;
    }
    return mImage1;
  } else {
    if (age.value >= 50) {
      return image4;
    } else if (age.value >= 40) {
      return image3;
    } else if (age.value >= 30) {
      return image2;
    }
    return image1;
  }
});

function operation() {
  axios
    .post(`/api/weight-less/select-age`, {
      age: age.value,
      step: route.name,
    })
    .then(function (response) {
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
        ><p>{{ questions[$route.name]?.question }}</p></QuestionBox
      >
      <div class="flex flex-col">
        <div class="flex w-full h-32 items-center justify-center relative">
          <div
            class="bg-green-200 rounded-full absolute z-0 w-24 aspect-square"
          ></div>
          <div
            class="h-32 w-full relative z-10 bg-contain bg-no-repeat bg-center"
            :style="{
              'background-image': 'url(' + image + ')',
            }"
          ></div>
        </div>
        <form @submit.prevent="operation">
          <Input
            placeholder="سن خود را وارد کنید"
            v-model="age"
            :numeric="true"
            class="!mt-0"
          />

          <Btn
            class="w-full mt-6 !rounded-xl !h-14"
            type="submit"
            :disabled="!age"
            >ثبت</Btn
          >
        </form>
      </div>
    </div>
  </Base>
</template>
