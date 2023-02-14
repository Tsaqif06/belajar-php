const logout = document.querySelector("#logout");
logout.addEventListener("click", () => {
	location.href = "./logout.php";
});

const keyword = document.querySelector("#keyword");
const cari = document.querySelector("#cari");
const reset = document.querySelector("#reset");
const cta = document.querySelector("#cta");

keyword.addEventListener("keyup", () => {
	// buat objek ajax
	const xhr = new XMLHttpRequest();

	// cek kesiapan ajax
	xhr.onreadystatechange = () => {
		if (xhr.readyState === 4 && xhr.status === 200) {
			cta.innerHTML = xhr.responseText;
		}
	};

	// eksekusi ajax
	xhr.open("GET", `./ajax/mahasiswa.php?search=${keyword.value}`, true); // param 1 = method get atau post, param 2 = sumbernya darimana, param 3 = mau pakai asynchronus atau synchronus, true  = asynchronous
	xhr.send();
});
