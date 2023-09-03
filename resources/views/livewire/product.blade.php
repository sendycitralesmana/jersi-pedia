<div class="container">
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">List Jersey</li>
                </ol>
            </nav>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-9">
            <h2>List <strong>Jersey</strong></h2>
        </div>
        <div class="col-md-3">
            <div class="input-group mb-3">
                <input type="text" wire:model="search" class="form-control" placeholder="Search" >
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-search"></i></span>
                  
                </div>
            </div>
        </div>
    </div>

    {{-- Product --}}
    <section class="product">
        <div class="row mt-3">
            @foreach ($products as $product)
                <div class="col-md-3 mb-4">
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
                            <a href="#" class="btn btn-dark btn-block">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col">
                {{ $products->links() }}
            </div>
        </div>
    </section>
</div>
