const heartCount = document.getElementById('heartcount');
function heart(heart) {
    if (!heart.classList.contains('active')) {
        heart.classList.add("active");
        parseInt(heartCount.innerHTML++);
    } else {
        heart.classList.remove("active");
        parseInt(heartCount.innerHTML--);
    }
}
