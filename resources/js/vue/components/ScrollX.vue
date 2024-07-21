<script setup>
import { ref } from "vue";
import { usePointerSwipe } from "@vueuse/core";

let xPosition = 0;
const el = ref(null);
const { distanceX } = usePointerSwipe(el, {
  disableTextSelect: true,
  onSwipeStart() {
    xPosition = el.value.scrollLeft;
  },
  onSwipe() {
    el.value.scroll(xPosition + distanceX.value / 1.2, 0);
  },
  onSwipeEnd() {
    xPosition = el.value.scrollLeft;
  },
});

function onWheel(e) {
  if (e.deltaY > 0) {
    el.value.scroll(xPosition - 60, 0);
  } else {
    el.value.scroll(xPosition + 60, 0);
  }
  xPosition = el.value.scrollLeft;
}
</script>

<template>
  <div
    class="x-scroll overflow-x-hidden"
    ref="el"
    @click="xPosition = el.scrollLeft"
    @wheel="onWheel"
  >
    <slot></slot>
  </div>
</template>
