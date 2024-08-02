<script setup>
const props = defineProps({
  time: {
    type: String,
  },
  color: {
    type: Boolean,
    default: false,
  },
});
</script>

<template>
  <div
    class="flex gap-3 p-5 sm:rounded-xl relative"
    :class="{ 'bg-pink-100': props.color }"
  >
    <div
      class="absolute left-5 -top-4 bg-pink-500 rounded-2xl text-white text-xl font-bold px-5 py-1"
      v-if="props.time"
    >
      {{ props.time }}
    </div>
    <div class="flex flex-col gap-1 items-center">
      <div
        class="w-14 aspect-square p-3 rounded-full bg-zinc-100"
        :class="{ '!bg-white': props.color }"
      >
        <slot name="image"></slot>
      </div>
      <div
        class="h-full w-[5px] rounded-full bg-green-500"
        :class="{ '!bg-pink-500': props.color }"
      ></div>
    </div>
    <div class="w-full">
      <div class="font-bold text-lg mb-2"><slot name="title"></slot></div>

      <p class="font-lg text-zinc-600 py-1">
        <slot name="default"></slot>
      </p>
    </div>
  </div>
</template>
