<x-app-layout>
    <x-slot name="header">
        {{$quiz->title}} Testine ait Sorular
    </x-slot>
    <div class="card max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3">
        <div class="card-body">
            <h5 class="card-title float-end">
                <a href="{{route('questions.create',$quiz->id)}}" class="btn btn-sm btn-primary">+ Soru Oluştur</a>
            </h5>
            <h5 class="card-title">
                <a href="{{route('quizzes.index')}}" class="btn btn-sm btn-secondary"><-Testlere Dön</a>
            </h5>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Soru</th>
                    <th scope="col">resim</th>
                    <th scope="col">1.Cevap</th>
                    <th scope="col">2.Cevap</th>
                    <th scope="col">3.Cevap</th>
                    <th scope="col">4.Cevap</th>
                    <th scope="col">Doğru Cevap</th>
                    <th scope="col" style="width: 125px">İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach($quiz->questions as $question)
                    <tr>
                        <td>{{$question->question}}</td>
                        <td>
                            @if($question->image)
                                <a href="{{asset($question->image)}}" target="_blank"><img src="{{asset($question->image)}}" style="width: 100px"></a>
                        @endif
                        <td>{{$question->answer1}}</td>
                        <td>{{$question->answer2}}</td>
                        <td>{{$question->answer3}}</td>
                        <td>{{$question->answer4}}</td>
                        <td class="text-success">{{substr($question->correct_answer,-1)}}. Cevap</td>
                        <td>
                            <a href="{{route('questions.edit',[$quiz->id,$question->id])}}" class="btn btn-sm btn-primary">Düzenle</a>
                            <a href="{{route('questions.destroy',[$quiz->id,$question->id])}}" class="btn btn-sm btn-danger">Sil</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
