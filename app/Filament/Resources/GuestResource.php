<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuestResource\Pages;
use App\Models\Guest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;

class GuestResource extends Resource
{
    protected static ?string $model = Guest::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Festival Management';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Guest Information')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('Amina Bouayach'),

                                Forms\Components\TextInput::make('role')
                                    ->maxLength(255)
                                    ->placeholder('Writer & Activist'),
                            ]),

                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Select::make('country')
                                    ->options([
                                        'Afghanistan' => 'Afghanistan',
                                        'Albania' => 'Albania',
                                        'Algeria' => 'Algeria',
                                        'Andorra' => 'Andorra',
                                        'Angola' => 'Angola',
                                        'Antigua and Barbuda' => 'Antigua and Barbuda',
                                        'Argentina' => 'Argentina',
                                        'Armenia' => 'Armenia',
                                        'Australia' => 'Australia',
                                        'Austria' => 'Austria',
                                        'Azerbaijan' => 'Azerbaijan',
                                        'Bahamas' => 'Bahamas',
                                        'Bahrain' => 'Bahrain',
                                        'Bangladesh' => 'Bangladesh',
                                        'Barbados' => 'Barbados',
                                        'Belarus' => 'Belarus',
                                        'Belgium' => 'Belgium',
                                        'Belize' => 'Belize',
                                        'Benin' => 'Benin',
                                        'Bhutan' => 'Bhutan',
                                        'Bolivia' => 'Bolivia',
                                        'Bosnia and Herzegovina' => 'Bosnia and Herzegovina',
                                        'Botswana' => 'Botswana',
                                        'Brazil' => 'Brazil',
                                        'Brunei' => 'Brunei',
                                        'Bulgaria' => 'Bulgaria',
                                        'Burkina Faso' => 'Burkina Faso',
                                        'Burundi' => 'Burundi',
                                        'Cabo Verde' => 'Cabo Verde',
                                        'Cambodia' => 'Cambodia',
                                        'Cameroon' => 'Cameroon',
                                        'Canada' => 'Canada',
                                        'Central African Republic' => 'Central African Republic',
                                        'Chad' => 'Chad',
                                        'Chile' => 'Chile',
                                        'China' => 'China',
                                        'Colombia' => 'Colombia',
                                        'Comoros' => 'Comoros',
                                        'Congo (Congo-Brazzaville)' => 'Congo (Congo-Brazzaville)',
                                        'Costa Rica' => 'Costa Rica',
                                        'Croatia' => 'Croatia',
                                        'Cuba' => 'Cuba',
                                        'Cyprus' => 'Cyprus',
                                        'Czechia (Czech Republic)' => 'Czechia (Czech Republic)',
                                        'Denmark' => 'Denmark',
                                        'Djibouti' => 'Djibouti',
                                        'Dominica' => 'Dominica',
                                        'Dominican Republic' => 'Dominican Republic',
                                        'Ecuador' => 'Ecuador',
                                        'Egypt' => 'Egypt',
                                        'El Salvador' => 'El Salvador',
                                        'Equatorial Guinea' => 'Equatorial Guinea',
                                        'Eritrea' => 'Eritrea',
                                        'Estonia' => 'Estonia',
                                        'Eswatini (fmr. "Swaziland")' => 'Eswatini (fmr. "Swaziland")',
                                        'Ethiopia' => 'Ethiopia',
                                        'Fiji' => 'Fiji',
                                        'Finland' => 'Finland',
                                        'France' => 'France',
                                        'Gabon' => 'Gabon',
                                        'Gambia' => 'Gambia',
                                        'Georgia' => 'Georgia',
                                        'Germany' => 'Germany',
                                        'Ghana' => 'Ghana',
                                        'Greece' => 'Greece',
                                        'Grenada' => 'Grenada',
                                        'Guatemala' => 'Guatemala',
                                        'Guinea' => 'Guinea',
                                        'Guinea-Bissau' => 'Guinea-Bissau',
                                        'Guyana' => 'Guyana',
                                        'Haiti' => 'Haiti',
                                        'Holy See' => 'Holy See',
                                        'Honduras' => 'Honduras',
                                        'Hungary' => 'Hungary',
                                        'Iceland' => 'Iceland',
                                        'India' => 'India',
                                        'Indonesia' => 'Indonesia',
                                        'Iran' => 'Iran',
                                        'Iraq' => 'Iraq',
                                        'Ireland' => 'Ireland',
                                        'Israel' => 'Israel',
                                        'Italy' => 'Italy',
                                        'Jamaica' => 'Jamaica',
                                        'Japan' => 'Japan',
                                        'Jordan' => 'Jordan',
                                        'Kazakhstan' => 'Kazakhstan',
                                        'Kenya' => 'Kenya',
                                        'Kiribati' => 'Kiribati',
                                        'Kuwait' => 'Kuwait',
                                        'Kyrgyzstan' => 'Kyrgyzstan',
                                        'Laos' => 'Laos',
                                        'Latvia' => 'Latvia',
                                        'Lebanon' => 'Lebanon',
                                        'Lesotho' => 'Lesotho',
                                        'Liberia' => 'Liberia',
                                        'Libya' => 'Libya',
                                        'Liechtenstein' => 'Liechtenstein',
                                        'Lithuania' => 'Lithuania',
                                        'Luxembourg' => 'Luxembourg',
                                        'Madagascar' => 'Madagascar',
                                        'Malawi' => 'Malawi',
                                        'Malaysia' => 'Malaysia',
                                        'Maldives' => 'Maldives',
                                        'Mali' => 'Mali',
                                        'Malta' => 'Malta',
                                        'Marshall Islands' => 'Marshall Islands',
                                        'Mauritania' => 'Mauritania',
                                        'Mauritius' => 'Mauritius',
                                        'Mexico' => 'Mexico',
                                        'Micronesia' => 'Micronesia',
                                        'Moldova' => 'Moldova',
                                        'Monaco' => 'Monaco',
                                        'Mongolia' => 'Mongolia',
                                        'Montenegro' => 'Montenegro',
                                        'Morocco' => 'Morocco',
                                        'Mozambique' => 'Mozambique',
                                        'Myanmar (formerly Burma)' => 'Myanmar (formerly Burma)',
                                        'Namibia' => 'Namibia',
                                        'Nauru' => 'Nauru',
                                        'Nepal' => 'Nepal',
                                        'Netherlands' => 'Netherlands',
                                        'New Zealand' => 'New Zealand',
                                        'Nicaragua' => 'Nicaragua',
                                        'Niger' => 'Niger',
                                        'Nigeria' => 'Nigeria',
                                        'North Korea' => 'North Korea',
                                        'North Macedonia' => 'North Macedonia',
                                        'Norway' => 'Norway',
                                        'Oman' => 'Oman',
                                        'Pakistan' => 'Pakistan',
                                        'Palau' => 'Palau',
                                        'Palestine State' => 'Palestine State',
                                        'Panama' => 'Panama',
                                        'Papua New Guinea' => 'Papua New Guinea',
                                        'Paraguay' => 'Paraguay',
                                        'Peru' => 'Peru',
                                        'Philippines' => 'Philippines',
                                        'Poland' => 'Poland',
                                        'Portugal' => 'Portugal',
                                        'Qatar' => 'Qatar',
                                        'Romania' => 'Romania',
                                        'Russia' => 'Russia',
                                        'Rwanda' => 'Rwanda',
                                        'Saint Kitts and Nevis' => 'Saint Kitts and Nevis',
                                        'Saint Lucia' => 'Saint Lucia',
                                        'Saint Vincent and the Grenadines' => 'Saint Vincent and the Grenadines',
                                        'Samoa' => 'Samoa',
                                        'San Marino' => 'San Marino',
                                        'Sao Tome and Principe' => 'Sao Tome and Principe',
                                        'Saudi Arabia' => 'Saudi Arabia',
                                        'Senegal' => 'Senegal',
                                        'Serbia' => 'Serbia',
                                        'Seychelles' => 'Seychelles',
                                        'Sierra Leone' => 'Sierra Leone',
                                        'Singapore' => 'Singapore',
                                        'Slovakia' => 'Slovakia',
                                        'Slovenia' => 'Slovenia',
                                        'Solomon Islands' => 'Solomon Islands',
                                        'Somalia' => 'Somalia',
                                        'South Africa' => 'South Africa',
                                        'South Korea' => 'South Korea',
                                        'South Sudan' => 'South Sudan',
                                        'Spain' => 'Spain',
                                        'Sri Lanka' => 'Sri Lanka',
                                        'Sudan' => 'Sudan',
                                        'Suriname' => 'Suriname',
                                        'Sweden' => 'Sweden',
                                        'Switzerland' => 'Switzerland',
                                        'Syria' => 'Syria',
                                        'Tajikistan' => 'Tajikistan',
                                        'Tanzania' => 'Tanzania',
                                        'Thailand' => 'Thailand',
                                        'Timor-Leste' => 'Timor-Leste',
                                        'Togo' => 'Togo',
                                        'Tonga' => 'Tonga',
                                        'Trinidad and Tobago' => 'Trinidad and Tobago',
                                        'Tunisia' => 'Tunisia',
                                        'Turkey' => 'Turkey',
                                        'Turkmenistan' => 'Turkmenistan',
                                        'Tuvalu' => 'Tuvalu',
                                        'Uganda' => 'Uganda',
                                        'Ukraine' => 'Ukraine',
                                        'United Arab Emirates' => 'United Arab Emirates',
                                        'United Kingdom' => 'United Kingdom',
                                        'United States of America' => 'United States of America',
                                        'Uruguay' => 'Uruguay',
                                        'Uzbekistan' => 'Uzbekistan',
                                        'Vanuatu' => 'Vanuatu',
                                        'Venezuela' => 'Venezuela',
                                        'Vietnam' => 'Vietnam',
                                        'Yemen' => 'Yemen',
                                        'Zambia' => 'Zambia',
                                        'Zimbabwe' => 'Zimbabwe',
                                    ])
                                    ->searchable()
                                    ->placeholder('Select country'),

                                Forms\Components\TextInput::make('order')
                                    ->numeric()
                                    ->minValue(1)
                                    ->default(1)
                                    ->placeholder('1'),
                            ]),
                    ]),

                Forms\Components\Section::make('Biography & Image')
                    ->schema([
                        TiptapEditor::make('bio')
                            ->label('Biography')
                            ->placeholder('Author of several books on human rights and Mediterranean culture...')
                            ->profile('default')
                            ->extraInputAttributes(['style' => 'min-height: 12rem;'])
                            ->maxContentWidth('5xl')
                            ->columnSpanFull(),

                        Forms\Components\FileUpload::make('image')
                            ->label('Profile Image')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '1:1',
                                '3:4',
                            ])
                            ->directory('guests')
                            ->visibility('public')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->circular()
                    ->defaultImageUrl(fn () => asset('images/book.png')),

                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('role')
                    ->searchable()
                    ->badge()
                    ->color('gray'),

                Tables\Columns\TextColumn::make('country')
                    ->badge()
                    ->color('primary')
                    ->formatStateUsing(fn ($state, $record) => $record->country_flag ? $record->country_flag.' '.$state : $state
                    ),

                Tables\Columns\TextColumn::make('sessions_count')
                    ->counts('sessions')
                    ->label('Sessions')
                    ->badge()
                    ->color('success'),

                Tables\Columns\TextColumn::make('order')
                    ->numeric()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('bio')
                    ->limit(50)
                    ->toggleable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('country')
                    ->options([
                        'Italy' => 'Italy',
                        'Morocco' => 'Morocco',
                        'Tunisia' => 'Tunisia',
                        'Spain' => 'Spain',
                        'Albania' => 'Albania',
                        'France' => 'France',
                        'Greece' => 'Greece',
                        'Turkey' => 'Turkey',
                    ])
                    ->preload(),

                Tables\Filters\Filter::make('has_sessions')
                    ->query(fn ($query) => $query->has('sessions'))
                    ->label('Has Sessions'),

                Tables\Filters\Filter::make('has_bio')
                    ->query(fn ($query) => $query->whereNotNull('bio'))
                    ->label('Has Biography'),

                Tables\Filters\Filter::make('has_image')
                    ->query(fn ($query) => $query->whereNotNull('image'))
                    ->label('Has Image'),
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
                Infolists\Components\Section::make('Guest Profile')
                    ->schema([
                        Infolists\Components\Grid::make(3)
                            ->schema([
                                Infolists\Components\ImageEntry::make('image')
                                    ->hiddenLabel()
                                    ->circular()
                                    ->size(120)
                                    ->defaultImageUrl(fn () => asset('images/book.png')),

                                Infolists\Components\Grid::make(1)
                                    ->schema([
                                        Infolists\Components\TextEntry::make('name')
                                            ->label('Name')
                                            ->size('lg')
                                            ->weight('bold'),

                                        Infolists\Components\TextEntry::make('role')
                                            ->label('Role')
                                            ->badge()
                                            ->color('gray'),

                                        Infolists\Components\TextEntry::make('country')
                                            ->label('Country')
                                            ->badge()
                                            ->color('primary')
                                            ->formatStateUsing(fn ($state, $record) => $record->country_flag ? $record->country_flag.' '.$state : $state
                                            ),
                                    ])
                                    ->columnSpan(2),
                            ]),

                        Infolists\Components\TextEntry::make('bio')
                            ->label('Biography')
                            ->columnSpanFull()
                            ->html()
                            ->prose()
                            ->placeholder('No biography available'),
                    ]),

                Infolists\Components\Section::make('Festival Sessions')
                    ->schema([
                        Infolists\Components\RepeatableEntry::make('sessions')
                            ->schema([
                                Infolists\Components\Grid::make(4)
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

                                        Infolists\Components\TextEntry::make('pivot.role_in_session')
                                            ->label('Role')
                                            ->badge()
                                            ->color('success')
                                            ->placeholder('No role specified'),
                                    ]),

                                Infolists\Components\TextEntry::make('hall.name')
                                    ->label('Hall')
                                    ->badge()
                                    ->color('primary'),

                                Infolists\Components\TextEntry::make('description')
                                    ->label('Session Description')
                                    ->columnSpan(3)
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
            'index' => Pages\ListGuests::route('/'),
            'create' => Pages\CreateGuest::route('/create'),
            'view' => Pages\ViewGuest::route('/{record}'),
            'edit' => Pages\EditGuest::route('/{record}/edit'),
        ];
    }
}
