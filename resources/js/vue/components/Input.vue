<script setup>
const props = defineProps({
  type: {
    type: String,
    default: "text",
  },
});
</script>

<template>
  <input
    :type="props.type"
    class="border rounded-xl w-full h-14 px-2 outline-none mt-5"
  />
</template>
