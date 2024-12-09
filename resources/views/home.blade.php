<x-layouts.users>
  <x-slot:title>{{ $title }}</x-slot:title>
  
  <div class="flex flex-col justify-center items-center h-96 gap-12">
    <h1 class="text-6xl tracking-widest font-weight-bolder">{{ $home->name }}</h1>
    <h1 class="text-4xl tracking-wide">{{ $home->title1 }}</h1>
    <h1 class="text-5xl font-weight-bold" style="letter-spacing: 1rem;">{{ $home->title2}}</h1>
  </div>

</x-layouts.users>