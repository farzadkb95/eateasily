<script setup>
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import ItemBox from "../../components/ItemBox.vue";
import { useRoute, useRouter } from "vue-router";
import { getQuestions, nextPageName } from "../../modules/config";
import { useTestStore } from "../../store/TestStore";

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
      <QuestionBox class="mb-10"
        ><p>{{ questions[$route.name]?.question }}</p>
        <p class="my-0 text-2x md:text-[18px] font-bold text-[#121212] text-center">
          (دور مچت رو با انگشت وسط و شستت اندازه بگیر!)
        </p>
      </QuestionBox>

      <div class="flex flex-col gap-4">
        <ItemBox
          class="px-5 !text-lg"
          @click="operation(1)"
          :select="testStore.test?.other?.[route.name] == 1"
        >
          <p>{{ questions[$route.name]?.options?.[1] }}</p>
        </ItemBox>
        <ItemBox
          class="px-5 !text-lg"
          @click="operation(2)"
          :select="testStore.test?.other?.[route.name] == 2"
        >
          <p>{{ questions[$route.name]?.options?.[2] }}</p>
        </ItemBox>
        <ItemBox
          class="px-5 !text-lg"
          @click="operation(3)"
          :select="testStore.test?.other?.[route.name] == 3"
        >
          <p>{{ questions[$route.name]?.options?.[3] }}</p>
        </ItemBox>
      </div>
    </div>
    <img
      v-if="testStore.test?.gender == 'male'"
      src="@/assets/men-finger.png"
      class="mt-4 bottom-5 mx-auto -z-10"
      alt=""
    />
    <img v-else src="@/assets/finger.png" class="mt-4 bottom-5 mx-auto -z-10" alt="" />
  </Base>
</template>
