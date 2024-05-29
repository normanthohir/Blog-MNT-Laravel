@extends('layouts.main')

@section('container')
    <main id="main">
        <section>
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-12 text-center mb-5">
                        <h1 class="display-3">About us</h1>
                    </div>
                </div>

                <div class="row mb-5">

                    <div class="d-md-flex post-entry-2 half mb-5">
                        <a href="#" class="me-4 thumbnail">
                            <img src="/img/post-landscape-2.jpg" alt="" style="width: 150rem; height: 24rem"
                                class="img-fluid">
                        </a>
                        <div class="ps-md-5 mt-4 mt-md-0">
                            <div class="post-meta mt-4" style="color: rgba(0, 0, 0, 0.623)">About us</div>
                            <h2 class="mb-4 display-3">Company History</h2>
                            <p>
                                MNT BLog adalah sebuah platform yang didedikasikan untuk menjelajahi
                                dan membagikan pengetahuan mendalam tentang ilmu teknologi. Dengan semangat untuk
                                mendemistifikasi konsep-konsep kompleks, kami resmi diluncurkan pada 30 Mey 2023
                                sebagai sumber inspirasi dan pembelajaran untuk para pecinta ilmu pengetahuan dan teknologi.
                            </p>

                            <p>
                                Pendiri:
                                Muhammad Norman, seorang pemerhati ilmuwan dan teknologi dengan hasrat yang mendalam
                                terhadap
                                penelitian dan inovasi. Dedikasi kami terhadap eksplorasi ilmu pengetahuan dan teknologi
                                telah mendorong kami untuk memulai MNT Blog sebagai wahana bagi
                                diskusi mendalam tentang topik-topik yang relevan dalam dunia ilmu teknologi.
                            </p>

                        </div>
                    </div>

                    <div class="d-md-flex post-entry-2 half mt-5">
                        <a href="#" class="me-4 thumbnail order-2">
                            <img src="/img/post-landscape-2.jpg" alt="" style="width: 150rem; height: 24rem"
                                class="img-fluid">
                        </a>
                        <div class="pe-md-5 mt-4 mt-md-0">
                            <div class="post-meta mt-4">Mission &amp; Vision</div>
                            <h2 class="mb-4 display-4">Mission &amp; Vision</h2>

                            <p>Visi kami adalah menjadi pemimpin global dalam menciptakan teknologi yang mengubah dunia,
                                menciptakan solusi inovatif yang membawa dunia ke dalam era digital yang lebih canggih. Kami
                                bermimpi untuk menciptakan dunia yang lebih terhubung, cerdas, dan berkelanjutan melalui
                                teknologi yang kami hasilkan.</p>
                            <p>Misi dan Visi adalah pernyataan strategis yang harus menggambarkan aspirasi dan komitmen
                                organisasi. Mereka dapat berubah seiring waktu sejalan dengan perkembangan dan perubahan
                                strategis organisasi.
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <br><br>
        <div class="row mb-2">
            @foreach ($posts->take(2) as $post)
                <div class="col-md-6">
                    <div
                        class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <a href="/posts?category={{ $post->category->slug }}"><strong
                                    class="d-inline-block mb-2 text-primary-emphasis">{{ $post->category->name }}</strong></a>
                            <h5 class="mb-0">{{ Illuminate\Support\Str::limit(strip_tags($post->title), 35) }}</h5>
                            <p class="card-text mb-auto" style="font-size: 13px">{{ Illuminate\Support\Str::limit(strip_tags($post->excerpt), 200) }}</p>
                            <a href="/post/{{ $post->slug }}" class="icon-link gap-1 icon-link-hover stretched-link">
                                Read more
                                <svg class="bi">
                                    <use xlink:href="#chevron-right" />
                                </svg>
                            </a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <div>
                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                                        class="img-fluid " style="height: 300px; width: 250px ;">
                                @else
                                    <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}"
                                        class="card-img-top" alt="{{ $post->category->name }}">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        <br><br>
        <section>
            <div class="container" data-aos="fade-up">
                <div class="row text-center">
                    <div class="col-12 text-center mb-5">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <h2 class="display-4">Our Team</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6 r mb-5 ">
                        <img src="/img/person-1.jpg" alt="" class="img-fluid rounded-circle w-50 mb-4">
                        <h4>Muhammad Norman Thohir</h4>
                        <span class="d-block mb-3 text-uppercase">Programing Web &amp; Mobile </span>
                        <p>Kami adalah proyek yang saat ini dikelola oleh satu orang, Muhammad Norman, sebagai pendiri
                            dan satu-satunya anggota tim. Meskipun kami dimulai sebagai upaya individu, kami
                            bersemangat untuk berkembang dan berkolaborasi dengan orang-orang yang berbagi hasrat
                            yang sama untuk Memperkealkan & meberi informsi tentagn Teknologi .

                            Kami percaya bahwa dengan tekad dan kerja keras, kami dapat mencapai visi kami untuk
                            pernyataan tentang apa yang ingin dicapai organisasi di masa depan. dan menyediakan nilai yang
                            berharga kepada komunitas kami.

                            Terima kasih atas dukungan Anda saat ini, dan kami selalu terbuka untuk kemungkinan
                            kolaborasi di masa depan. Jika Anda memiliki pertanyaan atau ingin berkontribusi, jangan
                            ragu untuk menghubungi kami.</p>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
