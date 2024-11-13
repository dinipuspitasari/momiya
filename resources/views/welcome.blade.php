<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css"  rel="stylesheet" />
        {{-- <link rel="stylesheet" href="https://rsms.me/inter/inter.css"> --}}
        @vite('resources/css/app.css')

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lilita+One&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
        </style>
        <title>Momiya Medical Clinic</title>
    </head>

    <body>

        
{{-- navigation bar start --}}
<nav class="bg-blue-100 backdrop-blur-3xl fixed w-full z-50 top-0 left-0">
    <div class="max-w-screen-xl flex flex-wrap items-center mx-auto p-4 px-[24px]">
        <a class="flex-grow" href="/">
            <div class="flex items-center">
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-primary leading-none">
                    <img class="w-[159px]" src="/assets/img/logo.png"></span>
                </div>
            </a>
            <div class="flex md:order-2"><a href="/login">
                <button type="button" class=" text-red-500 font-bold rounded-[99px] border-red-400 border-[1px] text-sm px-[35px] py-2 mx-2 text-center mr-3 hover:bg-green-500 hover:text-white md:mr-0 focus:outline-none">Masuk</button></a>
            </div>
            <div class="items-center justify-between hidden w-full mr-6 md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="flex flex-col p-4 md:p-0 mt-4 mr-4 md:flex-row md:space-x-8 md:mt-0 md:border-0">
                    <li><a href="/">
                        <div class="block py-2 pl-3 pr-4 text-red-500 font-bold hover:text-green-500 hover:underline">Beranda</div></a></li>
                        <li><a href="/about"><div class="block py-2 pl-3 pr-4 text-red-500 font-bold hover:text-green-500 hover:underline">Tentang Kami</div></a></li>
                        <li><a href="/about"><div class="block py-2 pl-3 pr-4 text-red-500 font-bold hover:text-green-500 hover:underline">Kontak Kami</div></a></li>
                        <li><a href="/faq"><div class="block py-2 pl-3 pr-4 text-red-500 font-bold hover:text-green-500 hover:underline">Bantuan</div></a></li></ul></div></div></nav>
{{-- navigation bar end --}}


{{-- section jumbotron bg image start --}}
<section class="bg-center bg-no-repeat bg-gray-100 bg-blend-multiply" id="section" style="background-image: url('/assets/img/bg2.png');">
    <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
        <h1 class="mb-4 text-4xl font-bold tracking-tight leading-none text-green-500 md:text-5xl lg:text-6xl">Momiya Medical clinic</h1>
        <h4 class="mb-4 text-1xl font-medium tracking-tight leading-none text-gray-800 md:text-5xl lg:text-4xl">Jakarta Barat</h4>
        <p class="mb-8 text-lg font-normal text-gray-800 lg:text-xl sm:px-16 lg:px-48">Lorem Ipsum</p>
        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
            <a href="/login" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-green-500 hover:bg-green-400 focus:ring-4 focus:ring-green-700">
                Reservasi Sekarang
            </a>
        </div>
    </div>
    <hr>
</section>
{{-- section jumbotron bg image end --}}

{{-- pelayanan start --}}
<div class="px-10 md:px-32 py-10">
    <h1 class="text-6xl font-bold mb-2 text-gray-800 text-center">Pelayanan</h1>
    <h1 class="text-4xl font-bold mb-8 underline text-green-500 text-center">Poliklinik</h1>
    <div class="grid gap-5 mb-8 md:grid-cols-2 lg:grid-cols-4 pt-10">
    <!-- Card 1 -->
    <div class="p-5 duration-300 transform bg-white border rounded shadow-sm hover:-translate-y-2 flex flex-col items-center justify-center">
        <div class="flex items-center justify-center w-24 mb-4 rounded">
            <img src="/assets/img/mother.png" alt="Umum & Laktasi">
        </div>
        <h6 class="mb-2 font-semibold leading-5 text-center">Umum & Laktasi</h6>
    </div>    
    <!-- Card 2 -->
    <div class="p-5 duration-300 transform bg-white border rounded shadow-sm hover:-translate-y-2 flex flex-col items-center justify-center">
      <div class="flex items-center justify-center w-24 mb-4 rounded">
        <img src="/assets/img/pediatrician.png" alt="Pediatrician">
      </div>
      <h6 class="mb-2 font-semibold leading-5">Pediatrician</h6>
    </div>
    <!-- Card 3 -->
    <div class="p-5 duration-300 transform bg-white border rounded shadow-sm hover:-translate-y-2 flex flex-col items-center justify-center">
      <div class="flex items-center justify-center w-24 mb-4 rounded">
        <img src="/assets/img/obstetrical.png" alt="Obstetrics & Gynecology">
      </div>
      <h6 class="mb-2 font-semibold leading-5">Obstetrics & Gynecology</h6>
    </div>
    <!-- Card 4 -->
    <div class="p-5 duration-300 transform bg-white border rounded shadow-sm hover:-translate-y-2 flex flex-col items-center justify-center">
      <div class="flex items-center justify-center w-24 mb-4 rounded">
        <img src="/assets/img/psychologist.png" alt="Psikolog Klinis Anak & Remaja">
      </div>
      <h6 class="mb-2 font-semibold leading-5">Psikolog Klinis Anak & Remaja</h6>
    </div>
  </div>
</div>
{{-- pelayanan end --}}

{{-- fasilitas start --}}
<div class="fasilitas px-4 sm:px-10 md:px-32 pt-10 bg-gray-50">
    <h1 class="text-4xl sm:text-6xl font-bold mb-2 text-gray-800 text-center">Fasilitas</h1>
    <h2 class="text-2xl sm:text-4xl font-bold mb-8 underline text-green-500 text-center">Klinik</h2>
    
    <div id="carousel-product" class="relative w-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-48 sm:h-56 lg:h-96 overflow-hidden rounded-lg">
            <!-- First Slide -->
            <div class="duration-700 ease-in-out" data-carousel-item>
                <div class="flex items-center gap-4 sm:gap-8 px-4 sm:px-10 lg:px-20">
                    <!-- Card 1 -->
                    <div class="flex-1 border border-gray-200 rounded-lg shadow-md">
                        <img class="rounded-t-lg w-full h-32 sm:h-40 object-cover" src="/assets/img/logo.png" alt="" />
                        <div class="p-4 sm:p-5">
                            <h5 class="text-lg sm:text-xl font-bold tracking-tight text-gray-900">Backwit</h5>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="flex-1 bg-white border border-gray-200 rounded-lg shadow-md">
                        <img class="rounded-t-lg w-full h-32 sm:h-40 object-cover" src="/assets/img/logo.png" alt="" />
                        <div class="p-4 sm:p-5">
                            <h5 class="text-lg sm:text-xl font-bold tracking-tight text-gray-900">Lumel</h5>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="flex-1 bg-white border border-gray-200 rounded-lg shadow-md">
                        <img class="rounded-t-lg w-full h-32 sm:h-40 object-cover" src="assets/minilec.png" alt="" />
                        <div class="p-4 sm:p-5">
                            <h5 class="text-lg sm:text-xl font-bold tracking-tight text-gray-900">Minilec</h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Second Slide -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <div class="flex items-center gap-4 sm:gap-8 px-4 sm:px-10 lg:px-20">
                    <!-- Card 4 -->
                    <div class="flex-1 bg-white border border-gray-200 rounded-lg shadow-md">
                        <img class="rounded-t-lg w-full h-32 sm:h-40 object-cover" src="assets/multitek.png" alt="Multitek" />
                        <div class="p-4 sm:p-5">
                            <h5 class="text-lg sm:text-xl font-bold tracking-tight text-gray-900">Multitek</h5>
                        </div>
                    </div>
                    <!-- Card 5 -->
                    <div class="flex-1 bg-white border border-gray-200 rounded-lg shadow-md">
                        <img class="rounded-t-lg w-full h-32 sm:h-40 object-cover" src="assets/relpol.jpg" alt="Relpol" />
                        <div class="p-4 sm:p-5">
                            <h5 class="text-lg sm:text-xl font-bold tracking-tight text-gray-900">Relpol</h5>
                        </div>
                    </div>
                    <!-- Card 6 -->
                    <div class="flex-1 bg-white border border-gray-200 rounded-lg shadow-md">
                        <img class="rounded-t-lg w-full h-32 sm:h-40 object-cover" src="assets/starco.jpg" alt="Starco" />
                        <div class="p-4 sm:p-5">
                            <h5 class="text-lg sm:text-xl font-bold tracking-tight text-gray-900">Starco</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slider controls -->
        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-2 sm:px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-6 h-6 sm:w-8 sm:h-8 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white">
                <svg aria-hidden="true" class="w-4 h-4 sm:w-5 sm:h-5 text-gray" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-2 sm:px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-6 h-6 sm:w-8 sm:h-8 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white">
                <svg aria-hidden="true" class="w-4 h-4 sm:w-5 sm:h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
</div>
{{-- fasilitas end --}}

{{-- testimoni pasien start --}}
<div class="bg-blue-100 pt-10 pb-16">
<div class="max-w-7xl mx-auto py-8">
    <h1 class="text-6xl font-bold text-center mb-2 text-gray-800">Testimoni</h1>
    <h1 class="text-3xl font-bold text-center mb-8 underline text-green-500">Pasien</h1>
    <div class="px-10 grid grid-cols-1 md:grid-cols-3 gap-8 w-full">
      <!-- Testimoni 1 -->
      <div class="bg-white rounded-lg shadow-lg p-6">
        <p class="text-gray-600 dark:text-gray-400 mb-4">
          "Pelayanan di klinik ini sangat ramah dan profesional. Dokternya menjelaskan dengan baik dan detail, sehingga saya merasa lebih tenang."
        </p>
        <div class="flex items-center space-x-4">
          <img class="w-10 h-10 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-1.jpg" alt="Foto pasien">
          <div class="font-medium text-green-500">
            <div>Ahmad Rizky</div>
            <div class="text-sm text-gray-500 dark:text-gray-400">Pasien</div>
          </div>
        </div>
      </div>
  
      <!-- Testimoni 2 -->
      <div class="bg-white rounded-lg shadow-lg p-6">
        <p class="text-gray-600 dark:text-gray-400 mb-4">
          "Fasilitas klinik sangat bersih dan nyaman. Saya tidak perlu menunggu lama untuk mendapatkan penanganan."
        </p>
        <div class="flex items-center space-x-4">
          <img class="w-10 h-10 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Foto pasien">
          <div class="font-medium text-green-500">
            <div>Siti Aisyah</div>
            <div class="text-sm text-gray-500 dark:text-gray-400">Pasien</div>
          </div>
        </div>
      </div>
  
      <!-- Testimoni 3 -->
      <div class="bg-white rounded-lg shadow-lg p-6">
        <p class="text-gray-600 dark:text-gray-400 mb-4">
          "Saya merasa puas dengan penanganan dokter dan tim medis. Mereka sangat peduli dengan kesehatan saya."
        </p>
        <div class="flex items-center space-x-4">
          <img class="w-10 h-10 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-3.jpg" alt="Foto pasien">
          <div class="font-medium text-green-500">
            <div>Rina Kartika</div>
            <div class="text-sm text-gray-500 dark:text-gray-400">Pasien</div>
          </div>
        </div>
      </div>
    </div>
  </div>  
</div>
{{-- testimoni pasien end --}}

{{-- galeri start --}}
<div>
<h1 class="text-6xl font-bold text-center mb-2 text-gray-800 mt-5">Galeri</h1>
    <div class="container-gallery px-5">
        <img src="https://static.pexels.com/photos/52500/horse-herd-fog-nature-52500.jpeg" alt="Herd of horses">
        <img src="https://static.pexels.com/photos/66898/elephant-cub-tsavo-kenya-66898.jpeg" alt="Baby Elephant">
        <img src="https://static.pexels.com/photos/213399/pexels-photo-213399.jpeg" alt="Koi Fish">
        <img src="https://static.pexels.com/photos/158471/ibis-bird-red-animals-158471.jpeg" alt="Ibis Bird">
        <img src="https://static.pexels.com/photos/133459/pexels-photo-133459.jpeg" alt="Lemur">
        <img src="https://static.pexels.com/photos/50988/ape-berber-monkeys-mammal-affchen-50988.jpeg" alt="Berber Monkeys">
    </div>
</div>
{{-- galeri end --}}

{{-- footer start --}}
<footer>
    <hr>
    <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
        <div class="md:flex md:justify-between">
          <div class="mb-6 md:mb-0">
              <a href=# class="flex items-center">
                  <img src="assets/img/logo.png" class="h-12 me-3" alt="momiya Logo" />
              </a>
              <p class="mt-5">Electric Pay merupakan sebuah website yang membantu masyarakat 
                <br>dalam membayar tagihan listrik secara online dengan cepat dan aman 
                <br>tanpa harus datang langsung ketempat.</p>
          </div>
          <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
              <div>
                  <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Navigasi</h2>
                  <ul class="text-gray-500 font-semibold">
                      <li class="mb-4">
                          <a href="#" class="hover:underline">Beranda</a>
                      </li>
                      <li class="mb-4">
                          <a href="/about" class="hover:underline">Tentang</a>
                      </li>
                      <li>
                        <a href="/login" class="hover:underline">Masuk</a>
                    </li>
                  </ul>
              </div>
              <div>
                  <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Ikuti Kami</h2>
                  <ul class="text-gray-500 font-semibold">
                      <li class="mb-4">
                          <a href="https://github.com/dinipuspitasari" class="hover:underline ">Github</a>
                      </li>
                      <li class="mb-4">
                          <a href="https://www.instagram.com/dinipsptaa/" class="hover:underline">Instagram</a>
                      </li>
                      <li>
                        <a href="https://www.linkedin.com/in/dini-puspitasari/" class="hover:underline">LinkedIn</a>
                    </li>
                  </ul>
              </div>
              <div>
                  <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Kontak Kami</h2>
                  <ul class="text-gray-500 font-semibold">
                      <li class="mb-4">
                          <a class="hover:underline">Jl. Bidara Anggrek No.21, <br>Jakarta Barat, indonesia</a>
                      </li>
                      <li>
                          <a class="hover:underline">elpay@gmail.com</a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
      <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
      <div class="sm:flex sm:items-center sm:justify-between">
          <span class="text-sm text-gray-500 sm:text-center">© 2024 <a href="https://flowbite.com/" class="hover:underline">Elpay™</a>. All Rights Reserved.
          </span>
          <div class="flex mt-4 sm:justify-center sm:mt-0">
              <a href="#" class="text-gray-500 hover:text-gray-900">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                        <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd"/>
                    </svg>
                  <span class="sr-only">Facebook page</span>
              </a>
              <a href="#" class="text-gray-500 hover:text-gray-900 ms-5">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 21 16">
                        <path d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z"/>
                    </svg>
                  <span class="sr-only">Discord community</span>
              </a>
              <a href="#" class="text-gray-500 hover:text-gray-900 ms-5">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 17">
                    <path fill-rule="evenodd" d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z" clip-rule="evenodd"/>
                </svg>
                  <span class="sr-only">Twitter page</span>
              </a>
              <a href="#" class="text-gray-500 hover:text-gray-900 ms-5">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd"/>
                  </svg>
                  <span class="sr-only">GitHub account</span>
              </a>
              <a href="#" class="text-gray-500 hover:text-gray-900 ms-5">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z" clip-rule="evenodd"/>
                </svg>
                  <span class="sr-only">Dribbble account</span>
              </a>
          </div>
      </div>
    </div>
</footer>
{{-- footer end --}}

          <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    </body>
</html>