export function nf(number) {
    return new Intl.NumberFormat("en-IR").format(number);
}

export function scrollTo(el) {
    window.scrollTo(
        0,
        el.getBoundingClientRect().top +
        document.documentElement.scrollTop -
        15
    );
}

export function enNum(number) {
    number = number.split("");
    let arr = {
        '۰': "0",
        '۱': "1",
        '۲': "2",
        '۳': "3",
        '۴': "4",
        '۵': "5",
        '۶': "6",
        '۷': "7",
        '۸': "8",
        '۹': "9",
    }
    number = number.map((x) => {
        return arr[x] || x
    })
    return number.join("");
}

export function preDigit(number, digit = 2) {
    if (('' + number).length < digit) {
        return '0'.repeat(digit - ('' + number).length) + number
    }
    return number;
}
