<?php

namespace App\Http\Livewire;

use App\Models\Liga;
use Livewire\Component;

class Navbar extends Component
{
    public function render()
    {
        $ligas = Liga::all();
        return view('livewire.navbar', [
            'ligas' => $ligas
        ]);
    }
}
