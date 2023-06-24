const request2 = new XMLHttpRequest();
request2.open("GET", "../back_script/Etudaint_contact.php");
request2.send();

request2.onload = function () {
  const section = document.querySelector("main");
  const data = JSON.parse(request2.response);
  let sections = "";
  for (const item of data)
      sections += `
      <div class="contact">
    <div class="image"></div>
    <div class="main_details">
      <div class="details">
        <i class="fa fa-book" ></i>
        <span>${item.modul_name}</span>
      </div>
      <div class="details">
        <i class="fa fa-user" ></i>
        <span>Dr.${item.enseignant_name}</span>
      </div>
      <div class="details">
        <i class="fa fa-envelope"></i>
        <span>${item.Email}</span>
      </div>
    </div>
    </div>`;
  section.innerHTML = sections;
};