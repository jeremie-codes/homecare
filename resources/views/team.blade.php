@extends('layouts.base')

@section('title')
    Notre équipe
@endsection

@section('content')
{{-- main section --}}
<div data-elementor-type="wp-post" data-elementor-id="975" class="elementor elementor-975">
	<div class="elementor-element elementor-element-deff939 e-flex e-con-boxed e-con e-parent" data-id="deff939"
		data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
		<div class="e-con-inner">
			<div class="elementor-element elementor-element-73cdf58 elementor-widget elementor-widget-heading"
				data-id="73cdf58" data-element_type="widget" data-widget_type="heading.default">
				<h2 class="elementor-heading-title elementor-size-default">Notre équipe</h2>
			</div>
			<div class="elementor-element elementor-element-69c3198 elementor-widget elementor-widget-text-editor"
				data-id="69c3198" data-element_type="widget" data-widget_type="text-editor.default">
				<p><a href="#">Home</a> &#8211; Notre équipe</p>
			</div>
		</div>
	</div>

	<div class="elementor-element elementor-element-03d62b2 e-flex e-con-boxed e-con e-parent" data-id="03d62b2"
		data-element_type="container">
		<div class="e-con-inner">
			<div class="elementor-element elementor-element-bd955d5 e-con-full e-flex e-con e-child"
				data-id="bd955d5" data-element_type="container">
				{{-- <div class="elementor-element elementor-element-be41a40 e-con-full e-flex elementor-invisible e-con e-child"
					data-id="be41a40" data-element_type="container"
					data-settings="{&quot;animation&quot;:&quot;slideInDown&quot;}">
					<div class="elementor-element elementor-element-00beb80 elementor-widget elementor-widget-heading"
						data-id="00beb80" data-element_type="widget" data-widget_type="heading.default">
						<h2 class="elementor-heading-title elementor-size-default">Your</h2>
					</div>
					<div class="elementor-element elementor-element-5db047c elementor-widget elementor-widget-heading"
						data-id="5db047c" data-element_type="widget" data-widget_type="heading.default">
						<h2 class="elementor-heading-title elementor-size-default">Home Friends</h2>
					</div>
				</div> --}}
				<div class="elementor-element elementor-element-96af099 elementor-widget elementor-widget-text-editor"
					data-id="96af099" data-element_type="widget" data-widget_type="text-editor.default">
					<p>Chaque mission est accomplie avec professionnalisme et bienveillance, pour garantir le confort, la sécurité et l’harmonie de votre foyer.</p>
				</div>
			</div>

			<div class="px-5 row"
				data-id="ef8c284" data-element_type="container">
				@forelse($agents as $agent)
                <div class="elementor-element elementor-element-7c519e0 e-con-full animated-fast e-flex elementor-invisible e-con e-child col-md-4"
					data-id="7c519e0" data-element_type="container"
					data-settings="{&quot;animation&quot;:&quot;slideInUp&quot;}">
					<div class="elementor-element elementor-element-8964603 elementor-widget elementor-widget-image"
						data-id="8964603" data-element_type="widget" data-widget_type="image.default">
						<img fetchpriority="high" decoding="async" width="600" height="700"
							src="{{ asset($agent->user->avatar) }}"
							class="attachment-full size-full wp-image-1253" alt=""
							srcset="{{ asset($agent->user->avatar) }}"
							sizes="(max-width: 600px) 100vw, 600px" />
					</div>
					<div class="elementor-element elementor-element-289335b e-con-full e-flex e-con e-child"
						data-id="289335b" data-element_type="container"
						data-settings="{&quot;background_background&quot;:&quot;gradient&quot;}">
						<div class="elementor-element elementor-element-eb07d29 e-con-full e-flex e-con e-child"
							data-id="eb07d29" data-element_type="container">
							<div class="elementor-element elementor-element-2b0badd e-con-full e-flex e-con e-child"
								data-id="2b0badd" data-element_type="container">
								<div class="elementor-element elementor-element-c9f4841 elementor-widget elementor-widget-image"
									data-id="c9f4841" data-element_type="widget" data-widget_type="image.default">
									<img decoding="async" width="300" height="300"
										src="{{ asset('icons/Blink.png') }}"
										class="attachment-full size-full wp-image-302" alt=""
										srcset="{{ asset('icons/Blink.png') }}"
										sizes="(max-width: 300px) 100vw, 300px" />
								</div>
							</div>
							<div class="elementor-element elementor-element-2df65b9 e-con-full e-flex e-con e-child"
								data-id="2df65b9" data-element_type="container">
								<div class="elementor-element elementor-element-427cdf4 elementor-widget elementor-widget-heading"
									data-id="427cdf4" data-element_type="widget" data-widget_type="heading.default">
									<div class="elementor-heading-title elementor-size-default">{{ $agent->user->name }}
									</div>
								</div>
								<div class="elementor-element elementor-element-10c7d8f elementor-widget elementor-widget-heading"
									data-id="10c7d8f" data-element_type="widget" data-widget_type="heading.default">
									<h6 class="elementor-heading-title elementor-size-default">{{ $agent->category->name }}</h6>
								</div>
							</div>
						</div>
					</div>
				</div>
                @empty
                    Aucun agents ajouté
                @endforelse
			</div>
		</div>
	</div>

	<div class="mb-3 elementor-element elementor-element-af16f04 e-con-full e-flex e-con e-parent" data-id="af16f04"
		data-element_type="container">
		<div class="elementor-element elementor-element-0afdea7 e-con-full e-flex e-con e-child" data-id="0afdea7"
			data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
			<div class="elementor-element elementor-element-1e64a37 e-con-full e-flex e-con e-child"
				data-id="1e64a37" data-element_type="container">
				<div class="elementor-element elementor-element-4cd394b elementor-widget elementor-widget-heading"
					data-id="4cd394b" data-element_type="widget" data-widget_type="heading.default">
					<h2 class="elementor-heading-title elementor-size-default">Résultats impeccables garantis,</h2>
				</div>
				<div class="elementor-element elementor-element-98c6339 elementor-widget elementor-widget-heading"
					data-id="98c6339" data-element_type="widget" data-widget_type="heading.default">
					<h2 class="elementor-heading-title elementor-size-default">demandez un devis gratuit !</h2>
				</div>
			</div>
			<div class="elementor-element elementor-element-0f8a73b elementor-align-center elementor-widget elementor-widget-button"
				data-id="0f8a73b" data-element_type="widget" data-widget_type="button.default">
				<a class="elementor-button elementor-button-link elementor-size-sm elementor-animation-shrink"
					href="{{ route('contact') }}">
					<span class="elementor-button-content-wrapper">
						<span class="elementor-button-icon">
							<svg aria-hidden="true" class="e-font-icon-svg e-fas-arrow-circle-right"
								viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
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

</div>

@endsection
