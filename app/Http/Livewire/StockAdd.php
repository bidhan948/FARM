<?php

namespace App\Http\Livewire;

use App\Models\setting\crop;
use Livewire\Component;

class StockAdd extends Component
{

    public $crop_types;
    public $crop_type = '';
    public $crops = [];

    public function render()
    {
        if ($this->crop_type != '') {
            $this->crops = crop::query()->get();        
        }
        return view('livewire.stock-add');
    }
}
