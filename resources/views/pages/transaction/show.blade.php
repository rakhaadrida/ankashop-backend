<table class="table table-bordered">
  <tr>
    <th>Nama</th>
    <td>{{ $item->name }} </td>
  </tr>
  <tr>
    <th>Email</th>
    <td>{{ $item->email }} </td>
  </tr>
  <tr>
    <th>Number</th>
    <td>{{ $item->number }} </td>
  </tr>
  <tr>
    <th>Address</th>
    <td>{{ $item->address }} </td>
  </tr>
  <tr>
    <th>Total</th>
    <td>{{ $item->total }} </td>
  </tr>
  <tr>
    <th>Status</th>
    <td>{{ $item->status }} </td>
  </tr>
  <tr>
    <th>Pembelian Produk</th>
    <td>
      <table class="table table-bordered w-100">
        <tr>
          <th>Name</th>
          <th>Type</th>
          <th>Price</th>
        </tr>
        @foreach($item->detail as $det)
          <tr>
            <td>{{ $det->product->name }}</td>
            <td>{{ $det->product->type }}</td>
            <td>{{ $det->product->price }}</td>
          </tr>
        @endforeach
      </table>
    </td>
  </tr>
</table>
<div class="row">
  <div class="col-4">
    <a href="{{ route('transaction-status', $item->id) }}?status=SUCCESS" class="btn btn-success btn-block">
      <i class="fa fa-check"></i> Set Success
    </a>
  </div>
  <div class="col-4">
    <a href="{{ route('transaction-status', $item->id) }}?status=PENDING" class="btn btn-info btn-block">
      <i class="fa fa-spinner"></i> Set Pending
    </a>
  </div>
  <div class="col-4">
    <a href="{{ route('transaction-status', $item->id) }}?status=FAILED" class="btn btn-danger btn-block">
      <i class="fa fa-times"></i> Set Failed
    </a>
  </div>
</div>