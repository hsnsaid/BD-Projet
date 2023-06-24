const text = document.querySelectorAll(".information-title .informaion_title");

text.forEach((e,index) => {
    e.style.animation = `fade-up 0.5s ease forwards ${index * 0.2}s`
});

const button = document.querySelectorAll(".login a");

button.forEach((e,index) => {
    e.style.animation = `fade-up- 0.9s ease forwards ${index * 0.2}s`
});