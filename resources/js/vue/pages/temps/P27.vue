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
          فرض کنید به یک مهمانی دعوت و همزمان در تلاش برای کاهش وزن هستید. در
          مهمانی تمایل شما به کدام گزینه بیشتر است؟
        </p></QuestionBox
      >

      <div class="flex gap-5">
        <div
          class="p-5 border-2 border-zinc-200 bg-zinc-50 rounded-3xl flex items-center shrink-0 w-1/2 cursor-pointer"
        >
          <img src="@/assets/food-p27-2.png" alt="" />
        </div>
        <div
          class="p-6 border-2 border-zinc-200 bg-zinc-50 rounded-3xl flex items-center shrink-0 w-1/2 cursor-pointer"
        >
          <img src="@/assets/food-p27-1.png" alt="" />
        </div>
      </div>
    </div>
  </Base>
</template>
