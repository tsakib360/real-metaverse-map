<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Display a map on a webpage</title>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.13.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.13.0/mapbox-gl.js"></script>
    <style>
        body { margin: 0; padding: 0; }
        #map { position: absolute; top: 0; bottom: 0; width: 100%; }
        .marker {
            background-image: url({{asset('service-station.jpg')}});
            background-size: cover;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
        }

        .mapboxgl-popup {
            max-width: 200px;
        }

        .mapboxgl-popup-content {
            text-align: center;
            font-family: 'Open Sans', sans-serif;
        }


        .service-station {
            background-image: url({{asset('points/service-station.jpg')}});
            background-size: cover;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
        }
        .gas-station {
            background-image: url({{asset('points/gas-station.png')}});
            background-size: cover;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
        }
        .study-institue {
            background-image: url({{asset('points/study-institue.jpg')}});
            background-size: cover;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
        }
        .hospital {
            background-image: url({{asset('points/hospital.jpg')}});
            background-size: cover;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
        }
        .agri {
            background-image: url({{asset('points/agri.jpg')}});
            background-size: cover;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
        }
        .science-and-technology {
            background-image: url({{asset('points/science-and-techno.png')}});
            background-size: cover;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
        }
        .health-science-and-technology {
            background-image: url({{asset('points/health-science-technology.jpg')}});
            background-size: cover;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
        }
        .renewal-energy-technology {
            background-image: url({{asset('points/renewal-energy.jpg')}});
            background-size: cover;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div id="map"></div>
<script>
    // TO MAKE THE MAP APPEAR YOU MUST
    // ADD YOUR ACCESS TOKEN FROM
    // https://account.mapbox.com
    mapboxgl.accessToken = 'pk.eyJ1IjoidHNha2liMzYwIiwiYSI6ImNsZWllOHlxYzAwa2w0M2xudDY3dmZob3IifQ.7SwByFMw6C4JxxTpdeLVQQ';
    const map = new mapboxgl.Map({
        container: 'map', // container ID
        // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
        style: 'mapbox://styles/tsakib360/cleierec7003g01s0zw6w0wp1', // style URL
        center: [-77.032, 38.913], // starting position [lng, lat]
        zoom: 9, // starting zoom,
        projection: 'equirectangular' // starting projection
    });

    const geojson = {
        type: 'FeatureCollection',
        features: [
            {
                type: 'Feature',
                geometry: {
                    type: 'Point',
                    coordinates: [-77.032, 38.913]
                },
                properties: {
                    title: 'Service Station',
                    description: 'Service Station'
                },
                class: 'service-station'
            },
            {
                type: 'Feature',
                geometry: {
                    type: 'Point',
                    coordinates: [-122.414, 37.776]
                },
                properties: {
                    title: 'Gas Station',
                    description: 'Gas Station'
                },
                class: 'gas-station'
            },
            {
                type: 'Feature',
                geometry: {
                    type: 'Point',
                    coordinates: [-96.047092, 36.180839]
                },
                properties: {
                    title: 'Study Institute',
                    description: 'Study Institute'
                },
                class: 'study-institue'
            },
            {
                type: 'Feature',
                geometry: {
                    type: 'Point',
                    coordinates: [-93.386626, 32.813536]
                },
                properties: {
                    title: 'Hospital',
                    description: 'hospital'
                },
                class: 'hospital'
            },
            {
                type: 'Feature',
                geometry: {
                    type: 'Point',
                    coordinates: [-91.385779, 32.832000]
                },
                properties: {
                    title: 'Agricultural and Food',
                    description: 'Agricultural and Food'
                },
                class: 'agri'
            },
            {
                type: 'Feature',
                geometry: {
                    type: 'Point',
                    coordinates: [-97.498256, 33.200488]
                },
                properties: {
                    title: 'Science and Technology',
                    description: 'Science and Technology'
                },
                class: 'science-and-technology'
            },
            {
                type: 'Feature',
                geometry: {
                    type: 'Point',
                    coordinates: [-92.748993, 34.369228]
                },
                properties: {
                    title: 'Health, Science and Technology',
                    description: 'Health, Science and Technology'
                },
                class: 'health-science-and-technology'
            },
            {
                type: 'Feature',
                geometry: {
                    type: 'Point',
                    coordinates: [-92.620311, 36.763917]
                },
                properties: {
                    title: 'Renewal Energy & Technology',
                    description: 'Renewal Energy & Technology'
                },
                class: 'renewal-energy-technology'
            }
        ]
    };

    // add markers to map
    for (const feature of geojson.features) {
        // create a HTML element for each feature
        const el = document.createElement('div');
        el.className = feature.class;

        // make a marker for each feature and add to the map
        new mapboxgl.Marker(el).setLngLat(feature.geometry.coordinates)
            .setPopup(
                new mapboxgl.Popup({ offset: 25 }) // add popups
                    .setHTML(
                        `
                            <h3>${feature.properties.title}</h3>
                            <p>${feature.properties.description}</p>
                            <a href="https://real-metaverse.vercel.app/" target="_blank">Click Here</a>
                        `
                    )
            )
            .addTo(map);
    }
</script>

</body>
</html>
