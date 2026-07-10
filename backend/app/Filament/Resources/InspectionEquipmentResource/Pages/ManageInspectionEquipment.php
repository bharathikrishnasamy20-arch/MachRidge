<?php

namespace App\Filament\Resources\InspectionEquipmentResource\Pages;

use App\Filament\Resources\InspectionEquipmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageInspectionEquipment extends ManageRecords
{
    protected static string $resource = InspectionEquipmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
