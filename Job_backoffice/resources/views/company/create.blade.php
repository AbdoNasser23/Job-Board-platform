@extends('layouts.backoffice')

@section('title', 'Create Company - Job Board')

@section('page-title', 'Create Company')

@section('content')

    <div class="w-full">

        <div class="rounded-xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-200 px-6 py-5">

                <h2 class="text-lg font-semibold text-slate-800">
                    Create Company
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Create a new company for the job board.
                </p>

            </div>

            <form action="{{ route('companies.store') }}" method="POST">

                @csrf

                <div class="grid gap-6 p-6 md:grid-cols-2">

                    {{-- Company Name --}}
                    <div>

                        <label for="name" class="mb-2 block text-sm font-medium text-slate-700">
                            Company Name
                        </label>

                        <input type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Enter company name"
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 @error('name') border-red-500 focus:border-red-500 focus:ring-red-100 @enderror">

                        @error('name')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Company Owner --}}
                    <div>

                        <label for="user_id" class="mb-2 block text-sm font-medium text-slate-700">
                            Company Owner
                        </label>

                        <select id="user_id"
                            name="user_id"
                            class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100 @error('user_id') border-red-500 focus:border-red-500 focus:ring-red-100 @enderror">

                            <option value="">
                                Select company owner
                            </option>

                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"
                                    {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }} - {{ $user->email }}
                                </option>
                            @endforeach

                        </select>

                        @error('user_id')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Industry --}}
                    <div>

                        <label for="industry" class="mb-2 block text-sm font-medium text-slate-700">
                            Industry
                        </label>

                        <input type="text"
                            id="industry"
                            name="industry"
                            value="{{ old('industry') }}"
                            placeholder="Enter industry"
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 @error('industry') border-red-500 focus:border-red-500 focus:ring-red-100 @enderror">

                        @error('industry')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Address --}}
                    <div>

                        <label for="address" class="mb-2 block text-sm font-medium text-slate-700">
                            Address
                        </label>

                        <input type="text"
                            id="address"
                            name="address"
                            value="{{ old('address') }}"
                            placeholder="Enter company address"
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 @error('address') border-red-500 focus:border-red-500 focus:ring-red-100 @enderror">

                        @error('address')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Website --}}
                    <div>

                        <label for="website" class="mb-2 block text-sm font-medium text-slate-700">
                            Website
                        </label>

                        <input type="url"
                            id="website"
                            name="website"
                            value="{{ old('website') }}"
                            placeholder="https://example.com"
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 @error('website') border-red-500 focus:border-red-500 focus:ring-red-100 @enderror">

                        @error('website')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>


                {{-- Actions --}}
                <div class="flex items-center justify-end gap-3 border-t border-slate-200 px-6 py-4">

                    <a href="{{ route('companies.index') }}"
                        class="rounded-lg border border-slate-300 px-5 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-slate-50">
                        Cancel
                    </a>

                    <button type="submit"
                        class="rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-blue-700">
                        Save Company
                    </button>

                </div>

            </form>

        </div>

    </div>

@endsection
