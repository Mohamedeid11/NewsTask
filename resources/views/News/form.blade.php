<div class="container-fluid m-2" xmlns="http://www.w3.org/1999/html">
    <div class="row justify-content-center">
        <div class="col-lg-8 ">
            <div class="card-box">
                <div class="form-group">
                    <label for="exampleInputEmail1">News Title</label>
                    <input type="text" name="title" id="title" placeholder="Enter The News Title" value="{{old('title') ?? $News->title}}" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">news Subject</label>
                    <textarea name="subject" class="form-control" id="subject" placeholder="The Subject of The News">{{old('subject') ?? $News->subject}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1"> Select The Book Category </label>
                    <select class="form-control" name="category" id="category">
                        @if (count($categories) > 0)
                            @foreach($categories as $category)
                                <option id="category" name="category" value="{{$category->id}}" {{$category->id == $News->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>






