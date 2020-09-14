@extends('layouts.admin')

@section('content')
  <div class="card">
    <div class="card-header">
      <strong>Tambah Foto Barang</strong>
    </div>
    <div class="card-body card-block">
      <form action="{{ route('product-gallery.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="product_id" class="form-control-label">Nama Barang</label>
          <select name="product_id" class="form-control @error('product_id') is-invalid @enderror">
            @foreach ($items as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
          </select>
          @error('product_id') <div class="text-muted">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
          <label for="photo" class="form-control-label">Foto Barang</label>
          <input type="file" name="photo" value="{{ old('photo') }}" accept="image/*" class="form-control @error('photo') is-invalid @enderror">
          @error('photo') <div class="text-muted">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
          <label for="is_default" class="form-control-label">Jadikan Default</label>
          <br>
          <label>
            <input type="radio" name="is_default" value="1" class="form-control @error('is_default') is-invalid @enderror" /> Ya
          </label>
          &nbsp;
          <label>
            <input type="radio" name="is_default" value="0" class="form-control @error('is_default') is-invalid @enderror" /> No
          </label>
          @error('is_default') <div class="text-muted">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
          <button class="btn btn-primary btn-block" type="submit">
            Tambah Foto Barang
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection