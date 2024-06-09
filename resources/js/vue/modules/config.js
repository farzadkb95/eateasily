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
    ]
]

export const steps = pages.map((x) => x.length)

export function nextPageName(currentPageName) {
    let allPages = _.flatten(pages)
    let index = allPages.indexOf(currentPageName)
    return allPages[index + 1];
}

export function previousPageName(currentPageName) {
    let allPages = _.flatten(pages)
    let index = allPages.indexOf(currentPageName)
    return allPages[index - 1];
}
