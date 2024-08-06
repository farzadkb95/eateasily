<script setup>
import Base from "../../layouts/Base.vue";
import Btn from "../../components/Btn.vue";
import { useTestStore } from "../../store/TestStore";
import { useRoute, useRouter } from "vue-router";
import { nextPageName } from "../../modules/config";

const testStore = useTestStore();
const router = useRouter();
const route = useRoute();

function operation() {
  router.push({ name: nextPageName(route.name) });
}
</script>

<template>
  <Base>
    <div class="c-box">
      <div class="my-10">
        <img
          src="@/assets/woman-change-weight.png"
          v-if="testStore.test?.gender == 'female'"
          class="mx-auto"
        />
        <img src="@/assets/man-change-weight.png" v-else class="mx-auto" />
      </div>
      <p class="text-center text-xl">
        تو هم می‌تونی در
        <span class="text-green-500"
          >{{ testStore.test?.ideal_weight_time }} ماه آینده</span
        >
        این تغییر رو احساس کنی!
      </p>

      <Btn class="w-full mt-6 !rounded-xl !h-14" @click="operation">ادامه</Btn>
    </div>
  </Base>
</template>
