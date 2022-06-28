<?php

namespace App\Http\Livewire;

use App\Models\fertilizer\fertilizer;
use App\Models\fertilizer\stock;
use App\Models\fertilizer\stock_log;
use App\Models\setting\crop;
use App\Traits\AuditTraitTrait;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class StockAdd extends Component
{
    use AuditTraitTrait;

    public $crop_types;
    public $crop_type_id = '';
    public $source = '';
    public $stock_type = '';
    public $crop_id = null;
    public $fertilizer_id = null;
    public $unit_id = '';
    public $quantity = '';
    public $quantityMessage;
    public $is_crop = TRUE;
    public $is_fertilizer = FALSE;
    public $crops = [];
    public $fertilizers = [];
    public $units = [];

    // validating input 
    protected $rules = [
        'stock_type' => 'required', // Rule::in(['seed', 'fertilizer']),
        'unit_id' => 'required',
        'fertilizer_id' => 'required_if:stock_type,==,fertilizer|sometimes',
        'crop_id' => 'required_if:stock_type,==,seed|sometimes',
        'quantity' => 'required',
        'source'=>'required'
    ];

    public function mount()
    {
        $this->fertilizers = fertilizer::query()->get();
    }

    public function updatedQuantity()
    {
        if ($this->quantity == '' || !is_numeric($this->quantity)) {
            $this->quantityMessage = FALSE;
        } else {
            $this->quantityMessage = TRUE;
        }
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
        return view('livewire.stock-add');
    }

    public function saveStock()
    {
        $validatedData = $this->validate();

        $checkDataIfPresent = stock::query()
            ->when($this->crop_id, function ($q) {
                $q->where('crop_id', $this->crop_id)
                    ->where('unit_id', $this->unit_id);
            })
            ->when($this->fertilizer_id, function ($q) {
                $q->where('fertilizer_id', $this->fertilizer_id)
                    ->where('unit_id', $this->unit_id);
            })->first();

        DB::transaction(function () use ($checkDataIfPresent, $validatedData) {
            if ($checkDataIfPresent == null) {
                $auditValue = stock::create($validatedData + ['user_id' => auth()->user()->id]);
                $this->storeAudit('App\Models\fertilizer\stock', $auditValue);
            } else {
                $oldValue = $checkDataIfPresent;
                $checkDataIfPresent->update(['quantity' => $this->quantity + $checkDataIfPresent->quantity]);
                $this->updateAudit('App\Models\fertilizer\stock', $oldValue, $checkDataIfPresent->getChanges());
            }
            stock_log::create($validatedData + ['user_id' => auth()->user()->id]);
        });

        Alert::success('STOCK added successfully');
        return redirect()->route('stock.index');
    }
}
