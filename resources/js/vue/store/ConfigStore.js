import { defineStore } from "pinia";
import { ref } from "vue";

export const useConfigStore = defineStore("config-store", () => {
    const config = ref({});

    return {
        config,
    };
});
