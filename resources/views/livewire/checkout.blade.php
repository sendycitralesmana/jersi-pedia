<div class="container">
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('keranjang') }}" class="text-dark">Keranjang</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Checkout</li>
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
            <h4>Informasi Pembayaran</h4>
            <p>Untuk pembayaran silahkan dapat transfer di rekening dibawah ini sebesar : <strong>Rp. {{ number_format($total_harga) }}</strong> </p>
            <hr>
            <div class="media">
                <img src="{{ asset('assets/bri.png') }}" class="mr-3" alt="Bank BRI" width="50">
                <div class="media-body">
                  <h5 class="mt-0">Bank BRI</h5>
                  <p>No. Rekening 012345-678-910 atas nama <strong>Citra Lesmana</strong> </p>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>Informasi Pengiriman</h4>
            <hr>
            <form wire:submit.prevent='checkout'>
                <div class="form-group">
                    <label for="">No HP</label>
                    <input type="number" value="{{ old('no_hp') }}" class="form-control @error('no_hp') is-invalid @enderror" 
                    wire:model="no_hp">
                    @error('no_hp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea wire:model="alamat" class="form-control @error('alamat') is-invalid @enderror">{{ ('alamat') }}</textarea>
                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success btn-block"> <i class="fas fa-arrow-right"></i> Checkout</button>
            </form>
        </div>
    </div>

</div>
