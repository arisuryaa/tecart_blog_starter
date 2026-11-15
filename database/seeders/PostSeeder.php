<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Seed sample articles used in the workshop demo.
     */
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Belajar Blade Components dari Nol',
                'body' => 'Berhenti copy-paste navbar di setiap halaman. Dengan Blade components, satu perubahan langsung berlaku di seluruh aplikasi.',
            ],
            [
                'title' => 'Mengenal Tailwind CSS dan Konsep Utility-First',
                'body' => 'Alih-alih menulis CSS terpisah, kita menyusun class kecil langsung di HTML. Hasilnya lebih cepat dan konsisten.',
            ],
            [
                'title' => 'Validasi Form di Laravel dengan Pesan yang Ramah',
                'body' => 'Pesan error yang jelas membantu pengguna memperbaiki isiannya tanpa harus menebak-nebak apa yang salah.',
            ],
            [
                'title' => 'Kenapa Empty State Itu Penting?',
                'body' => 'Halaman kosong bikin bingung. Beri tahu pengguna apa yang terjadi dan apa langkah berikutnya.',
            ],
            [
                'title' => 'Flash Message: Memberi Kabar Setelah Aksi',
                'body' => 'Setelah menyimpan data, pengguna perlu tahu bahwa aksinya berhasil. Flash message cukup untuk itu.',
            ],
        ];

        foreach ($articles as $index => $article) {
            Post::factory()->create([
                ...$article,
                'created_at' => now()->subDays($index),
                'updated_at' => now()->subDays($index),
            ]);
        }
    }
}
