<div class="container">
    {{-- The Master doesn't talk, he acts. --}}
    
    {{-- Banner --}}
    <div class="banner">
        <img src="{{ asset('assets/slider/slider1.png') }}" alt="">
    </div>

    {{-- Liga --}}
    <section class="pilih-liga mt-5">
        <h3><strong>Pilih Liga</strong></h3>
        <div class="row mt-3">
            @foreach ($ligas as $liga)
                <div class="col">
                    <a href="{{ route('products-liga', $liga->id) }}">
                        <div class="card shadow">
                            <div class="card-body text-center">
                                <img src="{{ asset('assets/liga/'.$liga->gambar) }}" class="img-fluid" alt="">
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Product --}}
    <section class="product mt-5">
        <h3>
            <strong>Best Products</strong>
            <a href="{{ route('products') }}" class="btn btn-dark float-right"> <i class="fas fa-eye"></i> Lihat Semua</a>
        </h3>
        <div class="row mt-3">
            @foreach ($products as $product)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <img src="{{ asset('assets/jersey/'.$product->gambar) }}" class="img-fluid" alt="">
                            <div class="row">
                                <div class="col-12">
                                    <h5><strong>{{ $product->nama }}</strong></h5>
                                    <h5>Rp. {{ number_format($product->harga) }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-dark btn-block"> <i class="fas fa-eye"></i> Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>
