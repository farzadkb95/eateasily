<script setup>
import Btn from "../../components/Btn.vue";
import LightInfoBox from "../../components/LightInfoBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import { useRoute, useRouter } from "vue-router";
import { nextPageName } from "../../modules/config";
import { useTestStore } from "../../store/TestStore";
import Chart from "../../components/chart.vue";
import ChartReverse from "../../components/ChartReverse.vue";
import ChartSame from "../../components/ChartSame.vue";

const route = useRoute();
const router = useRouter();
const testStore = useTestStore();

function operation() {
  router.push({ name: nextPageName(route.name) });
}
</script>

<template>
  <Base>
    <QuestionBox class="mb-4 !text-xl">
      <p v-if="testStore.test?.extra_weight > 0">
        شما در حال حاضر
        <span class="text-red-500"
          >{{ testStore.test?.extra_weight }} کیلوگرم</span
        >
        اضافه وزن دارید و تنها نیستید!!!!!
      </p>
      <p v-else-if="testStore.test?.extra_weight == 0">
       
       خوشبختانه شمـا در حال حاضر <span class="text-red-500"
       >اضافه وزن</span> ندارید
       و وزن شما کاملا نرماله.
     </p>
      <p v-else>
        شما در حال حاضر
        <span class="text-red-500"
          >{{ -testStore.test?.extra_weight }} کیلوگرم</span
        >
        کمبود وزن دارید و نیاز به افزایش وزن دارید!
      </p>
    </QuestionBox>
    <p class="text-center text-lg font-[400] my-5">
      تا به امروز ما به {{ testStore.customers }} نفـر کمک کردیم تا به وزن و
      اندام دلخواهشون برسن!
    </p>
    <div class="c-box">
      <div class="w-fit mx-auto relative">
        <Chart
          v-if="testStore.test?.extra_weight > 0"
          :current="testStore.test?.weight"
          :ideal="testStore.test?.ideal_weight"
          :long="testStore.test?.ideal_weight_time"
        />
        <ChartSame
          v-else-if="testStore.test?.extra_weight == 0"
          :current="testStore.test?.weight"
          :ideal="testStore.test?.ideal_weight"
          :long="testStore.test?.ideal_weight_time"
        />
        <ChartReverse
          v-else
          :current="testStore.test?.weight"
          :ideal="testStore.test?.ideal_weight"
          :long="testStore.test?.ideal_weight_time"
        />
      </div>
    </div>
    <div class="c-box">
      <LightInfoBox
        class="text-lg font-bold text-slate-800"
        v-if="testStore.test?.extra_weight == 0"
      >
        خوشبختانه شما در حال حاضر اضافه وزن نداری، حتما تا پایان تست رو ادامه
        بده و اطلاعات جالب در مورد سن واقعی بدن، مزاج و توصیه های مربوط به
        سلامتیت رو دریافت کن!
      </LightInfoBox>
      <LightInfoBox
        class="text-lg font-bold text-slate-800"
        v-else-if="testStore.test?.extra_weight > 0"
      >
      خوشبختانه <span class="text-green-500 font-bold">%93</span> از افراد با وضعیت مشابه شما فقط
        <span class="text-green-500 font-bold">{{ testStore.test?.ideal_weight_time }} ماه</span> زمـان نیـاز داشتـن تـا زیر نظـر تیم پزشکـی مـا به 
وزن ایده آلشون برسن.
      </LightInfoBox>
      <LightInfoBox class="text-lg font-bold text-slate-800" v-else>
        برنامه ایت ایزیلی مخصوص کاهش وزن طراحی شده و متاسفانه برای شما مناسب

        <span class="text-red-500">
          نیست و اطلاعات وزنی رو برای شما با خطا نشان خواهد داد
        </span>
      </LightInfoBox>

      <Btn class="w-full mt-6 !rounded-xl !h-14" @click="operation">ادامه</Btn>
    </div>
  </Base>
</template>
