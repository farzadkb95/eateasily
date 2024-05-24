<script setup>
import InfoBox from "../../components/InfoBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import ItemBox from "../../components/ItemBox.vue";
</script>

<template>
  <Base>
    <div class="c-box">
      <QuestionBox class="mb-10"><p>چقدر با جمله زیر موافقی؟</p></QuestionBox>

      <p class="mb-10 text-lg text-green-700">
        “چند باری رژیم گرفتم ولی درگیر درست کردن غذاهای رژیمی پیچیده شدم، منم
        وقتش رو نداشتم و رژیممو شکستم”
      </p>

      <div class="flex flex-col gap-4">
        <ItemBox class="px-5 !text-lg">
          <p>کاملا درست</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <p>نه به این شدت ولی بعضی وقتا آره</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg">
          <p>کاملا غلط</p>
        </ItemBox>
      </div>
    </div>
  </Base>
</template>
