<x-app-layout>

    <x-slot name="header">
        <div id="carouselExampleIndicators" class="carousel slide md:h-96 h-52  " data-ride="carousel">
            <div class="carousel-inner md:h-96 " role="listbox" style="width: 100%;">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
                    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
                    crossorigin="anonymous">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                                crossorigin="anonymous">
                </script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                                crossorigin="anonymous">
                </script>
                @php $i = 1; @endphp
                @foreach ($slider as $slideItem)
                    <div class="carousel-item {{ $i == '1' ? 'active' : '' }}">
                        @php $i++; @endphp
                        <img class="d-block w-100 md:h-96 h-52 " src="{{ $slideItem->banner }}" alt="Slider image">
                    </div>
                @endforeach


            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </x-slot>
</x-app-layout>
