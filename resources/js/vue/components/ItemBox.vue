<script setup>
const props = defineProps(["select"]);
</script>

<template>
  <div
    class="bg-zinc-50 border border-zinc-200 rounded-2xl h-16 flex items-center gap-4 overflow-hidden cursor-pointer opacity-75"
    :class="{ '!bg-green-50 !border-green-400': props.select }"
  >
    <slot></slot>
  </div>
</template>
