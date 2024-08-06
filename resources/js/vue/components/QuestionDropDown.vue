<script setup>
import { ref } from "vue";
import { Icon } from "@iconify/vue";

const open = ref(false);
</script>

<template>
  <div>
    <div
      class="flex shadow-lg shadow-green-200 bg-white rounded-2xl p-5 cursor-pointer gap-2 items-center"
      @click="open = !open"
    >
      <div
        class="border border-pink-500 bg-white rounded-full w-6 h-6 flex items-center justify-center"
      >
        <Icon icon="ph:question-fill" class="h-full w-6 text-pink-500" />
      </div>
      <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم؟</p>
      <Icon
        icon="formkit:down"
        class="h-full w-7 ms-auto"
        :class="{ 'rotate-180': open }"
      />
    </div>
    <div class="px-5 mt-5" v-show="open">
      <div class="bg-white rounded-2xl p-6 border-2 border-green-500">
        <p class="text-sm text-zinc-500">
          لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده
          از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطر
          آنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد
        </p>
      </div>
    </div>
  </div>
</template>
