@section('title', 'Login')

<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg md:w-1/3 lg:w-1/3 sm:w-1/3">
        <div class="flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-blue-600" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path d="M12 14l9-5-9-5-9 5 9 5z"/>
                <path
                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/>
            </svg>
        </div>
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
