<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CategoryForm
{
   public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                Select::make('parent_id')
                    ->relationship('parent', 'title')
                    ->searchable()
                    ->preload()
                    ->nullable(),

                Textarea::make('description')
                    ->nullable()
                    ->columnSpanFull(),
            ]);
    }
}
