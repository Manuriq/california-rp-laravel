<div>
    <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-100 leading-normal">
        <div class="w-full md:w-1/2 xl:w-3/4 p-3 ml-auto mr-auto">
            <!--Template Card-->
            <div class="bg-gray-900 border border-gray-800 rounded shadow">
                <div class="border-b border-gray-800 p-3">
                    <h5 class="font-bold uppercase">Paramètrez votre compte</h5>
                </div>
                <div class="p-5 text-center">
                    <form action="" wire:submit.prevent="save">
                        <div class="w-full flex flex-row space-x-4 text-center">
                            <div class="w-1/2 text-center">
                                <div class="flex flex-col">
                                    <label for="cNom">Votre Pseudo:</label>
                                    <input class="w-full xl:w-3/4 p-2 bg-gray-900 rounded-md border border-gray-700 ml-auto mr-auto mt-2" placeholder="Pseudo"
                                    type="text" name="cNom" wire:model="user.cNom" disabled>
                                </div>  
                                <div class="flex flex-col">
                                    <label for="cNom">Votre Mot de passe:</label>
                                    <input class="w-full xl:w-3/4 p-2 bg-gray-900 rounded-md border border-gray-700 ml-auto mr-auto mt-2" placeholder="Mot de Passe"
                                    type="password" name="password" wire:model="user.password">
                                </div>
                            </div>
                            <div class="w-1/2 text-center">
                                <input class="w-full xl:w-3/4 p-2 bg-gray-900 rounded-md border border-gray-700 ml-auto mr-auto mt-2" placeholder="Email"
                                type="email" name="cEmail" wire:model="user.cEmail" disabled>
                            </div>
                        </div>
                        <input class="w-full xl:w-1/2 p-2 bg-gray-50 rounded-full font-bold text-gray-900 border border-gray-700 mt-4"
                        type="submit" value="Envoyer">
                    </form>
                </div>
            </div>
            <!--/Template Card-->
        </div>            
    <!--/ Console Content-->       
    </div>
</div>
