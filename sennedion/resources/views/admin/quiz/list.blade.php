<x-app-layout>
    <x-slot name="header">
        TESTLER
    </x-slot>
    <div class="card max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3">
        <div class="card-body">

            <form action="" method="GET">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="card-title">
                            <a href="{{route('quizzes.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Test Oluştur</a>
                        </h5>
                    </div>

                    <div class="col-md-3">
                        <input type="text" name="title" value="{{request()->get('title')}}" placeholder="Test Adı" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <select name="status" onchange="this.form.submit()" class="form-control" id="">
                            <option value="">Durum Seçiniz</option>
                            <option @if(request()->get('status')=='publish') selected @endif value="publish">Aktif</option>
                            <option @if(request()->get('status')=='passive') selected @endif value="passive">Pasif</option>
                            <option @if(request()->get('status')=='draft') selected @endif value="draft">Taslak</option>
                        </select>
                    </div>
                    @if(request()->get('title') || request()->get('status'))
                        <div class="col-md-1">
                            <a href="{{route('quizzes.index')}}" class="btn btn-secondary">
                                Sıfırla
                            </a>
                        </div>
                    @endif

                </div>
            </form>
            <br>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col" style="text-align: center; font-size: 23px">Resim</th>
                    <th scope="col" style="text-align: center; font-size: 23px">Test</th>
                    <th scope="col" style="width: 130px; font-size: 20px">Soru Sayısı</th>
                    <th scope="col" style="font-size: 20px">Durum</th>
                    <th scope="col" style="font-size: 20px; width: 130px">Bitiş Tarihi</th>
                    <th scope="col" style="width: 200px; text-align: center; font-size: 20px">İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach($quizzes as $quiz)
                <tr>
                    <td>
                        @if($quiz->image)
                            <a href="{{asset($quiz->image)}}" target="_blank"><img src="{{asset($quiz->image)}}" style="width: 100px"></a>
                        @endif
                    </td>
                    <td>{{$quiz->title}}</td>
                    <td>{{$quiz->questions_count}}</td>
                    <td>
                        @switch($quiz->status)
                            @case('publish')
                                <button disabled class="btn btn-success" style="width: 70px">Aktif</button>
                            @break
                            @case('passive')
                            <button disabled class="btn btn-warning" style="width: 70px">Pasif</button>
                            @break
                            @case('draft')
                            <button disabled class="btn btn-primary">Taslak</button>
                            @break

                        @endswitch
                    </td>
                    <td>
                        <span title="{{$quiz->finished_at}}">
                            {{$quiz->finished_at ? $quiz->finished_at->diffForHumans() : '-' }}</span>
                    </td>
                    <td>
                        <a href="{{route('questions.index',$quiz->id)}}" class="btn btn-sm btn-warning">Sorular</a>
                        <a href="{{route('quizzes.edit',$quiz->id)}}" class="btn btn-sm btn-primary">Düzenle</a>
                        <a href="{{route('quizzes.destroy',$quiz->id)}}" class="btn btn-sm btn-danger">Sil</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {{$quizzes->withQueryString()->links()}}
        </div>
    </div>
</x-app-layout>
