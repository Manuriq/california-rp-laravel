<div>
    <input wire:model.debounce.300ms="search" type="search" placeholder="Rechercher un forum" class="w-full bg-gray-700 text-sm text-gray-300 transition border border-gray-800 focus:outline-none focus:border-gray-600 rounded py-2 px-3 pl-5 mb-3 appearance-none leading-normal">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-50 uppercase bg-gray-700 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th wire:click="setOrderField('title')" scope="col" class="px-6 py-3">
                    Titre
                </th>
                <th wire:click="setOrderField('desc')" scope="col" class="px-6 py-3">
                    Description
                </th>
                <th wire:click="setOrderField('order')" scope="col" class="px-6 py-3">
                    Ordre
                </th>
                <th wire:click="setOrderField('state')" scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Supprimer</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($forums as $forum)
            <tr class="bg-gray-800 border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-white dark:text-white whitespace-nowrap">
                    {{ $forum->title }}
                </th>
                <td class="px-6 py-4">
                    {{ $forum->desc }}
                </td>
                <td class="px-6 py-4">
                    {{ $forum->order }}
                </td>
                <td class="px-6 py-4">
                    {{ $forum->state }}
                </td>
                <td class="px-6 py-4 text-right">
                    <button wire:click="startEdit({{ $forum->id }})" class="bg-blue-400 text-white px-4 py-2 rounded-md hover:bg-blue-500 transition duration-300">Editer</button>
                </td>
                <td class="px-6 py-4 text-right">
                    <button wire:click="startDelete({{ $forum->id }})" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-300">Supprimer</button>
                </td>
            </tr>
            @if ($editId === $forum->id)
            <tr class="border-b">
                <livewire:forum-form :forum="$forum" :key="$forum->id"/>
            </tr>     
            @endif
            @endforeach
        </tbody>
    </table>
    {{ $forums->links() }}
</div>
