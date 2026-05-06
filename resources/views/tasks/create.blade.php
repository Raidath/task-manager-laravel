@extends('layouts.app-bootstrap')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card">
                <div class="card-header">
                    ➕ Ajouter une tâche
                </div>

                <div class="card-body">

                    <h6>
                        Les champs avec <span class="text-danger">*</span> sont obligatoires
                    </h6>

                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf

                        {{-- TITRE --}}
                        <div class="mb-3 form-group">
                            <label>Titre *</label>
                            <input type="text"
                                   name="title"
                                   class="form-control @error('title') is-invalid @enderror"
                                   value="{{ old('title') }}"
                                   required>

                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- DESCRIPTION --}}
                        <div class="mb-3 form-group">
                            <label>Description</label>
                            <textarea name="description"
                                      class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>

                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- STATUS --}}
                        <div class="mb-3 form-group">
                            <label>Statut *</label>
                            <select name="status"
                                    class="form-control @error('status') is-invalid @enderror"
                                    required>

                                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>
                                    En cours
                                </option>

                                <option value="done" {{ old('status') == 'done' ? 'selected' : '' }}>
                                    Terminée
                                </option>
                            </select>

                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- DATE --}}
                        <div class="mb-4 form-group">
                            <label>Date d’échéance</label>
                            <input type="date"
                                   name="due_date"
                                   class="form-control @error('due_date') is-invalid @enderror"
                                   value="{{ old('due_date') }}">

                            @error('due_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- BUTTONS --}}
                        <button type="submit" class="btn btn-primary">
                            💾 Enregistrer
                        </button>

                        <a href="{{ route('tasks.index') }}" class="btn btn-danger">
                            Retour
                        </a>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
