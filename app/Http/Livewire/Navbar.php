<?php

namespace App\Http\Livewire;

use App\Models\Liga;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public $jumlah = 0;

    public function updateKeranjang()
    {
        if (Auth::user()) {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if ($pesanan) {
                $this->jumlah = PesananDetail::where('pesanan_id', $pesanan->id)->count();
            }
        }
    }

    protected $listeners = [
        'masukKeranjang' => 'updateKeranjang'
    ];

    public function mount()
    {
        if (Auth::user()) {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if ($pesanan) {
                $this->jumlah = PesananDetail::where('pesanan_id', $pesanan->id)->count();
            }
        }
    }

    public function render()
    {
        $ligas = Liga::all();
        return view('livewire.navbar', [
            'ligas' => $ligas,
            'jumlah_pesanan' => $this->jumlah,
        ]);
    }
}
