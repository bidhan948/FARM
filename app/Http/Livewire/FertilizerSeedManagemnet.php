<?php

namespace App\Http\Livewire;

use App\Models\fertilizer\fertilizer;
use App\Models\fertilizer\stock;
use App\Models\land\land_owner;
use App\Models\setting\crop;
use App\Models\setting\crop_type;
use App\Models\setting\unit;
use Livewire\Component;

class FertilizerSeedManagemnet extends Component
{

    public $landOwners = [];
    public $crop_types = [];
    public $crop_type_id = '';
    public $stock_type = '';
    public $land_owner_id = '';
    public $crop_id = null;
    public $fertilizer_id = null;
    public $unit_id = '';
    public $quantity = '';
    public $quantityMessage;
    public $is_crop = TRUE;
    public $is_fertilizer = FALSE;
    public $showStock = FALSE;
    public $remainStock = '';
    public $messageForQuantity = FALSE;
    public $crops = [];
    public $currentStock = [];
    public $fertilizers = [];
    public $units = [];

    // validating input 
    protected $rules = [
        'stock_type' => 'required', // Rule::in(['seed', 'fertilizer']),
        'unit_id' => 'required',
        'fertilizer_id' => 'required_if:stock_type,==,fertilizer|sometimes',
        'crop_id' => 'required_if:stock_type,==,seed|sometimes',
        'quantity' => 'required',
    ];

    public function mount()
    {
        $this->landOwners = land_owner::query()
            ->select('id', 'name_nepali')
            ->whereHas('landDetail')
            ->whereHas('agricultureDetail')
            ->whereHas('seedDetail')
            ->whereHas('animalDetail')
            ->whereHas('facilityDetail')
            ->get();

        $this->fertilizers = fertilizer::query()->get();
        $this->crop_types = crop_type::query()->get();
        $this->units = unit::query()->get();
    }

    public function render()
    {
        if ($this->stock_type != '') {
            if (in_array($this->stock_type, ['seed', 'fertilizer'])) {  // setting double security 
                if ($this->stock_type == 'fertilizer') {
                    $this->fertilizers = fertilizer::query()->get();
                    $this->is_crop = false;
                    $this->is_fertilizer = TRUE;
                } else {
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
        return view('livewire.fertilizer-seed-managemnet');
    }

    public function updatedQuantity()
    {
        if ($this->quantity == '' || !is_numeric($this->quantity)) {
            $this->quantityMessage = FALSE;
        } else {
            if (($this->crop_id != '' && $this->unit_id != '') || ($this->fertilizer_id != '' && $this->unit_id != '')) {

                $this->currentStock = stock::query()
                    ->when($this->crop_id, function ($q) {
                        $q->where('crop_id', $this->crop_id);
                    })
                    ->when($this->fertilizer_id, function ($q) {
                        $q->where('fertilizer_id', $this->fertilizer_id);
                    })
                    ->where('unit_id', $this->unit_id)
                    ->first();

                $this->remainStock = $this->currentStock->quantity - $this->quantity;
                
                if ($this->currentStock->quantity < $this->quantity) {
                    $this->quantityMessage = False;
                    $this->messageForQuantity = true;
                } else {
                    $this->messageForQuantity =False;
                    $this->quantityMessage = TRUE;
                }
                $this->showStock = TRUE;
            }
        }
    }

    public function assignStock()
    {
        $validatedData = $this->validate();
        dd($validatedData);
    }
}
