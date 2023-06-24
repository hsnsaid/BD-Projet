const request2 = new XMLHttpRequest();
request2.open("GET", "../back_script/Etudaint_view_cour.php");
request2.send();

request2.onload = function () {
  const section = document.querySelector(".main_courses");
  const data = JSON.parse(request2.response);
  let sections = "";
  for (const item of data)
    sections += `
    <a href="../back_script/Etudaint_modul_type.php?modul=${item.modul_name}">
            <div class="courses">
                <img src="../image/module.png" alt="">
                <span>${item.modul_name}</span>
                <span>${item.enseignant_name}</span>
            </div>
    </a>`;
  section.innerHTML = sections;

};

