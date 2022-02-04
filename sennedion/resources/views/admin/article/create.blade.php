<x-app-layout>
    <x-slot name="header">için yeni soru oluştur</x-slot>

    <div class="card max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3">
        <div class="card-body">
            <form action="{{route('article.create.post',$news->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Makale Başlığı</label>
                    <textarea name="article" id="" cols="30" rows="4" class="form-control"></textarea>
                </div>
                <br>
                <div class="form-group">
                    <label>Fotoğraf</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label>Açıklama</label>
                    <textarea name="content" id="" cols="30" rows="4" class="form-control"></textarea>
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm">Makale Oluştur</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
