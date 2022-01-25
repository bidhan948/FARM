<?php

namespace App\Http\Livewire;

use App\Models\fertilizer\category;
use App\Models\fertilizer\fertilizer_area;
use App\Models\fertilizer\fertilizer_crop;
use Livewire\Component;

class FertilizerCalculator extends Component
{
    public $areas = [];
    public $categories = [];
    public $crops = [];
    public $category_id = '';
    public $crop_id = '';
    public $area_id = '';
    public $area = '';
    public $message = '';
    public $calculation = [];
    public $fertilizerCrop = [];
    public $bool = false;

    public function mount()
    {
        $this->areas = fertilizer_area::query()
            ->latest()
            ->get();

        $this->categories = category::query()
            ->latest()
            ->get();
    }

    public function render()
    {
        if ($this->category_id != '') {

            $this->crops = fertilizer_crop::query()
                ->where('category_id', $this->category_id)
                ->get();
        }

        return view('livewire.fertilizer-calculator');
    }

    public function calculate()
    {
        if (
            $this->category_id == ''
            || $this->crop_id == ''
            || $this->area == ''
            || $this->area_id == ''
            || $this->area == 0
            || $this->area < 0
        ) {
            $this->bool = FALSE;
            $this->message = 'कृपया आवश्यक विवरण भर्नु होला';
        } else {
            $this->message = '';
            $this->bool = true;
            $fertilizerArea = fertilizer_area::find($this->area_id);
            $this->fertilizerCrop = fertilizer_crop::query()
                ->where('id', $this->crop_id)
                ->first();

            $this->calculation['potash'] = $this->area * $fertilizerArea->equal_to_kattha * $this->fertilizerCrop->potash;
            $this->calculation['dap'] = $this->area * $fertilizerArea->equal_to_kattha * $this->fertilizerCrop->dap;
            $this->calculation['urea'] = $this->area * $fertilizerArea->equal_to_kattha * $this->fertilizerCrop->urea;
            $this->calculation = collect($this->calculation);
        }
    }
}
