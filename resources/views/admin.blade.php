@extends("layouts.dashboard")

@section("content")
<div>
    <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-100 leading-normal">
        <div class="w-full md:w-1/2 xl:w-3/4 p-3 ml-auto mr-auto">
            <!--Template Card-->
            <div class="bg-gray-900 border border-gray-800 rounded shadow">
                <div class="border-b border-gray-800 p-3">
                    <h5 class="font-bold uppercase">Admin Panel</h5>
                </div>
                <div class="p-5 text-center">
                    <a href="{{ route("forum.index") }}"><button class="bg-blue-500 text-white px-32 py-3 rounded-md text-1xl font-medium hover:bg-blue-700 transition duration-300">Gestion des Forums</button></a>
                </div>
            </div>
            <!--/Template Card-->
        </div>            
    <!--/ Console Content-->       
    </div>
</div>
@endsection