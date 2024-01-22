@extends('layouts.layout')
@section('content')
    <div class="container mx-auto py-4 flex justify-between gap-3">

        <div class="md:w-60 w-full">
            <ul class="tabs">
                <li class="tab p-2 rounded-md bg-white cursor-pointer" onclick="showTab('tab1')"><i
                        class="fa-solid fa-user me-2"></i> Profile
                </li>
                <li class="tab p-2 rounded-md cursor-pointer" onclick="showTab('tab2')"><i class="fa-solid fa-lock me-2"></i>
                    Account</li>
                <!-- Add more tabs as needed -->
            </ul>
        </div>
        <div class="flex-1">

            <div id="tab1" class="tab-content active ">

                <form method="POST" class="flex flex-col gap-4" action="/users/{{ $user->id }}/update"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="p-6 flex gap-6 flex-col bg-white rounded-md border">
                        <h4 class="font-bold text-base md:text-2xl">User</h4>
                        <div>
                            <label class="text-base font-bold">Name</label>
                            <input class="block border border-gray-200 rounded p-2 w-96 mt-2" type="text"
                                placeholder="Name" name="name" value="{{ $user->name }}" />
                            @error('name')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="text-base font-bold">Email</label>
                            <input class="block border border-gray-200 rounded p-2 w-96 mt-2" type="email"
                                placeholder="Name" name="email" value="{{ $user->email }}" />
                            @error('email')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="text-base font-bold">Profile Image</label>
                            <div class="flex items-center gap-2">
                                <img alt="authProfile"
                                    src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('/images/no-image.jpg') }}"
                                    class="w-10 rounded-full h-10" />
                                <input class="block border border-gray-200 rounded p-2 w-96 mt-2" type="file"
                                    name="avatar" />

                            </div>
                            @error('image')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="p-6 flex gap-6 flex-col bg-white rounded-md border">
                        <h4 class="font-bold text-base md:text-2xl">Basic</h4>
                        <div>
                            <label class="text-base font-bold">Location</label>
                            <input class="block border border-gray-200 rounded p-2 w-96 mt-2" type="text"
                                placeholder="Morocco,casablanca" name="location" />
                            @error('location')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="text-base font-bold">Bio</label>
                            <input class="block border border-gray-200 rounded p-2 w-96 mt-2" type="text"
                                placeholder="A short Bio" name="bio" />
                            @error('bio')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="bg-buttonBg text-white rounded-md py-2 px-4">Save</button>
                </form>
            </div>

            <div id="tab2" class="tab-content">
                <form method="POST" class="flex flex-col gap-4" action="/users/{{ $user->id }}/update-password">
                    @csrf
                    @method('put')
                    <div class="p-6 flex gap-6 flex-col bg-white rounded-md border">
                        <h4 class="font-bold text-base md:text-2xl">Set New Password</h4>
                        <div>
                            <label class="text-base font-bold">current Password</label>
                            <input class="block border border-gray-200 rounded p-2 w-96 mt-2" type="password"
                                name="current_password" />
                            @error('password')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="text-base font-bold">Passowrd</label>
                            <input class="block border border-gray-200 rounded p-2 w-96 mt-2" type="password"
                                name="password" />
                            @error('passowrd')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="text-base font-bold">Confirm new password</label>
                            <input class="block border border-gray-200 rounded p-2 w-96 mt-2" type="password"
                                name="password_confirmation" />

                            @error('password_confirmation')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="bg-buttonBg text-white rounded-md py-2 px-4">Save</button>
                </form>
            </div>
        </div>

    </div>
    <script>
        function showTab(tabId) {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(function(tabContent) {
                tabContent.classList.remove('active');
            });

            // Deactivate all tabs
            document.querySelectorAll('.tab').forEach(function(tab) {
                tab.classList.remove("bg-white")
                tab.classList.remove('active');
            });

            // Show the selected tab content
            document.getElementById(tabId).classList.add('active');

            // Activate the clicked tab
            document.querySelector('[onclick="showTab(\'' + tabId + '\')"]').classList.add('active');
        }
    </script>
@endsection
