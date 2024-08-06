<script setup>
const props = defineProps({
  percent: {
    type: Number,
    default: 0,
  },
});
</script>

<template>
  <div id="progress-bar--container" class="relative">
    <svg viewBox="0 0 100 100">
      <circle
        stroke="#fcf5fa"
        stroke-width="5.5"
        cx="50"
        cy="50"
        r="30"
        fill="none"
      />
      <circle
        id="progress--circle"
        stroke="#e46eac"
        stroke-width="5.5"
        cx="50"
        cy="50"
        r="30"
        fill="none"
        pathLength="100"
        :style="{ 'stroke-dashoffset': 100 - props.percent }"
      />
    </svg>
    <div
      class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 text-[60px] font-black text-[#e46eac]"
    >
      {{ props.percent }}%
    </div>
  </div>
</template>

<style scoped>
#progress-bar--container {
  display: flex;
  justify-content: center;
}

#progress-bar--container svg {
  width: 300px;
}

#progress--circle {
  stroke-dasharray: 100;
  stroke-dashoffset: 100;
  stroke-linecap: round;
}

svg {
  transform: rotate(-90deg);
}
</style>
