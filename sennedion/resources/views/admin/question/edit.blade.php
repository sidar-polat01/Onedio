<x-app-layout>
    <x-slot name="header">{{$question->question}} Düzenle</x-slot>

    <div class="card max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3">
        <div class="card-body">
            <form action="{{route('questions.update',[$question->quiz_id,$question->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Soru</label>
                    <textarea name="question" cols="30" rows="4" class="form-control">{{$question->question}}</textarea>
                </div>
                <br>
                <div class="form-group">
                    <label>Fotoğraf</label>
                    @if($question->image)
                    <a href="{{asset($question->image)}}" target="_blank">
                        <img src="{{asset($question->image)}}" style="width: 150px"> <br>
                    </a>
                    @endif
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">1. Cevap</label>
                            <textarea name="answer1" id="" rows="2" class="form-control">{{$question->answer1}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">2. Cevap</label>
                            <textarea name="answer2" id="" rows="2" class="form-control">{{$question->answer2}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">3. Cevap</label>
                            <textarea name="answer3" id="" rows="2" class="form-control">{{$question->answer3}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">4. Cevap</label>
                            <textarea name="answer4" id="" rows="2" class="form-control">{{$question->answer4}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Doğru Cevap</label>
                    <select name="correct_answer" id="" class="form-control">
                        @if($question->answer1)
                        <option @if($question->correct_answer==='answer1') selected @endif value="answer1">1. Cevap</option>
                        @endif
                        @if($question->answer2)
                        <option @if($question->correct_answer==='answer2') selected @endif value="answer2">2. Cevap</option>
                            @endif
                        @if($question->answer3)
                        <option @if($question->correct_answer==='answer3') selected @endif value="answer3">3. Cevap</option>
                        @endif
                        @if($question->answer4)
                        <option @if($question->correct_answer==='answer4') selected @endif value="answer4">4. Cevap</option>
                        @endif
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm">Soru Güncelle</button>
                </div>
           </form>
        </div>
    </div>
</x-app-layout>

