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
        ><p>
          تاحالا زیرنظر متخصص تغذیه و یا مجموعه دیگه لاغری رو امتحان کردی که
          نتیجه نگرفته باشی؟
        </p></QuestionBox
      >

      <div class="flex flex-col gap-4">
        <ItemBox class="px-5 !text-lg">
          <p>کتوژنیک</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <p>گیاه خواری</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <p>کالری شماری</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <p>بر اساس مزاج</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <p>زیر نظر پزشک متخصص تغذیه</p>
        </ItemBox>
      </div>
    </div>
  </Base>
</template>
