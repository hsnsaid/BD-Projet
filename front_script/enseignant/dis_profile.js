const request1 = new XMLHttpRequest();
request1.open("GET", "../../back_script/Enseignant_profile.php");
request1.send();;

request1.onload = function () {
    const div = document.querySelector(".name");
  const data = JSON.parse(request1.response);
  let divs = "";
  for (const item of data)
  divs += `
  <h3>Dr.${item.enseignant_name}</h3>
  `;
  div.innerHTML = divs;
};

let img = document.getElementById("img")
let close = document.querySelector(".close-icon")
img.addEventListener('click', function () {
    document.querySelector(".main_profile").style.display ='block'
})
close.addEventListener('click', function () {
    document.querySelector(".main_profile").style.display = 'none'
}) 

document.getElementById("add_ressource").addEventListener("click", function () {
    document.querySelector(".login").style.display = 'block'
    document.querySelector(".body-").style.height = "100%"
})
document.querySelector(".close-icon-").addEventListener('click', function () {
    document.querySelector(".login").style.display = 'none'
    document.querySelector(".body-").style.height = "0"
})