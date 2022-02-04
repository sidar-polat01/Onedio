<x-app-layout>
    <x-slot name="header">
        PAYLAŞIMLAR
    </x-slot>
    <div class="card max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
        <div class="card-body">
            <form action="" method="GET">
                <div class="row">
                    <div class="row col-md-6">
                        <h5 class="card-title col-md-4">
                            <a href="{{route('home.shares.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Paylaşım Oluştur</a>
                        </h5>
                        <h5 class="card-title col-md-6">
                            <a href="{{route('share.category.index')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Kategori Oluştur-Güncelle</a>
                        </h5>
                    </div>

                    <div class="col-md-3">
                        <input type="text" name="title" value="{{request()->get('title')}}" placeholder="Haber Adı" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <select name="status" onchange="this.form.submit()" class="form-control" id="">
                            <option value="">Durum Seçiniz</option>
                            <option @if(request()->get('status')=='publish') selected @endif value="publish">Aktif</option>
                            <option @if(request()->get('status')=='draft') selected @endif value="draft">Taslak</option>
                        </select>
                    </div>
                    @if(request()->get('title') || request()->get('status'))
                        <div class="col-md-1">
                            <a href="{{route('news.index')}}" class="btn btn-secondary">
                                Sıfırla
                            </a>
                        </div>
                    @endif
                </div>
            </form>
            <br>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col" style="text-align: center; font-size: 23px" width="100px">Resim</th>
                    <th scope="col" style="text-align: center; font-size: 23px" width="200px">Başlık</th>
                    <th scope="col" style="width: 230px; font-size: 23px">Açıklama</th>
                    <th scope="col" style="width: 230px; font-size: 23px">Kategori</th>
                    <th scope="col" style="width: 60px; font-size: 20px">Gönderen Adı</th>
                    <th scope="col" style="font-size: 20px" width="80px">Durum</th>
                    <th scope="col" style="width: 165px; text-align: center; font-size: 20px">İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach($shares as $share)
                    <tr>
                        <td>
                            @if($share->image)
                                <a href="{{asset($share->image)}}" target="_blank"><img src="{{asset($share->image)}}" style="width: 100px"></a>
                            @endif
                        </td>
                        <td>{{$share->title}}</td>
                        <td>{{$share->description}}</td>
                        <td>{{$share->getCategory->name}}</td>
                        <td>{{$share->userName}}</td>
                        <td>
                            @switch($share->status)
                                @case('publish')
                                <button disabled class="btn btn-success" style="width: 70px">Aktif</button>
                                @break
                                @case('draft')
                                <button disabled class="btn btn-primary">Taslak</button>
                                @break
                            @endswitch
                        </td>
                        <td>
                            <a href="{{route('shares.update',[$share->id])}}" class="btn btn-sm btn-secondary">Düzenle</a>
                            <a href="{{route('shares.delete',[$share->id])}}" class="btn btn-sm btn-danger">Sil</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$shares->links()}}
        </div>
    </div>
</x-app-layout>

