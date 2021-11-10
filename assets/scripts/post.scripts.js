const parallax = document.getElementById("parallax");
parallax.style.backgroundImage = "url(" + parallax.children[0].src + ")";
parallax.style.backgroundSize = "100%";
parallax.style.backgroundAttachment = "fixed";
parallax.style.backgroundPositionY = "-100px";
parallax.style.width = "100%";
parallax.style.height = "400px";
window.addEventListener("scroll", function () {
	let offset = window.pageYOffset;
	parallax.style.backgroundPositionY = -(offset * 1.05) - 100 + "px";
})