<script setup>
import Btn from "../../components/Btn.vue";
import Base from "../../layouts/Base.vue";
import mezajChart from "@/assets/mezaj_chart.png";
</script>

<template>
  <Base>
    <div class="flex gap-2 my-4 justify-center">
      <div class="border rounded-full px-2 py-1 text-zinc-500">آنالیز وزنی</div>
      <div class="border rounded-full px-2 py-1 text-zinc-500">
        آنالیز سن واقعی
      </div>
      <div class="border rounded-full px-2 py-1 text-zinc-500">
        آنالیز مزاج شناسی
      </div>
      <div class="border rounded-full px-2 py-1 text-zinc-500">
        آنالیز نیم کره
      </div>
    </div>
    <div class="c-container h-0 !my-10 px-1">
      <hr />
      <div
        class="relative w-fit bg-white px-4 -top-3 mx-auto font-bold text-xl text-pink-500"
      >
        آنالیز وزنی
      </div>
    </div>
    <div class="c-box">
      <img
        src="@/assets/woman-change-weight.png"
        class="w-[300px] max-w-full mx-auto"
        alt=""
      />
      <div>
        <p class="my-5 p-5">
          دوست خوبم! با توجه به شرایط شمـا، وزن ایده آل شما
          <span class="text-green-500">70 کیلو</span> هست و فقط کافیه
          <span class="text-green-500">2 ماه</span> با تیم پزشکی همراه باشی تا
          از شر این
          <span class="text-red-500">10 کیلو اضافه وزن</span>
          خلاص بشی!!
        </p>
      </div>
    </div>
    <div class="c-container h-0 !my-10 px-1">
      <hr />
      <div
        class="relative w-fit bg-white px-4 -top-3 mx-auto font-bold text-xl text-pink-500"
      >
        سن واقعی شما
      </div>
    </div>
    <div class="c-box">
      <div
        class="bg-red-50 border border-red-500 text-red-600 text-lg text-center rounded-md p-5 relative !mt-16"
      >
        <div
          class="absolute w-fit bg-red-500 text-white px-10 py-1 rounded-md -top-4 right-1/2 translate-x-1/2"
        >
          هشدار
        </div>
        <p class="mt-5">
          شما توی 30 سالگی داری با یک بدن 34 ساله زندگی می‌کنی!
          <br />
          لطفا مراقب سلامتیت باش!
        </p>
      </div>
      <div class="text-green-500 text-center text-lg font-bold mt-8">
        ولی نگران نباش!
      </div>
      <p class="text-lg px-5 text-center">
        99% افـراد تونستن با 2 تا راهکار سـاده جلوی پیری زودرس خودشون رو بگیرند!
      </p>
    </div>
    <div class="c-container h-0 !my-10 px-1">
      <hr />
      <div
        class="relative w-fit bg-white px-4 -top-3 mx-auto font-bold text-xl text-pink-500"
      >
        آنالیز مزاج شناسی
      </div>
    </div>
    <div class="c-box">
      <div
        class="bg-zinc-50 border rounded-md border-zinc-200 py-2 px-5 flex gap-5 items-center relative"
      >
        <div class="absolute -top-4 left-7">
          <svg
            class="w-10"
            viewBox="0 0 29 23"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M26.6121 13.0861C28.1859 13.0861 28.9728 13.721 28.9728 14.9909V20.1552C28.9728 21.4251 28.1859 22.06 26.6121 22.06H20.5265C18.9527 22.06 18.1658 21.4251 18.1658 20.1552V14.9909C18.1658 12.0278 18.5505 9.44572 19.3199 7.24458C20.1243 5.01521 21.6807 3.06804 23.989 1.40306C24.7584 0.866887 25.4055 0.796338 25.9301 1.19142L28.2908 2.96927C28.8155 3.36434 28.693 3.84408 27.9236 4.40848C26.7345 5.25508 25.7552 6.48264 24.9858 8.09117C24.2513 9.67148 23.8841 11.3365 23.8841 13.0861H26.6121ZM9.2998 13.0861C10.8736 13.0861 11.6606 13.721 11.6606 14.9909V20.1552C11.6606 21.4251 10.8736 22.06 9.2998 22.06H3.21428C1.64044 22.06 0.853516 21.4251 0.853516 20.1552V14.9909C0.853516 12.0278 1.23823 9.44572 2.00767 7.24458C2.81208 5.01521 4.36843 3.06804 6.67673 1.40306C7.44617 0.866887 8.09319 0.796338 8.61781 1.19142L10.9786 2.96927C11.5032 3.36434 11.3808 3.84408 10.6113 4.40848C9.42221 5.25508 8.44293 6.48264 7.6735 8.09117C6.93904 9.67148 6.57181 11.3365 6.57181 13.0861H9.2998Z"
              fill="#DFDFDF"
            />
          </svg>
        </div>
        <img
          src="@/assets/sheykholraees.png"
          class="h-[90px] rounded-full"
          alt=""
        />
        <div class="font-bold text-xl text-zinc-700">
          <p>شیخ الرئیس (ابوعلی سینا):</p>
          <p>“بگو چه می‌خوری تا بگویم کیستی”</p>
        </div>
      </div>
      <div class="bg-green-200 p-3 mt-10 rounded-xl">
        <div class="bg-green-500 p-3 text-white rounded-xl text-xl">
          <p>
            می‌دونستید ویژگی های رفتاری، وضعیت چاقی و لاغری و ... بـه مـزاج
            شمــا مربوطه؟! حـالا بیـا تا با باید و نبـاید هـای مـزاج خودت دقیق
            تر آشنا بشی!
          </p>
        </div>
      </div>
      <div
        class="w-[340px] aspect-square bg-contain bg-no-repeat bg-center mx-auto my-5 flex items-center justify-center"
        :style="{
          'background-image': 'url(' + mezajChart + ')',
        }"
      >
        <div
          class="bg-green-300 w-6 h-6 rounded-full p-1"
          :style="{
            'margin-top': -2 * 60 + 'px',
            'margin-right': -2 * 60 + 'px',
          }"
        >
          <div class="bg-green-500 w-full h-full rounded-full"></div>
        </div>
      </div>
    </div>
    <div class="c-container h-0 !my-10 px-1">
      <hr />
      <div
        class="relative w-fit bg-white px-4 -top-3 mx-auto font-bold text-xl text-pink-500"
      >
        آنالیز نیمکره مغز
      </div>
    </div>
    <div class="c-box">
      <img src="@/assets/right-brain.png" class="w-[200px] mx-auto" alt="" />

      <div class="text-xl my-5">
        طبق آنالیز سمت <span class="text-green-500">راست</span> مغز شما فعال تر
        هست! <br />
        برنـامه غـذایی سختگیرانه مثل فستینگ، کـالـری شمـار و یا کتوژنیک
        <span class="text-red-500"
          >اصلا مناسب شما نیست و باعث نا امیدی شما در مسیر لاغری میشه!</span
        >
        <br />
        یادت باشـه شمـا نباید سفـره‌ت از سفره خانواده جدا بشه.
      </div>
      <div class="!mt-16">
        <div
          class="w-fit bg-red-500 text-white px-10 pt-2 text-xl rounded-t-xl mx-auto"
        >
          ریسک چاقی شما در آینده
        </div>
        <div
          class="bg-red-50 border border-red-500 text-lg rounded-md p-5 relative"
        >
          <p class="">
            با توجه با آنالیز رفتار شناسی شما، اگر با همین سبک تغذیه‌ فعلـی
            ادامه بدی به احتمال %80 طـی چندماه آینده
            <span class="text-red-600">8kg (کیلوگرم)</span> ریسک افزایش وزن
            دارید!!!
          </p>
        </div>
      </div>
      <div class="!mt-16">
        <div
          class="w-fit bg-green-500 text-white px-10 pt-2 text-xl rounded-t-xl mx-auto"
        >
          توصیه تیم پزشکی ایت ایزیلی
        </div>
        <div
          class="bg-green-50 border border-green-500 text-lg rounded-md p-5 relative"
        >
          <p class="">
            شما نیاز به یک روش لاغری آسون و سریع دارید ، پس تـوصیه تیم پزشکـــی
            ما به شمـا، یادگـیری
            <span class="text-green-500">متـد لاغـری آسون و بدون دردسره. </span>
          </p>
        </div>
      </div>
    </div>

    <div class="c-box">
      <Btn class="w-full mt-10 !rounded-xl !h-14"
        >دریافت روش لاغری زیر نظر تیم پزشکی</Btn
      >
    </div>
  </Base>
</template>
