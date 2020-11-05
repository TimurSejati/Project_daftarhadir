$(function () {
	$("#tableKegiatan").DataTable({
		paging: true,
		lengthChange: true,
		searching: true,
		ordering: true,
		info: true,
		autoWidth: false,
		// responsive: true,
		// "lengthMenu": [2, 10, 50],
	});
});

$(function () {
	var dateToday = new Date();
	$("#tglKegiatan").datetimepicker({
		format: "DD-MM-YYYY",
		minDate: dateToday,
	});
});

$(function () {
	var dateToday = new Date();
	$("#tglKegiatanUbah").datetimepicker({
		format: "L",
		minDate: dateToday,
	});
});

$(document).on("click", "#btn-edit", function () {
	$(".modal-body #id-kegiatan").val($(this).data("id"));
	$(".modal-body #judul").val($(this).data("judul"));
	$(".modal-body #slug").val($(this).data("slug"));
	$(".modal-body #narasumber").val($(this).data("narasumber"));
	$(".modal-body #tanggal").val($(this).data("tanggal"));
	$(".modal-body #publish")
		.val($(this).data("publish"))
		.attr("checked", $(this).data("publish") ? true : false);

	$(".modal-body #nama")
		.val($(this).data("nama"))
		.attr("checked", $(this).data("nama") ? true : false);
	$(".modal-body #email")
		.val($(this).data("email"))
		.attr("checked", $(this).data("email") ? true : false);
	$(".modal-body #nip")
		.val($(this).data("nip"))
		.attr("checked", $(this).data("nip") ? true : false);
	$(".modal-body #npwp")
		.val($(this).data("npwp"))
		.attr("checked", $(this).data("npwp") ? true : false);

	$(".modal-body #jabatan")
		.val($(this).data("jabatan"))
		.attr("checked", $(this).data("jabatan") ? true : false);
	$(".modal-body #instansi")
		.val($(this).data("instansi"))
		.attr("checked", $(this).data("instansi") ? true : false);
	$(".modal-body #unit_kerja")
		.val($(this).data("unit_kerja"))
		.attr("checked", $(this).data("unit_kerja") ? true : false);
	$(".modal-body #alamat_unit_kerja")
		.val($(this).data("alamat_unit_kerja"))
		.attr("checked", $(this).data("alamat_unit_kerja") ? true : false);

	$(".modal-body #pangkat")
		.val($(this).data("pangkat"))
		.attr("checked", $(this).data("pangkat") ? true : false);
	$(".modal-body #tmpt_lahir")
		.val($(this).data("tmpt_lahir"))
		.attr("checked", $(this).data("tmpt_lahir") ? true : false);
	$(".modal-body #tgl_lahir")
		.val($(this).data("tgl_lahir"))
		.attr("checked", $(this).data("tgl_lahir") ? true : false);
	$(".modal-body #alamat_rumah")
		.val($(this).data("alamat_rumah"))
		.attr("checked", $(this).data("alamat_rumah") ? true : false);

	$(".modal-body #tlp_instansi")
		.val($(this).data("tlp_instansi"))
		.attr("checked", $(this).data("tlp_instansi") ? true : false);
	$(".modal-body #fax")
		.val($(this).data("fax"))
		.attr("checked", $(this).data("fax") ? true : false);
	$(".modal-body #no_hp")
		.val($(this).data("no_hp"))
		.attr("checked", $(this).data("no_hp") ? true : false);
	$(".modal-body #bank")
		.val($(this).data("bank"))
		.attr("checked", $(this).data("bank") ? true : false);

	$(".modal-body #cabang_bank")
		.val($(this).data("cabang_bank"))
		.attr("checked", $(this).data("cabang_bank") ? true : false);
	$(".modal-body #no_rekening")
		.val($(this).data("no_rekening"))
		.attr("checked", $(this).data("no_rekening") ? true : false);
	$(".modal-body #nama_rekening")
		.val($(this).data("nama_rekening"))
		.attr("checked", $(this).data("nama_rekening") ? true : false);
	$(".modal-body #upload_file")
		.val($(this).data("upload_file"))
		.attr("checked", $(this).data("upload_file") ? true : false);
});

// Sweet alert 2
const swal = $(".swal").data("swal");
if (swal) {
	Swal.fire({
		title: "Success",
		text: swal,
		icon: "success",
	});
}

$(document).on("click", ".btn-hapus", function (e) {
	e.preventDefault();
	const href = $(this).attr("href");

	Swal.fire({
		title: "Apakah anda yakin?",
		text: "Data yang telah dihapus tidak bisa dikembalikan!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Hapus",
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});

// Signature
$(document).ready(function () {
	$("#signArea").signaturePad({
		drawOnly: true,
		drawBezierCurves: true,
		lineTop: 90,
	});
});

$("#btn-submit").click(function (e) {
	e.preventDefault();
	html2canvas([document.getElementById("sign-pad")], {
		onrendered: function (canvas) {
			var id_kegiatan = $("input[name='id_kegiatan']").val();
			var nama = $("input[name='nama']").val();
			var nip = $("input[name='nip']").val();
			var jabatan = $("input[name='jabatan']").val();
			var instansi = $("input[name='instansi']").val();
			var unit_kerja = $("input[name='unit_kerja']").val();
			var alamat_unit_kerja = $("input[name='alamat_unit_kerja']").val();
			var canvas_img_data = canvas.toDataURL("image/png");
			var img_data = canvas_img_data.replace(
				/^data:image\/(png|jpg);base64,/,
				""
			);
			//ajax buat simpen gambar meng folder
			$.ajax({
				url: "absenpages/absensi",
				data: {
					id_kegiatan,
					nama,
					nip,
					jabatan,
					instansi,
					unit_kerja,
					alamat_unit_kerja,
					img_data,
				},
				type: "post",
				dataType: "json",
				success: function (response) {
					Swal.fire({
						title: "Apakah form sudah di isi dan sudah benar?",
						text: "",
						icon: "warning",
						showCancelButton: true,
						confirmButtonColor: "#3085d6",
						cancelButtonColor: "#d33",
						confirmButtonText: "Ya",
					}).then((result) => {
						if (result.value) {
							if (response.status === "error") {
								if (response.nama_error != "") {
									$("#nama_error").html(response.nama_error);
									$("#nama").addClass(response.class);
								} else {
									$("#nama_error").html("");
									$("#nama").removeClass(response.class);
								}

								if (response.nip_error != "") {
									$("#nip_error").html(response.nip_error);
									$("#nip").addClass(response.class);
								} else {
									$("#nip_error").html("");
									$("#nip").removeClass(response.class);
								}

								if (response.jabatan_error != "") {
									$("#jabatan_error").html(response.jabatan_error);
									$("#jabatan").addClass(response.class);
								} else {
									$("#jabatan_error").html("");
									$("#jabatan").removeClass(response.class);
								}

								if (response.instansi_error != "") {
									$("#instansi_error").html(response.instansi_error);
									$("#instansi").addClass(response.class);
								} else {
									$("#instansi_error").html("");
									$("#instansi").removeClass(response.class);
								}

								if (response.unit_kerja_error != "") {
									$("#unit_kerja_error").html(response.unit_kerja_error);
									$("#unit_kerja").addClass(response.class);
								} else {
									$("#unit_kerja_error").html("");
									$("#unit_kerja").removeClass(response.class);
								}

								if (response.alamat_unit_kerja_error != "") {
									$("#alamat_unit_kerja_error").html(
										response.alamat_unit_kerja_error
									);
									$("#alamat_unit_kerja").addClass(response.class);
								} else {
									$("#alamat_unit_kerja_error").html("");
									$("#alamat_unit_kerja").removeClass(response.class);
								}
							} else if (response.status === "success") {
								window.location.href = response.redirect;
							}
						}
					});
				},
			});
		},
	});
});
$("#btnClearSign").click(function (e) {
	$("#signArea").signaturePad().clearCanvas();
});

$(".custom-file-input").on("change", function () {
	let fileName = $(this).val().split("\\").pop();
	$(this).next(".custom-file-label").addClass("selected").html(fileName);
});
