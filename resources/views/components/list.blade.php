<div class="listOfThings">
    @if (Auth::check())
        @foreach ($details as $item)
        <div class="todoList">
            <h3> {{$item->name}}</h3>
            <input type="hidden" value="{{$item->id}}" id="idOfDeailsItem">
            <input class="detailsOfTodoList" value="{{$item->description}}"  readonly> <span class="saveDetails">kaydet</span> <span class="editDetails"> duzenle</span>
        </div>
        
        @endforeach
    @endif
   
</div>