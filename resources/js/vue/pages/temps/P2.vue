<script setup>
import InfoBox from "../../components/InfoBox.vue";
import QuestionBox from "../../components/QuestionBox.vue";
import Base from "../../layouts/Base.vue";
</script>

<template>
  <Base>
    <div class="c-box">
      <QuestionBox><p>چند سالته؟</p></QuestionBox>

      <div class="flex flex-col gap-4">
        <div
          class="bg-zinc-50 border border-zinc-200 rounded-2xl h-16 flex items-center gap-5 overflow-hidden font-semibold text-lg"
        >
          <div class="pt-2 ms-5 h-full relative">
            <div
              class="bg-green-200 rounded-full absolute z-0 w-[3.3rem] -bottom-1 -right-1 aspect-square"
            ></div>
            <img
              src="@/assets/18woman.png"
              alt=""
              class="h-full z-10 relative"
            />
          </div>
          <div>18 تا 30</div>
        </div>
        <div
          class="bg-zinc-50 border border-zinc-200 rounded-2xl h-16 flex items-center gap-5 overflow-hidden font-semibold text-lg"
        >
          <div class="pt-2 ms-5 h-full relative">
            <div
              class="bg-green-200 rounded-full absolute z-0 w-[3.3rem] -bottom-1 -right-1 aspect-square"
            ></div>
            <img
              src="@/assets/18woman.png"
              alt=""
              class="h-full z-10 relative"
            />
          </div>
          <div>18 تا 30</div>
        </div>
        <div
          class="bg-zinc-50 border border-zinc-200 rounded-2xl h-16 flex items-center gap-5 overflow-hidden font-semibold text-lg"
        >
          <div class="pt-2 ms-5 h-full relative">
            <div
              class="bg-green-200 rounded-full absolute z-0 w-[3.3rem] -bottom-1 -right-1 aspect-square"
            ></div>
            <img
              src="@/assets/18woman.png"
              alt=""
              class="h-full z-10 relative"
            />
          </div>
          <div>18 تا 30</div>
        </div>
        <div
          class="bg-zinc-50 border border-zinc-200 rounded-2xl h-16 flex items-center gap-5 overflow-hidden font-semibold text-lg"
        >
          <div class="pt-2 ms-5 h-full relative">
            <div
              class="bg-green-200 rounded-full absolute z-0 w-[3.3rem] -bottom-1 -right-1 aspect-square"
            ></div>
            <img
              src="@/assets/18woman.png"
              alt=""
              class="h-full z-10 relative"
            />
          </div>
          <div>18 تا 30</div>
        </div>
      </div>
    </div>
  </Base>
</template>
