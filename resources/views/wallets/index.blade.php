@extends('layouts.app')

@section('title', 'Wallet')

@section('content')

<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2 mb-3">
    <h4 class="mb-0">Wallet</h4>

    <a href="{{ route('wallets.create') }}"
       class="btn btn-primary w-100 w-md-auto">
        + Tambah Wallet
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">

        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Nama</th>
                        <th class="text-end">Saldo</th>
                        <th class="text-center" style="width: 160px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($wallets as $wallet)
                        <tr>
                            <td>{{ $wallet->name }}</td>
                            <td class="text-end">
                                Rp {{ number_format($wallet->balance, 0, ',', '.') }}
                            </td>
                            <td class="text-center">
                                <div class="d-flex gap-1 justify-content-center flex-wrap">
                                    <a href="{{ route('wallets.edit', $wallet) }}"
                                       class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    <button type="button"
                                            class="btn btn-sm btn-danger btn-delete"
                                            data-id="{{ $wallet->id }}">
                                        Hapus
                                    </button>
                                </div>

                                <form id="delete-form-{{ $wallet->id }}"
                                      action="{{ route('wallets.destroy', $wallet) }}"
                                      method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted py-4">
                                Belum ada wallet
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection

@push('scripts')
<script>
$(document).on('click', '.btn-delete', function () {
    const id = $(this).data('id');

    Swal.fire({
        title: 'Yakin?',
        text: 'Wallet akan dihapus permanen',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $('#delete-form-' + id).submit();
        }
    });
});
</script>
@endpush
