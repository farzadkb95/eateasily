<script setup>
import InfoBox from "../../components/InfoBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import ItemBox from "../../components/ItemBox.vue";
</script>

<template>
  <Base>
    <div class="c-box">
      <QuestionBox class="mb-5"
        ><p>در چه شرایطی میل شما به غذا خوردن بیشتر است؟</p></QuestionBox
      >

      <div class="flex flex-col gap-4">
        <ItemBox class="px-5 !text-lg">
          <p>اصلا نمیتونم پیاده روی کنم و همیشه احساس خستگی دارم</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <p>10 تا 20 دقیقه و بعد از آن خسته می‌شم</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <p>30 دقیقه به راحتی می‌تونم پیاده روی کنم ولی بعد از آن خسته میشم</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <p>40 تا 60 دقیقه بدون خستگی پیاده روی می‌کنم</p>
        </ItemBox>
      </div>
    </div>
  </Base>
</template>
