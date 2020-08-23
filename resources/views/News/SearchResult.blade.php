@extends('adminLte.main')

@section('title' , 'News')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-dark">
                        <div class="card-header text-center">
                            News
                            <div class="float-right font-21 btn card"> Number Of result(s) {{$count}}</div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row justify-content-center">
                                @if (count($News) > 0)
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

                                    @else
                                        <div class="row justify-content-center m-5">
                                            <div class="card">
                                                <div class="card-body p-4">
                                                    <div class="text-center">
                                                        <h3 class="mt-3 mb-4">There is No Result For Your Search 😟</h3>
                                                    </div>
                                                </div> <!-- end card-body -->
                                            </div>
                                            <!-- end card -->
                                        </div>
                                        <!-- end row -->
                                    @endif
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
    </div>
@endsection
