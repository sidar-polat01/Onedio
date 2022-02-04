<x-app-layout>
    <x-slot name="header">
        KATEGORİLER
    </x-slot>
    <div class="row mt-5 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="col-md-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Yeni Kategori Oluştur</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('category.create')}}">
                        @csrf
                        <div class="form-group">
                            <label>Kategori Adı</label>
                            <input type="text" class="form-control" name="category" required />
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary btn-block">Ekle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7">
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
                                <th>Kategori adı</th>
                                <th>Haber sayısı</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->newsCount()}}</td>
                                    <td>
                                        <a href="{{route('category.update',[$category->id])}}" class="btn btn-sm btn-primary">Düzenle</a>
                                        <a href="{{route('category.delete',[$category->id])}}" class="btn btn-sm btn-danger">Sil</a>
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
