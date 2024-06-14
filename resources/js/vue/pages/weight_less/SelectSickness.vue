<script setup>
import InfoBox from "../../components/InfoBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import Btn from "../../components/Btn.vue";
import ItemBox from "../../components/ItemBox.vue";
import ItemCheckBox from "../../components/ItemCheckBox.vue";
import { ref, watchEffect } from "vue";
import { useRoute, useRouter } from "vue-router";
import { nextPageName } from "../../modules/config";
import { useTestStore } from "../../store/TestStore";

const items = ref([]);
const none = ref(false);

const route = useRoute();
const router = useRouter();
const testStore = useTestStore();

watchEffect(() => {
  items.value = testStore.test?.other?.[route.name] || [];
});

function operation() {
  axios
    .post(`/api/weight-less/set-other`, {
      value: items.value,
      step: route.name,
    })
    .then(function (response) {
      console.log(response.data);
    })
    .catch(function (error) {
      console.log(error.message);
    })
    .finally(function () {});

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
            @on="none = false"
            value="1"
            v-model="items"
            class="px-3 h-full w-full cursor-pointer"
            ><span>کبد چرب</span></ItemCheckBox
          >
        </ItemBox>
        <ItemBox>
          <ItemCheckBox
            @on="none = false"
            value="2"
            v-model="items"
            class="px-3 h-full w-full cursor-pointer"
            ><span>فشار خون</span></ItemCheckBox
          >
        </ItemBox>
        <ItemBox>
          <ItemCheckBox
            @on="none = false"
            value="3"
            v-model="items"
            class="px-3 h-full w-full cursor-pointer"
            ><span>دیابت</span></ItemCheckBox
          >
        </ItemBox>
        <ItemBox>
          <ItemCheckBox
            @on="none = false"
            value="4"
            v-model="items"
            class="px-3 h-full w-full cursor-pointer"
            ><span>چربی خون</span></ItemCheckBox
          >
        </ItemBox>
        <ItemBox v-if="testStore.test?.gender != 'male'">
          <ItemCheckBox
            @on="none = false"
            value="5"
            v-model="items"
            class="px-3 h-full w-full cursor-pointer"
            ><span>بارداری/شیر دهی</span></ItemCheckBox
          >
        </ItemBox>
        <ItemBox>
          <ItemCheckBox
            @on="items = []"
            value="0"
            v-model="none"
            class="px-3 h-full w-full cursor-pointer"
            ><span>هیچ کدام</span></ItemCheckBox
          >
        </ItemBox>
      </div>
      <Btn class="w-full mt-6 !rounded-xl !h-14" @click="operation">ثبت</Btn>
    </div>
  </Base>
</template>
