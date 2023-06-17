
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
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Category</h2>

            </div>



            <div class="box-content">
                <form class="form-horizontal" action="{{ route('about.save') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <fieldset>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">About us</label>
                            <div class="controls">
                                <textarea class="cleditor" name="description" rows="3" required></textarea>
                            </div>

                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Publish</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->
    </div><!--/row-->
    </div><!--/row-->

@endsection
