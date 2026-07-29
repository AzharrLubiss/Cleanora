<?php

namespace App\Filament\Resources\Pesanans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Tables\Filters\SelectFilter;

class PesanansTable
{
    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('kode_pesanan')
                    ->searchable(),

                TextColumn::make('user.name')
                    ->label('Pelanggan')
                    ->searchable(),

                TextColumn::make('layanan.nama_layanan')
                    ->label('Layanan'),

                TextColumn::make('berat')
                    ->suffix(' Kg'),

                TextColumn::make('total_harga')
                    ->money('IDR'),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {

                        'menunggu' => 'gray',

                        'dicuci' => 'warning',

                        'dikeringkan' => 'info',

                        'disetrika' => 'primary',

                        'siap_diambil' => 'success',

                        'selesai' => 'danger',

                        default => 'gray',
                    }),

                TextColumn::make('tanggal_masuk')
                    ->date(),

            ])

            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'menunggu' => 'Menunggu',
                        'dicuci' => 'Dicuci',
                        'dikeringkan' => 'Dikeringkan',
                        'disetrika' => 'Disetrika',
                        'siap_diambil' => 'Siap Diambil',
                        'selesai' => 'Selesai',
                    ]),
            ])

            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
