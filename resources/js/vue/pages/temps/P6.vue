<script setup>
import InfoBox from "../../components/InfoBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
</script>

<template>
  <Base>
    <QuestionBox class="mb-4 !text-xl"
      ><p>
        شما در حال حاضر <span class="text-red-500">10 کیلوگرم</span> اضافه وزن
        دارید و تنها نیستید!
      </p></QuestionBox
    >
    <p class="text-center text-lg font-[400] my-5">
      تا به امروز ما به 637,425 نفـر کمک کردیم تا به وزن و اندام دلخواهشون برسن!
    </p>
    <div class="c-box">
      <div class="w-fit mx-auto relative">
        <img src="@/assets/chart_raw.svg" />
      </div>
    </div>
  </Base>
</template>
