<div class="navbar bg-base-100 border-b border-sky-500 text-slate-50">
    <div class="">
        <a href="/" class="btn btn-ghost normal-case text-xl">{{__("Tickets")}}</a>
    </div>
    <div class="flex-none ml-8">
        <ul class="menu menu-horizontal px-1">
            <li><a href="{{route('dashboard.categories')}}">{{__('Categories')}}</a></li>
            <li><a href="{{route('dashboard.events')}}">{{__('Event Management')}}</a></li>
            {{-- <li>
                <details>
                    <summary>
                        Parent
                    </summary>
                    <ul class="p-2 bg-base-100">
                        <li><a>Link 1</a></li>
                        <li><a>Link 2</a></li>
                    </ul>
                </details>
            </li> --}}
        </ul>
    </div>
</div>
