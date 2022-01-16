<?php
include("../koneksi.php");
?>

<div class="jumbotron">
    <h2 align="center">Tambah Pelanggan VIP</h2>
    <br>
    <form action="do_pusattambahvip.php" method="post" name="tambah" id="tambah">
        <table class="table table-striped table-hover">
            <tr>
                <td>Nama Pelanggan</td>
                <Td><input type="text" id="nama" name="nama" maxlength="50" autocomplete="off"></Td>
                <div class="error" id="nameErr"></div>
            </tr>
            <tr>
                <td>Alamat Pelanggan</td>
                <Td><input type="text" id="alamat" name="alamat" maxlength="100" autocomplete="off"></Td>
                <div class="error" id="alamatErr"></div>
            </tr>
            <tr>
                <td>No HP Pelanggan</td>
                <Td><input type="number" id="nohp" name="nohp" maxlength="12" autocomplete="off"></Td>
                <div class="error" id="nohpErr"></div>
            </tr>
        </table>
        <div align="center">
            <button class="btn btn-success" name="daftar"><i class="fa fa-plus-circle"></i> Tambah Pelanggan</button>
        </div>
    </form>
</div>
<br>
<div class="jumbotron">
    <h2 align="center">Daftar Pelanggan VIP</h2>
    <br>
    <div id="tampilvip"></div>
</div>

<div class="modal fade" id="myModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi</h4>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Apakah Anda yakin menghapus pelanggan VIP ini?
                <br><br>
                Masukkan Password &nbsp; <input type="password" name="pass" id="pass" required>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button class="btn btn-success" id="confirm" type="submit"><i class="fa fa-check"></i> Ya</button>
                <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Tidak</button>
            </div>

        </div>
    </div>
</div>

<?php
$sql = mysqli_query($conn, "SELECT * FROM login where level = 'kasir'");
$data = mysqli_fetch_array($sql);
$pass = $data['pass'];
?>

<script>
    $(document).ready(function() {
        var error_nohp = false;
        var error_alamat = false;
        var error_nama = false;
        var error_password = false;
        var pass = "";
        let password_akun = "<?php echo $pass; ?>";

        $("#nohp").keyup(function() {
            check_nohp();
        });

        $("#nama").keyup(function() {
            check_nama();
        });

        $("#alamat").keyup(function() {
            check_alamat();
        });

        $("#pass").keyup(function() {
            check_pass();
        });

        function check_nohp() {
            $("#nohp").keyup(function() {
                var nohp = $("#nohp").val();

                if (nohp == 0) {
                    $("#nohpErr").html("masukkan nohp");
                    $("#nohp").css("outline-color", "red");
                    $("#nohpErr").css("color", "red");
                    error_nohp = true;
                } else if (nohp.length < 12) {
                    $("#nohpErr").html("nohp minimal 12 digit!");
                    $("#nohpErr").css("color", "red");
                    $("#nohp").css("outline-color", "red");
                    error_nohp = true;
                } else {
                    $.ajax({
                        url: "do_pusatceknohpvip.php",
                        type: "post",
                        data: "nohp=" + nohp,
                        success: function(data) {
                            if (data == 0) {
                                $("#nohpErr").html("nohp tersedia");
                                $("#nohpErr").css("color", "green");
                                $("#nohp").css("outline-color", "green");
                                error_nohp = false;
                            } else {
                                $("#nohpErr").html("nohp tidak tersedia");
                                $("#nohpErr").css("color", "red");
                                $("#nohp").css("outline-color", "red");
                                error_nohp = true;
                            }
                        },
                    });
                }
            });
        };

        function check_alamat() {
            $("#alamat").keyup(function() {
                var alamat = $("#alamat").val();

                if (alamat == 0) {
                    $("#alamatErr").html("Masukkan alamat!");
                    $("#alamat").css("outline-color", "red");
                    error_alamat = true;
                } else if (alamat.length < 10) {
                    $("#alamatErr").html("alamat minimal 10 karakter!");
                    $("#alamat").css("outline-color", "red");
                    error_alamat = true;
                } else {
                    $("#alamatErr").html("");
                    $("#alamat").css("outline-color", "green");
                    error_alamat = false;
                }
            });
        };

        function check_nama() {
            $("#nama").keyup(function() {
                var nama = $("#nama").val();
                var pattern = /^[a-zA-Z ]*$/;

                if (nama == 0) {
                    $("#nameErr").html("Masukkan nama pelanggan VIP!");
                    $("#nameErr").css("color", "red");
                    $("#nama").css("outline-color", "red");
                    error_nama = true;
                } else if (!pattern.test(nama)) {
                    $("#nameErr").html("hanya boleh nama dan spasi!");
                    $("#nameErr").css("color", "red");
                    $("#nama").css("outline-color", "red");
                    error_nama = true;
                } else if (nama.length < 6) {
                    $("#nameErr").html("nama harus lebih dari 6 karakter!");
                    $("#nama").css("outline-color", "red");
                    $("#nameErr").css("color", "red");
                    error_nama = true;
                } else {
                    $.ajax({
                        url: "do_pusatceknamavip.php",
                        type: "post",
                        data: "nama=" + nama,
                        success: function(data) {
                            if (data == 0) {
                                $("#nameErr").html("nama tersedia");
                                $("#nameErr").css("color", "green");
                                $("#nama").css("outline-color", "green");
                                error_nama = false;
                            } else {
                                $("#nameErr").html("nama tersedia");
                                $("#nameErr").css("color", "red");
                                $("#nama").css("outline-color", "red");
                                error_nama = true;
                            }
                        },
                    });
                }
            });
        };

        function check_pass() {
            $("#pass").on("keyup", function() {
                pass = $("#pass").val();

                if (pass == 0) {
                    $("#passErr").html("Masukkan password akun Anda!");
                    $("#pass").css("outline-color", "red");
                    $("#passErr").css("color", "red");
                    error_password = true;
                } else if (pass != password_akun) {
                    $("#passErr").html("Password Salah!");
                    $("#pass").css("outline-color", "red");
                    $("#passErr").css("color", "red");
                    error_password = true;
                } else {
                    $("#passErr").html("");
                    $("#pass").css("outline-color", "green");
                    error_password = false;
                }
            });
        }

        $("#tampilvip").load("do_pusattampilvip.php");

        var kode = "";

        $(document).on("click", "button[name^='hpsvip-']", function() {
            kode = $(this).attr("name").substr(7, 14);
            $("#myModal").modal('toggle');
        });

        $("#confirm").on("click", function() {
            if (error_password === false) {
                $.ajax({
                    url: "do_pusathapusvip.php",
                    data: {
                        kode: kode,
                        pass: pass
                    },
                    type: 'post',
                    success: function(data) {
                        alert(data);
                        $("#tampilvip").load("do_pusattampilvip.php");
                        resetform();
                        $("#myModal").modal('toggle');
                    },
                });
                return true;
            } else {
                alert("Masukkan password!");
                return false;
            }
        });

        function resetform() {
            $('[name=pass]').val('');
            $('#nama').val('');
            $('#alamat').val('');
            $('#nohp').val('');
        }

        $("#tambah").on("submit", function(e) {
            e.preventDefault();
            if (error_nohp === false && error_alamat === false && error_nama === false) {

                $.ajax({
                    url: $(this).attr("action"),
                    data: $(this).serialize(),
                    type: $(this).attr("method"),
                    success: function() {
                        alert("data berhasil masuk!");
                        $("#tampilvip").load("do_pusattampilvip.php");
                    }
                });
                return true;
            } else {
                alert("Masukkan data dengan benar!");
                return false;
            }
        });

        $('#myModal').on('shown.bs.modal', function() {
            $("#pass").focus();
        });
    });
</script>