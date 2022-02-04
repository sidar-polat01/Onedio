<x-app-layout>
    <x-slot name="header">Haber Güncelle</x-slot>

    <div class="card max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3">
        <div class="card-body">
            <form action="{{route('news.update.post',$news->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Haber Başlığı</label>
                    <input type="text" name="title" class="form-control" value="{{$news->title}}">
                </div>
                <br>
                <div class="form-group">
                    <label>Fotoğraf</label>
                    @if($news->image)
                        <a href="{{asset($news->image)}}" target="_blank">
                            <img src="{{asset($news->image)}}" style="width: 150px"> <br>
                        </a>
                    @endif
                    <input type="file" name="image" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label>Haber Açıklaması</label>
                    <textarea name="description" id="" cols="30" rows="4" class="form-control">{{$news->description}}</textarea>
                </div>
                <br>
                <div class="form-group">
                    <label>Ürün Kategori</label>
                    <select class="form-control" name="category" required>
                        <option value="">Seçim Yapınız</option>
                        @foreach($categories as $category)
                            <option @if($news->category_id==$category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label for="">Haber Durumu</label> <br>
                    <select name="status" id="" class="form-group col-md-2">
                        <option @if($news->status ==='publish') selected @endif value="publish">Aktif</option>
                        <option @if($news->status ==='passive') selected @endif value="passive">Pasif</option>
                        <option @if($news->status ==='draft') selected @endif value="draft">Taslak</option>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm">Haber Güncelle</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
