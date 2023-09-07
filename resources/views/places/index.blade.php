<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Places") }}
        </h2>
    </x-slot>

    <x-page-content :title="__('Places')" >
        <div id="google_map" style="width:800px;height:400px;"></div>
        <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
            ({key: "", v: "weekly"});</script>

        <script>
            let map;
            async function initMap() {
                const { Map } = await google.maps.importLibrary("maps");

                map = new Map(document.getElementById("google_map"), {
                    center: { lat: 52.5, lng: -3 },
                    zoom: 8,
                });

                @foreach($places as $place)
                    let marker = new google.maps.Marker({
                        map: map,
                        position: new google.maps.LatLng({{ $place->latitude }}, {{ $place->longitude }}),
                        title: "{{ $place->name }}",
                    });
                @endforeach
            }

            initMap();
        </script>
    </x-page-content>
</x-app-layout>