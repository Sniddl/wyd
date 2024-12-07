<x-layout.page>
    <div class="space-y-2">
        <div class="flex items-center justify-end">
            <x-button class="!py-1 !px-3 !gap-x-1 bg-white" label="Create" rounded icon="plus" outline gray
                interaction="primary" />

        </div>
        <div class="divide-y border">
            @for ($i = 0; $i < 10; $i++)
                <x-guild.distinct :join="false" />
            @endfor
        </div>
    </div>

</x-layout.page>
