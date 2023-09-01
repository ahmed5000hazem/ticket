<div {{ $attributes->merge(['class' => ' bg-white rounded-lg p-6 mt-8 w-'.$width??'1/2']) }} class="w-1/2 bg-white rounded-lg p-6 mt-8">
    {{$slot}}
</div>