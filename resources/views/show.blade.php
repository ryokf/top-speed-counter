<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    {{-- navbar start --}}
    <div class="navbar bg-base-100">
        <div class="navbar-start">
            <div class="dropdown">
                <label tabindex="0" class="btn btn-ghost btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                </label>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a>Homepage</a></li>
                    <li><a>Portfolio</a></li>
                    <li><a>About</a></li>
                </ul>
            </div>
        </div>
        <div class="navbar-center">
            <a class="btn btn-ghost normal-case text-xl">daisyUI</a>
        </div>
        <div class="navbar-end">
            <button class="btn btn-ghost btn-circle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
            <button class="btn btn-ghost btn-circle">
                <div class="indicator">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span class="badge badge-xs badge-primary indicator-item"></span>
                </div>
            </button>
        </div>
    </div>
    {{-- navbar end --}}

    {{-- data section start --}}
    <section class="w-5/6 my-10 mx-auto">
        <h1 class="text-4xl font-bold my-8">{{ $vehicle->name }}</h1>

        <img src="{{ asset('img') . '/' . $vehicle->photo }}" alt="">

        <h1 class="text-2xl font-bold my-4">Data kendaraan : </h1>
        <div class="overflow-x-auto w-1/3 border border-gray-500 rounded-md">
            <table class="table border-cyan-300">
                <tr class="hover">
                    <th>torsi</th>
                    <td>{{ $vehicle->torque }} Nm</td>
                </tr>
                <tr class="hover">
                    <th>power</th>
                    <td>{{ $vehicle->power }} Kw</td>
                </tr>
                <tr class="hover">
                    <th>rpm pergantian gigi</th>
                    <td>{{ $vehicle->shifting_rpm }} RPM</td>
                </tr>
                <tr class="hover">
                    <th>batas rpm</th>
                    <td>{{ $vehicle->limit_rpm }} RPM</td>
                </tr>
                <tr class="hover">
                    <th>berat</th>
                    <td>{{ $vehicle->weight }} N</td>
                </tr>
                <tr class="hover">
                    <th>massa</th>
                    <td>{{ $vehicle->mass }} Kg</td>
                </tr>
                <tr class="hover">
                    <th>radius roda</th>
                    <td>{{ $vehicle->wheel_rad }} meter</td>
                </tr>
                <tr class="hover">
                    <th>rasio gear primer</th>
                    <td>{{ $vehicle->primary_gear_ratio }}</td>
                </tr>
                <tr class="hover">
                    <th>rasio gear 1</th>
                    <td>{{ $vehicle->gear_ratio_1 }}</td>
                </tr>
                <tr class="hover">
                    <th>rasio gear 2</th>
                    <td>{{ $vehicle->gear_ratio_2 }}</td>
                </tr>
                <tr class="hover">
                    <th>rasio gear 3</th>
                    <td>{{ $vehicle->gear_ratio_3 }}</td>
                </tr>
                <tr class="hover">
                    <th>rasio gear 4</th>
                    <td>{{ $vehicle->gear_ratio_4 }}</td>
                </tr>
                <tr class="hover">
                    <th>rasio gear 5</th>
                    <td>{{ $vehicle->gear_ratio_5 }}</td>
                </tr>
                <tr class="hover">
                    <th>rasio gear 6</th>
                    <td>{{ $vehicle->gear_ratio_6 }}</td>
                </tr>
                <tr class="hover">
                    <th>rasio gear sekunder</th>
                    <td>{{ $vehicle->secondary_gear_ratio }}</td>
                </tr>
            </table>
        </div>

        <h1 class="text-2xl font-bold my-4">Data Pengendara : </h1>
        <div class="overflow-x-auto w-1/3 border border-gray-500 rounded-md">
            <table class="table border-cyan-300">
                <tr class="hover">
                    <th>berat</th>
                    <td>{{ $rider->weight }} N</td>
                </tr>
                <tr class="hover">
                    <th>massa</th>
                    <td>{{ $vehicle->mass }} kg</td>
                </tr>
            </table>
        </div>
    </section>
    {{-- data section end --}}

    {{-- counting section start --}}
    <section class="w-5/6 my-10 mx-auto">
        @foreach ($data_per_gear as $key => $data)
            <div class="my-10">
                <h1 class="text-2xl font-bold block">Gear {{ ++$key }}</h1>
                <div class="border border-gray-500 rounded-md p-4">
                    <div class="my-4">
                        <h1 class="text-xl font-bold inline">
                            mencari gaya dorong yang diterima roda
                        </h1>
                        <p>untuk mencari berapa gaya dorong yang diterima kendaraan dari roda, terlebih dahulu
                            kita menghitung torsi yang diterima roda dengan cara mengkalikan torsi pada mesin,
                            rasio transmisi, rasio primer, rasio sekunder. </p>
                        <p class="font-bold italic">torsi pada roda = torsi mesin x rasio transmisi x rasio primer x
                            rasio sekunder</p>
                        <p class="font-bold italic">torsi pada roda = {{ $vehicle->torque }} x {{ $gear[$key - 1] }} x
                            {{ $vehicle->primary_gear_ratio }} x {{ $vehicle->secondary_gear_ratio }}
                        </p>
                        <p class="font-bold italic"><span class="bg-red-800">torsi pada roda =
                                {{ $vehicle->torque * $gear[$key - 1] * $vehicle->primary_gear_ratio * $vehicle->secondary_gear_ratio }}
                                Nm
                            </span>
                        </p>
                        <p>setelah diketahui torsi pada roda, kita akan
                            membaginya dengan radius roda untuk mengetahui gaya dorong.</p>
                        <p class="font-bold italic">gaya dorong = torsi pada roda / jari-jari roda</p>
                        <p class="font-bold italic">gaya dorong =
                            {{ $vehicle->torque * $gear[$key - 1] * $vehicle->primary_gear_ratio * $vehicle->secondary_gear_ratio }}
                            /
                            {{ $vehicle->wheel_rad }}</p>
                        <p class="font-bold italic"><span class="bg-red-800"> gaya dorong = {{ $data[0] }} N
                            </span>
                        </p>
                    </div>
                    <div class="my-4">
                        <h1 class="text-xl font-bold inline">
                            mencari gaya gesek yang diterima kendaraan
                        </h1>
                        <p>untuk mencari berapa gaya dorong yang diterima kendaraan, kita harus mencari gaya normal yang
                            bekerja pada kendaraan terlebih dahulu dengan cara menjumlahkan berat kendaraan dan berat
                            pengendara. setelah itu, hasil penjumlahan tadi kita kalikan dengan koefisien gesek (pada
                            ajang motogp, koefisien gesek biasanya bernilai 1.0) </p>
                        <p class="font-bold italic">gaya gesek = (berat kendaraan + berat pengendara) x koefisien gesek
                        </p>
                        <p class="font-bold italic">gaya gesek = ({{ $vehicle->weight }} + {{ $rider->weight }}) x 1
                        </p>
                        <p class="font-bold italic"><span class="bg-red-800"> gaya gesek =
                                {{ $data[1] }} N
                            </span></p>
                    </div>
                    <div class="my-4">
                        <h1 class="text-xl font-bold inline">
                            mencari resultan gaya yang diterima kendaraan
                        </h1>
                        <p>untuk mencari resultan gaya yang diterima kendaraan, kita bisa mengkurangkan gaya dorong
                            dengan gaya gesek pada kendaraan.</p>
                        <p class="font-bold italic">resultan gaya = gaya dorong - gaya gesek
                        </p>
                        <p class="font-bold italic">resultan gaya = {{ $data[0] }} - {{ $data[1] }}
                        </p>
                        <p class="font-bold italic"><span class="bg-red-800"> resultan gaya =
                                {{ $data[2] }} N
                            </span></p>

                    </div>
                    <div class="my-4">
                        <h1 class="text-xl font-bold inline">
                            mencari percepatan kendaraan
                        </h1>
                        <p>berdasarkan pada hukum newton II, Percepatan sebuah benda yang dihasilkan oleh gaya
                            berbanding lurus dengan besarnya gaya, searah dengan gaya, dan berbanding terbalik dengan
                            massa benda.</p>
                        <p class="font-bold italic">percepatan = resultan gaya / massa</p>
                        <p class="font-bold italic">percepatan = {{ $data[2] }} / ({{ $vehicle->mass }} +
                            {{ $rider->mass }})</p>
                        <p class="font-bold italic"><span class="bg-red-800"> percepatan =
                                {{ $data[3] }} m/s<sup>2</sup>
                            </span></p>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold inline">
                            mencari rpm roda setelah berjalan selama 1 detik
                        </h1>
                        <p>untuk mencari berapa rpm yang dicapai roda dalam 1 detik, kita akan mencari tau jarak yang
                            dapat ditempuh kendaraan selama 1 detik dari percepatan yang sudah diketahui. untuk
                            kecepatan awal, semua gear bernilai 0, karena kita hanya mencari kecepatan maksimal
                            masing-masing gear </p>
                        <p class="font-bold italic">jarak = kecepatan awal * waktu + 1/2 * percepatan *
                            waktu<sup>2</sup></p>
                        {{-- <p class="font-bold italic">jarak = {{ isset($data_per_gear[$key - 1][6]) ? $data_per_gear[$key - 1][6] : 0 }}<sup>2</sup></p> --}}
                        <p class="font-bold italic">jarak = {{ $data[8] }} x 1 + 1 / 2 x {{ $data[3] }} x
                            1<sup>2</sup></p>
                        <p class="font-bold italic"><span class="bg-red-800">jarak =
                                {{ $data[8] * 1 + (1 / 2) * $data[3] * 1 * 1 }} meter</span></p>
                        <p>setelah kita mengetahui jarak yang ditempuh kendaraan selama 1 detik, sekarang kita bisa
                            mencari rpm roda dengan jarak yang sudah diketahui</p>
                        <p class="font-bold italic">rpm roda = jarak / keliling roda x 60</p>
                        <p class="font-bold italic">rpm roda = {{ 0 * 1 + (1 / 2) * $data[3] * 1 * 1 }} /
                            {{ $vehicle->wheel_rad * 2 * 3.14 }} x 60</p>
                        <p class="font-bold italic"><span class="bg-red-800">rpm roda = {{ $data[4] }} RPM
                            </span></p>
                    </div>
                    <div class="my-4">
                        <h1 class="text-xl font-bold inline">
                            mencari rpm roda saat rpm mesin pada tenaga puncak
                        </h1>
                        <p>untuk mencari rpm roda saat mesin berada pada tenaga puncak, kita perlu mengetahui terlebih
                            dahulu rpm mesin saat kendaraan berjalan selama 1 detik.</p>
                        <p class="font-bold italic">rpm mesin = rpm roda x rasio transmisi x transmisi primer x
                            transmisi sekunder</p>
                        <p class="font-bold italic">rpm mesin = {{ $data[4] }} x {{ $gear[$key - 1] }} x
                            {{ $vehicle->primary_gear_ratio }} x {{ $vehicle->secondary_gear_ratio }}</p>
                        <p class="font-bold italic"><span class="bg-red-800">rpm mesin =
                                {{ $data[4] * $gear[$key - 1] * $vehicle->primary_gear_ratio * $vehicle->secondary_gear_ratio }}
                                RPM</span>
                        </p>
                        <p>setelah kita mengetahui rpm mesin pada waktu 1 detik, kita akan menggunakan rumus
                            perbandingan untuk mencari rpm roda saat rpm mesin pada tenaga puncak</p>
                        <p class="font-bold italic">rpm roda saat rpm mesin max = rpm mesin max x rpm roda diketahui /
                            rpm mesin dikethaui </p>
                        <p class="font-bold italic">rpm roda =
                            {{ $key - 1 == count($data_per_gear) - 1 ? $vehicle->limit_rpm : $vehicle->shifting_rpm }}
                            x {{ $data[4] }} /
                            {{ $data[4] * $gear[$key - 1] * $vehicle->primary_gear_ratio * $vehicle->secondary_gear_ratio }}
                        </p>
                        <p class="font-bold italic"><span class="bg-red-800">rpm roda = {{ $data[5] }}
                                RPM</span></p>
                    </div>
                    <div class="my-4">
                        <h1 class="text-xl font-bold inline">
                            mencari kecepatan kendaraan
                        </h1>
                        <p>untuk mencari kecepatan kendaraan kita akan membagi rpm dalam satu menit ke rpm dalam satu
                            detik</p>
                        <p class="font-bold italic">rpm roda dalam satu detik = rpm roda / 60</p>
                        <p class="font-bold italic">rpm roda dalam satu detik = {{ $data[5] }} / 60</p>
                        <p class="font-bold italic"><span class="bg-red-800">rpm roda dalam satu detik =
                                {{ $data[5] / 60 }} rpm</span></p>
                        <p>setelah diketahui rpm roda dalam 1 detik, kita akan mengkalikannya dengan keliling roda untuk
                            mengetahui jarak yang dapat dicapai kendaraan dalam 1 detik</p>
                        <p class="font-bold italic">jarak = rpm roda dalam 1 detik x keliling</p>
                        <p class="font-bold italic">jarak = {{ $data[5] / 60 }} x
                            {{ $vehicle->wheel_rad * 2 * 3.14 }}</p>
                        <p class="font-bold italic"><span class="bg-red-800">jarak =
                                {{ ($data[5] / 60) * $vehicle->wheel_rad * 2 * 3.14 }} meter</span></p>
                        <p>jarak yang diketahui diatas adalah jarak yang dapat dicapai kendaraan dalam satu detik,
                            sehingga kita dapat menyimpulkan kecepatan optimal kendaraan pada gear {{ $key }}
                            adalah <span
                                class="bg-red-800">{{ number_format(($data[5] / 60) * $vehicle->wheel_rad * 2 * 3.14, 2) }}
                                m/s atau {{ $data[6] }} km/jam</span></p>
                    </div>
                    {{-- <div class="my-4">
                        <h1 class="text-xl font-bold inline">
                            mencari waktu dan jarak yang dibutuhkan untuk mencapai kecepatan optimal
                        </h1>
                        <p class="font-bold italic">percepatan = power / massa * rasio transmisi</p>
                        <p class="font-bold italic">percepatan = {{ $vehicle->power }} / {{ $vehicle->mass }} *
                            {{ $gear[$key - 1] }}</p>
                        <p class="font-bold italic"><span class="bg-red-800">percepatan =
                                {{ ($vehicle->power / $vehicle->mass) * $gear[$key - 1] }} m/s<sup>2</sup></span></p>
                        <p class="font-bold italic">vt = vo + a x t</p>
                        <p class="font-bold italic">{{ $data[7] }} = {{ $data[8] }} +
                            {{ ($vehicle->power / $vehicle->mass) * $gear[$key - 1] }} x t</p>
                        <p class="font-bold italic"> t = {{ $data[7] }} - {{ $data[8] }} /
                            {{ ($vehicle->power / $vehicle->mass) * $gear[$key - 1] }} </p>
                        <p class="font-bold italic"> t =
                            {{  ($data[7] - $data[8]) / (($vehicle->power / $vehicle->mass) * $gear[$key - 1]) }}</p>
                    </div> --}}
                </div>
            </div>
        @endforeach
    </section>
    {{-- counting section end --}}


    {{-- footer start --}}
    <footer class="footer p-10 bg-neutral text-neutral-content">
        <div>
            <svg width="50" height="50" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                fill-rule="evenodd" clip-rule="evenodd" class="fill-current">
                <path
                    d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z">
                </path>
            </svg>
            <p>ACME Industries Ltd.<br />Providing reliable tech since 1992</p>
        </div>
        <div>
            <span class="footer-title">Social</span>
            <div class="grid grid-flow-col gap-4">
                <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        class="fill-current">
                        <path
                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
                        </path>
                    </svg></a>
                <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        class="fill-current">
                        <path
                            d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z">
                        </path>
                    </svg></a>
                <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        class="fill-current">
                        <path
                            d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z">
                        </path>
                    </svg></a>
            </div>
        </div>
    </footer>
    {{-- footer end --}}
</body>

</html>
