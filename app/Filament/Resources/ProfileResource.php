<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfileResource\Pages;
use App\Models\Profile;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;
    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->required(),

                Forms\Components\TextInput::make('title')
                    ->label('Title')
                    ->nullable(),

                Forms\Components\Textarea::make('bio')
                    ->label('Bio')
                    ->rows(4)
                    ->nullable(),

                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->nullable(),

                Forms\Components\TextInput::make('phone')
                    ->label('Phone')
                    ->nullable(),

                // Address sebagai string biasa
                Forms\Components\TextArea::make('address')
                    ->label('Address')
                    ->placeholder('Contoh: Jawa Timur, Kab. Malang, Kec. Ngantang, ...')
                    ->nullable(),

                FileUpload::make('photo')
                    ->label('Photo')
                    ->image()
                    ->disk('public')
                    ->directory('profile-photos')
                    ->storeFileNamesIn('photo')
                    ->required()
                    ->saveUploadedFileUsing(function ($file) {
                        $filename    = uniqid() . '-' . preg_replace('/[^A-Za-z0-9\.\-_]/', '', $file->getClientOriginalName());
                        $destination = public_path('profile-photos/' . $filename);
                        if (! file_exists(public_path('profile-photos'))) {
                            mkdir(public_path('profile-photos'), 0755, true);
                        }
                        $in  = fopen($file->getRealPath(), 'rb');
                        $out = fopen($destination, 'wb');
                        stream_copy_to_stream($in, $out);
                        fclose($in);
                        fclose($out);

                        return 'profile-photos/' . $filename;
                    })
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Name'),
                Tables\Columns\TextColumn::make('title')->label('Title'),
                Tables\Columns\TextColumn::make('email')->label('Email'),
                Tables\Columns\TextColumn::make('phone')->label('Phone'),
                Tables\Columns\TextColumn::make('address')->label('Address'),
                ImageColumn::make('photo')
                    ->label('Photo')
                    ->url(fn ($record) => asset($record->photo))
                    ->height(50),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListProfiles::route('/'),
            'create' => Pages\CreateProfile::route('/create'),
            'edit'   => Pages\EditProfile::route('/{record}/edit'),
        ];
    }
}
