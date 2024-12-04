<div class="space-y-4">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold">Login</h2>
        <x-button primary label="Submit" right-icon="paper-airplane" rounded wire:click="login" spinner />
    </div>

    <p>Do not have an account? <button wire:click="pageModal('auth.register')"
            class="text-primary-500 font-bold hover:underline">Register!</button></p>

    <x-input label="Email or username" placeholder="jinx@example.com" wire:model="form.identifier" />

    <x-input label="Password" type="password" wire:model="form.password" />

    <x-icon name="arrow-path" class="w-8 h-8 animate-spin" />

</div>
