@foreach($lists as $list)
    <div class="col-3">
        <div id="allList" class="card">
            <div class="card-title bg-gray p-2">{{$list->name}}</div>
            <div id="allCard" class="card-body">
                @if($list->cards)
                    <ul class="list-group">
                        @foreach($list->cards as $card)
                            <li class="list-group-item">{{$card->title}} <button type="button" class="editmodal btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#editmodal{{$card->id}}"><i class="fa-solid fa-pencil"></i></button>
                                <i class="mt-2 fa-solid fa-check-to-slot d-block">  {{ $card->controls->where('is_check',"1")->count() }} / {{$card->controls->count()}}</i>
                            </li>
                            @include('partials.cardEdit')
                        @endforeach
                    </ul>
                @endif
                <form class="AddCardForm" style="display: none">
                    <input type="hidden" name="list_id" value="{{$list->id}}">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="text" name="title" class="p-4 form-control" placeholder="Kart Adı">
                    <button type="submit" class="mt-2 btn btn-success float-end">Ekle</button>
                </form>
            </div>

            <button id="AddCard" data-id="{{$list->id}}" class="addCard btn btn-outline-warning text-dark  text-left"><i class="fa-solid fa-plus"></i> Kart Ekle</button>
        </div>
    </div>
@endforeach

