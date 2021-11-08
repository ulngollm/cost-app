let form = document.querySelector('form');
form.addEventListener('submit', async function (e) {
    e.preventDefault();

    let formData = new FormData(form);
    var body = {};
    formData.forEach(function (value, key) {
        body[key] = value;
    });

    let result = await fetch(e.currentTarget.action, {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(body)

    })
    if(result.status == 200){
        form.reset();
        setCurrentDate();
        document.querySelector('input').focus();
        console.log('send');

    }

})


function getCurrentDate() {
    let date = new Date();
    let month = formatDateNum(date.getMonth() + 1);
    let day = formatDateNum(date.getDate());
    let year = date.getFullYear();
    return `${year}-${month}-${day}`;

}

function formatDateNum(num) {
    return num < 10 ? '0' + num : num;
}

function setCurrentDate() {
    let date = getCurrentDate();
    document.querySelector('input[type="date"]').value = date;
}

function formatDecimal(elem) {
    elem.value = elem.value.replace(/,/gi, '.');
}
setCurrentDate();

document.querySelector('input[name="sum"]').addEventListener('input', (e) => formatDecimal(e.target));
document.querySelector('input[name="quantity"]').addEventListener('input', (e) => formatDecimal(e.target));
