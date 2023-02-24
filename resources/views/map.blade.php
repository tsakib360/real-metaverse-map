<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Display a map on a webpage</title>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.13.0/mapbox-gl.css" rel="stylesheet">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.13.0/mapbox-gl.js"></script>
    <link href="{{asset('css/map.css')}}" rel="stylesheet">
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
            width: 1000px !important;
            max-width: 1000px !important;
        }

        .mapboxgl-popup-content {
            /*text-align: center;*/
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
        .shopping-mall {
            background-image: url({{asset('points/shopping-mall.png')}});
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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
            },
            {
                type: 'Feature',
                geometry: {
                    type: 'Point',
                    coordinates: [-118.243683, 34.052235]
                },
                properties: {
                    title: 'Shopping Mall',
                    description: 'Shopping Mall'
                },
                class: 'shopping-mall'
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
                        <div class="row">
                            <div class="col-md-4">
                                <div class="sc-product-item style-5">
                                    <div class="product-img">
                                        <img src="https://famous-souffle-7b597e.netlify.app/images/all-img/v3/card2.jpg" alt="Image">
                                    </div>
                                    <div class="fugu--card-data">
                                            <h3>Shopping Mall</h3>
                                            <p>Total Shares : 10000</p>
                                            <p>APY : 72%</p>
                                            <div class="fugu--card-footer">
                                                <div class="fugu--card-footer-data">
                                                    <span>Share Price:</span>
                                                    <h4>$1500 USDT</h4>
                                            </div>
                                            <a class="fugu--btn btn-sm bg-white text-white" href="/" style="background: linear-gradient(225deg,#0080ff,#7d41ea 46.35%,#ff00d4);">Buy Share</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="sc-product-item style-5">
                                    <div class="product-img">
                                        <img src="https://famous-souffle-7b597e.netlify.app/images/all-img/v3/card2.jpg" alt="Image">
                                    </div>
                                    <div class="fugu--card-data">
                                            <h3>Shopping Mall</h3>
                                            <p>Total Shares : 10000</p>
                                            <p>APY : 72%</p>
                                            <div class="fugu--card-footer">
                                                <div class="fugu--card-footer-data">
                                                    <span>Share Price:</span>
                                                    <h4>$1500 USDT</h4>
                                            </div>
                                            <a class="fugu--btn btn-sm bg-white text-white" href="/" style="background: linear-gradient(225deg,#0080ff,#7d41ea 46.35%,#ff00d4);">Buy Share</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="sc-product-item style-5">
                                    <div class="product-img">
                                        <img src="https://famous-souffle-7b597e.netlify.app/images/all-img/v3/card2.jpg" alt="Image">
                                    </div>
                                    <div class="fugu--card-data">
                                            <h3>Shopping Mall</h3>
                                            <p>Total Shares : 10000</p>
                                            <p>APY : 72%</p>
                                            <div class="fugu--card-footer">
                                                <div class="fugu--card-footer-data">
                                                    <span>Share Price:</span>
                                                    <h4>$1500 USDT</h4>
                                            </div>
                                            <a class="fugu--btn btn-sm bg-white text-white" href="/" style="background: linear-gradient(225deg,#0080ff,#7d41ea 46.35%,#ff00d4);">Buy Share</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        `
                    )
            )
            .addTo(map);
    }
</script>

</body>
</html>
