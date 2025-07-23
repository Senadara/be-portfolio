<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioResource\Pages;
use App\Models\Portfolio;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

class PortfolioResource extends Resource
{
    protected static ?string $model = Portfolio::class;
    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->dehydrated(true), // pastikan ini hanya string

                Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->nullable(),

                    FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('portfolio-images')
                    ->required()
                    ->saveUploadedFileUsing(function ($file) {
                        $filename = uniqid() . '-' . preg_replace('/[^A-Za-z0-9\.\-_]/', '', $file->getClientOriginalName());
                        $destination = public_path('portfolio-images/' . $filename);
                
                        if (!file_exists(public_path('portfolio-images'))) {
                            mkdir(public_path('portfolio-images'), 0755, true);
                        }
                
                        $inputStream = fopen($file->getRealPath(), 'rb');
                        $outputStream = fopen($destination, 'wb');
                
                        if ($inputStream && $outputStream) {
                            stream_copy_to_stream($inputStream, $outputStream);
                            fclose($inputStream);
                            fclose($outputStream);
                        } else {
                            throw new \Exception('Gagal mengunggah file.');
                        }
                
                        return 'portfolio-images/' . $filename; // <--- string hasil akhir
                    }),
                

                Forms\Components\TextInput::make('link')
                    ->label('Link')
                    ->url()
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('description')
                    ->label('Description'),

                ImageColumn::make('image')
                    ->label('Image')
                    ->url(fn ($record) => asset($record->image))
                    ->height(50),

                Tables\Columns\TextColumn::make('link')
                    ->label('Link')
                    ->url(fn ($record) => $record->link)
                    ->openUrlInNewTab(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPortfolios::route('/'),
            'create' => Pages\CreatePortfolio::route('/create'),
            'edit' => Pages\EditPortfolio::route('/{record}/edit'),
        ];
    }
}
