<x-layouts.users>
    <x-slot:title>{{ $title }}</x-slot:title>
    <section class="bg-white dark:bg-gray-900 rounded-md">
      <div class="container px-6 py-12 mx-auto">
          <div class="text-center ">
              <p class="font-medium text-blue-500 dark:text-blue-400">Contact me</p>
  
              <h1 class="mt-2 text-2xl font-semibold text-gray-800 md:text-3xl dark:text-white">I'd love to hear from you</h1>
  
              <p class="mt-3 text-gray-500 dark:text-gray-400">Get In touch with me</p>
          </div>
  
          <div class="grid grid-cols-1 gap-12 mt-10 lg:grid-cols-3 sm:grid-cols-2 ">

            @foreach($contacts as $contact)
              <div class="p-4 rounded-lg bg-blue-50 md:p-6 dark:bg-gray-800">  
                  <h2 class="mt-3 text-base font-medium text-gray-800 dark:text-white">{{ $contact->title }}</h2>
                  <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">{{ $contact->description }}</p>
                  <a href="{{ $contact->link }}" class="mt-3 text-sm text-blue-500 dark:text-blue-400">{{ $contact->contact }}</a>
              </div>
            @endforeach
          </div>
      </div>
  </section>
  </x-layouts.users>