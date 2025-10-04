@extends('master')
@section('title','Add Product')
@section('content')
<div class="d-flex flex-column justify-content-center align-items-center">

    <form class="w-50 p-5"
      method="post"
      enctype="multipart/form-data"
      action="{{ $pro ? url('/update/'.$pro->id) : url('/add') }}">
    @csrf
    @if($pro)
        @method('post') <!-- POST works for update route -->
    @endif

    <h2 class="text-center mb-3">{{ $pro ? 'Edit Product' : 'Add Product' }}</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="mb-3">
        <label for="productName" class="form-label">Product Name</label>
        <input type="text" class="form-control" id="productName" name="name"
               value="{{ old('name', $pro->name ?? '') }}">
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="productPrice" class="form-label">Price</label>
        <input type="number" class="form-control" id="productPrice" name="price"
               value="{{ old('price', $pro->price ?? '') }}">
        @error('price')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="productImage" class="form-label">Image</label>
        <input type="file" class="form-control" id="productImage" name="image">
        <div class="mt-2">
            <img id="previewImg"
                 src="{{ $pro->image ?? '' }}"
                 alt="Preview"
                 style="max-width:200px; {{ $pro ? '' : 'display:none;' }}">
        </div>
        @error('image')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">{{ $pro ? 'Update Product' : 'Add Product' }}</button>
</form>

<script>
    const imageInput = document.getElementById('productImage');
    const preview = document.getElementById('previewImg');

    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.setAttribute('src', e.target.result);
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            preview.setAttribute('src', '');
            preview.style.display = 'none';
        }
    });
</script>

</div>
@endsection
