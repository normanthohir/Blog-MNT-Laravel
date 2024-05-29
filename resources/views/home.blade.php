@extends('layouts.main')

@section('container')
    <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
        <div class="col-lg-6 px-0">
            <h1 class="display-4 fst-italic">{{ $posts[0]->title }}</h1>
            <p class="lead my-3">{{ $posts[0]->excerpt }}</p>
            <p class="lead mb-0"><a href="/post/{{ $posts[0]->slug }}" class="text-body-emphasis fw-bold">Read more...</a></p>
        </div>
    </div>
    <div class="row ">
        <div class="col-md-8 mb-3">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">
                From the Firehose
            </h3>

            <article class="blog-post">
                <h2 class="display-5 link-body-emphasis mb-1">{{ $randomPost->title }}</h2>
                <p class="blog-post-meta">{{ $randomPost->created_at->format('d M Y') }} <a
                        href="/posts?author={{ $randomPost->author->username }}">{{ $randomPost->author->name }}</a></p>

                <p>{{ Illuminate\Support\Str::limit(strip_tags($randomPost->body), 500) }}</p>
                <hr>

                <h2 class="mt-5">Blockquotes</h2>
                <blockquote class="blockquote">
                    <p>{{ $posts[1]->author->name }}</p>
                </blockquote>
                <p>Jangan takut untuk melakukan langkah besar. Ingatlah bahwa sebuah kapal selalu aman di pelabuhan, tetapi
                    kapal tidak diciptakan untuk berlabuh di sana. Ketika kita memasuki wilayah ketidaknyamanan, kita
                    membuka pintu untuk pertumbuhan dan perkembangan yang luar biasa.</p>
                <hr>
                <h3>Selamat Datang di MNT Blog</h3>
                <p>Masa Depan Teknologi Quantum.</p>
                <ul>
                    <li>First list item: Prinsip dasar komputasi kuantum</li>
                    <li>Implementasi dalam industri dan riset</li>
                    <li>Tantangan yang dihadapi dalam mengembangkan teknologi ini</li>
                </ul>
                <p>Terima kasih telah mengunjungi blog kami. Semoga Anda menikmati konten kami!</p>
                <hr>
                {{-- <p>And this is a definition list:</p>
                <dl>
                    <dt>HyperText Markup Language (HTML)</dt>
                    <dd>The language used to describe and define the content of a Web page</dd>
                    <dt>Cascading Style Sheets (CSS)</dt>
                    <dd>Used to describe the appearance of Web content</dd>
                    <dt>JavaScript (JS)</dt>
                    <dd>The programming language used to build advanced Web sites and applications</dd>
                </dl> --}}
                <h2 class="mt-5">Enam Menerima Informasi Yang Benar</h2>
                <p>berikut adalah enam cara untuk memastikan Anda menerima informasi yang benar:</p>
                <ul class="mb-5">
                    <li>Periksa Sumber Resmi</li>
                    <li>Verifikasi Fakta (Fact-Checking)</li>
                    <li>Cek Tanggal Publikasi</li>
                    <li>Perhatikan Gaya Bahasa yang Netral</li>
                    <li>Cek Kredibilitas Penulis</li>
                    <li>Cross-Check dengan Sumber Lain</li>
                </ul>
                <hr>
                @foreach ($randomPosts as $post)
                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->excerpt }}</p>
                    <hr>
                @endforeach

            </article>

            @auth
                <article class="blog-post mt-3">
                    <h2 class=" link-body-emphasis mb-1">Selamat Bergabung dengan MNT Blog - Mulai Petualangan Menulismu!</h2>
                    <p class="blog-post-meta">Hai Penulis Berbakat!</p>
                    <p>Terima kasih telah mendaftar atau login ke MNT Blog! Kamu telah memasuki dunia menakjubkan kami di
                        mana kata-kata memiliki kekuatan untuk menginspirasi dan menghubungkan.</p>

                    <p>Terima kasih atas keanggotaanmu di MNT Blog. Kami sangat senang memilikimu sebagai bagian dari
                        komunitas kami, dan kami tak sabar untuk membaca karya brilianmu!</p>
                </article>

                <nav class="blog-pagination " aria-label="Pagination">
                    <a class="btn btn-outline-primary " href="/dashboard">Dashboard</a>
                </nav>
            @else
                <article class="blog-post mt-3">
                    <h2 class=" link-body-emphasis mb-1">Bergabunglah dalam Petualangan Kata-kata: Jelajahi Kekayaan
                        Dunia Melalui Tulisanmu!</h2>
                    <p class="blog-post-meta">Hai Penulis Berbakat!</p>
                    <p>Apakah dunia kata-kata adalah panggungmu? Apakah kamu memiliki hasrat untuk mengekspresikan ide-ide
                        indahmu melalui tulisan? Jika ya, maka saatnya untuk memasuki dunia menakjubkan kami di MNT Blog.
                        Kami mencari para penulis berbakat yang ingin berbagi pemikiran, inspirasi, dan pengalaman mereka dengan
                        audiens yang lapar akan pengetahuan.</p>

                    <p>Bergabunglah dengan kami di MNT Blog dan biarkan kata-katamu menjadi cahaya yang menerangi dunia.
                        Jadilah bagian dari komunitas penulis yang inspiratif dan wujudkan impian menulismu bersama kami!</p>
                </article>

                <nav class="blog-pagination " aria-label="Pagination">
                    <a class="btn btn-outline-primary  m-2" href="/register">Daftar</a>
                    <a class="btn btn-primary" href="/login">Login</a>
                </nav>
            @endauth



        </div>

        <div class="col-md-4">
            <div class="position-sticky" style="top: 2rem;">
                <div class="p-4 mb-3 bg-body-tertiary rounded">
                    <h4 class="fst-italic">About</h4>
                    <p class="mb-0">MNT BLog adalah sebuah platform yang didedikasikan untuk menjelajahi dan membagikan
                        pengetahuan mendalam tentang ilmu teknologi. Dengan semangat untuk mendemistifikasi konsep-konsep
                        kompleks, kami resmi diluncurkan pada 30 Mey 2023 sebagai sumber inspirasi dan pembelajaran untuk
                        para pecinta ilmu pengetahuan dan teknologi.</p>
                </div>

                <div>
                    <h4 class="fst-italic">Recent posts</h4>
                    <ul class="list-unstyled">
                        @foreach ($posts->take(4) as $post)
                            <li>
                                <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                                    href="/post/{{ $post->slug }}">
                                    @if ($post->image)
                                        <img src="{{ asset('storage/' . $post->image) }}"
                                            alt="{{ $post->category->name }}" width="100%" height="96">
                                    @else
                                        <img src="https://source.unsplash.com/600x400?{{ $post->category->name }}"
                                            class="card-img-top" alt="{{ $post->category->name }}" width="100%"
                                            height="96">
                                    @endif

                                    <div class="col-lg-8">
                                        <h6 class="mb-0">{{ $post->title }}</h6>
                                        <small
                                            class="text-body-secondary">{{ $post->created_at->format('F j, Y') }}</small>
                                    </div>
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>
                <div class="p-4">
                    <h4 class="fst-italic">Category</h4>
                    <ol class="list-unstyled">
                        @foreach ($categories as $category)
                            <li><a href="/posts?category={{ $category->slug }}">{{ $category->name }}</a></li>
                        @endforeach

                    </ol>
                </div>
                {{-- <div class="p-4">
                    <h4 class="fst-italic">Archives</h4>
                    <ol class="list-unstyled mb-0">
                        <li><a href="#">March 2021</a></li>
                        <li><a href="#">February 2021</a></li>
                        <li><a href="#">January 2021</a></li>
                        <li><a href="#">December 2020</a></li>
                        <li><a href="#">November 2020</a></li>
                        <li><a href="#">October 2020</a></li>
                        <li><a href="#">September 2020</a></li>
                        <li><a href="#">August 2020</a></li>
                        <li><a href="#">July 2020</a></li>
                        <li><a href="#">June 2020</a></li>
                        <li><a href="#">May 2020</a></li>
                        <li><a href="#">April 2020</a></li>
                    </ol>
                </div> --}}

                <div class="p-4">
                    <h4 class="fst-italic">Elsewhere</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">GitHub</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
