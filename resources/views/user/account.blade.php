<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Account</title>
</head>
<body>
<!-- component -->
<div class="max-w-7xl mx-auto">
    <div class="inline-block min-w-full py-2 align-middle">
        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">


            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">#
                    </th>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Field</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Info</th>

                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                <tr>
                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 sm:pl-6">1</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Name</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm">
                        {{ $userData->name }}
                    </td>

                </tr>

                <tr>
                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 sm:pl-6">2</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Username</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm">
                        {{ $userData->username }}
                    </td>
                </tr>
                <tr>
                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 sm:pl-6">2</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Email</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm">
                        {{ $userData->email }}
                    </td>
                </tr>

                <tr>
                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 sm:pl-6">2</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Gender</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm">
                        {{ $userData->gender }}
                    </td>
                </tr>
                <tr>
                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 sm:pl-6">2</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Action</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm">
                        <a href="{{ route('auth.logout') }}">Logout</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
