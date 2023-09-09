<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Pesanan;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Checkout extends Component
{
    public $total_harga, $no_hp, $alamat;

    public function mount()
    {
        if (!Auth::user()) {
            return redirect('login');
        }

        $this->no_hp = Auth::user()->no_hp;
        $this->alamat = Auth::user()->alamat;

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        if (!empty($pesanan)) {
            $this->total_harga = $pesanan->total_harga;
        } else {
            return redirect()->route('home');
        }
    }

    public function checkout()
    {
        $this->validate([
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        $user = User::where('id', Auth::user()->id)->first();
        $user->no_hp = $this->no_hp;
        $user->alamat = $this->alamat;
        $user->update();
        
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->status = 1;
        $pesanan->update();

        $this->emit('masukKeranjang');

        Session::flash('status', 'success');
        Session::flash('message', 'Sukses checkout');

        return redirect()->route('history');
    }

    public function render()
    {
        return view('livewire.checkout');
    }
}
