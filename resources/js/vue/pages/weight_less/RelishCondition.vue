<script setup>
import InfoBox from "../../components/InfoBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
import Btn from "../../components/Btn.vue";
import Input from "../../components/Input.vue";
import ItemBox from "../../components/ItemBox.vue";
import ItemCheckBox from "../../components/ItemCheckBox.vue";
import { ref } from "vue";
import { useRoute, useRouter } from "vue-router";
import { nextPageName } from "../../modules/config";

const route = useRoute();
const router = useRouter();

function operation() {
  router.push({ name: nextPageName(route.name) });
}
</script>

<template>
  <Base>
    <div class="c-box">
      <QuestionBox class="mb-3"
        ><p>در چه شرایطی میل شما به غذا خوردن بیشتر است؟</p></QuestionBox
      >

      <InfoBox class="">
        <p>
          حقیقت علمی : میدونستی خیلی از اوقات غذا میخوری در حالی که بدنت اصلا
          بهش نیاز نداشته؟!
        </p>
      </InfoBox>

      <div class="flex flex-col gap-4">
        <ItemBox class="px-5 !text-lg" @click="operation">
          <p>وقتی خسته، غمگین، نگرانم و یا استرس دارم</p>
        </ItemBox>
        <ItemBox class="px-5 !text-lg" @click="operation">
          <p>وقتی از آخرین وعده غذاییم زمان زیادی گذشته</p>
        </ItemBox>
      </div>
    </div>
  </Base>
</template>
