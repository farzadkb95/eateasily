<script setup>
import { ref } from "vue";
import { Icon } from "@iconify/vue";

const open = ref(false);
</script>

<template>
  <div>
    <div
      class="flex shadow-lg shadow-green-200 bg-white rounded-2xl p-5 cursor-pointer gap-2 items-center"
      @click="open = !open"
    >
      <div
        class="border border-pink-500 bg-white rounded-full w-6 h-6 flex items-center justify-center"
      >
        <Icon icon="ph:question-fill" class="h-full w-6 text-pink-500" />
      </div>
      <p>
        <slot name="title"></slot>
      </p>
      <Icon
        icon="formkit:down"
        class="h-full w-7 ms-auto"
        :class="{ 'rotate-180': open }"
      />
    </div>
    <div class="px-5 mt-5" v-show="open">
      <div class="bg-white rounded-2xl p-6 border-2 border-green-500">
        <p class="text-sm text-zinc-500">
          <slot name="text"></slot>
        </p>
      </div>
    </div>
  </div>
</template>
