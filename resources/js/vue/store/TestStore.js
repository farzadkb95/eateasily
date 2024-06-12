import { defineStore } from "pinia";
import { ref } from "vue";

export const useTestStore = defineStore("test", () => {
    const test = ref();

    return {
        test,
    };
});
