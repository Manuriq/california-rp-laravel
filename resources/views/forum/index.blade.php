@extends("layouts.dashboard")

@section("content")
<div>
    <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-100 leading-normal">
        <div class="w-full md:w-1/2 xl:w-3/4 p-3 ml-auto mr-auto">
            <!--Template Card-->
            <div class="bg-gray-900 border border-gray-800 rounded shadow">
                <div class="border-b border-gray-800 p-3">
                    <h5 class="font-bold uppercase">Admin Panel - Gestion Forums <a href="{{ route("forum.create") }}"><button class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-800 transition duration-300">Ajouter</button></a></h5>
                </div>
                <div class="p-5 text-center">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-50 uppercase bg-gray-700 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Titre
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Description
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Ordre
                                    </th>
                                    <th scope="col" class="px-6 py-3">
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
                                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="#" class="font-medium text-red-600 dark:text-blue-500 hover:underline">Supprimer</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--/Template Card-->
        </div>            
    <!--/ Console Content-->       
    </div>
</div>
@endsection