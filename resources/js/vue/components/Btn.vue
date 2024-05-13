<script setup>
import { defineProps } from "vue";

const emits = defineEmits(["click"]);
const props = defineProps({
  color: {
    type: String,
    default: "green",
  },
  to: String | Object,
  disabled: {
    type: Boolean,
    default: false,
  },
  loading: {
    type: Boolean,
    default: false,
  },
  type: {
    type: String,
  },
});
</script>

<template>
  <component
    :is="props.to && !props.disabled ? 'router-link' : 'button'"
    :to="props.to"
    class="flex items-center justify-center rounded-md h-10 px-6 cursor-pointer shadow-sm hover:shadow-none transition-all"
    :class="{
      'bg-green-500 px-6 text-white rounded-2xl shadow-md shadow-green-100 hover:bg-green-600 font-normal':
        props.color == 'green',
    }"
    @click="
      props.disabled == false &&
        props.loading == false &&
        !props.to &&
        $emit('click')
    "
    :disabled="props.disabled"
    :type="!props.to ? props.type : 'submit'"
  >
    <slot></slot>
  </component>
</template>
