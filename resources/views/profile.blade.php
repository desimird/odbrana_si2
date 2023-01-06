<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
        <title>UsedCars | Profil korisnika</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('img/icons/car-icon.png') }}">
        <script src="{{asset('js/index.js')}}" defer></script>
        <script src="{{asset('js/profile.js')}}" defer></script>
        <script src="{{asset('js/cng_pwd.js')}}" defer></script>
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
                    <li><a href="/">Početna</a></li>
                    <li><a href="#">Pretraga</a></li>
                    <li><a href="#">Vesti</a></li>
                    <li>
                        <div>
                            <a href="/profile"> Dobrodošli, {{auth()->user()->name}} </a>
                        </div>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <section class="profile">
                <div class="profile-info">
                    {{-- POPRAVITI: UBACITI PROFILNE --}}
                    <form action='/changeProfile' enctype="multipart/form-data" method="post">
                        @csrf
                        <div>
                            <label for="image" class="col-form-label">Change Profile Picture</label>
                            <input type="file" name="image" id="image" accept="image/*">
                            
                            @error('image')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                         
                        <div>
                            <button class="submit-btn mr-5">Update</button>
                        </div>
                    </form>
                        <img src="{{ auth()->user()->profileImage() }}" alt="Profile image of user" class="rounded-circle w-50">
                        <h2 class="profile-name">{{ auth()->user()->username }}</h2>
                </div>
                <div class="profile-options">
                    <ul>
                        <li><a href="/adding_ad" class="new-ad">Novi oglas</a></li>
                        {{-- Veljko sta je ovo --}}
                        <li><a href="#ads" onclick="showAds()" class="link-to-section">Moji oglasi</a></li>
                        <li><a href="#searches" onclick="showSearches()" class="link-to-section">Sačuvane pretrage</a></li>
                        <li><a href="#data" onclick="showProfileData()" class="link-to-section">Podaci o profilu</a></li>
                        <li><a href="logout" class="profile-btn">Odjavite se</a></li>
                    </ul>
                </div>
            </section>
            <section class="profile-section car-ads" id="ads">
                <h1>Moji oglasi</h1>
                <div class="car-ads-grid">
                    @unless ($listings->isEmpty())
                            @foreach ($listings as $listing)
                            <div class="car-ad">
                                <img src="{{asset("storage/uploads/". $listing->imgpath)}} " alt="A car">
                                <div class="car-desc">
                                    <div class="car-name-price">
                                        <h2 class="car-name">{{$listing->band.$listing->type}}</h2>
                                        <p class="car-price">{{$listing->price}}</p>
                                    </div>
                                    <p class="car-details">{{$listing->fuel_type}}</p>
                                    <p class="car-details text-primary">{{($listing->on_hold == '1') ? "Odoboren" : 'Na cekanju';}}</p>
                                </div>
                            </div>
                        @endforeach
                    @endunless
                    
                        
                   
                    
                    
            </section>
            <section class="profile-section saved-searches" id="searches">
                <h1>Sačuvane pretrage</h1>
                <ul>
                    <li class="search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: msFilter;"><path d="M13.707 2.293A.996.996 0 0 0 13 2H6c-1.103 0-2 .897-2 2v16c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2V9a.996.996 0 0 0-.293-.707l-6-6zM6 4h6.586L18 9.414l.002 9.174-2.568-2.568c.35-.595.566-1.281.566-2.02 0-2.206-1.794-4-4-4s-4 1.794-4 4 1.794 4 4 4c.739 0 1.425-.216 2.02-.566L16.586 20H6V4zm6 12c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2z"></path></svg>
                        <p>audi</p>
                    </li>
                    <li class="search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: msFilter;"><path d="M13.707 2.293A.996.996 0 0 0 13 2H6c-1.103 0-2 .897-2 2v16c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2V9a.996.996 0 0 0-.293-.707l-6-6zM6 4h6.586L18 9.414l.002 9.174-2.568-2.568c.35-.595.566-1.281.566-2.02 0-2.206-1.794-4-4-4s-4 1.794-4 4 1.794 4 4 4c.739 0 1.425-.216 2.02-.566L16.586 20H6V4zm6 12c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2z"></path></svg>
                        <p>dizel</p>
                    </li>
                    <li class="search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: msFilter;"><path d="M13.707 2.293A.996.996 0 0 0 13 2H6c-1.103 0-2 .897-2 2v16c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2V9a.996.996 0 0 0-.293-.707l-6-6zM6 4h6.586L18 9.414l.002 9.174-2.568-2.568c.35-.595.566-1.281.566-2.02 0-2.206-1.794-4-4-4s-4 1.794-4 4 1.794 4 4 4c.739 0 1.425-.216 2.02-.566L16.586 20H6V4zm6 12c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2z"></path></svg>
                        <p>2/3</p>
                    </li>
                </ul>
            </section>
            <section class="profile-section profile-data" id="data">
                <h1>Podaci o profilu</h1>
                <div>
                    <p>Ime</p>
                    <p class="bold">{{ auth()->user()->name }}</p>
                </div>
                <div>
                    <p>Prezime</p>
                    <p class="bold">{{ auth()->user()->surname }}</p>
                </div>
                <div>
                    <p>Korisničko ime</p>
                    <p class="bold">{{ auth()->user()->username }}</p>
                </div>
                {{-- Veljko sta je ovo <div>
                    <p>Broj telefona</p>
                    <p class="bold">061/423-34-12</p>
                </div> --}}
                <div>
                    <p>Email adresa</p>
                    <p class="bold">{{ auth()->user()->email }}</p>
                </div>
                <button class="profile-btn modal">Promeni lozinku</button>
                <button onclick="window.location.href = 'http://localhost:8000/destroy'" class="profile-btn" >Obriši nalog</button>
            </section>
            <div id="overlay1">
                <form  class="login-form" method="POST" action='/updatepsw'>
                    @csrf
                    <div>
                        {{-- <div class="login-data"> --}}
                            <div class="login-item">
                                <label for="password">Unesite trenutnu lozinku</label>
                                <input
                                     type="password"
                                     name="password"
                                     value="{{old('password')}}"
                                 />
                            </div>
                            <div class="login-item">
                                <label for="newpassword">Nova lozinka</label>
                                <input
                                     type="password"
                                     name="newpassword"
                                     value="{{old('newpassword')}}"
                                 />
                            </div>
                            {{-- potvrdi lozinku mozda --}}
                            <button type="submit" class="login-btn">Promeni lozinku</button>
                        {{-- </div> --}}
                        
                        <div class="close-login">
                            <button type="button" class="cancel-btn">Zatvori</button>
                        </div>
                    </div>
                </form>
            </div>
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
                    {{-- kad se ulogovan covek oce registruje da mu kazes da ne moze :D --}}
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