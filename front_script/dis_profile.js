let img = document.getElementById("img")
let close = document.querySelector(".close-icon")
img.addEventListener('click', function () {
    document.querySelector(".main_profile").style.display ='block'
})
close.addEventListener('click', function () {
    document.querySelector(".main_profile").style.display = 'none'
}) 
let display = document.getElementById("profile") 
display.addEventListener('click', function () {
    document.querySelector(".main__profile").style.display = 'block'
    document.querySelector(".main_profile").style.display = 'none'
    document.querySelector(".body").style.height = "100%"
    document.body.style.overflow ='hidden'
})
let display1 = document.getElementById("profile1") 
display1.addEventListener('click', function () {
    document.querySelector(".main__profile").style.display = 'block'
    document.querySelector(".main_profile").style.display = 'none'
    document.querySelector(".body").style.height = "100%"
    document.body.style.overflow ='hidden'
})
let close1 = document.querySelector(".close-icon1")
close1.addEventListener('click', function () {
    document.querySelector(".body").style.height = "0"
    document.querySelector(".main__profile").style.display = 'none'
    document.body.style.overflow ='visible'
})

const request3 = new XMLHttpRequest();
request3.open("GET", "../back_script/Etudaint_profile.php");
request3.send();;

request3.onload = function () {
    const div = document.querySelector(".name");
  const data = JSON.parse(request3.response);
  let divs = "";
  for (const item of data)
  divs += `
  <h3>${item.Etudiant_name}</h3>
  `;
  div.innerHTML = divs;
};