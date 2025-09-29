@extends('master')
@section('title','Add Product')
@section('content')
<div class="d-flex flex-column justify-content-center align-items-center">

    <form class="w-50 p-5" method="post" enctype="multipart/form-data" action="{{ url('/add') }}">
          @csrf
          @method('post')
          @if(session('success'))
          <span class="text-danger">
          {{   session('success') }}

          </span>


          @endif
        <h2 class="text-center mb-3">Add Product</h2>
        <div class="mb-3">
            <label for="productName" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="productName" name="name">
            @error('name')
            <span class="text-danger">{{ $message }}</span>

            @enderror
        </div>
        <div class="mb-3">
            <label for="productPrice" class="form-label">Price</label>
            <input type="number" class="form-control" id="productPrice" name="price">
            @error('price')
            <span class="text-danger">{{ $message }}</span>

            @enderror
        </div>
        <div class="mb-3">
            <label for="productImage" class="form-label">Image</label>
            <input type="file" class="form-control" id="productImage" name="image">
            <div class="mt-2">
                <img id="previewImg" src="" alt="Preview" style="max-width:200px; display:none;">
            </div>
            @error('image')
            <span class="text-danger">{{ $message }}</span>

            @enderror

        </div>
        <button type="submit" id="btn" class="btn btn-primary">Add Product</button>
    </form>

    <script>
        let image = document.getElementById('productImage');
        let preview = document.getElementById('previewImg');

        image.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.addEventListener('load', function() {
                    preview.setAttribute('src', this.result);
                    preview.style.display = 'block';
                });
                reader.readAsDataURL(file);
            } else {
                preview.setAttribute('src', '');
                preview.style.display = 'none';
            }
        });
    </script>
</div>
@endsection
