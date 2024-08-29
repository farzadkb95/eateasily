<script setup>
import Base from "../../layouts/Base.vue";
import Btn from "../../components/Btn.vue";
import { useTestStore } from "../../store/TestStore";
import { useRoute, useRouter } from "vue-router";
import { nextPageName } from "../../modules/config";

import imgFatManKortizol from "../../assets/fat-man-kortizol.png";
import imgFatManApple from "../../assets/fat-man-apple.png";
import imgFatManPear from "../../assets/fat-man-pear.png";
import imgFatManTriangle from "../../assets/fat-man-triangle.png";
import imgFatManBalloon from "../../assets/fat-man-balloon.png";

import imgFatWomanKortizol from "../../assets/fat-woman-kortizol.png";
import imgFatWomanApple from "../../assets/fat-woman-apple.png";
import imgFatWomanPear from "../../assets/fat-woman-pear.png";
import imgFatWomanTriangle from "../../assets/fat-woman-triangle.png";
import imgFatWomanBalloon from "../../assets/fat-woman-balloon.png";

const testStore = useTestStore();
const router = useRouter();
const route = useRoute();

function operation() {
  router.push({ name: nextPageName(route.name) });
}
</script>

<template>
  <Base>
    <div class="c-box">
      <template
        v-if="testStore.test?.other?.['weight-less|select-weight-type'] == 1"
      >
        <div class="h-[300px] my-10">
          <img
            :src="
              testStore.test.gender == 'male'
                ? imgFatManKortizol
                : imgFatWomanKortizol
            "
            class="h-full mx-auto"
          />
        </div>
        <p class="font-bold">
          علت اصلی چاقی شکم پهلو شما استرس هست و شما دچار
          <span class="text-red-500">چاقی کورتیزولی</span> هستی!
        </p>
      </template>

      <template
        v-if="testStore.test?.other?.['weight-less|select-weight-type'] == 2"
      >
        <div class="h-[300px] my-10">
          <img
            :src="
              testStore.test.gender == 'male'
                ? imgFatManApple
                : imgFatWomanApple
            "
            class="h-full mx-auto"
          />
        </div>
        <p class="font-bold">
          فرم بدنی شما <span class="text-green-500">سیبی</span> شکل هست و شما در
          معرض خطر بیماری های
          <span class="text-red-500">قلبی عروقی</span> هستی!
        </p>
      </template>

      <template
        v-if="testStore.test?.other?.['weight-less|select-weight-type'] == 3"
      >
        <div class="h-[300px] my-10">
          <img
            :src="
              testStore.test.gender == 'male' ? imgFatManPear : imgFatWomanPear
            "
            class="h-full mx-auto"
          />
        </div>
        <p class="font-bold">
          فرم بدنی شما <span class="text-green-500">گلابی</span> شکل هست و شما
          در معرض خطر <span class="text-red-500">زانو درد</span>،
          <span class="text-red-500">کمر درد</span> و
          <span class="text-red-500">ساییدگی زانو</span> هستی!
        </p>
      </template>

      <template
        v-if="testStore.test?.other?.['weight-less|select-weight-type'] == 4"
      >
        <div class="h-[300px] my-10">
          <img
            :src="
              testStore.test.gender == 'male'
                ? imgFatManTriangle
                : imgFatWomanTriangle
            "
            class="h-full mx-auto"
          />
        </div>
        <p class="font-bold">
          فرم بدنی شما <span class="text-green-500">مثلثی</span> شکل هست و شما
          در معرض خطر <span class="text-red-500">دیسک گردن</span>
          <span class="text-red-500">درد شانه</span> هستی!
        </p>
      </template>

      <template
        v-if="testStore.test?.other?.['weight-less|select-weight-type'] == 5"
      >
        <div class="h-[300px] my-10">
          <img
            :src="
              testStore.test.gender == 'male'
                ? imgFatManBalloon
                : imgFatWomanBalloon
            "
            class="h-full mx-auto"
          />
        </div>
        <p class="font-bold">
          فرم بدنی شما <span class="text-green-500">بادکنکی</span> شکل هست و احتمالا فکر
          میکنی که <span class="text-red-500">چاقیت ژنتیکی</span> و
          <span class="text-red-500">غیر قابل اصلاحه!</span>
        </p>
      </template>

      <p class="text-green-500 font-bold text-center mt-5">
        ولی اصلا نگران نباش، کنارتیم تا مشکلت رو حل کنیم.
      </p>

      <Btn class="w-full mt-6 !rounded-xl !h-14" @click="operation">ادامه</Btn>
    </div>
  </Base>
</template>
