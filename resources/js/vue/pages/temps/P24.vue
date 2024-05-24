<script setup>
import InfoBox from "../../components/InfoBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import ItemBox from "../../components/ItemBox.vue";
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
        <ItemBox class="px-5 !text-lg">
          <p>رگ هایم پرفشار به انگشتانم ضربه می‌زند</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <p>نبضم احساس می‌شود ولی ضعیف است</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <p>به سختی و خیلی کم احساس می‌شود</p>
        </ItemBox>
      </div>
    </div>
  </Base>
</template>
