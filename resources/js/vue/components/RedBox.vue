<script setup>
import { Icon } from "@iconify/vue";
</script>

<template>
  <div
    class="my-10 py-8 px-10  border border-red-600 rounded-2xl p-5 pt-8 relative"
  >
    <span
      class="block absolute -top-6 w-12 h-12 bg-red-600 border-4 border-white text-white rounded-full p-2"
      ><Icon icon="mdi:lightbulb" class="w-full h-full"
    /></span>
    <slot></slot>
  </div>
</template>
