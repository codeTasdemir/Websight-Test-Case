@extends('layouts.master')
@section('title')

@endsection
@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="alert alert-info">Panolarınız <p class="text-warning float-end d-inline">Toplam Pano Sayınız : <b>{{$panels->count()}}</b></p></div>
                @forelse($panels as $panel)
                <div class="card w-25 d-inline-block">
                    <div class="card-body">
                       <a href="{{route('panel.show',[ 'id'=>$panel->id ,'slug'=>$panel->slug ])}}" class="btn btn-outline-info btn-warning w-100">{{$panel->name}}</a>
                    </div>
                </div>
                @empty
                    <div class="alert alert-light"><p class="lead text-info text-center">Henüz Bir Pano Oluşturmadınız!</p></div>
                @endforelse
                <div class="col-md-3 float-start">
                    <div class="card">
                        <div class="card-body">
                            <form class="AddPanel" >
                                <label for="">Pano Ekle</label>
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <input type="text" name="name" id="" class="form-control">
                                <button type="submit" class="w-100 mt-1 btn btn-success">Pano Ekle</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function (){
            $('.AddPanel').on('submit',function (e){
                e.preventDefault();
                var form = this;

                $.ajax({
                    type:'post',
                    url:'{{route('panel.store')}}',
                    data:new FormData(form),
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    processData:false,
                    datatype:'json',
                    contentType:false,
                    success:function (){
                        window.location.reload();
                    }
                })
            })
        })
    </script>
@endsection


