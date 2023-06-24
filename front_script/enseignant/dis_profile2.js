const request1 = new XMLHttpRequest();
request1.open("GET", "Enseignant_profile.php");
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