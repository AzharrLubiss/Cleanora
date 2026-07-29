<?php

namespace App\Filament\Resources\Layanans\Schemas;

use Filament\Forms\Components\TextArea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LayananForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->label('Nama Layanan')
                    ->required(),
                TextInput::make('harga_per_kg')
                    ->label('Harga Per KG')
                    ->numeric()
                    ->required(),
                TextInput::make('estimasi_waktu')
                    ->label('Estimasi Waktu')
                    ->required(),
                TextArea::make('deskripsi')
                    ->label('Deskripsi Layanan')
                    ->rows(4)
                    ->required(), 
            ]);
    }
}
