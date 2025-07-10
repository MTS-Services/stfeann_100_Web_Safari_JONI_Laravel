<x-frontend::layout>
    <x-slot name="title">Home</x-slot>
    <x-slot name="page_slug">home</x-slot>

    <section class="relative sm:w-full">
        <img src="{{ asset('frontend/images/Correr2.png') }}" alt="About Us Background"
            class="w-full lg:h-[450px] h-full object-cover ">
        <div class="absolute inset-0  opacity-40"></div>
        <div class="absolute left-1/2 top-[70%] transform -translate-x-1/2 -translate-y-1/2 z-10 text-center">
            <h1 class="xl:text-3xl sm:text-5xl md:text-6xl font-bold mb-4 text-white uppercase dark:text-white">
                Sobre nós
            </h1>
        </div>
    </section>
    
        <section class="flex justify-center items-center min-h-[697px] bg-white dark:bg-gray-900 py-2 sm:py-2">
            <div
                class="w-full max-w-[1500px] flex flex-col md:flex-row items-center justify-center rounded-lg overflow-hidden">
                <!-- Image Side -->


                <!-- Content Side -->
                <div class="md:w-1/2 w-full h-[300px] sm:h-[400px] md:h-[550px] px-4 lg:px-8 dark:bg-bg-dark-tertiary pt-8">
                    <h1 class="text-2xl sm:text-4xl md:text-5xl font-semibold mb-4 text-text-primary  dark:text-white">
                        {{ $about->title }}</h1>
                    <p class="text-base sm:text-lg xl:text-xl text-gray-800  dark:text-white leading-9 ">
                        {{ $about->description }}
                    </p>
                </div>
                <div class="md:w-1/2 w-full h-[300px] sm:h-[400px] md:h-[550px] px-4 lg:px-8 ">
                    <img src="{{$about->modified_image }}" alt="{{ $about->title }}"
                        class="w-full h-full object-cover rounded-xl pb-4">
                </div>
            </div>
        </section>



        <section class="flex justify-center items-center bg-white dark:bg-gray-900 py-2 sm:py-2 sm:pb-20 ">
            <div
                class="w-full max-w-[1500px] flex flex-col md:flex-row items-center justify-center rounded-lg overflow-hidden gap-6 px-4">

                <!-- Left Side with 2 Cards -->
                <div class="md:w-1/2 w-full grid grid-cols-1 md:grid-cols-2 gap-4 ">
                    <!-- Card 1 -->
                    <div class="bg-gray-100 p-4 sm:p-6 rounded-xl shadow-md dark:bg-bg-dark-tertiary">
                        <h2 class="text-lg sm:text-xl font-semibold mb-2 text-text-primary dark:text-white">A Nossa
                            Missão
                        </h2>
                        <p class="text-base sm:text-lg text-gray-800 font-bold dark:text-white">
                           {{ $about->our_mission }}
                        </p>
                    </div>
                    <!-- Card 2 -->
                    <div class="bg-gray-100 p-4 sm:p-6 rounded-xl shadow-md dark:bg-bg-dark-tertiary">
                        <h2 class="text-lg sm:text-xl font-semibold mb-2 text-text-primary dark:text-white">Produção com
                            Propósito</h2>
                        <p class="text-base sm:text-lg text-gray-800 font-bold dark:text-white">
                            {{ $about->vission }}
                        </p>
                    </div>
                </div>


                <!-- Right Side with Full Card -->
                <div
                    class="md:w-1/2 w-full flex flex-col justify-start items-center md:items-start p-6 sm:p-8 bg-gradient-to-br  rounded-xl dark:bg-bg-dark-tertiary">
                    <h2 class="text-lg sm:text-xl font-semibold mb-3 text-text-primary dark:text-white">Compromisso
                        Sustentável</h2>
                    <p class="text-base sm:text-lg text-gray-800 font-bold dark:text-white xl:text-xl">
                    {{ $about->sustainable_commitment }}
                    </p>
                </div>
            </div>
        </section>
</x-frontend::layout>
