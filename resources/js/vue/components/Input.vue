<script setup>
import { computed } from "vue";

const props = defineProps({
  modelValue: null,
  type: {
    type: String,
    default: "text",
  },
});
const emit = defineEmits(["update:modelValue"]);

const value = computed({
  get() {
    return props.modelValue;
  },
  set(value) {
    emit("update:modelValue", value);
  },
});
</script>

<template>
  <input
    :type="props.type"
    v-model="value"
    class="border rounded-xl w-full h-14 px-2 outline-none mt-5"
  />
</template>
