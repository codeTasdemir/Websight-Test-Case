<!-- Modal -->
<div class="modal fade" id="editmodal{{$card->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="m-3">
                <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                <p class="lead"> {{$list->name}}</p>
                <p class=""><i class="text-bold">{{$list->name}} </i> , içinde <i class="text-bold">{{$card->title}}</i> kartını düzenliyorsunuz..</p>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <form class="AddControlForm" style="display: none">
                                    <label for="">Yeni Kontrol Adı</label>
                                    <input type="hidden" name="card_id" value="{{$card->id}}">
                                    <input type="text" name="description" class=" form-control">
                                    <button type="submit" class="mt-2 btn btn-success">Ekle</button>
                                </form>
                            </div>
                            <button  class="AddControl btn btn-warning text-white">Kontrol Ekle</button>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-floating">
                                    <form class="cardUpdate" >
                                        <div class="mb-3">
                                            <input type="hidden" name="card_id" value="{{$card->id}}">
                                            <label for="exampleFormControlTextarea1" class="form-label">Ayrıntılı Bilgi</label>
                                            <textarea class="form-control" name="description" placeholder="Daha Detaylı bir Açıklama yapınız.." rows="3">{{$card->description}}</textarea>
                                        </div>
                                        <button type="submit" class="float-end mt-2 btn btn-primary">Açıklamayı Kaydet</button>
                                    </form>
                                </div>
                                <div  class="m-2 mt-3">
                                    <label for="">Kontrol Listesi</label>
                                    @forelse($card->controls as $card)
                                        <div class="form-check">
                                            <input name="control_id" class="ControlCheckBox form-check-input" {{$card->is_check == "1" ? 'checked' :''}} type="checkbox" value="{{$card->id}}" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">{{$card->description}}</label>
                                        </div>
                                    @empty
                                        <p class="lead">Henüz Kontrol Eklenmedi</p>
                                    @endforelse

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('.AddControl').on('click',function (){
            var btn = $(this).parent();
            var deneme = btn.children().children();
            deneme.css('display','block');
        })

    })
</script>

