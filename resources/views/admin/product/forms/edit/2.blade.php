{{--
<form class="row g-3" method="POST" enctype="multipart/form-data" action="{{ route('product.store') }}">
    @csrf
    <input type="hidden" name="template_id" value="{{ $templates->id }}" />
    <div class="col-md-6">
        <label for="productName" class="form-label">Product Name</label>
        <div class="input-group">
            <span class="input-group-text"><i class='bx bx-user'></i></span>
            <input type="text" class="form-control" id="productName" name="name"
                value="{{ old('name', $product->name) }}">
        </div>
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <!-- First Section Header Title -->
    <h4><label for="header_title" class="form-label">First Section</label></h4>
    <div class="col-md-12">
        <label for="header_title" class="form-label">Header Title</label>
        <div class="input-group">
            <span class="input-group-text"><i class='bx bx-user'></i></span>
            <input type="text" class="form-control" id="header_title" name="header_title"
                value="{{ old('header_title') }}">
        </div>
        @error('header_title')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Video Section with Toggle Option -->
    <div class="col-md-12">
        <label for="video_option" class="form-label">Choose Video Option</label>
        <select class="form-control" id="video_option" onchange="toggleVideoInput()">
            <option value="">Select Option</option>
            <option value="url">Video URL</option>
            <option value="file">Upload Video File</option>
        </select>
    </div>
    <div class="col-md-12" id="video_url_input" style="display: none;">
        <label for="video_url" class="form-label">Video URL</label>
        <input type="text" name="video_url" class="form-control" id="video_url" value="{{ old('video_url') }}">
        @error('video_url')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-12" id="video_file_input" style="display: none;">
        <label for="video_file" class="form-label">Upload Video File</label>
        <input type="file" name="video_file" class="form-control" id="video_file">
        @error('video_file')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- FAQ Section -->
    <h4><label class="form-label">Second Section / FAQ Section</label></h4>
    <div class="col-md-12">
        <label for="faq_section_title" class="form-label">FAQ Section Title</label>
        <input type="text" class="form-control" id="faq_section_title" name="faq_section_title"
            value="{{ old('faq_section_title') }}">
        @error('faq_section_title')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div id="faqContainer">
        <div class="faq-item">
            <div class="col-md-12">
                <label class="form-label">FAQ Question</label>
                <input type="text" class="form-control" name="faq_questions[]" placeholder="Enter FAQ Question">
            </div>
            <div class="col-md-12">
                <label class="form-label">FAQ Answer</label>
                <textarea class="form-control" name="faq_answers[]" placeholder="Enter FAQ Answer"></textarea>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <button type="button" class="btn btn-primary btn-sm px-3" onclick="addFaq()">+ Add FAQ</button>
    </div>



    <!-- Third Section (Optional) -->
    <h4><label for="third_section_title" class="form-label">Third Section</label></h4>
    <div class="col-md-12">
        <label for="productName" class="form-label">Section Title</label>
        <div class="input-group">
            <span class="input-group-text"><i class='bx bx-user'></i></span>
            <input type="text" class="form-control" id="productName" name="section_title"
                value="{{ old('name') }}">
        </div>
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-12">
        <label for="product_description" class="form-label">Product Description</label>
        <textarea class="summernote" id="product_description" name="product_description">{{ old('product_description') }}</textarea>
        @error('product_description')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-12">
        <label for="productName" class="form-label">Product Image</label>
        <div class="input-group">
            <span class="input-group-text"><i class='bx bx-user'></i></span>
            <input type="file" class="form-control" id="productName" name="firstimage"
                value="{{ old('name') }}">
        </div>
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Review Section -->
    <h4><label class="form-label">Review Section</label></h4>
    <div class="col-md-12">
        <button type="button" class="btn btn-primary btn-sm px-3" onclick="addReview()">+ Add Review Image</button>
    </div>
    <div id="reviewContainer">
        <div class="review-item">
            <div class="col-md-12">
                <label class="form-label">Review Image</label>
                <input type="file" class="form-control" name="review_images[]" accept="image/*">
            </div>
        </div>
    </div>


    <!-- JavaScript to Manage Dynamic Fields and Toggle Video Input -->
    <script>
        function toggleVideoInput() {
            const option = document.getElementById('video_option').value;
            document.getElementById('video_url_input').style.display = option === 'url' ? 'block' : 'none';
            document.getElementById('video_file_input').style.display = option === 'file' ? 'block' : 'none';
        }

        function addFaq() {
            const faqContainer = document.getElementById('faqContainer');
            const newFaq = document.createElement('div');
            newFaq.classList.add('faq-item');
            newFaq.innerHTML = `
                <div class="col-md-12">
                    <label class="form-label">FAQ Question</label>
                    <input type="text" class="form-control" name="faq_questions[]" placeholder="Enter FAQ Question">
                </div>
                <div class="col-md-12">
                    <label class="form-label">FAQ Answer</label>
                    <textarea class="form-control" name="faq_answers[]" placeholder="Enter FAQ Answer"></textarea>
                </div>
            `;
            faqContainer.appendChild(newFaq);
        }
    </script>
    <script>
        function addReview() {
            const reviewContainer = document.getElementById('reviewContainer');
            const newReview = document.createElement('div');
            newReview.classList.add('review-item');
            newReview.innerHTML = `
            <div class="col-md-12">
                <label class="form-label">Review Image</label>
                <input type="file" class="form-control" name="review_images[]" accept="image/*">
            </div>
        `;
            reviewContainer.appendChild(newReview);
        }
    </script>

</form>

--}}

<style>
    .reviewImage {
        position: relative;
        display: inline-block;
        /* Ensure it wraps around the image */
    }

    .reviewIcon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        /* Corrected transform property */
    }
</style>

<form class="row g-3" method="POST" enctype="multipart/form-data" action="{{ route('product.update', $product->id) }}">
    @csrf
    @method('PUT')
    <input type="hidden" name="template_id" value="{{ $templates->id }}" />
    <div class="col-md-12">
        <label for="productName" class="form-label">Product Name</label>
        <div class="input-group">
            <span class="input-group-text"><i class='bx bx-user'></i></span>
            <input type="text" class="form-control" id="productName" name="name"
                value="{{ old('name', $product->name) }}">
        </div>
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- First Section Header Title -->

    <div class="col-md-12">
        <label for="header_title" class="form-label">Header Title</label>
        <div class="input-group">
            <span class="input-group-text"><i class='bx bx-user'></i></span>
            <input type="text" class="form-control" id="header_title" name="header_title"
                value="{{ old('header_title', $product->header_title) }}">
        </div>
        @error('header_title')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-12">
        <label for="code" class="form-label">Product Code</label>
        <div class="input-group">
            <span class="input-group-text"><i class='bx bx-lock-alt'></i></span>
            <input type="text" class="form-control" id="code" name="code"
                value="{{ old('code', $product->code) }}">
        </div>
        @error('code')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Video Section with Toggle Option -->
    <div class="col-md-12">
        <label for="video_option" class="form-label">Choose Video Option</label>
        <select class="form-select" id="video_option" onchange="toggleVideoInput()">
            <option value="">Select Option</option>
            <option value="url">Video URL</option>
            <option value="file">Upload Video File</option>
        </select>
    </div>


    <div class="col-md-12" id="video_url_input" style="display: none;">
        <label for="video_url" class="form-label">Video URL</label>
        <input type="text" name="video_url" class="form-control" id="video_url" value="{{ old('video_url') }}">
        @error('video_url')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>





    <div class="col-md-12" id="video_file_input" style="display: none;">
        <label for="video" class="form-label">Upload Video File</label>

        <video width="600" controls>
            <source src="{{ asset($product->video) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>



        <input type="file" name="video" class="form-control" id="video_file">
        @error('video')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>






    <div class="col-md-4">
        <label for="price" class="form-label">Price</label>
        <div class="input-group">
            <span class="input-group-text"><i class='bx bx-user'></i></span>
            <input type="number" class="form-control" id="price" name="price"
                value="{{ old('price', $product->price) }}">
        </div>
        @error('price')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="previousPrice" class="form-label">Previous Price</label>
        <div class="input-group">
            <span class="input-group-text"><i class='bx bx-envelope'></i></span>
            <input type="number" class="form-control" id="previousPrice" name="previous_price"
                value="{{ old('previous_price', $product->previous_price) }}">
        </div>
        @error('previous_price')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="quantity" class="form-label">Quantity</label>
        <div class="input-group">
            <span class="input-group-text"><i class='bx bx-envelope'></i></span>
            <input type="number" class="form-control" id="quantity" name="quantity"
                value="{{ old('quantity', $product->quantity) }}">
        </div>
        @error('quantity')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>



    <!-- FAQ Section -->

    <div class="col-md-12">
        <label for="faq_section_title" class="form-label">FAQ Section Title</label>
        <input type="text" class="form-control" id="faq_section_title" name="faq_section_title"
            value="{{ old('faq_section_title', $product->faq_section_title) }}">
        @error('faq_section_title')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    @php
        $faqQuestions = json_decode($product->faq_questions, true) ?? [];
        $faqAnswers = json_decode($product->faq_answers, true) ?? [];
    @endphp

    <div id="faqContainer">
        @foreach ($faqQuestions as $index => $question)
            <div class="faq-item">
                <div class="col-md-12">
                    <label class="form-label">FAQ Question</label>
                    <input type="text" class="form-control" name="faq_questions[]"
                        placeholder="Enter FAQ Question" value="{{ old('faq_questions.' . $index, $question) }}">
                </div>
                <div class="col-md-12 mt-2">
                    <label class="form-label">FAQ Answer</label>
                    <textarea class="form-control" name="faq_answers[]" placeholder="Enter FAQ Answer">{{ old('faq_answers.' . $index, $faqAnswers[$index] ?? '') }}</textarea>
                </div>
            </div>
        @endforeach
    </div>


    <div class="col-md-12">
        <button type="button" class="btn btn-primary btn-sm px-3" onclick="addFaq()">+ Add FAQ</button>
    </div>



    <!-- Third Section (Optional) -->

    <div class="col-md-12">
        <label for="section_title" class="form-label">Section Title</label>
        <div class="input-group">
            <span class="input-group-text"><i class='bx bx-user'></i></span>
            <input type="text" class="form-control" id="section_title" name="section_title"
                value="{{ old('name', $product->section_title) }}">
        </div>
        @error('section_title')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-md-12">
        <label for="product_description" class="form-label">Product Description</label>
        <textarea class="summernote" id="product_description" name="product_description">{{ old('product_description', $product->product_description) }}</textarea>
        @error('product_description')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>


    <div class="col-md-12">
        <img class="img-fluid" src="{{ asset($product->featured_image) }}"
            style="border-radius: 5px;height: 200px;" />
    </div>

    <div class="col-md-12">
        <label for="featured_image" class="form-label">Product Image</label>
        <div class="input-group">
            <span class="input-group-text"><i class='bx bx-user'></i></span>
            <input type="file" class="form-control" id="featured_image" name="featured_image"
                value="{{ old('featured_image') }}">
        </div>
        @error('featured_image')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Review Section -->

    @php
        $reviewImages = json_decode($product->review_images, true) ?? [];
    @endphp

    <div class="row mt-3">
        @if (!empty($reviewImages) && is_array($reviewImages))
            @foreach ($reviewImages as $image)
                <div class="col-md-3 ">
                    <div class="reviewImage">

                        <img src="{{ asset($image) }}" alt="Review Image" class="img-fluid">
                        <button type="button" class="btn btn-danger btn-sm reviewIcon"
                            onclick="deleteReviewImage('{{ $product->id }}', '{{ $image }}')">

                            <svg class="" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                <path
                                    d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                            </svg>

                        </button>

                    </div>


                </div>
            @endforeach
        @endif


    </div>

    <div class="col-md-12">
        <button type="button" class="btn btn-primary btn-sm px-3" onclick="addReview()">+ Add Review Image</button>
    </div>



    <div id="reviewContainer">


        <div class="review-item">
            <div class="col-md-12">
                <label class="form-label">Review Image</label>
                <input type="file" class="form-control" name="review_images[]" accept="image/*">
            </div>
        </div>




    </div>


    <button type="submit" class="btn btn-primary">Submit</button>


</form>

@push('scripts')
    <!-- JavaScript to Manage Dynamic Fields and Toggle Video Input -->
    <script>
        function toggleVideoInput() {
            const option = document.getElementById('video_option').value;
            document.getElementById('video_url_input').style.display = option === 'url' ? 'block' : 'none';
            document.getElementById('video_file_input').style.display = option === 'file' ? 'block' : 'none';
        }

        function addFaq() {
            const faqContainer = document.getElementById('faqContainer');
            const newFaq = document.createElement('div');
            newFaq.classList.add('faq-item');
            newFaq.innerHTML = `
            <div class="col-md-12">
                <label class="form-label">FAQ Question</label>
                <input type="text" class="form-control" name="faq_questions[]" placeholder="Enter FAQ Question">
            </div>
            <div class="col-md-12">
                <label class="form-label">FAQ Answer</label>
                <textarea class="form-control" name="faq_answers[]" placeholder="Enter FAQ Answer"></textarea>
            </div>
        `;
            faqContainer.appendChild(newFaq);
        }
    </script>
    <script>
        function addReview() {
            const reviewContainer = document.getElementById('reviewContainer');
            const newReview = document.createElement('div');
            newReview.classList.add('review-item');
            newReview.innerHTML = `
        <div class="col-md-12">
            <label class="form-label">Review Image</label>
            <input type="file" class="form-control" name="review_images[]" accept="image/*">
        </div>
    `;
            reviewContainer.appendChild(newReview);
        }
    </script>


    <script>
        function deleteReviewImage(productId, imagePath) {


            // Prompt the user for confirmation
            if (confirm('Are you sure you want to delete this image?')) {
                // User confirmed, proceed with the AJAX call
                $.ajax({
                    url: `/product/${productId}/review-image`,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                        image: imagePath
                    },
                    success: function(response) {
                        success_noti('Image deleted successfully!');
                        location.reload(); // Reloading the page (or handle response as needed)
                    },
                    error: function(xhr) {
                        alert('An error occurred while deleting the image');
                    }
                });
            } else {
                // User cancelled, do nothing (no reload)
                return; // Optional, just to be explicit
            }
        }
    </script>







@endpush
