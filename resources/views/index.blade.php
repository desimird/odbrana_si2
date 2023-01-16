<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/adding-ad.css') }}">
        <title>UsedCars</title>
        <link rel="icon" type="image/x-icon" href="{{ secure_asset('img/icons/car-icon.png') }}">
        <script src="{{ secure_asset('js/index.js') }}" defer></script>
        <script src="{{ secure_asset('js/cng_pwd.js') }}" defer></script>
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
                    <li><a href=" {{ url('/') }}">Početna</a></li>
                    <li><a href="/search_list">Pretraga</a></li>
                    <li><a href="https://autoblog.rs/" target="blank">Vesti</a></li>
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
                            <div class="login-item">
                                <label for="username">Korisničko ime</label>
                                <input
                                     type="text"
                                     name="username"
                                     value="{{old('username')}}"
                                 />
                            </div>
                            <div class="login-item">
                                <label for="password">Šifra</label>
                                <input
                                     type="password"
                                     name="password"
                                     value="{{old('password')}}"
                                 />
                            </div>
                            <button type="submit" class="login-btn">Uloguj se</button>
                        
                        <div class="close-login">
                            <button type="button" class="cancel-btn">Zatvori</button>
                            <a href="{{ url('/register') }}">Nemate svoj nalog? Napravite novi!</a>
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
                    <option value="no_seats">Broj sedista</option>
                </select>

                        <div class="search-text">
                            <input type="text" name="search_input" id="search-input" />
                            <button type="submit" class="login-btn">Pretraži</button>
                            
                        </div>
                        
                    
            </section>
        </form>
        <div><button class="login-btn modal1">Detaljna pretraga</button></div>
        <div id="overlay2">
            <section class="new-ad" >
                <h1 text-align: center>Unesite karakteristike automobila:</h1>
                
                    <form action='/det_search' enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="ad-parts" width="80%" justify-content:space-between>
                            <div class="ad-part">
                                <label for="state">Stanje:</label>
                                <select name ="state"id="state">
                                    <option value="polovno">Polovno vozilo</option>
                                    <option value="novo">Novo vozilo</option>
                                </select>
                            </div>
                            <div class="ad-part">
                                <label for="brand">Marka:</label>
                                <input
                                    type="text"
                                    name="brand"
                                    value="{{old('brand')}}"
                                />
                            </div>
                            <div class="ad-part">
                                <label for="type">Model:</label>
                                <input
                                    type="text"
                                    name="type"
                                    value="{{old('type')}}"
                                />
                            </div>
                            <div class="ad-part">
                                <label for="manuf_year">Godište:</label>
                                <input
                                    type="text"
                                    name="manuf_year"
                                    value="{{old('manuf_year')}}"
                                />
                            </div>
                            <div class="ad-part">
                                <label for="kilometers">Kilometraža:</label>
                                <input
                                    type="text"
                                    name="kilometers"
                                    value="{{old('kilometers')}}"
                                />
                            </div>
                            <div class="ad-part">
                                <label for="price">Cena:</label>
                                <input
                                    type="text"
                                    name="price"
                                    value="{{old('price')}}"
                                />
                            </div>
                            <div class="ad-part">
                                <label for="fuel_type">Gorivo:</label>
                                <select name=fuel_type id="fuel_type">
                                    <option value="dizel">Dizel</option>
                                    <option value="benzin">Benzin</option>
                                    <option value="tng">Benzin + Gas (TNG)</option>
                                    <option value="cng">Benzin + Metan (CNG)</option>
                                    <option value="elektricni">Električni pogon</option>
                                    <option value="hibridni">Hibridni pogon</option>
                                </select>
                            </div>
                            <div class="ad-part">
                                <label for="motor_cc">Kubikaža:</label>
                                <input
                                    type="text"
                                    name="motor_cc"
                                    value="{{old('motor_cc')}}"
                                />
                            </div>
                            <div class="ad-part">
                                <label for="horse_power">Snaga motora:</label>
                                <input
                                    type="text"
                                    name="horse_power"
                                    value="{{old('horse_power')}}"
                                />
                            </div>
                            <div class="ad-part">
                                <label for="drive_type">Vrsta pogona:</label>
                                <select name="drive_type"id="drive_type">
                                    <option value="prednji">Prednji</option>
                                    <option value="zadnji">Zadnji</option>
                                    <option value="na_sve_tockove">4x4</option>
                                </select>
                            </div>
                            <div class="ad-part">
                                <label for="shifter_type">Menjač:</label>
                                <select name="shifter_type" id="shifter_type">
                                    <option value="Manuelni menjač">Manuelni menjač</option>
                                    <option value="Automatski menjač">Automatski menjač</option>
                                        
                                </select>
                            </div>
                            <div class="ad-part">
                                <label for="no_doors">Broj vrata:</label>
                                <select name="no_doors"id="no_doors">
                                    <option value="2/3">2/3</option>
                                    <option value="4/5">4/5</option>
                                </select>
                            </div>

                            <div class="ad-part">
                                <label for="no_seats">Broj sedista:</label>
                                <select name="no_seats"id="no_seats">
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                </select>
                            </div>
                        

                        
                        </div>
                            <div>
                                <div class="col-6">
                                    <button class="submit-btn">Pretraži</button>
                                    <button class="submit-btn" formaction="/rmbr_search">Zapamti pretragu</button>
                                </div>
                            </div>
                    </form>
                
            
                
            </section>
        </div>
            <section class="car-ads">
                <h1>Oglasi</h1>
                <div class="car-ads-grid">
                    @unless ($listings->isEmpty())
                        @foreach ($listings as $listing)

                            <a href="/singlead/{{ $listing->id }}">
                                <div class="car-ad">
                                    <img src=" {{secure_asset('storage/uploads/'. $listing->imgpath)}} " alt="A car">
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
            <p>©2023 UsedCars.com, sva prava zadržana.</p>
        </footer>
    </body>
</html>