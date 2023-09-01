<?php

namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumbs extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $path = request()->path();
        $path = collect(explode('/', $path));

        $url = '/';
        $breadcrumbs = $path->map(function ($item) use (&$url) {
            $url .= "{$item}/";
            
            return (object) [
                'url' => $url,
                'label' => $item
            ];
        });

        // dd($breadcrumbs);
        
        return view('components.dashboard.breadcrumbs', compact('breadcrumbs'));
    }
}
