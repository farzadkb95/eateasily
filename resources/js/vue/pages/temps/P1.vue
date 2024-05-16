<script setup>
import InfoBox from "../../components/InfoBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
</script>

<template>
  <Base>
    <div class="c-box">
      <QuestionBox><p>جنسیتت چیه؟</p></QuestionBox>
      <InfoBox>
        <p>
          بخـاطر تفـاوت های بین هورمون های خانم ها و آقایون و تاثیراون بر سوخت و
          ساز بدن برای راهنمایی دقیق نیازه که به این سوال پاسخ بدید.
        </p>
      </InfoBox>

      <div class="flex gap-5">
        <div
          class="bg-gradient-to-tl from-pink-400 to-pink-300 rounded-[2.5rem] w-full border-4 border-white shadow-lg shadow-pink-200"
        >
          <div class="w-full aspect-[9/10] -mt-7 overflow-hidden px-8">
            <img src="@/assets/p1woman.png" alt="" />
          </div>
          <div class="py-2 px-8 text-2xl font-bold text-white">زن</div>
        </div>
        <div
          class="bg-gradient-to-tl from-blue-400 to-blue-300 rounded-[2.5rem] w-full border-4 border-white shadow-lg shadow-blue-200"
        >
          <div class="w-full aspect-[9/10] -mt-7 overflow-hidden px-3">
            <img src="@/assets/p1men.png" alt="" />
          </div>
          <div class="py-2 px-8 text-2xl font-bold text-white">مرد</div>
        </div>
      </div>
    </div>
  </Base>
</template>
