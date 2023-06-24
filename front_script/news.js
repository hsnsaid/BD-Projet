const request2 = new XMLHttpRequest();
request2.open("GET", "../back_script/Etudaint_view_news.php");
request2.send();

request2.onload = function () {
  const section = document.querySelector(".main_news");
  const data = JSON.parse(request2.response);
  let sections = "";
    for (const item of data)
    sections += `
    <section class="news">
    <div class="news_header">
        <div class="header_left">
            <a href="#">
                <img src="../image/admin.png" class="news_photo">
            </a>
            <div class="news_admin">
                <span class="admin_name">${item.administrateur_name}</span>
            </div>
            <span class="news__date">${item.date}</span>
        </div>
    </div>
    <div class="news_content">
        <p class="Content_paragraph">${item.message}</p>
    </div>
</section>`;
  section.innerHTML = sections;
};