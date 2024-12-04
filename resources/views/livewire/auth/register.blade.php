<div class="space-y-4">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold">Register</h2>
        <x-button primary label="Submit" right-icon="paper-airplane" rounded />
    </div>

    <p>Already have an account? <button wire:click="pageModal('auth.login')"
            class="text-primary-500 font-bold hover:underline">Login!</button></p>

    <x-input label="Invite Code" placeholder="WYD-XXXX-XXXXX" />

    <x-input label="Display name" placeholder="Powder" />

    <x-input label="Email" placeholder="jinx@example.com" />

    <x-input label="Username" placeholder="lol_jinx" prefix="@" />

    <div class="grid grid-cols-2 gap-4">
        <x-input label="Password" type="password" />
        <x-input label="Confirm Password" type="password" />
    </div>
</div>
