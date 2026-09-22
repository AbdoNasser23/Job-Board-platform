@extends('layouts.backoffice')

@section('title', 'Edit Company - Job Board')

@section('page-title', 'Edit Company')

@section('content')

    <div class="w-full">

        <div class="rounded-xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-200 px-6 py-5">

                <h2 class="text-lg font-semibold text-slate-800">
                    Edit Company
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Update the company information.
                </p>

            </div>

            <form action="{{ route('companies.update', $company) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="grid gap-6 p-6 md:grid-cols-2">

                    <div>

                        <label for="name" class="mb-2 block text-sm font-medium text-slate-700">
                            Company Name
                        </label>

                        <input type="text" id="name" name="name"
                            value="{{ old('name', $company->name) }}"
                            placeholder="Enter company name"
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 @error('name') border-red-500 focus:border-red-500 focus:ring-red-100 @enderror">

                        @error('name')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <div>

                        <label for="industry" class="mb-2 block text-sm font-medium text-slate-700">
                            Industry
                        </label>

                        <input type="text" id="industry" name="industry"
                            value="{{ old('industry', $company->industry) }}"
                            placeholder="Enter industry"
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 @error('industry') border-red-500 focus:border-red-500 focus:ring-red-100 @enderror">

                        @error('industry')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <div>

                        <label for="address" class="mb-2 block text-sm font-medium text-slate-700">
                            Address
                        </label>

                        <input type="text" id="address" name="address"
                            value="{{ old('address', $company->address) }}"
                            placeholder="Enter company address"
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 @error('address') border-red-500 focus:border-red-500 focus:ring-red-100 @enderror">

                        @error('address')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <div>

                        <label for="website" class="mb-2 block text-sm font-medium text-slate-700">
                            Website
                        </label>

                        <input type="url" id="website" name="website"
                            value="{{ old('website', $company->website) }}"
                            placeholder="https://example.com"
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 @error('website') border-red-500 focus:border-red-500 focus:ring-red-100 @enderror">

                        @error('website')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>

                <div class="flex items-center justify-end gap-3 border-t border-slate-200 px-6 py-4">

                    <a href="{{ route('companies.index') }}"
                        class="rounded-lg border border-slate-300 px-5 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-slate-50">
                        Cancel
                    </a>

                    <button type="submit"
                        class="rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-blue-700">
                        Update Company
                    </button>

                </div>

            </form>

        </div>

    </div>

@endsection
