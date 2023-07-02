@extends('admin.admin_master')
@section('index_content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<div class="row-fluid sortable">
<div class="box span12">
        <div class="box-header" data-original-title>


            <p class="alert-success">
                <?php
                $message = Session::get('message');
                if($message)
                {
                    echo $message;
                    Session::put('message', null);
                }
                ?>
            </p>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>

        </div>



    <div class="box-content">
        <form class="form-horizontal" action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
           @csrf
            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="date01">Title</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="name" required>
                    </div>
                </div>


                <div class="control-group hidden-phone">
                    <label class="control-label" for="textarea2">Post Description</label>
                    <div class="controls">
                        <textarea class="cleditor" name="description" rows="3" required></textarea>
                    </div>

                </div>

                <div class="control-group">
                    <label class="control-label">File Upload</label>
                    <div class="controls">
                        <input type="file" name="image">
                    </div>
                </div>

{{--                <div class="control-group">--}}
{{--                    <label class="control-label">Select Category</label>--}}
{{--                    <div class="controls">--}}
{{--                        <select name="cat_id">--}}
{{--                            @foreach($categories as $cat)--}}
{{--                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>--}}
{{--                            @endforeach--}}

{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="control-group">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Make it Feature Post?</label>
                    <div class="form-check form-switch controls">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="checkbox" value="1">
                      </div>
                </div>


                <div class="control-group">
                    <label class="control-label">Tags</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="tags" placeholder="Give a space for each tag">
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Add Post</button>
                </div>
            </fieldset>
        </form>

    </div>
</div><!--/span-->
</div><!--/row-->
</div><!--/row-->

@endsection
