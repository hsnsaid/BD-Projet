const request1 = new XMLHttpRequest();
request1.open("GET", "../back_script/Etudaint_profile.php");
request1.send();


request1.onload = function () {
  const section = document.querySelector(".main");
  const data = JSON.parse(request1.response);
  let sections = "";
  for (const item of data)
      sections += `
    <div class="photo">
      <div class="photo_position">
        <img src="../image/student.png" alt="">
        <div class="photo__position">
          <h3>Student ID</h3>
          <input type="text" readonly value="${item.id}">
          <h3>Section</h3>
          <input type="text" readonly value="1">
          <h3>Group</h3>
          <input type="text" readonly value="${item.Etudiant_Group}">
        </div>
      </div>
    </div>
    <hr>
    <h3><i class="far fa-clone pr-1"></i>General Information</h3>
    <div class="main_information">
      <div class="information">
        <h3>Full Name</h3>
        <input type="text" readonly value="${item.Etudiant_name}">
        <h3>Level</h3>
        <input type="text" readonly value="${item.niveau}">
      </div>
      <div class="information">
        <h3>Date of Birdth</h3>
        <input type="date" readonly value="${item.date_of_birth}">
        <h3>Place of Birdth</h3>
        <input type="text" readonly value="${item.Place_of_birth}">
      </div>
    </div>`;
  section.innerHTML = sections;
};