<script setup>
import InfoBox from "../../components/InfoBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import ItemBox from "../../components/ItemBox.vue";
import image1 from "@/assets/girl-p28-1.png";
import image2 from "@/assets/girl-p28-2.png";
</script>

<template>
  <Base>
    <div class="c-box">
      <QuestionBox class="mb-10"
        ><p>
          فرض کنید به یک مهمانی دعوت و همزمان در تلاش برای کاهش وزن هستید. در
          مهمانی تمایل شما به کدام گزینه بیشتر است؟
        </p></QuestionBox
      >

      <div class="flex gap-5">
        <div
          class="p-5 border-2 border-zinc-200 bg-zinc-50 rounded-3xl flex flex-col items-center shrink-0 w-1/2 cursor-pointer"
        >
          <div
            class="w-full aspect-square relative z-10 bg-contain bg-no-repeat bg-center"
            :style="{ 'background-image': 'url(' + image2 + ')' }"
          ></div>
          <div class="mt-5 text-lg">تمایل به برقراری ارتباط</div>
        </div>
        <div
          class="p-6 border-2 border-zinc-200 bg-zinc-50 rounded-3xl flex flex-col items-center shrink-0 w-1/2 cursor-pointer"
        >
          <div
            class="w-full aspect-square relative z-10 bg-contain bg-no-repeat bg-center"
            :style="{ 'background-image': 'url(' + image1 + ')' }"
          ></div>
          <div class="mt-5 text-lg">ترجیح به انفرادی رفتار کردن</div>
        </div>
      </div>
    </div>
  </Base>
</template>
