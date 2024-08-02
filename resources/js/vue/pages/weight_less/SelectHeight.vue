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
const height = ref(null);
const testStore = useTestStore();

watchEffect(() => {
  height.value = testStore.test?.height;
});

function operation() {
  axios
    .post(`/api/weight-less/select-height`, {
      height: height.value,
      step: route.name,
    })
    .then(function (response) {})
    .catch(function (error) {
      console.log(error.message);
    })
    .finally(function () {});

  router.push({ name: nextPageName(route.name) });
}
</script>

<template>
  <Base>
    <div class="c-box">
      <QuestionBox
        ><p>{{ questions[$route.name]?.question }}</p></QuestionBox
      >

      <form @submit.prevent="operation">
        <Input placeholder="cm (سانتی متر)" v-model="height" :numeric="true">
          <template #start
            ><Icon icon="solar:ruler-outline" class="w-6 h-full"
          /></template>
        </Input>

        <Btn
          class="w-full mt-6 !rounded-xl !h-14"
          type="submit"
          :disabled="!height"
          >ثبت</Btn
        >
      </form>
    </div>
  </Base>
</template>
