<script setup>
import InfoBox from "../../components/InfoBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import ItemBox from "../../components/ItemBox.vue";
import { useRoute, useRouter } from "vue-router";
import { nextPageName } from "../../modules/config";
import { useTestStore } from "../../store/TestStore";
import { ref, watchEffect } from "vue";
import ItemCheckBox from "../../components/ItemCheckBox.vue";
import Btn from "../../components/Btn.vue";

const items = ref([]);
const none = ref(false);

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
        <ItemBox class="px-5 !text-lg">
          <ItemCheckBox
            value="1"
            v-model="items"
            class="px-3 h-full w-full cursor-pointer"
          >
            <span>کتوژنیک</span></ItemCheckBox
          >
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <ItemCheckBox
            value="2"
            v-model="items"
            class="px-3 h-full w-full cursor-pointer"
          >
            <span>گیاه خواری</span></ItemCheckBox
          >
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <ItemCheckBox
            value="3"
            v-model="items"
            class="px-3 h-full w-full cursor-pointer"
          >
            <span>کالری شماری</span></ItemCheckBox
          >
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <ItemCheckBox
            value="4"
            v-model="items"
            class="px-3 h-full w-full cursor-pointer"
          >
            <span>بر اساس مزاج</span></ItemCheckBox
          >
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <ItemCheckBox
            value="5"
            v-model="items"
            class="px-3 h-full w-full cursor-pointer"
          >
            <span>زیر نظر پزشک متخصص تغذیه</span></ItemCheckBox
          >
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <ItemCheckBox
            @on="items = []"
            value="0"
            v-model="none"
            class="px-3 h-full w-full cursor-pointer"
            ><span>هیچ کدام</span></ItemCheckBox
          >
        </ItemBox>
      </div>
      <Btn class="w-full mt-6 !rounded-xl !h-14" @click="operation">ثبت</Btn>
    </div>
  </Base>
</template>
