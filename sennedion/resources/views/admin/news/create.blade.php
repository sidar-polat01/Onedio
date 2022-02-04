<x-app-layout>
    <x-slot name="header">Haber Oluştur</x-slot>

    <div class="card max-w-7xl mx-auto sm:px-6 lg:px-8 col-md-7 shadow mt-5" style="border-radius: 20px">
        <div class="card-body">
            <form action="{{route('news.create.post')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Haber Başlığı</label>
                    <input type="text" name="title" class="form-control" value="{{old('title')}}">
                </div>
                <br>
                <div class="form-group">
                    <label>Fotoğraf</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label>Haber Açıklaması</label>
                    <textarea name="description" id="" cols="30" rows="4" class="form-control">{{old('description')}}</textarea>
                </div>
                <br>
                <div class="form-group">
                    <label>Haber Kategori</label>
                    <select class="form-control" name="category" required>
                        <option value="">Seçim Yapınız</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm">Haber Oluştur</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
