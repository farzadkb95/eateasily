<script setup>
const props = defineProps(["image1", "image2", "w1", "w2"]);
</script>

<template>
  <div class="shadow-2xl p-2 bg-white w-[300px] max-w-full rounded-2xl">
    <div
      class="bg-green-400 w-full aspect-square rounded-2xl p-2 flex gap-2 items-center relative"
    >
      <div class="w-1/2 flex flex-col items-center">
        <div class="bg-white rounded-2xl p-1 aspect-[4/5] w-full">
          <div
            class="w-full h-full bg-cover bg-top rounded-xl"
            :style="{ 'background-image': 'url(' + props.image1 + ')' }"
          ></div>
        </div>
        <div
          class="border border-white border-t-0 rounded-b-xl w-[70%] bg-pink-500 my-0 text-white text-center px-0"
        >
          <span class="text-xl">{{ props.w1 }}</span> کیلو
        </div>
      </div>
      <div class="w-1/2 flex flex-col items-center relative">
        <img
          src="@/assets/eye-star-emoji.png"
          class="absolute -top-4 left-0 w-10 -rotate-6"
          alt=""
        />
        <div class="bg-white rounded-2xl p-1 aspect-[4/5] w-full">
          <div
            class="w-full h-full bg-cover bg-top rounded-xl"
            :style="{ 'background-image': 'url(' + props.image2 + ')' }"
          ></div>
        </div>
        <div
          class="border border-white border-t-0 rounded-b-xl w-[70%] bg-pink-500 my-0 text-white text-center px-0"
        >
          <span class="text-xl">{{ props.w2 }}</span> کیلو
        </div>
      </div>
      <svg
        class="absolute bottom-4 right-1/2 translate-x-1/2"
        width="55"
        height="15"
        viewBox="0 0 55 15"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          d="M4.34215 5.58723C4.9389 7.28418 5.48599 8.94147 6.14738 10.8121C4.97113 10.8079 4.22126 10.1682 3.86338 9.39424C2.78974 7.07227 1.75577 4.70063 0.940127 2.25937C0.467665 0.865071 1.41004 -0.00909102 2.84457 0.282732C5.24702 0.737664 7.61979 1.33158 10.0322 1.87584C10.1712 1.90553 10.3549 1.93022 10.4095 2.01455C10.6678 2.30223 10.8417 2.64456 11.0603 2.98189C10.7627 3.15085 10.485 3.49846 10.212 3.48376C9.25908 3.45464 8.34082 3.33121 7.42756 3.25243C6.92627 3.21804 6.46464 3.13399 5.77498 3.43722C6.32622 3.91825 6.88245 4.44395 7.43369 4.92499C19.2524 14.3665 35.4472 14.8168 47.8638 6.14755C49.4562 5.01982 50.8945 3.72842 52.4323 2.51636C52.9729 2.09412 53.5186 1.71655 54.0593 1.29431C54.2033 1.36866 54.3076 1.49266 54.4516 1.567C54.3625 1.98396 54.3778 2.52493 54.0951 2.82787C53.2174 3.87569 52.3396 4.92351 51.3129 5.85233C41.1351 15.1304 25.7609 17.1661 12.9766 10.8173C10.5339 9.59805 8.31425 7.94688 6.02526 6.48437C5.53866 6.177 5.1364 5.81498 4.68948 5.45794C4.59515 5.42327 4.46616 5.48291 4.34215 5.58723Z"
          fill="white"
        />
      </svg>
    </div>
  </div>
</template>
