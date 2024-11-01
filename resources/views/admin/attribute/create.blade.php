@extends('admin.master')

@section('main-content')
<div class="page-content">



    <div class="card">

        <div class="card-header">

            <div class="col-md-12">
                <label for="input3" class="form-label">Create Attribute</label>

                <form method="post" action="{{route('attributeStore')}}">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-primary" type="submit">Create</button>
                    </div>

                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                </form>




            </div>

        </div>


        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead style="background: #A9FFCD">
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Option</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach($attributes as $count => $item)
                        <tr>
                            <td>{{$count +1 }}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                @foreach($item->attribute_options as $data)
                                <span class="badge bg-dark px-4 py-2" style="font-weight: 200">{{$data->name}}</span>
                                @endforeach
                            </td>
                            <td>
                                <div class="row row-cols-auto g-3">
                                    <div class="col">
                                        <a href="{{route('createAtributeOption',$item->id)}}" class="btn btn-success px-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                            </svg>

                                            Add Option
                                        </a>
                                    </div>

                                    <div class="col">
                                        <a href="{{route('editAttribute', $item->id)}}" class="btn btn-primary px-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                            </svg>

                                            Edit
                                        </a>
                                    </div>

                                    <div class="col">
                                        <a href="{{route('deleteAttribute', $item->id)}}" type="button" class="btn btn-danger px-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                            </svg>

                                            Delete
                                        </a>
                                    </div>





                                </div>
                            </td>

                        </tr>
                        @endforeach


                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection
