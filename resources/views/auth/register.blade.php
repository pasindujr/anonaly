<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Register</title>
</head>
<body>

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
        <h3 class="text-2xl font-bold text-center">Join us</h3>
        <form method="post" action="{{ route('auth.save') }}">

            @if(Session::get('register-success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4"
                     role="alert">
                    <span class="block sm:inline">{{ Session::get('register-success') }}</span>
                </div>
            @endif

            @if(Session::get('register-fail'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4" role="alert">
                    <span class="block sm:inline">{{ Session::get('register-fail') }}</span>
                </div>
            @endif

            @csrf
            <div class="mt-4">
                <div>
                    <label class="block" for="Name">Display Name</label>
                    <input type="text" placeholder="Display name" name="name"
                           class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                           value="{{ old('name') }}">
                    <span class="text-red-800"> @error('name') {{ $message }} @enderror</span>
                </div>
                <div class="mt-4">
                    <label class="block" for="email">User Name</label>
                    <input type="text" placeholder="User name" name="username"
                           class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                           value="{{ old('username') }}">
                    <span class="text-red-800"> @error('username') {{ $message }} @enderror</span>
                </div>

                <div class="mt-4">
                    <label class="block" for="gender">Gender</label>
                    <select id="gender" name="gender"
                            class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                        <option @if(!old('gender')) selected @endif  value="">Please select</option>
                        <option @if(old('gender') == 'male') selected @endif value="male">Male</option>
                        <option @if(old('gender') == 'female') selected @endif value="female">Female</option>
                        <option @if(old('gender') == 'other') selected @endif value="other">Other</option>
                    </select>
                    <span class="text-red-800"> @error('gender') {{ $message }} @enderror</span>
                </div>

                <div class="mt-4">
                    <label class="block" for="email">Email</label>
                    <input type="text" placeholder="Email" name="email"
                           class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                           value="{{ old('email') }}">
                    <span class="text-red-800"> @error('email') {{ $message }} @enderror</span>
                </div>
                <div class="mt-4">
                    <label class="block">Password</label>
                    <input type="password" placeholder="Password" name="password"
                           class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                    <span class="text-red-800"> @error('password') {{ $message }} @enderror</span>
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

</body>
</html>
