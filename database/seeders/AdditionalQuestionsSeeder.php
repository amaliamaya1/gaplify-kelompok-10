<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class AdditionalQuestionsSeeder extends Seeder
{
    public function run(): void
    {
        $questions = [
            // TOPIC 3: Jaringan Komputer (Basic Networking)
            [
                'topic_id' => 3,
                'question' => 'Topologi jaringan komputer di mana semua node terhubung ke satu titik pusat (hub/switch) disebut topologi...',
                'option_a' => 'Ring',
                'option_b' => 'Bus',
                'option_c' => 'Star',
                'option_d' => 'Mesh',
                'correct_answer' => 'C',
            ],
            [
                'topic_id' => 3,
                'question' => 'Model referensi OSI (Open Systems Interconnection) memiliki berapa lapisan (layer)?',
                'option_a' => '4 Lapisan',
                'option_b' => '5 Lapisan',
                'option_c' => '7 Lapisan',
                'option_d' => '8 Lapisan',
                'correct_answer' => 'C',
            ],
            [
                'topic_id' => 3,
                'question' => 'Perangkat keras yang berfungsi untuk menghubungkan dua jaringan yang berbeda dan menentukan jalur terbaik untuk pengiriman data adalah...',
                'option_a' => 'Switch',
                'option_b' => 'Router',
                'option_c' => 'Hub',
                'option_d' => 'Repeater',
                'correct_answer' => 'B',
            ],
            [
                'topic_id' => 3,
                'question' => 'Protokol yang bertanggung jawab memberikan alamat IP secara dinamis kepada komputer di jaringan disebut...',
                'option_a' => 'DNS',
                'option_b' => 'FTP',
                'option_c' => 'DHCP',
                'option_d' => 'HTTP',
                'correct_answer' => 'C',
            ],
            [
                'topic_id' => 3,
                'question' => 'Kabel jaringan tipe Twisted Pair biasanya menggunakan konektor jenis...',
                'option_a' => 'RJ-45',
                'option_b' => 'BNC',
                'option_c' => 'Fiber Optic',
                'option_d' => 'Coaxial',
                'correct_answer' => 'A',
            ],

            // TOPIC 4: Konfigurasi Perangkat (Device Configuration)
            [
                'topic_id' => 4,
                'question' => 'Perintah dasar pada router Cisco untuk masuk ke mode Global Configuration adalah...',
                'option_a' => 'enable',
                'option_b' => 'configure terminal',
                'option_c' => 'interface vlan 1',
                'option_d' => 'show running-config',
                'correct_answer' => 'B',
            ],
            [
                'topic_id' => 4,
                'question' => 'Jika kita ingin menyimpan konfigurasi yang sedang berjalan agar tidak hilang saat router direstart, kita menggunakan perintah...',
                'option_a' => 'copy running-config startup-config',
                'option_b' => 'show startup-config',
                'option_c' => 'write terminal',
                'option_d' => 'reload',
                'correct_answer' => 'A',
            ],
            [
                'topic_id' => 4,
                'question' => 'Apa tujuan dari membuat VLAN (Virtual Local Area Network) pada sebuah Switch?',
                'option_a' => 'Meningkatkan kecepatan internet secara drastis',
                'option_b' => 'Memecah broadcast domain untuk keamanan dan manajemen lalu lintas',
                'option_c' => 'Menghubungkan switch ke router',
                'option_d' => 'Mengubah IP address komputer klien',
                'correct_answer' => 'B',
            ],
            [
                'topic_id' => 4,
                'question' => 'Mode port pada switch yang digunakan untuk menghubungkan antar switch agar dapat dilewati banyak VLAN sekaligus disebut mode...',
                'option_a' => 'Access',
                'option_b' => 'Dynamic',
                'option_c' => 'Trunk',
                'option_d' => 'Static',
                'correct_answer' => 'C',
            ],
            [
                'topic_id' => 4,
                'question' => 'Perintah untuk memberikan IP Address pada interface FastEthernet 0/0 di router adalah...',
                'option_a' => 'ip route 192.168.1.1 255.255.255.0',
                'option_b' => 'ip address 192.168.1.1 255.255.255.0',
                'option_c' => 'set ip 192.168.1.1',
                'option_d' => 'network 192.168.1.0',
                'correct_answer' => 'B',
            ],

            // TOPIC 5: Troubleshooting Jaringan (Network Troubleshooting)
            [
                'topic_id' => 5,
                'question' => 'Perintah pada Command Prompt (Windows) yang digunakan untuk menguji konektivitas ke komputer tujuan adalah...',
                'option_a' => 'ipconfig',
                'option_b' => 'tracert',
                'option_c' => 'ping',
                'option_d' => 'netstat',
                'correct_answer' => 'C',
            ],
            [
                'topic_id' => 5,
                'question' => 'Jika hasil perintah "ping" menunjukkan "Request timed out", apa artinya?',
                'option_a' => 'Alamat IP tujuan tidak valid',
                'option_b' => 'Koneksi berhasil tetapi lambat',
                'option_c' => 'Tidak ada respon dari komputer tujuan dalam batas waktu tertentu',
                'option_d' => 'Kabel LAN terputus pada komputer lokal',
                'correct_answer' => 'C',
            ],
            [
                'topic_id' => 5,
                'question' => 'Perintah yang digunakan untuk melacak rute (hop) yang dilewati paket data dari komputer sumber ke tujuan adalah...',
                'option_a' => 'tracert / traceroute',
                'option_b' => 'nslookup',
                'option_c' => 'ipconfig /all',
                'option_d' => 'route print',
                'correct_answer' => 'A',
            ],
            [
                'topic_id' => 5,
                'question' => 'Sebuah PC tidak bisa browsing dengan nama domain (misal: google.com), tetapi bisa diping ke alamat IP-nya (misal: 8.8.8.8). Masalahnya kemungkinan besar terletak pada...',
                'option_a' => 'Kabel LAN putus',
                'option_b' => 'Kesalahan konfigurasi DNS Server',
                'option_c' => 'IP Address konflik',
                'option_d' => 'Switch yang rusak',
                'correct_answer' => 'B',
            ],
            [
                'topic_id' => 5,
                'question' => 'Apa yang terjadi jika ada dua komputer dalam satu jaringan lokal menggunakan IP Address yang sama persis?',
                'option_a' => 'Kedua komputer mendapat kecepatan lebih tinggi',
                'option_b' => 'Akan terjadi IP Conflict sehingga koneksi terganggu',
                'option_c' => 'Otomatis menjadi jaringan Peer to Peer',
                'option_d' => 'Komputer kedua akan otomatis mendapatkan IP berbeda',
                'correct_answer' => 'B',
            ],
        ];

        foreach ($questions as $q) {
            Question::create($q);
        }
    }
}
