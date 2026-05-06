@extends('layouts.app-bootstrap')

@section('content')

<div class="container">

    <div class="card">


<div class="mb-4 d-flex justify-content-between align-items-center">
    <h2 class="fw-bold">📋 Mes Tâches</h2>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary">
        ➕ Nouvelle tâche
    </a>
</div>

{{-- FILTRES --}}
<div class="gap-2 mb-3 d-flex">

    <a href="{{ route('tasks.index') }}"
       class="btn btn-sm {{ !request('status') ? 'btn-secondary' : 'btn-outline-secondary' }}">
        Toutes
    </a>

    <a href="{{ route('tasks.index', ['status' => 'pending']) }}"
       class="btn btn-sm {{ request('status') == 'pending' ? 'btn-warning' : 'btn-outline-warning' }}">
        En cours
    </a>

    <a href="{{ route('tasks.index', ['status' => 'done']) }}"
       class="btn btn-sm {{ request('status') == 'done' ? 'btn-success' : 'btn-outline-success' }}">
        Terminées
    </a>

</div>

        <div class="card-body">

            {{-- CSS (idéalement dans layout, mais optionnel ici) --}}
            <link href="{{ asset('css/index.css') }}" rel="stylesheet">

            {{-- BUTTON ADD --}}
           

            {{-- SUCCESS MESSAGE --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <hr>

            {{-- TABLE --}}
            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Statut</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                @foreach ($tasks as $task)
                    <tr>

                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>

                        <td>
                            @if($task->status == 'done')
                                <span class="badge bg-success">Terminée</span>
                            @else
                                <span class="badge bg-warning text-dark">En cours</span>
                            @endif
                        </td>

                        <td>{{ $task->due_date }}</td>

                        <td class="gap-2 d-flex">

                            {{-- EDIT --}}
                            <a href="{{ route('tasks.edit', $task) }}"
                               class="btn btn-primary btn-sm">
                                Modifier
                            </a>

                            {{-- DELETE --}}
                            <form action="{{ route('tasks.destroy', $task) }}"
                                  method="POST"
                                  onsubmit="return confirmDelete()">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm">
                                     Supprimer
                                </button>

                            </form>

                        </td>

                    </tr>
                @endforeach

                </tbody>

            </table>

        </div>
    </div>

</div>

{{-- JS CONFIRM DELETE --}}
<script>
    function confirmDelete() {
        return confirm("Êtes-vous sûr de vouloir supprimer cette tâche ?");
    }
</script>

@endsection
