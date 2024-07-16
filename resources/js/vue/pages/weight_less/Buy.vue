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
import { scrollTo } from "../../modules/utility";
import { ref } from "vue";
import { useTestStore } from "../../store/TestStore";

const testStore = useTestStore();
const buy = ref(null);

function pay() {
  axios
    .post(`/api/weight-less/payment`, {
      test: testStore.test.id,
    })
    .then(function (response) {
      console.log(response.data);
      window.location.assign(response.data.payment_url);
    })
    .catch(function (error) {
      console.log(error.message);
    })
    .finally(function () {});
  step.value = 2;
  // router.push({ name: nextPageName(route.name) });
}
</script>

<template>
  <Raw class="bg-white">
    <div class="bg-gradient-to-t from-green-50 to-white">
      <div class="c-container flex max-md:flex-col gap-5 pt-16 md:pb-10">
        <div class="w-full flex justify-center">
          <div class="w-[480px] px-5 leading-normal">
            <h1 class="text-5xl font-black leading-normal">
              کاهش وزن 6 تا 8 کیلوگرم در ماه با
              <span class="text-green-500">ایت ایزیلی</span>
              <img
                src="@/assets/draw.png"
                class="inline-block mx-2 w-24"
                alt=""
              />
            </h1>
            <p class="text-xl mt-5">
              به جمع هــزاران نفری که با کمک ایت ایزیلی به وزن و اندام دلخواهشون
              رسیدند بپیوندید.
            </p>
            <p class="text-red-500 text-xl mt-5">
              همین الان می‌تونید ایت ایزیلی رو با %70 تخفیف دریافت کنید!
            </p>
            <div
              class="bg-red-100 p-3 rounded-md flex text-xl text-red-600 gap-2 items-center mt-5"
            >
              <div
                class="w-10 aspect-square bg-red-300 rounded-full flex items-center justify-center"
              >
                <Icon icon="solar:ticket-sale-outline" class="h-full w-6" />
              </div>
              <div>اعتبار تخفیف تا:</div>
              <div class="font-black text-3xl ms-auto">09:59</div>
            </div>
            <Btn class="w-full mt-5 !rounded-xl !h-14" @click="scrollTo(buy)"
              >دریافت برنامه</Btn
            >
          </div>
        </div>
        <div class="flex items-center justify-center w-full">
          <img src="@/assets/header.png" class="w-[600px] max-w-full" alt="" />
        </div>
      </div>
      <svg class="w-full relative -bottom-[1px]" viewBox="0 0 1976.93 81.4">
        <path
          class="fill-white"
          d="M0 81.4l1976.93 0 0 -81.4c-240.75,47.15 -594.33,76.92 -988.46,76.92 -394.13,0 -747.72,-29.77 -988.47,-76.92l0 81.4z"
        />
      </svg>
    </div>
    <div class="c-box !w-[570px]">
      <div class="text-3xl font-bold text-center mt-10">
        آنچه دریافت می‌کنید
      </div>
      <div class="flex flex-col gap-5 mt-10">
        <IconSideCard>
          <template #image>
            <img src="@/assets/icon-doctor.png" alt="" />
          </template>
          <template #title> دریافت طرح پزشک خصوصی </template>
          <template #default>
            پشتیبان های پزشکی ما هرروز هفته و بدون تعطیلی با شما درارتباط هستند
            تا روند مفید لاغری و مسائل مربوط سلامتی شما رو پیگیری کنند.
          </template>
        </IconSideCard>
        <IconSideCard>
          <template #image>
            <img src="@/assets/icon-apple.png" alt="" />
          </template>
          <template #title> دریافت برنامه لاغری به صورت مادام العمر</template>
          <template #default>
            بر خلاف تمام روش های لاغری، ایت ایزیلی به صورت دوره اینیست و شما
            دسترسی مادام العمر به این روش لاغری و برنامه ها دارید و دیگه نیازی
            به هزینه برای دریافت رژیم نیست چون ایت ایزیلی ایستگاه آخر لاغریه!!
          </template>
        </IconSideCard>
        <IconSideCard>
          <template #image>
            <img src="@/assets/icon-body.png" alt="" />
          </template>
          <template #title> تنظیم سوخت و ساز بدن</template>
          <template #default>
            ایت ایزیلی با روش قدرتمند و علمی ریشه‌ی چاقیت رو درمان می‌کنه و
            متابولیسم بدن شما رو برای چربی سوزی بالاتر تنظیم می‌کنه.
          </template>
        </IconSideCard>
        <IconSideCard>
          <template #image>
            <img src="@/assets/icon-health.png" alt="" />
          </template>
          <template #title>
            استفاده از متدولوژی جهانی GLR لاغری بدون رژیم و ورزش
          </template>
          <template #default>
            بدون محدودیت خوراکی و تمرینات ورزشی می‌تونید لاغری بدون بازگشت رو
            تجربه کنید، علت شکست تمام رژیم ها محدودیت در خوراکی هاست پس دیگه
            اشتباه نکن!!!
          </template>
        </IconSideCard>
        <IconSideCard>
          <template #image>
            <img src="@/assets/icon-fat.png" alt="" />
          </template>
          <template #title>
            برنامه اختصاصی شکست استپ وزنی زیر نظر تیم پزشکی</template
          >
          <template #default>
            اگر دچار استپ وزنی هستید و خیلی وقته دیگه لاغر نشدید، اصلا نگران
            نباشید !!! برنامه اختصاصی شکست استپ وزنی ایت ایزیلی برای شماست
          </template>
        </IconSideCard>
        <IconSideCard>
          <template #image>
            <img src="@/assets/icon-lose-weight.png" alt="" />
          </template>
          <template #title> دریافت تکنیک های لاغری بدون محدودیت</template>
          <template #default>
            هیچ محدودیتی وجود نداره و اصلا نیاز به تهیه غذای رژیمی نیست، سفره‌ت
            اصلا از سفره خانواده جدا نمیشه!!
          </template>
        </IconSideCard>
        <IconSideCard :time="'09:59'" class="mt-5">
          <template #image>
            <img src="@/assets/icon-potion.png" alt="" />
          </template>
          <template #title> دسترسی به فرمول بطری جادویی</template>
          <template #default>
            ارائه دستورات کوچک کردن معده کاملاً خانگی زیر نظر تیم پزشکی
          </template>
        </IconSideCard>
        <IconSideCard :time="'09:59'" class="mt-5">
          <template #image>
            <img src="@/assets/icon-weight.png" alt="" />
          </template>
          <template #title>
            دریافت برنامه تثبیت وزنی زیر نظر تیم پزشکی</template
          >
        </IconSideCard>
      </div>
      <div
        ref="buy"
        class="sm:border-2 rounded-2xl border-pink-500 px-5 sm:px-10 py-12 mt-16 relative"
      >
        <div
          class="bg-white absolute -top-4 sm:px-10 right-1/2 translate-x-1/2 text-2xl font-bold"
        >
          دریافت ایت ایزیلی
        </div>
        <div class="border-2 rounded-2xl border-green-500 p-3 relative">
          <div
            class="absolute rounded-b-3xl h-9 w-32 bg-green-500 top-0 left-10 bg-[length:100px] bg-center bg-no-repeat"
            :style="{ 'background-image': 'url(' + logo + ')' }"
          ></div>
          <div class="text-2xl font-bold ms-5">ایت ایزیلی</div>
          <div class="flex mt-3">
            <div>
              <div class="flex items-center gap-2 my-1">
                <div
                  class="bg-pink-100 rounded-full w-6 aspect-square flex items-center justify-center"
                >
                  <Icon icon="tabler:plus" class="h-full w-6 text-pink-500" />
                </div>
                پشتیبانی پزشکی
              </div>
              <div class="flex items-center gap-2 my-1">
                <div
                  class="bg-pink-100 rounded-full w-6 aspect-square flex items-center justify-center"
                >
                  <Icon icon="tabler:plus" class="h-full w-6 text-pink-500" />
                </div>
                محصول بطری جادویی
              </div>
            </div>
            <div class="ms-auto">
              <span class="text-2xl font-bold">983/000</span> تومان
            </div>
          </div>
        </div>
        <Btn class="w-full mt-10 !rounded-xl !h-14" @click="pay"
          >خرید و دریافت برنامه</Btn
        >
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
      <div class="flex justify-center">
        <ScrollX class="flex py-10 px-5 w-[1000px]">
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
