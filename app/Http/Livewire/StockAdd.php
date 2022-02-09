<?php

namespace App\Http\Livewire;

use App\Models\fertilizer\fertilizer;
use App\Models\setting\crop;
use Livewire\Component;

class StockAdd extends Component
{

    public $crop_types;
    public $crop_type_id = '';
    public $stock_type = '';
    public $crop_id = '';
    public $fertilizer_id = '';
    public $is_crop = TRUE;
    public $is_fertilizer = FALSE;
    public $crops = [];
    public $fertilizers = [];

    public function mount()
    {
        $this->fertilizers = fertilizer::query()->get();
    }

    public function render()
    {
        if ($this->stock_type != '') {
            if (in_array($this->stock_type, ['seed', 'fertilizer'])) {  // setting double security 
                if ($this->stock_type == 'fertilizer') {
                    $this->fertilizers = fertilizer::query()->get();
                    $this->is_crop = false;
                    $this->is_fertilizer = TRUE;
                }
                if ($this->stock_type == 'seed') {
                    if ($this->crop_type_id != '') {
                        $this->crops = crop::query()
                            ->where('crop_type_id', $this->crop_type_id)
                            ->get();
                    }
                    $this->is_crop = true;
                    $this->is_fertilizer = false;
                }
            }
        }
        return view('livewire.stock-add');
    }
}
