@extends('layouts.backoffice')

@section('title', 'Company Details - Job Board')

@section('page-title', 'Company Details')

@section('content')

    <div class="w-full">

        <div class="rounded-xl border border-slate-200 bg-white shadow-sm">

            <div class="flex items-center justify-between border-b border-slate-200 px-6 py-5">

                <div>

                    <h2 class="text-lg font-semibold text-slate-800">
                        {{ $company->name }}
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Company information and details.
                    </p>

                </div>

                <a href="{{ route('companies.edit', $company) }}"
                    class="rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-medium text-white transition hover:bg-blue-700">
                    Edit
                </a>

            </div>

            <div class="grid gap-6 p-6 md:grid-cols-2">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Company Name
                    </p>

                    <p class="mt-1 text-sm text-slate-800">
                        {{ $company->name }}
                    </p>
                </div>

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Industry
                    </p>

                    <p class="mt-1 text-sm text-slate-800">
                        {{ $company->industry }}
                    </p>
                </div>

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Address
                    </p>

                    <p class="mt-1 text-sm text-slate-800">
                        {{ $company->address }}
                    </p>
                </div>

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Website
                    </p>

                    @if ($company->website)
                        <a href="{{ $company->website }}" target="_blank"
                            class="mt-1 inline-block text-sm text-blue-600 hover:text-blue-800">
                            {{ $company->website }}
                        </a>
                    @else
                        <p class="mt-1 text-sm text-slate-400">
                            Not provided
                        </p>
                    @endif
                </div>

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        User ID
                    </p>

                    <p class="mt-1 text-sm text-slate-800">
                        {{ $company->user_id }}
                    </p>
                </div>

            </div>

            <div class="border-t border-slate-200 px-6 py-4">

                <a href="{{ route('companies.index') }}"
                    class="text-sm font-medium text-slate-600 transition hover:text-slate-900">
                    ← Back to Companies
                </a>

            </div>

        </div>

    </div>

@endsection
