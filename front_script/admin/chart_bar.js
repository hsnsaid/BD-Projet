let ctx = document.getElementById("myBarChart");

const request = new XMLHttpRequest();
request.open("GET", "../back_script/Admin_graph.php");
request.send();

request.onload = function () {
  const response = JSON.parse(request.response);

  let Student;
  let Teacher;
  let num;
  let s = [];
  let t = [];
  let n = [];

  response.forEach((item) => {
    s.push(item.number_etudaint)
    t.push(item.number_enseignant)
    n.push(item.niveau)
  });

  Student = {
    label: 'Student',
    data: s,
    backgroundColor: '#007bff',
    borderColor: '#007bff',
  };

  Teacher = {
    label: 'Teacher',
    data: t,
    backgroundColor: '#dc3545',
    borderColor: '#dc3545',
  };

  num = {
    labels:n,
    datasets: [Student, Teacher]
  };
  ;
  let chartOptions = {
    scales: {
      xAxes: [{
        barPercentage: 1,
        categoryPercentage: 0.6
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 10,
          maxTicksLimit: 40
        }
      },]
    },
    animation: {
      duration: 0,
    },
  };

  new Chart(ctx, {
    type: 'bar',
    data: num,
    options: chartOptions
  });
}