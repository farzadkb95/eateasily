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
        ><p>کدام جمله شما رو بهتر توصیف می‌کنه؟</p></QuestionBox
      >

      <div class="flex flex-col gap-4">
        <ItemBox class="px-5 !text-lg">
          <p>هوای گرم رو دوست دارم</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <p>هوای سرد رو دوست دارم</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <p>گرما و سرما برای من یکسان است</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <p>گرمای شدید را به سرمای شدید ترجیح می‌دم</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <p>سرمای شدید را به گرمای شدید ترجیح می‌دم</p>
        </ItemBox>
      </div>
    </div>
  </Base>
</template>
