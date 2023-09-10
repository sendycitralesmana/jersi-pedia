<div class="container">
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('products') }}" class="text-dark">List Jersey</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Jersi Detail</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if (Session::has('status'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="btn btn-success close" data-dismiss="alert" sty>&times;</button>
                    {{Session::get('message')}}
                </div>
                @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card ">
                <div class="card-body gambar-product">
                    <img src="{{ asset('assets/jersey/'.$product->gambar) }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h2>
                <strong>{{ $product->nama }}</strong>
            </h2>
            <h4>
                Rp. {{ $product->harga }}
                @if ( $product->is_ready == 1 )
                <span class="badge badge-success"><i class="fas fa-check"></i> Stok Tersedia</span>
                @elseif ( $product->is_ready != 1 )
                <span class="badge badge-danger"><i class="fas fa-times"></i> Stok Habis</span>
                @endif
            </h3>
            <div class="row">
                <form wire:submit.prevent='masukkanKeranjang'>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>Liga</td>
                                <td>:</td>
                                <td>
                                    <img src="{{ asset('assets/liga/'.$product->liga->gambar) }}" class="img-fluid" alt="" width="50">
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis</td>
                                <td>:</td>
                                <td>{{ $product->jenis }}</td>
                            </tr>
                            <tr>
                                <td>Berat</td>
                                <td>:</td>
                                <td>{{ $product->berat }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah</td>
                                <td>:</td>
                                <td>
                                    <input id="jumlah_pesanan" type="number" value="{{ old('jumlah_pesanan') }}" class="form-control @error('jumlah_pesanan') is-invalid @enderror"
                                    wire:model="jumlah_pesanan" autocomplete="new-jumlah_pesanan" autofocus>

                                    @error('jumlah_pesanan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror    
                                </td>
                            </tr>
                            @if ($jumlah_pesanan > 1)
                            @else
                            <tr>
                                <td colspan="3"><strong>Name Set (isi jika tambah nameset)</strong></td>
                            </tr>
                            <tr>
                                <td>Harga Nameset</td>
                                <td>:</td>
                                <td>{{ $product->harga_nameset }}</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>
                                    <input id="nama" type="text" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" 
                                    wire:model="nama"  autocomplete="new-nama">

                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror    
                                </td>
                            </tr>
                            <tr>
                                <td>Nomor</td>
                                <td>:</td>
                                <td>
                                    <input id="nomor" type="number" value="{{ old('nomor') }}" class="form-control @error('nomor') is-invalid @enderror" 
                                    wire:model="nomor"  autocomplete="new-nomor">

                                    @error('nomor')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror    
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <td colspan="3">
                                    <button type="submit" class="btn btn-block btn-dark" @if ($product->is_ready != 1 || auth()->user()->role == 1)
                                        disabled
                                    @endif>
                                    <i class="fas fa-shopping-cart"></i> Masukkan Keranjang</button>
                                </td>
                            </tr>
                        </thead>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
