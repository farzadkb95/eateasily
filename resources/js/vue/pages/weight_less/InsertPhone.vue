<script setup>
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import Btn from "../../components/Btn.vue";
import Input from "../../components/Input.vue";
import { useRoute, useRouter } from "vue-router";
import { nextPageName } from "../../modules/config";
import { ref, watchEffect } from "vue";
import { useTestStore } from "../../store/TestStore";
import { Icon } from "@iconify/vue";

const route = useRoute();
const router = useRouter();
const mobile = ref(null);
const email = ref(null);
const testStore = useTestStore();
const inside = ref(true);

// watchEffect(() => {
//   height.value = testStore.test?.height;
// });

function operation() {
  router.push({ name: nextPageName(route.name) });
}
</script>

<template>
  <Base>
    <div class="c-box">
      <QuestionBox><p>کجا زندگی می‌کنید؟</p></QuestionBox>
      <div class="flex">
        <div
          class="w-1/2 flex items-center gap-2 justify-center cursor-pointer"
          @click="inside = true"
        >
          <div
            class="border rounded-full border-gray-400 p-[2px] w-6 h-6"
            :class="{ '!border-pink-500': inside }"
          >
            <div
              class="rounded-full bg-pink-500 w-full h-full"
              v-if="inside"
            ></div>
          </div>
          داخل کشور
        </div>
        <div
          class="w-1/2 flex items-center gap-2 justify-center cursor-pointer"
          @click="inside = false"
        >
          <div
            class="border rounded-full border-gray-400 p-[2px] w-6 h-6"
            :class="{ '!border-pink-500': !inside }"
          >
            <div
              class="rounded-full bg-pink-500 w-full h-full"
              v-if="!inside"
            ></div>
          </div>
          خارج کشور
        </div>
      </div>
      <hr class="my-5" />
      <form @submit.prevent="operation">
        <div v-show="inside">
          <small>شماره تماس</small>
          <Input
            class="!mt-0"
            placeholder="09......"
            v-model="mobile"
            dir="ltr"
          >
            <template #start>
              <Icon icon="solar:phone-linear" class="w-6 h-full" />
            </template>
          </Input>
        </div>
        <div v-show="!inside">
          <div class="text-center my-5 text-lg">
            آدرس ایمیل خود را وارد کنید
          </div>
          <small>ایمیل</small>
          <Input
            class="!mt-0"
            placeholder="sample@gmail.com"
            v-model="email"
            dir="ltr"
          >
            <template #start>
              <Icon icon="hugeicons:mail-02" class="w-6 h-full" />
            </template>
          </Input>
        </div>

        <Btn class="w-full mt-6 !rounded-xl !h-14" type="submit">ثبت</Btn>
      </form>
      <p
        class="mt-5 p-5 border-green-500 bg-green-100 border rounded-lg"
        v-show="inside"
      >
        برات آنالیز کـامل قراره پیامک بشه ، پس شماره‌ت رو وارد کن تا کلی اطلاعات
        مفید راجع به شرایط بدنیت برات ارسال کنیم
      </p>
    </div>
  </Base>
</template>
