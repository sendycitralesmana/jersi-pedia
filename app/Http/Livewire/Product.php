<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product as ModelsProduct;

class Product extends Component
{
    use WithPagination;   
    public $search = '';
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        if($this->search) {
            $products = ModelsProduct::where('nama', 'like', '%'.$this->search.'%')->paginate(8);
        } else {
            $products = ModelsProduct::paginate(8);
        }

        return view('livewire.product', [
            'products' => $products
        ]);
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }
}
