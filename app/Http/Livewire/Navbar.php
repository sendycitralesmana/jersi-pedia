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
    public $approved = 0;

    public function updateKeranjang()
    {
        if (Auth::user()) {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if ($pesanan) {
                $this->jumlah = PesananDetail::where('pesanan_id', $pesanan->id)->count();
            } else {
                $this->jumlah = 0;
            }
        }
    }
    
    public function updateApproved()
    {
        if (Auth::user()) {
            $pesanan = Pesanan::where('status', 1)->get();
            if ($pesanan) {
                $this->approved = $pesanan->count();
            } else {
                $this->approved = 0;
            }
        }
    }

    protected $listeners = [
        'masukKeranjang' => 'updateKeranjang',
        'masukApproved' => 'updateApproved'
    ];

    public function mount()
    {
        if (Auth::user()) {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if ($pesanan) {
                $this->jumlah = PesananDetail::where('pesanan_id', $pesanan->id)->count();
            } else {
                $this->jumlah = 0;
            }
        }
        
        if (Auth::user()) {
            $pesanan = Pesanan::where('status', 1)->get();
            if ($pesanan) {
                $this->approved = $pesanan->count();
            } else {
                $this->approved = 0;
            }
        }
    }

    public function render()
    {
        $ligas = Liga::all();
        return view('livewire.navbar', [
            'ligas' => $ligas,
            'jumlah_pesanan' => $this->jumlah,
            'jumlah_approved' => $this->approved,
        ]);
    }
}
