<?php

namespace App\Livewire\Dashboard\Events;

use App\Models\Categories\Category;
use App\Models\Events\Event;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Support\HtmlString;
use Livewire\Component;

class CreateEventComponent extends Component implements HasForms
{
    use InteractsWithForms;

    public $event;
    
    public function mount(): void
    {
        $this->form->fill();
    }

    public function rules()
    {
        return [
            'event.name' => 'required',
            'event.overview' => 'required',
            'event.published' => 'required',
            'event.date' => 'required|date',
            'event.duration' => 'required',
            'event.duration_unit' => 'required|in:hr,day,week,month',
            'event.category_id' => 'required|exists:categories,id',
        ];
    }
    
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Event info')
                        ->schema([
                            TextInput::make('event.name')->required(),
                            RichEditor::make('event.overview')->required(),
                            Toggle::make('event.published')->label(__('published ?'))->default(1),
                            DateTimePicker::make('event.date')
                                ->native(false)
                                ->minDate(now())
                                ->required(),
                            Section::make()->columns(['sm' => 2])->schema([
                                TextInput::make('event.duration')->numeric()->columnSpan(1)->default(1)->required(),
                                Select::make('event.duration_unit')->options([
                                    'hr' => 'hour',
                                    'day' => 'day',
                                    'week' => 'week',
                                    'month' => 'month',
                                ])->default('day')->required()
                            ]),
                            Select::make('event.category_id')->label('Category')->options(Category::pluck('name', 'id')->toArray())->required()
                        ]),
                    // Wizard\Step::make('Services')
                    //     ->schema([
                    //         Select::make('event.services.transportation')->options([
                    //             'bus' => 'bus',
                    //             'train' => 'train',
                    //             'week' => 'week',
                    //             'month' => 'month',
                    //         ])
                    //     ]),
                ])->submitAction(new HtmlString('<button class="btn btn-info btn-sm text-sm mt-8">'.__("Save").'</button>')),
            ]);
    }

    public function create()
    {
        $this->validate();
        
        Event::create($this->event);

        Notification::make()->title(__('Created successfully'))->success()->send();

        return redirect()->route('dashboard.events');
    }

    public function render()
    {
        return view('livewire.dashboard.events.create-event-component');
    }
}
