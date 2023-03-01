$(document).ready(function () {
	$("#logout").on("click", () => {
		location.href = "./logout.php";
	});

	// event saat keyword diketik
	$("#keyword").on("keyup", () => {
		// munculkan loading
		$('.loader').show();

		// ajax load
		// $("#cta").load(`./ajax/mahasiswa.php?search=${$("#keyword").val()}`);
	
		// $.get()
		const ajax = `./ajax/mahasiswa.php?search=${$("#keyword").val()}`;
		$.get(ajax, (data) => {
			console.log(data);
			$('#cta').html(data);
			$('.loader').hide();
		})
	});
});
