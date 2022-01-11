<style>
    .error {
        color: red;
    }
</style>

<div class="jumbotron">
    <h2 align="center">Tambah Daftar Mekanik</h2>
    <br>
    <form method="post" id="regis">
        <table class="table table-hover">
            <tr>
                <td>Nama</td>
                <td><input type="text" maxlength="50" id="nama" name="nama" autocomplete="off"></td>
                <div class="error" id="nameErr"></div>
            </tr>
            <tr>
                <td>NIK</td>
                <td><input type="number" max="9999999999999999" id="nik" name="nik" autocomplete="off"></td>
                <div class="error" id="nikErr"></div>
            </tr>
            <tr>
                <td>Password Khusus</td>
                <td><input type="password" maxlength="50" id="khusus" name="khusus" autocomplete="off"></td>
                <div class="error" id="khususErr"></div>
            </tr>
        </table>
        <div align="center">
            <button class="btn btn-success" name="daftar"><i class="fa fa-plus-circle"></i> Daftar</button>
        </div>
    </form>
</div>
<br>
<div class="jumbotron">
    <h2 align="center">Daftar Mekanik</h2>
    <br>

    <script>
        $(document).ready(function() {
            var error_nik = false;
            var error_khusus = false;
            var error_nama = false;

            $("#nik").keyup(function() {
                check_nik();
            })

            $("#nama").keyup(function() {
                check_nama();
            })

            $("#khusus").keyup(function() {
                check_khusus();
            })

            function check_nik() {
                $("#nik").keyup(function() {
                    var nik = $("#nik").val();

                    if (nik == 0) {
                        $("#nikErr").html("masukkan nik");
                        $("#nik").css("outline-color", "red");
                        error_nik = true;
                    } else if (nik.length < 16) {
                        $("#nikErr").html("nik harus lebih dari 16 angka!");
                        $("#nik").css("outline-color", "red");
                        error_nik = true;
                    } else {
                        $.ajax({
                            url: "cek_nik.php",
                            type: "post",
                            data: "nik=" + nik,
                            success: function(data) {
                                if (data == 0) {
                                    $("#nikErr").html("nik tersedia");
                                    $("#nik").css("outline-color", "green");
                                } else {
                                    $("#nikErr").html("nik tidak tersedia");
                                    $("#nik").css("outline-color", "red");
                                    error_nik = true;
                                }
                            },
                        });
                    }
                });
            };

            function check_khusus() {
                $("#khusus").keyup(function() {
                    var khusus = $("#khusus").val();

                    if (khusus == 0) {
                        $("#khususErr").html("Masukkan khusus anda");
                        $("#khusus").css("outline-color", "red");
                        error_khusus = true;
                    } else if (khusus !== "khusus123") {
                        $("#khususErr").html("Password Khusus Salah!");
                        $("#khusus").css("outline-color", "red");
                        error_khusus = true;
                    } else {
                        $("#khususErr").html("");
                        $("#khusus").css("outline-color", "green");
                    }
                })
            };

            function check_nama() {
                $("#nama").keyup(function() {
                    var nama = $("#nama").val();
                    var pattern = /^[a-zA-Z ]*$/;

                    if (nama == 0) {
                        $("#nameErr").html("Masukkan nama anda");
                        $("#nama").css("outline-color", "red");
                        error_nama = true;
                    } else if (!pattern.test(nama)) {
                        $("#nameErr").html("hanya boleh nama dan spasi!");
                        $("#nama").css("outline-color", "red");
                        error_nama = true;
                    } else if (nama.length < 6) {
                        $("#nameErr").html("nama harus lebih dari 6 karakter!");
                        $("#nama").css("outline-color", "red");
                        error_nama = true;
                    } else {
                        $.ajax({
                            url: "cek_nama.php",
                            type: "post",
                            data: "nama=" + nama,
                            success: function(data) {
                                if (data == 0) {
                                    $("#nameErr").html("nama tersedia");
                                    $("#nama").css("outline-color", "green");
                                } else {
                                    $("#nameErr").html("nama tidak tersedia");
                                    $("#nama").css("outline-color", "red");
                                    error_nama = true;
                                }
                            },
                        });
                    }
                });
            };


            $("#regis").submit(function() {
                if (error_nik === false && error_khusus === false && error_nama === false) {
                    alert("Registrasi Sukses!");
                    // window.location.href="ajax 1.php";
                    return true;
                } else {
                    alert("Masukkan data dengan benar!");
                    return false;
                }
            });
        });
    </script>