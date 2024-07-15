<script setup>
import InfoBox from "../../components/InfoBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import ItemBox from "../../components/ItemBox.vue";
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
      <QuestionBox class="mb-10"
        ><p>کدام جمله شما رو بهتر توصیف می‌کنه؟</p></QuestionBox
      >

      <div class="flex flex-col gap-4">
        <ItemBox
          class="px-5 !text-lg"
          @click="operation(1)"
          :select="testStore.test?.other?.[route.name] == 1"
        >
          <p>بین وعده های اصلی مدام هله هوله می‌خورم</p>
        </ItemBox>
        <ItemBox
          class="px-5 !text-lg"
          @click="operation(2)"
          :select="testStore.test?.other?.[route.name] == 2"
        >
          <p>معمولا بین وعده های اصلی چیزی نمی‌خورم</p>
        </ItemBox>
      </div>
    </div>
    <img
      v-if="testStore.test?.gender == 'male'"
      src="@/assets/boy-q19.png"
      class="h-52 md:h-60 fixed block bottom-0 left-[15%] -z-10"
      alt=""
    />
    <img
      v-else
      src="@/assets/girl-q19.png"
      class="h-52 md:h-60 fixed block bottom-0 left-[15%] -z-10"
      alt=""
    />
  </Base>
</template>
