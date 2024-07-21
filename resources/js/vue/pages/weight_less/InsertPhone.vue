<script setup>
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import Btn from "../../components/Btn.vue";
import Input from "../../components/Input.vue";
import { useRoute, useRouter } from "vue-router";
import { getQuestions, nextPageName } from "../../modules/config";
import { ref, watchEffect } from "vue";
import { useTestStore } from "../../store/TestStore";
import { Icon } from "@iconify/vue";

const questions = getQuestions();
const route = useRoute();
const router = useRouter();
const mobile = ref(null);
const email = ref(null);
const code = ref(null);
const testStore = useTestStore();
const inside = ref(true);
const step = ref(1);

watchEffect(() => {
  mobile.value = testStore.test?.phone;
  email.value = testStore.test?.email;
});

function sendCode() {
  axios
    .post(`/api/weight-less/set-phone-or-mail`, {
      inside: inside.value,
      phone: mobile.value,
      email: email.value,
      step: route.name,
    })
    .then(function (response) {
      console.log(response.data);
    })
    .catch(function (error) {
      console.log(error.message);
    })
    .finally(function () {});
  step.value = 2;
  // router.push({ name: nextPageName(route.name) });
}

function approveCode() {
  console.log("approve");
  axios
    .post(`/api/weight-less/approve-code`, {
      code: code.value,
      step: route.name,
    })
    .then(function (response) {
      console.log(response.data);
      router.push({ name: nextPageName(route.name) });
    })
    .catch(function (error) {
      console.log(error.message);
    })
    .finally(function () {});
  // router.push({ name: nextPageName(route.name) });
}

function changeNumber() {
  console.log("change");
  step.value = 1;
  // router.push({ name: nextPageName(route.name) });
}

function nextPage() {
  router.push({ name: nextPageName(route.name) });
}
</script>

<template>
  <Base>
    <div
      class="c-box"
      v-if="testStore.test?.phone_verified || testStore.test?.email_verified"
    >
      <div class="mt-10 text-center text-3xl">
        <div v-if="testStore.test.phone_verified">
          {{ testStore.test.phone }}
        </div>
        <div v-if="testStore.test.email_verified">
          {{ testStore.test.email }}
        </div>
        <div class="text-green-500">تایید شده</div>
      </div>
      <Btn class="w-full mt-6 !rounded-xl !h-14" @click="nextPage"
        >مرحله بعدی</Btn
      >
    </div>
    <div class="c-box" v-else>
      <QuestionBox v-show="step === 1"
        ><p>{{ questions[$route.name]?.question }}</p></QuestionBox
      >
      <div class="flex" v-show="step === 1">
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
      <form @submit.prevent="sendCode" v-show="step === 1">
        <div v-show="inside">
          <small>شماره تماس</small>
          <Input
            class="!mt-0"
            placeholder="09......"
            v-model="mobile"
            dir="ltr"
            :numeric="true"
            :max="11"
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

        <Btn class="w-full mt-6 !rounded-xl !h-14" type="submit">ارسال کد</Btn>
      </form>

      <form @submit.prevent="approveCode" v-show="step === 2">
        <Input
          class="!mt-0"
          placeholder="کد ارسال شده"
          v-model="code"
          dir="ltr"
          :numeric="true"
        >
        </Input>
        <span
          class="text-sky-400 cursor-pointer hover:text-sky-600 inline-block mt-2"
          @click="changeNumber"
        >
          ویرایش شماره
        </span>
        <Btn class="w-full mt-6 !rounded-xl !h-14" type="submit">تایید</Btn>
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
