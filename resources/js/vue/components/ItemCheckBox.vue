<script setup>
import { computed } from "vue";

const props = defineProps(["modelValue", "value"]);
const emit = defineEmits(["update:modelValue", "on", "off"]);

const value = computed({
  get() {
    if (Array.isArray(props.modelValue)) {
      return props.modelValue;
    } else {
      return Boolean(props.modelValue);
    }
  },
  set(value) {
    if (value) {
      emit("on");
    } else {
      emit("off");
    }
    if (typeof props.modelValue == "number") {
      emit("update:modelValue", value ? 1 : 0);
    } else {
      emit("update:modelValue", value);
    }
  },
});

const on = computed(() => {
  if (Array.isArray(props.modelValue)) {
    return value.value.includes(props.value);
  } else {
    return value.value;
  }
});
</script>

<template>
  <label class="inline-flex gap-2 select-none items-center">
    <input
      type="checkbox"
      :value="props.value"
      v-model="value"
      class="hidden"
    />
    <div
      class="w-6 aspect-square border-2 rounded-md flex items-center justify-center"
      :class="{
        'border-green-500 bg-green-500': on,
        'border-gray-400': !on,
      }"
    >
      <svg
        v-show="on"
        width="18"
        height="13"
        viewBox="0 0 18 13"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          d="M17 1L6.70711 11.2929C6.31658 11.6834 5.68342 11.6834 5.29289 11.2929L1 7"
          stroke="white"
          stroke-width="2"
          stroke-linecap="round"
        />
      </svg>
    </div>
    <slot></slot>
  </label>
</template>
