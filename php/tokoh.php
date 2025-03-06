<?php
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Tokoh Kreatif</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000000;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #000000;
            color: rgb(0, 0, 0);
            padding: 10px 20px;
        }

        .logo img {
            width: 40px;
            height: auto;
            vertical-align: middle; 
            border: #f4f4f4;
        }

        nav {
            background-color: transparent;
            display: flex;
            align-items: center;
        }

        ul {
            list-style: none;
            padding: 0;
            display: flex;
            margin: 0; 
            flex-grow: 1; 
        }

        li {
            margin: 0 15px;
        }

        .nav-item {
            text-decoration: none;
            color: rgb(255, 255, 255);
            padding: 10px 15px;
            position: relative; 
        }

        .nav-item:hover {
            color: #ffbd3a; 
        }

        .nav-item:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            height: 2px;
            width: 0;
            background: #ffbd3a;
            transition: width 0.3s;
        }

        .nav-item:hover:after {
            width: 100%;
        }

        .nav-item:active:after {
            width: 100%;
        }

     .cta-button {
            background-color: #000000;
            color: #fff; 
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none; 
            transition: background 0.5s ease;
            border: 2px solid #b7980f;
        }

        .cta-button:hover {
            background-color: #b7980f;
            color: black; 
        }

        .crud-button {
            background-color: #ffbd3a;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.5s ease;
            margin-left: 10px;
        }
        .crud-button:hover {
            background-color:rgb(0, 0, 0);
            color: white;
        }

        .profile {
            background: #ffbd3a;
            margin: 20px 0;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px #fff;
            display: flex;
            align-items: center;
            transition: transform 0.3s;
        }

        .profile:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .profile img {
            border-radius: 10px;
            width: 150px;
            height: 150px;
            margin-right: 20px;
        }

        .profile h2 {
            margin-top: 0;
            color: #333;
        }

        .profile p {
            color: #666;
            line-height: 1.6;
        }

        .profile:nth-child(even) {
            flex-direction: row-reverse;
        }

        footer {
            text-align: center;
            padding: 20px 0;
            background-color: #333;
            color: #fff;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        @media (max-width: 768px) {
            .profile {
                flex-direction: column;
                align-items: flex-start;
            }

            .profile img {
                margin-bottom: 15px;
            }
        }
        footer {
            background-color: #1A1A1A; 
            color: #f4f4f4; 
            padding: 20px 0; 
            display: flex; 
            justify-content: space-between; 
            align-items: flex-start; 
            height: auto; 
        }

        .social-media {
            flex: 1; 
            text-align: left; 
            margin-left: 20px;
        }

        .social-media h3 {
            margin-bottom: 10px;
        }

        .social-media a {
            color: #f4f4f4; 
            text-decoration: none;
            display: flex; 
            align-items: center; 
            margin-bottom: 10px; 
        }

        .social-media img {
            width: 40px; 
            height: auto; 
            margin-right: 10px;
        }

        .contact-info {
            flex: 1; 
            text-align: justify; 
            margin-right: 20px;
        }

        .contact-info h3 {
            margin-bottom: 10px;
        }

        .contact-info a {
            color: #ffbd69; 
            text-decoration: none;
        }
    </style>
</head>
<body>
    <header>
    <nav>
        <div class="logo">
            
            <img src="logo ukl 3 (1).png" alt="logo">
        </div>
        <ul class="nav-list">
            <li><a href="landingpage.php" class="nav-item">Home</a></li>
            <li><a href="about.php" class="nav-item">About</a></li>
            <li><a href="edukasi.php" class="nav-item">Edukasi</a></li>
            <li><a href="tokoh.php" class="nav-item">Tokoh</a></li>
        </ul>
        <?php if ($loggedInUser): ?>
            <a href="/ukl_fawwaz/html/dashboard.php" class="cta-button"><?php echo htmlspecialchars($loggedInUser); ?></a>
            <a href="/ukl_fawwaz/html/user.php" class="crud-button">Profile</a>
        <?php else: ?>
            <a href="/ukl_fawwaz/html/login.php" id="loginButton" class="cta-button">Login</a>
        <?php endif; ?>
    </nav>
    </header>

    <div class="container">
        <div class="profile">
            <img src="profil1.png" alt="Steve Jobs">
            <div>
                <h2>Steve Jobs</h2>
                <p><strong>Posisi:</strong> Pendiri Apple Inc.</p>
                <p>Steve Jobs (24 Februari 1955 – 5 Oktober 2011) adalah seorang pengusaha, inovator, dan tokoh visioner di dunia teknologi asal Amerika Serikat. Ia dikenal sebagai salah satu pendiri Apple Inc., perusahaan teknologi yang merevolusi industri dengan produk-produk inovatif seperti komputer Macintosh, iPod, iPhone, dan iPad. Jobs juga memimpin lahirnya toko aplikasi (App Store), yang mengubah cara dunia mengakses perangkat lunak dan layanan digital.

                    Selain perannya di Apple, Jobs turut membangun Pixar Animation Studios, yang menciptakan film-film animasi pemenang penghargaan seperti Toy Story dan Finding Nemo. Ia dikenal karena gaya kepemimpinannya yang perfeksionis, kemampuannya membaca kebutuhan pasar, dan visinya yang berani untuk menggabungkan seni dan teknologi. Setelah sempat meninggalkan Apple pada 1985, Jobs kembali pada 1997 dan membangun kembali perusahaan tersebut menjadi salah satu yang paling berharga di dunia. Warisannya terus hidup melalui produk dan ide-idenya yang telah mengubah cara manusia berkomunikasi, bekerja, dan menikmati hiburan.</p>
            </div>
        </div>

        <div class="profile">
            <img src="profil2.png" alt="Walt Disney">
            <div>
                <h2>Walt Disney</h2>
                <p><strong>Posisi:</strong> Pendiri The Walt Disney Company</p>
                <p>Walt Disney (5 Desember 1901 – 15 Desember 1966) adalah seorang produser film, animator, sutradara, dan pengusaha asal Amerika Serikat yang dikenal sebagai pelopor industri animasi modern. Ia mendirikan The Walt Disney Company, yang berkembang menjadi salah satu perusahaan hiburan terbesar di dunia. Disney terkenal karena menciptakan karakter ikonik seperti Mickey Mouse, yang menjadi simbol budaya global, dan mengembangkan pendekatan inovatif dalam animasi, seperti film animasi panjang pertama, Snow White and the Seven Dwarfs (1937).

                    Selain kesuksesan dalam animasi, Disney juga merevolusi hiburan dengan membangun taman tematik pertama, Disneyland, yang dibuka pada tahun 1955. Visinya untuk menciptakan tempat di mana "orang dewasa dan anak-anak dapat bersenang-senang bersama" mengubah pengalaman hiburan keluarga secara global. Meskipun meninggal pada usia 65 tahun, warisan Walt Disney terus hidup melalui karya-karyanya, taman hiburan, dan pengaruh besarnya dalam dunia seni dan hiburan. Ia dianggap sebagai salah satu figur paling kreatif dan berpengaruh dalam sejarah industri kreatif.</p>
            </div>
        </div>

        <div class="profile">
            <img src="profil3.png" alt="Oprah Winfrey">
            <div>
                <h2>Oprah Winfrey</h2>
                <p><strong>Posisi:</strong> Pembawa Acara dan Filantropis</p>
                <p>Oprah Winfrey (lahir 29 Januari 1954 di Kosciusko, Mississippi, Amerika Serikat) adalah seorang pembawa acara televisi, produser, aktris, pengusaha, dan filantropis yang dikenal sebagai salah satu tokoh paling berpengaruh di dunia. Ia mencapai ketenaran melalui acara bincang-bincang legendarisnya, The Oprah Winfrey Show, yang tayang dari 1986 hingga 2011 dan menjadi salah satu program televisi dengan rating tertinggi sepanjang masa. Acara ini tidak hanya menghibur tetapi juga menginspirasi jutaan orang dengan tema pemberdayaan, literasi, dan penyembuhan emosional.

                    Selain karier di media, Oprah juga sukses sebagai pengusaha dengan mendirikan perusahaan Harpo Productions dan jaringan televisi OWN (Oprah Winfrey Network). Ia adalah miliarder Afrika-Amerika pertama di dunia dan dikenal karena komitmennya terhadap filantropi, termasuk mendirikan Oprah Winfrey Leadership Academy for Girls di Afrika Selatan. Kehidupannya, dari masa kecil yang penuh tantangan hingga menjadi salah satu perempuan paling berpengaruh di dunia, menjadikannya simbol kekuatan, ketekunan, dan transformasi.</p>
            </div>
        </div>

        <div class="profile">
            <img src="4.png" alt="J.K. Rowling">
            <div>
                <h2>J.K. Rowling</h2>
                <p><strong>Posisi:</strong> Penulis</p>
                <p>J.K. Rowling, lahir pada 31 Juli 1965 di Yate, Gloucestershire, Inggris, adalah seorang penulis, produser film, dan filantropis yang dikenal luas sebagai pencipta seri novel Harry Potter. Seri ini, yang terdiri dari tujuh buku, telah terjual lebih dari 500 juta kopi di seluruh dunia dan diterjemahkan ke dalam lebih dari 80 bahasa, menjadikannya salah satu waralaba paling sukses sepanjang masa. Kisah Harry Potter tidak hanya mengubah dunia literatur anak-anak tetapi juga diadaptasi menjadi delapan film blockbuster yang mendunia.

                    Selain sukses sebagai penulis, Rowling aktif dalam berbagai kegiatan filantropi, terutama melalui organisasi amal yang ia dirikan, seperti Lumos dan The Volant Charitable Trust, yang mendukung anak-anak yang kurang beruntung. Sebelum mencapai kesuksesan besar, Rowling pernah menghadapi masa sulit sebagai ibu tunggal dengan kondisi ekonomi yang berat. Kisah hidupnya yang menginspirasi, dari perjuangan hingga keberhasilan, telah menjadikannya figur ikonik dalam dunia sastra dan hiburan.</p>
            </div>
        </div>

        <div class="profile">
            <img src="5.png" alt="Elon Musk">
            <div>
                <h2>Elon Musk</h2>
                <p><strong>Posisi:</strong> CEO Tesla dan SpaceX</p>
                <p>Elon Musk (lahir 28 Juni 1971, Pretoria, Afrika Selatan) adalah pengusaha visioner di bidang teknologi. Sejak kecil, ia tertarik pada komputer dan teknologi, menciptakan game Blastar di usia 12 tahun. Setelah pindah ke Kanada, ia menempuh pendidikan di Universitas Pennsylvania dan memulai kariernya di Amerika Serikat. 

                    Musk mendirikan perusahaan-perusahaan revolusioner seperti PayPal (sistem pembayaran digital), Tesla (kendaraan listrik), SpaceX (eksplorasi luar angkasa), dan The Boring Company (infrastruktur transportasi). Ia juga terlibat dalam proyek seperti Neuralink (teknologi otak) dan Starlink (internet berbasis satelit). Dikenal sebagai tokoh yang ambisius, Musk berfokus pada energi terbarukan, transportasi berkelanjutan, dan eksplorasi Mars.</p>
            </div>
        </div>

        <div class="profile">
            <img src="6.png" alt="Frida Kahlo">
            <div>
                <h2>Frida Kahlo</h2>
                <p><strong>Posisi:</strong> Pelukis</p>
                <p>Frida Kahlo (6 Juli 1907 – 13 Juli 1954) adalah seorang seniman ikonik asal Meksiko yang dikenal karena lukisan-lukisan potret dirinya yang emosional dan penuh simbolisme. Karya-karyanya menggabungkan elemen realisme dan surealisme, sering kali menggambarkan perjuangan pribadi, rasa sakit fisik, dan identitasnya sebagai perempuan serta warga Meksiko. Lukisan-lukisan Kahlo, seperti The Two Fridas dan Self-Portrait with Thorn Necklace and Hummingbird, mencerminkan pengalamannya hidup dengan rasa sakit akibat penyakit polio di masa kecil dan cedera parah dari kecelakaan bus yang nyaris fatal di usia 18 tahun.

                    Selain karya seninya, Kahlo juga dikenal sebagai simbol budaya Meksiko dan feminisme. Kehidupannya yang penuh warna dan hubungan kontroversialnya dengan pelukis terkenal Diego Rivera menambah daya tariknya sebagai figur publik. Warisan Frida Kahlo tetap hidup sebagai ikon global yang melampaui seni, mewakili semangat pemberdayaan, ketahanan, dan cinta terhadap budaya pribumi Meksiko. Rumah masa kecilnya, La Casa Azul, kini menjadi museum untuk menghormati kehidupannya.</p>
            </div>
        </div>
        
        <footer>
            <div class="social-media">
                <h3>Ikuti Kami di Media Sosial</h3>
                <a href="https://www.tiktok.com">
                    <img src="logo tiktok.png" alt="Tiktok Logo"> Tiktok
                </a>
                <a href="https://www.instagram.com/pawassxac/profilecard/?igsh=dmY5ZWh3dHM0NnR3">
                    <img src="logo ig.png" alt="Instagram Logo" style="width: 40px;"> Instagram
                </a>
                <a href="https://www.twitter.com">
                    <img src="logo x.png" alt="Twitter Logo"> Twitter
                </a>
                <a href="https://www.facebook.com">
                    <img src="logo fb.png" alt="Facebook Logo"> Facebook
                </a>
            </div>
            <div class="contact-info">
                <h3>Kontak Pribadi</h3>
                <p>Email: <a href="mailto:fawwazsetiawan02@gmail.com">fawwazsetiawan02@gmail.com</a></p>
                <p>Telepon: <a href="tel:+6285731593391">+62 857-3159-3391</a></p>
            </div>
        </footer>
</body>
</html>