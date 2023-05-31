@extends('admin.admin_master')

@section('index_content')

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
                <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
          
        
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Catagory name</th>
                      <th style="width: 25%">Description</th>
                      <th style="width: 25%">Image</th>
                      <th>Status</th>
                      <th style="width: 15%">Actions</th>
                  </tr>
              </thead>   
              <tbody>
                @foreach ($catagories as $catagory)
                <tr>
                    <td>{{ $catagory->id }}</td>
                    <td class="center">{{ $catagory->name }}</td>
                    <td class="center">{{ $catagory->description }}</td>
                    <td class="center">
                        <img src="{{ asset('/catagory/'.$catagory->image) }}" alt="" style="width: 150px height:80px">
                    </td>
                    <td class="center">
                        @if ($catagory->status == 1)
                        <span class="label label-success">Active</span> 
                        @else
                        <span class="label label-danger">DeActive</span>
                        @endif
                    </td>
                    <td class="row">
                        <div class="span3">

                        </div>
                        <div class="span2">     
                        
                            @if($catagory->status == 1)
                            
                                <a href="{{ url('/cat-status'.$catagory->id) }}" class="btn btn-success" >
                                    <i class="halflings-icon white thumbs-down"></i>  
                                </a></div>
                            
                            @else
                                <a href="{{ url('/cat-status'.$catagory->id) }}" class="btn btn-danger" >
                                    <i class="halflings-icon white thumbs-up"></i>  
                                </a></div>
                            
                            @endif
                           
                        <div class="span2">   
                        <a class="btn btn-info" href="{{ url('/catagories/'.$catagory->id.'/edit') }}">
                            <i class="halflings-icon white edit"></i>  
                        </a></div>
                        <div class="span2">  
                            <form method="post" action="{{ url('/catagories/'.$catagory->id) }}">
                                @csrf
                                @method('DELETE')
                       <button class = "btn btn-danger" type = "submit">
                        <i class="halflings-icon white trash"></i> 
                       </button>
                            
                       
                    </form> 
                    </div>
                        <div class="span3">

                        </div>
                    </td>
                </tr>
             
                @endforeach
                
              
              </tbody>
          </table>            
        </div>
    </div><!--/span-->

</div><!--/row-->


@endsection