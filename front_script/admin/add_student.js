document.querySelector(".form").addEventListener("submit", (e) => {
    e.preventDefault();
    const inputs = document.querySelectorAll(".form .user > input[name] , .form .user  select[name] ");
    const form = new FormData();
  
    for (const input of inputs) form.append(input.name, input.value);
  
    const request = new XMLHttpRequest();
    request.open("POST", "../../back_script/Admin_add_user.php");
    request.send(form);
    request.onload = function () {
        JSON.parse(request.response);
    };
    document.querySelector(".successfull").style.display = 'block';
    setTimeout(() => {
        document.querySelector(".successfull").style.display = 'none';
    }, 1000);
    for (const input of inputs) input.value = "";
});

