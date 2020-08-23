@extends('adminLte.main')

@section('title' , ' Show News')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-dark">
                        <div class="card-header text-center">
                            News Number {{$news->id}}
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="title">{{$news->title}}</h3><br>
                                            <p class="card-text">{{$news->subject}}.</p>

                                            @can('manage-News')
                                            <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#edit"
                                                                                                    data-title='{{$news->title}}'
                                                                                                    data-subject='{{$news->subject}}'
                                                                                                    data-newid="{{$news->id}}">
                                                <i class="fas fa-edit"></i>  Edit
                                            </button>
                                            <button type="button" class="btn btn-danger  float-right" data-toggle="modal" data-target="#delete" data-newid="{{$news->id}}">
                                                <i class="fas fa-trash-alt"> Delete</i>
                                            </button>
                                            @endcan
                                        </div>
                                        <div class="card-footer">
                                            Created At {{$news->created_at}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>




    {{-- Edit Model--}}
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit The Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('news.update', $news)}}" method="post" >
                    <div class="modal-body">
                        @method('PATCH')
                        @csrf
                        <input type="hidden" name="news" id="new_id" value="">
                        <div class="form-group">
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter The News Title">
                        </div>
                        <div class="form-group">
                            <textarea type="text" name="subject" id="subject" class="form-control" placeholder="Enter the news Subject"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--    End Of Edit model--}}

    <!-- Modal for Delete Category -->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-tite" id="exampleModalLabel"> Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('news.destroy', $news)}}" method="post" >
                    <div class="modal-body">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="news" id="nid" value="">
                        <h4> Are You Sure You Want To Delete This News ??</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--    End Delete Category Model--}}

@endsection
