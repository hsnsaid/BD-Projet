const request2 = new XMLHttpRequest();
request2.open("GET", "../back_script/Admin_Circle.php");
request2.send();

request2.onload = function () {
  const response = JSON.parse(request2.response);
  new Chart(document.getElementById("myPieChart"), {
    type: 'pie',
    data: {
      labels: ["Student", "Teacher"],
      datasets: [{
        data: [response.Etudiant_number, response.enseignant_number],
        backgroundColor: ['#007bff', '#dc3545'],
      }],
    },
    options: {
      animation: {
        duration: 0,
      },
      title: {
        display: true,
      },
    },
  });
};