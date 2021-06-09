@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Semua Cucu Anda
                    </div>
                    <div class="card-body">
                        <a href="{{ route('grandchild.create') }}" class="btn btn-primary mb-3">INPUT CUCU BARU</a>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Nama Orang Tua</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($grandchilds as $child)
                                        <tr>
                                            <td>{{ $loop->iteration + $grandchilds->firstItem() - 1 . '.' }}</td>
                                            <td>{{ $child->name }}</td>
                                            <td>{!! $child->GenderDefinition !!}</td>
                                            <td>{{ $child->child->name }}</td>
                                            <td>
                                                <a href="{{ route('grandchild.edit', $child->id) }}" style="float: left" class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('grandchild.destroy', $child->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm ml-1" onclick="return confirm('Anda Yakin Ingin Menghapus Data?');">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <th colspan="5" style="color: red; text-align: center;">Data Kosong.</th>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $grandchilds->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
