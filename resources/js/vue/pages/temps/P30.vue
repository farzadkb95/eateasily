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
        <img src="@/assets/men-p-30.png" class="h-full mx-auto" />
      </div>
      <p>
        علت اصلی چاقی شکم پهلو شما استرس هست و شما دچار
        <span class="text-red-600">چاقی کورتیزولی</span> هستید!
      </p>

      <p class="text-green-500 font-bold text-center mt-5">
        ولی اصلا نگران نباش، کنارتیم تا مشکلت رو حل کنیم.
      </p>

      <Btn class="w-full mt-6 !rounded-xl !h-14">ادامه</Btn>
    </div>
  </Base>
</template>
