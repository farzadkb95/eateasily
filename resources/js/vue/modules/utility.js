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
