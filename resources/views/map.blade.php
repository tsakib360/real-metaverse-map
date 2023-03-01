<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Display a map on a webpage</title>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.13.0/mapbox-gl.css" rel="stylesheet">
    <!-- bootstrap -->
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


    <!-- jquery -->
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>--}}
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
            background-image: url({{asset('points/service-station.png')}});
            background-size: cover;
            width: 75px;
            height: 75px;
            border-radius: 50%;
            cursor: pointer;
        }
        .gas-station {
            background-image: url({{asset('points/petrol-pump.png')}});
            background-size: cover;
            width: 75px;
            height: 75px;
            border-radius: 50%;
            cursor: pointer;
        }
        .study-institue {
            background-image: url({{asset('points/study-institue.png')}});
            background-size: cover;
            width: 75px;
            height: 75px;
            border-radius: 50%;
            cursor: pointer;
        }
        .hospital {
            background-image: url({{asset('points/medical-institute.png')}});
            background-size: cover;
            width: 75px;
            height: 75px;
            border-radius: 50%;
            cursor: pointer;
        }
        .agri {
            background-image: url({{asset('points/agriculture-and-food.png')}});
            background-size: cover;
            width: 75px;
            height: 75px;
            border-radius: 50%;
            cursor: pointer;
        }
        .science-and-technology {
            background-image: url({{asset('points/science-and-techno.png')}});
            background-size: cover;
            width: 75px;
            height: 75px;
            border-radius: 50%;
            cursor: pointer;
        }
        .health-science-and-technology {
            background-image: url({{asset('points/health-science-technology.png')}});
            background-size: cover;
            width: 75px;
            height: 75px;
            border-radius: 50%;
            cursor: pointer;
        }
        .renewal-energy-technology {
            background-image: url({{asset('points/renewal-energy.png')}});
            background-size: cover;
            width: 75px;
            height: 75px;
            border-radius: 50%;
            cursor: pointer;
        }
        .shopping-mall {
            background-image: url({{asset('points/shopping-mall.png')}});
            background-size: cover;
            width: 75px;
            height: 75px;
            border-radius: 50%;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div id="map"></div>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm">
        <div class="modal-content">
            <div class="sc-iwsKbI lvHJA">
                <div class="FitText text-center" style="max-height: 51px; padding: 0px 15px; text-align: center; overflow: hidden; font-size: 22px;">Shopping Mall</div>
{{--                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>--}}
{{--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
            </div>
            <div class="modal-body p-0">
                <div class="ztOIu">Total Shares - 10000</div>
                <div class="sc-dHIava jCmHFN px-2">
                    <div class="sc-guztPN cBuDQz">
                        <div class="inner-wrapper">
                            <div class="avatar Explorer" id="" style="z-index: 2; transform: scale(0.78); --explorer-color:#05DD66;">
                                <div class="image-container">
                                    <img src="{{asset('points/shopping-mall.png')}}" alt="explorer">
                                    <div class="sc-feJyhm gQkodS">
                                        <div font-size="10.2px" class="sc-kafWEX cvwEAa">
                                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_496_322880)"><path d="M27.5283 18.6682L18.6682 27.5283C16.6434 29.5532 13.3604 29.5532 11.3355 27.5283L2.47546 18.6682C0.450585 16.6434 0.450585 13.3604 2.47546 11.3355L11.3355 2.47546C13.3604 0.450585 16.6434 0.450585 18.6682 2.47546L27.5283 11.3355C29.5532 13.3604 29.5532 16.6434 27.5283 18.6682Z" fill="#174bc6"></path><path opacity="0.25" d="M24.7261 14.9955C24.6484 14.6976 24.4801 14.4128 24.247 14.1667L16.3356 6.26826C15.5976 5.51724 14.4062 5.51724 13.6682 6.26826L5.75674 14.1667C5.52368 14.4128 5.35535 14.6976 5.27766 14.9955C5.09636 14.361 5.25174 13.6617 5.75674 13.1567L13.6682 5.24529C14.4062 4.50723 15.5976 4.50723 16.3356 5.24529L24.247 13.1567C24.7521 13.6617 24.9074 14.361 24.7261 14.9955Z" fill="#232323"></path><path opacity="0.25" d="M24.247 16.8471L16.3356 24.7585C15.5975 25.4966 14.4062 25.4966 13.6682 24.7585L5.75674 16.8471C5.25174 16.3421 5.09636 15.6299 5.27766 14.9955C5.35534 15.2932 5.52368 15.5781 5.75674 15.8242L13.6682 23.7356C14.4062 24.4737 15.5975 24.4737 16.3356 23.7356L24.247 15.8242C24.4801 15.5781 24.6484 15.2932 24.7261 14.9955C24.9074 15.6299 24.7521 16.3421 24.247 16.8471Z" fill="white"></path><path opacity="0.25" d="M28.9587 14.4017L17.2382 26.1221C16.0032 27.3571 14.0009 27.3571 12.7659 26.1221L1.04541 14.4017C0.973572 14.3299 0.920306 14.2475 0.856766 14.1708C0.595728 15.6465 1.0285 17.2211 2.16851 18.3612L11.6428 27.8354C13.498 29.6907 16.5061 29.6907 18.3613 27.8354L27.8356 18.3612C28.9756 17.2212 29.4084 15.6465 29.1473 14.1708C29.0838 14.2475 29.0305 14.3299 28.9587 14.4017Z" fill="#232323"></path><path opacity="0.25" d="M1.04541 15.4523L12.7659 3.73195C14.0009 2.49694 16.0032 2.49694 17.2382 3.73195L28.9587 15.4523C29.0305 15.5242 29.0838 15.6065 29.1473 15.6833C29.4084 14.2076 28.9756 12.6329 27.8356 11.4929L18.3613 2.01864C16.5061 0.163402 13.498 0.163402 11.6428 2.01864L2.16851 11.4929C1.0285 12.6329 0.595728 14.2076 0.856766 15.6833C0.920306 15.6065 0.973573 15.5242 1.04541 15.4523Z" fill="white"></path><path d="M15.0019 30C13.5857 30 12.1707 29.4626 11.0934 28.384L1.61918 18.9104C0.574711 17.866 0 16.4776 0 15.0019C0 13.525 0.575342 12.1372 1.61918 11.0934L11.0934 1.61918C12.1372 0.575342 13.525 0 15.0019 0C16.4776 0 17.866 0.574711 18.9104 1.61918L28.384 11.0934C30.5387 13.2481 30.5387 16.7545 28.3852 18.9104C28.3852 18.9104 28.3852 18.9104 28.384 18.9104L18.9104 28.384C17.8331 29.4613 16.4169 30 15.0019 30ZM15.0019 1.55406C13.9404 1.55406 12.9427 1.96691 12.1922 2.71802L2.71802 12.1922C1.96691 12.9427 1.55406 13.9404 1.55406 15.0019C1.55406 16.0628 1.96755 17.0618 2.71802 17.8129L12.1922 27.2864C13.7412 28.8341 16.2626 28.8354 17.8129 27.2851L27.2864 17.8129H27.2851C28.8341 16.2626 28.8354 13.7412 27.2864 12.1922L17.8129 2.71802C17.0617 1.96754 16.0628 1.55406 15.0019 1.55406ZM27.8352 18.3616H27.8478H27.8352Z" fill="#232323"></path></g><defs><clipPath id="clip0_496_322880"><rect width="30" height="30" fill="white"></rect></clipPath></defs></svg></div><div font-size="10.2px" class="sc-kafWEX lazSOu"><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_496_322880)"><path d="M27.5283 18.6682L18.6682 27.5283C16.6434 29.5532 13.3604 29.5532 11.3355 27.5283L2.47546 18.6682C0.450585 16.6434 0.450585 13.3604 2.47546 11.3355L11.3355 2.47546C13.3604 0.450585 16.6434 0.450585 18.6682 2.47546L27.5283 11.3355C29.5532 13.3604 29.5532 16.6434 27.5283 18.6682Z" fill="#174bc6"></path><path opacity="0.25" d="M24.7261 14.9955C24.6484 14.6976 24.4801 14.4128 24.247 14.1667L16.3356 6.26826C15.5976 5.51724 14.4062 5.51724 13.6682 6.26826L5.75674 14.1667C5.52368 14.4128 5.35535 14.6976 5.27766 14.9955C5.09636 14.361 5.25174 13.6617 5.75674 13.1567L13.6682 5.24529C14.4062 4.50723 15.5976 4.50723 16.3356 5.24529L24.247 13.1567C24.7521 13.6617 24.9074 14.361 24.7261 14.9955Z" fill="#232323"></path><path opacity="0.25" d="M24.247 16.8471L16.3356 24.7585C15.5975 25.4966 14.4062 25.4966 13.6682 24.7585L5.75674 16.8471C5.25174 16.3421 5.09636 15.6299 5.27766 14.9955C5.35534 15.2932 5.52368 15.5781 5.75674 15.8242L13.6682 23.7356C14.4062 24.4737 15.5975 24.4737 16.3356 23.7356L24.247 15.8242C24.4801 15.5781 24.6484 15.2932 24.7261 14.9955C24.9074 15.6299 24.7521 16.3421 24.247 16.8471Z" fill="white"></path><path opacity="0.25" d="M28.9587 14.4017L17.2382 26.1221C16.0032 27.3571 14.0009 27.3571 12.7659 26.1221L1.04541 14.4017C0.973572 14.3299 0.920306 14.2475 0.856766 14.1708C0.595728 15.6465 1.0285 17.2211 2.16851 18.3612L11.6428 27.8354C13.498 29.6907 16.5061 29.6907 18.3613 27.8354L27.8356 18.3612C28.9756 17.2212 29.4084 15.6465 29.1473 14.1708C29.0838 14.2475 29.0305 14.3299 28.9587 14.4017Z" fill="#232323"></path><path opacity="0.25" d="M1.04541 15.4523L12.7659 3.73195C14.0009 2.49694 16.0032 2.49694 17.2382 3.73195L28.9587 15.4523C29.0305 15.5242 29.0838 15.6065 29.1473 15.6833C29.4084 14.2076 28.9756 12.6329 27.8356 11.4929L18.3613 2.01864C16.5061 0.163402 13.498 0.163402 11.6428 2.01864L2.16851 11.4929C1.0285 12.6329 0.595728 14.2076 0.856766 15.6833C0.920306 15.6065 0.973573 15.5242 1.04541 15.4523Z" fill="white"></path><path d="M15.0019 30C13.5857 30 12.1707 29.4626 11.0934 28.384L1.61918 18.9104C0.574711 17.866 0 16.4776 0 15.0019C0 13.525 0.575342 12.1372 1.61918 11.0934L11.0934 1.61918C12.1372 0.575342 13.525 0 15.0019 0C16.4776 0 17.866 0.574711 18.9104 1.61918L28.384 11.0934C30.5387 13.2481 30.5387 16.7545 28.3852 18.9104C28.3852 18.9104 28.3852 18.9104 28.384 18.9104L18.9104 28.384C17.8331 29.4613 16.4169 30 15.0019 30ZM15.0019 1.55406C13.9404 1.55406 12.9427 1.96691 12.1922 2.71802L2.71802 12.1922C1.96691 12.9427 1.55406 13.9404 1.55406 15.0019C1.55406 16.0628 1.96755 17.0618 2.71802 17.8129L12.1922 27.2864C13.7412 28.8341 16.2626 28.8354 17.8129 27.2851L27.2864 17.8129H27.2851C28.8341 16.2626 28.8354 13.7412 27.2864 12.1922L17.8129 2.71802C17.0617 1.96754 16.0628 1.55406 15.0019 1.55406ZM27.8352 18.3616H27.8478H27.8352Z" fill="#232323"></path></g><defs><clipPath id="clip0_496_322880"><rect width="30" height="30" fill="white"></rect></clipPath></defs></svg></div><div font-size="10.2px" class="sc-kafWEX fAKLNj"><span class="sc-cIShpX jWHads">19</span><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_496_322880)"><path d="M27.5283 18.6682L18.6682 27.5283C16.6434 29.5532 13.3604 29.5532 11.3355 27.5283L2.47546 18.6682C0.450585 16.6434 0.450585 13.3604 2.47546 11.3355L11.3355 2.47546C13.3604 0.450585 16.6434 0.450585 18.6682 2.47546L27.5283 11.3355C29.5532 13.3604 29.5532 16.6434 27.5283 18.6682Z" fill="#174bc6"></path><path opacity="0.25" d="M24.7261 14.9955C24.6484 14.6976 24.4801 14.4128 24.247 14.1667L16.3356 6.26826C15.5976 5.51724 14.4062 5.51724 13.6682 6.26826L5.75674 14.1667C5.52368 14.4128 5.35535 14.6976 5.27766 14.9955C5.09636 14.361 5.25174 13.6617 5.75674 13.1567L13.6682 5.24529C14.4062 4.50723 15.5976 4.50723 16.3356 5.24529L24.247 13.1567C24.7521 13.6617 24.9074 14.361 24.7261 14.9955Z" fill="#232323"></path><path opacity="0.25" d="M24.247 16.8471L16.3356 24.7585C15.5975 25.4966 14.4062 25.4966 13.6682 24.7585L5.75674 16.8471C5.25174 16.3421 5.09636 15.6299 5.27766 14.9955C5.35534 15.2932 5.52368 15.5781 5.75674 15.8242L13.6682 23.7356C14.4062 24.4737 15.5975 24.4737 16.3356 23.7356L24.247 15.8242C24.4801 15.5781 24.6484 15.2932 24.7261 14.9955C24.9074 15.6299 24.7521 16.3421 24.247 16.8471Z" fill="white"></path><path opacity="0.25" d="M28.9587 14.4017L17.2382 26.1221C16.0032 27.3571 14.0009 27.3571 12.7659 26.1221L1.04541 14.4017C0.973572 14.3299 0.920306 14.2475 0.856766 14.1708C0.595728 15.6465 1.0285 17.2211 2.16851 18.3612L11.6428 27.8354C13.498 29.6907 16.5061 29.6907 18.3613 27.8354L27.8356 18.3612C28.9756 17.2212 29.4084 15.6465 29.1473 14.1708C29.0838 14.2475 29.0305 14.3299 28.9587 14.4017Z" fill="#232323"></path><path opacity="0.25" d="M1.04541 15.4523L12.7659 3.73195C14.0009 2.49694 16.0032 2.49694 17.2382 3.73195L28.9587 15.4523C29.0305 15.5242 29.0838 15.6065 29.1473 15.6833C29.4084 14.2076 28.9756 12.6329 27.8356 11.4929L18.3613 2.01864C16.5061 0.163402 13.498 0.163402 11.6428 2.01864L2.16851 11.4929C1.0285 12.6329 0.595728 14.2076 0.856766 15.6833C0.920306 15.6065 0.973573 15.5242 1.04541 15.4523Z" fill="white"></path><path d="M15.0019 30C13.5857 30 12.1707 29.4626 11.0934 28.384L1.61918 18.9104C0.574711 17.866 0 16.4776 0 15.0019C0 13.525 0.575342 12.1372 1.61918 11.0934L11.0934 1.61918C12.1372 0.575342 13.525 0 15.0019 0C16.4776 0 17.866 0.574711 18.9104 1.61918L28.384 11.0934C30.5387 13.2481 30.5387 16.7545 28.3852 18.9104C28.3852 18.9104 28.3852 18.9104 28.384 18.9104L18.9104 28.384C17.8331 29.4613 16.4169 30 15.0019 30ZM15.0019 1.55406C13.9404 1.55406 12.9427 1.96691 12.1922 2.71802L2.71802 12.1922C1.96691 12.9427 1.55406 13.9404 1.55406 15.0019C1.55406 16.0628 1.96755 17.0618 2.71802 17.8129L12.1922 27.2864C13.7412 28.8341 16.2626 28.8354 17.8129 27.2851L27.2864 17.8129H27.2851C28.8341 16.2626 28.8354 13.7412 27.2864 12.1922L17.8129 2.71802C17.0617 1.96754 16.0628 1.55406 15.0019 1.55406ZM27.8352 18.3616H27.8478H27.8352Z" fill="#232323"></path></g><defs><clipPath id="clip0_496_322880"><rect width="30" height="30" fill="white"></rect></clipPath></defs></svg></div></div><div class="sc-feJyhm eKljdz"><div font-size="11.5px" class="sc-kafWEX bmHgPA"><span class="sc-cIShpX gnQsJj">5</span><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_496_322880)"><path d="M27.5283 18.6682L18.6682 27.5283C16.6434 29.5532 13.3604 29.5532 11.3355 27.5283L2.47546 18.6682C0.450585 16.6434 0.450585 13.3604 2.47546 11.3355L11.3355 2.47546C13.3604 0.450585 16.6434 0.450585 18.6682 2.47546L27.5283 11.3355C29.5532 13.3604 29.5532 16.6434 27.5283 18.6682Z" fill="#c019cf"></path><path opacity="0.25" d="M24.7261 14.9955C24.6484 14.6976 24.4801 14.4128 24.247 14.1667L16.3356 6.26826C15.5976 5.51724 14.4062 5.51724 13.6682 6.26826L5.75674 14.1667C5.52368 14.4128 5.35535 14.6976 5.27766 14.9955C5.09636 14.361 5.25174 13.6617 5.75674 13.1567L13.6682 5.24529C14.4062 4.50723 15.5976 4.50723 16.3356 5.24529L24.247 13.1567C24.7521 13.6617 24.9074 14.361 24.7261 14.9955Z" fill="#232323"></path><path opacity="0.25" d="M24.247 16.8471L16.3356 24.7585C15.5975 25.4966 14.4062 25.4966 13.6682 24.7585L5.75674 16.8471C5.25174 16.3421 5.09636 15.6299 5.27766 14.9955C5.35534 15.2932 5.52368 15.5781 5.75674 15.8242L13.6682 23.7356C14.4062 24.4737 15.5975 24.4737 16.3356 23.7356L24.247 15.8242C24.4801 15.5781 24.6484 15.2932 24.7261 14.9955C24.9074 15.6299 24.7521 16.3421 24.247 16.8471Z" fill="white"></path><path opacity="0.25" d="M28.9587 14.4017L17.2382 26.1221C16.0032 27.3571 14.0009 27.3571 12.7659 26.1221L1.04541 14.4017C0.973572 14.3299 0.920306 14.2475 0.856766 14.1708C0.595728 15.6465 1.0285 17.2211 2.16851 18.3612L11.6428 27.8354C13.498 29.6907 16.5061 29.6907 18.3613 27.8354L27.8356 18.3612C28.9756 17.2212 29.4084 15.6465 29.1473 14.1708C29.0838 14.2475 29.0305 14.3299 28.9587 14.4017Z" fill="#232323"></path><path opacity="0.25" d="M1.04541 15.4523L12.7659 3.73195C14.0009 2.49694 16.0032 2.49694 17.2382 3.73195L28.9587 15.4523C29.0305 15.5242 29.0838 15.6065 29.1473 15.6833C29.4084 14.2076 28.9756 12.6329 27.8356 11.4929L18.3613 2.01864C16.5061 0.163402 13.498 0.163402 11.6428 2.01864L2.16851 11.4929C1.0285 12.6329 0.595728 14.2076 0.856766 15.6833C0.920306 15.6065 0.973573 15.5242 1.04541 15.4523Z" fill="white"></path><path d="M15.0019 30C13.5857 30 12.1707 29.4626 11.0934 28.384L1.61918 18.9104C0.574711 17.866 0 16.4776 0 15.0019C0 13.525 0.575342 12.1372 1.61918 11.0934L11.0934 1.61918C12.1372 0.575342 13.525 0 15.0019 0C16.4776 0 17.866 0.574711 18.9104 1.61918L28.384 11.0934C30.5387 13.2481 30.5387 16.7545 28.3852 18.9104C28.3852 18.9104 28.3852 18.9104 28.384 18.9104L18.9104 28.384C17.8331 29.4613 16.4169 30 15.0019 30ZM15.0019 1.55406C13.9404 1.55406 12.9427 1.96691 12.1922 2.71802L2.71802 12.1922C1.96691 12.9427 1.55406 13.9404 1.55406 15.0019C1.55406 16.0628 1.96755 17.0618 2.71802 17.8129L12.1922 27.2864C13.7412 28.8341 16.2626 28.8354 17.8129 27.2851L27.2864 17.8129H27.2851C28.8341 16.2626 28.8354 13.7412 27.2864 12.1922L17.8129 2.71802C17.0617 1.96754 16.0628 1.55406 15.0019 1.55406ZM27.8352 18.3616H27.8478H27.8352Z" fill="#232323"></path></g><defs><clipPath id="clip0_496_322880"><rect width="30" height="30" fill="white"></rect></clipPath></defs></svg>
                                        </div>
                                    </div>
{{--                                    <img class="grouped-collection position-right-bottom badge-icon" src="https://play.upland.me/static/media/Director.ba2e7407c8a9b7de5a2ab4174ad7a6f5.svg" alt="Director icon" style="margin-left: -25px;">--}}
                                </div>
                            </div>
{{--                            <div class="sc-cFlXAS jljLNV">--}}
{{--                                <div class="border-bottom username">forevertryin</div>--}}
{{--                                <div class="status">--}}
{{--                                    <span class="status-text">Director</span>--}}
{{--                                    <svg class="union-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M2 2.50652C2 1.67449 2.70124 1 3.56627 1H20.4337C21.2988 1 22 1.67449 22 2.50652C22 3.33855 21.2988 4.01304 20.4337 4.01304H3.56626C2.70124 4.01304 2 3.33855 2 2.50652ZM2 21.4935C2 20.6615 2.70124 19.987 3.56627 19.987H20.4337C21.2988 19.987 22 20.6615 22 21.4935C22 22.3255 21.2988 23 20.4337 23H3.56626C2.70124 23 2 22.3255 2 21.4935ZM6.17671 5.01739C5.02334 5.01739 4.08835 5.91672 4.08835 7.02609V16.9739C4.08835 18.0833 5.02334 18.9826 6.17671 18.9826H17.8233C18.9767 18.9826 19.9116 18.0833 19.9116 16.9739V7.02609C19.9116 5.91672 18.9767 5.01739 17.8233 5.01739H6.17671Z" fill="#232323"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M12.1418 14.5761C12.0532 14.5286 11.9468 14.5286 11.8582 14.5761L9.73634 15.7142C9.51775 15.8315 9.25939 15.6479 9.29823 15.4029L9.69469 12.902C9.70929 12.8098 9.68021 12.7161 9.61601 12.6485L7.89254 10.8323C7.72628 10.6571 7.82469 10.3672 8.06326 10.3295L10.4307 9.95477C10.5278 9.9394 10.6112 9.87741 10.6539 9.78886L11.7298 7.55977C11.839 7.33364 12.161 7.33364 12.2702 7.55977L13.3461 9.78886C13.3888 9.87741 13.4722 9.9394 13.5693 9.95477L15.9367 10.3295C16.1753 10.3672 16.2737 10.6571 16.1075 10.8323L14.384 12.6485C14.3198 12.7161 14.2907 12.8098 14.3053 12.902L14.7018 15.4029C14.7406 15.6479 14.4823 15.8315 14.2637 15.7142L12.1418 14.5761Z" fill="white"></path></svg>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                    <div class="sc-jhaWeW kvCPjb">
                        <div role="button" class="sc-bSbAYC jaTsI">Price Per Share - $1500</div>
                    </div>
                </div>
                <div class="sc-cMljjf kRORPR">Meta Para Verse</div>
                <div class="sc-jWxkHr cWsPYI">
                    <div class="sc-daURTG dYtXpm home-address">
                        <div class="image-wrapper">
                            <div class="sc-epnACN hfUoNm">
                                <img alt="" src="{{asset('points/shopping-mall.png')}}" width="58" class="sc-hXRMBi eRaMsh">
                            </div>
                        </div>
                        <div class="text-wrapper">
                            <a class="link" href="/?prop_id=81480817404449">Shopping Mall</a>
                            <div class="sub-title">Total Shares: 10000</div>
                            <div class="additional-info">Per Share Price: $1500</div>
                            <div class="additional-info">APY: 72%</div>
                        </div>
                    </div>
                </div>
                <div color="#05DD66" class="sc-hkbPbT hNZHwU" style="cursor: pointer">
                    <h3 class="title">Buy Now</h3>
{{--                    <div class="sc-jRhVzh ccHTsV">--}}
{{--                        <div class="networth-value">--}}
{{--                            <span>5,375,409</span>--}}
{{--                            <p>Total UPX, property &amp; visitor earnings</p>--}}
{{--                        </div>--}}
{{--                        <div class="info-table-bottom">--}}
{{--                            <div class="column properties">--}}
{{--                                <div class="value">247</div>--}}
{{--                                <div class="label">properties</div>--}}
{{--                            </div>--}}
{{--                            <div class="column collections">--}}
{{--                                <div class="value">24</div>--}}
{{--                                <div class="label">collections</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
{{--                <div class="sc-cMljjf kRORPR">Badges (0)</div>--}}
{{--                <div class="sc-iHhHRJ koTcyO">No Badges available.</div>--}}
{{--                <div class="sc-cMljjf kRORPR">collections (3/3)</div>--}}
{{--                <ul class="sc-bYnzgO fbxvdz">--}}
{{--                    <li class="sc-hvvHee eTQSSf">--}}
{{--                        <div class="collection-thumbnail-wrapper">--}}
{{--                            <img src="https://static.upland.me/collections-assets/city_pro-21-banner.png" class="sc-cPuPxo cCUqhO collection-thumbnail" alt="explorer">--}}
{{--                        </div>--}}
{{--                        <div class="title">City Pro</div>--}}
{{--                    </li>--}}
{{--                    <li class="sc-hvvHee eTQSSf">--}}
{{--                        <div class="collection-thumbnail-wrapper">--}}
{{--                            <img src="https://static.upland.me/collections-assets/city_pro-21-banner.png" class="sc-cPuPxo cCUqhO collection-thumbnail" alt="explorer">--}}
{{--                        </div>--}}
{{--                        <div class="title">City Pro</div>--}}
{{--                    </li>--}}
{{--                    <li class="sc-hvvHee eTQSSf">--}}
{{--                        <div class="collection-thumbnail-wrapper">--}}
{{--                            <img src="https://static.upland.me/collections-assets/city_pro-21-banner.png" class="sc-cPuPxo cCUqhO collection-thumbnail" alt="explorer">--}}
{{--                        </div>--}}
{{--                        <div class="title">City Pro</div>--}}
{{--                    </li>--}}
{{--                </ul>--}}
            </div>
            <div class="sc-htoDjs jiZzHA">
                <div class="sc-dnqmqq cWFpaR"></div>
                <div class="sc-gzVnrw cLEaIl">
                    <div size="44" class="sc-kAzzGY EXdNv">
                        <button type="button" aria-label="default" class="sc-cSHVUG iBeJVD" data-bs-dismiss="modal" aria-label="Close">
                            <svg width="18px" height="18px" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M1.4144 1.58584C2.19545 0.804796 3.46178 0.804796 4.24283 1.58584L18.6734 16.0164C19.4544 16.7975 19.4544 18.0638 18.6734 18.8448C17.8923 19.6259 16.626 19.6259 15.845 18.8448L1.4144 4.41427C0.633351 3.63322 0.633351 2.36689 1.4144 1.58584Z" fill="#232323"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M1.5856 18.8449C0.804552 18.0638 0.804552 16.7975 1.5856 16.0165L16.0162 1.58588C16.7972 0.804832 18.0635 0.804832 18.8446 1.58588C19.6256 2.36693 19.6256 3.63326 18.8446 4.41431L4.41403 18.8449C3.63298 19.6259 2.36665 19.6259 1.5856 18.8449Z" fill="#232323"></path></svg>
                        </button>
                    </div>
                </div>
{{--                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
{{--                <button type="button" class="btn btn-primary">Understood</button>--}}
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script>
    // TO MAKE THE MAP APPEAR YOU MUST
    // ADD YOUR ACCESS TOKEN FROM
    // https://account.mapbox.com
    mapboxgl.accessToken = 'pk.eyJ1IjoidHNha2liMzYwIiwiYSI6ImNsZWllOHlxYzAwa2w0M2xudDY3dmZob3IifQ.7SwByFMw6C4JxxTpdeLVQQ';
    const map = new mapboxgl.Map({
        container: 'map', // container ID
        // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
        style: 'mapbox://styles/tsakib360/cleierec7003g01s0zw6w0wp1', // style URL
        center: [{{$longitude}}, {{$latitude}}], // starting position [lng, lat]
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
        el.setAttribute('onclick', 'displayModal()')

        // make a marker for each feature and add to the map
        new mapboxgl.Marker(el).setLngLat(feature.geometry.coordinates)
            // .setPopup(
            //     new mapboxgl.Popup({ offset: 25 }) // add popups
            //         .setHTML(
            //             `
            //             <div class="row">
            //                 <div class="col-md-4">
            //                     <div class="sc-product-item style-5">
            //                         <div class="product-img">
            //                             <img src="https://famous-souffle-7b597e.netlify.app/images/all-img/v3/card2.jpg" alt="Image">
            //                         </div>
            //                         <div class="fugu--card-data">
            //                                 <h3>Shopping Mall</h3>
            //                                 <p>Total Shares : 10000</p>
            //                                 <p>APY : 72%</p>
            //                                 <div class="fugu--card-footer">
            //                                     <div class="fugu--card-footer-data">
            //                                         <span>Share Price:</span>
            //                                         <h4>$1500 USDT</h4>
            //                                 </div>
            //                                 <a class="fugu--btn btn-sm bg-white text-white" href="/" style="background: linear-gradient(225deg,#0080ff,#7d41ea 46.35%,#ff00d4);">Buy Share</a>
            //                             </div>
            //                         </div>
            //                     </div>
            //                 </div>
            //
            //                 <div class="col-md-4">
            //                     <div class="sc-product-item style-5">
            //                         <div class="product-img">
            //                             <img src="https://famous-souffle-7b597e.netlify.app/images/all-img/v3/card2.jpg" alt="Image">
            //                         </div>
            //                         <div class="fugu--card-data">
            //                                 <h3>Shopping Mall</h3>
            //                                 <p>Total Shares : 10000</p>
            //                                 <p>APY : 72%</p>
            //                                 <div class="fugu--card-footer">
            //                                     <div class="fugu--card-footer-data">
            //                                         <span>Share Price:</span>
            //                                         <h4>$1500 USDT</h4>
            //                                 </div>
            //                                 <a class="fugu--btn btn-sm bg-white text-white" href="/" style="background: linear-gradient(225deg,#0080ff,#7d41ea 46.35%,#ff00d4);">Buy Share</a>
            //                             </div>
            //                         </div>
            //                     </div>
            //                 </div>
            //
            //                 <div class="col-md-4">
            //                     <div class="sc-product-item style-5">
            //                         <div class="product-img">
            //                             <img src="https://famous-souffle-7b597e.netlify.app/images/all-img/v3/card2.jpg" alt="Image">
            //                         </div>
            //                         <div class="fugu--card-data">
            //                                 <h3>Shopping Mall</h3>
            //                                 <p>Total Shares : 10000</p>
            //                                 <p>APY : 72%</p>
            //                                 <div class="fugu--card-footer">
            //                                     <div class="fugu--card-footer-data">
            //                                         <span>Share Price:</span>
            //                                         <h4>$1500 USDT</h4>
            //                                 </div>
            //                                 <a class="fugu--btn btn-sm bg-white text-white" href="/" style="background: linear-gradient(225deg,#0080ff,#7d41ea 46.35%,#ff00d4);">Buy Share</a>
            //                             </div>
            //                         </div>
            //                     </div>
            //                 </div>
            //
            //             </div>
            //             `
            //         )
            // )
            .addTo(map);
    }

    function displayModal() {
        console.log('hh');
        // document.getElementById("staticBackdrop").style.display = "block";
        var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
        myModal.show()
    }

</script>

</body>
</html>
