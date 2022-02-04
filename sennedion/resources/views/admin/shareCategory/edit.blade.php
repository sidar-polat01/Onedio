<x-app-layout>
    <x-slot name="header">Kategori Düzenle</x-slot>
    <style>
        .set{
            margin-left: 350px;
            margin-top: 50px;
        }
    </style>
    <div class="row max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="col-md-5 set">
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @elseif(session('danger'))
                <div class="alert alert-danger">
                    {{session('danger')}}
                </div>
            @endif
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tip Güncelle</h6>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            {{$errors->first()}}
                        </div>
                    @endif
                    <form action="{{route('share.category.update.post',$categories->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Kategori adı</label>
                            <input name="name" class="form-control" value="{{$categories->name}}" placeholder="Kategori"></input>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Fotoğraf</label>
                            @if($categories->image)
                                <a href="{{asset($categories->image)}}" target="_blank">
                                    <img src="{{asset($categories->image)}}" style="width: 150px"> <br>
                                </a>
                            @endif
                            <input type="file" name="image" class="form-control">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Kategori Açıklaması</label>
                            <textarea name="description" id="" cols="30" rows="4" class="form-control">{{$categories->description}}</textarea>
                        </div>
                        <br>
                        <div class="row form-group">
                            <label for="" class="col-md-4">Paylaşım Durumu</label>
                            <select name="status" id="" class="form-group col-md-2">
                                <option @if($categories->status ==='publish') selected @endif value="publish">Aktif</option>
                                <option @if($categories->status ==='draft') selected @endif value="draft">Taslak</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-sm">Kategori Güncelle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
