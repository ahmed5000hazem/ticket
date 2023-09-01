<?php

namespace App\Livewire\Dashboard\Categories;

use App\Models\Categories\Category;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Livewire\Component;

class CreateCategoryComponent extends Component implements HasForms
{
    use InteractsWithForms;

    public $category;

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('category.name')->required(),
            ]);
    }

    public function create()
    {
        Category::create($this->category);
        Notification::make()->title(__('Created successfully'))->success()->send();

        return redirect()->route('dashboard.categories');
    }

    public function render()
    {
        return view('livewire.dashboard.categories.create-category-component');
    }
}
