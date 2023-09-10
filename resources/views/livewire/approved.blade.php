<div class="container">
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">History</li>
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

    <div class="row mt-4">
        <div class="col">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal Pesan</th>
                        <th>Kode Pemesanan</th>
                        <th>Pesanan</th>
                        <th>Status</th>
                        <th>Total Harga</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @if (@empty($pesanans))
                        <tr>
                            <td colspan="8" align="center">Data Kosong</td>
                        </tr>
                    @else
                        <?php $no = 1 ?>
                        @foreach ($pesanans as $pesanan)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $pesanan->created_at }}</td>
                            <td>{{ $pesanan->kode_pemesanan }}</td>
                            <td>
                                <?php $pesanan_details = \App\Models\PesananDetail::where('pesanan_id', $pesanan->id)->get(); ?>
                                @foreach ($pesanan_details as $pesanan_detail)
                                <img src="{{ asset('assets/jersey/'.$pesanan_detail->product->gambar) }}" class="img-fluid" alt="" width="50">
                                {{ $pesanan_detail->product->nama }}
                                <br>
                                @endforeach
                            </td>
                            <td>
                                @if ($pesanan->status == 1)
                                    <p>Belum Lunas</p>
                                @else
                                    <p>Lunas</p>
                                @endif
                            </td>
                            <td><strong> Rp. {{ number_format($pesanan->total_harga + $pesanan->kode_unik) }}</strong></td>
                            <td>
                                @if ($pesanan->status == 1)
                                    <button wire:click='approved({{ $pesanan->id }})' class="btn btn-warning btn-block btn-sm">Approved</button>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <h4>Informasi Pembayaran</h4>
                    <p>Untuk pembayaran silahkan dapat transfer di rekening dibawah ini </p>
                    <hr>
                    <div class="media">
                        <img src="{{ asset('assets/bri.png') }}" class="mr-3" alt="Bank BRI" width="50">
                        <div class="media-body">
                        <h5 class="mt-0">Bank BRI</h5>
                        <p>No. Rekening 012345-678-910 atas nama <strong>Citra Lesmana</strong> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
