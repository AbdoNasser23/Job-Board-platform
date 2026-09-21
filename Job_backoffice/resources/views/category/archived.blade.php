@extends('layouts.backoffice')

@section('title', 'Archived Categories - Job Board')

@section('page-title', 'Archived Categories')

@section('content')

    <div class="space-y-6">

        <div class="flex justify-end">

            <a href="{{ route('categories.index') }}"
                class="inline-flex items-center gap-2 rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm font-medium text-slate-700 transition hover:bg-slate-50">

                <svg xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.8"
                    stroke="currentColor"
                    class="h-4 w-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>

                Back to Categories
            </a>

        </div>

        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

            <table class="w-full">

                <thead class="border-b border-slate-200 bg-slate-50">

                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">
                            Category
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">
                            Actions
                        </th>
                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-200">

                    @forelse ($categories as $category)

                        <tr class="transition hover:bg-slate-50">

                            <td class="px-6 py-4 text-sm text-slate-700">
                                {{ $category->name }}
                            </td>

                            <td class="px-6 py-4">

                                <form action="{{ route('categories.restore', $category->id) }}" method="POST">

                                    @csrf
                                    @method('PATCH')

                                    <button type="submit"
                                        class="inline-flex items-center gap-2 text-sm font-medium text-green-600 transition hover:text-green-800">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.8"
                                            stroke="currentColor"
                                            class="h-4 w-4">
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M9 15 4.5 10.5m0 0L9 6m-4.5 4.5H15a4.5 4.5 0 1 1 0 9h-1.5" />
                                        </svg>

                                        Restore

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="2" class="px-6 py-10 text-center text-sm text-slate-500">
                                No archived categories found.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-6">
        {{ $categories->links() }}
    </div>

@endsection
