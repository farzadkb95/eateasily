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
        ><p>در مورد چاقیت کدوم مورد بیشتر اذیتت می‌کنه؟</p></QuestionBox
      >

      <div class="flex flex-col gap-4">
        <ItemBox class="px-5 !text-lg">
          <p>وقتی لباس های قشنگی که دوست دارم اندازم نیست</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <p>وقتی برای از پله بالا رفتن باید کلی به خودم زحمت بدم و درد بکشم</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <p>وقتی بقیه اضافه وزنم رو یادم میارن</p>
        </ItemBox>
      </div>
    </div>
  </Base>
</template>
