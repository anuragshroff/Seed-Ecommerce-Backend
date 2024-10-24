@extends('admin.master')

@section('main-content')
<div class="page-content">


    <div class="card col-md-8 mx-auto" style="margin-top: 50px;">
        <div class="card-header">
            <h5>Update Attribute Data</h5>
        </div>
        <div class="card-body">

      

                <div class="mb-5">

                    <label class="mb-3" style="color : #d63384">Change Attribute Name *</label>
                    <form method="POST" action="{{route('updateAttribute')}}">
                        @csrf

                        <div class="input-group mb-3">

                        
                         
                            <input type="hidden" name="attribute_id" value="{{$attributes->id}}" />

                            <input type="text" name="name" value="{{$attributes->name}}" class="form-control" >
                            <button class="btn btn-outline-secondary btn-dark" type="submit" id="button-addon2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-square" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm8.5 2.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293z" />
                                </svg>
                                Update
                            </button>

                     
    
                       
                    </div>

                    </form>
                  
                    
                </div>

                <hr>
                <label class="mb-3" style="color : #d63384">Edit options *</label>

                <div>

                    <ol class="list-group list-group-numbered">

                        @foreach($attributes->attribute_options as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                          <div class="ms-2 me-auto">
                            <div class="">{{$item->name}}</div>
                         
                          </div>
                          <a href="/attribute/option/edit/{{$item->id}}" class="badge bg-primary rounded-pill"><i class="bx bx-pencil"></i></a>
                        </li>
                        @endforeach
                       
                      </ol>

                </div>

              



               


           



        </div>
    </div>

</div>
@endsection
