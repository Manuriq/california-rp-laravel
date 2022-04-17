@extends("layouts.panel")

@section("content")

    <!-- Cards -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
      <!-- Card -->
      <div
        class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
      >
        <div
          class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
        >
            <i class="fa-solid fa-envelope fa-xl"></i>
        </div>
        <div>
          <p
            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
          >
            Votre adresse mail
          </p>
          <p
            class="font-semibold text-gray-700 dark:text-gray-200"
          >
          {{ Auth::user()->cEmail; }}
          </p>
        </div>
      </div>
      <!-- Card -->
      <div
        class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
      >
        <div
          class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
        >
            <i class="fas fa-clipboard-check fa-2xl"></i>
        </div>
        <div>
          <p
            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
          >
            Inscription le
          </p>
          <p
            class="font-semibold text-gray-700 dark:text-gray-200"
          >
            {{ date('d/m/Y H:m', Auth::user()->createdAt) }}
          </p>
        </div>
      </div>
      <!-- Card -->
      <div
        class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
      >
        <div
          class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500"
        >
        <i class="fas fa-sign-in-alt fa-xl"></i>
        </div>
        <div>
          <p
            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
          >
            Dernière connexion
          </p>
          <p
            class="font-semibold text-gray-700 dark:text-gray-200"
          >
          {{ Auth::user()->cLastConnect ? date('d/m/Y H:m', Auth::user()->cLastConnect) : "Aucune connexion enregistrée" }}
          </p>
        </div>
      </div>
      <!-- Card -->
      <div
        class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
      >
        <div
          class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500"
        >
            <i class="fas fa-star fa-lg"></i>
        </div>
        <div>
          <p
            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
          >
            Point Shops
          </p>
          <p
            class="font-semibold text-gray-700 dark:text-gray-200"
          >
          {{ Auth::user()->cVote; }}
          </p>
        </div>
      </div>
    </div>
@endsection