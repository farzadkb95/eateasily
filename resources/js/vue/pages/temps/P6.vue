<script setup>
import Btn from "../../components/Btn.vue";
import InfoBox from "../../components/InfoBox.vue";
import LightInfoBox from "../../components/LightInfoBox.vue";
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
    <div class="c-box">
      <LightInfoBox class="text-lg font-bold text-slate-800"
        >خوشبختانه <span class="text-green-500">%93</span> از افـراد با وضعیت
        مشابه شما فقط <span class="text-green-500">2 ماه</span> زمـان نیـاز
        داشتـن تـا زیر نظـر تیم پزشکـی مـا به وزن ایده آلشون برسن.</LightInfoBox
      >

      <Btn class="w-full mt-6 !rounded-xl !h-14">ادامه</Btn>
    </div>
  </Base>
</template>
