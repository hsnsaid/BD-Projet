document.querySelector(".form").addEventListener("submit", (e) => {
    e.preventDefault();
    const inputs = document.querySelectorAll(".form select[name],.form textarea[name]");
    const form = new FormData();
    for (const input of inputs) form.append(input.name, input.value);
    const request = new XMLHttpRequest();
    request.open("POST", "../../back_script/Admin_add_news.php");
    request.send(form);
    request.onloadstart = function () {
        JSON.parse(request);
    };
    window.location.reload();
});
let text = document.getElementById("text-field");
let total = document.getElementById("total");
let remained = document.getElementById("remained");
let max = 255;
text.addEventListener("keyup", function () {
    total.innerHTML = text.value.length;
    remained.innerHTML = max - text.value.length;
})