<div>
    <x-dashboard.breadcrumbs/>
    <h2 class="text-3xl text-center"> {{__('Create event')}} </h2>
    <div class="flex justify-center">
        <x-dashboard.card>
            <form wire:submit.prevent="create">
                {{$this->form}}
                <button class="btn btn-info btn-sm text-sm mt-8">{{__('Save')}}</button>
            </form>
        </x-dashboard.card>
    </div>
</div>
