<x-app-layout>
    <x-slot name="header">
            Sen Nedion-{{$quiz->title}}
    </x-slot>
    @if(session('successe'))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 alert mt-3 col-md-5 son">
            @if($quiz->my_result->point=='100')
            <img class="last mt-2" src="https://pazarlamasyon.com/wp-content/uploads/2016/03/cheering_minions.gif" alt="">
            @endif
                @if($quiz->my_result->point<'100' && $quiz->my_result->point>='60')
                    <img class="last mt-2" src="https://www.vargonen.com/blog/wp-content/uploads/2020/04/8.gif" alt="">
                @endif
                @if($quiz->my_result->point<'60' && $quiz->my_result->point>='30')
                    <img class="last mt-2" src="https://media.wired.com/photos/59326d5344db296121d6aee9/master/pass/8552.gif" alt="">
                @endif
                @if($quiz->my_result->point<'30' && $quiz->my_result->point>'0')
                    <img class="last mt-2" src="https://thumbs.gfycat.com/MindlessWhichCaiman-max-1mb.gif" alt="">
                @endif
                @if($quiz->my_result->point=='0')
                    <img class="last mt-2" src="https://media0.giphy.com/media/3o7TKzyWlCxCQ5R8fm/giphy.gif" alt="">
                @endif
            <br>
            <strong class="session">{{session('successe')}}</strong>
        </div>
    @endif
    <style>
        .last{
            margin-left: 30px;
            border-radius: 10px;
            width: 500px
        }
        .session{
            font-size: 18px;
            margin-top: 50px;
            width: 300px;
            margin-left: 0px;
        }
        .son{
            margin-left: 100px;
            border-radius: 10px;
            box-shadow: #adb5bd;
            background-color: #fff3cd
        }
        .rows{
            margin-left: 160px;
        }
        .question{
            font-size: 23px;
        }
        .cevap1{
            font-size: 17px;
            font-weight: bold;
            width: 650px;
            height: 25px
        }
        .cevap2{
            font-size: 17px;
            font-weight: bold;
            width: 650px;
            height: 25px
        }
        .cevap3{
            font-size: 17px;
            font-weight: bold;
            width: 650px;
            height: 25px
        }
        .cevap4{
            font-size: 17px;
            font-weight: bold;
            width: 650px;
            height: 25px
        }
        .rek{
            margin-left: 60px;
        }
        .quiz{
            font-family: PT Sans, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-weight: 700;
            line-height: 1.375;
            font-size: 1.6rem;
            color: #1a202c;
            margin-top: 30px;
            margin-left: 30px;
        }
        .description{
            margin-left: 30px;
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
        @media screen and (max-width:1300px){
            .sol{
                margin-left: -70px;
                width: 700px;
                overflow-x: hidden;
            }
            .last{
                margin-left: 1px;
                border-radius: 10px;
                width: 500px
            }
            .title{
                font-size: 11px;
            }
            .question{
                font-size: 18px;
            }
            #image{
                margin-left: 0px;
            }
            .cevap1{
                font-size: 15px;
                width: 310px;
            }
            .cevap2{
                font-size: 15px;
                width: 310px;
            }
            .cevap3{
                font-size: 15px;
                width: 310px;
            }
            .cevap4{
                font-size: 15px;
                width: 310px;
            }
        }
        @media screen and (max-width:900px){
            .sol{
                margin-left: -140px;
                width: 570px;
                overflow-x: hidden;
            }
            .last{
                margin-left: 1px;
                border-radius: 10px;
                width: 500px
            }
            .title{
                font-size: 11px;
            }
            .question{
                font-size: 18px;
            }
            #image{
                margin-left: 0px;
            }
            .cevap1{
                font-size: 15px;
                width: 310px;
            }
            .cevap2{
                font-size: 15px;
                width: 310px;
            }
            .cevap3{
                font-size: 15px;
                width: 310px;
            }
            .cevap4{
                font-size: 15px;
                width: 310px;
            }
        }
        @media screen and (max-width:770px){
            .sol{
                margin-left: -140px;
                width: 510px;
                overflow-x: hidden;
            }
            .last{
                margin-left: 1px;
                border-radius: 10px;
                width: 500px
            }
            .title{
                font-size: 11px;
            }
            .question{
                font-size: 18px;
            }
            #image{
                margin-left: 0px;
            }
            .cevap1{
                font-size: 15px;
                width: 310px;
            }
            .cevap2{
                font-size: 15px;
                width: 310px;
            }
            .cevap3{
                font-size: 15px;
                width: 310px;
            }
            .cevap4{
                font-size: 15px;
                width: 310px;
            }
        }
        @media screen and (max-width:428px){
            .rows{
                margin-left: 3px;
            }
            .sol{
                margin-left: -10px;
                width: 570px;
                overflow-x: hidden;
            }
            .last{
                margin-left: -2px;
                border-radius: 10px;
                width: 500px
            }
            .title{
                font-size: 16px;
            }
            .quiz{
                font-family: PT Sans, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                font-weight: 700;
                line-height: 1.375;
                font-size: 1.6rem;
                color: #1a202c;
                margin-top: 20px;
                margin-left: 15px;
            }
            .description{
                margin-left: 15px;
            }
            .question{
                font-size: 16px;
            }
            #image{
                margin-left: -0px;
            }
            .cevap1{
                font-size: 14px;
                width: 310px;
            }
            .cevap2{
                font-size: 14px;
                width: 310px;
            }
            .cevap3{
                font-size: 14px;
                width: 310px;
            }
            .cevap4{
                font-size: 14px;
                width: 310px;
            }
            .yan{
                display: none;
            }
        }
    </style>
    <div class="max-w-7xl mx-auto lg:px-7 bg-white mt-3 col-md-11 shadow mr-3 rek">
        <img src="https://tpc.googlesyndication.com/simgad/7550998659747494568" alt="" width="1600px">
    </div>

    <div class="max-w-7xl sm:px-6 lg:px-8 row rows mt-3">
        <div class="card col-8 col-xl-8 sol">
            <div>
                <h1 class="text-black-500 sm:text-28 font-bold quiz">{{ $quiz->title }}</h1>
            </div>
            <div class="relative mt-3 description">
                <p>
                    <strong>
                        {{$quiz->description}}
                    </strong>
                </p>
            </div>
            <div class="card-body">
                <p class="card-text">
                <form action="{{route('quiz.result',$quiz->slug)}}" method="POST">
                    @csrf
                    @foreach($quiz->questions as $question)
                        <hr class="mt-6">
                        <strong class="mt-6 question">{{$loop->iteration}}. {{ $question->question }}</strong>
                        @if($question->image)
                            <img id="image" src="{{asset($question->image)}}" class="img-responsive mt-2 ml-4" width="600px">
                        @endif
                        @if($question->answer1)
                            <div class="form-check mt-6" style="background-color: #f8f9fa; height: 40px">
                                <input type="radio" class="form-check-input mt-2" name="{{$question->id}}" id="quiz{{$question->id}}1" value="answer1" style="height: 20px; width: 20px" required>
                                <label for="quiz{{$question->id}}1" class="form-check-label mt-2 cevap1">
                                    {{ $question->answer1 }}
                                </label>
                            </div>
                        @endif
                        @if($question->answer2)
                            <div class="form-check" style="background-color: #f8f9fa; height: 40px" >
                                <input type="radio" class="form-check-input mt-2" name="{{$question->id}}" id="quiz{{$question->id}}2" value="answer2" style="height: 20px; width: 20px " required>
                                <label for="quiz{{$question->id}}2" class="form-check-label mt-2 cevap2">
                                    {{$question->answer2}}
                                </label>
                            </div>
                        @endif
                        @if($question->answer3)
                            <div class="form-check" style="background-color: #f8f9fa; height: 40px" >
                                <input type="radio" class="form-check-input mt-2" name="{{$question->id}}" id="quiz{{$question->id}}3" value="answer3" style="height: 20px; width: 20px" required>
                                <label for="quiz{{$question->id}}3" class="form-check-label mt-2 cevap3">
                                    {{ $question->answer3 }}
                                </label>
                            </div>
                        @endif
                        @if($question->answer4)
                            <div class="form-check" style="background-color: #f8f9fa; height: 40px" >
                                <input type="radio" class="form-check-input mt-2" name="{{$question->id}}" id="quiz{{$question->id}}4" value="answer4" style="height: 20px; width: 20px" required>
                                <label for="quiz{{$question->id}}4" class="form-check-label mt-2 cevap4">
                                    {{ $question->answer4 }}
                                </label>
                            </div>
                        @endif
                    @endforeach
                        <a href="#sonuc"><button type="submit" class="btn btn-success btn-block mt-6">Testi Bitir</button></a>
                </form>
                </p>
            </div>
        </div>
        <div class="card col-md-3 ml-2 yan">
            @foreach($quizzes as $quiz)
                <a href="{{route('quiz.join',$quiz->slug)}}" class=" list-group-item align-items-start mt-2">
                    <div class="mt-2">
                        <div class="">
                            <img id="img" class="align-items-center" src="{{asset($quiz->image)}}" width="350">
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

</style>
