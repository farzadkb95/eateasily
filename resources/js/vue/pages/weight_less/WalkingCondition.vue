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
      <QuestionBox class="mb-5"
        ><p>در چه شرایطی میل شما به پیاده روی بیشتر است؟</p></QuestionBox
      >

      <div class="flex flex-col gap-4">
        <ItemBox
          class="px-5 !text-lg"
          @click="operation(1)"
          :select="testStore.test?.other?.[route.name] == 1"
        >
          <p>اصلا نمیتونم پیاده روی کنم و همیشه احساس خستگی دارم</p>
        </ItemBox>
        <ItemBox
          class="px-5 !text-lg"
          @click="operation(2)"
          :select="testStore.test?.other?.[route.name] == 2"
        >
          <p>10 تا 20 دقیقه و بعد از آن خسته می‌شم</p>
        </ItemBox>
        <ItemBox
          class="px-5 !text-lg"
          @click="operation(3)"
          :select="testStore.test?.other?.[route.name] == 3"
        >
          <p>30 دقیقه به راحتی می‌تونم پیاده روی کنم ولی بعد از آن خسته میشم</p>
        </ItemBox>
        <ItemBox
          class="px-5 !text-lg"
          @click="operation(4)"
          :select="testStore.test?.other?.[route.name] == 4"
        >
          <p>40 تا 60 دقیقه بدون خستگی پیاده روی می‌کنم</p>
        </ItemBox>
      </div>
    </div>
  </Base>
</template>
