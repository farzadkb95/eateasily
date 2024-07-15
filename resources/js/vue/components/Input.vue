<script setup>
import { computed, useSlots } from "vue";

const slots = useSlots();
const props = defineProps({
  modelValue: null,
  type: {
    type: String,
    default: "text",
  },
  placeholder: {
    type: String,
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
  <div class="flex items-center border rounded-xl mt-5 px-2 gap-2">
    <template v-if="slots.start">
      <slot name="start"></slot>
    </template>
    <input
      :type="props.type"
      :placeholder="props.placeholder"
      v-model="value"
      class="w-full h-14 outline-none bg-transparent"
    />
  </div>
</template>
