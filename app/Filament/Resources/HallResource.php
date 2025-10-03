<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HallResource\Pages;
use App\Models\Hall;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;

class HallResource extends Resource
{
    protected static ?string $model = Hall::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationGroup = 'Festival Management';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Main Hall'),

                Forms\Components\TextInput::make('capacity')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(5000)
                    ->placeholder('200'),

                Forms\Components\Select::make('floor')
                    ->options([
                        'Ground Floor' => 'Ground Floor',
                        'First Floor' => 'First Floor',
                        'Second Floor' => 'Second Floor',
                        'Basement' => 'Basement',
                        'Garden Level' => 'Garden Level',
                    ])
                    ->placeholder('Select floor'),

                TiptapEditor::make('description')
                    ->columnSpanFull()
                    ->placeholder('Brief description of the hall and its facilities...')
                    ->profile('default')
                    ->tools([
                        'heading',
                        'bold',
                        'italic',
                        'underline',
                        'strike',
                        'subscript',
                        'superscript',
                        'color',
                        'highlight',
                        'align-left',
                        'align-center',
                        'align-right',
                        'align-justify',
                        'bullet-list',
                        'ordered-list',
                        'checked-list',
                        'blockquote',
                        'code',
                        'code-block',
                        'link',
                        'table',
                        'horizontal-rule',
                        'lead',
                        'small',
                        'hurdle',
                        'details',
                        'media',
                        'source',
                        'undo',
                        'redo',
                        'fullscreen',
                    ])
                    ->extraInputAttributes(['style' => 'min-height: 10rem;'])
                    ->mergeTags()
                    ->blocks([
                        'heading',
                        'paragraph',
                        'ordered-list',
                        'bullet-list',
                        'checked-list',
                        'blockquote',
                        'code-block',
                        'table',
                        'horizontal-rule',
                        'details',
                        'media',
                        'hurdle',
                    ])
                    ->maxContentWidth('5xl'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('capacity')
                    ->numeric()
                    ->sortable()
                    ->badge()
                    ->color('primary'),

                Tables\Columns\TextColumn::make('floor')
                    ->badge()
                    ->color('gray'),

                Tables\Columns\TextColumn::make('sessions_count')
                    ->counts('sessions')
                    ->label('Sessions')
                    ->badge()
                    ->color('success'),

                Tables\Columns\TextColumn::make('description')
                    ->limit(50)
                    ->toggleable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('floor')
                    ->options([
                        'Ground Floor' => 'Ground Floor',
                        'First Floor' => 'First Floor',
                        'Second Floor' => 'Second Floor',
                        'Basement' => 'Basement',
                        'Garden Level' => 'Garden Level',
                    ]),

                Tables\Filters\Filter::make('has_capacity')
                    ->query(fn ($query) => $query->whereNotNull('capacity'))
                    ->label('Has Capacity Info'),

                Tables\Filters\Filter::make('large_halls')
                    ->query(fn ($query) => $query->where('capacity', '>=', 100))
                    ->label('Large Halls (100+)'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('name');
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Hall Information')
                    ->schema([
                        Infolists\Components\Grid::make(2)
                            ->schema([
                                Infolists\Components\TextEntry::make('name')
                                    ->label('Hall Name')
                                    ->size('lg')
                                    ->weight('bold'),

                                Infolists\Components\TextEntry::make('capacity')
                                    ->label('Capacity')
                                    ->badge()
                                    ->color('primary')
                                    ->suffix(' people'),

                                Infolists\Components\TextEntry::make('floor')
                                    ->label('Floor')
                                    ->badge()
                                    ->color('gray'),

                                Infolists\Components\TextEntry::make('sessions_count')
                                    ->label('Total Sessions')
                                    ->state(fn ($record) => $record->sessions()->count())
                                    ->badge()
                                    ->color('success'),
                            ]),

                        Infolists\Components\TextEntry::make('description')
                            ->label('Description')
                            ->columnSpanFull()
                            ->html()
                            ->placeholder('No description available'),
                    ]),

                Infolists\Components\Section::make('Sessions in This Hall')
                    ->schema([
                        Infolists\Components\RepeatableEntry::make('sessions')
                            ->schema([
                                Infolists\Components\Grid::make(3)
                                    ->schema([
                                        Infolists\Components\TextEntry::make('title')
                                            ->weight('bold'),

                                        Infolists\Components\TextEntry::make('day.name')
                                            ->label('Day')
                                            ->badge()
                                            ->color('warning'),

                                        Infolists\Components\TextEntry::make('time_range')
                                            ->label('Time')
                                            ->badge()
                                            ->color('info'),
                                    ]),
                            ])
                            ->columnSpanFull(),
                    ])
                    ->visible(fn ($record) => $record->sessions()->exists()),
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
            'index' => Pages\ListHalls::route('/'),
            'create' => Pages\CreateHall::route('/create'),
            'view' => Pages\ViewHall::route('/{record}'),
            'edit' => Pages\EditHall::route('/{record}/edit'),
        ];
    }
}
