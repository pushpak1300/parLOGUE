@extends('common.dinavbar')

@section('content')
 <!-- Product filter section -->
<section class="product-filter-section">
		<div class="container">
			<div class="section-title">
                <br>
				<h2>Categories</h2>
				
			</div>
			
			<div class="row text-center">
                <div class="col-lg-3"></div>

                <a href="">
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
                        <a href="/boys">
						<div class="pi-pic">
<img src="{{asset('image/boy.png')}}">							
                        </div>
                        </a>
						<div class="pi-text">
							<p>Boys </p>
						</div>
                    </div>
                </div>

                    <div class="col-lg-3 col-sm-6">
					<div class="product-item">
                        <a href="/girls">
						<div class="pi-pic">
<img src="{{asset('image/girl.png')}}">							
                        </div>
                        </a>
						<div class="pi-text">
							<p>Girls</p>
						</div>
                    </div>
                    
                </div>
                <div class="col-lg-3"></div>

		</div>
    
	</section>
	
@endsection
@push('js')
	<script>
	// This is the "Offline page" service worker

// Add this below content to your HTML page, or add the js file to your page at the very top to register service worker

// Check compatibility for the browser we're running this in
if ("serviceWorker" in navigator) {
  if (navigator.serviceWorker.controller) {
    console.log("[PWA Builder] active service worker found, no need to register");
  } else {
    // Register the service worker
    navigator.serviceWorker
      .register("pwabuilder-sw.js", {
        scope: "./"
      })
      .then(function (reg) {
        console.log("[PWA Builder] Service worker has been registered for scope: " + reg.scope);
      });
  }
}
</script>
<script>

    let deferredPrompt = null;

window.addEventListener('beforeinstallprompt', (e) => {
  // Prevent Chrome 67 and earlier from automatically showing the prompt
  e.preventDefault();
  // Stash the event so it can be triggered later.
  deferredPrompt = e;
});

async function install() {
  if (deferredPrompt) {
    deferredPrompt.prompt();
    console.log(deferredPrompt)
    deferredPrompt.userChoice.then(function(choiceResult){

      if (choiceResult.outcome === 'accepted') {
      console.log('Your PWA has been installed');
    } else {
      console.log('User chose to not install your PWA');
    }

    deferredPrompt = null;

    });


  }
}</script>
@endpush