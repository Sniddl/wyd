<div class="space-y-6">
    <div class="text-center">
        <h2 class="font-bold text-2xl">
            WYD.GG Invitation
        </h2>
        <p>You are invited! Scan to join WYD.GG!</p>
    </div>


    <div class="flex items-center justify-center">
        {!! QrCode::format('svg')->size(256)->generate($this->link) !!}
    </div>

    <div class="text-center">
        @env(['staging', 'local'])
        <a href="{{ $this->link }}" class="font-bold text-primary-500 hover:underline">Open in current browser.</a>
        <div>
            <p>Open in incognito.</p>
        </div>
        @endenv
    </div>

</div>
