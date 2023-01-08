<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <title>UsedCars</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('img/icons/car-icon.png') }}">
        <script src="{{ asset('js/index.js') }}" defer></script>
    </head>
    <body>
        <header>
            <div class="menu">
                <div class="logo">
                    <img src="{{ asset('img/icons/car-icon.png') }}" alt="Yellow car icon that is part of the logo">
                    <span class="yellow">Used</span>
                    <span class="white">Cars</span>
                </div>
                <img src="{{ asset('img/icons/hamburger-icon.png') }}" alt="Hamburger icon" id="hamburger">
            </div>
            <nav id="nav">
                <ul>
                    <li><a href=" {{ url('/') }}">Početna</a></li>
                    <li><a href="{{ url('/search_list')}}">Pretraga</a></li>
                    <li><a href="https://autoblog.rs/" target="blank">Vesti</a></li>
                        <li>
                            <div>
                                <a href="/profile"> Dobrodošli, {{auth()->user()->name}} </a>
                            </div>
                        </li>
                </ul>
            </nav>
        </header>
        <main>
            
            <section class="car-ads">
                <h1>Pretrage</h1>
                <ul style="list-style: none;">
                    
                         @unless ($my_searches->isEmpty())
                        @foreach ($my_searches as $search)
                            <li>
                                <div class="searches">
                                
                                    <div class="saved-search">
                                        <div class="saved-search-grid">
                                            <p>Stanje: {{$search->state}}</p>
                                            <p>Marka: {{$search->brand}}</p>
                                            <p>Model: {{$search->type}}</p>
                                            <p>Godište: {{$search->manuf_year}}.</p>
                                            <p>Kilometraža: {{$search->kilometers}}km</p>
                                            <p>Cena: {{$search->price}}</p>
                                            <p>Gorivo: {{$search->fuel_type}}</p>
                                            <p>Kubikaža: {{$search->motor_cc}}cm3</p>
                                            <p>Snaga motora: {{$search->horse_power}}</p>
                                            <p>Vrsta pogona: {{$search->drive}}</p>
                                            <p>Menjač: {{$search->shift_type}}</p>
                                            <p>Broj vrata: {{$search->no_doors}}</p>    
                                        </div>
                                        <button class="btn btn-danger" onclick="window.location.href='http://localhost:8000/delete_search/{{$search->id}}'">Izbrisi pretragu</button>
                                    </div>
                                        {{-- <a href="/deletepost/{{$search->id}}">Obrisi pretragu</a> --}}
                                </div>
                            </li>
                            
                        @endforeach
                        
                    @endunless
                    
                    
                </ul>
                    
                    
            </section>
            {{-- <div class="mt-6 p-4">
                {{$listings->links()}}
            </div> --}}
            <section class="guide">
                <div class="guide-desc">
                    <h1 class="guide-title">Kako izabrati najbolji automobil za Vas?</h1>
                    <p>Na šta sve treba obratiti pažnju pri kupovini automobila, koji detalji su najvažniji? Pročitajte naš <a href="https://www.polovniautomobili.com/pomoc-pri-kupovini-automobila">vodič</a> pre Vaše prve kupovine!</p>
                </div>
                <img src="{{ asset('img/icons/shopping_cart.png') }}" alt="Shopping cart icon">
            </section>
        </main>
        <footer>
            <div class="logo">
                <img src="{{ asset('img/icons/car-icon.png') }}" alt="Yellow car icon that is part of the logo">
                <span class="yellow">Used</span>
                <span class="white">Cars</span>
            </div>
            <div class="contact">
                <div class="contact-info">
                    <a href="/">Oglasi</a>
                    <a href="/register" class="login-btn">Registruj se</a>
                </div>
                <div class="contact-sections">
                    <div class="contact-section">
                        <h2>Kompanija</h2>
                        <a href="#">Iskustva korisnika</a>
                        <a href="#">O nama</a>
                        <a href="#">Kontakt</a>
                    </div>
                    <div class="contact-section">
                        <h2>Pomoć</h2>
                        <a href="#">Podrška</a>
                        <a href="#">Blog</a>
                    </div>
                </div>
            </div>
            <p>©2022 UsedCars.com, sva prava zadržana.</p>
        </footer>
    </body>
</html>