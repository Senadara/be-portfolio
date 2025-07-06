<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SoftSkillResource\Pages;
use App\Filament\Resources\SoftSkillResource\RelationManagers;
use App\Models\SoftSkill;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SoftSkillResource extends Resource
{
    protected static ?string $model = SoftSkill::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Skills Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Select::make('category')
                    ->options([
                        'Communication' => 'Communication',
                        'Leadership' => 'Leadership',
                        'Problem Solving' => 'Problem Solving',
                        'Adaptability' => 'Adaptability',
                        'Time Management' => 'Time Management',
                    ]),
                Forms\Components\Select::make('proficiency_level')
                    ->options([
                        1 => 'Beginner (1)',
                        2 => 'Elementary (2)',
                        3 => 'Intermediate (3)',
                        4 => 'Advanced (4)',
                        5 => 'Expert (5)',
                    ])
                    ->default(1)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category')
                    ->sortable(),
                Tables\Columns\TextColumn::make('proficiency_level')
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->limit(50),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'Communication' => 'Communication',
                        'Leadership' => 'Leadership',
                        'Problem Solving' => 'Problem Solving',
                        'Adaptability' => 'Adaptability',
                        'Time Management' => 'Time Management',
                    ]),
                Tables\Filters\SelectFilter::make('proficiency_level')
                    ->options([
                        1 => 'Beginner (1)',
                        2 => 'Elementary (2)',
                        3 => 'Intermediate (3)',
                        4 => 'Advanced (4)',
                        5 => 'Expert (5)',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListSoftSkills::route('/'),
            'create' => Pages\CreateSoftSkill::route('/create'),
            'edit' => Pages\EditSoftSkill::route('/{record}/edit'),
        ];
    }    
}
