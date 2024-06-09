<script setup>
import Btn from "@/components/Btn.vue";
import ProgressBar from "@/components/ProgressBar.vue";
import { Icon } from "@iconify/vue";

import { useRoute, useRouter } from "vue-router";
import { previousPageName } from "../modules/config";

const route = useRoute();
const router = useRouter();

function previousPage() {
  router.push({ name: previousPageName(route.name) });
}
</script>

<template>
  <div class="mb-48">
    <header
      class="shadow-emerald-100 shadow-lg flex items-center justify-center h-12"
    >
      <div class="py-2 h-full">
        <img src="@/assets/logo.png" alt="" class="h-full" />
      </div>
    </header>
    <div class="max-md:px-3">
      <div class="px-2">
        <div
          class="c-container min-h-20 border-b flex items-center gap-8 sm:gap-20 max-sm:flex-col-reverse max-sm:py-8"
        >
          <ProgressBar />
          <div class="flex gap-5 shrink-0 max-sm:w-full">
            <Btn class="gap-2 !rounded-2xl max-sm:w-full" @click="previousPage">
              <Icon icon="solar:alt-arrow-right-outline" class="h-full w-6" />
              سوال قبل
            </Btn>
            <div
              class="max-sm:w-full border border-gray-300 rounded-md px-5 h-10 flex items-center justify-center font-bold text-pink-500 text-xl"
            >
              سوال 1 از 30
            </div>
          </div>
        </div>
      </div>
      <div class="fixed w-full bottom-0 h-0 -z-10">
        <div
          class="rounded-full w-[500px] mix-w-[500px] aspect-square bg-emerald-50 p-8 absolute bottom-[-360px] ms-[50%] translate-x-1/2"
        >
          <div
            class="rounded-full w-full aspect-square bg-emerald-100 bottom-0 p-8"
          >
            <div
              class="rounded-full w-full aspect-square bg-emerald-200 bottom-0"
            ></div>
          </div>
        </div>
      </div>

      <main>
        <slot></slot>
      </main>
    </div>
  </div>
</template>
