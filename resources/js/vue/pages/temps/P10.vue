<script setup>
import InfoBox from "../../components/InfoBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import ItemBox from "../../components/ItemBox.vue";
</script>

<template>
  <Base>
    <div class="c-box">
      <QuestionBox class="mb-5"
        ><p>معمولا با چند ساعت خواب احساس سرحالی می‌کنی؟</p></QuestionBox
      >

      <div class="flex flex-col gap-4">
        <ItemBox class="px-5 !text-lg">
          <p>6-7 ساعت خواب</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <p>7-8 ساعت خواب</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <p>9 ساعت و بیشتر</p>
        </ItemBox>
      </div>
    </div>
  </Base>
</template>
