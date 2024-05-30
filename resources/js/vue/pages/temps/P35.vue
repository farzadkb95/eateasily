<script setup>
import InfoBox from "../../components/InfoBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import ItemBox from "../../components/ItemBox.vue";
import Btn from "../../components/Btn.vue";
</script>

<template>
  <Base>
    <div class="c-box">
      <div class="h-[300px] my-10">
        <img src="@/assets/woman-change-weight.png" class="h-full mx-auto" />
      </div>
      <p class="text-center text-xl">
        تو هم می‌تونی در <span class="text-green-500">2 ماه آینده</span> این
        تغییر رو احساس کنی!
      </p>

      <Btn class="w-full mt-6 !rounded-xl !h-14">ادامه</Btn>
    </div>
  </Base>
</template>
