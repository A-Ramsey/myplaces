<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Places") }}
        </h2>
    </x-slot>

    <x-page-content :title="__($place->name)" >
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __($place->notes) }}
        </p>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            <x-star-rating rating="{{ $place->star_rating }}" />
        </p>
        <div id="google_map" style="width:800px;height:400px;"></div>
        <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
            ({key: "", v: "weekly"});</script>

        <script>
            let map;
            async function initMap() {
                const { Map } = await google.maps.importLibrary("maps");

                map = new Map(document.getElementById("google_map"), {
                    center: { lat: {{ $place->latitude }} , lng: {{ $place->longitude }} },
                    zoom: 8,
                });

                let marker = new google.maps.Marker({
                    map: map,
                });
                marker.setPosition({ lat: {{ $place->latitude }}, lng: {{ $place->longitude }} });
            }

            initMap();
        </script>
        <x-danger-button class="mt-4" :text="__('Delete Place')" :href="route('place.delete', $place->id)">Delete Place</x-danger-button>
    </x-page-content>
</x-app-layout>