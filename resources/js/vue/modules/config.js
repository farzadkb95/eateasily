// export const steps = [
//     5, 5, 5, 5, 5
// ]
import _ from "lodash";

export const pages = [
    [
        "weight-less|select-gender",
        "weight-less|select-age",
        "weight-less|select-height",
        "weight-less|select-weight",
        "weight-less|select-sickness",
        "weight-less|show-chart",
    ],
    [
        "weight-less|select-weight-type",
        "weight-less|relish-condition",
        "weight-less|walking-condition",
        "weight-less|sleep-question",
        "weight-less|weight-less-target",
        "weight-less|best-way-weight-less",
        "weight-less|fat-sadly",
    ],
    [
        "weight-less|weight-less-barrier",
        "weight-less|meal-volume",
        "weight-less|cant-stop-eat",
        "weight-less|weight-less-experience",
        "weight-less|your-description",
        "weight-less|agree-question-one",
    ],
    [
        "weight-less|select-lunch",
        "weight-less|cant-loose-food",
        "weight-less|smooth-muscle",
        "weight-less|fingers-form",
        "weight-less|pulse-status",
        "weight-less|your-description-two",
        "weight-less|wrist-size",
    ],
    [
        "weight-less|select-party-food",
        "weight-less|social-relationship",
        "weight-less|community-influence",
    ]
]

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
