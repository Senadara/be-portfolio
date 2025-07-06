<?php

namespace App\Filament\Resources\SoftSkillResource\Pages;

use App\Filament\Resources\SoftSkillResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSoftSkill extends EditRecord
{
    protected static string $resource = SoftSkillResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
