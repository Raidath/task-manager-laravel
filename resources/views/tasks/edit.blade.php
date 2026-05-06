@extends('layouts.app-bootstrap')

@section('content')

<link href="{{ asset('css/tasks.css') }}" rel="stylesheet">

<div class="container">

    <div class="card">

        <div class="card-header">
            ✏️ Modifier la tâche
        </div>

        <div class="card-body">

            <h5>Mise à jour de la tâche</h5>

            <form action="{{ route('tasks.update', $task->id) }}" method="POST">

                @csrf
                @method('PUT')

                {{-- TITLE --}}
                <div class="form-group mb-3">
                    <label>Titre *</label>
                    <input type="text"
                           class="form-control"
                           name="title"
                           value="{{ $task->title }}">
                </div>

                {{-- DESCRIPTION --}}
                <div class="form-group mb-3">
                    <label>Description</label>
                    <textarea class="form-control"
                              name="description">{{ $task->description }}</textarea>
                </div>

                {{-- STATUS --}}
                <div class="form-group mb-3">
                    <label>Statut *</label>

                    <select name="status" class="form-control">

                        <option value="pending"
                            {{ $task->status == 'pending' ? 'selected' : '' }}>
                            En cours
                        </option>

                        <option value="done"
                            {{ $task->status == 'done' ? 'selected' : '' }}>
                            Terminée
                        </option>

                    </select>
                </div>

                {{-- DATE --}}
                <div class="form-group mb-3">
                    <label>Date d’échéance</label>

                    <input type="date"
                           class="form-control"
                           name="due_date"
                           value="{{ $task->due_date }}">
                </div>

                {{-- BUTTON --}}
                <button type="submit" class="btn btn-primary">
                    🔄 Mettre à jour
                </button>

                <a href="{{ route('tasks.index') }}" class="btn btn-danger">
                    Retour
                </a>

            </form>

        </div>

    </div>

</div>

@endsection
