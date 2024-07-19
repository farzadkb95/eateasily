<script setup>
import { useRoute, useRouter } from "vue-router";
import { previousPageName } from "../modules/config";

const route = useRoute();
const router = useRouter();
</script>

<template>
  <div class="">
    <header
      class="shadow-emerald-100 shadow-lg flex items-center justify-center h-12 relative"
    >
      <div class="py-2 h-full">
        <img src="@/assets/logo.png" alt="" class="h-full" />
      </div>
    </header>
    <slot></slot>
  </div>
</template>
