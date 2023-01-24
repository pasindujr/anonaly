@section('title', 'Register')

<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg md:w-1/3 lg:w-1/3 sm:w-1/3">
        <h3 class="text-2xl font-bold text-center">Join us</h3>
        <form wire:submit.prevent="handleRegister" enctype="multipart/form-data">

            @if($error)
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4"
                     role="alert">
                    <span class="block sm:inline">{{ $error }}</span>
                </div>
            @endif

            @if(session()->has('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4"
                     role="alert">
                    <span class="block sm:inline">{{ session()->get('success') }}</span>
                </div>
            @endif

            @if(Session::get('register-fail'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4"
                     role="alert">
                    <span class="block sm:inline">{{ Session::get('register-fail') }}</span>
                </div>
            @endif

            @csrf
            <div class="mt-4">
                <div>
                    <label class="block" for="Name">Display Name</label>
                    <input type="text" placeholder="Display name"
                           class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                           wire:model="name">
                    <span class="text-red-800"> @error('name') {{ $message }} @enderror</span>
                </div>
                <div class="mt-4">
                    <label class="block" for="email">User Name</label>
                    <input type="text" placeholder="User name"
                           class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                           wire:model="username">
                    <span class="text-red-800"> @error('username') {{ $message }} @enderror</span>
                </div>

                <div class="mt-4">
                    <label class="block" for="gender">Gender</label>
                    <select id="gender"
                            class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                            wire:model="gender">
                        <option value="">Please select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                    <span class="text-red-800"> @error('gender') {{ $message }} @enderror</span>
                </div>

                <div class="mt-4">
                    <label class="block" for="email">Profile Photo</label>
                    <input type="file"
                           class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                           wire:model="photo">
                    <span class="text-red-800"> @error('photo') {{ $message }} @enderror</span>
                </div>

                <div class="mt-4">
                    <label class="block" for="email">Email</label>
                    <input type="text" placeholder="Email"
                           class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                           wire:model="email">
                    <span class="text-red-800"> @error('email') {{ $message }} @enderror</span>
                </div>
                <div class="mt-4">
                    <label class="block">Password</label>
                    <input type="password" placeholder="Password"
                           class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                           wire:model="password">
                    <span class="text-red-800"> @error('password') {{ $message }} @enderror</span>
                </div>

                <div class="mt-4">
                    <label class="block">Confirm Password</label>
                    <input type="password" placeholder="Confirm Password"
                           class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                           wire:model="confirmPassword">
                    <span class="text-red-800"> @error('confirmPassword') {{ $message }} @enderror</span>
                </div>

                <div class="flex">
                    <button type="submit"
                            class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Create
                        Account
                    </button>
                </div>
                <div class="mt-6 text-grey-dark">
                    Already have an account?
                    <a class="text-blue-600 hover:underline" href="{{ route('auth.login') }}">
                        Log in
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
