<x-app-layout>
    <x-slot name="header">{{$article->article}} Düzenle</x-slot>

    <div class="card max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3">
        <div class="card-body">
            <form action="{{route('article.update',[$article->news_id,$article->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Başlık</label>
                    <textarea name="article" cols="30" rows="4" class="form-control">{{$article->article}}</textarea>
                </div>
                <br>
                <div class="form-group">
                    <label>Fotoğraf</label>
                    @if($article->image)
                        <a href="{{asset($article->image)}}" target="_blank">
                            <img src="{{asset($article->image)}}" style="width: 150px"> <br>
                        </a>
                    @endif
                    <input type="file" name="image" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label>Açıklama</label>
                    <textarea name="content" cols="30" rows="4" class="form-control">{{$article->content}}</textarea>
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm">Makale Güncelle</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

