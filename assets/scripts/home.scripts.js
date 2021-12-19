const registerToast = document.getElementById('registerToast');
const confirmToast = document.getElementById('confirmToast');
if (registerToast) {
	const toast = new bootstrap.Toast(registerToast);
	toast.show()
}
if (confirmToast){
	const toast = new bootstrap.Toast(confirmToast);
	toast.show()
}