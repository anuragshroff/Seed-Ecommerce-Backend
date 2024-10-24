@extends('admin.master')

@section('main-content')
<div class="page-content">


    <div class="row gy-4">



        <div class="col-lg-12 col-md-10 col-sm-12 bg-white card shadow-sm">
            <div class="card-header">
                Update Option Data
            </div>
            <div class="card-body">
                <form action="{{route('attributeOptionUpdate')}}" method="POST">
                    @csrf
                    <input type="hidden"  name="attribute_option_id" value="{{$attributeOption->id}}">
                    <!-- Name Field -->
                    <div class="mb-3">
                        <label for="attr_name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" id="attr_name" placeholder="Enter Name" value="{{$attributeOption->name}}" required="" aria-label="Attribute Name">

                    </div>



                    <!-- Submit Button -->
                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-primary" aria-label="Update Option">
                            <i class="bi bi-save"></i> Update
                        </button>
                        <a href="/attribute" class="btn btn-secondary" aria-label="Back to Attribute List">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                    </div>
                </form>
            </div>

            <div class="card-footer text-center">
               <a href="{{route('attributeOptionDelete', $attributeOption->id)}}" class="btn btn-danger w-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                  </svg>

                Delete This Option
              </a>
            </div>
        </div>

    </div>



</div>
@endsection
