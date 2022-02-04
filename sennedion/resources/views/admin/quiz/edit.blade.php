<x-app-layout>
    <x-slot name="header">Test Güncelle</x-slot>

    <div class="card max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3">
        <div class="card-body">
            <form action="{{route('quizzes.update',$quiz->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Test Başlığı</label>
                    <input type="text" name="title" class="form-control" value="{{$quiz->title}}">
                </div>
                <br>
                <div class="form-group">
                    <label>Fotoğraf</label>
                    @if($quiz->image)
                        <a href="{{asset($quiz->image)}}" target="_blank">
                            <img src="{{asset($quiz->image)}}" style="width: 150px"> <br>
                        </a>
                    @endif
                    <input type="file" name="image" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label>Test Açıklaması</label>
                    <textarea name="description" id="" cols="30" rows="4" class="form-control">{{$quiz->description}}</textarea>
                </div>
                <br>
                <div class="form-group">
                    <label for="">Test Durumu</label> <br>
                    <select name="status" id="" class="form-group col-md-2">
                        <option @if($quiz->status ==='publish') selected @endif value="publish">Aktif</option>
                        <option @if($quiz->status ==='passive') selected @endif value="passive">Pasif</option>
                        <option @if($quiz->status ==='draft') selected @endif value="draft">Taslak</option>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <input id="isFinished" @if($quiz->finished_at) checked @endif type="checkbox">
                    <label>Bitiş Tarihi Olacak mı?</label>
                </div>
                <br>
                <div id="finishedInput" @if(!$quiz->finished_at) style="display: none" @endif class="form-group col-md-2">
                    <label>Bitiş Tarihi</label>
                    <input type="datetime-local" name="finished_at" @if($quiz->finished_at) value="{{ date('Y-m-d\TH:i',strtotime($quiz->finished_at))}}" @endif class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm">Test Güncelle</button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
        <script>
            $('#isFinished').change(function (){
                if ($('#isFinished').is(':checked')){
                    $('#finishedInput').show();
                }else {
                    $('#finishedInput').hide();
                }
            })
        </script>
    </x-slot>
</x-app-layout>
