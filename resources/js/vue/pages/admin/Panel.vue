<script setup>
import Panel from "../../layouts/Panel.vue";
import Input from "../../components/Input.vue";
import { ref } from "vue";
import { pageNumber } from "../../modules/config";
import Paginate from "../../components/paginate.vue";
import { useRoute, useRouter } from "vue-router";

const test = ref(null);
const testCounts = ref(null);
const page = ref(1);
const route = useRoute();
const router = useRouter();

router.afterEach(() => {
  getTests();
});

async function getTests() {
  await router.isReady();
  page.value = route?.query?.page || 1;
  axios
    .get(`/api/admin/get-tests`, {
      params: { page: page.value, status: route?.query?.status || "all" },
    })
    .then(function (response) {
      console.log(response.data);
      test.value = response.data;
    })
    .catch(function (error) {
      console.log(error.message);
    })
    .finally(function () {});
}

function getTestsCount() {
  axios
    .get(`/api/admin/get-tests-count`)
    .then(function (response) {
      console.log(response.data);
      testCounts.value = response.data;
    })
    .catch(function (error) {
      console.log(error.message);
    })
    .finally(function () {});
}

getTests();
getTestsCount();
</script>

<template>
  <Panel>
    <div class="w-full p-2">
      <div class="flex flex-wrap gap-3 justify-center">
        <div
          class="p-5 w-40 shadow-md rounded-md bg-pink-500 text-white cursor-pointer"
          @click="router.push({ query: { ...route.query, status: 'all' } })"
        >
          همه:
          {{
            (testCounts?.finished || 0) +
            (testCounts?.in_process || 0) +
            (testCounts?.unfinished || 0)
          }}
        </div>
        <div
          class="p-5 w-40 shadow-md rounded-md bg-green-500 text-white cursor-pointer"
          @click="router.push({ query: { ...route.query, status: 'payed' } })"
        >
          پرداخت شده
        </div>
        <div
          class="p-5 w-40 shadow-md rounded-md bg-blue-500 text-white cursor-pointer"
          @click="
            router.push({ query: { ...route.query, status: 'finished' } })
          "
        >
          انجام شده: {{ testCounts?.finished || 0 }}
        </div>
        <div
          class="p-5 w-40 shadow-md rounded-md bg-yellow-500 text-white cursor-pointer"
          @click="
            router.push({ query: { ...route.query, status: 'in_process' } })
          "
        >
          در حال انجام: {{ testCounts?.in_process || 0 }}
        </div>
        <div
          class="p-5 w-40 shadow-md rounded-md bg-red-500 text-white cursor-pointer"
          @click="
            router.push({ query: { ...route.query, status: 'unfinished' } })
          "
        >
          رها شده: {{ testCounts?.unfinished || 0 }}
        </div>
      </div>
      <!-- <div class="flex justify-center my-5 gap-5">
        <Input class="!w-96 max-w-full !my-0" />
        <button class="bg-blue-500 text-white px-3 rounded-lg">جستجو</button>
      </div> -->
      <div class="flex flex-col gap-2 mt-10" v-if="test?.data">
        <div
          class="border border-zinc-500 p-2 rounded-md flex gap-x-5 gap-y-2 flex-wrap bg-zinc-50"
          :class="{
            '!border-amber-500 !bg-amber-50': item.status == 'in_process',
            '!border-red-500 !bg-red-50': item.status == 'unfinished',
            '!border-green-500 !bg-green-50': item.status == 'finished',
          }"
          v-for="(item, index) in test.data"
          :key="index"
        >
          <div class="w-10">{{ item.id }}</div>
          <div class="w-20">سوال {{ pageNumber(item.step) }}</div>
          <div class="w-20">
            {{
              {
                in_process: "درحال انجام",
                unfinished: "رها شده",
                finished: "تکمیل شده",
              }[item.status]
            }}
          </div>
          <div>مشاهده</div>
        </div>
      </div>
    </div>

    <Paginate
      class="my-5"
      :last="test?.meta?.last_page"
      :current="test?.meta?.current_page"
    />
  </Panel>
</template>
