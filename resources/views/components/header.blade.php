{{--
<!-- ***** Preloader Start ***** -->
<div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- ***** Preloader End ***** --> --}}

<!-- Pre-header Starts -->
<div class="pre-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-8 col-7 d-flex">
                <ul class="info d-flex align-items-center">
                    <li><a href="#"><i class="fa fa-envelope"></i>desawringinanom.com</a></li>
                    <li><a href="#"><i class="fa fa-phone"></i>08124753771</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-sm-4 col-5">
                <ul class="d-flex align-items-center justify-content-end gap-5">
                    @auth
                    <li>
                        <em>Hai, {{auth()->user()->name}}</em>
                    </li>
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="btn link-danger">
                                <i class="fa-solid fa-door-closed"></i> Logout
                            </button>
                        </form>
                    </li>
                    @else
                    <li><a href="/login">Login</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Pre-header End -->

<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <img src="../images/logo-v3.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                        <li class="scroll-to-section"><a href="#about">Profil Desa</a></li>
                        <li class="scroll-to-section"><a href="#services">Pemerintahan</a></li>
                        <li class="scroll-to-section"><a href="#portfolio">Layanan</a></li>
                        <li class="scroll-to-section"><a href="#blog">Informasi</a></li>
                        <li class="scroll-to-section"><a href="#contact">Contact</a></li>
                        <li class="scroll-to-section">
                            <div class="border-first-button"><a href="#contact">Saran</a></div>
                        </li>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->