<?php

namespace App\Http\Livewire;

use App\Models\Pesanan;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Approved extends Component
{
    public $pesanans;

    public function approved($id)
    {
        // dd($id);
        $pesanan = Pesanan::find($id);
        $pesanan->status = 2;
        // dd($pesanan);
        $pesanan->update();

        Session::flash('status', 'success');
        Session::flash('message', 'Approved pesanan sukses');

        $this->emit('masukApproved');

        return redirect()->back();
    }

    public function render()
    {
        if (Auth::user()) {
            $this->pesanans = Pesanan::where('status', '!=', 0)->get();
        }
        
        return view('livewire.approved');
    }
}
