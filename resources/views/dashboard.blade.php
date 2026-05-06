<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
<div class="p-6 text-gray-900 dark:text-gray-100">

    <p class="mb-4">
        {{ __("You're logged in!") }}
    </p>

    <div class="flex gap-4">

        <!-- Mes tâches -->
        <a href="{{ route('tasks.index') }}"
           class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">
            📋 Mes tâches
        </a>

        <!-- Ajouter tâche -->
        <a href="{{ route('tasks.create') }}"
           class="px-4 py-2 text-white bg-green-600 rounded hover:bg-green-700">
            ➕ Ajouter une tâche
        </a>

    </div>

</div>
            </div>
        </div>
    </div>
</x-app-layout>
