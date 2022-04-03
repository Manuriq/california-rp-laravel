@extends("layouts.dashboard")

@section("content")
<div>
    <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-100 leading-normal">
        <div class="w-full md:w-1/2 xl:w-3/4 p-3 ml-auto mr-auto">
            <!--Template Card-->
            <div class="bg-gray-900 border border-gray-800 rounded shadow">
                <div class="border-b border-gray-800 p-3">
                    <h5 class="font-bold uppercase">Admin Panel - Gestion Forums - Ajout</h5>
                </div>
                <div class="p-5 text-center">
                    <form action="{{ route('forum.store') }}" method="post">
                        @csrf
                        <input class="w-full xl:w-3/4 p-2 bg-gray-900 rounded-md border border-gray-700 ml-auto mr-auto mt-2" placeholder="Titre"
                        type="text" name="title" value="{{ old('title') }}" required>
                        <textarea class="w-full xl:w-3/4 p-2 bg-gray-900 rounded-md border border-gray-700 ml-auto mr-auto mt-2" name="desc"
                        placeholder="Description" id="" cols="30" rows="10" required>{{ old('desc') }}</textarea>
                        <input class="w-full xl:w-3/4 p-2 bg-gray-900 rounded-md border border-gray-700 ml-auto mr-auto mt-2" placeholder="Ordre d'affichage"
                        type="number" name="order" value="{{ old('order') }}" required><br>
                        <label for="state">Activer / Désactiver</label><br>
                        <input class="w-full xl:w-3/4 p-2 bg-gray-900 rounded-md border border-gray-700 ml-auto mr-auto mt-2"
                        type="checkbox" name="state" value="{{ old('state') }}" required><br>
                        <input class="p-2 w-1/5 bg-gray-50 rounded-full font-bold text-gray-900 border border-gray-700 "
                        type="submit" value="Ajouter">
                    </form>
                </div>
            </div>
            <!--/Template Card-->
        </div>            
    <!--/ Console Content-->       
    </div>
</div>
@endsection