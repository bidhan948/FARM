<?php

namespace App\Http\Livewire;

use App\Models\setting\irrigation_type;
use Livewire\Component;

class LandDetail extends Component
{
    public $land_types;
    public $is_foreign = '';
    public $showTerai = false;
    public $showPahad = false;
    public $checkBox = true;
    public $irrigation_types = [];

    public function mount()
    {
        $this->irrigation_types = irrigation_type::query()->get();
    }
    public function render()
    {
        if ($this->is_foreign != '') {  
            $this->showTerai = $this->is_foreign ? true : false;
            $this->showPahad = $this->is_foreign ? false : true;
            $this->checkBox = false;
        }
        return view('livewire.land-detail');
    }
}
