const request = new XMLHttpRequest();
request.open("GET", "../../back_script/Enseignant _Model_view.php");
request.send();
request.onload = function () {
  const section = document.querySelector(".main_courses");
  const data = JSON.parse(request.response);
  let sections = "";
  for (const item of data)
    sections += `
    <a href="../../back_script/Enseignant_modul_type.php?modul=${item.modul_name}">
        <div class="courses">
            <img src="../../image/enseignant_module.png" alt="">
            <span>${item.modul_niveau}</span>
            <span>${item.modul_name}</span>
        </div>
    </a>`
  section.innerHTML = sections;
};

const request4 = new XMLHttpRequest();
request4.open("GET", "../../back_script/Enseignant _Model_view.php");
request4.send();
request4.onload = function () {
  const select = document.getElementById("select");
  const data = JSON.parse(request4.response);
  let option = "";
  for (const item of data)
    option += `
 <option value="${item.modul_name}">${item.modul_name}</option>`
    ;
 select.innerHTML = option;
};

