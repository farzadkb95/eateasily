<script setup>
import Btn from "@/components/Btn.vue";
import { pages } from "../modules/config";
</script>

<template>
  <div class="h-screen flex items-center justify-center">
    <Btn :to="{ name: pages[0][0] }">شروع آزمون لاغری</Btn>
  </div>
</template>
