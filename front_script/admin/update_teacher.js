document.querySelector(".form").addEventListener("submit", (e) => {
    e.preventDefault();
    const inputs = document.querySelectorAll(".form .user > input[name] , .form .user  select[name] ");
    const form = new FormData();
  
    for (const input of inputs) form.append(input.name, input.value);
  
    const request1 = new XMLHttpRequest();
    request1.open("POST", "../back_script/admin_upadate_Enseignant.php");
    request1.send(form);
    request1.onload = function () {
        JSON.parse(request1.response);
    };
    document.querySelector(".successfull").style.display = 'block';
    setTimeout(() => { 
        document.querySelector(".successfull").style.display = 'none';
    }, 3000);
    window.history.back();

});
