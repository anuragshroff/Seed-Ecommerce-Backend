@extends('admin.master')

@section('main-content')

<div class="page-content">
    

    <div class="card col-md-8">

        <div class="card-header">
            <h5>Create Template</h5>
        </div>
        <div class="card-body">
           
            <form action="{{route('template.store')}}" class="row g-3" method="post" enctype="multipart/form-data">
                @csrf

                <div class="col-md-12">
                    <label for="input13" class="form-label">Name</label>
                    <div class="position-relative input-icon">
                        <input type="text" name="name" class="form-control" id="input13" value="{{ old('name') }}">
                        <span class="position-absolute top-50 translate-middle-y"><i class="bx bx-user"></i></span>
                    </div>
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="image" class="form-label">Upload Template Image</label>
                    <div class="position-relative">
                        <input type="file" class="form-control" name="image" id="image">
                      
                    </div>

                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror


                </div>


                <div class="col mt-3">
                    <button type="submit" class="btn btn-primary px-5 w-100">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle mr-1" viewBox="0 0 16 16">
                            <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0"/>
                            <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
                          </svg>
                        
                        Add Template
                    </button>
                </div>




            </form>


        </div>
    </div>
</div>

@endsection