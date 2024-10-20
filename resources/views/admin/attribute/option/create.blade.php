@extends('admin.master')

@section('main-content')
<div class="page-content">
  

    <div class="card col-md-8 mx-auto" style="margin-top: 50px;">
        <div class="card-header">
            <h5>Create New Option</h5>
            <p>Fill out the details below to create a new option</p>
        </div>
        <div class="card-body">

            <form >
                <div class="col-md-12">
                    <label for="input25" class="form-label">Option Name</label>
                     <div class="input-group">
                        <span class="input-group-text"><i class="bx bx-user"></i></span>
                        <input type="text" class="form-control" id="input25" placeholder="Eneter your option">
                      </div>
                </div>

                <div class="col mt-3">
                    <button type="button" class="btn btn-primary px-5 w-100">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle mr-1" viewBox="0 0 16 16">
                            <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0"/>
                            <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
                          </svg>
                        
                        Add Option
                    </button>
                </div>

              

            </form>
           
           
           
        </div>
    </div>
    
</div>
@endsection
