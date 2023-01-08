<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/register.css') }}">
        <title>UsedCars | Registracija</title>
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
                    <li><a href="{{ url('/') }}">Početna</a></li>
                    <li><a href="https://autoblog.rs/" target="blank">Vesti</a></li>
                </ul>
            </nav>
        </header>
        <section class="sign-in">
            <h1>Popunite podatke za prijavljivanje:</h1>
        <form method="POST" action='/user'>
            @csrf
            <div class = "form">
                <div class="form-item">
                    <label for="name"><b>Ime</b></label>
                    <input
                        type="text"
                        name="name"
                        value="{{old('name')}}"
                    />
                     @error('name')
                      <p class="text-2">{{$message}}</p>
                     @enderror
                </div>
                <div class="form-item">
                    <label for="surname"><b>Prezime</b></label>
                    <input
                        type="text"
                        name="surname"
                        value="{{old('surname')}}"
                    />
                    @error('surname')
                      <p class="text-2">{{$message}}</p>
                     @enderror
                </div>
                <div class="form-item">
                    <label for="birthday"><b>Datum rođenja</b></label>
                    <input
                        type="date"
                        name="birthday"
                        value="{{old('birthday')}}"
                    />
                    @error('birthday')
                      <p class="text-2">{{$message}}</p>
                     @enderror
                </div>
                <div class="form-item">
                    <label for="city"><b>Grad</b></label>
                    <input
                        type="text"
                        name="city"
                        value="{{old('city')}}"
                    />
                    @error('city')
                      <p class="text-2">{{$message}}</p>
                     @enderror
                </div>
                <div class="form-item">
                    <label for="email"><b>Email adresa</b></label>
                    <input
                        type="email"
                        name="email"
                        value="{{old('email')}}"
                    />
                    @error('email')
                      <p class="text-2">{{$message}}</p>
                     @enderror
                </div>
                <div class="form-item">
                    <label for="username"><b>Korisničko ime</b></label>
                    <input
                        type="text"
                        name="username"
                        value="{{old('username')}}"
                    />
                    @error('username')
                      <p class="text-2">{{$message}}</p>
                     @enderror
                </div>
                <div class="form-item">
                    <label for="password"><b>Šifra</b></label>
                    <input
                        type="password"
                        name="password"
                        value="{{old('password')}}"
                    />
                    @error('password')
                      <p class="form-control">{{$message}}</p>
                     @enderror
                </div>
                <button type="submit" class="login-btn form-btn">Uloguj se</button>
            </div>
        </form>
            <div class="links">
                <a href="{{ url('/') }}" class="link-back">Nazad na početnu stranicu</a>
                <a href="https://www.polovniautomobili.com/pomoc-pri-kupovini-automobila" class="link-back" target="_blank">Vodič za nove korisnike</a>
            </div>
        </section>
        <section class="guide">
            <div class="guide-desc">
                <h1 class="guide-title">Kako izabrati najbolji automobil za Vas?</h1>
                <p>Na šta sve treba obratiti pažnju pri kupovini automobila, koji detalji su najvažniji? Pročitajte naš <a
                        href="https://www.polovniautomobili.com/pomoc-pri-kupovini-automobila" target="_blank">vodič</a> pre Vaše prve kupovine!</p>
            </div>
            <img src="{{ asset('img/icons/shopping_cart.png') }}" alt="Shopping cart icon">
        </section>
        <footer>
            <div class="logo">
                <img src="{{ asset('img/icons/car-icon.png') }}" alt="Yellow car icon that is part of the logo">
                <span class="yellow">Used</span>
                <span class="white">Cars</span>
            </div>
            <div class="contact">
                <div class="contact-info">
                    <a href="/">Oglasi</a>
                    <a href="{{ url('register') }}" class="login-btn">Registruj se</a>
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
            <p>©2023 UsedCars.com, sva prava zadržana.</p>
        </footer>
    </body>
</html>