<script setup>
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import ItemBox from "../../components/ItemBox.vue";
import { useRoute, useRouter } from "vue-router";
import { getQuestions, nextPageName } from "../../modules/config";
import { useTestStore } from "../../store/TestStore";
import RedBox from "../../components/RedBox.vue";
import Btn from "../../components/Btn.vue"

const questions = getQuestions();
const route = useRoute();
const router = useRouter();
const testStore = useTestStore();

function operation() {
  router.push({ name: nextPageName(route.name) });
}
</script>

<template>
  <Base>
    <div class="c-box">
        <RedBox>
            <p class="text-lg text-rose-800 font-bold">هر چهار روشی که در سوال قبل بود، اشتباهه!!</p>
        <p class="text-lg mt-3 align-baseline ">
            دانشگاه هاروارد بعد از مطالعات زیاد اعلام کرد
که همه این روش ها برای کاهش وزن اشتباه
و منسوخ شده هستن و <span class="text-rose-800 font-bold">هیچکدوم</span> راه حل واقعی
<span class="text-black-800 font-bold" >برای رسیدن به وزن ایده آل نیستن</span>
        </p>
      </RedBox>
      <div class="w-[300px] my-auto max-w-full flex mx-auto mt-10 relative">
        <img
          src="@/assets/Group 2866.png"
          class="w-full"
          alt=""
        />
      </div>
      <Btn class="w-full mt-8 !rounded-xl !h-14" @click="operation">ادامه</Btn>
      <div class="w-[300px] max-w-full flex mx-auto mt-10 relative">
      <img
          src="@/assets/image-removebg-preview 1.png"
          class="block bottom-0  mt-4"
          alt=""
        />
        </div>
    </div>
  </Base>
</template>
