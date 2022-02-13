@extends('layouts.master')
@section('title')
    Todo List
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('partials.dataTables')

            <div class="col-2">
                <div class="card">
                    <div class="alert alert-warning text-white p-2 text-bold">Liste Ekle</div>
                        <form id="AddListForm">
                            <div class="card-body">
                                <input type="hidden" name="user_id" id="user_id" value="{{Auth::id()}}">
                                <input type="hidden" name="panel_id" id="panel_id" value="{{$panel->id}}">
                                <input id="ListName" name="name" type="text" class="form-control" placeholder="Liste Adı">
                            </div>
                            <button id="addList" type="submit" class="mb-0 w-100 btn btn-warning text-white btn-outline-success text-start"><i class="fa-solid fa-plus"></i> Liste Oluştur</button>
                        </form>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function (){
            //Liste ekle
            $('#AddListForm').on('submit',function (e){
                e.preventDefault();
                var form = this;

                $.ajax({
                    type:'post',
                    url:'{{route('list.store')}}',
                    data:new FormData(form),
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    processData:false,
                    datatype:'json',
                    contentType:false,
                    success:function (){
                        alert('başarılı');
                    }
                })

            })
            // Kart Ekleyebilmek için ilgili alanın gösterilmesi
            $('.addCard').on('click',function (){
                var btn = $(this).parent();
                var form = btn.children().children();
                form.css('display','block');
            })
            //Card Ekleme
            $('.AddCardForm').on('submit',function (e){
                e.preventDefault();
                var form = this;

                $.ajax({
                    type:'post',
                    url:'{{route('card.store')}}',
                    data:new FormData(form),
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    processData:false,
                    datatype:'json',
                    contentType:false,
                    success:function (){
                        alert('başarılı');
                    }
                })
            })
            $('.AddControlForm').on('submit',function (e){
                e.preventDefault();
                var form = this;

                $.ajax({
                    type:'post',
                    url:'{{route('control.store')}}',
                    data:new FormData(form),
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    processData:false,
                    datatype:'json',
                    contentType:false,
                    success:function (){
                        alert('başarılı');
                    }
                })
            })
            $('.AddControl').on('click',function (){
                var btn = $(this).parent();
                var deneme = btn.children().children();
                deneme.css('display','block');
            })

            $('.ControlCheckBox').on('change',function (){
                var control_id = $(this).val();

                $.ajax({
                    type:'post',
                    url:'{{route('control.update')}}',
                    data:{
                        id:control_id,
                    },
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success:function (){
                        alert('başarılı');
                    }
                })
            })

            $('.cardUpdate').on('submit',function (e){
                e.preventDefault();
                var form = this;
                $.ajax({
                    type:'post',
                    url:'{{route('card.update')}}',
                    data:new FormData(form),
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    processData:false,
                    datatype:'json',
                    contentType:false,
                    success:function (){
                        alert('başarılı');
                    }
                })
            })

        })
    </script>
@endsection
