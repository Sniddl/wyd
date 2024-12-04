<form class="space-y-4" wire:submit="register">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold">Register</h2>
        <x-button type="submit" primary label="Submit" right-icon="paper-airplane" rounded />
    </div>

    <p>Already have an account? <button wire:click="pageModal('auth.login')" type="button"
            class="text-primary-500 font-bold hover:underline">Login!</button></p>

    <x-input label="Invite Code" placeholder="WYD-XXXX-XXXXX" wire:model="form.invite" :readonly="!!$this->form->invite"
        :disabled="!!$this->form->invite" />

    <x-input label="Display name" placeholder="Powder" wire:model="form.name" />

    <x-input label="Email" placeholder="jinx@example.com" wire:model="form.email" />

    <x-input label="Username" placeholder="lol_jinx" prefix="@" wire:model="form.username" />

    <div class="grid grid-cols-2 gap-4">
        <x-input label="Password" type="password" wire:model="form.password" />
        <x-input label="Confirm Password" type="password" wire:model="form.password_confirmation" />
    </div>
</form>
