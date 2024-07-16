import _ from "lodash";
import axios from "axios";
import { useConfigStore } from "../store/ConfigStore";

export async function getConfig() {
    const configStore = useConfigStore();

    const data = (await axios.get("/api/weight-less/get-config")).data;
    configStore.config.pages = data.pages
    configStore.config.questions = data.questions
    configStore.config.steps = data.pages.map((x) => x.length)
    configStore.config.allPages = _.flatten(data.pages)
}

export const getQuestions = function () {
    const configStore = useConfigStore();

    return configStore.config?.questions;
}

export const getSteps = function () {
    const configStore = useConfigStore();

    return configStore.config?.steps;
}

export const getPages = function () {
    const configStore = useConfigStore();

    return configStore.config?.pages;
}

export function nextPageName(currentPageName) {
    const configStore = useConfigStore();

    let index = configStore.config?.allPages?.indexOf(currentPageName)
    return configStore.config?.allPages?.[index + 1];
}

export function previousPageName(currentPageName) {
    const configStore = useConfigStore();

    let index = configStore.config?.allPages?.indexOf(currentPageName)
    return configStore.config?.allPages?.[index - 1];
}

export function pagesCount() {
    const configStore = useConfigStore();

    return configStore.config?.allPages?.length;
}

export function pageNumber(currentPageName) {
    const configStore = useConfigStore();

    let index = configStore.config?.allPages?.indexOf(currentPageName);
    return index + 1;
}
