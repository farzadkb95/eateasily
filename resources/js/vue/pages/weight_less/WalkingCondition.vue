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
      <QuestionBox class="mb-5"
        ><p>{{ questions[$route.name]?.question }}</p></QuestionBox
      >

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
        <ItemBox
          class="px-5 !text-lg"
          @click="operation(4)"
          :select="testStore.test?.other?.[route.name] == 4"
        >
          <p>{{ questions[$route.name]?.options?.[4] }}</p>
        </ItemBox>
      </div>
    </div>
    <!-- <img
      v-if="testStore.test?.gender == 'male'"
      src="@/assets/boy-q10.png"
      class="h-52 md:h-60  block bottom-0  mt-4"
      alt=""
    /> -->
    <img
  v-if="testStore.test?.gender == 'male'"
  src="@/assets/boy-q10.png"
  class="h-52 md:h-60 block bottom-0 mt-4 mx-auto"
  alt=""
/>

    <img
      v-else
      src="@/assets/girl-q10.png"
      class="h-52 md:h-60 block bottom-0 mt-4 mx-auto"
      alt=""
    />
  </Base>
</template>
