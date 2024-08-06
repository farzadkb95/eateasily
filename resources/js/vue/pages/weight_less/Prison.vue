<script setup>
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import Btn from "../../components/Btn.vue";
import { Icon } from "@iconify/vue";
import { useRoute, useRouter } from "vue-router";
import { nextPageName } from "../../modules/config";

const router = useRouter();
const route = useRoute();

function operation() {
  router.push({ name: nextPageName(route.name) });
}
</script>

<template>
  <Base>
    <div class="c-box">
      <QuestionBox class="mb-0"
        ><p>ما در ایت ایزیلی زندانی نداریم!</p></QuestionBox
      >
      <div>
        <img src="@/assets/prison.jpg" class="w-80 mx-auto mb-5" alt="" />
      </div>
      <div class="bg-emerald-100 p-3 rounded-2xl">
        <div class="bg-emerald-200 p-3 rounded-2xl">
          <div class="bg-white p-3 rounded-2xl">
            <img src="@/assets/chat-p-34.png" alt="" />
          </div>
        </div>
      </div>

      <div
        class="border-2 border-pink-500 rounded-2xl mt-10 pt-10 pb-5 px-5 relative"
      >
        <div
          class="absolute bg-white rounded-full w-16 h-16 left-1/2 -top-8 -translate-x-1/2 p-3"
        >
          <Icon
            icon="solar:microphone-broken"
            class="w-full h-full text-pink-500"
          />
        </div>
        <p class="text-center px-10 text-xl">
          نظر یکی از اعضای خانواده راجع به محدودیت های ایت ایزیلی:
        </p>
        <audio controls class="mx-auto mt-5">
          <source src="@/assets/customer-voice.mp3" type="audio/mp3" />
        </audio>
      </div>

      <Btn class="w-full mt-10 !rounded-xl !h-14" @click="operation">ادامه</Btn>
    </div>
  </Base>
</template>
