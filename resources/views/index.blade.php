@extends('layouts.base')

@section('title')
    Accueil
@endsection

@section('content')

{{-- Main section --}}
<div data-elementor-type="wp-post" data-elementor-id="5" class="elementor elementor-5">

    {{-- Hero section --}}
    <div class="elementor-element elementor-element-04cf50b e-flex e-con-boxed e-con e-parent" data-id="04cf50b"
        data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
        <div class="px-2 e-con-inner">
            <div class="elementor-element elementor-element-61cfca4 e-con-full e-flex e-con e-child ps-5"
                data-id="61cfca4" data-element_type="container">

                <div class="elementor-element elementor-element-82aa9eb e-con-full e-flex e-con e-child"
                    data-id="82aa9eb" data-element_type="container">
                    <div class="elementor-element elementor-element-9ebc099 elementor-invisible elementor-widget elementor-widget-heading"
                        data-id="9ebc099" data-element_type="widget"
                        data-settings="{&quot;_animation&quot;:&quot;slideInLeft&quot;}"
                        data-widget_type="heading.default">
                        <h2 class="elementor-heading-title elementor-size-default" style="text-transform: none;">Détendez-vous,</h2>
                    </div>
                    <div class="elementor-element elementor-element-77693ea animated-slow elementor-invisible elementor-widget elementor-widget-heading"
                        data-id="77693ea" data-element_type="widget"
                        data-settings="{&quot;_animation&quot;:&quot;slideInLeft&quot;}"
                        data-widget_type="heading.default">
                        <h1 class="elementor-heading-title elementor-size-default" style="text-transform: none; font-size: 50px;" >on s’occupe du reste.</h1>
                    </div>
                </div>

                <div class="elementor-element elementor-element-f0a321f elementor-widget__width-initial elementor-invisible elementor-widget elementor-widget-text-editor"
                    data-settings="{&quot;_animation&quot;:&quot;slideInLeft&quot;}"
                    data-id="f0a321f" data-element_type="widget" data-widget_type="text-editor.default">
                    <p>Agents qualifiés en babysitting et ménage, disponibles quand vous en avez besoin.</p>
                </div>

                <div class="elementor-element elementor-element-e7ab753 elementor-tablet-align-center elementor-mobile-align-center elementor-widget elementor-widget-button"
                    data-id="e7ab753" data-element_type="widget" data-widget_type="button.default">
                    <a class="elementor-button elementor-button-link elementor-size-sm elementor-animation-shrink"
                        href="#">
                        <span class="elementor-button-content-wrapper">
                            <span class="elementor-button-icon">
                                <svg aria-hidden="true" class="e-font-icon-svg e-fas-plus-circle"
                                    viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm144 276c0 6.6-5.4 12-12 12h-92v92c0 6.6-5.4 12-12 12h-56c-6.6 0-12-5.4-12-12v-92h-92c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h92v-92c0-6.6 5.4-12 12-12h56c6.6 0 12 5.4 12 12v92h92c6.6 0 12 5.4 12 12v56z">
                                    </path>
                                </svg> </span>
                            <span class="elementor-button-text">Commencez</span>
                        </span>
                    </a>
                </div>

            </div>

            <div class="elementor-element elementor-element-f262f09 e-con-full e-flex e-con e-child"
                data-id="f262f09" data-element_type="container">
                <div class="elementor-element elementor-element-7cf5e89 elementor-invisible elementor-widget elementor-widget-image"
                    data-id="7cf5e89" data-element_type="widget"
                    data-settings="{&quot;_animation&quot;:&quot;slideInUp&quot;}" data-widget_type="image.default">
                    <img fetchpriority="high" decoding="async" style="position: relative !important; bottom: -100px !important"
                        src="{{ asset('icons/team.png') }}"
                        class="attachment-full size-full wp-image-1520" alt=""
                        srcset="{{ asset('icons/team.png') }}"
                        sizes="(max-width: 928px) 100vw, 928px" />
                </div>
            </div>
        </div>
    </div>

    {{-- Why choose us --}}
    <div class="elementor-element elementor-element-034d1f7 e-flex e-con-boxed e-con e-parent" data-id="034d1f7" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
        <div class="e-con-inner row">
            <div class="elementor-element elementor-element-447f322 e-con-full e-flex e-con e-child col-md-4 bg-cyan d-flex align-items-end justify-content-center" data-id="447f322" data-element_type="container">
                <div class="elementor-element elementor-element-39f06f0 e-con-full e-flex e-con e-child" data-id="39f06f0" data-element_type="container">
                    <div class="elementor-element elementor-element-c2415ef elementor-widget elementor-widget-image" data-id="c2415ef" data-element_type="widget" data-widget_type="image.default">
                        <img fetchpriority="high" decoding="async" width="516" height="610" src="{{ asset('icons/why.png') }}" srcset="{{ asset('icons/why.png') }}"/>
                    </div>
                </div>
            </div>

            <div class="elementor-element elementor-element-3e0f0a9 e-con-full e-flex e-con e-child col-md-8"
                data-id="3e0f0a9" data-element_type="container">
                <div class="elementor-element elementor-element-a2f935d e-con-full e-flex elementor-invisible e-con e-child"
                    data-id="a2f935d" data-element_type="container"
                    data-settings="{&quot;animation&quot;:&quot;slideInLeft&quot;}">
                    <div class="elementor-element elementor-element-60fb55f elementor-widget elementor-widget-heading"
                        data-id="60fb55f" data-element_type="widget" data-widget_type="heading.default">
                        <h2 class="elementor-heading-title elementor-size-default">Pourquoi</h2>
                    </div>
                    <div class="elementor-element elementor-element-b21076e elementor-widget elementor-widget-heading"
                        data-id="b21076e" data-element_type="widget" data-widget_type="heading.default">
                        <h2 class="elementor-heading-title elementor-size-default" style="text-transform: none;">nous choisir ?</h2>
                    </div>
                </div>
                <div class="elementor-element elementor-element-d734c32 elementor-widget elementor-widget-text-editor"
                    data-id="d734c32" data-element_type="widget" data-widget_type="text-editor.default">
                    <p>
                        Chez nous, la confiance se construit grâce à notre engagement envers des services fiables,
                        qu’il s’agisse du ménage ou de la garde d’enfants. Nous offrons des soins personnalisés et
                        un accompagnement attentif, afin de transformer les maisons et les lieux de travail en
                        environnements plus sains, sereins et accueillants. Chaque détail compte pour dépasser les
                        attentes de nos clients.
                    </p>
                </div>
                <div class="elementor-element elementor-element-d734c32 elementor-widget elementor-widget-text-editor"
                    data-id="8d1a2c" data-element_type="container">
                    <div data-id="336590d" data-element_type="container">
                        <div class="elementor-element elementor-element-378883f e-con-full e-flex e-con e-child"
                            data-id="378883f" data-element_type="container">
                            <div class="elementor-element elementor-element-6245d10 e-con-full e-flex e-con e-child"
                                data-id="6245d10" data-element_type="container">
                                <div class="elementor-element elementor-element-bf77ba1 elementor-view-default elementor-position-top elementor-mobile-position-top elementor-widget elementor-widget-icon-box"
                                    data-id="bf77ba1" data-element_type="widget"
                                    data-widget_type="icon-box.default">
                                    <div class="elementor-icon-box-wrapper">

                                        <div class="elementor-icon-box-icon">
                                            <span class="elementor-icon">
                                                <i aria-hidden="true" class="icon icon-cleaner"></i> </span>
                                        </div>

                                        <div class="elementor-icon-box-content">

                                            <h4 class="elementor-icon-box-title">
                                                <span>
                                                    résultats impeccables
                                                </span>
                                            </h4>

                                            <p class="elementor-icon-box-description">
                                                Chaque recoin est nettoyé avec précision, laissant votre espace frais, lumineux et parfaitement confortable.
                                            </p>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-e43b5cf e-con-full e-flex e-con e-child"
                                data-id="e43b5cf" data-element_type="container">
                                <div class="elementor-element elementor-element-2a37158 elementor-view-default elementor-position-top elementor-mobile-position-top elementor-widget elementor-widget-icon-box"
                                    data-id="2a37158" data-element_type="widget"
                                    data-widget_type="icon-box.default">
                                    <div class="elementor-icon-box-wrapper">

                                        <div class="elementor-icon-box-icon">
                                            <span class="elementor-icon">
                                                <i aria-hidden="true" class="icon icon-calendar"></i> </span>
                                        </div>

                                        <div class="elementor-icon-box-content">

                                            <h4 class="elementor-icon-box-title">
                                                <span>
                                                    Service flexible, &amp; propre et rapide </span>
                                            </h4>

                                            <p class="elementor-icon-box-description">
                                                Chaque famille a des besoins uniques : nous adaptons nos prestations de ménage et de garde d’enfants à votre rythme et à vos attentes
                                            </p>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="elementor-element elementor-element-fd97bb4 e-con-full e-flex e-con e-child"
                            data-id="fd97bb4" data-element_type="container">
                            <div class="elementor-element elementor-element-878b491 e-con-full e-flex e-con e-child"
                                data-id="878b491" data-element_type="container">
                                <div class="elementor-element elementor-element-499bb37 elementor-view-default elementor-position-top elementor-mobile-position-top elementor-widget elementor-widget-icon-box"
                                    data-id="499bb37" data-element_type="widget"
                                    data-widget_type="icon-box.default">
                                    <div class="elementor-icon-box-wrapper">

                                        <div class="elementor-icon-box-icon">
                                            <span class="elementor-icon">
                                                <i aria-hidden="true" class="icon icon-handshake"></i> </span>
                                        </div>

                                        <div class="elementor-icon-box-content">

                                            <h4 class="elementor-icon-box-title">
                                                <span>
                                                    Qualité et professionnalisme
                                                </span>
                                            </h4>

                                            <p class="elementor-icon-box-description">
                                                Nous assurons un suivi rigoureux et mettons en avant l’excellence dans chaque détail pour dépasser vos attentes au quotidien.
                                            </p>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="elementor-element elementor-element-79c6807 e-con-full e-flex e-con e-child"
                                data-id="79c6807" data-element_type="container">
                                <div class="elementor-element elementor-element-f62a208 elementor-view-default elementor-position-top elementor-mobile-position-top elementor-widget elementor-widget-icon-box"
                                    data-id="f62a208" data-element_type="widget"
                                    data-widget_type="icon-box.default">
                                    <div class="elementor-icon-box-wrapper">

                                        <div class="elementor-icon-box-icon">
                                            <span class="elementor-icon">
                                                <i aria-hidden="true" class="icon icon-star"></i> </span>
                                        </div>

                                        <div class="elementor-icon-box-content">

                                            <h4 class="elementor-icon-box-title">
                                                <span>
                                                    Satisfaction garantie à 100 %</span>
                                            </h4>

                                            <p class="elementor-icon-box-description">
                                                Notre engagement est de vous offrir la meilleure expérience de nettoyage avec une entière satisfaction.
                                            </p>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- parallex --}}
    <div class="elementor-element elementor-element-97c4388 e-con-full e-flex e-con e-parent" data-id="97c4388"
        data-element_type="container">
        <div class="elementor-element elementor-element-9d56e3e e-con-full e-flex e-con e-child" data-id="9d56e3e"
            data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
            <div class="elementor-element elementor-element-a51cf75 e-con-full e-flex e-con e-child"
                data-id="a51cf75" data-element_type="container">
                <div class="elementor-element elementor-element-c20245f elementor-widget elementor-widget-heading"
                    data-id="c20245f" data-element_type="widget" data-widget_type="heading.default">
                    <h2 class="elementor-heading-title elementor-size-default">Résultats impeccables garantis,</h2>
                </div>
                <div class="elementor-element elementor-element-36d5e8a elementor-widget elementor-widget-heading"
                    data-id="36d5e8a" data-element_type="widget" data-widget_type="heading.default">
                    <h2 class="elementor-heading-title elementor-size-default">demandez un devis gratuit !</h2>
                </div>
            </div>
            <div class="elementor-element elementor-element-b10a828 elementor-align-center elementor-widget elementor-widget-button"
                data-id="b10a828" data-element_type="widget" data-widget_type="button.default">
                <a class="elementor-button elementor-button-link elementor-size-sm elementor-animation-shrink"
                    href="#">
                    <span class="elementor-button-content-wrapper">
                        <span class="elementor-button-icon">
                            <svg aria-hidden="true" class="e-font-icon-svg e-fas-arrow-circle-right"
                                viewBox="0 0 512 512" xmlns="../../../../www.w3.org/2000/svg.html">
                                <path
                                    d="M256 8c137 0 248 111 248 248S393 504 256 504 8 393 8 256 119 8 256 8zm-28.9 143.6l75.5 72.4H120c-13.3 0-24 10.7-24 24v16c0 13.3 10.7 24 24 24h182.6l-75.5 72.4c-9.7 9.3-9.9 24.8-.4 34.3l11 10.9c9.4 9.4 24.6 9.4 33.9 0L404.3 273c9.4-9.4 9.4-24.6 0-33.9L271.6 106.3c-9.4-9.4-24.6-9.4-33.9 0l-11 10.9c-9.5 9.6-9.3 25.1.4 34.4z">
                                </path>
                            </svg> </span>
                        <span class="elementor-button-text">Nous contacter</span>
                    </span>
                </a>
            </div>
        </div>
    </div>

    {{-- Services --}}
    <div data-elementor-type="wp-post" data-elementor-id="1021" class="elementor elementor-1021">
		<div class="elementor-element elementor-element-bb2388d e-flex e-con-boxed e-con e-parent" data-id="bb2388d"
			data-element_type="container">
			<div class="e-con-inner">

				<div class="elementor-element elementor-element-f28cd41 e-con-full e-flex e-con e-child"
                    data-id="f28cd41" data-element_type="container">
                    <div class="elementor-element elementor-element-a76509d e-con-full e-flex elementor-invisible e-con e-child"
                        data-id="a76509d" data-element_type="container"
                        data-settings="{&quot;animation&quot;:&quot;slideInDown&quot;}">
                        <div class="elementor-element elementor-element-c462d32 elementor-widget elementor-widget-heading"
                            data-id="c462d32" data-element_type="widget" data-widget_type="heading.default">
                            <h2 class="elementor-heading-title elementor-size-default">Services</h2>
                        </div>
                        <div class="elementor-element elementor-element-99fff7f elementor-widget elementor-widget-heading"
                            data-id="99fff7f" data-element_type="widget" data-widget_type="heading.default">
                            <h2 class="elementor-heading-title elementor-size-default">Offert</h2>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-be9183c elementor-widget elementor-widget-text-editor"
                        data-id="be9183c" data-element_type="widget" data-widget_type="text-editor.default">
                        <p>Flexible, transparent et adapté à vos besoins.</p>
                    </div>
                </div>


				<div class="px-5 align-items-center row"
					data-id="344c36f" data-element_type="container">

                    @foreach ($services as $service)
					<div class="mt-2 elementor-element elementor-element-612b29f e-con-full e-flex e-con e-child col-md-4"
						data-id="612b29f" data-element_type="container">
						<div class="elementor-element elementor-element-56ea704 e-con-full e-flex e-con e-child"
							data-id="56ea704" data-element_type="container"
							data-settings="{&quot;background_background&quot;:&quot;gradient&quot;}">

							<div class="p-0 overflow-hidden elementor-element elementor-element-f4eed18 e-con-full e-flex e-con e-child"
								data-id="f4eed18" data-element_type="container" style="height: 350px;"
								data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">

                                <img src="{{ asset('/' . $service->image) }}" alt="">

								<div class="mt-3 ms-2 position-absolute elementor-element elementor-element-529445e elementor-widget elementor-widget-heading"
									data-id="529445e" data-element_type="widget" data-widget_type="heading.default">
									<h6 class="elementor-heading-title elementor-size-default">{{ $service->nom }}</h6>
								</div>

							</div>

							<div class="elementor-element elementor-element-0ccf5b6 e-con-full e-flex e-con e-child"
								data-id="0ccf5b6" data-element_type="container">
								<div class="elementor-element elementor-element-2b0b8ad e-con-full e-flex e-con e-child"
									data-id="2b0b8ad" data-element_type="container">
									<div class="elementor-element elementor-element-bd2c69d elementor-widget elementor-widget-heading"
										data-id="bd2c69d" data-element_type="widget" data-widget_type="heading.default">
										<div class="elementor-heading-title elementor-size-default">
                                            {!! $service->description !!}
                                        </div>
									</div>
								</div>
							</div>
						</div>
					</div>
                    @endforeach

                    <div class="pagination">
                        {{-- Pagination --}}
                        <div class="d-flex justify-content-center">
                            {{ $services->links() }}
                        </div>
                    </div>

				</div>

			</div>
		</div>
	</div>

    {{-- Process use --}}
    <div class="elementor-element elementor-element-0db858e e-flex e-con-boxed e-con e-parent" id="download" data-id="0db858e"
        data-element_type="container">
        <div class="e-con-inner">
            <div class="elementor-element elementor-element-1d365c8 e-con-full e-flex e-con e-child"
                data-id="1d365c8" data-element_type="container">
                <div class="elementor-element elementor-element-fa183da e-con-full e-flex e-con e-child"
                    data-id="fa183da" data-element_type="container">
                    <div class="elementor-element elementor-element-c477f38 e-con-full e-flex e-con e-child"
                        data-id="c477f38" data-element_type="container">
                        <div class="elementor-element elementor-element-c064caf elementor-invisible elementor-widget elementor-widget-image"
                            data-id="c064caf" data-element_type="widget"
                            data-settings="{&quot;_animation&quot;:&quot;bounceIn&quot;}"
                            data-widget_type="image.default">
                            <img loading="lazy" decoding="async" width="300" height="300"
                                src="../../wp-content/uploads/sites/44/2025/08/Blink.png"
                                class="attachment-full size-full wp-image-302" alt=""
                                srcset="https://askit.dextheme.net/cleasy/wp-content/uploads/sites/44/2025/08/Blink.png 300w, https://askit.dextheme.net/cleasy/wp-content/uploads/sites/44/2025/08/Blink-150x150.png 150w"
                                sizes="(max-width: 300px) 100vw, 300px" />
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-a3c77d0 elementor-widget elementor-widget-image"
                    data-id="a3c77d0" data-element_type="widget" data-widget_type="image.default">
                    <img loading="lazy" decoding="async" width="600" height="850"
                        src="{{ asset('icons/phone.png') }}"
                        class="attachment-full size-full wp-image-195" style="width: 300px;"
                        srcset="{{ asset('icons/phone.png') }}"
                        sizes="(max-width: 600px) 100vw, 600px" />

                    <div class="gap-2 pt-3 d-flex justify-content-center align-items-center">
                        <a class="elementor-button elementor-button-link elementor-size-sm elementor-animation-shrink " href="#">
                            <span class="elementor-button-content-wrapper">
                                <span class="elementor-button-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-apple" viewBox="0 0 16 16">
                                        <path d="M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516s1.52.087 2.475-1.258.762-2.391.728-2.43m3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422s1.675-2.789 1.698-2.854-.597-.79-1.254-1.157a3.7 3.7 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56s.625 1.924 1.273 2.796c.576.984 1.34 1.667 1.659 1.899s1.219.386 1.843.067c.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758q.52-1.185.473-1.282"/>
                                    </svg> </span>
                                <span class="elementor-button-text">Pour IOS</span>
                            </span>
                        </a>

                        <a class="elementor-button elementor-button-link elementor-size-sm elementor-animation-shrink" href="#">
                            <span class="elementor-button-content-wrapper">
                                <span class="elementor-button-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google-play" viewBox="0 0 16 16">
                                        <path d="M14.222 9.374c1.037-.61 1.037-2.137 0-2.748L11.528 5.04 8.32 8l3.207 2.96zm-3.595 2.116L7.583 8.68 1.03 14.73c.201 1.029 1.36 1.61 2.303 1.055zM1 13.396V2.603L6.846 8zM1.03 1.27l6.553 6.05 3.044-2.81L3.333.215C2.39-.341 1.231.24 1.03 1.27"/>
                                    </svg>
                                </span>
                                <span class="elementor-button-text">Pour Android</span>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="elementor-element elementor-element-d302ae1 e-con-full e-flex e-con e-child"
                    data-id="d302ae1" data-element_type="container">
                    <div class="elementor-element elementor-element-3b36228 elementor-widget elementor-widget-spacer"
                        data-id="3b36228" data-element_type="widget" data-widget_type="spacer.default">
                        <div class="elementor-spacer">
                            <div class="elementor-spacer-inner"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="elementor-element elementor-element-649e087 e-con-full e-flex e-con e-child"
                data-id="649e087" data-element_type="container">
                <div class="elementor-element elementor-element-b67a911 e-con-full e-flex elementor-invisible e-con e-child"
                    data-id="b67a911" data-element_type="container"
                    data-settings="{&quot;animation&quot;:&quot;slideInLeft&quot;}">
                    <div class="elementor-element elementor-element-f3efe19 elementor-widget elementor-widget-heading"
                        data-id="f3efe19" data-element_type="widget" data-widget_type="heading.default">
                        <h2 class="elementor-heading-title elementor-size-default">Simple </h2>
                    </div>
                     <div class="elementor-element elementor-element-18c2b4b elementor-widget elementor-widget-heading"
                        data-id="18c2b4b" data-element_type="widget" data-widget_type="heading.default">
                        <h2 class="elementor-heading-title elementor-size-default"> Processus en 3 étapes</h2>
                    </div>
                </div>
                <div class="elementor-element elementor-element-015f339 elementor-widget elementor-widget-text-editor"
                    data-id="015f339" data-element_type="widget" data-widget_type="text-editor.default">
                    <p>Bénéficiez d’un service ménager et de garde fiable, pensé pour la vie moderne,
                        avec une attention particulière aux détails qui transforme chaque maison en un lieu accueillant, sûr et harmonieux</p>
                </div>
                <div class="elementor-element elementor-element-3fd60f5 e-con-full animated-fast e-flex elementor-invisible e-con e-child"
                    data-id="3fd60f5" data-element_type="container"
                    data-settings="{&quot;animation&quot;:&quot;slideInLeft&quot;}">
                    <div class="elementor-element elementor-element-41e2237 e-con-full e-flex e-con e-child"
                        data-id="41e2237" data-element_type="container"
                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-element elementor-element-8e1cdbe elementor-widget-mobile__width-initial elementor-widget elementor-widget-image"
                            data-id="8e1cdbe" data-element_type="widget" data-widget_type="image.default">
                            <img loading="lazy" decoding="async" width="300" height="300"
                                src="../../wp-content/uploads/sites/44/2025/08/Blink.png"
                                class="attachment-full size-full wp-image-302" alt=""
                                srcset="https://askit.dextheme.net/cleasy/wp-content/uploads/sites/44/2025/08/Blink.png 300w, https://askit.dextheme.net/cleasy/wp-content/uploads/sites/44/2025/08/Blink-150x150.png 150w"
                                sizes="(max-width: 300px) 100vw, 300px" />
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-9798d6b e-con-full e-flex e-con e-child"
                        data-id="9798d6b" data-element_type="container"
                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-element elementor-element-02752aa elementor-vertical-align-top elementor-widget elementor-widget-image-box"
                            data-id="02752aa" data-element_type="widget" data-widget_type="image-box.default">
                            <div class="elementor-image-box-wrapper">
                                <div class="elementor-image-box-content">
                                    <h4 class="elementor-image-box-title">Téléchargez l’application HomeCare</h4>
                                    <p class="elementor-image-box-description">
                                        Disponible sur Android (et iOS si tu veux l’ajouter), créez votre compte en quelques clics.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-8cc4ab3 e-con-full e-flex elementor-invisible e-con e-child"
                    data-id="8cc4ab3" data-element_type="container"
                    data-settings="{&quot;animation&quot;:&quot;slideInLeft&quot;}">
                    <div class="elementor-element elementor-element-215aff9 e-con-full e-flex e-con e-child"
                        data-id="215aff9" data-element_type="container"
                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-element elementor-element-db2e16e elementor-widget-mobile__width-initial elementor-widget elementor-widget-image"
                            data-id="db2e16e" data-element_type="widget" data-widget_type="image.default">
                            <img loading="lazy" decoding="async" width="300" height="300"
                                src="../../wp-content/uploads/sites/44/2025/08/Blink.png"
                                class="attachment-full size-full wp-image-302" alt=""
                                srcset="https://askit.dextheme.net/cleasy/wp-content/uploads/sites/44/2025/08/Blink.png 300w, https://askit.dextheme.net/cleasy/wp-content/uploads/sites/44/2025/08/Blink-150x150.png 150w"
                                sizes="(max-width: 300px) 100vw, 300px" />
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-acc384a e-con-full e-flex e-con e-child"
                        data-id="acc384a" data-element_type="container"
                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-element elementor-element-678a3a2 elementor-vertical-align-top elementor-widget elementor-widget-image-box"
                            data-id="678a3a2" data-element_type="widget" data-widget_type="image-box.default">
                            <div class="elementor-image-box-wrapper">
                                <div class="elementor-image-box-content">
                                    <h4 class="elementor-image-box-title">Réservez votre agent et définissez vos besoins</h4>
                                    <p class="elementor-image-box-description">
                                        Choisissez le type d’agent (nounou ou aide-ménagère), précisez vos tâches et planifiez vos horaires.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-e5a68de e-con-full animated-slow e-flex elementor-invisible e-con e-child"
                    data-id="e5a68de" data-element_type="container"
                    data-settings="{&quot;animation&quot;:&quot;slideInLeft&quot;}">
                    <div class="elementor-element elementor-element-5839b15 e-con-full e-flex e-con e-child"
                        data-id="5839b15" data-element_type="container"
                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-element elementor-element-33b1771 elementor-widget-mobile__width-initial elementor-widget elementor-widget-image"
                            data-id="33b1771" data-element_type="widget" data-widget_type="image.default">
                            <img loading="lazy" decoding="async" width="300" height="300"
                                src="../../wp-content/uploads/sites/44/2025/08/Blink.png"
                                class="attachment-full size-full wp-image-302" alt=""
                                srcset="https://askit.dextheme.net/cleasy/wp-content/uploads/sites/44/2025/08/Blink.png 300w, https://askit.dextheme.net/cleasy/wp-content/uploads/sites/44/2025/08/Blink-150x150.png 150w"
                                sizes="(max-width: 300px) 100vw, 300px" />
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-26109a9 e-con-full e-flex e-con e-child"
                        data-id="26109a9" data-element_type="container"
                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-element elementor-element-53f9126 elementor-vertical-align-top elementor-widget elementor-widget-image-box"
                            data-id="53f9126" data-element_type="widget" data-widget_type="image-box.default">
                            <div class="elementor-image-box-wrapper">
                                <div class="elementor-image-box-content">
                                    <h4 class="elementor-image-box-title">Profitez d’un service fiable et professionnel</h4>
                                    <p class="elementor-image-box-description">
                                        Votre agent intervient selon vos attentes, avec un suivi transparent depuis l’application.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Pricing --}}
    @if($pricings->count() > 0)
    <div data-elementor-type="wp-post" data-elementor-id="1021" class="elementor elementor-1021">
		<div class="elementor-element elementor-element-bb2388d e-flex e-con-boxed e-con e-parent" data-id="bb2388d"
			data-element_type="container">
			<div class="e-con-inner">

				<div class="elementor-element elementor-element-f28cd41 e-con-full e-flex e-con e-child"
                    data-id="f28cd41" data-element_type="container">
                    <div class="elementor-element elementor-element-a76509d e-con-full e-flex elementor-invisible e-con e-child"
                        data-id="a76509d" data-element_type="container"
                        data-settings="{&quot;animation&quot;:&quot;slideInDown&quot;}">
                        <div class="elementor-element elementor-element-c462d32 elementor-widget elementor-widget-heading"
                            data-id="c462d32" data-element_type="widget" data-widget_type="heading.default">
                            <h2 class="elementor-heading-title elementor-size-default">Choisissez votre</h2>
                        </div>
                        <div class="elementor-element elementor-element-99fff7f elementor-widget elementor-widget-heading"
                            data-id="99fff7f" data-element_type="widget" data-widget_type="heading.default">
                            <h2 class="elementor-heading-title elementor-size-default">Plan parfait</h2>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-be9183c elementor-widget elementor-widget-text-editor"
                        data-id="be9183c" data-element_type="widget" data-widget_type="text-editor.default">
                        <p>Flexible, transparent et adapté à vos besoins.</p>
                    </div>
                </div>

				<div class="px-5 align-items-center row" data-id="344c36f" data-element_type="container">

                    @foreach($pricings as $pricing)
                    <div class="col-md-4">
                        <div class="mt-2 elementor-element elementor-element-612b29f e-con-full e-flex e-con e-child col-md-12" style="border-radius: 25px; border: 1px solid #041f2d;"
                            data-id="d5e1221" data-element_type="container">
                            <div class="elementor-element elementor-element-f0516a2 e-con-full e-flex e-con e-child"
                                data-id="f0516a2" data-element_type="container"
                                data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                <div class="elementor-element elementor-element-c2a1ffc e-con-full e-flex e-con e-child"
                                    data-id="c2a1ffc" data-element_type="container"
                                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                    <div class="elementor-element elementor-element-a4bdf12 elementor-widget elementor-widget-heading"
                                        data-id="a4bdf12" data-element_type="widget" data-widget_type="heading.default">
                                        <h6 class="elementor-heading-title elementor-size-default">{{ $pricing->type }}</h6>
                                    </div>
                                    <div class="elementor-element elementor-element-6bb9aa1 elementor-widget elementor-widget-heading"
                                        data-id="6bb9aa1" data-element_type="widget" data-widget_type="heading.default">
                                        <h4 class="elementor-heading-title elementor-size-default">{{ $pricing->service->nom }}</h4>
                                    </div>
                                    <div class="elementor-element elementor-element-f6ab087 elementor-widget elementor-widget-heading"
                                        data-id="f6ab087" data-element_type="widget" data-widget_type="heading.default">
                                        <h6 class="elementor-heading-title elementor-size-default">{{ $pricing->service->description }}</h6>
                                    </div>
                                    <div class="elementor-element elementor-element-6c20d9e e-con-full e-flex e-con e-child"
                                        data-id="6c20d9e" data-element_type="container">
                                        <div class="p-0 elementor-element elementor-element-6db0b5e e-con-full e-flex e-con e-child"
                                            data-id="6db0b5e" data-element_type="container">
                                            <div class="elementor-element elementor-element-d64f91a elementor-mobile-align-center elementor-widget elementor-widget-button"
                                                data-id="d64f91a" data-element_type="widget" data-widget_type="button.default">
                                                <div class="elementor-element elementor-element-30983d1 e-con-full e-flex e-con e-child"
                                                    data-id="30983d1" data-element_type="container">
                                                    <div class="elementor-element elementor-element-f91ad63 elementor-widget elementor-widget-heading"
                                                        data-id="f91ad63" data-element_type="widget"
                                                        data-widget_type="heading.default">
                                                        <h4 class="elementor-heading-title elementor-size-default">A partir de $</h4>
                                                    </div>
                                                    <div class="elementor-element elementor-element-35ec2df elementor-widget elementor-widget-heading"
                                                        data-id="35ec2df" data-element_type="widget"
                                                        data-widget_type="heading.default">
                                                        <h4 class="elementor-heading-title elementor-size-default">{{ $pricing->price }}</h4>
                                                    </div>
                                                    <div class="elementor-element elementor-element-02479f9 elementor-widget elementor-widget-heading"
                                                        data-id="02479f9" data-element_type="widget"
                                                        data-widget_type="heading.default">
                                                        <h6 class="elementor-heading-title elementor-size-default">/{{ $pricing->periode }}</h6>
                                                    </div>
                                                </div>
                                                <a class="elementor-button elementor-button-link elementor-size-sm elementor-animation-shrink"
                                                    href="#">
                                                    <span class="elementor-button-content-wrapper">
                                                        <span class="elementor-button-text">Réservez maintenant</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-0803567 e-con-full e-flex e-con e-child"
                                    data-id="0803567" data-element_type="container">
                                    <div class="elementor-element elementor-element-b7ef2b7 elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
                                        data-id="b7ef2b7" data-element_type="widget" data-widget_type="icon-list.default">
                                        <ul class="elementor-icon-list-items">
                                            @foreach($pricing->taches  as $tache)
                                            <li class="elementor-icon-list-item">
                                                <span class="elementor-icon-list-icon">
                                                    <svg aria-hidden="true" class="e-font-icon-svg e-fas-check-circle"
                                                        viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                                                        </path>
                                                    </svg> </span>
                                                <span class="elementor-icon-list-text">{{ $tache }}</span>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    {{-- <div class="elementor-element elementor-element-a169283 e-con-full e-flex e-con e-child"
                                        data-id="a169283" data-element_type="container">
                                        <div class="elementor-element elementor-element-8e558b3 elementor-widget-divider--view-line elementor-widget elementor-widget-divider"
                                            data-id="8e558b3" data-element_type="widget" data-widget_type="divider.default">
                                            <div class="elementor-divider">
                                                <span class="elementor-divider-separator">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="elementor-element elementor-element-17f3e07 elementor-widget elementor-widget-heading"
                                            data-id="17f3e07" data-element_type="widget" data-widget_type="heading.default">
                                            <h6 class="elementor-heading-title elementor-size-default">*Lorem ipsum dolor
                                                sit amet, consectetur adipiscing elit.</h6>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

				</div>

			</div>
		</div>
	</div>
    @endif

    {{-- Partenaire --}}
    <div class="px-md-5 elementor-element elementor-element-a68870b e-flex e-con-boxed e-con e-parent" data-id="a68870b"
        data-element_type="container">
        <div class="e-con-inner">
            <div class="elementor-element elementor-element-e12222d e-con-full e-flex e-con e-child"
                data-id="e12222d" data-element_type="container">
                <div class="elementor-element elementor-element-858c296 elementor-invisible elementor-widget elementor-widget-heading"
                    data-id="858c296" data-element_type="widget"
                    data-settings="{&quot;_animation&quot;:&quot;slideInLeft&quot;}"
                    data-widget_type="heading.default">
                    <h2 class="elementor-heading-title elementor-size-default">Nos</h2>
                </div>
                <div class="elementor-element elementor-element-9a2b19f animated-slow elementor-invisible elementor-widget elementor-widget-heading"
                    data-id="9a2b19f" data-element_type="widget"
                    data-settings="{&quot;_animation&quot;:&quot;slideInLeft&quot;}"
                    data-widget_type="heading.default">
                    <h2 class="elementor-heading-title elementor-size-default">Partenaires</h2>
                </div>
            </div>
            <div class="elementor-element elementor-element-5112ae3 e-con-full e-flex e-con e-child"
                data-id="5112ae3" data-element_type="container">
                <div class="elementor-element elementor-element-ce4be63 e-con-full e-flex e-con e-child"
                    data-id="ce4be63" data-element_type="container">
                    <div class="elementor-element elementor-element-b48d96d e-con-full e-flex e-con e-child"
                        data-id="b48d96d" data-element_type="container">
                        <div class="elementor-element elementor-element-8f4edef elementor-widget elementor-widget-image"
                            data-id="8f4edef" data-element_type="widget" data-widget_type="image.default">
                            <img loading="lazy" decoding="async" width="300" height="100"
                                src="{{ asset('front/wp-content/uploads/sites/44/2025/08/7NUHLGblue1.png') }}"
                                class="attachment-full size-full wp-image-399" alt="" />
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-90b914b e-con-full e-flex e-con e-child"
                        data-id="90b914b" data-element_type="container">
                        <div class="elementor-element elementor-element-fa0d356 elementor-widget elementor-widget-image"
                            data-id="fa0d356" data-element_type="widget" data-widget_type="image.default">
                            <img loading="lazy" decoding="async" width="300" height="100"
                                src="{{ asset('front/wp-content/uploads/sites/44/2025/08/7NUHLGblue3.png') }}"
                                class="attachment-full size-full wp-image-401" alt="" />
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-e97a0ed e-con-full e-flex e-con e-child"
                        data-id="e97a0ed" data-element_type="container">
                        <div class="elementor-element elementor-element-1ff5541 elementor-widget elementor-widget-image"
                            data-id="1ff5541" data-element_type="widget" data-widget_type="image.default">
                            <img loading="lazy" decoding="async" width="300" height="100"
                                src="{{ asset('front/wp-content/uploads/sites/44/2025/08/7NUHLGblue5.png') }}"
                                class="attachment-full size-full wp-image-403" alt="" />
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-affb478 e-con-full e-flex e-con e-child"
                    data-id="affb478" data-element_type="container">
                    <div class="elementor-element elementor-element-b52ad4a e-con-full e-flex e-con e-child"
                        data-id="b52ad4a" data-element_type="container">
                        <div class="elementor-element elementor-element-f43bddd elementor-widget elementor-widget-image"
                            data-id="f43bddd" data-element_type="widget" data-widget_type="image.default">
                            <img loading="lazy" decoding="async" width="300" height="100"
                                src="{{ asset('front/wp-content/uploads/sites/44/2025/08/7NUHLGblue2.png') }}"
                                class="attachment-full size-full wp-image-400" alt="" />
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-97e5e5a e-con-full e-flex e-con e-child"
                        data-id="97e5e5a" data-element_type="container">
                        <div class="elementor-element elementor-element-5024146 elementor-widget elementor-widget-image"
                            data-id="5024146" data-element_type="widget" data-widget_type="image.default">
                            <img loading="lazy" decoding="async" width="300" height="100"
                                src="{{ asset('front/wp-content/uploads/sites/44/2025/08/7NUHLGblue4.png') }}"
                                class="attachment-full size-full wp-image-402" alt="" />
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-9b830eb e-con-full e-flex e-con e-child"
                        data-id="9b830eb" data-element_type="container">
                        <div class="elementor-element elementor-element-5d44952 elementor-widget elementor-widget-image"
                            data-id="5d44952" data-element_type="widget" data-widget_type="image.default">
                            <img loading="lazy" decoding="async" width="300" height="100"
                                src="{{ asset('front/wp-content/uploads/sites/44/2025/08/7NUHLGblue6.png') }}"
                                class="attachment-full size-full wp-image-404" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- top Footer --}}
    <div class="elementor-element elementor-element-fb3b90c e-con-full e-flex e-con e-parent" data-id="fb3b90c"
        data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;gradient&quot;}">
        <div class="elementor-element elementor-element-dfec97d e-con-full e-flex e-con e-child" data-id="dfec97d"
            data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
            <div class="elementor-element elementor-element-0979da5 e-con-full e-flex e-con e-child"
                data-id="0979da5" data-element_type="container">
                <div class="elementor-element elementor-element-05e6718 e-con-full e-flex e-con e-child"
                    data-id="05e6718" data-element_type="container">
                    <div class="elementor-element elementor-element-ed8e5bd elementor-widget__width-initial elementor-widget elementor-widget-text-editor"
                        data-id="ed8e5bd" data-element_type="widget" data-widget_type="text-editor.default">
                        <p>Profitez des solutions de nettoyage et babysitting fiables, appréciées par de nombreux clients heureux.</p>
                    </div>
                    <div class="pb-3 elementor-element elementor-element-2422ea4 elementor-tablet-align-center elementor-widget elementor-widget-button"
                        data-id="2422ea4" data-element_type="widget" data-widget_type="button.default">
                        <a class="elementor-button elementor-button-link elementor-size-sm elementor-animation-shrink"
                            href="{{ route('home', '#download') }}">
                            <span class="elementor-button-content-wrapper">
                                <span class="elementor-button-text">Télécharger L'application</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="elementor-element elementor-element-aa50941 e-con-full e-flex e-con e-child"
                data-id="aa50941" data-element_type="container">
                <div class="elementor-element elementor-element-b25a144 e-con-full e-flex e-con e-child"
                    data-id="b25a144" data-element_type="container">
                    <div class="elementor-element elementor-element-689854d elementor-invisible elementor-widget elementor-widget-image"
                        data-id="689854d" data-element_type="widget"
                        data-settings="{&quot;_animation&quot;:&quot;slideInUp&quot;}"
                        data-widget_type="image.default">
                        <img loading="lazy" decoding="async" width="600" height="594"
                            src="{{ asset('icons/babies.png') }}"
                            class="attachment-full size-full wp-image-1256" alt=""
                            srcset="{{ asset('icons/babies.png') }}"
                            sizes="(max-width: 600px) 100vw, 600px" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
