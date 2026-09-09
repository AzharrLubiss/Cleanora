<?php

namespace App\Filament\Widgets;

use App\Models\Pesanan;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestOrders extends BaseWidget
{
    protected static ?string $heading = 'Pesanan Terbaru';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Pesanan::query()->latest()
            )
            ->columns([
                Tables\Columns\TextColumn::make('kode_pesanan')
                    ->label('Kode')
                    ->searchable(),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Pelanggan'),

                Tables\Columns\TextColumn::make('layanan.nama')
                    ->label('Layanan'),

                Tables\Columns\TextColumn::make('berat')
                    ->suffix(' Kg'),

                Tables\Columns\TextColumn::make('total_harga')
                    ->money('IDR')
                    ->label('Total'),

                Tables\Columns\TextColumn::make('status')
                    ->badge(),

                Tables\Columns\TextColumn::make('tanggal_masuk')
                    ->date('d M Y'),
            ])
            ->defaultPaginationPageOption(5);
    }
}