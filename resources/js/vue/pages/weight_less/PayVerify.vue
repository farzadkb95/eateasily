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
    .finally(function () { });
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
    .finally(function () { });
}
</script>

<template>
  <Raw class="bg-white">
    <div class="w-[480px] max-w-full mx-auto pt-10 text-center px-2">
      <div v-if="payment == null">
        <div class="flex items-center justify-center gap-5 text-gray-500">
          <Icon icon="solar:cloud-download-broken" class="w-24 h-full shrink-0" />
          <div class="text-3xl font-black">در حال بررسی</div>
        </div>
      </div>

      <div v-else-if="payment?.status == 'success'">
        <div class="flex items-center justify-center gap-5 text-green-500">
          <Icon icon="solar:file-smile-broken" class="w-16 h-16 shrink-0" />
          <div class="text-2xl font-black">پرداخت موفق</div>
        </div>
        <div class="mt-3">
          <div>
            شناسه پرداخت:
            <span class="text-base font-bold">{{ payment.code }}</span>
          </div>
          <div>
            شماره پیگیری:
            <span class="text-base font-bold">{{ payment.pay_ref }}</span>
          </div>
          <div class="text-base font-bold">
            لطفا شناسه پرداخت و شماره پیگیری را یادداشت کنید.
          </div>
          <div class="text-red-500 mt-2 text-lg font-bold">
            همین الان از صفحه عکس بگیر و برای پشتیبانت ارسال کن 👇🏻
            <br>
            ⬇️
          </div>
          <div class="text-[#41a89d] mt-2 text-lg font-bold text-center">
            <button onclick="window.open('https://t.me/OurMethod', '_blank')"
              class="align-middle inline-block rounded-lg px-2 py-1 bg-blue-600 text-blue-100 hover:bg-blue-600 duration-300">
              <span class="align-middle">پشتیبان در تلگرام</span>
              <img src="@/assets/telegram.png" class="h-6 inline" alt="Telegram" />
            </button>
          </div>

          <div class=" mt-5 text-lg font-bold text-center">
            <button class="align-middle inline-block rounded-lg px-5 py-1 text-blue-100 bg-[#41a89d] duration-300"
              onclick="window.open('https://ble.ir/eat_vip4', '_blank')">
              <span class="align-middle">پشتیبان در بله</span>
              <img src="@/assets/bale-color.png" class="h-6 inline" alt="bale" />
            </button>
          </div>

          <div class="text-[#e37600] mt-5 text-lg font-bold text-center">
            <button class="align-middle inline-block rounded-lg px-5 py-1 text-blue-100 bg-black duration-300"
              onclick="window.open('https://eitaa.com/eat_vip4', '_blank')">
              <span class="align-middle">پشتیبان در ایتا</span>
              <img src="@/assets/eitaa.svg" class="h-6 inline" alt="eita" />
            </button>
          </div>
          <!-- <div class="text-[#2aabee] mt-5 text-lg font-bold text-center">
        
        <a target="_blank" href="https://t.me/OurMethod" class="align-middle inline-block">
          <span class="align-middle">
            پشتیبان در تلگرام
          </span>
          <img src="@/assets/telegram.png" class="h-6 inline" alt="Telegram" />
        </a>
        </div>
        <div class="text-[#41a89d] mt-5 text-lg font-bold text-center">
          
        <a target="_blank" href="https://ble.ir/eat_vip4" class="align-middle inline-block">
          <span class="align-middle">
            پشتیبان در بله
          </span>
          <img src="@/assets/bale-color.png" class="h-6 inline" alt="bale" />
        </a>
        </div>
        <div class="text-[#e37600] mt-5 text-lg font-bold text-center">
         
        <a target="_blank" href="https://eitaa.com/eat_vip4" class="align-middle inline-block">
          <span class="align-middle">
            پشتیبان در ایتا
          </span>
          <img src="@/assets/eitaa.svg" class="h-6 inline" alt="eita" />
        </a>
        </div> -->
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

      <!-- <div class="flex items-center mt-5 gap-5">
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
      </div> -->
      <div class="mt-10">
        <div class="p-5 flex rounded-md border border-zinc-300 bg-zinc-50 text-zinc-900 mt-3 md:mt-5">
          <div class="flex gap-2 items-center">
            <Icon icon="hugeicons:location-01" class="w-6 h-full text-green-500" />
            آدرس:
          </div>
          <div class="items-center">
            <p>
              امارات متحده عربی، دوبی، جمیرا،<br> پی او باکس شماره ۵۳۵۶۰
            </p>
            <p>
              Jumeirah, Dubai, UAE. P.o.box: 53560
            </p>
          </div>
        </div>
        <div class="flex gap-3 md:gap-5 mt-3">
          <a href="tel:02128421368"
            class="py-2 rounded-md border border-zinc-300 bg-zinc-50 text-zinc-900 w-1/2 flex gap-2 justify-center items-center text-nowrap">
            <Icon icon="solar:phone-linear" class="w-6 h-full text-green-500 shrink-0" />
            021-28421368
          </a>

          <a href="mailto:info@eateasily.net"
            class="py-2 rounded-md border border-zinc-300 bg-zinc-50 text-zinc-900 w-1/2 flex gap-2 justify-center items-center text-nowrap">
            <Icon icon="hugeicons:mail-02" class="w-6 h-full text-green-500 shrink-0" />
            info@eateasily.net
          </a>
        </div>

      </div>
    </div>
  </Raw>
</template>
<style scoped>
/* Define the pulsing animation */
@keyframes pulse {
  0% {
    transform: scale(1);
  }

  50% {
    transform: scale(1.1);
  }

  100% {
    transform: scale(1);
  }
}

/* Apply the pulsing effect to buttons */
button {
  animation: pulse 1s infinite;
  /* border: none; */
  /* background: transparent; */
  cursor: pointer;
}

button img {
  vertical-align: middle;
}

/* Add a slight hover effect */
button:hover {
  animation: pulse 1s infinite;
}
</style>