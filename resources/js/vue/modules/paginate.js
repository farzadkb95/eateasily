export default function paginate(
    first,
    last,
    current,
    options = {
        next: "next",
        previous: "previous"
    }
) {
    const firstPart = [
        {
            text: options.previous,
            page: current - 1,
            disable: current <= first
        },
        {
            text: first,
            page: first,
            active: current == first
        }
    ];

    const middle = [];
    if (last <= 7) {
        for (let i = 2; i < last; i++) {
            middle.push({
                text: i,
                page: i,
                active: current == i
            });
        }
    } else {
        let arr = [];
        for (let i = current - 2; i <= current + 2; i++) {
            arr.push(i);
        }
        if (arr[0] < first + 1) {
            arr = arr.map((n) => n + (first + 1 - arr[0]));
        }
        if (arr[arr.length - 1] > last - 1) {
            arr = arr.map((n) => n - (arr[arr.length - 1] - last + 1));
        }
        if (arr[0] - first > 1) {
            arr[0] = null;
        }
        if (last - arr[arr.length - 1] > 1) {
            arr[arr.length - 1] = null;
        }
        arr.forEach((item) => {
            middle.push({
                text: item,
                page: item,
                active: current == item
            });
        });
    }

    const lastPart = [
        {
            text: options.next,
            page: current + 1,
            disable: current >= last
        }
    ];
    if (last > 1) {
        lastPart.unshift({
            text: last,
            page: last,
            active: current == last
        });
    }

    return [...firstPart, ...middle, ...lastPart];
}
