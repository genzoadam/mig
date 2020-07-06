<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mahitala Ingkeng Gemah</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 50px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 25px;
            }
            .my-4{
                margin-top: 20px;
                font-size: 13px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Mahitala Ingkeng Gemah
                </div>

                <div class="links">
                    @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                    <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}">Daftar</a>
                    @endif
                    @endauth
                </div>

                <div class="my-4">
                    KETERANGAN: <br><hr><br>

                    Sistem : Laravel 5.8<br>
                    Database : Mysql<br>
                    <br>

                    Admin:<br>
                    email : admin@mig.com pw : password<br>

                    -Admin dapat melihat semua data(Daftar perusahaan, kebun, dll.)<br>
                    -Hanya admin yang dapat membuat, edit dan hapus akun Perusahaan dan seluruh datanya<br>
                    -Admin tidak dapat membbuat, mengedit dan menghapus isi data Perusahaan(Kebun, dll.)<br><br>

                    Company:<br>
                    email & pw : harus buat akun sendiri via akun admin<br>

                    -Company hanya dapat melihat semua data perusahaannya sendiri<br>
                    -Company hanya dapat membuat, mengedit dan menghapus data perusahaannya sendiri<br>
                    -Company<br><br>

                    User:<br>
                    email : user@mig.com pw : password<br>

                    -User hanya dapat melihat semua laporan<br><br>

                    *Form registrasi hanya membuat akun dengan hak akses user saja. Untuk membuat akun perusahaan baru, anda harus login dengan akun admin.<br>
                    *Untuk membuat akun perusahaan baru, pertama register akun baru, kemudian logout dan login dengan akun admin untuk mengupgrade user tsb menjadi akun perusahaan.<br>
                    *Jika Perusahaan dihapus maka data seperti kebun, dll. akan terhapus<br>
                    *Jika Kebun dihapus maka data divisi dan blok akn terhapus dan seterusnya.

                </div>

            </div>
        </div>
    </body>
</html>
