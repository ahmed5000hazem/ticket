<div>
    <x-dashboard.breadcrumbs/>
    <h2 class="text-3xl text-center"> {{__('Create event')}} </h2>
    <div class="flex justify-center pb-12">
        <x-dashboard.card>
            <form wire:submit.prevent="create">
                {{$this->form}}
            </form>
        </x-dashboard.card>
    </div>
</div>
