@extends('layouts.app')

@section('header')

    <header class="header fadeout header-inverse pb-0 h-fullscreen"
            style="background-image: linear-gradient(to bottom, #243949 0%, #517fa4 100%);">
        <canvas class="constellation"></canvas>

        <div class="container">
            <div class="row h-full">
                <div class="col-12 text-center align-self-center">
                    <h1 class="fs-50 fw-600 lh-15 hidden-sm-down">Built for <span class="text-primary"
                                                                                  data-type="Authors, Startups, Entrepreneurs, SaaS, WebApps"></span>
                    </h1>
                    <h1 class="fs-35 fw-600 lh-15 hidden-md-up">Built for<br><span class="text-primary"
                                                                                   data-type="Authors, Startups, Entrepreneurs, SaaS, WebApps"></span>
                    </h1>
                    <br>
                    <p class="fs-20 hidden-sm-down"><strong>Miaacasts</strong> is an elegant, modern and SaaS for
                        learning</p>
                    <p class="fs-16 hidden-md-up"><strong>TheSaaS</strong> is an elegant, modern and fully customizable
                        SaaS and WebApp template</p>
                    <hr class="w-60 hidden-sm-down">
                    <br>
                </div>

                <div class="col-12 align-self-end text-center pb-70">
                    <a class="scroll-down-2 scroll-down-inverse" href="#" data-scrollto="section-demo"><span></span></a>
                </div>
            </div>
        </div>
    </header>

@endsection

@section('content')

    <section class="section overflow-hidden" id="section-demo">
        <div class="container">
            <header class="section-header">
                <small>Demo</small>
                <h2>Sample Landing Pages</h2>
                <hr>
                <p class="lead">Apart from internal pages, we have designed several single sample pages to get start
                    with.</p>
            </header>


            <div class="row gap-y">

            </div>


        </div>
    </section>

@endsection