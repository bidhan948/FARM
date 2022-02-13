<?php

namespace App\Traits;

use App\Models\audit_trail;

trait AuditTraitTrait
{

    /** 
     * @param class with fullnamespace
     * @param data recently added 
     * @param operation string 
     * @return boolean
     */

    public function storeAudit($class, $data)
    {
        $object = $this->getObject($class);

        try {
            audit_trail::create([
                'type' => 'create',
                'new_value' => json_encode($data),
                'table_name' => $object->getTable(),
                'affected_columns' => json_encode(array_keys($data->toArray())),
                'primary_key' => $data->id,
            ] + $this->userIdInArray());
        } catch (\Exception $e) {

            dd($e->getMessage());
        }

        return true;
    }

    public function updateAudit($class, $oldValue, $newValue)
    {
        $object = $this->getObject($class);

        try {
            audit_trail::create([
                'type' => 'update',
                'old_value' => json_encode($oldValue),
                'table_name' => $object->getTable(),
                'new_value'=>json_encode($newValue),
                'affected_columns' => json_encode(array_keys($newValue)),
                'primary_key' => $oldValue->id
            ] + $this->userIdInArray());
        } catch (\Exception $e) {

            dd($e->getMessage());
        }

        return true;
    }

    public function userIdInArray(): array
    {
        return ['user_id' => auth()->user()->id];
    }

    public function getObject($class)
    {
        return new $class;
    }
}
