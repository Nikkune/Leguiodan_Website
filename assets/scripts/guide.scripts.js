var bbcode = document.getElementById('bbcode_display');
var images = bbcode.getElementsByTagName("img");
for (let i = 0; i < images.length;i++){
	images[i].classList.add("img-fluid")
}