<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SessionResource\Pages;
use App\Models\Session;
use App\Models\Day;
use App\Models\Hall;
use App\Models\Guest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists;
use Filament\Infolists\Infolist;

class SessionResource extends Resource
{
    protected static ?string $model = Session::class;

    protected static ?string $navigationIcon = 'heroicon-o-microphone';
    
    protected static ?string $navigationGroup = 'Festival Management';
    
    protected static ?int $navigationSort = 3;
    
    protected static ?string $navigationLabel = 'Sessions';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Session Details')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Opening Ceremony')
                            ->columnSpanFull(),
                            
                        Forms\Components\Textarea::make('description')
                            ->rows(3)
                            ->placeholder('Brief description of the session...')
                            ->columnSpanFull(),
                    ]),
                    
                Forms\Components\Section::make('Schedule & Location')
                    ->schema([
                        Forms\Components\Grid::make(3)
                            ->schema([
                                Forms\Components\Select::make('day_id')
                                    ->label('Day')
                                    ->options(Day::orderBy('order')->pluck('name', 'id'))
                                    ->required()
                                    ->searchable()
                                    ->preload(),
                                    
                                Forms\Components\Select::make('hall_id')
                                    ->label('Hall')
                                    ->options(Hall::orderBy('name')->pluck('name', 'id'))
                                    ->required()
                                    ->searchable()
                                    ->preload(),
                                    
                                Forms\Components\TextInput::make('order')
                                    ->numeric()
                                    ->minValue(1)
                                    ->default(1)
                                    ->placeholder('1'),
                            ]),
                            
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TimePicker::make('start_time')
                                    ->required()
                                    ->native(false)
                                    ->displayFormat('H:i'),
                                    
                                Forms\Components\TimePicker::make('end_time')
                                    ->required()
                                    ->native(false)
                                    ->displayFormat('H:i')
                                    ->after('start_time'),
                            ]),
                    ]),
                    
                Forms\Components\Section::make('Guests & Speakers')
                    ->schema([
                        Forms\Components\Select::make('guests')
                            ->label('Select Guests')
                            ->multiple()
                            ->relationship('guests', 'name')
                            ->options(Guest::orderBy('name')->pluck('name', 'id'))
                            ->searchable()
                            ->preload()
                            ->columnSpanFull(),
                            
                        Forms\Components\Placeholder::make('guest_roles_note')
                            ->label('Note')
                            ->content('Guest roles can be managed after creating the session.')
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->wrap(),
                    
                Tables\Columns\TextColumn::make('day.name')
                    ->label('Day')
                    ->sortable()
                    ->badge()
                    ->color('warning'),
                    
                Tables\Columns\TextColumn::make('time_range')
                    ->label('Time')
                    ->badge()
                    ->color('info'),
                    
                Tables\Columns\TextColumn::make('duration')
                    ->label('Duration')
                    ->badge()
                    ->color('gray'),
                    
                Tables\Columns\TextColumn::make('hall.name')
                    ->label('Hall')
                    ->sortable()
                    ->badge()
                    ->color('primary'),
                    
                Tables\Columns\TextColumn::make('guests_count')
                    ->counts('guests')
                    ->label('Guests')
                    ->badge()
                    ->color('success'),
                    
                Tables\Columns\TextColumn::make('order')
                    ->numeric()
                    ->sortable()
                    ->toggleable(),
                    
                Tables\Columns\TextColumn::make('description')
                    ->limit(50)
                    ->toggleable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('day_id')
                    ->label('Day')
                    ->options(Day::orderBy('order')->pluck('name', 'id'))
                    ->preload(),
                    
                Tables\Filters\SelectFilter::make('hall_id')
                    ->label('Hall')
                    ->options(Hall::orderBy('name')->pluck('name', 'id'))
                    ->preload(),
                    
                Tables\Filters\Filter::make('has_guests')
                    ->query(fn ($query) => $query->has('guests'))
                    ->label('Has Guests'),
                    
                Tables\Filters\Filter::make('long_sessions')
                    ->query(fn ($query) => $query->whereRaw('TIME_TO_SEC(end_time) - TIME_TO_SEC(start_time) >= 7200'))
                    ->label('Long Sessions (2h+)'),
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
            ->defaultSort('day_id')
            ->defaultSort('start_time');
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Session Information')
                    ->schema([
                        Infolists\Components\TextEntry::make('title')
                            ->label('Title')
                            ->size('lg')
                            ->weight('bold')
                            ->columnSpanFull(),
                            
                        Infolists\Components\Grid::make(2)
                            ->schema([
                                Infolists\Components\TextEntry::make('day.name')
                                    ->label('Day')
                                    ->badge()
                                    ->color('warning'),
                                    
                                Infolists\Components\TextEntry::make('day.date')
                                    ->label('Date')
                                    ->date('l, F j, Y')
                                    ->badge()
                                    ->color('primary'),
                            ]),
                            
                        Infolists\Components\Grid::make(3)
                            ->schema([
                                Infolists\Components\TextEntry::make('time_range')
                                    ->label('Time')
                                    ->badge()
                                    ->color('info'),
                                    
                                Infolists\Components\TextEntry::make('duration')
                                    ->label('Duration')
                                    ->badge()
                                    ->color('gray'),
                                    
                                Infolists\Components\TextEntry::make('hall.name')
                                    ->label('Hall')
                                    ->badge()
                                    ->color('primary'),
                            ]),
                            
                        Infolists\Components\TextEntry::make('description')
                            ->label('Description')
                            ->columnSpanFull()
                            ->placeholder('No description available'),
                    ]),
                    
                Infolists\Components\Section::make('Hall Information')
                    ->schema([
                        Infolists\Components\Grid::make(3)
                            ->schema([
                                Infolists\Components\TextEntry::make('hall.capacity')
                                    ->label('Capacity')
                                    ->suffix(' people')
                                    ->badge()
                                    ->color('primary'),
                                    
                                Infolists\Components\TextEntry::make('hall.floor')
                                    ->label('Floor')
                                    ->badge()
                                    ->color('gray'),
                                    
                                Infolists\Components\TextEntry::make('hall.description')
                                    ->label('Hall Description')
                                    ->limit(50),
                            ]),
                    ]),
                    
                Infolists\Components\Section::make('Guests & Speakers')
                    ->schema([
                        Infolists\Components\RepeatableEntry::make('guests')
                            ->schema([
                                Infolists\Components\Grid::make(3)
                                    ->schema([
                                        Infolists\Components\TextEntry::make('name')
                                            ->weight('bold'),
                                            
                                        Infolists\Components\TextEntry::make('role')
                                            ->badge()
                                            ->color('gray'),
                                            
                                        Infolists\Components\TextEntry::make('pivot.role_in_session')
                                            ->label('Session Role')
                                            ->badge()
                                            ->color('success'),
                                    ]),
                                    
                                Infolists\Components\TextEntry::make('country')
                                    ->badge()
                                    ->color('warning'),
                            ])
                            ->columnSpanFull(),
                    ])
                    ->visible(fn ($record) => $record->guests()->exists()),
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
            'index' => Pages\ListSessions::route('/'),
            'create' => Pages\CreateSession::route('/create'),
            'view' => Pages\ViewSession::route('/{record}'),
            'edit' => Pages\EditSession::route('/{record}/edit'),
        ];
    }
}