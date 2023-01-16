<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
        <title>UsedCars</title>
        <link rel="icon" type="image/x-icon" href="{{ secure_asset('img/icons/car-icon.png') }}">
        <script src="{{ secure_asset('js/index.js') }}" defer></script>
    </head>
    <body>
        <header>
            <div class="menu">
                <div class="logo">
                    <img src="{{ secure_asset('img/icons/car-icon.png') }}" alt="Yellow car icon that is part of the logo">
                    <span class="yellow">Used</span>
                    <span class="white">Cars</span>
                </div>
                <img src="{{ secure_asset('img/icons/hamburger-icon.png') }}" alt="Hamburger icon" id="hamburger">
            </div>
            <nav id="nav">
                <ul>
                    <li><a href=" {{ url('/admin/index') }}">Početna</a></li>
                    <li><a href="{{ url('/admin/on_hold')}}">Oglasi na cekanju</a></li>
                    <li><a href="{{ url('/admin/users')}}">Korisnici</a></li>
                        <li>
                            <div>
                                <a href="/profile"> Dobrodošli, {{auth()->user()->name}} </a>
                            </div>
                        </li>
                    <li><a href="/logout" >Odjavi se</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <form class ="search" action="/admin/index/" method="get">
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
                        
                            <div class="car-ad">
                                <img src=" {{secure_asset('storage/uploads/'. $listing->imgpath)}} " alt="A car">
                                <div class="car-desc">
                                    <div class="car-name-price">
                                        <h2 class="car-name">{{$listing->band.$listing->type}}</h2>
                                        <p class="car-price">{{$listing->price}}</p>
                                    </div>
                                    <p class="car-details">{{$listing->fuel_type}}</p>
                                    <button class="btn btn-danger" onclick="window.location.href='https://rough-sound-67073.pktriot.net/deletepost/{{$listing->id}}'">Obrisi oglas</button>
                                </div>
                                   
                            </div>
                        @endforeach
                    @endunless
            </section>
            <div class="mt-6 p-4">
                {{$listings->links('pagination::bootstrap-4')}}
            </div>
            <section class="guide">
                <div class="guide-desc">
                    <h1 class="guide-title">Kako izabrati najbolji automobil za Vas?</h1>
                    <p>Na šta sve treba obratiti pažnju pri kupovini automobila, koji detalji su najvažniji? Pročitajte naš <a href="https://www.polovniautomobili.com/pomoc-pri-kupovini-automobila">vodič</a> pre Vaše prve kupovine!</p>
                </div>
                <img src="{{ secure_asset('img/icons/shopping_cart.png') }}" alt="Shopping cart icon">
            </section>
        </main>
        <footer>
            <div class="logo">
                <img src="{{ secure_asset('img/icons/car-icon.png') }}" alt="Yellow car icon that is part of the logo">
                <span class="yellow">Used</span>
                <span class="white">Cars</span>
            </div>
            <div class="contact">
                <div class="contact-info">
                    <a href="/admin/index">Oglasi</a>
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
            <p>©2023 UsedCars.com, sva prava zadržana.</p>
        </footer>
    </body>
</html>