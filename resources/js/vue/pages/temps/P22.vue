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
          آیا قسمت های گوشتی بدنتان مانند ران و بازو خیلی نرم است؟
        </p></QuestionBox
      >

      <div class="flex flex-col gap-4">
        <ItemBox class="px-5 !text-lg">
          <p>خیلی نرم</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <p>معمولی</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <p>سفت</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <p>بازوان لاغری دارم</p>
        </ItemBox>
      </div>
    </div>
  </Base>
</template>
