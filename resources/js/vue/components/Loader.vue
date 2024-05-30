<script setup>
const props = defineProps({
  percent: {
    type: Number,
    default: 0,
  },
});
</script>

<template>
  <div id="progress-bar--container">
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
      <text
        id="progress--text"
        x="50"
        y="52"
        text-anchor="middle"
        dominant-baseline="middle"
      >
        {{ props.percent }}%
      </text>
    </svg>
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

#progress--text {
  fill: #e46eac;
  font-weight: 750;
  font-size: 20px;
  transform-origin: center;
  transform: rotate(90deg);
}

svg {
  transform: rotate(-90deg);
}
</style>
