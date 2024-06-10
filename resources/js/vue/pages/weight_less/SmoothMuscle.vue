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
        ><p>
          آیا قسمت های گوشتی بدنتان مانند ران و بازو خیلی نرم است؟
        </p></QuestionBox
      >

      <div class="flex flex-col gap-4">
        <ItemBox class="px-5 !text-lg" @click="operation">
          <p>خیلی نرم</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg" @click="operation">
          <p>معمولی</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg" @click="operation">
          <p>سفت</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg" @click="operation">
          <p>بازوان لاغری دارم</p>
        </ItemBox>
      </div>
    </div>
  </Base>
</template>
