<x-app-layout>
    <x-slot name="header">
        Sen Nedion-TESTLER
    </x-slot>
    <style>
        .yan{
            border: none;
            --tw-bg-opacity: 1;
            background-color: rgba(249, 250, 251, var(--tw-bg-opacity));
        }
        .rek{
            margin-left: 60px;
        }
        .row{
            margin-left: 90px;
        }
        .relative p strong{
            font-weight: bolder;
            font-size: 17px;
            line-height: 23.8px;
            -webkit-font-smoothing: antialiased;
            font-family: PT Sans, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }
        .yan a:hover{
            color: #6b7280;
        }
        .yan a{
            border: none;
            --tw-bg-opacity: 1;
            background-color: rgba(249, 250, 251, var(--tw-bg-opacity));
        }
        .title{
            margin-top: 10px;
            font-weight: bolder;
            font-size: 17px;
            line-height: 23.8px;
            -webkit-font-smoothing: antialiased;
            font-family: PT Sans, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }
        .baslik{
            display: flex;
        }
        .big_img{
            display: none;
        }
        @media screen and (max-width:428px){
            .row{
                margin-left: 0px;
            }
            .yan{
                display: none;
            }
            #img{
                margin-top: 10px;
            }
            .small_img{
                display: none;
            }
            .big_img{
                display: inline;
            }
            .big_img_solo{
                width: 300px;
            }
        }
    </style>

    <div class="max-w-7xl mx-auto lg:px-7 bg-white mt-3 bg-white col-md-11 shadow mr-3 rek">
        <img src="https://tpc.googlesyndication.com/simgad/7550998659747494568" alt="" width="1600px">
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 row">
        <div class="col-md-8">
            <h6 style="font-family: cursive; opacity: 70%" class="mt-6 yazi">TESTLER</h6>
            @foreach($quizzes as $quiz)
                <a href="{{route('quiz.join',$quiz->slug)}}" target="_blank" class="list-group list-group-item align-items-start mt-4 mb-2">
                    <div class="big_img">
                        <img class="big_img_solo" src="{{asset($quiz->image)}}" width="180">
                    </div>
                    <div class="baslik">
                        <div class="small_img col-md-4">
                            <img id="img" class="align-items-center" src="{{asset($quiz->image)}}" width="180">
                        </div>
                        <div class="col-md-8">
                            <h5 class="title" style="font-weight: 600; line-height: 1.0">{{$quiz->title}}</h5>
                            <p class="mb-1 description" style="line-height: 1">{{Str::limit($quiz->description,120)}}</p>
                            <small class="bg-gray-100" style="opacity: 50%;">{{$quiz->created_at->diffForHumans()}}</small><br>
                        </div>
                    </div>
                </a>
            @endforeach
            {{$quizzes->withQueryString()->links()}}
        </div>
        <div class="card col-md-3 mt-4 yan">
            @foreach($news as $new)
                <a href="{{route('news.join',$new->slug)}}" class=" list-group-item align-items-start mt-2">
                    <div class="mt-2">
                        <div class="">
                            <img id="img" class="align-items-center" style="border-radius: 3px" src="{{asset($new->image)}}" width="350">
                        </div>
                        <div >
                            <h5 class="title" style="font-weight: 600; line-height: 1.0">{{$new->title}}</h5>
                            <small class="bg-gray-100" style="opacity: 50%;">{{$new->created_at->diffForHumans()}}</small><br>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <footer class="border-top mt-3">
        <div class="row max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
            <div class="test col-md-3">
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
        a{
            text-decoration: none;
            color: black;
        }
    </style>

</x-app-layout>
<style>
    @media screen and (max-width:900px){
        .sol {
            margin-left: 0px;
            width: 400px;
            overflow-x: hidden;
        }
    }
</style>

