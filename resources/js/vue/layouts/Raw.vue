<script setup>
import Btn from "@/components/Btn.vue";
import ProgressBar from "@/components/ProgressBar.vue";
import { Icon } from "@iconify/vue";

import { useRoute, useRouter } from "vue-router";
import { previousPageName, pageNumber, pagesCount } from "../modules/config";

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
    <slot></slot>
  </div>
</template>
