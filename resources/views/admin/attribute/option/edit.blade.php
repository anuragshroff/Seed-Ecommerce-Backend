@extends('admin.master')

@section('main-content')
<div class="page-content">


    <div class="card col-md-8 mx-auto" style="margin-top: 50px;">
        <div class="card-header">
            <h5>Update Attribute Data</h5>
        </div>
        <div class="card-body">

            <form>

                <div class="mb-5">

                    <label class="mb-3" style="color : #d63384">Change Attribute Name *</label>
                    <div class="input-group mb-3">
    
                        <input type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary btn-dark" type="button" id="button-addon2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-square" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm8.5 2.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293z" />
                            </svg>
                            Update
                        </button>
                    </div>
                    
                </div>

                <hr>
                <label class="mb-3" style="color : #d63384">Edit options *</label>

                <div>

                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                          <div class="ms-2 me-auto">
                            <div class="fw-bold">Subheading</div>
                         
                          </div>
                          <span class="badge bg-primary rounded-pill"><i class="bx bx-pencil"></i></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                          <div class="ms-2 me-auto">
                            <div class="fw-bold">Subheading</div>
                          
                          </div>
                          <span class="badge bg-primary rounded-pill"><i class="bx bx-pencil"></i></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                          <div class="ms-2 me-auto">
                            <div class="fw-bold">Subheading</div>
                           
                          </div>
                          <span class="badge bg-primary rounded-pill"><i class="bx bx-pencil"></i></span>
                        </li>
                      </ol>

                </div>

              



                <div class="col mt-3">
                    <button type="button" class="btn btn-primary px-5 w-100">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle mr-1" viewBox="0 0 16 16">
                            <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0" />
                            <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                        </svg>

                        Add Option
                    </button>
                </div>



            </form>



        </div>
    </div>

</div>
@endsection
