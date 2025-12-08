<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div
        x-data="{
            state: $wire.$entangle('{{ $getStatePath() }}'),
            lat: $wire.entangle('{{ $getLatField() }}'),
            lng: $wire.entangle('{{ $getLngField() }}'),
            map: null,
            marker: null,
            initMap() {
                // Initialize map
                this.map = L.map(this.$refs.map).setView([this.lat || -6.200000, this.lng || 106.816666], 13);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '© OpenStreetMap'
                }).addTo(this.map);

                // Add marker if location exists
                if (this.lat && this.lng) {
                     this.marker = L.marker([this.lat, this.lng], {draggable: true}).addTo(this.map);
                     this.marker.on('dragend', (event) => {
                        var position = event.target.getLatLng();
                        this.lat = position.lat;
                        this.lng = position.lng;
                     });
                }

                // Map click listener
                this.map.on('click', (e) => {
                    if (this.marker) {
                        this.marker.setLatLng(e.latlng);
                    } else {
                        this.marker = L.marker(e.latlng, {draggable: true}).addTo(this.map);
                        this.marker.on('dragend', (event) => {
                            var position = event.target.getLatLng();
                            this.lat = position.lat;
                            this.lng = position.lng;
                        });
                    }
                    this.lat = e.latlng.lat;
                    this.lng = e.latlng.lng;
                });
            }
        }"
        x-init="
            if (!document.getElementById('leaflet-css')) {
                var link = document.createElement('link');
                link.id = 'leaflet-css';
                link.rel = 'stylesheet';
                link.href = 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css';
                document.head.appendChild(link);
            }
            if (!window.L) {
                var script = document.createElement('script');
                script.src = 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js';
                script.onload = () => initMap();
                document.head.appendChild(script);
            } else {
                initMap();
            }
        "
        wire:ignore
    >
        <div x-ref="map" class="h-96 w-full rounded-lg border border-gray-300 z-10" style="min-height: 400px;"></div>
    </div>
</x-dynamic-component>
