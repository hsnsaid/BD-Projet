let img1 = document.getElementById("img1");
let img2 = document.getElementById("img2");
let img3 = document.getElementById("img3");
let imglogin = document.getElementById("img");
let login = document.querySelector('.login');
let arrow = document.querySelector('.arrow');
let img = document.querySelector(".main_image");
img1.addEventListener('click', function () {
    img2.style.display = "none";
    img3.style.display = "none";
    img1.style.marginTop = "68%"
    img1.style.marginBottom = "5%"
    imglogin.style.display = "none";
    login.style.display = "block";
    document.querySelector(".chose").style.display = 'none'
    document.getElementById("type").value = "teacher"
    arrow.setAttribute('style', 'display: block !important;');
    img.setAttribute('style', 'display: block !important;');
    img1.style.backgroundColor = ' #03e9f4'
})
img2.addEventListener('click', function () {
    img1.style.display = "none";
    img3.style.display = "none";
    img2.style.marginTop = "68%"
    img2.style.marginBottom = "5%"
    imglogin.style.display = "none";
    login.style.display = "block";
    document.querySelector(".chose").style.display = 'none'
    document.getElementById("type").value = "student"
    arrow.setAttribute('style', 'display: block !important;');
    img.setAttribute('style', 'display: block !important;');
    img2.style.backgroundColor = ' #03e9f4'
})
img3.addEventListener('click', function () {
    img1.style.display = "none";
    img2.style.display = "none";
    img3.style.marginTop = "68%"
    img3.style.marginBottom = "5%"
    imglogin.style.display = "none";
    login.style.display = "block";
    document.querySelector(".chose").style.display = 'none'
    document.getElementById("type").value = "admin"
    arrow.setAttribute('style', 'display: block !important;');
    img.setAttribute('style', 'display: block !important;');
    img3.style.backgroundColor = ' #03e9f4'
})
arrow.addEventListener('click', function () {
    window.location.reload();
})
//test info login
document.querySelector(".form").addEventListener("submit", (e) => {
    e.preventDefault();
    const inputs = document.querySelectorAll(".form .user > input[name]");
    const form = new FormData();
  
    for (const input of inputs) form.append(input.name, input.value);
  
    const request = new XMLHttpRequest();
    request.open("POST", "back_script/login.php");
    request.send(form);
    request.onload = function () {
    let response = JSON.parse(request.response);
        if (response.status == true) {
            document.querySelector(".hidden").style.display = 'block';
            setTimeout(() => {
                document.querySelector(".hidden").style.display = 'none';
            }, 2000);
        } 
        else 
        window.location = response.location 
        };
  });