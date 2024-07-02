<script setup>
import paginate from "../modules/paginate";
import { defineProps, computed } from "vue";

const props = defineProps({
  first: {
    type: Number,
    default: 1,
  },
  last: {
    type: Number,
    default: 10,
  },
  current: {
    type: Number,
    default: 5,
  },
});

const paginates = computed(() =>
  paginate(props.first, props.last, props.current, {
    next: "بعدی",
    previous: "قبلی",
  })
);
</script>

<template>
  <div class="flex flex-wrap gap-2 justify-center flex-row-reverse">
    <template v-for="(item, index) in paginates" :key="index">
      <div
        v-if="item.disable"
        class="rounded-md py-2 px-3 bg-cool-gray-200 cursor-not-allowed"
      >
        {{ item.text }}
      </div>
      <div
        v-else-if="item.active"
        class="rounded-md py-2 px-3 bg-primary-main text-white shadow-md"
      >
        {{ item.text }}
      </div>
      <div v-else-if="item.page == null" class="inline-flex items-center">
        ...
      </div>
      <router-link
        v-else
        :to="{ query: { page: item.page } }"
        class="rounded-md py-2 px-3 bg-cool-gray-50 hover:bg-cool-gray-100 shadow-md hover:shadow-xl"
      >
        {{ item.text }}
      </router-link>
    </template>
  </div>
</template>
