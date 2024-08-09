<script setup>
import Raw from "../../layouts/Raw.vue";
import Btn from "../../components/Btn.vue";
import IconSideCard from "../../components/IconSideCard.vue";
import { Icon } from "@iconify/vue";
import logo from "@/assets/white-logo.png";
import UserChange from "../../components/UserChange.vue";
import before1 from "@/assets/before1.png";
import after1 from "@/assets/after1.png";
import before2 from "@/assets/before2.jpg";
import after2 from "@/assets/after2.jpg";
import before3 from "@/assets/before3.png";
import after3 from "@/assets/after3.png";
import ScrollX from "../../components/ScrollX.vue";
import UserNote from "../../components/UserNote.vue";
import QuestionDropDown from "../../components/QuestionDropDown.vue";
import { preDigit, scrollTo } from "../../modules/utility";
import { computed, onMounted, ref } from "vue";
import { useTestStore } from "../../store/TestStore";
import roadImage from "@/assets/road.png";

const testStore = useTestStore();
const buy = ref(null);
const counter = ref(600);
const scrollBox = ref(null);

onMounted(() => {
  setInterval(() => {
    counter.value--;
  }, 1000);
});

const counterTime = computed(() => {
  let min = parseInt(counter.value / 60);
  let sec = counter.value % 60;
  return `${preDigit(min)}:${preDigit(sec)}`;
});

function pay() {
  axios
    .post(`/api/weight-less/payment`, {
      test: testStore.test.id,
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
    <div class="bg-gradient-to-t from-green-50 to-white">
      <div class="c-container">
        <div
          class="w-[608px] max-w-full bg-[#faecf4] mx-auto rounded-b-3xl pt-20 pb-20"
        >
          <div class="text-4xl font-black text-center text-[#292929]">
            اسلیو معده کاملا <span class="text-green-500">خانگی</span>
          </div>
          <p class="w-[330px] text-center mx-auto my-5 text-sm">
            شما میتونید با تکنیک کوچک کردن معده با دستورات کاملا خانگی ، سریع ،
            آسان و بدون دردسر لاغری و تناسب اندام را تجربه کنید
          </p>
          <img
            src="@/assets/slive-header.png"
            class="w-[400px] mx-auto -mt-10 -mb-16"
            alt=""
          />
          <div
            class="mx-auto w-72 p-2 border-2 border-white rounded-lg flex items-center text-pink-600"
          >
            <div class="flex items-center gap-2">
              <div class="inline-block w-7 h-7 bg-pink-200 rounded-full"></div>
              <span>اعتبار تخفیف تا:</span>
            </div>
            <div class="ms-auto text-3xl font-black">9:59</div>
          </div>
        </div>
        <div
          ref="buy"
          class="border-2 rounded-2xl border-pink-500 px-5 sm:px-8 py-8 relative w-[500px] max-w-[90%] mx-auto -mt-10 bg-white"
        >
          <div
            class="bg-[#faecf4] absolute -top-4 px-5 py-1 right-1/2 translate-x-1/2 text-md font-bold w-fit whitespace-nowrap rounded-full"
          >
            دریافت ترفنداسلیو معده بدون جراحی
          </div>
          <div class="border-2 rounded-2xl border-green-500 p-3 relative">
            <div
              class="absolute rounded-b-3xl h-9 w-32 bg-green-500 top-0 left-10 bg-[length:100px] bg-center bg-no-repeat"
              :style="{ 'background-image': 'url(' + logo + ')' }"
            ></div>
            <div class="text-2xl font-bold ms-5 max-sm:mt-10">
              اسلیو معده خانگی
            </div>
            <div class="flex mt-3 max-sm:flex-col">
              <div>
                <div class="flex items-center gap-2 my-1">
                  <div
                    class="bg-pink-100 rounded-full w-6 h-6 flex items-center justify-center"
                  >
                    <Icon icon="tabler:plus" class="h-full w-6 text-pink-500" />
                  </div>
                  بدون عوارض و بازگشت وزن
                </div>
                <div class="flex items-center gap-2 my-1">
                  <div
                    class="bg-pink-100 rounded-full w-6 h-6 flex items-center justify-center"
                  >
                    <Icon icon="tabler:plus" class="h-full w-6 text-pink-500" />
                  </div>
                  بدون دارو ، دمنوش
                </div>
                <div class="flex items-center gap-2 my-1">
                  <div
                    class="bg-pink-100 rounded-full w-6 h-6 flex items-center justify-center"
                  >
                    <Icon icon="tabler:plus" class="h-full w-6 text-pink-500" />
                  </div>
                  بدون نیاز به جراحی
                </div>
              </div>
              <div class="sm:ms-auto max-w-[200px] mx-auto">
                <div
                  class="w-16 rounded-t-xl bg-pink-500 text-center mx-auto text-white"
                >
                  قیمت
                </div>
                <div class="p-3 bg-pink-100 rounded-lg">
                  <div class="relative whitespace-nowrap">
                    <hr class="border-red-500 absolute w-full top-3" />
                    <span class="text-xl">85/000/000</span> تومان
                  </div>
                  <div class="text-center">
                    <span class="text-2xl font-bold">رایگان</span>
                  </div>
                </div>
              </div>
            </div>
            <Btn class="w-full mt-10 !rounded-xl !h-14" @click="pay"
              >خرید و دریافت برنامه</Btn
            >
          </div>
        </div>
        <div class="py-10">
          <div
            class="bg-green-100 border-2 border-white w-fit mx-auto p-3 rounded-lg"
          >
            شرایط دریافت تکنیک اسلیو معده خانگی
          </div>
        </div>
      </div>
      <svg class="w-full relative -bottom-[1px]" viewBox="0 0 1976.93 81.4">
        <path
          class="fill-white"
          d="M0 81.4l1976.93 0 0 -81.4c-240.75,47.15 -594.33,76.92 -988.46,76.92 -394.13,0 -747.72,-29.77 -988.47,-76.92l0 81.4z"
        />
      </svg>
    </div>
    <div class="relative flex justify-center">
      <div
        class="bg-white shadow-md w-[360px] h-[200px] relative -top-16 -mb-16 p-4 rounded-xl"
      >
        <div class="w-full h-full bg-slate-100 rounded-xl"></div>
      </div>
    </div>
    <div class="c-box !w-[570px] mx-auto py-10 px-5">
      <div class="font-bold text-center">مسیر چالش اسلیو معده بدون جراحی</div>

      <div
        class="w-[380px] max-w-full mx-auto bg-no-repeat bg-top my-10 relative bg-[length:100%] pt-28 pb-5"
        :style="{ 'background-image': 'url(' + roadImage + ')' }"
      >
        <!-- <img src="@/assets/road.png" /> -->
        <div class="relative h-[240px] flex items-center">
          <div>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم؟</div>
        </div>
        <div class="relative h-[240px] flex items-center ps-10">
          <div>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم؟</div>
        </div>
        <div class="relative h-[240px] flex items-center">
          <div>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم؟</div>
        </div>
        <div class="relative h-[240px] flex items-center ps-10">
          <div>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم؟</div>
        </div>
      </div>
    </div>

    <div class="mt-20">
      <div class="mb-10 text-center text-2xl font-bold">
        تغییرات کاربران ایت ایزیلی
      </div>
      <div
        class="flex max-md:flex-col gap-5 justify-center max-md:items-center"
      >
        <UserChange
          :image1="before1"
          :image2="after1"
          :w1="109"
          :w2="98"
        ></UserChange>
        <UserChange
          :image1="before2"
          :image2="after2"
          :w1="142.5"
          :w2="115"
        ></UserChange>
        <UserChange
          :image1="before3"
          :image2="after3"
          :w1="69"
          :w2="62"
        ></UserChange>
      </div>
    </div>
    <div class="mt-20">
      <div class="mb-10 text-center text-2xl font-bold">
        نظرات کاربران ایت ایزیلی
      </div>
      <div
        class="flex justify-center relative w-[1100px] max-w-full px-2 md:px-20 mx-auto"
      >
        <div
          class="absolute top-1/2 end-2 w-10 h-10 bg-pink-500 rounded-full text-white cursor-pointer"
          @click="scrollBox.swipeEnd(320)"
        >
          <Icon icon="mingcute:left-fill" class="w-full h-full" />
        </div>
        <div
          class="absolute top-1/2 start-2 w-10 h-10 bg-pink-500 rounded-full text-white cursor-pointer"
          @click="scrollBox.swipeStart(320)"
        >
          <Icon icon="mingcute:right-fill" class="w-full h-full" />
        </div>
        <ScrollX ref="scrollBox" class="flex py-10 px-5 w-full">
          <div class="w-[320px] p-2 shrink-0">
            <UserNote></UserNote>
          </div>
          <div class="w-[320px] p-2 shrink-0">
            <UserNote></UserNote>
          </div>
          <div class="w-[320px] p-2 shrink-0">
            <UserNote></UserNote>
          </div>
          <div class="w-[320px] p-2 shrink-0">
            <UserNote></UserNote>
          </div>
        </ScrollX>
      </div>
    </div>
    <div class="mt-20 bg-gradient-to-b from-emerald-100 to-white relative">
      <svg
        viewBox="0 0 276.04 46.08"
        class="w-60 fill-white absolute -top-[5px] right-1/2 translate-x-1/2"
      >
        <path
          class="fil0"
          d="M37.89 14.09c13.24,7.84 19.97,16.4 32.42,22.83 15.86,8.18 25.95,8.95 46.19,9.01 7.1,0.03 14.3,0.1 21.52,0.15 7.22,-0.05 14.42,-0.12 21.52,-0.15 20.24,-0.06 30.32,-0.83 46.19,-9.01 12.45,-6.43 19.18,-14.99 32.42,-22.83 12.22,-7.25 24.5,-8.17 37.89,-8.25l0 -5.84 -138.02 0 -138.02 0 0 5.84c13.39,0.08 25.67,1 37.89,8.25z"
        />
      </svg>
      <div
        class="absolute -top-[5px] right-1/2 translate-x-1/2 font-bold text-xl"
      >
        سوالات متداول
      </div>

      <div class="max-w-full w-[612px] mx-auto pt-20 px-5">
        <div class="flex flex-col gap-5">
          <QuestionDropDown></QuestionDropDown>
          <QuestionDropDown></QuestionDropDown>
          <QuestionDropDown></QuestionDropDown>
          <QuestionDropDown></QuestionDropDown>
          <QuestionDropDown></QuestionDropDown>
        </div>
        <Btn
          class="max-w-full mx-auto mt-10 !rounded-xl !h-14 w-[500px]"
          @click="scrollTo(buy)"
          >دریافت برنامه</Btn
        >
      </div>
    </div>
  </Raw>
  <div class="fixed w-full bottom-0 h-0 -z-10">
    <div
      class="rounded-full w-[500px] mix-w-[500px] aspect-square bg-emerald-50 p-8 absolute bottom-[-360px] ms-[50%] translate-x-1/2"
    >
      <div
        class="rounded-full w-full aspect-square bg-emerald-100 bottom-0 p-8"
      >
        <div
          class="rounded-full w-full aspect-square bg-emerald-200 bottom-0"
        ></div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.gold-gradient {
  background: rgb(237, 197, 70);
  background: linear-gradient(
    111deg,
    rgba(237, 197, 70, 1) 0%,
    rgba(180, 142, 49, 1) 35%,
    rgba(237, 197, 70, 1) 65%,
    rgba(180, 142, 49, 1) 100%
  );
}
</style>
