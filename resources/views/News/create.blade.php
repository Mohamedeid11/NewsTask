@extends('adminLte.main')

@section('title' , ' Create a aNew News')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="p-2">
                <div class="panel-body">
                    <form action="{{route('news.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('News.form')
                        <div class="card-footer mt-4">
                            <button type="submit" name="uplaod" class="btn btn-info btn-block">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
