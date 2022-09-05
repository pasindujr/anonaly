<div>
    <!-- feedbacks -->
    <div class="bg-white p-3 shadow-sm rounded-sm">

        <div class="grid grid-cols-2">
            <div>
                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </span>
                    <span class="tracking-wide">Feedbacks</span>
                </div>
                <ul class="list-inside space-y-2 mb-4">
                    @foreach($userFeedbacks as $userFeedback)
                        <li>
                            <div class="text-teal-600">{{ $userFeedback->feedback }}</div>
                            <div class="text-gray-500 text-xs">Posted on {{ $userFeedback->created_at }}</div>
                            <div>
                                <a wire:click="deleteFeedback({{ $userFeedback->id }})">
                                    <button type="submit"
                                            class="flex items-center text-grey hover:bg-black-500 p-2 rounded text-sm w-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
                {{ $userFeedbacks->links() }}
            </div>
        </div>
        <!-- End of feedbacks grid -->
    </div>
    <!-- End of profile tab -->
</div>
