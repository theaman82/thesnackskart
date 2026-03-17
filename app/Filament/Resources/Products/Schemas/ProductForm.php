<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProductForm
{
     public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->relationship('category', 'title')
                    ->searchable()
                    ->preload()
                    ->required(),

            TextInput::make('title')
    ->required()
    ->live(debounce: 100)
    ->afterStateUpdated(function ($state, callable $set) {
        $set('slug', \Illuminate\Support\Str::slug($state));
    }),

TextInput::make('slug')
    ->required()
    ->readOnly()
    ->dehydrated(),

                Textarea::make('description')
                    ->nullable()
                    ->columnSpanFull(),

                FileUpload::make('featured_image')
                    ->image()
                    ->directory('products')
                    ->nullable(),

                Toggle::make('status')
                    ->default(true),

                Repeater::make('variants')
                    ->relationship()
                    ->schema([
                     TextInput::make('sku')
    ->default(fn () => \App\Models\ProductVariant::generateUniqueSku())
    ->required()
    ->readOnly(),

                        TextInput::make('flavor')
                            ->nullable(),

                        TextInput::make('weight')
                            ->numeric()
                            ->nullable(),

                        Select::make('weight_unit')
                            ->options([
                                'g' => 'g',
                                'kg' => 'kg',
                            ])
                            ->default('g')
                            ->required(),

                        TextInput::make('pack_type')
                            ->nullable(),

                        TextInput::make('mrp')
                            ->numeric()
                            ->required(),

                        TextInput::make('sale_price')
                            ->numeric()
                            ->required(),

                        TextInput::make('stock')
                            ->numeric()
                            ->default(0)
                            ->required(),

                        FileUpload::make('image')
                            ->image()
                            ->directory('variants')
                            ->nullable(),

                        Toggle::make('status')
                            ->default(true),
                    ])
                    ->defaultItems(1)
                    ->columnSpanFull()
                    ->collapsible()
                    ->cloneable()
                    ->reorderable(),
            ]);
    }
}
