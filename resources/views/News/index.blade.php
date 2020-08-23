@extends('adminLte.main')

@section('title' , 'News')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-dark">
                        <div class="card-header text-center">
                            @can('manage-News')
                             <a href="{{route('news.create')}}"  >
                                 <button type="button" class="btn btn-success float-left" >
                                    Add News
                                </button>
                             </a>
                            @endcan
                            News
                            <div class="float-right font-21 btn card"> All News {{$count}}</div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row justify-content-center">
                                @foreach($News as $news)

                                    <div class="col-sm-5 m-5 ">
                                        <div class="position-relative p-4 bg-gray" style="height: 180px">
                                            <div class="ribbon-wrapper ribbon-lg">
                                                <div class="ribbon bg-info">
                                                    Fresh
                                                </div>
                                            </div>
                                           <a href="{{route('news.show' , $news)}}"> <h2> {{$news->title}} </h2></a> <br>
                                            <h6>.{{$news->subject}}</h6>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    <!-- /.card-body -->
                        <div class="align-self-center">
                            {{$News->links()}}
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



    <!-- Modal for Add News -->
    <div class="modal fade" id="addNews" tabindex="-1" role="dialog" aria-labelledby="addNews" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Adding A News</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('news.store')}}" method="post" >
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="title " id="title" class="form-control" placeholder="Enter The News Title">
                        </div>

                        <div class="form-group">
                            <textarea rows="3" name="subject" id="subject" class="form-control" placeholder="Enter The Subject ..."></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
@endsection
