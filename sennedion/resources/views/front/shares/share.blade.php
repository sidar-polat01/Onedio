<x-app-layout>
    <x-slot name="header">
        Sen Nedion-{{ $category->name }}
    </x-slot>
    <style>
        .rek{
            margin-left: 60px;
        }
        .row{
            margin-left: 90px;
        }
        .rows{
            margin-left: 190px;
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
        }
        .title{
            margin-top: 10px;
            font-weight: bolder;
            font-size: 17px;
            line-height: 23.8px;
            -webkit-font-smoothing: antialiased;
            font-family: PT Sans, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }
        #image{
            margin-left: 0px;
        }
        @media screen and (max-width:900px) {
            .sol {
                margin-left: 0px;
                width: 400px;
                overflow-x: hidden;
            }
        }
        @media screen and (max-width:428px){
            .row{
                margin-left: 0px;
            }
            #image{
                margin-left: -0px;
            }
            .yan{
                display: none;
            }
            .article{
                font-size: 15px;
            }
            .relative p{
                font-size: 14px;
                line-height: 23.8px;
                -webkit-font-smoothing: antialiased;
                font-family: PT Sans, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            }
        }
    </style>

    <div class="max-w-7xl mx-auto lg:px-7 bg-white mt-3 bg-white col-md-11 shadow mr-3 rek">
        <img src="https://tpc.googlesyndication.com/simgad/7550998659747494568" alt="" width="1600px">
    </div>

    <div class="max-w-7xl sm:px-7 lg:px-8 row rows mt-3">
        <div class="card col-md-7 sol">
            <div>
                <h1 class="text-black-500 sm:text-28 font-bold article">{{ $category->name }} Paylaşımları</h1>
            </div>
            <div class="relative mt-3">
                <p>
                        {{ $category->description }}
                </p>
            </div>
            <hr>
            <div class="" >
                <p class="">
                <form action="" method="POST">
                    @csrf
                    @foreach($shares as $share)
                       <div style="border-radius: 20px">
                           <strong class="mt-4 article">{{ $share->title }}</strong><br>
                           @if($share->image)
                               <img id="image" src="{{asset($share->image)}}" class="img-responsive mt-4" width="650px">
                           @endif
                           <p class="mt-2">{{$share->description}}</p>
                           <strong class="article">{{ $share->userName }} </strong><small>kullanıcısı tarafından paylaşıldı.</small>
                           <hr>
                       </div>
                    @endforeach
                </form>
                </p>
            </div>
        </div>
        <div class="card col-md-3 ml-2 yan">
            @foreach($quizzes as $quiz)
                <a href="{{route('quiz.join',$quiz->slug)}}" class=" list-group-item align-items-start mt-2">
                    <div class="mt-2">
                        <div class="">
                            <img id="img" class="align-items-center" style="border-radius: 3px" src="{{asset($quiz->image)}}" width="350">
                        </div>
                        <div >
                            <h5 class="title" style="font-weight: 600; line-height: 1.0">{{$quiz->title}}</h5>
                            <small class="bg-gray-100" style="opacity: 50%;">{{$quiz->created_at->diffForHumans()}}</small><br>
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

                </div>
            </div>
            <div class="haber col-md-3">
                <div>
                    <h4>Haberler</h4>
                </div>
                <div>
                </div>
            </div>
            <div class="kategori-haber col-md-3">
                <div>
                    <h4>Haber Kategorileri</h4>
                </div>
                <div>
                </div>
            </div>
            <div class="paylaşım col-md-3">
                <div>
                    <h4>Paylaşımlar</h4>
                </div>
                <div>
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

