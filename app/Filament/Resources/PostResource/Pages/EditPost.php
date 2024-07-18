<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $record = $this->record;

        foreach ($data as $field => $value) {
            if ($field === 'image' && empty($value)) {
                // Keep the current image if a new one is not uploaded
                $data[$field] = $record->getAttribute($field);
            } elseif ($record->{$field} === $value) {
                unset($data[$field]);
            }
        }

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
