<script setup>
import InfoBox from "../../components/InfoBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import ItemBox from "../../components/ItemBox.vue";
import { useRoute, useRouter } from "vue-router";
import { nextPageName } from "../../modules/config";
import { useTestStore } from "../../store/TestStore";

const route = useRoute();
const router = useRouter();
const testStore = useTestStore();

function operation(index) {
  axios
    .post(`/api/weight-less/set-other`, {
      value: index,
      step: route.name,
    })
    .then(function (response) {
      console.log(response.data);
    })
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
      <QuestionBox class="mb-10"
        ><p>
          کدام مورد حجم وعده های غذایی شما را بهتر نشان می‌دهد
        </p></QuestionBox
      >

      <div class="flex flex-col gap-4">
        <ItemBox
          class="px-5 !text-lg"
          @click="operation(1)"
          :select="testStore.test?.other?.[route.name] == 1"
        >
          <div class="h-full py-2">
            <img src="@/assets/dish1.png" alt="" class="h-full z-10 relative" />
          </div>
          <p>1/4 ظرف</p>
        </ItemBox>
        <ItemBox
          class="px-5 !text-lg"
          @click="operation(2)"
          :select="testStore.test?.other?.[route.name] == 2"
        >
          <div class="h-full py-2">
            <img src="@/assets/dish2.png" alt="" class="h-full z-10 relative" />
          </div>
          <p>نصف ظرف</p>
        </ItemBox>
        <ItemBox
          class="px-5 !text-lg"
          @click="operation(3)"
          :select="testStore.test?.other?.[route.name] == 3"
        >
          <div class="h-full py-2">
            <img src="@/assets/dish3.png" alt="" class="h-full z-10 relative" />
          </div>
          <p>یک ظرف پر غذا</p>
        </ItemBox>
        <ItemBox
          class="px-5 !text-lg"
          @click="operation(4)"
          :select="testStore.test?.other?.[route.name] == 4"
        >
          <div class="h-full py-2 flex">
            <img src="@/assets/dish3.png" alt="" class="h-full z-10 relative" />
            <img src="@/assets/dish3.png" alt="" class="h-full z-10 relative" />
          </div>
          <p>2 ظرف پر غذا</p>
        </ItemBox>
      </div>
    </div>
  </Base>
</template>
