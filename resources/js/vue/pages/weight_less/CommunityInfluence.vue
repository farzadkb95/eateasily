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
          معمولا جامعه اطرافم می‌توانند بر اینکه چگونه رفتار کنم تاثیر بگذارند:
        </p></QuestionBox
      >

      <div class="flex flex-col gap-4">
        <ItemBox class="px-5 !text-lg" @click="operation">
          <p>کاملا موافقم</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg" @click="operation">
          <p>نظری ندارم</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg" @click="operation">
          <p>کاملا مخالفم</p>
        </ItemBox>
      </div>
    </div>
  </Base>
</template>
