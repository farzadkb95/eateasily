<script setup>
import InfoBox from "../../components/InfoBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import ItemBox from "../../components/ItemBox.vue";
</script>

<template>
  <Base>
    <div class="c-box">
      <QuestionBox class="mb-10"><p>هدف شما از رژیم لاغری چیه؟</p></QuestionBox>

      <div class="flex flex-col gap-4">
        <ItemBox class="px-5 !text-lg">
          <p>به وزن و اندام دلخواهم برسم</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <p>سبک زندگی و عادات غذایی هم اصلاح بشه</p>
        </ItemBox>
      </div>
    </div>
  </Base>
</template>
