const form = document.querySelector("form");
form.addEventListener("submit", (e) => {
    e.preventDefault();
    const data = new FormData(form);
    const xhr= new XMLHttpRequest();
    xhr.open("POST","../../back_script/Admin_add_news.php");
    xhr.send(data);
});
    const text = document.getElementById("text-field");
    const total = document.getElementById("total");
    const remained = document.getElementById("remained");
    let max = 255;
    text.addEventListener("keyup", function () {
    total.innerHTML = text.value.length;
    remained.innerHTML = max - text.value.length;
})