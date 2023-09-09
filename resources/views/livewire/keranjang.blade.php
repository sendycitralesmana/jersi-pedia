<div class="container">
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if (Session::has('status'))
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="btn btn-danger close" data-dismiss="alert" sty>&times;</button>
                    {{Session::get('message')}}
                </div>
                @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form wire:submit.prevent='masukkanKeranjang'>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Gambar</th>
                            <th>Keterangan</th>
                            <th>Name Set</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total Harga</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (@empty($pesanan_details))
                            <tr>
                                <td colspan="8" align="center">Data Kosong</td>
                            </tr>
                        @else
                            <?php $no = 1 ?>
                            @foreach ($pesanan_details as $pesanan_detail)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td><img src="{{ asset('assets/jersey/'.$pesanan_detail->product->gambar) }}" class="img-fluid" alt="" width="200"></td>
                                <td>{{ $pesanan_detail->product->nama }}</td>
                                <td>
                                    @if ($pesanan_detail->nameset)
                                        Nama : {{ $pesanan_detail->nama }} <br>
                                        Nomor : {{ $pesanan_detail->nomor }}
                                    @else
                                        -
                                    @endif    
                                </td>
                                <td>{{ $pesanan_detail->jumlah_pesanan }}</td>
                                <td>Rp. {{ number_format($pesanan_detail->product->harga) }}</td>
                                <td><strong>Rp. {{ number_format($pesanan_detail->total_harga) }}</strong> </td>
                                <td class="text-center"><i wire:click='destroy({{ $pesanan_detail->id }})' class="fas fa-trash text-danger"></i></td>
                            </tr>
                            @endforeach
                            @if (!@empty($pesanan))
                            <tr>
                                <td colspan="7" align="right"><strong>Total Harga :</strong></td>
                                <td><strong>Rp. {{ number_format($pesanan->total_harga) }}</strong> </td>
                            </tr>
                            <tr>
                                <td colspan="7" align="right"><strong>Kode Unik :</strong></td>
                                <td><strong>Rp. {{ number_format($pesanan->kode_unik) }}</strong> </td>
                            </tr>
                            <tr>
                                <td colspan="7" align="right"><strong>Total Yang Harus Dibayar :</strong></td>
                                <td><strong>Rp. {{ number_format($pesanan->total_harga + $pesanan->kode_unik) }}</strong> </td>
                            </tr>
                            <tr>
                                <td colspan="6" align="right"></td>
                                <td colspan="2">
                                    <a href="{{ route('checkout') }}" class="btn btn-block btn-success">
                                        <i class="fas fa-arrow-right"></i> Checkout
                                    </a>
                                </td>
                            </tr>
                            @endif
                        @endif
                    </tbody>
                </table>
            </form>
        </div>
    </div>

</div>
