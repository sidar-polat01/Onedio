<x-app-layout>
    <x-slot name="header">
        PAYLAŞIM KATEGORİLERİ
    </x-slot>
    <div class="row mt-5 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Yeni Kategori Oluştur</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('share.category.create')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Kategori Adı</label>
                            <input type="text" class="form-control" name="name" required />
                        </div>
                        <div class="form-group">
                            <label>Fotoğraf</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Kategori Açıklaması</label>
                            <textarea name="description" id="" cols="30" rows="4" class="form-control"></textarea>
                        </div>
                        <br>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary btn-block">Ekle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kategoriler</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @elseif(session('danger'))
                            <div class="alert alert-danger">
                                {{session('danger')}}
                            </div>
                        @endif
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Fotoğraf</th>
                                <th>Kategori adı</th>
                                <th>Kategori açıklaması</th>
                                <th>Durumu</th>
                                <th style="width: 165px; text-align: center; font-size: 20px">İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>
                                        @if($category->image)
                                            <a href="{{asset($category->image)}}" target="_blank"><img src="{{asset($category->image)}}" style="width: 100px"></a>
                                        @endif
                                    </td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->description}}</td>
                                    <td>
                                        @switch($category->status)
                                            @case('publish')
                                            <button disabled class="btn btn-success" style="width: 70px">Aktif</button>
                                            @break
                                            @case('draft')
                                            <button disabled class="btn btn-primary">Taslak</button>
                                            @break
                                        @endswitch
                                    </td>
                                    <td>
                                        <a href="{{route('share.category.update',[$category->id])}}" class="btn btn-sm btn-primary">Düzenle</a>
                                        <a href="{{route('share.category.delete',[$category->id])}}" class="btn btn-sm btn-danger">Sil</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
