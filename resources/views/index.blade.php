<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <title>UsedCars</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('img/icons/car-icon.png') }}">
        <script src="{{ asset('js/index.js') }}" defer></script>
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="//unpkg.com/alpinejs" defer></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.4/dist/flowbite.min.css" />
  <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script> --}}
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
                    <li><a href="#">Pretraga</a></li>
                    <li><a href="#">Vesti</a></li>
                    @if (auth()->user())
                        <li>
                            <div>
                                <a href="/profile"> Dobrodošli, {{auth()->user()->name}} </a>
                            </div>
                        </li>
                    @else
                        <div class="buttons">
                            <li><button class="modal-btn">Prijavi se</button></li>
                            <li><a href="{{ url('register') }}" class="login-btn">Registruj se</a></li>
                        </div>
                    @endif
                    
                </ul>
            </nav>
            <div id="overlay">
                <form class= "login-form" method="POST" action='/login'>
                    @csrf
                    <div >
                        {{-- <div class="login-data"> --}}
                            <div class="login-item">
                                <label for="username">Korisničko ime</label>
                                <input
                                     type="text"
                                     name="username"
                                     value="{{old('username')}}"
                                 />
                                {{-- @error('username')
                                  <p class="form-control">{{$message}}</p>
                                @enderror --}}
                            </div>
                            <div class="login-item">
                                <label for="password">Šifra</label>
                                <input
                                     type="password"
                                     name="password"
                                     value="{{old('password')}}"
                                 />
                                 {{-- @error('password')
                                  <p class="form-control">{{$message}}</p>
                                @enderror --}}
                            </div>
                            <button type="submit" class="login-btn">Uloguj se</button>
                        {{-- </div> --}}
                        
                        <div class="close-login">
                            <button type="button" class="cancel-btn">Zatvori</button>
                            <a href="{{ url('register') }}">Nemate svoj nalog? Napravite novi!</a>
                        </div>
                    </div>
                </form>
            </div>
        </header>
        <main>
            <form class ="search" action="/">
            <section class="search">
                
                <h1>Dobrodošli na UsedCars stranicu!</h1>
                <label htmlFor="search-bar">Izaberi kriterijum za pretragu: </label>
                
                <select id="search-bar" name="tags" class="search-select">
                    <option value="brand" default>Marka vozila</option>
                    <option value="type">Tip vozila</option>
                    <option value="manuf_year">Godina proizvodnje</option>
                    <option value="kilometers">Pređeni kilometri</option>
                    <option value="price">Cena</option>
                    <option value="drive_type">Vrsta pogona</option>
                    <option value="shifter_type">Vrsta menjača</option>
                </select>

                        <div class="search-text">
                            <input type="text" name="search_input" id="search-input" />
                            <button type="submit" class="login-btn">Pretraži</button>
                        </div>
                    
            </section>
        </form>
            <section class="car-ads">
                <h1>Oglasi</h1>
                <div class="car-ads-grid">
                    @unless ($listings->isEmpty())
                        @foreach ($listings as $listing)

                            <a href="http://127.0.0.1:8000/singlead/{{ $listing->id }}">
                                <div class="car-ad">
                                    <img src=" {{asset('storage/uploads/'. $listing->imgpath)}} " alt="A car">
                                    <div class="car-desc">
                                        <div class="car-name-price">
                                            <h2 class="car-name">{{$listing->band.$listing->type}}</h2>
                                            <p class="car-price">{{$listing->price}}</p>
                                        </div>
                                        <p class="car-details">{{$listing->fuel_type}}</p>
                                    </div>
                                </div>
                            </a>
                            
                        @endforeach
                        
                    @endunless
                    
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
                    <a href="#">Oglasi</a>
                    <a href="#">Cene</a>
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