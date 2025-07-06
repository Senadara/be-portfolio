<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HardSkillResource\Pages;
use App\Filament\Resources\HardSkillResource\RelationManagers;
use App\Models\HardSkill;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HardSkillResource extends Resource
{
    protected static ?string $model = HardSkill::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Skills Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('icon')
                    ->maxLength(255)
                    ->helperText('URL to the skill icon'),
                Forms\Components\Textarea::make('description')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Select::make('category')
                    ->options([
                        'Development' => 'Development',
                        'Testing & QA' => 'Testing & QA',
                        'Project Management' => 'Project Management',
                        'Documentation' => 'Documentation',
                        'Network & Security' => 'Network & Security',
                        'IoT' => 'IoT',
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
                        'Development' => 'Development',
                        'Testing & QA' => 'Testing & QA',
                        'Project Management' => 'Project Management',
                        'Documentation' => 'Documentation',
                        'Network & Security' => 'Network & Security',
                        'IoT' => 'IoT',
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
            'index' => Pages\ListHardSkills::route('/'),
            'create' => Pages\CreateHardSkill::route('/create'),
            'edit' => Pages\EditHardSkill::route('/{record}/edit'),
        ];
    }    
}
