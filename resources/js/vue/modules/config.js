// export const steps = [
//     5, 5, 5, 5, 5
// ]
import _ from "lodash";
import axios from "axios";

const data = (await axios.get("/api/weight-less/get-config")).data;

export const pages = data.pages;
export const questions = data.questions;
console.log("pages", pages);

export const steps = pages.map((x) => x.length)
const allPages = _.flatten(pages)

export function nextPageName(currentPageName) {
    let index = allPages.indexOf(currentPageName)
    return allPages[index + 1];
}

export function previousPageName(currentPageName) {
    let index = allPages.indexOf(currentPageName)
    return allPages[index - 1];
}

export function pagesCount() {
    return allPages.length;
}

export function pageNumber(currentPageName) {
    let index = allPages.indexOf(currentPageName);
    return index + 1;
}
