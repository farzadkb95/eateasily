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
          کدام مورد حجم وعده های غذایی شما را بهتر نشان می‌دهد
        </p></QuestionBox
      >

      <div class="flex flex-col gap-4">
        <ItemBox class="px-5 !text-lg">
          <div class="h-full py-2">
            <img src="@/assets/dish1.png" alt="" class="h-full z-10 relative" />
          </div>
          <p>1/4 ظرف</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <div class="h-full py-2">
            <img src="@/assets/dish2.png" alt="" class="h-full z-10 relative" />
          </div>
          <p>نصف ظرف</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <div class="h-full py-2">
            <img src="@/assets/dish3.png" alt="" class="h-full z-10 relative" />
          </div>
          <p>یک ظرف پر غذا</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <div class="h-full py-2 flex">
            <img src="@/assets/dish3.png" alt="" class="h-full z-10 relative" />
            <img src="@/assets/dish3.png" alt="" class="h-full z-10 relative" />
          </div>
          <p>2 ظرف پر غذا</p>
        </ItemBox>
      </div>
    </div>
  </Base>
</template>
