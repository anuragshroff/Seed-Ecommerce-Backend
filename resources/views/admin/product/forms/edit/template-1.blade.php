<form class="row g-3 " method="POST" enctype="multipart/form-data" action="{{ route('product.update', $product->id) }}">


@csrf
@method('PUT')
    <input type="hidden" name="template_id" value="{{$templates->id}}" />
    <div class="col-md-6">
        <label for="productName" class="form-label">Product Name</label>
        <div class="input-group">
            <span class="input-group-text"><i class='bx bx-user'></i></span>
            <input type="text" class="form-control" id="productName" name="name" value="{{ old('name', $product->name) }}">
        </div>
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="code" class="form-label">Product Code</label>
        <div class="input-group">
            <span class="input-group-text"><i class='bx bx-lock-alt'></i></span>
            <input type="text" class="form-control" id="code" name="code" value="{{ old('code', $product->code) }}">
        </div>
        @error('code')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-12">
        <img class="img-fluid" src="{{asset($product->featured_image)}}" style="border-radius: 5px;height: 200px;" />
    </div>

    <div class="col-md-6">
        <label for="featured_image" class="form-label">Banner Image</label>
        <div class="input-group">
            <input type="file" name="featured_image" class="form-control" id="featured_image">
        </div>
        @error('featured_image')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="countdowndate" class="form-label">Count Down Date / End of offer Date</label>
        <div class="input-group">
            <input type="datetime-local" name="countdowndate" class="form-control" id="cuntdowndate" value="{{ $product->countdowndate }}">
        </div>
        @error('cuntdowndate')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="price" class="form-label">Price</label>
        <div class="input-group">
            <span class="input-group-text"><i class='bx bx-user'></i></span>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price',$product->price) }}">
        </div>
        @error('price')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="previousPrice" class="form-label">Previous Price</label>
        <div class="input-group">
            <span class="input-group-text"><i class='bx bx-envelope'></i></span>
            <input type="number" class="form-control" id="previousPrice" name="previous_price" value="{{ old('previous_price',$product->previous_price) }}">
        </div>
        @error('previous_price')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="quantity" class="form-label">Quantity</label>
        <div class="input-group">
            <span class="input-group-text"><i class='bx bx-envelope'></i></span>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity',$product->quantity) }}">
        </div>
        @error('quantity')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>



    <div class="col-md-12">
        <label for="section_title" class="form-label">Section Title</label>
        <div class="input-group">
            <span class="input-group-text"><i class='bx bx-user'></i></span>
            <input type="text" class="form-control" id="section_title" name="section_title" value="{{ old('section_title',$product->section_title) }}">
        </div>
        @error('section_title')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-12">
        <label for="product_description" class="form-label">Product Description</label>
        <textarea class="summernote" id="product_description" name="product_description">{{ old('product_description',$product->product_description) }}</textarea>
        @error('product_description')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    
    <div class="col-md-12">
        <img class="img-fluid" src="{{asset($product->first_image)}}" style="border-radius: 5px;height: 200px;" />
    </div>


    <div class="col-md-12">
        <label for="first_image" class="form-label">Product Image</label>
        <div class="input-group">
            <span class="input-group-text"><i class='bx bx-user'></i></span>
            <input type="file" class="form-control" id="first_image" name="first_image" value="{{ old('first_image',$product->first_image) }}">
        </div>
        @error('first_image')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

</form>
