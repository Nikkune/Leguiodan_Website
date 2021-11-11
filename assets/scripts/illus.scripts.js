const images = document.getElementsByClassName("image_holder");
const images_nbr = images.length;
let x = 0;
while (x < images_nbr){
	images[x].style.backgroundImage = "url(uploads/" + images[x].attributes[1].value + ")";
	images[x].style.backgroundSize = "100%";
	images[x].firstElementChild.style.opacity = "0";
	x++
}