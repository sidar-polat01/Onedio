<x-app-layout>
    <x-slot name="header">Test Oluştur</x-slot>

    <div class="card max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3">
        <div class="card-body">
            <form action="{{route('quizzes.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Test Başlığı</label>
                    <input type="text" name="title" class="form-control" value="{{old('title')}}">
                </div>
                <br>
                <div class="form-group">
                    <label>Fotoğraf</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label>Test Açıklaması</label>
                    <textarea name="description" id="" cols="30" rows="4" class="form-control">{{old('description')}}</textarea>
                </div>
                <br>
                <div class="form-group">
                    <input id="isFinished" type="checkbox">
                    <label>Bitiş Tarihi Olacak mı?</label>
                </div>
                <br>
                <div id="finishedInput" style="display: none" class="form-group">
                    <label>Bitiş Tarihi</label>
                    <input type="datetime-local" name="finished_at" class="form-control">
                </div>
                <br>
                <div class="form-group">
                   <button type="submit" class="btn btn-success btn-sm">Test Oluştur</button>
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
