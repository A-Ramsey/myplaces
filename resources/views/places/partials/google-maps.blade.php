
<x-text-input id="latitude" name="latitude" class="hidden" :value="old('latitude')" required autofocus autocomplete="latitude" />
<x-text-input id="longitude" name="longitude" class="hidden" :value="old('longitude')" required autofocus autocomplete="longitude" />

<div id="google_map" style="width:800px;height:400px;"></div>
<script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
    ({key: "", v: "weekly"});</script>

<script>
    let map;
    let latInp = document.getElementById("latitude");
    let lngInp = document.getElementById("longitude");

    latInp.value = 0;
    lngInp.value = 0;


    async function initMap() {
        const { Map } = await google.maps.importLibrary("maps");

        map = new Map(document.getElementById("google_map"), {
            center: { lat: 50, lng: -3 },
            zoom: 8,
        });

        let marker = new google.maps.Marker({
            map: map,
        });

        google.maps.event.addListener(map, 'click', function (event) {
            latInp.value = event.latLng.lat();
            lngInp.value = event.latLng.lng();
            marker.setPosition(event.latLng);
        });
        navigator.geolocation.getCurrentPosition(function (position) {
            latInp.value = position.coords.latitude;
            lngInp.value = position.coords.longitude;
            marker.setPosition({ lat: position.coords.latitude, lng: position.coords.longitude });
            map.setCenter({ lat: position.coords.latitude, lng: position.coords.longitude });
        });
    }

    initMap();
</script>