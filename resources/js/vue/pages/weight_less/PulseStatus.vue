<script setup>
import InfoBox from "../../components/InfoBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import ItemBox from "../../components/ItemBox.vue";
import { useRoute, useRouter } from "vue-router";
import { nextPageName } from "../../modules/config";

const route = useRoute();
const router = useRouter();

function operation() {
  router.push({ name: nextPageName(route.name) });
}
</script>

<template>
  <Base>
    <div class="c-box">
      <QuestionBox class="mb-10"
        ><p>
          چهار انگشت دست خود را روی قسمت نبض گذاشته و گزینه صحیح را انتخاب کنید
        </p></QuestionBox
      >

      <div class="flex flex-col gap-4">
        <ItemBox class="px-5 !text-lg" @click="operation">
          <p>رگ هایم پرفشار به انگشتانم ضربه می‌زند</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg" @click="operation">
          <p>نبضم احساس می‌شود ولی ضعیف است</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg" @click="operation">
          <p>به سختی و خیلی کم احساس می‌شود</p>
        </ItemBox>
      </div>
    </div>
  </Base>
</template>
