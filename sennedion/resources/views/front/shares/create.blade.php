<x-app-layout>
    <x-slot name="header">Paylaşım Oluştur</x-slot>

    <div class="card max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5 col-md-6">
        <div class="card-body">
            <form action="{{route('home.shares.create.post')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div hidden class="row">
                    <div class="form-group col-md-6">
                        <label>Ad</label>
                        <input type="text" name="userName" class="form-control" value="{{ Auth::user()->name }}">
                    </div>
                </div>
                <div class="form-group">
                    <label>Paylaşım Başlığı</label>
                    <input type="text" name="title" class="form-control" value="">
                </div>
                <br>
                <div class="form-group">
                    <label>Fotoğraf</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label>Paylaşım Açıklaması</label>
                    <textarea name="description" id="" cols="30" rows="4" class="form-control"></textarea>
                </div>
                <br>
                <div class="form-group">
                    <label>Paylaşım Kategori</label>
                    <select class="form-control" name="category" required>
                        <option value="">Seçim Yapınız</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm">Paylaşım Oluştur</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
