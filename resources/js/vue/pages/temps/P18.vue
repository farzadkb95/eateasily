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
        ><p>کدام جمله شما رو بهتر توصیف می‌کنه؟</p></QuestionBox
      >

      <div class="flex flex-col gap-4">
        <ItemBox class="px-5 !text-lg">
          <p>بین وعده های اصلی مدام هله هوله می‌خورم</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <p>معمولا بین وعده های اصلی چیزی نمی‌خورم</p>
        </ItemBox>
      </div>
    </div>
  </Base>
</template>
