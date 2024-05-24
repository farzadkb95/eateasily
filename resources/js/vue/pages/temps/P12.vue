<script setup>
import InfoBox from "../../components/InfoBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import ItemBox from "../../components/ItemBox.vue";
</script>

<template>
  <Base>
    <div class="c-box">
      <QuestionBox class="mb-10"
        ><p>کدام روش را برای لاغری بهترین روش می‌دانید؟</p></QuestionBox
      >

      <div class="flex flex-col gap-4">
        <ItemBox class="px-5 !text-lg">
          <p>استفاده از قرص ها و دارو های لاغری</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <p>محدود کردن شدید کالری و ورزش سنگین</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <p>حذف نان و برنج (کتوژنیک)</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <p>حذف وعده های غذایی (فستینگ)</p>
        </ItemBox>
      </div>
    </div>
  </Base>
</template>
