<script setup>
import InfoBox from "../../components/InfoBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import ItemBox from "../../components/ItemBox.vue";
import Btn from "../../components/Btn.vue";
import Loader from "../../components/Loader.vue";
</script>

<template>
  <Base>
    <div class="c-box">
      <Loader :percent="37"></Loader>
      <p class="text-center text-2xl">مزاج شما در حال آنالیز است...</p>
    </div>
  </Base>
</template>
