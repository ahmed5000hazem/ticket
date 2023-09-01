<?php

namespace App\Livewire\Dashboard\Events;

use App\Core\Enums\DurationUnitsEnum;
use App\Models\Events\Event;
use Filament\Tables\Actions\Action;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;
use Illuminate\Support\Str;

class EventsComponent extends Component implements HasTable, HasForms
{
    use InteractsWithTable, InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Event::query())
            ->columns([
                TextInputColumn::make('name')
                    ->sortable()
                    ->rules(['required', 'max:255']),
                TextColumn::make('overview')->wrap()->html()->words(8),
                TextColumn::make('date')->dateTime(),
                TextColumn::make('duration')->state(fn ($record) => $record->duration.' '. Str::plural(DurationUnitsEnum::unit($record->duration_unit), $record->duration)),
                TextColumn::make('category.name')->url(route('dashboard.categories')),
                ToggleColumn::make('published')
            ])
            ->actions([
                Action::make('delete')
                    ->requiresConfirmation()
                    ->action(fn ($record) => $record->delete())
            ]);
    }

    public function render()
    {
        return view('livewire.dashboard.events.events-component');
    }
}
