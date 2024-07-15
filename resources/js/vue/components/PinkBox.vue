<script setup>
import { Icon } from "@iconify/vue";
</script>

<template>
  <div
    class="my-10 py-8 px-10 bg-pink-100 border border-pink-500 rounded-2xl p-5 pt-8 relative"
  >
    <span
      class="block absolute -top-6 w-12 aspect-square bg-pink-500 border-4 border-white text-white rounded-full p-2"
      ><Icon icon="hugeicons:quote-down-circle" class="w-full h-full"
    /></span>
    <slot></slot>
  </div>
</template>
