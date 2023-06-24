async function lol(){
  const f= await fetch ("../back_script/Etudaint_contact.php");
  const data = await f.json();
  let sections = "";
  const section = document.querySelector("main");
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
}
lol();