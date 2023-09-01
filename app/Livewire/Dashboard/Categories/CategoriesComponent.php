<?php

namespace App\Livewire\Dashboard\Categories;

use App\Models\Categories\Category;
use Filament\Tables\Actions\Action;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;

class CategoriesComponent extends Component implements HasTable, HasForms
{
    use InteractsWithTable, InteractsWithForms;


    public function table(Table $table): Table
    {
        return $table
            ->query(Category::query())
            ->columns([
                TextInputColumn::make('name')->sortable(),
            ])
            ->actions([
                Action::make('delete')
                    ->requiresConfirmation()
                    ->action(fn ($record) => $record->delete())
                    
            ]);
    }
    
    public function render()
    {
        return view('livewire.dashboard.categories.categories-component');
    }
}
