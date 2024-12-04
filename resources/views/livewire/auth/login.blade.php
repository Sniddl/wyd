<form class="space-y-4" wire:submit="login">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold">Login</h2>
        <x-button type="submit" primary label="Submit" right-icon="paper-airplane" rounded spinner />
    </div>

    <p>Do not have an account? <button wire:click="pageModal('auth.register')"
            class="text-primary-500 font-bold hover:underline">Register!</button></p>

    <x-input label="Email or username" placeholder="jinx@example.com" wire:model="form.identifier" />

    <x-input label="Password" type="password" wire:model="form.password" />

</form>
