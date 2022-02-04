<x-app-layout>
    <x-slot name="header">Paylaşım Güncelle</x-slot>

    <div class="card max-w-7xl mx-auto sm:px-6 lg:px-8 col-md-6 mt-3 mb-2" style="border-radius: 30px">
        <div class="card-body">
            <form action="{{route('shares.update.post',$shares->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Paylaşım Başlığı</label>
                    <input type="text" name="title" class="form-control" value="{{$shares->title}}">
                </div>
                <br>
                <div class="form-group">
                    <label>Fotoğraf</label>
                    @if($shares->image)
                        <a href="{{asset($shares->image)}}" target="_blank">
                            <img src="{{asset($shares->image)}}" style="width: 150px"> <br>
                        </a>
                    @endif
                    <input type="file" name="image" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label>Paylaşım Açıklaması</label>
                    <textarea name="description" id="" cols="30" rows="4" class="form-control">{{$shares->description}}</textarea>
                </div>
                <br>
                <div class="form-group">
                    <label>Ürün Kategori</label>
                    <select class="form-control" name="category" required>
                        <option value="">Seçim Yapınız</option>
                        @foreach($categories as $category)
                            <option @if($shares->category_id==$category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label for="">Paylaşım Durumu</label> <br>
                    <select name="status" id="" class="form-group col-md-2">
                        <option @if($shares->status ==='publish') selected @endif value="publish">Aktif</option>
                        <option @if($shares->status ==='draft') selected @endif value="draft">Taslak</option>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm">Paylaşım Güncelle</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
