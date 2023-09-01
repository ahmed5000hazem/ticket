<div>
    <div class="text-sm breadcrumbs">
        <ul>
          <li><a href="/">Home</a></li> 
          @foreach ($breadcrumbs as $breadcrumb)
            <li><a href="{{$breadcrumb->url}}">{{$breadcrumb->label}}</a></li>   
          @endforeach
        </ul>
    </div>
</div>