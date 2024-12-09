<x-layouts.users>
    <x-slot:title>{{ $title }}</x-slot:title>
    <main class="grid w-full h-auto py-20 text-gray-100 bg-white place-content-center rounded-lg">
        <section x-data="skillDisplay({{ $skills->toJson() }})"
            class="p-6 space-y-6 bg-gray-100 rounded-xl md:grid md:grid-cols-2 md:gap-4 sm:space-y-0">
    
            <div class="grid grid-cols-2 gap-6">
                <!-- Jika tidak ada skill -->
                <p x-show="skills.length === 0" class="col-span-2 text-xl text-center text-gray-900">
                    Tidak ada skill
                </p>
    
                <!-- Daftar skill -->
                <template x-for="skill in skills" :key="skill.id">
                    <button x-text="skill.title"
                        class="px-4 py-2 text-xl text-white transition bg-gray-900 rounded-md h-14 w-44 hover:bg-gray-700"
                        :class="(currentSkill.id == skill.id) && 'font-bold ring-2 ring-gray-100'"
                        @click="currentSkill = skill">
                    </button>
                </template>
            </div>
    
            <!-- Lingkaran progress -->
            <div class="flex items-center justify-center" x-data="{ circumference: 2 * 22 / 7 * 120 }">
                <svg class="transform -rotate-90 w-72 h-72" x-show="skills.length > 0">
                    <circle cx="145" cy="145" r="120" stroke="currentColor" stroke-width="30"
                        fill="transparent" class="text-gray-300" />
                    <circle cx="145" cy="145" r="120" stroke="currentColor" stroke-width="30"
                        fill="transparent" :stroke-dasharray="circumference"
                        :stroke-dashoffset="circumference - currentSkill.persen / 100 * circumference"
                        class="text-gray-900 " />
                </svg>
                <span class="absolute text-5xl text-gray-900" x-show="skills.length > 0"
                    x-text="`${currentSkill.persen}%`"></span>
            </div>
        </section>
    </main>
    

    <script>
        document.addEventListener('alpine:init', () => {
            console.log('Alpine initialized'); // Debugging
            Alpine.data('skillDisplay', (skills) => ({
                skills: skills,
                currentSkill: skills[0] || {
                    id: null,
                    title: '',
                    persen: 0,
                },
            }));
        });
    </script>
    
</x-layouts.users>
