<?php

namespace App\Http\Livewire;

use App\Models\Pesanan;
use App\Models\Product;
use Livewire\Component;
use App\Models\PesananDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductDetail extends Component
{
    public $product, $jumlah_pesanan, $nama, $nomor;

    public function mount($id)
    {
        $productDetail = Product::find($id);
        if ($productDetail) {
            $this->product = $productDetail;
        }
    }

    public function masukkanKeranjang()
    {
        $this->validate([
            'jumlah_pesanan' => 'required',
        ]);

        // Jika belum login
        if(!Auth::user()) {
            return redirect()->route('login');
        }

        // Menghitung total harga
        if (!empty($this->nama)) {
            $total_harga = $this->jumlah_pesanan * $this->product->harga + $this->product->harga_nameset;
        } else{
            $total_harga = $this->jumlah_pesanan*$this->product->harga;
        }

        // Cek apakah user punya data pesanan utama yang status nya 0
        $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        // Menyimpan / update data pesanan utama
        if (empty ($cek_pesanan)) {
            $pesanan = new Pesanan();
            $pesanan->kode_pemesanan = 0;
            $pesanan->status = 0;
            $pesanan->total_harga = $total_harga;
            $pesanan->kode_unik = mt_rand(100, 999);
            $pesanan->user_id = Auth::user()->id;
            $pesanan->save();

            $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            $cek_pesanan->kode_pemesanan = 'JP-'.$cek_pesanan->id;
            $cek_pesanan->update();

        } else {
            $cek_pesanan->total_harga = $cek_pesanan->total_harga + $total_harga;
            $cek_pesanan->update();
        }

        //
        $p_detail = new PesananDetail();
        $p_detail->jumlah_pesanan = $this->jumlah_pesanan;
        $p_detail->total_harga = $total_harga;
        $p_detail->nameset = $this->nama ? true : false;
        $p_detail->nama = $this->nama;
        $p_detail->nomor = $this->nomor;
        $p_detail->product_id = $this->product->id;
        $p_detail->pesanan_id = $cek_pesanan->id;
        $p_detail->save();

        $this->emit('masukKeranjang');

        Session::flash('status', 'success');
        Session::flash('message', 'Sukses masuk keranjang');

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.product-detail');
    }
}
