<td colspan="6" class="px-6 py-4">
<form action="" wire:submit.prevent="save">
        <input class="w-full p-2 rounded-md border border-gray-700 ml-auto mr-auto mt-2" placeholder="Titre"
        type="text" wire:model.defer="forum.title" required>
        @error("forum.title")
            <p class="text-red-500 text-xs italic">{{ $message }}.</p>
        @enderror
        <textarea class="w-full p-2 rounded-md border border-gray-700 ml-auto mr-auto mt-2" name="desc"
        placeholder="Description" id="" cols="30" rows="10" wire:model.defer="forum.desc"required></textarea>
        @error("forum.desc")
            <p class="text-red-500 text-xs italic">{{ $message }}.</p>
        @enderror
        <input class="w-full p-2 rounded-md border border-gray-700 ml-auto mr-auto mt-2" placeholder="Ordre"
        type="text" wire:model.defer="forum.order" required>
        @error("forum.order")
            <p class="text-red-500 text-xs italic">{{ $message }}.</p>
        @enderror        
        <button class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition duration-300 mt-2" type="submit" wire:loading.attr="disabled">Sauvegarder</button>
</form>
</td>

