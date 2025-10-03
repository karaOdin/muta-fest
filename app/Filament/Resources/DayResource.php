<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DayResource\Pages;
use App\Models\Day;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists;
use Filament\Infolists\Infolist;

class DayResource extends Resource
{
    protected static ?string $model = Day::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    
    protected static ?string $navigationGroup = 'Festival Management';
    
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Day 1'),
                    
                Forms\Components\DatePicker::make('date')
                    ->required()
                    ->native(false)
                    ->displayFormat('d/m/Y'),
                    
                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(10)
                    ->default(1)
                    ->placeholder('1'),
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
                    
                Tables\Columns\TextColumn::make('date')
                    ->date('d/m/Y')
                    ->sortable()
                    ->badge()
                    ->color('primary'),
                    
                Tables\Columns\TextColumn::make('order')
                    ->numeric()
                    ->sortable()
                    ->badge()
                    ->color('gray'),
                    
                Tables\Columns\TextColumn::make('sessions_count')
                    ->counts('sessions')
                    ->label('Sessions')
                    ->badge()
                    ->color('success'),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\Filter::make('upcoming')
                    ->query(fn ($query) => $query->where('date', '>=', now()))
                    ->label('Upcoming Days'),
                    
                Tables\Filters\Filter::make('past')
                    ->query(fn ($query) => $query->where('date', '<', now()))
                    ->label('Past Days'),
                    
                Tables\Filters\Filter::make('has_sessions')
                    ->query(fn ($query) => $query->has('sessions'))
                    ->label('Has Sessions'),
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
            ->defaultSort('order');
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Day Information')
                    ->schema([
                        Infolists\Components\Grid::make(3)
                            ->schema([
                                Infolists\Components\TextEntry::make('name')
                                    ->label('Day Name')
                                    ->size('lg')
                                    ->weight('bold'),
                                    
                                Infolists\Components\TextEntry::make('date')
                                    ->label('Date')
                                    ->date('l, F j, Y')
                                    ->badge()
                                    ->color('primary'),
                                    
                                Infolists\Components\TextEntry::make('order')
                                    ->label('Order')
                                    ->badge()
                                    ->color('gray'),
                            ]),
                            
                        Infolists\Components\TextEntry::make('sessions_count')
                            ->label('Total Sessions')
                            ->state(fn ($record) => $record->sessions()->count())
                            ->badge()
                            ->color('success'),
                    ]),
                    
                Infolists\Components\Section::make('Sessions Schedule')
                    ->schema([
                        Infolists\Components\RepeatableEntry::make('sessions')
                            ->schema([
                                Infolists\Components\Grid::make(4)
                                    ->schema([
                                        Infolists\Components\TextEntry::make('title')
                                            ->weight('bold'),
                                            
                                        Infolists\Components\TextEntry::make('time_range')
                                            ->label('Time')
                                            ->badge()
                                            ->color('info'),
                                            
                                        Infolists\Components\TextEntry::make('hall.name')
                                            ->label('Hall')
                                            ->badge()
                                            ->color('warning'),
                                            
                                        Infolists\Components\TextEntry::make('duration')
                                            ->label('Duration')
                                            ->badge()
                                            ->color('gray'),
                                    ]),
                                    
                                Infolists\Components\TextEntry::make('description')
                                    ->label('Description')
                                    ->columnSpanFull()
                                    ->limit(100),
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
            'index' => Pages\ListDays::route('/'),
            'create' => Pages\CreateDay::route('/create'),
            'view' => Pages\ViewDay::route('/{record}'),
            'edit' => Pages\EditDay::route('/{record}/edit'),
        ];
    }
}