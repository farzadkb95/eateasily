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
        ><p>کدام گزینه اندازه دور مچ شمارو بهتر توضیح میده؟</p></QuestionBox
      >

      <div class="flex flex-col gap-4">
        <ItemBox class="px-5 !text-lg" @click="operation">
          <p>دو انگشتانم دور مچم بهم نمی‌رسد</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg" @click="operation">
          <p>دو انگشتانم دور مچم روی هم مماس می‌شوند</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg" @click="operation">
          <p>ناخن های انگشتم دور مچم روی هم قرار می‌گیرند</p>
        </ItemBox>
      </div>
    </div>
  </Base>
</template>
