
const modalButton = document.querySelector(".modal")
const overlay1 = document.getElementById("overlay1")
const cancel_btn = document.querySelector(".cancel-btn")


    modalButton.addEventListener("click", function() {
                if (overlay1.style.display == "none") {
                    overlay1.style.display = "flex"
                } else {
                    overlay1.style.display = "none"
                }
 });

 cancel_btn.addEventListener("click", function() {
    overlay1.style.display = "none"
})
// for (let i = 0; i < modalButtons.length; i++) {
//     modalButtons[i].addEventListener("click", function() {
//         if (overlay.style.display == "none") {
//             overlay.style.display = "flex"
//         } else {
//             overlay.style.display = "none"
//         }
//     })
// }