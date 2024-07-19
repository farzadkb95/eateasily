<script setup>
import { computed, useSlots } from "vue";
import { enNum } from "../modules/utility";

const slots = useSlots();
const props = defineProps({
  modelValue: null,
  type: {
    type: String,
    default: "text",
  },
  numeric: {
    type: Boolean,
    default: false,
  },
  placeholder: {
    type: String,
  },
});
const emit = defineEmits(["update:modelValue"]);
const pattern = /[^0-9۰۱۲۳۴۵۶۷۸۹]+/g;

const value = computed({
  get() {
    return props.modelValue;
  },
  set(value) {
    if (props.numeric) {
      value = value.replace(pattern, "");
      value = enNum(value);
    }
    emit("update:modelValue", value);
  },
});

function onInput(e) {
  if (props.numeric) {
    e.target.value = props.modelValue;
  }
}
</script>

<template>
  <div class="flex items-center border rounded-xl mt-5 px-2 gap-2">
    <template v-if="slots.start">
      <slot name="start"></slot>
    </template>
    <input
      ref="input"
      :type="props.type"
      :placeholder="props.placeholder"
      v-model="value"
      @input="onInput"
      class="w-full h-14 outline-none bg-transparent"
    />
  </div>
</template>
