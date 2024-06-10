<script setup>
import InfoBox from "../../components/InfoBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import ItemBox from "../../components/ItemBox.vue";
import { useRoute, useRouter } from "vue-router";
import { nextPageName } from "../../modules/config";

const route = useRoute();
const router = useRouter();

function operation() {
  router.push({ name: nextPageName(route.name) });
}
</script>

<template>
  <Base>
    <div class="c-box">
      <QuestionBox class="mb-10"
        ><p>معمولا با چند ساعت خواب احساس سرحالی می‌کنی؟</p></QuestionBox
      >

      <div class="flex flex-col gap-4">
        <ItemBox class="px-5 !text-lg" @click="operation">
          <p>6-7 ساعت خواب</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg" @click="operation">
          <p>7-8 ساعت خواب</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg" @click="operation">
          <p>9 ساعت و بیشتر</p>
        </ItemBox>
      </div>
    </div>
  </Base>
</template>
