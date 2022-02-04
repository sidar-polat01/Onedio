<x-app-layout>
    <x-slot name="header">
        {{$news->title}}-Haberine ait Makaleler
    </x-slot>
    <div class="card max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="card-body">
            <h5 class="card-title float-end">
                <a href="{{route('article.create',$news->id)}}" class="btn btn-sm btn-primary">+ Makale Oluştur</a>
            </h5>
            <h5 class="card-title">
                <a href="{{route('news.index')}}" class="btn btn-sm btn-secondary"><-Haberlere Dön</a>
            </h5>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col" style="width: 200px">Makale Başlığı</th>
                    <th scope="col" style="width: 200px">Resim</th>
                    <th scope="col">Açıklama</th>
                    <th scope="col" style="width: 125px">İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach($news->articles as $article)
                    <tr>
                        <td>{{$article->article}}</td>
                        <td>
                            @if($article->image)
                                <a href="{{asset($article->image)}}" target="_blank"><img src="{{asset($article->image)}}" style="width: 200px"></a>
                        @endif
                        <td>{{$article->content}}</td>
                        <td>
                            <a href="{{route('article.edit',[$news->id,$article->id])}}" class="btn btn-sm btn-primary">Düzenle</a>
                            <a href="{{route('article.destroy',[$news->id,$article->id])}}" class="btn btn-sm btn-danger">Sil</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
