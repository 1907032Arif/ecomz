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
        <form class="form-horizontal" action="{{ route('admin_products.store') }}" method="post" enctype="multipart/form-data">
           @csrf
            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="date01">Product Name</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="name" required>
                    </div>
                </div>


                <div class="control-group hidden-phone">
                    <label class="control-label" for="textarea2">Product Description</label>
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

                <div class="control-group">
                    <label class="control-label">Select Category</label>
                    <div class="controls">
                        <select name="cat_id">
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Make it Feature Product?</label>
                    <div class="form-check form-switch controls">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="checkbox" value="1">
                      </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Regular Price</label>
                    <div class="controls">
                        <input type="number" class="input-xlarge" name="regular_price" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Offer Price</label>
                    <div class="controls">
                        <input type="number" class="input-xlarge" name="offer_price">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Rating</label>
                    <div class="controls">
                        <input type="number" class="input-xlarge" name="rating">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" >Size</label>
                    <div class="controls">
                        <select name="size">
                            <option value="XL">XL</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="S">S</option>
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Instagram URL</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="instagram_url">
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </div>
            </fieldset>
        </form>

    </div>
</div><!--/span-->
</div><!--/row-->
</div><!--/row-->

@endsection
