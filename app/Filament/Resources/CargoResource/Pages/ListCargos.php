<?php

namespace App\Filament\Resources\CargoResource\Pages;

use App\Filament\Resources\CargoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCargos extends ListRecords
{
    protected static string $resource = CargoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
