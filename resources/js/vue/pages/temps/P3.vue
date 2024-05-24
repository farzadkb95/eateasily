<script setup>
import InfoBox from "../../components/InfoBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import Btn from "../../components/Btn.vue";
import Input from "../../components/Input.vue";
</script>

<template>
  <Base>
    <div class="c-box">
      <QuestionBox><p>قد خودت رو وارد کن!</p></QuestionBox>

      <Input placeholder="cm (سانتی متر)" />

      <Btn class="w-full mt-6 !rounded-xl !h-14">ثبت</Btn>
    </div>
  </Base>
</template>
