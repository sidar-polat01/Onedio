<x-app-layout>
    <x-slot name="header">
        Sen Nedion-{{$news->title}}
    </x-slot>
    <style>
        .yan{
            --tw-bg-opacity: 1;
            background-color: rgba(249, 250, 251, var(--tw-bg-opacity));
            border: none;
        }
        .rek{
            margin-left: 60px;
        }
        .row{
            margin-left: 90px;
        }
        .article{
            font-family: PT Sans, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-weight: 700;
            line-height: 1.375;
            font-size: 1.6rem;
            color: #1a202c;
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
        .sol{
            margin-left: 50px;
        }
        @media screen and (max-width:428px){
            #image{
                margin-left: -0px;
            }
            .yan{
                display: none;
            }
            .sol{
                width: 770px;
                margin-left: 50px;
            }
        }
    </style>

    <div class="max-w-7xl mx-auto lg:px-7 bg-white mt-3 bg-white col-md-11 shadow mr-3 rek">
        <img src="https://tpc.googlesyndication.com/simgad/7550998659747494568" alt="" width="1600px">
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 row mt-5 bg-gray-50">
        <div class=" col-md-7 col-xl-7 bg-gray-50 sol">
            <div>
                <h1 class="text-black-500 sm:text-28 font-bold article">{{ $news->title }}</h1>
            </div>
            <div class="relative mt-4">
                <p>
                    <strong>
                        {{$news->description}}
                    </strong>
                </p>
            </div>
            <div class=" bg-gray-50">
                <p class="">
                <form action="" method="POST">
                    @csrf
                    @foreach($news->articles as $article)
                        <strong class="mt-6 article">{{ $article->article }}</strong>
                        @if($article->image)
                            <img id="image" src="{{asset($article->image)}}" class="img-responsive mt-2" width="700px">
                        @endif
                        <p class="mt-3 mb-5">{{$article->content}}</p>
                    @endforeach
                </form>
                </p>
            </div>
        </div>
        <div class="card col-md-4 ml-2 yan">
            @foreach($newss as $new)
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
                    @foreach($newss as $new)
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
        .sol{
            margin-left: 0px;
            width: 400px;
            overflow-x: hidden;
    }
</style>

