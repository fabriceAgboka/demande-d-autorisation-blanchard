@extends('layout.default', ['permission' => 'read'])

@section('title', 'Administrateurs')

@section('styles')
@endsection

@section('content')
    <div class="mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
            Ajouter
        </button>
    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Liste des administrateurs</h4>
        </div>
        <div class="table-responsive">
            <table class="table table-hover" id="data-table-users-liste">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom et prénom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Profil</th>
                        <th>Date création</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($entities as $key => $entity)
                        <tr>
                            <td>{{ $entities->perPage() * ($entities->currentPage() - 1) + $loop->iteration }}</td>
                            <td>{{ $entity->fullname() ?? '--' }}</td>
                            <td>{{ $entity->email ?? '--' }}</td>
                            <td>{{ $entity->phone ?? '--' }}</td>
                            <td>Profil</td>
                            <td>{{ $entity->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="container">
                {{ $entities->links() }}
            </div>

            @if ($entities->count() == 0)
                <div class="container">
                    <p class="text-center">Le tableau vide</p>
                </div>
            @endif
        </div>
    </div>

    @include('pages.users.create')
    @include('pages.users.update')
@endsection

@section('scripts')
    {{-- Page js files --}}

@endsection
