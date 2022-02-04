<x-app-layout>
    <x-slot name="header">{{$quiz->title}} için yeni soru oluştur</x-slot>

    <div class="card max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3">
        <div class="card-body">
            <form action="{{route('questions.store',$quiz->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Soru</label>
                    <textarea name="question" id="" cols="30" rows="4" class="form-control">{{old('question')}}</textarea>
                </div>
                <br>
                <div class="form-group">
                    <label>Fotoğraf</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">1. Cevap</label>
                            <textarea name="answer1" id="" rows="2" class="form-control">{{old('answer1')}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">2. Cevap</label>
                            <textarea name="answer2" id="" rows="2" class="form-control">{{old('answer2')}}</textarea>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">3. Cevap</label>
                                <textarea name="answer3" id="" rows="2" class="form-control">{{old('answer3')}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">4. Cevap</label>
                                <textarea name="answer4" id="s" rows="2" class="form-control">{{old('answer4')}}</textarea>
                            </div>
                        </div>
                    </div>
                <div class="form-group">
                    <label for="">Doğru Cevap</label>
                    <select name="correct_answer" id="" class="form-control">
                        <option value="answer1">1. Cevap</option>
                        <option @if(old('correct_answer')==='answer2') selected @endif value="answer2">2. Cevap</option>
                        <option @if(old('correct_answer')==='answer3') selected @endif value="answer3">3. Cevap</option>
                        <option @if(old('correct_answer')==='answer4') selected @endif value="answer4">4. Cevap</option>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm">Soru Oluştur</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
