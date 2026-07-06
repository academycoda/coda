const googleMaps = {
  loader: null,

  load(apiKey) {
    if (this.loader) {
      return this.loader;
    }

    this.loader = new Promise((resolve, reject) => {
      if (window.google?.maps?.importLibrary) {
        resolve();

        return;
      }

      const script = document.createElement('script');
      const params = new URLSearchParams({
        key: apiKey,
        v: 'weekly',
        loading: 'async',
        language: 'sk',
        region: 'SK',
        callback: 'codaGoogleMapsLoaded',
      });

      window.codaGoogleMapsLoaded = () => resolve();
      script.src = `https://maps.googleapis.com/maps/api/js?${params.toString()}`;
      script.async = true;
      script.onerror = () => reject(new Error('Google Maps JavaScript API sa nepodarilo nacitat.'));

      document.head.append(script);
    });

    return this.loader;
  },

  async initialize(container) {
    if (container.dataset.mapInitialized === 'true') {
      return;
    }

    const { mapKey, mapId, mapLat, mapLng, mapTitle } = container.dataset;

    if (!mapKey || !mapId) {
      return;
    }

    container.dataset.mapInitialized = 'true';

    await this.load(mapKey);

    const [{ Map }, { AdvancedMarkerElement }] = await Promise.all([
      google.maps.importLibrary('maps'),
      google.maps.importLibrary('marker'),
    ]);

    const position = {
      lat: Number(mapLat),
      lng: Number(mapLng),
    };

    const map = new Map(container.querySelector('[data-map-canvas]'), {
      center: position,
      zoom: 14,
      mapId,
      disableDefaultUI: true,
      mapTypeControl: false,
      fullscreenControl: false,
      streetViewControl: false,
      renderingType: 'VECTOR',
      internalUsageAttributionIds: ['gmp_git_agentskills_v1'],
    });

    const markerPin = document.createElement('img');
    markerPin.src = '/assets/img/map-pin.svg';
    markerPin.alt = '';
    markerPin.width = 50;
    markerPin.height = 60;

    const marker = new AdvancedMarkerElement({
      map,
      position,
      title: mapTitle,
    });

    marker.append(markerPin);
  },

  initializeAll() {
    document.querySelectorAll('[data-map]').forEach((container) => {
      this.initialize(container).catch((error) => {
        console.error(error);
      });
    });
  },
};

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', () => googleMaps.initializeAll());
} else {
  googleMaps.initializeAll();
}

document.addEventListener('livewire:navigated', () => googleMaps.initializeAll());
