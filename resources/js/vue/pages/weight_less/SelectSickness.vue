<script setup>
import InfoBox from "../../components/InfoBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import Btn from "../../components/Btn.vue";
import Input from "../../components/Input.vue";
import ItemBox from "../../components/ItemBox.vue";
import ItemCheckBox from "../../components/ItemCheckBox.vue";
import { ref } from "vue";
import { useRoute, useRouter } from "vue-router";
import { nextPageName } from "../../modules/config";

const items = ref([]);

const route = useRoute();
const router = useRouter();

function operation() {
  router.push({ name: nextPageName(route.name) });
}
</script>

<template>
  <Base>
    <div class="c-box">
      <QuestionBox class="mb-3"
        ><p>کدام یک از شرایط زیر را دارید؟</p></QuestionBox
      >
      <p class="text-gray-400 text-center">یک یا چند گزینه انتخاب کنید</p>

      <InfoBox class="!mt-3">
        <p>
          بـرای آنالیز دقیق، تیم پزشکی ایت ایزیلی باید از شـرایط عمومی شما بیشتر
          بدونه ، ممنونم که به سوالات با دقت جواب می‌دید.
        </p>
      </InfoBox>

      <div class="flex flex-col gap-4">
        <ItemBox>
          <ItemCheckBox
            value="کبد چرب"
            v-model="items"
            class="px-3 h-full w-full cursor-pointer"
            ><span>کبد چرب</span></ItemCheckBox
          >
        </ItemBox>
        <ItemBox>
          <ItemCheckBox
            value="فشار خون"
            v-model="items"
            class="px-3 h-full w-full cursor-pointer"
            ><span>فشار خون</span></ItemCheckBox
          >
        </ItemBox>
        <ItemBox>
          <ItemCheckBox
            value="دیابت"
            v-model="items"
            class="px-3 h-full w-full cursor-pointer"
            ><span>دیابت</span></ItemCheckBox
          >
        </ItemBox>
        <ItemBox>
          <ItemCheckBox
            value="چربی خون"
            v-model="items"
            class="px-3 h-full w-full cursor-pointer"
            ><span>چربی خون</span></ItemCheckBox
          >
        </ItemBox>
        <ItemBox>
          <ItemCheckBox
            value="بارداری/شیر دهی"
            v-model="items"
            class="px-3 h-full w-full cursor-pointer"
            ><span>بارداری/شیر دهی</span></ItemCheckBox
          >
        </ItemBox>
        <ItemBox>
          <ItemCheckBox
            value="هیچ کدام"
            v-model="items"
            class="px-3 h-full w-full cursor-pointer"
            ><span>هیچ کدام</span></ItemCheckBox
          >
        </ItemBox>
      </div>
      <Btn class="w-full mt-6 !rounded-xl !h-14" @click="operation">ثبت</Btn>
    </div>
  </Base>
</template>
