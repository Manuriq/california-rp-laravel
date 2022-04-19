@extends("layouts.panel")

@section("content")
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
  <p class="text-sm text-gray-600 dark:text-gray-400">
    Forum
  </p>
</div>
<div class="w-full">
  <div class="flex w-full">
    <div class="flex-none w-14 h-14 ...">
      01
    </div>
    <div class="grow h-14 ...">
      02
    </div>
    <div class="flex-none w-14 h-14 ...">
      03
    </div>
  </div>
</div>


@foreach ($forums as $forum)

<div class="w-full mb-8 rounded-lg shadow-xs">
  <div class="w-full text-xs font-semibold tracking-wide text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
    <div class="px-4 py-3">
      {{ $forum->title }}
    </div>
  </div>
  <div class="w-full bg-white dark:divide-gray-700 dark:bg-gray-800 flex flex-row">
    <div class="basis-3/5 px-4 py-3">
      Test
    </div>
    <div class="basis-1/5 px-4 py-3">
      Test
    </div>
    <div class="basis-1/5 w-1/5 px-4 py-3">
      Test
    </div>
  </div>
</div>

<div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
  <div class="w-full overflow-x-auto">
    <table class="w-full whitespace-no-wrap">
      <thead>
        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
          <th class="px-4 py-3">{{ $forum->title }}</th>
          <th class="px-4 py-3">d</th>
          <th class="px-4 py-3">d</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
        <tr class="text-gray-700 dark:text-gray-400">
          <td class="px-4 py-3">
            <div class="flex items-center text-sm">
              <!-- Avatar with inset shadow -->
              <div>
                <p class="font-semibold">Anonnces et mises à jours</p>
                <p class="text-xs text-gray-600 dark:text-gray-400">
                  Toutes les annonces importantes de la communauté, ainsi que le journal de modifications du mod San Andreas Multiplayer.
                </p>
              </div>
            </div>
          </td>
          <td class="px-4 py-3 text-sm">
            243 messages
          </td>
          <td class="px-4 py-3 text-sm">
            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
              <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy">
              <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
            </div>
            6/10/2020
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endforeach
@endsection