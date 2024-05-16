<script setup>
import { Icon } from "@iconify/vue/dist/iconify.js";
</script>

<template>
  <div
    class="my-10 bg-green-50 border border-green-500 rounded-md p-5 pt-8 text-green-950 relative"
  >
    <span
      class="block absolute -top-6 w-12 aspect-square bg-green-500 border-4 border-white text-white rounded-full p-2"
      ><Icon icon="solar:chat-round-line-outline" class="w-full h-full"
    /></span>
    <slot></slot>
  </div>
</template>
