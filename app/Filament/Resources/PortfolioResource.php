<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioResource\Pages;
use App\Filament\Resources\PortfolioResource\RelationManagers;
use App\Models\Portfolio;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Support\Facades\Log;

class PortfolioResource extends Resource
{
    protected static ?string $model = Portfolio::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required(),
                Forms\Components\Textarea::make('description'),
                FileUpload::make('image')
                    ->image()
                    ->directory('portfolio-images')
                    ->getUploadedFileNameForStorageUsing(function ($file) {
                        return uniqid() . '-' . $file->getClientOriginalName();
                    })
                    ->afterStateUpdated(function ($state, $component) {
                        \Log::info('afterStateUpdated called', ['state' => $state]);
                        $storagePath = storage_path('app/' . $state);
                        $publicPath = public_path('portfolio-images/' . basename($state));
                        if ($state && file_exists($storagePath)) {
                            \Log::info('File exists in storage, copying...', ['from' => $storagePath, 'to' => $publicPath]);
                            if (copy($storagePath, $publicPath)) {
                                unlink($storagePath);
                                $component->state('portfolio-images/' . basename($state));
                                \Log::info('File copied to public and state updated.');
                            } else {
                                \Log::error('Failed to copy file from storage to public.', ['from' => $storagePath, 'to' => $publicPath]);
                            }
                        } else {
                            \Log::error('File not found in storage.', ['expected' => $storagePath]);
                        }
                    })
                    ->required(),
                Forms\Components\View::make('components.image-preview')
                    ->visible(fn ($get) => $get('image')),
                Forms\Components\TextInput::make('link')->label('Link')->url(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Title')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('description')->label('Description'),
                ImageColumn::make('image')
                    ->label('Image')
                    ->url(fn ($record) => $record->getImageUrl('image'))
                    ->height(50),
                Tables\Columns\TextColumn::make('link')->label('Link')->url(fn ($record) => $record->link)->openUrlInNewTab(),
            ])
            ->filters([
                //
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
        return [
            //
        ];
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
