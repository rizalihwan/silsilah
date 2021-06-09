@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header justify-content-between d-flex">
                        <div>
                            <a href="{{ route('child.create') }}" class="btn btn-primary">INPUT ANAK BARU</a>
                        </div>
                        <div>
                            Semua Anak Anda
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($childs as $child)
                                        <tr>
                                            <td>{{ $loop->iteration + $childs->firstItem() - 1 . '.' }}</td>
                                            <td>{{ $child->name }}</td>
                                            <td>{!! $child->GenderDefinition !!}</td>
                                            <td>
                                                <a href="{{ route('child.edit', $child->id) }}" style="float: left" class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('child.destroy', $child->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm ml-1" onclick="return confirm('Anda Yakin Ingin Menghapus Data?');">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <th colspan="4" style="color: red; text-align: center;">Data Kosong.</th>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $childs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
