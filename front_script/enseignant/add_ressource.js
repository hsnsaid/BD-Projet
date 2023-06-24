document.querySelector(".form").addEventListener("submit", (e) => {
    e.preventDefault();
    const inputs = document.querySelectorAll(".form .user > input[name] , .form .user  select[name] ");
    let files = document.getElementById("file").files;
    const form = new FormData();
  
    for (const input of inputs) form.append(input.name, input.value)
        form.append("file", files[0]);
  
    const request = new XMLHttpRequest();
    request.open("POST", "../../back_script/enseignant_ressource_add.php");
    request.send(form);
    request.onloadstart = function () {
        JSON.parse(request);
    };
        document.querySelector(".successfull").style.display = 'block';
    setTimeout(() => {
        document.querySelector(".successfull").style.display = 'none';
    }, 1000);
    for (const input of inputs) input.value = "";
});

