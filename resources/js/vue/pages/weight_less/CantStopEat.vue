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
      <QuestionBox class="mb-5"
        ><p>از خوردن کدوم یک از موارد زیر نمی‌تونی دست بکشی؟</p></QuestionBox
      >

      <InfoBox class="!my-5">
        <p>
          درسته که عادات غذایی روی چربی سوزی اثر دارن ولی محدودیت در خوراکی راه
          حل لاغری نیست!
        </p>
      </InfoBox>

      <div class="flex flex-col gap-4">
        <ItemBox class="px-5 !text-lg" @click="operation">
          <p>فست فود</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg" @click="operation">
          <p>نوشابه و دلستر</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg" @click="operation">
          <p>هله هوله و بستنی</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg" @click="operation">
          <p>کیک و شیرینی</p>
        </ItemBox>
      </div>
    </div>
  </Base>
</template>
