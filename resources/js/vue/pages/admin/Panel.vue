<script setup>
import Panel from "../../layouts/Panel.vue";
import Input from "../../components/Input.vue";
import { ref, onMounted, watch } from "vue";
import { getPages, pageNumber } from "../../modules/config";
import Paginate from "../../components/paginate.vue";
import { useRoute, useRouter } from "vue-router";
import Btn from "@/components/Btn.vue";
import { useTestStore } from "../../store/TestStore";
import axios from 'axios'; // Make sure axios is imported

const pages = getPages();
const testStore = useTestStore();
const test = ref(null);
const testCounts = ref(null);
const page = ref(1);
const route = useRoute();
const router = useRouter();
const couponCode = ref('');
const discountType = ref('percentage');
const discountValue = ref(0);
const expiryDate = ref('');
const newPrice = ref(0); // New reactive variable for the price

router.afterEach(() => {
  getTests();
});

// Reactive variable to store the list of coupons
const coupons = ref([]);
// Function to submit the price update
async function submitPriceUpdate() {
  try {
    const response = await axios.post('/api/admin/update-price', {
      price: newPrice.value,
    });
    alert(response.data.message); // Show success message

    // Clear the input after successful submission
    newPrice.value = 0;

    // Optionally, you can fetch the current price after the update
    // fetchCurrentPrice();
  } catch (error) {
    console.error("Failed to update price", error);
    alert(error.response?.data?.message || "Error updating price, please try again.");
  }
}

// Fetch the current price on component mount if needed
async function fetchCurrentPrice() {
  try {
    const response = await axios.get('/api/admin/get-current-price');
    newPrice.value = response.data.price; // Set the current price to the input
  } catch (error) {
    console.error("Failed to fetch current price", error);
  }
}

// Fetch the current price when the component mounts
onMounted(() => {
  fetchCurrentPrice();
});
// Function to fetch coupons from the server
async function fetchCoupons() {
  try {
    console.log('Fetching coupons...');
    const response = await axios.get('/coupons');
    console.log('Coupons fetched:', response.data);
    coupons.value = response.data;
  } catch (error) {
    console.error("Failed to fetch coupons", error);
    alert("Error fetching coupons. Please try again.");
  }
}
// Fetch coupons when the component is mounted
onMounted(() => {
  console.log('Component mounted');
  fetchCoupons();
});

// Watch for changes in the coupons array
watch(coupons, (newCoupons) => {
  console.log('Coupons updated:', newCoupons);
});
async function getTests() {
  await router.isReady();
  page.value = route?.query?.page || 1;
  axios
    .get(`/api/admin/get-tests`, {
      params: { page: page.value, status: route?.query?.status || "all" },
    })
    .then(function (response) {
      test.value = response.data;
    })
    .catch(function (error) {
      console.log(error.message);
    })
    .finally(function () {});
}

function getTestsCount() {
  axios
    .get(`/api/admin/get-tests-count`)
    .then(function (response) {
      testCounts.value = response.data;
    })
    .catch(function (error) {
      console.log(error.message);
    })
    .finally(function () {});
}

function goTo(selectedTest) {
  testStore.test = selectedTest;

  router.push({ name: pages[0][0], query: { test_id: selectedTest.id } });
}

function exportExcel() {
  axios
    .get(`/api/admin/tests-export`, {
      responseType: "arraybuffer",
    })
    .then(function (response) {
      forceFileDownload(response, "tests.xlsx");
    })
    .catch(function (error) {
      console.log(error.message);
    })
    .finally(function () {});
}

function forceFileDownload(response, title) {
  const url = window.URL.createObjectURL(new Blob([response.data]));
  const link = document.createElement("a");
  link.href = url;
  link.setAttribute("download", title);
  document.body.appendChild(link);
  link.click();
}

getTests();
getTestsCount();

// Function to handle form submission
async function submitCoupon() {
  try {
    const response = await axios.post('/coupons', {
      code: couponCode.value,
      discount_type: discountType.value,
      value: discountValue.value,
      expiry_date: expiryDate.value
    });
    alert(response.data.message);
    // Clear the form after successful submission
    couponCode.value = '';
    discountType.value = 'percentage';
    discountValue.value = 0;
    expiryDate.value = '';
    // Optionally, you can fetch the updated list of coupons here
  } catch (error) {
    console.error("Failed to create coupon", error);
    alert(error.response?.data?.message || "Error creating coupon, please try again.");
  }
}


</script>

<template>
  <Panel>
    <div class="w-full p-2">
      <div class="flex flex-wrap gap-3 justify-center">
        <div
          class="p-5 w-40 shadow-md rounded-md bg-pink-500 text-white cursor-pointer"
          @click="router.push({ query: { ...route.query, status: 'all' } })"
        >
          همه:
          {{
            (testCounts?.finished || 0) +
            (testCounts?.in_process || 0) +
            (testCounts?.unfinished || 0)
          }}
        </div>
        <div
          class="p-5 w-40 shadow-md rounded-md bg-green-500 text-white cursor-pointer"
          @click="router.push({ query: { ...route.query, status: 'payed' } })"
        >
          پرداخت شده: {{ testCounts?.payed || 0 }}
        </div>
        <div
          class="p-5 w-40 shadow-md rounded-md bg-green-500 text-white cursor-pointer" style="background-color:slateblue;" 
          @click="router.push({ query: { ...route.query, status: 'failed' } })"
        >
            ورود به درگاه: {{ testCounts?.failed || 0 }}
        </div>
        <div
          class="p-5 w-40 shadow-md rounded-md bg-blue-500 text-white cursor-pointer"
          @click="
            router.push({ query: { ...route.query, status: 'finished' } })
          "
        >
          انجام شده: {{ testCounts?.finished || 0 }}
        </div>
        <div
          class="p-5 w-40 shadow-md rounded-md bg-yellow-500 text-white cursor-pointer"
          @click="
            router.push({ query: { ...route.query, status: 'in_process' } })
          "
        >
          در حال انجام: {{ testCounts?.in_process || 0 }}
        </div>
        <div
          class="p-5 w-40 shadow-md rounded-md bg-red-500 text-white cursor-pointer"
          @click="
            router.push({ query: { ...route.query, status: 'unfinished' } })
          "
        >
          رها شده: {{ testCounts?.unfinished || 0 }}
        </div>
      </div>
      <div class="my-5 flex justify-center">
  <div
  class="shadow-lg rounded-lg inline-block px-5 py-3 bg-green-500 text-white font-semibold transition transform hover:scale-105 hover:bg-green-600 cursor-pointer"
  @click="exportExcel"
  >
    خروجی اکسل
  </div>
</div>

      <!-- <div class="flex justify-center my-5 gap-5">
        <Input class="!w-96 max-w-full !my-0" />
        <button class="bg-blue-500 text-white px-3 rounded-lg">جستجو</button>
      </div> -->
      <div class="flex flex-col gap-2 mt-10" v-if="test?.data">
        <div
          class="border-s-8 shadow-md border-zinc-500 p-2 rounded-sm flex gap-x-5 gap-y-2 flex-wrap odd:bg-zinc-50 even:bg-white"
          :class="{
            '!border-amber-500': item.status == 'in_process',
            '!border-red-500': item.status == 'unfinished',
            '!border-green-500': item.status == 'finished',
          }"
          v-for="(item, index) in test.data"
          :key="index"
        >
          <div class="w-10">{{ item.id }}</div>
          <div class="w-28">سوال {{ pageNumber(item.step) }}</div>
          <div v-if="item.payed" class="w-28 font-bold !text-green-500">
            پرداخت شده
          </div>
          <div v-if="item.failes" class="w-28 font-bold !text-green-500">
            پرداخت نشده
          </div>
          <div
            v-else
            class="w-28 font-bold"
            :class="{
              '!text-amber-500': item.status == 'in_process',
              '!text-red-500': item.status == 'unfinished',
              '!text-green-500': item.status == 'finished',
            }"
          >
            {{
              {
                in_process: "درحال انجام",
                unfinished: "رها شده",
                finished: "تکمیل شده",
              }[item.status]
            }}
          </div>
          <div class="w-32">{{ item.guest?.ip }}</div>
          <div class="w-40">{{ item.phone || item.email }}</div>
          <Btn
            @click="goTo(item)"
            class="cursor-pointer !bg-blue-500 !h-6 rounded-md px-2 text-white"
          >
            مشاهده
          </Btn>
        </div>
      </div>
    </div>

    <Paginate
      class="my-5"
      :last="test?.meta?.last_page"
      :current="test?.meta?.current_page"
    />

    <div class="w-full p-4"  >
      <h2 class="text-xl font-bold mb-4"> کوپن جدید</h2>

      <form @submit.prevent="submitCoupon">
        <div class="mb-3">
          <label for="couponCode" class="form-label">Coupon Code</label>
          <input type="text" v-model="couponCode" id="couponCode" class="form-control" placeholder="Enter coupon code" required />
        </div>

        <div class="mb-3">
          <label for="discountType" class="form-label">Discount Type</label>
          <select v-model="discountType" id="discountType" class="form-select" required>
            <option value="percentage">Percentage</option>
            <option value="amount">Amount</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="discountValue" class="form-label">Discount Value</label>
          <input type="number" v-model="discountValue" id="discountValue" class="form-control" step="0.01" placeholder="Enter discount value" required />
        </div>

        <div class="mb-3">
          <label for="expiryDate" class="form-label">Expiry Date</label>
          <input type="date" v-model="expiryDate" id="expiryDate" class="form-control" />
        </div>

        <Btn type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
          Create Coupon
        </Btn>
      </form>
      <br>

      <div class="w-full p-4">
        <h2 class="text-xl font-bold mb-4">  تغییر قیمت محصول </h2>

        <form @submit.prevent="submitPriceUpdate">
          <div class="mb-3">
            <label for="price" class="form-label">New Price</label>
            <input
              type="number"
              v-model="newPrice"
              id="price"
              class="form-control"
              step="0.01"
              placeholder="Enter new price"
              required
            />
          </div>

          <Btn type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
            Update Price
          </Btn>
        </form>
      </div>
    </div>

      <!-- Coupon List Table -->

   </Panel>
</template>