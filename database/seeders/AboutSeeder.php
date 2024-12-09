<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'title' => 'About Me',
            'description' => 'Saya adalah seorang individu yang penuh semangat dalam belajar dan berkembang, terutama di bidang teknologi dan pengembangan web. Dengan pengalaman dan dedikasi dalam menggunakan framework seperti Laravel, saya senang menciptakan solusi kreatif yang tidak hanya efisien tetapi juga memiliki nilai estetika. Di luar teknologi, saya juga menikmati berbagi pengetahuan, mengeksplorasi ide-ide baru, dan terus mencari inspirasi dari berbagai hal di sekitar saya.',
            'image' => 'about_images/AP16kDttz4CaJAGjPnHSOUtjalgndf1bEYM1g9CA.jpg',
            'date' => '2024-11-22',
        ]);
    }
}
