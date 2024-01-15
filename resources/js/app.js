import './bootstrap';
const btnComment=document.querySelector(".btnComment")
const inputComment=document.querySelector("#inputComment");
btnComment.addEventListener("click",()=>{
    inputComment.classList.toggle("show")
})
