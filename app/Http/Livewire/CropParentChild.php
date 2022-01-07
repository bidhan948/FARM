<?php

namespace App\Http\Livewire;

use App\Models\setting\crop;
use Livewire\Component;

class CropParentChild extends Component
{
    public $crop_types;
    public $crops = [];
    public $crop_type = '';
    public $crop = '';

    public function render()
    {
        if ($this->crop_type != '') {
            $this->crops = crop::query()
                ->where('crop_type_id', $this->crop_type)
                ->get();
        }
        return view('livewire.crop-parent-child');
    }
}
