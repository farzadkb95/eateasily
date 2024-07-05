<script setup>
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import Btn from "../../components/Btn.vue";
import Input from "../../components/Input.vue";
import { useRoute, useRouter } from "vue-router";
import { nextPageName } from "../../modules/config";
import { ref, watchEffect } from "vue";
import { useTestStore } from "../../store/TestStore";

const route = useRoute();
const router = useRouter();
const mobile = ref(null);
const testStore = useTestStore();

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
      <QuestionBox><p>شماره موبایل خود را وارد کنید</p></QuestionBox>

      <form @submit.prevent="operation">
        <Input placeholder="09......" v-model="mobile" dir="ltr" />

        <Btn class="w-full mt-6 !rounded-xl !h-14" type="submit">ثبت</Btn>
      </form>
    </div>
  </Base>
</template>
