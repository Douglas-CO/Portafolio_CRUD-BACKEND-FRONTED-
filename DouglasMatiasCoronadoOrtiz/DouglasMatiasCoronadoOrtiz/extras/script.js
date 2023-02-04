const toogleBtn = document.querySelector(".activador");
const closeBtn = document.querySelector(".close-btn");
const sidebar = document.querySelector(".sidebar");

toogleBtn.addEventListener("click", function(){
    sidebar.classList.toggle("show-sidebar")
})

closeBtn.addEventListener("click", function(){
    sidebar.classList.remove("show-sidebar")
})


