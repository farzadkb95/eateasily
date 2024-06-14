<script setup>
import Raw from "../../layouts/Raw.vue";
import Btn from "../../components/Btn.vue";
</script>

<template>
  <Raw>
    <div class="bg-gradient-to-t from-green-50 to-white">
      <div class="c-container flex max-md:flex-col gap-5 pt-16 md:pb-10">
        <div class="w-full flex justify-center">
          <div class="w-[480px] px-5 leading-normal">
            <h1 class="text-5xl font-black leading-normal">
              کاهش وزن 6 تا 8 کیلوگرم در ماه با
              <span class="text-green-500">ایت ایزیلی</span>
            </h1>
            <p class="text-xl mt-5">
              به جمع هــزاران نفری که با کمک ایت ایزیلی به وزن و اندام دلخواهشون
              رسیدند بپیوندید.
            </p>
            <p class="text-red-500 text-xl mt-5">
              همین الان می‌تونید ایت ایزیلی رو با %70 تخفیف دریافت کنید!
            </p>
            <div
              class="bg-red-100 p-3 rounded-md flex text-xl text-red-600 gap-2 items-center mt-5"
            >
              <div class="w-10 aspect-square bg-red-300 rounded-full"></div>
              <div>اعتبار تخفیف تا:</div>
              <div class="font-black text-3xl ms-auto">09:59</div>
            </div>
            <Btn class="w-full mt-5 !rounded-xl !h-14">دریافت برنامه</Btn>
          </div>
        </div>
        <div class="flex items-center justify-center w-full">
          <img src="@/assets/header.png" class="w-[600px] max-w-full" alt="" />
        </div>
      </div>
      <svg class="w-full relative -bottom-[1px]" viewBox="0 0 1976.93 81.4">
        <path
          class="fill-white"
          d="M0 81.4l1976.93 0 0 -81.4c-240.75,47.15 -594.33,76.92 -988.46,76.92 -394.13,0 -747.72,-29.77 -988.47,-76.92l0 81.4z"
        />
      </svg>
    </div>
  </Raw>
</template>
