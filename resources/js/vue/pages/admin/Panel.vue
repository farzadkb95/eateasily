<script setup>
import Panel from "../../layouts/Panel.vue";
import Input from "../../components/Input.vue";
</script>

<template>
  <Panel>
    <div class="w-full p-2">
      <div class="flex flex-wrap gap-3 justify-center">
        <div class="p-5 w-40 shadow-md rounded-md bg-pink-500 text-white">
          همه
        </div>
        <div class="p-5 w-40 shadow-md rounded-md bg-green-500 text-white">
          پرداخت شده
        </div>
        <div class="p-5 w-40 shadow-md rounded-md bg-blue-500 text-white">
          انجام شده
        </div>
        <div class="p-5 w-40 shadow-md rounded-md bg-yellow-500 text-white">
          در حال انجام
        </div>
        <div class="p-5 w-40 shadow-md rounded-md bg-red-500 text-white">
          رها شده
        </div>
      </div>
      <div class="flex justify-center my-5 gap-5">
        <Input class="!w-96 max-w-full !my-0" />
        <button class="bg-blue-500 text-white px-3 rounded-lg">جستجو</button>
      </div>
      <div class="flex flex-col gap-2 mt-10">
        <div
          class="border border-green-500 p-2 rounded-md flex gap-x-5 gap-y-2 flex-wrap bg-green-50"
        >
          <div class="w-10">1</div>
          <div class="w-20">سوال 29</div>
          <div class="w-20">تمام شده</div>
          <div>مشاهده</div>
        </div>
        <div
          class="border border-red-500 p-2 rounded-md flex gap-x-5 gap-y-2 flex-wrap bg-red-50"
        >
          <div class="w-10">1</div>
          <div class="w-20">سوال 29</div>
          <div class="w-20">رها شده</div>
          <div>مشاهده</div>
        </div>
        <div
          class="border border-blue-500 p-2 rounded-md flex gap-x-5 gap-y-2 flex-wrap bg-blue-50"
        >
          <div class="w-10">1</div>
          <div class="w-20">سوال 29</div>
          <div class="w-20">در حال انجام</div>
          <div>مشاهده</div>
        </div>
      </div>
    </div>
  </Panel>
</template>
