<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            #logo{
                margin-left: -50px;
            }
            @media screen and (max-width:900px){
                #logo{
                    margin-top: 20px;
                    margin-left: -305px;
                    width: 50%;
                }
                #content{
                    display: none;
                }
                .reklam{
                    display: none;
                }
                .rows{
                    display: none;
                }

            }
            @media screen and (max-width:400px){
                #logo{
                    margin-top: 200px;
                    margin-left: -440px;
                    width: 65%;
                }
                #content{
                    display: none;
                }
                .reklam{
                    display: none;
                }
                .rows{
                    display: none;
                }

            }

        </style>
    </head>
    <body style="background: linear-gradient(to right, rgb(15, 12, 41), rgb(48, 43, 99), rgb(36, 36, 62));">
    <div id="logo">
        <img src="{{asset('uploads/onedio.png')}}" style="margin-left: 450px">
    </div>
    <div id="content">
        <strong style="color: white; margin-left: 650px; font-size: 23px">Sen de kendini test et.</strong>
    </div>
    <div class="relative flex justify-center mt-5 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="">
                @auth
                    <a href="{{ route('dashboard') }}" class="text-sm text-gray-700 underline"><button class="btn" style="background-image: linear-gradient(to right, #000000 0%, #53346D  51%, #000000  100%); color: white; border-radius: 25px">Sayfaya Git</button></a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline"><button class="btn" style="background: linear-gradient(to right, rgb(0, 242, 96), rgb(5, 117, 230)); color: white; border-radius: 25px">Giriş Yap</button></a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline"><button class="btn" style="background: linear-gradient(to right, rgb(252, 74, 26), rgb(247, 183, 51)); color: white; border-radius: 25px">Kayıt Ol</button></a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
    <div class="rows col-md-12 mt-2 mb-4">
        <div class="col-md-10" style="display: flex; margin-left: 200px">
        <div class="col-md-6 mt-6 bg-gray-100 shadow border border-secondary" style="border-radius: 10px; height: 734px">
            <div class="bg-white shadow col-md-9" style="margin-bottom: 10px; margin-left: 75px; border-radius: 10px; height: 100px">
                <div class="col-md-12">
                    <br>
                    <strong style="font-size: 15px; margin-left: 20px">Restoran Alışkanlıklarına Göre Hangi Tip Müşterisin?</strong>
                </div>
                <div class="col-md-12 mt-2 ml-1" style="font-size: 10px">
                    Garsonların 'Bir an önce yiyip de gitsin!' dediği tip misin yoksa görünce sevindiği bir tip mi?
                </div>
                <div class="col-md-12 mt-2 ml-4">
                    <strong style="font-size: 15px">Öğrenmek için teste!</strong>
                </div>
            </div>
            <div class="row" style="margin-left: 70px">
                <div class="card col-7 col-xl-7 sol" style="height: 620px">
                    <div class="card-body">
                                <strong class="mt-6" style="font-size: 13px">1. Öncelikle söyle bakalım, önceden rezervasyon yaptırdığın bir restorana tam zamanında mı gidersin?</strong>
                                    <img src="http://127.0.0.1:8000/uploads/oncelikle-soyle-bakalim-onceden-rezervasyon-yaptirdigin-bir-restorana-tam-zamaninda-mi-gidersin.gif" class="img-responsive mt-2 ml-1" width="300px">
                                <div class="form-check mt-6" style="background-color: #f8f9fa; height: 30px;">
                                    <input disabled type="radio" class="form-check-input mt-2" style="height: 15px; width: 15px">
                                    <label for="" class="form-check-label mt-2" style="font-size: 12px; font-weight: bold; height: 25px">
                                        Geç mi erken mi diye düşünmem açıkçası.
                                    </label>
                                </div>
                        <div class="form-check" style="background-color: #f8f9fa; height: 30px;">
                            <input disabled type="radio" class="form-check-input mt-2" style="height: 15px; width: 15px">
                            <label for="" class="form-check-label mt-2" style="font-size: 12px; font-weight: bold; width: 650px; height: 25px">
                                Rezervasyon yaptırmam genelde.
                            </label>
                        </div>
                        <div class="form-check" style="background-color: #20c997; height: 30px;">
                            <input disabled type="radio" class="form-check-input mt-2" style="height: 15px; width: 15px">
                            <label for="" class="form-check-label mt-2" style="font-size: 12px; font-weight: bold; width: 650px; height: 25px">
                                Bi' 10 dakika önceden orada olurum mutlaka.
                            </label>
                        </div>
                        <div class="form-check" style="background-color: #f8f9fa; height: 30px;">
                            <input disabled type="radio" class="form-check-input mt-2" style="height: 15px; width: 15px">
                            <label for="" class="form-check-label mt-2" style="font-size: 12px; font-weight: bold; width: 650px; height: 25px">
                                Tam zamanında orda olurum.
                            </label>
                        </div>
                    </div>
                    <div class="card-body">
                            <strong class="mt-6" style="font-size: 13px">2. Peki bahşiş konusunda nasılsın?</strong>
                            <img src="http://127.0.0.1:8000/uploads/peki-bahsis-konusunda-nasilsin.gif" class="img-responsive mt-2 ml-1" width="300px">
                        <div class="form-check mt-6" style="background-color: #f8f9fa; height: 30px;">
                            <input disabled type="radio" class="form-check-input mt-2" style="height: 15px; width: 15px">
                            <label for="" class="form-check-label mt-2" style="font-size: 12px; font-weight: bold; height: 25px;">
                                Geç mi erken mi diye düşünmem açıkçası.
                            </label>
                        </div>
                    </div>
                </div>

                <div class="card col-md-3 reklam">
                    <div style="margin-top: 30px">
                        <h6 style="margin-left: 40px; font-size: 12px">Reklam</h6>
                        <img src="https://s0.2mdn.net/simgad/6678489653513246465" class="" width="320px">
                    </div>
                    <div class="card mt-6 duyuru" style="background-color: #adb5bd">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center" style="font-size: 12px">
                                Soru Sayısı
                                <span class="">6</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center" style="font-size: 12px">
                                Katılımcı Sayısı
                                <span class="">60</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center" style="font-size: 12px">
                                Ortalama Puan
                                <span class="">14</span>
                            </li>
                        </ul>
                    </div>
                </div>

        </div>
    </div>
            <div class="col-md-4 mt-2 ml-6">
                <img src="{{asset('uploads/telefon.png')}}" width="380">
            </div>
        </div>





    </body>
</html>
