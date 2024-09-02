<script setup>
import Raw from "../layouts/Raw.vue";
import Btn from "../components/Btn.vue";
import { Icon } from "@iconify/vue";
</script>

<template>
  <Raw class="bg-white">
    <div class="bg-gradient-to-t from-green-50 to-white">
      <div class="c-container flex max-md:flex-col gap-5 pt-16">
        <div class="w-[480px] max-w-full mx-auto text-center relative pb-40 px-2">
          <h1
            class="text-4xl xl:text-5xl font-[900] flex items-center justify-center gap-2 mt-10"
          >
            <img src="@/assets/edit-list.svg" alt="" />
            تست لاغری <span class="text-green-500">ایت ایزیلی</span>
          </h1>
          <div class="text-sm mt-5">
            <p class="my-3">قبل از انجام هر روش لاغری، حتما این تست رو بده</p>
            <p class="my-3">آنالیزور دقیق بدن با هوش مصنوعی</p>
            <p class="my-3">
              اگه به این سوال ها با دقت پاسخ بدی👇<br />
              این اطلاعات رو به دست میاری
            </p>
            <p class="text-right">
              ✅ آنالیز کامل فرم بدنیت، میزان اضافه وزن ناشی از چربی اضافی
            </p>
            <p class="text-right">✅ مزاج واقعی خودت و غذاهایی که طبق مزاجت باید بخوری</p>
            <p class="text-right">✅ فعالیت نیمکره های مغزت در لاغری</p>
            <p class="text-right">✅ سن بیولوژیکی بدنت</p>
            <p class="text-right">✅ از همه مهتر، مناسب ترین روش لاغری ویژه ی خودت</p>
            <p class="my-3">
              بعد از این آنالیز، برای همیشه از هدر رفتن هزینه ها و تلف کردن زمان در امانی
              و راه لاغری اختصاصی خودتو پیدا میکنی😊
            </p>

            <p class="my-3">از نتایج این آزمون شگفت زده خواهی شد !!</p>
          </div>
          <Btn
            class="mt-10 !h-12 !rounded-2xl !shadow-green-300 !shadow-xl"
            :to="{ name: 'weight-less|start' }"
            >شروع آزمون لاغری</Btn
          >
          <img
            class="absolute z-10 left-1/2 -translate-x-1/2 w-[460px] max-w-[90%]"
            src="@/assets/home.png"
            alt=""
          />
        </div>
      </div>
      <svg class="w-full relative -bottom-[1px]" viewBox="0 0 1976.93 81.4">
        <path
          class="fill-white"
          d="M0 81.4l1976.93 0 0 -81.4c-240.75,47.15 -594.33,76.92 -988.46,76.92 -394.13,0 -747.72,-29.77 -988.47,-76.92l0 81.4z"
        />
      </svg>
    </div>
    <div class="w-[480px] max-w-full mx-auto pt-40 text-center px-2">
      <div class="text-2xl font-[500]">راه‌های ارتباطی با ایت ایزیلی</div>
      <div class="mt-10">
        <div class="flex gap-3 md:gap-5">
          <a
            href="tel:02128421368"
            class="py-2 rounded-md border border-zinc-300 bg-zinc-50 text-zinc-900 w-1/2 flex gap-2 justify-center items-center text-nowrap"
          >
            <Icon icon="solar:phone-linear" class="w-6 h-full text-green-500 shrink-0" />
            021-28421368
          </a>

          <a
            href="mailto:info@eateasily.net"
            class="py-2 rounded-md border border-zinc-300 bg-zinc-50 text-zinc-900 w-1/2 flex gap-2 justify-center items-center text-nowrap"
          >
            <Icon icon="hugeicons:mail-02" class="w-6 h-full text-green-500 shrink-0" />
            info@eateasily.net
          </a>
        </div>
        <div
          class="p-5 flex rounded-md border border-zinc-300 bg-zinc-50 text-zinc-900 mt-3 md:mt-5"
        >
          <div class="flex gap-2 items-center">
            <Icon icon="hugeicons:location-01" class="w-6 h-full text-green-500" />
            آدرس:
          </div>
          <div class="items-center">
            <p>
            امارات متحده عربی، دوبی، جمیرا،<br> پی او باکس شماره ۵۳۵۶۰
          </p>
          <p>
            Jumeirah, Dubai, UAE. P.o.box: 53560
          </p>
          </div>
        </div>
      </div>
      <div class="flex items-center mt-5 gap-5">
        <hr class="w-full" />
        <span class="shrink-0">شبکه های اجتماعی</span>
        <div class="flex gap-2 shrink-0">
          <a target="_blank" href="https://t.me/eateasily"
            ><img src="@/assets/telegram.png" class="h-6" alt=""
          /></a>
          <a target="_blank" href="https://wa.me/+989336374188"
            ><img src="@/assets/whatsapp.png" class="h-6" alt=""
          /></a>
          <a target="_blank" href="https://eitaa.com/eateasily"
            ><img src="@/assets/eitaa.svg" class="h-6" alt=""
          /></a>
          <a target="_blank" href="https://ble.ir/eateasily"
            ><img src="@/assets/bale-color.png" class="h-6" alt=""
          /></a>
          <a target="_blank" href="https://www.instagram.com/eateasilyofficial/"
            ><img src="@/assets/instagram.png" class="h-6" alt=""
          /></a>
        </div>
        <hr class="w-full" />
      </div>
    </div>
  </Raw>
</template>
