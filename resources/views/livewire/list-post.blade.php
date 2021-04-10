<div>
    @foreach ($posts as $post)
        <div class="p-4 my-3 bg-white shadow-xl rounded-ms">
            <div>
                <span class="text-xl text-bold">{{ $post->user->name }}</span>
                <span class="text-gray-600 mr-2"> {{ $post->created_at->diffForHumans() }} </span>
                <button 
                wire:click="showUpdateForm({{ $post->id }})" 
                class="inline-flex border border-transparent rounded-md text-gray-600 hover:text-white hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                      </svg>
                </button>
                <button
                onclick="return confirm('Apakah anda Yakin?') || event.stopImmediatePropagation()"
                    wire:click="delete({{ $post->id }})"
                    class="inline-flex border border-transparent rounded-md text-red-600 hover:text-white hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                </button>
            </div>
            <div>
                @if ($updateStateId == $post->id)  
                    <div class="mt-1">
                        <textarea 
                        wire:model="body" 
                        rows="2" 
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                        <button wire:click="update({{ $post->id }})" class="inline-flex justify-center my-2 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                          </button>
                    </div>

                @else
                    <span>{{ $post->body }}</span>
                @endif
            </div>
        </div>
    @endforeach
</div>
