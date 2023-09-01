<div>
    <div class="mt-12">
        <a href="{{route('dashboard.events.create')}}" class="btn btn-neutral text-slate-50 ">{{__('Create')}}</a>
    </div>

    <x-dashboard.card :width="'full'">
        {{$this->table}}
    </x-dashboard.card>
</div>
