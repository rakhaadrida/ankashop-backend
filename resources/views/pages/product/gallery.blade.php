@extends('layouts.admin')

@section('content')
  <div class="orders">
    <div class="row">
      <div class="col-12">
        <div class="card p-3">
          <div class="card-body">
            <h4 class="box-title">Daftar Foto Barang {{ $product->name }}</h4>
          </div>
          <div class="card-body--">
            <div class="table-stats order-table ov-h">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Photo</th>
                    <th>Is Default</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($items as $item)
                    <tr>
                      <td>{{ $item->id }}</td>
                      <td>{{ $item->product->name }}</td>
                      <td>
                        <img src="{{ url($item->photo) }}" alt="">
                      </td>
                      <td>{{ $item->is_default ? 'Ya' : 'Tidak' }}</td>
                      <td>
                        <form action="{{ route('product-gallery.destroy', $item->id) }}" method="post" class="d-inline">
                          @csrf
                          @method('delete')
                          <button class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="6" class="text-center">Belum Ada Data Produk</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection