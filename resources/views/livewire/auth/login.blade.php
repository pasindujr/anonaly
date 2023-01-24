@section('title', 'Login')

<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg md:w-1/3 lg:w-1/3 sm:w-1/3">
        <h3 class="text-2xl font-bold text-center">Log in</h3>
        <form wire:submit.prevent="handleLogin">

            @if($error)
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4"
                     role="alert">
                    <span class="block sm:inline">{{ $error }}</span>
                </div>
            @endif

            @csrf
            <div class="mt-4">
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
                <div class="flex">
                    <button type="submit"
                            class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Login
                    </button>
                </div>
                <div class="mt-6 text-grey-dark">
                    Don't have an account?
                    <a class="text-blue-600 hover:underline" href="{{ route('auth.register') }}">
                        Create one
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
