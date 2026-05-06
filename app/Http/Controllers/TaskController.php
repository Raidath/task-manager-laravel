<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // Méthode privée pour éviter la répétition du @var
    private function getAuthUser(): \App\Models\User
    {
        /** @var \App\Models\User */
        return Auth::user();
    }

    // Liste des tâches de l'utilisateur connecté
    public function index(Request $request)
    {
        $status = $request->query('status');
        $tasks = $this->getAuthUser()->tasks()
            ->byStatus($status)
            ->orderBy('due_date')
            ->get();

        return view('tasks.index', compact('tasks', 'status'));
    }

    // Formulaire création
    public function create()
    {
        return view('tasks.create');
    }

    // Enregistrer une tâche
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|in:pending,done',
            'due_date'    => 'nullable|date',
        ]);

        $this->getAuthUser()->tasks()->create([
            'title'       => $request->title,
            'description' => $request->description,
            'status'      => $request->status,
            'due_date'    => $request->due_date,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tâche créée avec succès !');
    }

    // Formulaire édition
    public function edit(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        return view('tasks.edit', compact('task'));
    }

    // Mise à jour
    public function update(Request $request, Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|in:pending,done',
            'due_date'    => 'nullable|date',
        ]);

        $task->update($request->only(['title', 'description', 'status', 'due_date']));

        return redirect()->route('tasks.index')->with('success', 'Tâche mise à jour !');
    }

    // Suppression
    public function destroy(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée !');
    }
}
