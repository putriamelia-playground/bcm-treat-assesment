<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChecklistSafetyResource\Pages;
use App\Filament\Resources\ChecklistSafetyResource\RelationManagers;
use App\Filament\Resources\ApabResource;
use App\Filament\Resources\AparResource;
use App\Filament\Resources\CompanyDataResource;
use App\Filament\Resources\GensetResource;
use App\Filament\Resources\HidranResource;
use App\Models\ChecklistSafety;
use App\Models\ToolsAvailability;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\Layout\Grid;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ChecklistSafetyResource extends Resource
{
    protected static ?string $model = ToolsAvailability::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    protected static ?string $navigationGroup = 'Assessment';

    protected static ?string $navigationLabel = 'Checklist Standar Sarana Keselamatan';

    protected static ?string $breadcrumb = 'Checklist Standar Sarana Keselamatan';

    protected static ?string $pluralModelLabel = 'Checklist Standar Sarana Keselamatan';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        $livewire = $table->getLivewire();
        return $table
            // ->recordClasses(fn(ToolsAvailability $record) => match ($record->tools) {
            //     'APAR' => 'opacity-30',
            //     'APAB' => 'border-s-2 border-orange-600 dark:border-orange-300',
            //     // 'published' => 'border-s-2 border-green-600 dark:border-green-300',
            //     default => null,
            // })
            ->recordUrl(
                false
            )
            ->groups([
                Group::make('tools_type')
                    ->label('Jenis Alat')
                    ->getTitleFromRecordUsing(fn($record) => $record->tools_type ? 'Wajib' : 'Tambahan'),
            ])
            ->defaultGroup('tools_type')  // TODO
            ->actions([
                // Tables\Actions\EditAction::make(),
                Action::make('Tambah Detail')
                    ->url(function ($record) {
                        // dd($record);
                        switch ($record->tools) {  // TODO use dynamic syntax
                            case 'APAR':
                                return AparResource::getUrl('create');
                            case 'APAB':
                                return ApabResource::getUrl('create');
                            case 'Hidran':
                                return HidranResource::getUrl('create');
                            case 'Sprinkler':
                                return SprinklerResource::getUrl('create');
                            case 'Genset':
                                return GensetResource::getUrl('create');
                            default:
                                return null;  // or null if you want to disable the link
                        }
                    })
                    // ->url(function ($record) {
                    //     $resources = [
                    //         AparResource::class,
                    //         ApabResource::class,
                    //     ];
                    //     $value = 'apab';
                    //     $data = [];
                    //     $matchedResource = collect($resources)->first(function ($resource) use ($value) {
                    //         $prefix = Str::before(class_basename($resource), 'Resource');
                    //         // $data[] = Str::lower($prefix) === Str::lower($value);
                    //         $data[] = $resource;
                    //     });
                    //     dd($data);
                    // })
                    // ->hidden(fn($record) => $record->amount === '0')
                    ->color('info'),
                Action::make('Lihat Detail')
                    ->url(function ($record) {
                        switch ($record->tools) {  // TODO use dynamic syntax
                            case 'APAR':
                                return AparResource::getUrl('index');
                            case 'APAB':
                                return ApabResource::getUrl('index');
                            case 'Hidran':
                                return HidranResource::getUrl('index');

                            case 'Sprinkler':
                                return SprinklerResource::getUrl('index');

                            case 'Genset':
                                return GensetResource::getUrl('index');

                            default:
                                return null;  // or null if you want to disable the link
                        }
                    })
                    // ->hidden(fn($record) => $record->amount === '0')
                    ->color('danger')
            ])
            ->columns([
                // Section::make([
                Stack::make([
                    TextColumn::make('amount')
                        ->icon('heroicon-m-hashtag'),
                    TextColumn::make('tools')
                        ->icon('heroicon-m-wrench')
                        ->searchable(),
                ])->space(3)->extraAttributes([
                    'class' => 'pb-2',
                ]),
                // ])
            ])
            ->contentGrid(
                [
                    'md' => 2,
                    'lg' => 3,
                    'xl' => 4,
                ]
            )
            ->paginated(false);
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
            'index' => Pages\ListChecklistSafeties::route('/'),
            'create' => Pages\CreateChecklistSafety::route('/create'),
            'edit' => Pages\EditChecklistSafety::route('/{record}/edit'),
        ];
    }
}
