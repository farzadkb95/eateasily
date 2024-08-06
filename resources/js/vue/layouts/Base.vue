<script setup>
import Btn from "@/components/Btn.vue";
import ProgressBar from "@/components/ProgressBar.vue";
import { Icon } from "@iconify/vue";

import { useRoute, useRouter } from "vue-router";
import { previousPageName, pageNumber, pagesCount } from "../modules/config";
import Raw from "./Raw.vue";
import { computed } from "vue";

const route = useRoute();
const router = useRouter();

const number = computed(() => {
  return pageNumber(route.name);
});

function previousPage() {
  if (number < 2) {
    return;
  }
  router.push({ name: previousPageName(route.name) });
}
</script>

<template>
  <Raw>
    <div class="max-md:px-3">
      <div class="px-2">
        <div
          class="c-container min-h-20 border-b flex items-center gap-8 sm:gap-20 max-sm:flex-col-reverse max-sm:py-8"
        >
          <ProgressBar :step="number" />
          <div class="flex gap-5 shrink-0 max-sm:w-full">
            <Btn
              class="gap-2 !rounded-2xl max-sm:w-full"
              :disabled="number < 2"
              @click="previousPage"
            >
              <Icon icon="solar:alt-arrow-right-outline" class="h-full w-6" />
              سوال قبل
            </Btn>
            <div
              class="max-sm:w-full border border-gray-300 rounded-md px-5 h-10 flex items-center justify-center font-bold text-pink-500 text-xl whitespace-nowrap"
            >
              سوال {{ number }} از {{ pagesCount() }}
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
  </Raw>
</template>
