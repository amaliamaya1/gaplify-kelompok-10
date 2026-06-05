<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Topic;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Question::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        $topics = Topic::pluck('id', 'title')->toArray();
        
        $t1 = $topics['Jaringan Komputer'] ?? 1;
        $t2 = $topics['IP Addressing'] ?? 2;
        $t3 = $topics['Subnetting'] ?? 3;
        $t4 = $topics['Konfigurasi Perangkat'] ?? 4;
        $t5 = $topics['Troubleshooting Jaringan'] ?? 5;
        $t6 = $topics['Keamanan Jaringan'] ?? 6;

        $data = [
            // Topik 1: Jaringan Komputer (16 Soal: 5 Mudah, 8 Sedang, 3 Sulit)
            // Mudah
            [$t1, 'Apa fungsi utama dari router?', 'Menghubungkan dua atau lebih jaringan', 'Menyimpan data file', 'Mengelola database', 'Mengubah sinyal analog ke digital', 'A'],
            [$t1, 'Topologi yang menggunakan sebuah kabel utama dan semua node terhubung padanya disebut topologi...', 'Star', 'Ring', 'Bus', 'Mesh', 'C'],
            [$t1, 'Perangkat jaringan yang berfungsi pada layer 2 OSI adalah...', 'Hub', 'Switch', 'Router', 'Repeater', 'B'],
            [$t1, 'Media transmisi yang menggunakan cahaya untuk mengirimkan data adalah...', 'Kabel Coaxial', 'Kabel UTP', 'Fiber Optic', 'Kabel STP', 'C'],
            [$t1, 'Apa kepanjangan dari LAN?', 'Local Area Network', 'Large Area Network', 'Long Area Network', 'Link Area Network', 'A'],
            // Sedang
            [$t1, 'Di layer manakah pada OSI model protokol TCP dan UDP beroperasi?', 'Network Layer', 'Transport Layer', 'Data Link Layer', 'Application Layer', 'B'],
            [$t1, 'Berapa kecepatan maksimal dari kabel UTP Cat 5e?', '10 Mbps', '100 Mbps', '1 Gbps', '10 Gbps', 'C'],
            [$t1, 'Perangkat yang meneruskan paket berdasarkan MAC Address disebut...', 'Router', 'Switch', 'Hub', 'Modem', 'B'],
            [$t1, 'Topologi mana yang memiliki redudansi paling tinggi?', 'Bus', 'Star', 'Ring', 'Mesh', 'D'],
            [$t1, 'Apa yang membedakan switch managed dan unmanaged?', 'Unmanaged bisa di-setting VLAN', 'Managed memiliki antarmuka konfigurasi', 'Switch managed lebih murah', 'Unmanaged mendukung layer 3', 'B'],
            [$t1, 'Standar IEEE untuk jaringan nirkabel (Wi-Fi) adalah...', '802.11', '802.3', '802.1Q', '802.1X', 'A'],
            [$t1, 'CSMA/CD adalah metode akses jaringan yang digunakan terutama pada...', 'Fiber Optic', 'Ethernet', 'Token Ring', 'Wireless LAN', 'B'],
            [$t1, 'Berapa jarak maksimum yang direkomendasikan untuk segmen kabel UTP?', '50 meter', '100 meter', '200 meter', '500 meter', 'B'],
            // Sulit
            [$t1, 'Manakah dari berikut ini yang merupakan karakteristik dari switching Cut-Through?', 'Mengecek error CRC sebelum meneruskan paket', 'Meneruskan paket segera setelah membaca destination MAC', 'Menyimpan seluruh frame ke buffer sebelum dikirim', 'Hanya digunakan pada koneksi WAN', 'B'],
            [$t1, 'Layer manakah yang bertanggung jawab untuk kompresi dan enkripsi data pada model OSI?', 'Application', 'Presentation', 'Session', 'Transport', 'B'],
            [$t1, 'Protokol apa yang digunakan switch untuk mencegah terjadinya looping pada topologi redundant?', 'VTP', 'STP (Spanning Tree Protocol)', 'OSPF', 'BGP', 'B'],

            // Topik 2: IP Addressing (17 Soal: 5 Mudah, 9 Sedang, 3 Sulit)
            // Mudah
            [$t2, 'Berapa panjang bit dari alamat IPv4?', '16 bit', '32 bit', '64 bit', '128 bit', 'B'],
            [$t2, 'Alamat IP 192.168.1.1 termasuk dalam kelas apa?', 'Kelas A', 'Kelas B', 'Kelas C', 'Kelas D', 'C'],
            [$t2, 'Apa kepanjangan dari IP?', 'Internet Protocol', 'Internal Protocol', 'Intranet Protocol', 'Information Protocol', 'A'],
            [$t2, 'Manakah yang merupakan alamat loopback pada IPv4?', '192.168.0.1', '10.0.0.1', '127.0.0.1', '172.16.0.1', 'C'],
            [$t2, 'Format alamat IPv6 ditulis menggunakan bilangan...', 'Biner', 'Oktal', 'Desimal', 'Heksadesimal', 'D'],
            // Sedang
            [$t2, 'Range alamat IP private untuk kelas B adalah...', '10.0.0.0 - 10.255.255.255', '172.16.0.0 - 172.31.255.255', '192.168.0.0 - 192.168.255.255', '169.254.0.0 - 169.254.255.255', 'B'],
            [$t2, 'Protokol yang secara otomatis memberikan IP Address kepada client adalah...', 'DNS', 'DHCP', 'FTP', 'HTTP', 'B'],
            [$t2, 'Alamat multicast pada IPv4 diklasifikasikan ke dalam kelas...', 'Kelas B', 'Kelas C', 'Kelas D', 'Kelas E', 'C'],
            [$t2, 'APIPA (Automatic Private IP Addressing) menggunakan range alamat...', '192.168.x.x', '10.x.x.x', '169.254.x.x', '172.16.x.x', 'C'],
            [$t2, 'Jika PC A memiliki IP 192.168.1.10 dan PC B 192.168.2.10 dengan subnet mask sama 255.255.255.0, apakah mereka dapat saling ping langsung tanpa router?', 'Ya, karena masih satu kelas', 'Tidak, karena beda network', 'Ya, jika dihubungkan dengan switch', 'Ya, jika menggunakan kabel crossover', 'B'],
            [$t2, 'IPv6 memiliki panjang alamat sebesar...', '32 bit', '64 bit', '128 bit', '256 bit', 'C'],
            [$t2, 'Berapa byte panjang dari alamat MAC?', '4 Byte', '6 Byte', '8 Byte', '12 Byte', 'B'],
            [$t2, 'Manakah yang merupakan penulisan singkat IPv6 yang benar untuk 2001:0db8:0000:0000:0000:ff00:0042:8329?', '2001:db8::ff00:42:8329', '2001:db8::ff00:0042:8329', '2001:0db8::ff00:42:8329', '2001:db8:0:0:0:ff00:42:8329', 'B'],
            [$t2, 'MAC address beroperasi pada layer OSI ke...', '1', '2', '3', '4', 'B'],
            // Sulit
            [$t2, 'Metode apa yang digunakan agar beberapa alamat private dapat mengakses internet melalui satu alamat IP public?', 'VLAN', 'NAT/PAT', 'VPN', 'STP', 'B'],
            [$t2, 'Alamat fe80::/10 pada IPv6 setara dengan alamat apa pada IPv4?', 'Loopback', 'APIPA (Link-Local)', 'Private IP', 'Multicast', 'B'],
            [$t2, 'Apa tujuan utama dari protokol ARP?', 'Mencari IP berdasarkan nama domain', 'Menerjemahkan nama menjadi IP', 'Mencari MAC address dari suatu IP address', 'Memberikan IP address secara dinamis', 'C'],

            // Topik 3: Subnetting (17 Soal: 5 Mudah, 8 Sedang, 4 Sulit)
            // Mudah
            [$t3, 'Apa nilai desimal dari subnet mask default Kelas C?', '255.0.0.0', '255.255.0.0', '255.255.255.0', '255.255.255.255', 'C'],
            [$t3, 'Prefix /24 setara dengan subnet mask...', '255.255.0.0', '255.255.255.0', '255.255.255.128', '255.255.255.192', 'B'],
            [$t3, 'Tujuan utama melakukan subnetting adalah...', 'Memperbesar ukuran collision domain', 'Memperbanyak jumlah broadcast di jaringan', 'Meningkatkan efisiensi alokasi IP address', 'Mengurangi kecepatan jaringan', 'C'],
            [$t3, 'Alamat IP 192.168.10.255/24 biasanya digunakan sebagai...', 'Network Address', 'Host Address', 'Broadcast Address', 'Gateway Address', 'C'],
            [$t3, 'Berapa jumlah host yang dapat digunakan pada prefix /24?', '256', '255', '254', '253', 'C'],
            // Sedang
            [$t3, 'Subnet mask 255.255.255.192 memiliki prefix berapa?', '/25', '/26', '/27', '/28', 'B'],
            [$t3, 'Berapa jumlah host valid untuk setiap subnet jika menggunakan prefix /27?', '32', '30', '16', '14', 'B'],
            [$t3, 'IP 192.168.1.50/28 berada pada network ID...', '192.168.1.0', '192.168.1.16', '192.168.1.32', '192.168.1.48', 'D'],
            [$t3, 'IP Address 172.16.1.1/16, berapakah broadcast address-nya?', '172.16.1.255', '172.16.255.255', '172.255.255.255', '255.255.255.255', 'B'],
            [$t3, 'Berapa subnet yang terbentuk dari prefix /26 pada IP kelas C?', '2', '4', '8', '16', 'B'],
            [$t3, 'VLSM adalah singkatan dari...', 'Variable Length Subnet Mask', 'Virtual LAN Subnet Mask', 'Virtual Length Secure Mask', 'Variable LAN Subnet Mask', 'A'],
            [$t3, 'CIDR /29 mengalokasikan berapa bit untuk porsi host?', '3 bit', '4 bit', '5 bit', '6 bit', 'A'],
            [$t3, 'IP 10.10.10.10/30, host ID valid untuk jaringan tersebut adalah...', '10.10.10.8 dan 10.10.10.9', '10.10.10.9 dan 10.10.10.10', '10.10.10.10 dan 10.10.10.11', '10.10.10.1 dan 10.10.10.2', 'B'],
            // Sulit
            [$t3, 'Anda membutuhkan 6 subnet dengan minimal 25 host per subnet di kelas C. Subnet mask mana yang paling tepat?', '255.255.255.192', '255.255.255.224', '255.255.255.240', '255.255.255.248', 'B'],
            [$t3, 'Diberikan IP 172.16.20.55/21. Berapakah network address dari IP tersebut?', '172.16.20.0', '172.16.16.0', '172.16.8.0', '172.16.0.0', 'B'],
            [$t3, 'Metode apa yang paling optimal menghemat IP address pada koneksi point-to-point router ke router?', 'Subnetting /24', 'Subnetting /28', 'Subnetting /30', 'Subnetting /32', 'C'],
            [$t3, 'Pada skema VLSM, urutan pengalokasian subnet sebaiknya dimulai dari...', 'Subnet dengan host terkecil', 'Subnet dengan host terbesar', 'Diurutkan berdasarkan abjad departemen', 'Subnet dengan prefix paling besar', 'B'],

            // Topik 4: Konfigurasi Perangkat (17 Soal: 5 Mudah, 8 Sedang, 4 Sulit)
            // Mudah
            [$t4, 'Pada router Cisco, mode untuk melakukan konfigurasi interface adalah...', 'User EXEC Mode', 'Privileged EXEC Mode', 'Global Configuration Mode', 'Interface Configuration Mode', 'D'],
            [$t4, 'Perintah "enable" digunakan untuk masuk ke mode...', 'Global config', 'Privileged EXEC', 'User EXEC', 'ROMMON', 'B'],
            [$t4, 'Perintah CLI apa yang digunakan untuk menampilkan konfigurasi yang sedang berjalan di RAM?', 'show startup-config', 'show running-config', 'show ip route', 'show version', 'B'],
            [$t4, 'Bagaimana cara menyimpan konfigurasi di Cisco router agar tidak hilang saat restart?', 'copy running-config startup-config', 'save config', 'write memory', 'Jawaban A dan C benar', 'D'],
            [$t4, 'Perintah untuk menghidupkan port/interface pada router Cisco adalah...', 'enable port', 'no shutdown', 'port up', 'ip routing', 'B'],
            // Sedang
            [$t4, 'Perintah "show ip interface brief" digunakan untuk melihat...', 'Tabel routing', 'Status dan IP dari semua interface', 'Daftar MAC address pada switch', 'Versi IOS', 'B'],
            [$t4, 'Fitur pada switch yang membagi satu physical network menjadi beberapa broadcast domain logikal disebut...', 'STP', 'VLAN', 'NAT', 'Routing', 'B'],
            [$t4, 'Perintah untuk memberi password rahasia (terenkripsi) pada saat masuk ke privileged mode adalah...', 'enable password', 'enable secret', 'service password-encryption', 'line vty 0 4 password', 'B'],
            [$t4, 'Port switch yang digunakan untuk menghubungkan dua switch agar dapat membawa beberapa traffic VLAN sekaligus disebut...', 'Access port', 'Trunk port', 'Console port', 'Auxiliary port', 'B'],
            [$t4, 'Protokol routing manakah yang termasuk jenis Link-State?', 'RIPv2', 'EIGRP', 'OSPF', 'BGP', 'C'],
            [$t4, 'Untuk mengatur akses jarak jauh (Telnet/SSH), konfigurasi dilakukan pada...', 'line console 0', 'interface vlan 1', 'line vty 0 4', 'line aux 0', 'C'],
            [$t4, 'Apa fungsi dari perintah "ip route 0.0.0.0 0.0.0.0 192.168.1.1"?', 'Menghapus tabel routing', 'Mengatur IP address ke interface', 'Membuat default route', 'Melakukan NAT', 'C'],
            [$t4, 'Protokol trunking standar IEEE yang digunakan agar VLAN bisa melintasi switch berbeda vendor adalah...', 'ISL', '802.1Q', 'VTP', 'STP', 'B'],
            // Sulit
            [$t4, 'Perintah "encapsulation dot1Q 10" pada sub-interface router digunakan untuk keperluan...', 'Routing Dinamis', 'Router-on-a-stick (Inter-VLAN Routing)', 'Konfigurasi Port Security', 'Konfigurasi DHCP Pool', 'B'],
            [$t4, 'Metrik pada protokol OSPF didasarkan pada...', 'Hop count', 'Bandwidth (Cost)', 'Delay dan Load', 'AS Path', 'B'],
            [$t4, 'Administrative Distance (AD) default untuk Static Route adalah...', '0', '1', '90', '120', 'B'],
            [$t4, 'Manakah yang mengkonfigurasi Port Security agar membatasi hanya 2 MAC Address yang diizinkan?', 'switchport port-security maximum 2', 'switchport port-security mac-address 2', 'switchport limit 2', 'switchport max-mac 2', 'A'],

            // Topik 5: Troubleshooting Jaringan (17 Soal: 5 Mudah, 9 Sedang, 3 Sulit)
            // Mudah
            [$t5, 'Perintah dasar untuk menguji konektivitas jaringan ke host tertentu adalah...', 'ipconfig', 'ping', 'tracert', 'nslookup', 'B'],
            [$t5, 'Ping menggunakan protokol...', 'TCP', 'UDP', 'ICMP', 'IGMP', 'C'],
            [$t5, 'Jika hasil ping menampilkan "Request Timed Out", artinya...', 'Kabel LAN terputus (unplugged)', 'Host tujuan tidak membalas dalam batas waktu', 'IP address kita belum di-set', 'Server DNS mati', 'B'],
            [$t5, 'Perintah di Windows untuk melihat IP Address, Subnet Mask, dan Default Gateway komputer adalah...', 'ifconfig', 'ipconfig', 'netstat', 'arp -a', 'B'],
            [$t5, 'Alat fisik yang digunakan untuk mengecek apakah urutan kabel UTP sudah benar dan tidak putus disebut...', 'Multimeter', 'LAN Tester', 'Crimping Tool', 'Punch down tool', 'B'],
            // Sedang
            [$t5, 'Perintah tracert (traceroute) digunakan untuk...', 'Melihat kecepatan bandwidth', 'Melacak jalur hop router yang dilalui paket ke tujuan', 'Menyembunyikan IP Address', 'Menghapus DNS cache', 'B'],
            [$t5, 'Tampilan pesan "Destination Host Unreachable" saat melakukan ping mengindikasikan...', 'Tidak ada rute (route) menuju host tujuan', 'Host memblokir ICMP', 'Latency yang terlalu tinggi', 'NIC rusak', 'A'],
            [$t5, 'Untuk melihat MAC Address pada komputer Windows, bisa menggunakan perintah...', 'ipconfig /all', 'ipconfig /renew', 'mac-address view', 'netsh interface show', 'A'],
            [$t5, 'Perintah "nslookup" digunakan untuk mendiagnosis masalah yang berhubungan dengan...', 'DHCP', 'DNS', 'FTP', 'VLAN', 'B'],
            [$t5, 'Bila komputer klien tidak mendapatkan IP secara otomatis dari server, alamat IP yang biasanya muncul adalah...', '0.0.0.0', '127.0.0.1', '169.254.x.x', '255.255.255.255', 'C'],
            [$t5, 'Perintah "netstat -an" berguna untuk melihat...', 'Daftar MAC address di jaringan lokal', 'Statistik pemakaian RAM', 'Port TCP/UDP yang sedang aktif/terbuka', 'Kecepatan download', 'C'],
            [$t5, 'Kabel straight-through digunakan untuk menghubungkan...', 'PC ke PC', 'Switch ke Switch', 'PC ke Switch', 'Router ke Router', 'C'],
            [$t5, 'Jika indikator lampu link pada NIC tidak menyala saat dihubungkan ke switch, kemungkinan masalah terletak pada, KECUALI...', 'Kabel putus', 'Port switch rusak', 'IP address konflik', 'Konektor RJ-45 terpasang longgar', 'C'],
            [$t5, 'Perintah untuk melihat cache ARP pada Windows adalah...', 'arp -s', 'arp -d', 'arp -a', 'show arp', 'C'],
            // Sulit
            [$t5, 'Looping pada layer 2 akibat redudansi switch akan memicu...', 'Broadcast storm', 'IP Conflict', 'DNS Poisoning', 'Rogue DHCP', 'A'],
            [$t5, 'Dalam troubleshooting kabel fiber optic, alat yang digunakan untuk melacak redaman, lokasi patahan, dan panjang kabel adalah...', 'LAN Tester', 'OTDR (Optical Time-Domain Reflectometer)', 'Splicer', 'Cleaver', 'B'],
            [$t5, 'Manakah yang menyebabkan asymetric routing?', 'Ada lebih dari satu jalur ke tujuan dengan routing policy yang tidak konsisten', 'Penggunaan VLAN yang terlalu banyak', 'Switch tidak mendukung Gigabit Ethernet', 'Kabel UTP ditarik terlalu panjang', 'A'],

            // Topik 6: Keamanan Jaringan (16 Soal: 5 Mudah, 8 Sedang, 3 Sulit)
            // Mudah
            [$t6, 'Perangkat keras atau lunak yang berfungsi untuk menyaring lalu lintas jaringan yang masuk dan keluar adalah...', 'Router', 'Switch', 'Firewall', 'Modem', 'C'],
            [$t6, 'Serangan yang membanjiri server dengan trafik palsu hingga server lumpuh disebut...', 'Phishing', 'SQL Injection', 'DDoS (Distributed Denial of Service)', 'Deface', 'C'],
            [$t6, 'Malware yang mengunci file korban dan meminta tebusan disebut...', 'Adware', 'Ransomware', 'Spyware', 'Trojan', 'B'],
            [$t6, 'Protokol yang mengenkripsi komunikasi web (HTTP) adalah...', 'HTTPS', 'FTP', 'Telnet', 'SNMP', 'A'],
            [$t6, 'Manakah yang lebih aman untuk remote akses ke server/router?', 'Telnet', 'SSH', 'TFTP', 'HTTP', 'B'],
            // Sedang
            [$t6, 'Konsep keamanan informasi sering dikenal dengan istilah CIA Triad, yaitu...', 'Confidentiality, Integrity, Availability', 'Control, Integrity, Authorization', 'Confidentiality, Identity, Availability', 'Cyber, Information, Access', 'A'],
            [$t6, 'Serangan dengan cara memalsukan IP Address asal disebut...', 'MAC Spoofing', 'IP Spoofing', 'Phishing', 'Man-in-the-Middle', 'B'],
            [$t6, 'Teknologi yang memungkinkan klien mengakses jaringan internal perusahaan secara aman dari internet (luar) adalah...', 'VLAN', 'NAT', 'VPN', 'Proxy', 'C'],
            [$t6, 'Fungsi dari ACL (Access Control List) pada router adalah...', 'Menghitung biaya routing', 'Memfilter paket berdasarkan IP sumber, IP tujuan, atau port', 'Membagi bandwidth secara rata', 'Menerjemahkan nama domain', 'B'],
            [$t6, 'Teknik mengelabui korban untuk mendapatkan informasi sensitif seperti password dengan cara menyamar sebagai entitas terpercaya disebut...', 'Phishing', 'Brute Force', 'Sniffing', 'DDoS', 'A'],
            [$t6, 'Manakah tipe enkripsi nirkabel (Wi-Fi) yang paling aman dari pilihan berikut?', 'WEP', 'WPA', 'WPA2-PSK', 'Open Authentication', 'C'],
            [$t6, 'Apa yang dilakukan oleh serangan Man-in-the-Middle (MitM)?', 'Menghapus file pada server', 'Menyusup di antara dua pihak yang berkomunikasi untuk menyadap atau memanipulasi data', 'Menebak password terus menerus', 'Membanjiri router dengan request palsu', 'B'],
            [$t6, 'Port default untuk layanan HTTPS adalah...', '80', '21', '443', '22', 'C'],
            // Sulit
            [$t6, 'Algoritma kriptografi AES termasuk dalam kategori enkripsi...', 'Asimetris', 'Simetris', 'Hashing', 'Steganografi', 'B'],
            [$t6, 'Sistem yang berfungsi untuk mendeteksi adanya intrusi atau anomali jaringan tanpa secara aktif memblokirnya disebut...', 'IPS (Intrusion Prevention System)', 'IDS (Intrusion Detection System)', 'Firewall stateful', 'Proxy Server', 'B'],
            [$t6, 'Serangan ARP Spoofing/ARP Poisoning umumnya dilakukan untuk tujuan...', 'Mengganti MAC address mesin sendiri', 'Menghancurkan tabel routing internet', 'Melakukan serangan Man-in-the-Middle di jaringan lokal', 'Melakukan SQL Injection pada web server lokal', 'C']
        ];

        $insertData = [];
        $now = now();

        foreach ($data as $d) {
            $insertData[] = [
                'topic_id' => $d[0],
                'question' => $d[1],
                'option_a' => $d[2],
                'option_b' => $d[3],
                'option_c' => $d[4],
                'option_d' => $d[5],
                'correct_answer' => $d[6],
                'created_at' => $now,
                'updated_at' => $now
            ];
        }

        foreach (array_chunk($insertData, 50) as $chunk) {
            Question::insert($chunk);
        }
    }
}
