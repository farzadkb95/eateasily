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
        ><p>
          تاحالا زیرنظر متخصص تغذیه و یا مجموعه دیگه لاغری رو امتحان کردی که
          نتیجه نگرفته باشی؟
        </p></QuestionBox
      >

      <div class="flex flex-col gap-4">
        <ItemBox
          class="px-5 !text-lg"
          @click="operation(1)"
          :select="testStore.test?.other?.[route.name] == 1"
        >
          <p>کتوژنیک</p>
        </ItemBox>
        <ItemBox
          class="px-5 !text-lg"
          @click="operation(2)"
          :select="testStore.test?.other?.[route.name] == 2"
        >
          <p>گیاه خواری</p>
        </ItemBox>
        <ItemBox
          class="px-5 !text-lg"
          @click="operation(3)"
          :select="testStore.test?.other?.[route.name] == 3"
        >
          <p>کالری شماری</p>
        </ItemBox>
        <ItemBox
          class="px-5 !text-lg"
          @click="operation(4)"
          :select="testStore.test?.other?.[route.name] == 4"
        >
          <p>بر اساس مزاج</p>
        </ItemBox>
        <ItemBox
          class="px-5 !text-lg"
          @click="operation(5)"
          :select="testStore.test?.other?.[route.name] == 5"
        >
          <p>زیر نظر پزشک متخصص تغذیه</p>
        </ItemBox>
      </div>
    </div>
  </Base>
</template>
