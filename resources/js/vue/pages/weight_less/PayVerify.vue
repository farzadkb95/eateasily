<script setup>
import Raw from "../../layouts/Raw.vue";
import Btn from "../../components/Btn.vue";
import { Icon } from "@iconify/vue";
import { useRoute } from "vue-router";
import { ref } from "vue";

const route = useRoute();
const payment = ref(null);

function payVerify() {
  axios
    .post(`/api/weight-less/payment/verify`, {
      payment: route.query.payment,
      authority: route.query.Authority,
      status: route.query.Status,
    })
    .then(function (response) {
      payment.value = response.data.data;
    })
    .catch(function (error) {
      console.log(error.message);
    })
    .finally(function () {});
  // router.push({ name: nextPageName(route.name) });
}

payVerify();

function pay() {
  axios
    .post(`/api/weight-less/payment`, {
      test: payment.value.data_id,
    })
    .then(function (response) {
      window.location.assign(response.data.payment_url);
    })
    .catch(function (error) {
      console.log(error.message);
    })
    .finally(function () {});
}
</script>

<template>
  <Raw class="bg-white">
    <div class="w-[480px] max-w-full mx-auto pt-10 text-center px-2">
      <div v-if="payment == null">
        <div class="flex items-center justify-center gap-5 text-gray-500">
          <Icon
            icon="solar:cloud-download-broken"
            class="w-24 h-full shrink-0"
          />
          <div class="text-3xl font-black">در حال بررسی</div>
        </div>
      </div>

      <div v-else-if="payment?.status == 'success'">
        <div class="flex items-center justify-center gap-5 text-green-500">
          <Icon icon="solar:file-smile-broken" class="w-24 h-full shrink-0" />
          <div class="text-3xl font-black">پرداخت موفق</div>
        </div>
        <div class="mt-5">
          <div>
            شناسه پرداخت:
            <span class="text-lg font-bold">{{ payment.code }}</span>
          </div>
          <div>
            شماره پیگیری:
            <span class="text-lg font-bold">{{ payment.pay_ref }}</span>
          </div>
          <div class="font-bold">
            لطفا شناسه پرداخت و شماره پیگیری را یادداشت کنید.
          </div>

          <div class="text-green-600 mt-5 text-lg font-bold">
            همکاران با به زودی با شما تماس می‌گیرند
          </div>
        </div>
      </div>

      <div v-else>
        <div class="flex items-center justify-center gap-5 text-red-500">
          <Icon icon="solar:sad-square-broken" class="w-24 h-full shrink-0" />
          <div class="text-3xl font-black">پرداخت ناموفق</div>
        </div>
        <div class="mt-5">
          <div>
            شناسه پرداخت:
            <span class="text-lg font-bold">{{ payment.code }}</span>
          </div>
          <div class="font-bold">
            لطفا شناسه پرداخت و شماره پیگیری را یادداشت کنید.
          </div>

          <div class="text-red-600 mt-5">
            اگر از حساب شما پول کسر شده کمتر از 72 ساعت باز می‌گردد.
          </div>
        </div>

        <Btn class="my-5 w-full" @click="pay">پرداخت مجدد</Btn>
      </div>

      <div class="flex items-center mt-5 gap-5">
        <hr class="w-full" />
        <div class="flex gap-2 shrink-0">
          <a target="_blank" href="https://t.me/eateasily"
            ><img src="@/assets/telegram.png" class="h-6" alt=""
          /></a>
          <a target="_blank" href="https://wa.me/+989336374188"
            ><img src="@/assets/whatsapp.png" class="h-6" alt=""
          /></a>
          <a target="_blank" href="https://eitaa.com/eateasily"
            ><img src="@/assets/eitaa.svg" class="h-6" alt=""
          /></a>
          <a target="_blank" href="https://ble.ir/eateasily"
            ><img src="@/assets/bale-color.png" class="h-6" alt=""
          /></a>
          <a target="_blank" href="https://www.instagram.com/eateasilyofficial/"
            ><img src="@/assets/instagram.png" class="h-6" alt=""
          /></a>
        </div>
        <hr class="w-full" />
      </div>
      <div class="mt-10">
        <div class="flex gap-3 md:gap-5">
          <div
            class="py-2 rounded-md border border-zinc-300 bg-zinc-50 text-zinc-900 w-1/2 flex gap-2 justify-center items-center text-nowrap"
          >
            <Icon
              icon="solar:phone-linear"
              class="w-6 h-full text-green-500 shrink-0"
            />
            021-123456789
          </div>

          <div
            class="py-2 rounded-md border border-zinc-300 bg-zinc-50 text-zinc-900 w-1/2 flex gap-2 justify-center items-center text-nowrap"
          >
            <Icon
              icon="hugeicons:mail-02"
              class="w-6 h-full text-green-500 shrink-0"
            />
            sample@gmail.com
          </div>
        </div>
        <div
          class="p-5 flex rounded-md border border-zinc-300 bg-zinc-50 text-zinc-900 mt-3 md:mt-5"
        >
          <div class="flex gap-2 items-center">
            <Icon
              icon="hugeicons:location-01"
              class="w-6 h-full text-green-500"
            />
            آدرس:
          </div>
          <p>
            لورم ایپسوم متن ساختگی تولید سادگی نامفهوم صنعت چاپ و با استفاده از
            طراحان گرافیک است.
          </p>
        </div>
      </div>
    </div>
  </Raw>
</template>
