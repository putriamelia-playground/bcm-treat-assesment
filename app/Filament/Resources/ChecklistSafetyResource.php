<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChecklistSafetyResource\Pages;
use App\Filament\Resources\ChecklistSafetyResource\RelationManagers;
use App\Filament\Resources\ApabResource;
use App\Filament\Resources\AparResource;
use App\Filament\Resources\CompanyDataResource;
use App\Models\ChecklistSafety;
use App\Models\ToolsAvailability;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\Layout\Grid;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ChecklistSafetyResource extends Resource
{
    protected static ?string $model = ToolsAvailability::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    protected static ?string $navigationGroup = 'Assessment';

    protected static ?string $navigationLabel = 'Data Checklist Peralatan Keselamatan';

    protected static ?string $breadcrumb = 'Data Checklist Peralatan Keselamatan';

    protected static ?string $pluralModelLabel = 'Data Checklist Peralatan Keselamatan';

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
            ->actions([
                // Tables\Actions\EditAction::make(),
                Action::make('Detail')
                    ->url(function ($record) {  //  TODO, pake condition supaya dynamic jangan static
                        switch ($record->tools) {
                            case 'APAR':
                                return AparResource::getUrl('create');

                            case 'APAB':
                                return ApabResource::getUrl('create');;

                            default:
                                return null;  // or null if you want to disable the link
                        }
                    })
                    ->hidden(fn($record) => $record->amount === '0')
                    ->color('danger')
            ])
            ->columns([
                Stack::make([
                    TextColumn::make('amount')
                        ->icon('heroicon-m-hashtag'),
                    TextColumn::make('tools')
                        ->icon('heroicon-m-wrench')
                        ->searchable(),
                ])->space(3)->extraAttributes([
                    'class' => 'pb-2',
                ]),
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
