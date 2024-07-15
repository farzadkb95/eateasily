<script setup>
import InfoBox from "../../components/InfoBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import ItemBox from "../../components/ItemBox.vue";
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
      <QuestionBox class="mb-10"
        ><p>{{ questions[$route.name]?.question }}</p></QuestionBox
      >

      <div class="flex flex-col gap-4">
        <ItemBox
          class="px-5 !text-lg"
          @click="operation(1)"
          :select="testStore.test?.other?.[route.name] == 1"
        >
          <div class="flex w-16 justify-center items-center">
            <img src="@/assets/Sunny.png" alt="" class="h-full z-10 relative" />
          </div>
          <p>{{ questions[$route.name]?.options?.[1] }}</p>
        </ItemBox>
        <ItemBox
          class="px-5 !text-lg"
          @click="operation(2)"
          :select="testStore.test?.other?.[route.name] == 2"
        >
          <div class="flex w-16 justify-center items-center">
            <img src="@/assets/Union.png" alt="" class="h-full z-10 relative" />
          </div>
          <p>{{ questions[$route.name]?.options?.[2] }}</p>
        </ItemBox>
        <ItemBox
          class="px-5 !text-lg"
          @click="operation(3)"
          :select="testStore.test?.other?.[route.name] == 3"
        >
          <div class="flex w-16 justify-center items-center gap-1">
            <img src="@/assets/Union.png" alt="" class="h-full z-10 relative" />
            <img src="@/assets/Sunny.png" alt="" class="h-full z-10 relative" />
          </div>
          <p>{{ questions[$route.name]?.options?.[3] }}</p>
        </ItemBox>
        <ItemBox
          class="px-5 !text-lg"
          @click="operation(4)"
          :select="testStore.test?.other?.[route.name] == 4"
        >
          <div class="flex w-16 justify-center items-center gap-1">
            <img src="@/assets/Sunny.png" alt="" class="h-full z-10 relative" />
            <img src="@/assets/Sunny.png" alt="" class="h-full z-10 relative" />
          </div>
          <p>{{ questions[$route.name]?.options?.[4] }}</p>
        </ItemBox>
        <ItemBox
          class="px-5 !text-lg"
          @click="operation(5)"
          :select="testStore.test?.other?.[route.name] == 5"
        >
          <div class="flex w-16 justify-center items-center gap-1">
            <img src="@/assets/Union.png" alt="" class="h-full z-10 relative" />
            <img src="@/assets/Union.png" alt="" class="h-full z-10 relative" />
          </div>
          <p>{{ questions[$route.name]?.options?.[5] }}</p>
        </ItemBox>
      </div>
    </div>
  </Base>
</template>
