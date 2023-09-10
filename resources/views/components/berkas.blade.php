<div id="portfolio" class="our-portfolio section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                    <h6>Berkas Wringinanom</h6>
                    <h4>Lihat Berkas Publik <em>Kami</em></h4>
                    <div class="line-dec"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
        <div class="row">
            <div class="col-lg-12">
                @if (isset(auth()->user()->is_admin))
                <a href="/berkas" class="btn btn-primary ms-3">Atur Berkas</a>
                @endif
                <div class="loop owl-carousel">
                    @unless (count($berkas) == 0)
                    @foreach ($berkas as $item)
                    <div class="item">
                        <a href="/storage/{{$item->path_berkas}}" rel="noreferrer noopener" target="_blank">
                            <div class="portfolio-item">
                                <div class="thumb">
                                    <img src="{{asset('../images/pdf_icon.svg.png')}}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>{{$item->nama_berkas}}</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach

                    @else
                    <div class="item">
                        <a href="#">
                            <div class="portfolio-item">
                                <div class="down-content">
                                    <h4>Tidak ada berkas</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endunless
                </div>
            </div>
        </div>
    </div>
</div>