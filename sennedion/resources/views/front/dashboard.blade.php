<x-app-layout>
    <x-slot name="header">
        Sen Nedion-Anasayfa
    </x-slot>

    <style>
        .testler a{
            --tw-bg-opacity: 1;
            background-color: rgba(249, 250, 251, var(--tw-bg-opacity));
            border: none;
        }
        .testler a:hover{
            color: #6b7280;
        }
        a{
            text-decoration: none;
            color: black;
        }
        .baslik{
            display: flex;
        }
        .big_img{
            display: none;
        }
        @media screen and (max-width:1200px) {
            .title {
                font-size: 13px;
            }
            .description{
                font-size: 11px;
            }
        }
        @media screen and (max-width:500px){
            .yazi{
                margin-top: -10px;
                font-size: 27px;
            }
            .title{
                font-size: 18px;
            }
            .description{
                font-size: 15px;
            }
            .small_img{
                display: none;
            }
            .big_img{
                display: inline;
            }
            .big_img_solo{
                margin-left: 35px;
                width: 300px;
            }
            .test{
                margin-top: 50px;
            }
        }
    </style>
    <section class="">
        <img src="{{asset('uploads')}}/bg.png" id="bg" alt="resim">
        <img src="{{asset('uploads')}}/bulut2.png" id="bulut" alt="resim">
        <img src="{{asset('uploads')}}/balonlar2.png" id="balonlar" alt="resim">
        <a href="#dd" id="btn">Keşfet</a>
        <img src="{{asset('uploads')}}/mountains_front3.png" id="mountains_front" alt="resim">
    </section>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap');
        *
        {
            margin : 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins',sans-serif;
            scroll-behavior: smooth;
        }
        body
        {
            min-height: 100vh;
            overflow-x: hidden;
            background: linear-gradient(#fff,#d3d3d4);
        }

        section{
            min-height: 100vh;
            background: linear-gradient(#f9fafb,#d3d3d4);
            position: relative;
            width: 100%;
            height: 100%;
            padding: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            margin-top: -10px;
        }
        section::before
        {
            content: '';
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 80px;
            background: linear-gradient(to top,#ffffff,transparent);
            z-index: 1000;

        }
        section img
        {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            pointer-events: none;
        }
        section img#bg
        {
            mix-blend-mode: screen;
            overflow: hidden;
        }
        section img#mountains_front
        {
            z-index: 9;
            margin-top: -15px;
        }
        #btn
        {
            text-decoration: none;
            display: inline-block;
            padding: 8px 30px;
            border-radius: 40px;
            background: #fff;
            color: #2b1055;
            font-size: 1.5em;
            z-index: 9;
            transform: translateY(60px);
        }
    </style>

    <script>
        let bg = document.getElementById('bg');
        let bulut = document.getElementById('bulut');
        let balonlar = document.getElementById('balonlar');
        let btn = document.getElementById('btn');
        let mountains_front = document.getElementById('mountains_front');

        window.addEventListener('scroll',function(){
            let value = window.scrollY;
            bg.style.top = value * 0.2 + 'px';
            bulut.style.left = value * 0.5 + 'px';
            bulut.style.top = value * 0.2 + 'px';
            balonlar.style.top = value * 1.3 + 'px';
            btn.style.marginTop = value * 0.5 + 'px';
        })
    </script>


   <div id="dd" class="test row max-w-7xl mx-auto sm:px-6 lg:px-8">
       <div class="col-md-6">
           <a href="{{route('home.quizzes.index')}}" target="_blank"><h6 style="font-family: cursive; opacity: 70%" class="mt-6 yazi">TESTLER</h6></a>
           <hr>
           <div class="bg-gray-50 list-group testler">
               @foreach($quizzes as $quiz)
                   <a href="{{route('quiz.join',$quiz->slug)}}" target="_blank" class="list-group list-group-item align-items-start mt-2">
                       <div class="big_img">
                           <img class="big_img_solo mb-2" src="{{asset($quiz->image)}}" width="220">
                       </div>
                       <div class="baslik">
                           <div class="small_img col-md-4">
                               <img id="img" class="align-items-center" src="{{asset($quiz->image)}}" width="170">
                           </div>
                           <div class="col-md-8 mb-3">
                               <h5 class="title" style="font-weight: 600; line-height: 1.0">{{$quiz->title}}</h5>
                               <p class="mb-1 description" style="line-height: 1">{{Str::limit($quiz->description,48)}}</p>
                               <small class="bg-gray-100" style="opacity: 50%;">{{$quiz->created_at->diffForHumans()}}</small><br>
                           </div>
                       </div>
                   </a>
               @endforeach
               <div class="mt-6">
               </div>
           </div>
       </div>
       <div class="col-md-3">
           <a href="{{route('home.news.index')}}" target="_blank"><h6 style="font-family: cursive; opacity: 70%" class="mt-6 yazi">HABERLER</h6></a>
           <hr>
           <div class="bg-gray-50 list-group testler">
               @foreach($news as $new)
                   <a href="{{route('news.join',$new->slug)}}" target="_blank" class="list-group list-group-item align-items-start mt-2">
                       <div class="big_img">
                           <img class="big_img_solo mb-2" style="border-radius: 3px" src="{{asset($new->image)}}" width="300">
                       </div>
                       <div class="">
                           <div class="">
                               <img id="img" class="small_img align-items-center mb-2" style="border-radius: 3px" src="{{asset($new->image)}}" width="220">
                           </div>
                           <div class="">
                               <h5 class="title" style="font-weight: 600; line-height: 1.0">{{$new->title}}</h5>
                               <p class="mb-1 description" style="line-height: 1">{{Str::limit($new->description,48)}}</p>
                               <small class="bg-gray-100" style="opacity: 50%;">{{$new->created_at->diffForHumans()}}</small><br>
                           </div>
                       </div>
                   </a>
                   <hr>
               @endforeach

           </div>
       </div>
       <div class="col-md-3">
           <a href="{{route('home.shares.index')}}" target="_blank"><h6 style="font-family: cursive; opacity: 70%" class="mt-6 yazi">PAYLAŞIMLAR</h6></a>
           <hr>
           <div class="bg-gray-50 list-group testler">
               @foreach($shareCategories as $share)
                   <a href="{{route('shares.join',$share->slug)}}" target="_blank" class="list-group list-group-item align-items-start mt-2">
                       <div class="big_img">
                           <img class="big_img_solo mb-2" style="border-radius: 3px" src="{{asset($share->image)}}" width="220">
                       </div>
                       <div class="">
                           <div class="">
                               <img class="small_img align-items-center " style="border-radius: 3px" src="{{asset($share->image)}}" width="220">
                           </div>
                           <div class="">
                               <h5 class="title" style="font-weight: 600; line-height: 1.0">{{$share->name}}</h5>
                               <small class="bg-gray-100" style="opacity: 50%;">{{$share->created_at->diffForHumans()}}</small><br>
                           </div>
                       </div>
                   </a>
                   <hr>
               @endforeach
           </div>
       </div>
       {{$news->withQueryString()->links()}}
   </div>

    <!-- FOOTER -->

    <footer class="border-top footer mt-3">
        <div class="row max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
            <div class="teest col-md-3">
                <div>
                    <h4>Testler</h4>
                </div>
                <div>
                    @foreach($quizzes as $quiz)
                        <a href="{{route('quiz.join',$quiz->slug)}}" target="_blank">
                            <div class="mb-2">
                                <div>{{$quiz->title}}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="haber col-md-3">
                <div>
                    <h4>Haberler</h4>
                </div>
                <div>
                    @foreach($news as $new)
                        <a href="{{route('news.join',$new->slug)}}" target="_blank">
                            <div class="mb-2">
                                <div>{{$new->title}}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="kategori-haber col-md-3">
                <div>
                    <h4>Haber Kategorileri</h4>
                </div>
                <div>
                    @foreach($categories as $new)
                        <a href="{{route('home.news.index')}}" target="_blank">
                            <div class="mb-2">
                                <div>{{$new->name}}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="paylaşım col-md-3">
                <div>
                    <h4>Paylaşımlar</h4>
                </div>
                <div>
                    @foreach($quizzes as $quiz)
                        <a href="{{route('quiz.join',$quiz->slug)}}" target="_blank">
                            <div class="mb-2">
                                <div>{{$quiz->title}}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <hr style="color: #f9fafb">
        <div class="row max-w-7xl mx-auto sm:px-6 lg:px-8 mt-2">
            <div class="" style="display: flex">
                <div id="logo">
                    <img src="{{asset('uploads/onedio.png')}}" width="150px">
                </div>
                <div>
                    <h6>© 2021 Sennedion. Her hakkı saklıdır </h6>
                </div>
            </div>
        </div>
    </footer>
    <style>
        footer{
            background-color: black;
        }
        footer h4{
            font-family: PT Sans, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-size: 1.125rem;
            --tw-text-opacity: 1;
            color: rgba(199, 200, 203, var(--tw-text-opacity))
        }
        footer a{
            --tw-text-opacity: 1;
            color: rgba(199, 200, 203, var(--tw-text-opacity));
            line-height: 1.125rem;
            font-size: 0.8rem;
        }
        footer h6{
            font-family: PT Sans, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-size: 1rem;
            --tw-text-opacity: 1;
            color: rgba(199, 200, 203, var(--tw-text-opacity));
            margin-top: 10px;
            margin-left: 30px;
        }
    </style>
</x-app-layout>
