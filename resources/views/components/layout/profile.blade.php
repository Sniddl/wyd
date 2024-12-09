<x-layout.page>
    <div class="relative pt-[33.3333%]">
        <div class=" relative py-6">
            <div class="flex items-center justify-end px-[5%] ">
                <x-button label="Edit profile" outline rounded gray />
            </div>
            <div class="mt-8 leading-tight">
                <h2 class="text-2xl font-bold">{{ $this->user->name }}</h2>
                <h3 class=" opacity-50"><span>@</span>{{ $this->user->username }}</h3>
            </div>





            <div>
                <div class="border-b border-gray-200">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                        <a href="{{ route('profile', $this->user) }}" wire:navigate
                            class="group inline-flex items-center border-b-2 border-transparent px-1 py-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                            <span>Posts</span>
                        </a>
                        <a href="{{ route('profile.replies', $this->user) }}" wire:navigate
                            class="group inline-flex items-center border-b-2 border-transparent px-1 py-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                            <span>Replies</span>
                        </a>

                    </nav>
                </div>
            </div>



            {{ $slot }}
        </div>
        <div class="absolute top-0">
            <img
                src="https://fastly.picsum.photos/id/816/1500/500.jpg?hmac=4NVI3Yysk2eGY_DT3KeaDluOW50IIqsIpN_SHH8nFn8" />
            <img class="absolute hover:z-20 focus:z-20 avatar cursor-pointer w-[25%] ml-[5%] -translate-y-1/2 rounded-full border-4 border-gray-50"
                src="https://fastly.picsum.photos/id/154/200/200.jpg?hmac=ljiYfN3Am3TR0-aMErtWNuSQm8RTYarrv2QJfmWG6Cw" />
        </div>
    </div>
</x-layout.page>
