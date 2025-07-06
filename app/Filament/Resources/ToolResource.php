<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ToolResource\Pages;
use App\Filament\Resources\ToolResource\RelationManagers;
use App\Models\Tool;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ToolResource extends Resource
{
    protected static ?string $model = Tool::class;

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
                    ->helperText('URL to the tool icon'),
                Forms\Components\Textarea::make('description')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Select::make('category')
                    ->options([
                        'Development' => 'Development',
                        'Database' => 'Database',
                        'Testing & QA' => 'Testing & QA',
                        'Project Management' => 'Project Management',
                        'Design' => 'Design',
                        'AI & ML' => 'AI & ML',
                        'IoT' => 'IoT',
                        'Productivity' => 'Productivity',
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
                Tables\Columns\ImageColumn::make('icon')
                    ->label('Icon')
                    ->circular()
                    ->height(32)
                    ->width(32),
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
                        'Database' => 'Database',
                        'Testing & QA' => 'Testing & QA',
                        'Project Management' => 'Project Management',
                        'Design' => 'Design',
                        'AI & ML' => 'AI & ML',
                        'IoT' => 'IoT',
                        'Productivity' => 'Productivity',
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
            'index' => Pages\ListTools::route('/'),
            'create' => Pages\CreateTool::route('/create'),
            'edit' => Pages\EditTool::route('/{record}/edit'),
        ];
    }    
}
