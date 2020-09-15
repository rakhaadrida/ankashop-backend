@extends('layouts.admin')

@section('content')
  <div class="card">
    <div class="card-header">
      <strong>Edit Transaksi {{ $item->uuid }}</strong>
    </div>
    <div class="card-body card-block">
      <form action="{{ route('transaction.update', $item->id) }}" method="post">
        @method('PUT')
        @csrf
        <div class="form-group">
          <label for="name" class="form-control-label">Name</label>
          <input type="text" name="name" value="{{ $item->name }}" class="form-control @error('name') is-invalid @enderror">
          @error('name') <div class="text-muted">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
          <label for="email" class="form-control-label">Email</label>
          <input type="text" name="email" value="{{ $item->email }}" class="form-control @error('email') is-invalid @enderror">
          @error('email') <div class="text-muted">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
          <label for="number" class="form-control-label">Phone Number</label>
          <input type="number" name="number" value="{{ $item->number}}" class="form-control @error('number') is-invalid @enderror">
          @error('number') <div class="text-muted">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
          <label for="address" class="form-control-label">Address</label>
          <input type="text" name="address" value="{{ $item->address }}" class="form-control @error('address') is-invalid @enderror">
          @error('address') <div class="text-muted">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
          <button class="btn btn-primary btn-block" type="submit">
            Update Transaksi
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection