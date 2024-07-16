<script setup>
import { ref } from "vue";
import { getSteps } from "../modules/config";

const steps = getSteps();
const bar = ref(null);
const points = ref(0);
const props = defineProps({
  step: {
    type: Number,
    default: 1,
  },
});

function getPercent() {
  let percent = 0;
  let stepsPercent = 100 / steps.length;
  let index = 0;
  for (let n = 0; n < steps.length; n++) {
    const count = steps[n];
    let divide = stepsPercent / count;
    points.value = n;
    for (let i = 0; i < count; i++) {
      index++;
      percent += divide;
      if (index >= props.step) {
        break;
      }
    }
    if (index >= props.step) {
      break;
    }
  }
  return percent + "%";
}
</script>

<template>
  <div class="h-2 w-full bg-slate-200 rounded-full relative" dir="rtl">
    <div
      ref="bar"
      class="absolute h-full rounded-full bg-gradient-to-l from-green-500 to-green-400"
      :style="{ width: getPercent() }"
    ></div>
    <div
      class="absolute flex w-full h-full left-0 top-0 justify-evenly items-center"
    >
      <div
        class="h-5 aspect-square rounded-full bg-slate-200 flex items-center justify-center"
        v-for="i in steps.length - 1"
        :key="i"
        :class="{ '!bg-green-500': points > i - 1 }"
      >
        <svg
          width="10"
          viewBox="0 0 18 13"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M17 1L6.70711 11.2929C6.31658 11.6834 5.68342 11.6834 5.29289 11.2929L1 7"
            stroke="white"
            stroke-width="4"
            stroke-linecap="round"
          />
        </svg>
      </div>
    </div>
  </div>
</template>
