<?php

namespace App\Http\Livewire;

use App\Models\Pesanan;
use Livewire\Component;
use App\Models\PesananDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Keranjang extends Component
{
    protected $pesanan;
    protected $pesanan_detail = [];
    
    public function destroy($id)
    {
        // dd('destroy'.$id);
        $pesanan_detail = PesananDetail::find($id);
        // dd($pesanan_detail);
        if (!empty($pesanan_detail)) {

            $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
            $jumlah_pesanan_detail = PesananDetail::where('pesanan_id', $pesanan->id)->count();
            if ($jumlah_pesanan_detail == 1) {
                // dd($jumlah_pesanan_detail);
                $pesanan_detail->delete();
                $pesanan->delete();
            } else {
                $pesanan->total_harga = $pesanan->total_harga - $pesanan_detail->total_harga;
                $pesanan->update();
                $pesanan_detail->delete();
            }

            $this->emit('masukKeranjang');

            Session::flash('status', 'success');
            Session::flash('message', 'Pesanan dihapus');

            return redirect()->back();
        }
    }

    public function render()
    {
        if (!Auth::user()) {
            return view('livewire.keranjang');
        } else {
            $this->pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if ($this->pesanan) {
                $this->pesanan_detail = PesananDetail::where('pesanan_id', $this->pesanan->id)->get();
            }
            return view('livewire.keranjang', [
                'pesanan' => $this->pesanan,
                'pesanan_details' => $this->pesanan_detail,
            ]);
        }
    }
}
