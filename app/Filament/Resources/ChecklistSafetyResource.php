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
            ->recordUrl(
                false
            )
            ->groups([
                Group::make('tools_type')
                    ->label('Jenis Alat')
                    ->getTitleFromRecordUsing(fn($record) => $record->tools_type ? 'Tambahan' : 'Wajib'),
            ])
            ->defaultGroup('tools_type')  // TODO
            ->actions([
                Action::make('Tambah Detail')
                    ->url(function ($record) {
                        switch ($record->tools) {  // TODO use dynamic syntax
                            case 'APAR':
                                return route('filament.admin.resources.apars.create', [
                                    'tool_id' => $record->bcm_safety_tool_id
                                ]);
                            case 'APAB':
                                return route('filament.admin.resources.apabs.create', [
                                    'tool_id' => $record->bcm_safety_tool_id
                                ]);
                            case 'Hidran':
                                return route('filament.admin.resources.hidrans.create', [
                                    'tool_id' => $record->bcm_safety_tool_id
                                ]);
                            case 'Sprinkler':
                                return route('filament.admin.resources.sprinklers.create', [
                                    'tool_id' => $record->bcm_safety_tool_id
                                ]);
                            case 'Genset':
                                return route('filament.admin.resources.gensets.create', [
                                    'tool_id' => $record->bcm_safety_tool_id
                                ]);
                            default:
                                return null;  // or null if you want to disable the link
                        }
                    })
                    ->color('info')
                    ->disabled(fn($record) => $record->is_available == 0),
                Action::make('Lihat Detail')
                    ->url(function ($record) {
                        switch ($record->tools) {  // TODO use dynamic syntax
                            case 'APAR':
                                return route('filament.admin.resources.apars.index', [
                                    'tool_id' => $record->bcm_safety_tool_id
                                ]);
                            case 'APAB':
                                return route('filament.admin.resources.apabs.index', [
                                    'tool_id' => $record->bcm_safety_tool_id
                                ]);
                            case 'Hidran':
                                return HidranResource::getUrl('index');

                            case 'Sprinkler':
                                return route('filament.admin.resources.sprinklers.index', [
                                    'tool_id' => $record->bcm_safety_tool_id
                                ]);

                            case 'Genset':
                                return GensetResource::getUrl('index');

                            default:
                                return null;  // or null if you want to disable the link
                        }
                    })
                    ->color('danger')
                    ->disabled(fn($record) => $record->is_available == 0),
            ])
            ->columns([
                // Section::make([
                Stack::make([
                    TextColumn::make('amount')
                        ->icon('heroicon-m-clipboard-document-check'),
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
