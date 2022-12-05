<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;

class AddInput extends Component
{
    public $productId;
    public $items;

    public $count = 1;
    public function mount($productId)
    {
        $this->productId = $productId;
        $this->count = 1;
    }

    public function add() {
        $this->count ++;
    }

    public function remove() {
        $this->count --;
    }
    public function render()
    {
        return view('livewire.admin.add-input');
    }
}
