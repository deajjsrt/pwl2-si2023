<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Suppliers</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body style="background:  #f0bbbb">
    
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">LIST SUPPLIER</h3>
                <hr>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <a href="{{ route('suppliers.create') }}" class="btn btn-md btn-success mb-3">ADD SUPPLIER</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">NAMA SUPPLIER</th>
                                <th scope="col">ALAMAT SUPPLIER</th>
                                <th scope="col">PIC SUPPLIER</th>
                                <th scope="col">NO HP PIC SUPPLIER</th>
                                <!-- <th scope="col">CATEGORY</th> -->
                                <th scope="col" style="width: 20%">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($suppliers as $supplier)
                            <tr>
                                <td>{{ $supplier->supplier_name }}</td>
                                <td>{{ $supplier->alamat_supplier }}</td>
                                <td>{{ $supplier->pic_name }}</td>
                                <td>{{ $supplier->no_hp_pic_supplier }}</td>
                                <!-- <td>{{ $supplier->supplier_category_name }}</td> -->
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST">
                                        <a href="{{ route('suppliers.show', $supplier->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                        <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Data Supplier belum Tersedia.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $suppliers->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Message with SweetAlert
    @if (session('success'))
      Swal.fire({
        icon: 'success',
        title: 'SUCCESS!',
        text: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 2000
      });
    @elseif (session('error'))
      Swal.fire({
        icon: 'error',
        title: 'FAILED!',
        text: '{{ session('error') }}',
        showConfirmButton: false,
        timer: 2000
      });
    @endif
</script>
</body>
</html>