<div>
    <ul
        class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
        <li class="flex items-center py-3">
            <span>Number of feedbacks</span>
            <span class="ml-auto"><span
                    class="bg-green-500 py-1 px-2 rounded text-white text-sm">{{ $feedbackCount }}</span></span>
        </li>
        <li class="flex items-center py-3">
            <span>Member since</span>
            <span class="ml-auto">{{ Auth::user()->created_at }}</span>
        </li>
    </ul>
</div>
