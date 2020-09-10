@extends('layouts.admin')

@section('content')
  <div class="card">
    <div class="card-header">
      <strong>Edit Barang</strong>
    </div>
    <div class="card-body card-block">
      <form action="{{ route('product.update', $item->id) }}" method="post">
        @method('PUT')
        @csrf
        <div class="form-group">
          <label for="name" class="form-control-label">Nama Barang</label>
          <input type="text" name="name" value="{{ $item->name }}" class="form-control @error('name') is-invalid @enderror">
          @error('name') <div class="text-muted">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
          <label for="type" class="form-control-label">Tipe Barang</label>
          <input type="text" name="type" value="{{ $item->type }}" class="form-control @error('type') is-invalid @enderror">
          @error('type') <div class="text-muted">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
          <label for="description" class="form-control-label">Description</label>
          <textarea name="description" class="ckeditor form-control @error('description') is-invalid @enderror">{{ $item->description }}</textarea>
          @error('description') <div class="text-muted">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
          <label for="harga" class="form-control-label">Harga Barang</label>
          <input type="number" name="price" value="{{ $item->price}}" class="form-control @error('harga') is-invalid @enderror">
          @error('harga') <div class="text-muted">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
          <label for="quantity" class="form-control-label">Quantity Barang</label>
          <input type="number" name="quantity" value="{{ $item->quantity }}" class="form-control @error('quantity') is-invalid @enderror">
          @error('quantity') <div class="text-muted">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
          <button class="btn btn-primary btn-block" type="submit">
            Update Barang
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection