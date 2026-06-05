<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Topic;
use App\Models\Material;

class MaterialSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Material::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $topics = Topic::pluck('id', 'title')->toArray();

        $t1 = $topics['Jaringan Komputer']          ?? 1;
        $t2 = $topics['IP Addressing']              ?? 2;
        $t3 = $topics['Subnetting']                 ?? 3;
        $t4 = $topics['Konfigurasi Perangkat']      ?? 4;
        $t5 = $topics['Troubleshooting Jaringan']   ?? 5;
        $t6 = $topics['Keamanan Jaringan']          ?? 6;

        $now = now();

        $materials = [

            // ── Topik 1: Jaringan Komputer ──────────────────────────────
            [
                'topic_id'    => $t1,
                'title'       => 'Pengantar Jaringan Komputer',
                'description' => 'Konsep dasar jaringan, topologi, perangkat, dan model OSI/TCP-IP.',
                'content'     => "Jaringan komputer adalah kumpulan dua atau lebih perangkat yang saling terhubung untuk berbagi sumber daya.\n\n"
                    . "## Jenis Jaringan\n"
                    . "- **LAN** (Local Area Network) – area kecil, mis. sekolah atau kantor.\n"
                    . "- **WAN** (Wide Area Network) – antar kota/negara.\n"
                    . "- **MAN** (Metropolitan Area Network) – se-kota.\n\n"
                    . "## Topologi Jaringan\n"
                    . "| Topologi | Kelebihan | Kekurangan |\n"
                    . "|----------|-----------|------------|\n"
                    . "| Bus | Murah, mudah dipasang | Satu putus = semua mati |\n"
                    . "| Star | Mudah troubleshoot | Bergantung hub/switch |\n"
                    . "| Ring | Tertib, bergiliran | Latency tinggi |\n"
                    . "| Mesh | Redundansi tinggi | Biaya mahal |\n\n"
                    . "## Perangkat Jaringan\n"
                    . "- **Hub**: Layer 1, meneruskan ke semua port.\n"
                    . "- **Switch**: Layer 2, meneruskan berdasarkan MAC Address.\n"
                    . "- **Router**: Layer 3, menghubungkan antar jaringan berbeda.\n"
                    . "- **Repeater**: Memperkuat sinyal.\n\n"
                    . "## Model OSI (7 Layer)\n"
                    . "7. Application → 6. Presentation → 5. Session → 4. Transport → 3. Network → 2. Data Link → 1. Physical\n\n"
                    . "## Protokol Penting\n"
                    . "- **TCP**: Koneksi andal, ada handshaking.\n"
                    . "- **UDP**: Cepat, tanpa jaminan pengiriman.\n"
                    . "- **ICMP**: Digunakan ping untuk uji konektivitas.\n"
                    . "- **CSMA/CD**: Metode akses Ethernet untuk menghindari tabrakan data.",
                'video_url'   => 'https://www.youtube.com/embed/3QhU9jd03a0',
            ],
            [
                'topic_id'    => $t1,
                'title'       => 'Kabel & Media Transmisi Jaringan',
                'description' => 'Jenis-jenis kabel UTP, STP, Coaxial, dan Fiber Optic beserta standarnya.',
                'content'     => "Media transmisi adalah jalur fisik atau nirkabel yang digunakan untuk mengirim data.\n\n"
                    . "## Kabel UTP (Unshielded Twisted Pair)\n"
                    . "- Paling umum digunakan di LAN.\n"
                    . "- Kategori: Cat 5e (1 Gbps, 100 m), Cat 6 (10 Gbps, 55 m), Cat 6a (10 Gbps, 100 m).\n"
                    . "- Standar krimping: T568A dan T568B.\n"
                    . "- **Straight-through**: PC ↔ Switch.\n"
                    . "- **Crossover**: PC ↔ PC atau Switch ↔ Switch.\n\n"
                    . "## Fiber Optic\n"
                    . "- Menggunakan cahaya sebagai media transmisi.\n"
                    . "- **Single Mode**: Jarak jauh (km), satu inti, mahal.\n"
                    . "- **Multi Mode**: Jarak pendek (<500 m), inti besar, lebih murah.\n"
                    . "- Keunggulan: Imun interferensi elektromagnetik, bandwidth sangat tinggi.\n\n"
                    . "## Kabel Coaxial\n"
                    . "- Digunakan di jaringan lama (10Base2, 10Base5).\n"
                    . "- Sekarang banyak dipakai oleh ISP (TV Kabel / DOCSIS).\n\n"
                    . "## Wireless (Nirkabel)\n"
                    . "- Standar IEEE 802.11 (Wi-Fi).\n"
                    . "- 802.11n: max 600 Mbps | 802.11ac: max 6.9 Gbps | 802.11ax (Wi-Fi 6): > 9 Gbps.",
                'video_url'   => 'https://www.youtube.com/embed/3_lP74Z_Oe8',
            ],

            // ── Topik 2: IP Addressing ───────────────────────────────────
            [
                'topic_id'    => $t2,
                'title'       => 'Dasar IP Addressing (IPv4)',
                'description' => 'Konsep IPv4, kelas IP, alamat khusus, private vs public.',
                'content'     => "IP Address adalah alamat logis yang mengidentifikasi perangkat di jaringan.\n\n"
                    . "## Format IPv4\n"
                    . "- 32 bit, ditulis dalam 4 oktet desimal, dipisah titik. Contoh: **192.168.1.10**\n\n"
                    . "## Kelas IP Address\n"
                    . "| Kelas | Range Oktet 1 | Default Mask | Untuk |\n"
                    . "|-------|--------------|--------------|-------|\n"
                    . "| A | 1 – 126 | 255.0.0.0 /8 | Jaringan sangat besar |\n"
                    . "| B | 128 – 191 | 255.255.0.0 /16 | Jaringan menengah |\n"
                    . "| C | 192 – 223 | 255.255.255.0 /24 | Jaringan kecil |\n"
                    . "| D | 224 – 239 | – | Multicast |\n"
                    . "| E | 240 – 255 | – | Eksperimental |\n\n"
                    . "## Alamat IP Khusus\n"
                    . "- **127.0.0.1**: Loopback (uji kartu jaringan sendiri).\n"
                    . "- **169.254.x.x**: APIPA (DHCP gagal, Windows otomatis menetapkan).\n"
                    . "- **0.0.0.0**: Tidak ditentukan (default route).\n"
                    . "- **255.255.255.255**: Broadcast terbatas.\n\n"
                    . "## IP Private (RFC 1918)\n"
                    . "- Kelas A: 10.0.0.0 – 10.255.255.255\n"
                    . "- Kelas B: 172.16.0.0 – 172.31.255.255\n"
                    . "- Kelas C: 192.168.0.0 – 192.168.255.255\n\n"
                    . "## Protokol Terkait\n"
                    . "- **DHCP**: Memberikan IP otomatis kepada client.\n"
                    . "- **ARP**: Menerjemahkan IP → MAC Address.\n"
                    . "- **NAT/PAT**: Mengubah IP private ke public untuk akses internet.",
                'video_url'   => 'https://www.youtube.com/embed/ddM9AcreVqY',
            ],
            [
                'topic_id'    => $t2,
                'title'       => 'Pengantar IPv6',
                'description' => 'Perbedaan IPv4 dan IPv6, format, dan jenis alamat IPv6.',
                'content'     => "IPv6 hadir untuk menggantikan IPv4 yang kehabisan alamat.\n\n"
                    . "## Format IPv6\n"
                    . "- **128 bit**, ditulis dalam 8 grup 4 digit heksadesimal.\n"
                    . "- Contoh: 2001:0db8:85a3:0000:0000:8a2e:0370:7334\n"
                    . "- Penyingkatan: Nol terdepan dihapus, grup nol berurutan diganti **::**\n"
                    . "- Contoh singkat: 2001:db8:85a3::8a2e:370:7334\n\n"
                    . "## Jenis Alamat IPv6\n"
                    . "- **Unicast Global** (2000::/3): Setara IP public IPv4.\n"
                    . "- **Link-Local** (fe80::/10): Setara APIPA, hanya berlaku di segmen lokal.\n"
                    . "- **Loopback** (::1): Setara 127.0.0.1.\n"
                    . "- **Multicast** (ff00::/8): Setara kelas D IPv4.\n\n"
                    . "## Keunggulan IPv6\n"
                    . "- Ruang alamat sangat besar (3.4 × 10³⁸ alamat).\n"
                    . "- Konfigurasi otomatis (SLAAC) tanpa DHCP.\n"
                    . "- Header lebih efisien.\n"
                    . "- Enkripsi built-in (IPSec).",
                'video_url'   => 'https://www.youtube.com/embed/ThdO9beHhpA',
            ],

            // ── Topik 3: Subnetting ─────────────────────────────────────
            [
                'topic_id'    => $t3,
                'title'       => 'Teknik Subnetting CIDR – Metode Cepat',
                'description' => 'Menghitung subnet, jumlah host, network address, dan broadcast address.',
                'content'     => "Subnetting adalah teknik memecah satu jaringan besar menjadi sub-jaringan yang lebih kecil.\n\n"
                    . "## Rumus Dasar\n"
                    . "- **Jumlah Subnet** = 2ˣ (x = bit yang dipinjam)\n"
                    . "- **Jumlah Host Valid** = 2ʸ − 2 (y = sisa bit host)\n\n"
                    . "## Tabel Subnet Mask Cepat (Kelas C)\n"
                    . "| Prefix | Subnet Mask | Subnet | Host/Subnet |\n"
                    . "|--------|------------|--------|-------------|\n"
                    . "| /25 | 255.255.255.128 | 2 | 126 |\n"
                    . "| /26 | 255.255.255.192 | 4 | 62 |\n"
                    . "| /27 | 255.255.255.224 | 8 | 30 |\n"
                    . "| /28 | 255.255.255.240 | 16 | 14 |\n"
                    . "| /29 | 255.255.255.248 | 32 | 6 |\n"
                    . "| /30 | 255.255.255.252 | 64 | 2 |\n\n"
                    . "## Langkah Menghitung (Contoh: 192.168.1.50/26)\n"
                    . "1. /26 → Subnet mask: 255.255.255.192\n"
                    . "2. Blok subnet: 256 − 192 = **64** (0, 64, 128, 192, 256)\n"
                    . "3. IP 50 berada di blok 0–63 → **Network: 192.168.1.0**\n"
                    . "4. **Broadcast: 192.168.1.63**\n"
                    . "5. **Host Valid: 192.168.1.1 – 192.168.1.62**\n\n"
                    . "## VLSM (Variable Length Subnet Mask)\n"
                    . "- Mengalokasikan subnet sesuai kebutuhan host (berbeda tiap subnet).\n"
                    . "- Urutan: mulai dari kebutuhan host **terbesar** ke terkecil.\n"
                    . "- Lebih hemat IP dibanding subnetting kelas tetap.",
                'video_url'   => 'https://www.youtube.com/embed/EWOUqNjVReg',
            ],

            // ── Topik 4: Konfigurasi Perangkat ──────────────────────────
            [
                'topic_id'    => $t4,
                'title'       => 'Konfigurasi Dasar Router Cisco (CLI)',
                'description' => 'CLI dasar Cisco: mode, routing statis, VLAN, dan show commands.',
                'content'     => "Cisco IOS CLI memiliki hierarki mode konfigurasi.\n\n"
                    . "## Hierarki Mode\n"
                    . "```\n"
                    . "Router>          ← User EXEC (show terbatas)\n"
                    . "Router# enable  ← Privileged EXEC\n"
                    . "Router(config)# configure terminal  ← Global Config\n"
                    . "Router(config-if)#  ← Interface Config\n"
                    . "```\n\n"
                    . "## Konfigurasi Interface\n"
                    . "```\n"
                    . "interface GigabitEthernet0/0\n"
                    . " ip address 192.168.1.1 255.255.255.0\n"
                    . " no shutdown\n"
                    . "```\n\n"
                    . "## Menyimpan Konfigurasi\n"
                    . "```\n"
                    . "copy running-config startup-config\n"
                    . "! atau\n"
                    . "write memory\n"
                    . "```\n\n"
                    . "## Routing Statis & Default Route\n"
                    . "```\n"
                    . "ip route 10.0.0.0 255.255.255.0 192.168.1.2   ! Static route\n"
                    . "ip route 0.0.0.0 0.0.0.0 192.168.1.1          ! Default route\n"
                    . "```\n\n"
                    . "## Show Commands Penting\n"
                    . "```\n"
                    . "show ip interface brief   ! Status + IP semua interface\n"
                    . "show ip route             ! Tabel routing\n"
                    . "show running-config       ! Konfigurasi di RAM\n"
                    . "show version              ! Info IOS & hardware\n"
                    . "```\n\n"
                    . "## Password & Keamanan CLI\n"
                    . "```\n"
                    . "enable secret cisco123           ! Password privilege (terenkripsi)\n"
                    . "line vty 0 4\n"
                    . " password cisco123\n"
                    . " login\n"
                    . " transport input ssh             ! Hanya izinkan SSH\n"
                    . "service password-encryption      ! Enkripsi semua password\n"
                    . "```",
                'video_url'   => 'https://www.youtube.com/embed/X7f5sgfAsAo',
            ],
            [
                'topic_id'    => $t4,
                'title'       => 'Konfigurasi VLAN & Inter-VLAN Routing',
                'description' => 'Membuat VLAN pada switch, trunk port, dan router-on-a-stick.',
                'content'     => "VLAN memisahkan satu jaringan fisik menjadi beberapa broadcast domain logis.\n\n"
                    . "## Membuat VLAN di Switch\n"
                    . "```\n"
                    . "vlan 10\n"
                    . " name SISWA\n"
                    . "vlan 20\n"
                    . " name GURU\n"
                    . "```\n\n"
                    . "## Access Port (menghubungkan PC ke VLAN)\n"
                    . "```\n"
                    . "interface Fa0/1\n"
                    . " switchport mode access\n"
                    . " switchport access vlan 10\n"
                    . "```\n\n"
                    . "## Trunk Port (antara switch dan router)\n"
                    . "```\n"
                    . "interface Fa0/24\n"
                    . " switchport mode trunk\n"
                    . " switchport trunk allowed vlan 10,20\n"
                    . "```\n\n"
                    . "## Router-on-a-Stick (Inter-VLAN Routing)\n"
                    . "```\n"
                    . "interface Gi0/0.10\n"
                    . " encapsulation dot1Q 10\n"
                    . " ip address 192.168.10.1 255.255.255.0\n"
                    . "interface Gi0/0.20\n"
                    . " encapsulation dot1Q 20\n"
                    . " ip address 192.168.20.1 255.255.255.0\n"
                    . "```\n\n"
                    . "## Protokol Routing Dinamis\n"
                    . "- **OSPF** (Link-State): Metrik = Cost (berdasarkan bandwidth). AD = 110.\n"
                    . "- **EIGRP** (Hybrid): Metrik gabungan. AD = 90. Milik Cisco.\n"
                    . "- **RIPv2** (Distance Vector): Metrik = Hop count, maks 15 hop. AD = 120.",
                'video_url'   => 'https://www.youtube.com/embed/HD4W_ie7Ykw',
            ],

            // ── Topik 5: Troubleshooting Jaringan ───────────────────────
            [
                'topic_id'    => $t5,
                'title'       => 'Teknik Troubleshooting Jaringan Langkah demi Langkah',
                'description' => 'Metodologi sistematis troubleshooting menggunakan ping, tracert, ipconfig, dan netstat.',
                'content'     => "Troubleshooting jaringan dilakukan secara sistematis, dari lapisan bawah ke atas (Bottom-Up).\n\n"
                    . "## Tahapan Bottom-Up\n"
                    . "1. **Layer 1 (Physical)**: Cek kabel, lampu NIC/switch, koneksi RJ-45.\n"
                    . "2. **Layer 2 (Data Link)**: Cek MAC address, ARP table.\n"
                    . "3. **Layer 3 (Network)**: Cek IP, subnet mask, gateway, routing.\n"
                    . "4. **Layer 4+**: Cek port, firewall, aplikasi.\n\n"
                    . "## Perintah Diagnostik Windows\n"
                    . "| Perintah | Fungsi |\n"
                    . "|---------|-------|\n"
                    . "| `ipconfig /all` | Lihat IP, MAC, DHCP, DNS |\n"
                    . "| `ping <IP>` | Uji konektivitas (ICMP) |\n"
                    . "| `tracert <IP>` | Lacak jalur hop ke tujuan |\n"
                    . "| `nslookup <domain>` | Diagnosa DNS |\n"
                    . "| `netstat -an` | Lihat port yang terbuka |\n"
                    . "| `arp -a` | Lihat cache ARP |\n"
                    . "| `ipconfig /release` | Lepaskan IP dari DHCP |\n"
                    . "| `ipconfig /renew` | Minta IP baru dari DHCP |\n"
                    . "| `ipconfig /flushdns` | Hapus cache DNS |\n\n"
                    . "## Pesan Error Umum\n"
                    . "- **Request Timed Out**: Host tidak merespons (bisa karena firewall atau tidak ada rute).\n"
                    . "- **Destination Host Unreachable**: Tidak ada rute menuju host tujuan.\n"
                    . "- **TTL Expired in Transit**: Paket melewati terlalu banyak router (loop routing?).\n"
                    . "- **IP 169.254.x.x (APIPA)**: DHCP server tidak ditemukan.\n\n"
                    . "## Alat Fisik\n"
                    . "- **LAN Tester**: Cek urutan kabel UTP dan ada tidaknya putus.\n"
                    . "- **OTDR**: Untuk fiber optic – deteksi redaman, lokasi patahan, panjang kabel.",
                'video_url'   => 'https://www.youtube.com/embed/AimCNTzDlVo',
            ],
            [
                'topic_id'    => $t5,
                'title'       => 'Troubleshooting Koneksi & Broadcast Storm',
                'description' => 'Ping, tracert, netstat, ARP, looping switch, dan Spanning Tree Protocol.',
                'content'     => "## Kabel Straight-through vs Crossover\n"
                    . "- **Straight-through**: PC ↔ Switch, Router ↔ Switch.\n"
                    . "- **Crossover**: PC ↔ PC, Switch ↔ Switch.\n"
                    . "- Perangkat modern mendukung **Auto-MDI/MDIX** (otomatis mendeteksi jenis kabel).\n\n"
                    . "## Broadcast Storm (Looping Layer 2)\n"
                    . "- Terjadi saat ada loop fisik antar switch **tanpa** STP.\n"
                    . "- Gejala: Semua lampu port berkedip sangat cepat, jaringan lumpuh.\n"
                    . "- Solusi: Aktifkan **STP (Spanning Tree Protocol)** → IEEE 802.1D.\n"
                    . "- STP memilih satu jalur aktif dan memblokir jalur redundan.\n\n"
                    . "## IP Conflict\n"
                    . "- Dua perangkat memiliki IP yang sama.\n"
                    . "- Gejala: Koneksi putus-nyambung, notifikasi 'IP address conflict'.\n"
                    . "- Solusi: Gunakan DHCP atau atur IP statis dengan cermat.\n\n"
                    . "## Asymmetric Routing\n"
                    . "- Paket pergi melewati jalur A, balasannya melewati jalur B.\n"
                    . "- Biasanya terjadi pada jaringan multi-homed (banyak ISP).\n"
                    . "- Bisa menyebabkan stateful firewall menolak paket balasan.",
                'video_url'   => '',
            ],

            // ── Topik 6: Keamanan Jaringan ───────────────────────────────
            [
                'topic_id'    => $t6,
                'title'       => 'Pengantar Keamanan Jaringan & CIA Triad',
                'description' => 'Ancaman siber, CIA Triad, firewall, enkripsi, dan protokol aman.',
                'content'     => "Keamanan jaringan bertujuan melindungi data dan sistem dari akses tidak sah.\n\n"
                    . "## CIA Triad\n"
                    . "- **Confidentiality**: Data hanya bisa diakses oleh pihak yang berwenang.\n"
                    . "- **Integrity**: Data tidak berubah selama pengiriman.\n"
                    . "- **Availability**: Sistem selalu tersedia saat dibutuhkan.\n\n"
                    . "## Jenis Ancaman\n"
                    . "| Ancaman | Penjelasan |\n"
                    . "|---------|----------|\n"
                    . "| **DDoS** | Membanjiri server dengan trafik palsu hingga lumpuh |\n"
                    . "| **Phishing** | Menipu korban agar menyerahkan password/data |\n"
                    . "| **Ransomware** | Mengunci file, meminta tebusan |\n"
                    . "| **MitM** | Menyusup di antara dua pihak komunikasi |\n"
                    . "| **IP Spoofing** | Memalsukan alamat IP asal |\n"
                    . "| **ARP Spoofing** | Meracuni tabel ARP untuk MitM di LAN |\n\n"
                    . "## Firewall & ACL\n"
                    . "- **Firewall**: Menyaring paket masuk/keluar berdasarkan aturan (rule).\n"
                    . "- **ACL (Access Control List)**: Aturan pada router untuk memfilter IP/port.\n"
                    . "  - Standard ACL: Berdasarkan IP sumber.\n"
                    . "  - Extended ACL: Berdasarkan IP sumber, tujuan, dan port.\n\n"
                    . "## Protokol Aman vs Tidak Aman\n"
                    . "| Tidak Aman | Aman | Port |\n"
                    . "|-----------|------|------|\n"
                    . "| Telnet | SSH | 22 |\n"
                    . "| HTTP | HTTPS | 443 |\n"
                    . "| FTP | SFTP/FTPS | 22/990 |",
                'video_url'   => 'https://www.youtube.com/embed/gx0vlRpdFnc',
            ],
            [
                'topic_id'    => $t6,
                'title'       => 'Enkripsi, VPN, dan Keamanan Nirkabel',
                'description' => 'Algoritma enkripsi, VPN, WPA2, IDS/IPS, dan keamanan perangkat jaringan.',
                'content'     => "## Enkripsi\n"
                    . "- **Enkripsi Simetris**: Satu kunci untuk enkripsi & dekripsi. Contoh: **AES**, DES.\n"
                    . "- **Enkripsi Asimetris**: Kunci publik & privat berbeda. Contoh: RSA.\n"
                    . "- **Hashing**: Satu arah, tidak bisa di-decrypt. Contoh: MD5, SHA-256 (untuk verifikasi integritas).\n\n"
                    . "## VPN (Virtual Private Network)\n"
                    . "- Membuat tunnel aman melalui internet publik.\n"
                    . "- Protokol: **IPSec**, SSL/TLS, OpenVPN.\n"
                    . "- Digunakan untuk akses jaringan kantor dari rumah secara aman.\n\n"
                    . "## Keamanan Wi-Fi\n"
                    . "| Protokol | Keamanan | Keterangan |\n"
                    . "|---------|---------|----------|\n"
                    . "| WEP | Sangat Lemah | Sudah usang, mudah dibobol |\n"
                    . "| WPA | Lemah | Rentan terhadap beberapa serangan |\n"
                    . "| **WPA2-PSK** | Kuat | Standar saat ini (AES) |\n"
                    . "| **WPA3** | Sangat Kuat | Rekomendasi terbaru |\n\n"
                    . "## IDS vs IPS\n"
                    . "- **IDS** (Intrusion Detection System): Mendeteksi ancaman & memberi peringatan, **tidak memblokir**.\n"
                    . "- **IPS** (Intrusion Prevention System): Mendeteksi **dan secara aktif memblokir** ancaman.\n\n"
                    . "## Port Security (Switch Cisco)\n"
                    . "```\n"
                    . "switchport port-security\n"
                    . "switchport port-security maximum 2\n"
                    . "switchport port-security violation shutdown\n"
                    . "switchport port-security mac-address sticky\n"
                    . "```",
                'video_url'   => '',
            ],
        ];

        $insertData = [];
        foreach ($materials as $m) {
            $insertData[] = array_merge($m, ['created_at' => $now, 'updated_at' => $now]);
        }

        foreach (array_chunk($insertData, 10) as $chunk) {
            Material::insert($chunk);
        }
    }
}
