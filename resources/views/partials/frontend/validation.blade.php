<ul class="list-group m-auto @if($isArabic) text-right @endif">
    @foreach($errors->all() as $error)
        <li class="border-0 list-group-item border-0 list-group-item p-0 py-2">
            @if($isArabic)
                <span class="text-capitalize text-danger">{{ $error }}</span>
                <i class="fa fa-warning mr-2 text-warning"></i>
            @else
                <i class="fa fa-warning mr-2 text-warning"></i>
                <span class="text-capitalize text-danger">{{ $error }}</span>
            @endif
        </li>
    @endforeach
</ul>