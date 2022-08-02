@extends('layouts.app')

@section('content')
    <div class="row row-deck row-cards">
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">Sales</div>
                        <div class="ms-auto lh-1">
                            <div class="dropdown">
                                <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item active" href="#">Last 7 days</a>
                                    <a class="dropdown-item" href="#">Last 30 days</a>
                                    <a class="dropdown-item" href="#">Last 3 months</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h1 mb-3">75%</div>
                    <div class="d-flex mb-2">
                        <div>Conversion rate</div>
                        <div class="ms-auto">
                            <span class="text-green d-inline-flex align-items-center lh-1">
                                7%
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="3 17 9 11 13 15 21 7"></polyline>
                                    <polyline points="14 7 21 7 21 14"></polyline>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-blue" style="width: 75%" role="progressbar"
                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                            aria-label="75% Complete">
                            <span class="visually-hidden">75% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">Revenue</div>
                        <div class="ms-auto lh-1">
                            <div class="dropdown">
                                <a class="dropdown-toggle text-muted" href="#"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last
                                    7 days</a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item active" href="#">Last 7 days</a>
                                    <a class="dropdown-item" href="#">Last 30 days</a>
                                    <a class="dropdown-item" href="#">Last 3 months</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-baseline">
                        <div class="h1 mb-0 me-2">$4,300</div>
                        <div class="me-auto">
                            <span class="text-green d-inline-flex align-items-center lh-1">
                                8%
                                <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="3 17 9 11 13 15 21 7"></polyline>
                                    <polyline points="14 7 21 7 21 14"></polyline>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
                <div id="chart-revenue-bg" class="chart-sm" style="min-height: 40px;">
                    <div id="apexchartsf76d1b66"
                        class="apexcharts-canvas apexchartsf76d1b66 apexcharts-theme-light"
                        style="width: 260px; height: 40px;"><svg id="SvgjsSvg5279" width="260"
                            height="40" xmlns="http://www.w3.org/2000/svg" version="1.1"
                            xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                            class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                            style="background: transparent;">
                            <g id="SvgjsG5281" class="apexcharts-inner apexcharts-graphical"
                                transform="translate(0, 0)">
                                <defs id="SvgjsDefs5280">
                                    <clipPath id="gridRectMaskf76d1b66">
                                        <rect id="SvgjsRect5317" width="266" height="42"
                                            x="-3" y="-1" rx="0" ry="0"
                                            opacity="1" stroke-width="0" stroke="none"
                                            stroke-dasharray="0" fill="#fff"></rect>
                                    </clipPath>
                                    <clipPath id="forecastMaskf76d1b66"></clipPath>
                                    <clipPath id="nonForecastMaskf76d1b66"></clipPath>
                                    <clipPath id="gridRectMarkerMaskf76d1b66">
                                        <rect id="SvgjsRect5318" width="264" height="44"
                                            x="-2" y="-2" rx="0" ry="0"
                                            opacity="1" stroke-width="0" stroke="none"
                                            stroke-dasharray="0" fill="#fff"></rect>
                                    </clipPath>
                                </defs>
                                <line id="SvgjsLine5286" x1="0" y1="0" x2="0"
                                    y2="40" stroke="#b6b6b6" stroke-dasharray="3"
                                    stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0"
                                    y="0" width="1" height="40" fill="#b1b9c4"
                                    filter="none" fill-opacity="0.9" stroke-width="1"></line>
                                <g id="SvgjsG5325" class="apexcharts-xaxis" transform="translate(0, 0)">
                                    <g id="SvgjsG5326" class="apexcharts-xaxis-texts-g"
                                        transform="translate(0, -4)"></g>
                                </g>
                                <g id="SvgjsG5334" class="apexcharts-grid">
                                    <g id="SvgjsG5335" class="apexcharts-gridlines-horizontal"
                                        style="display: none;">
                                        <line id="SvgjsLine5337" x1="0" y1="0"
                                            x2="260" y2="0" stroke="#e0e0e0"
                                            stroke-dasharray="4" stroke-linecap="butt"
                                            class="apexcharts-gridline"></line>
                                        <line id="SvgjsLine5338" x1="0" y1="8"
                                            x2="260" y2="8" stroke="#e0e0e0"
                                            stroke-dasharray="4" stroke-linecap="butt"
                                            class="apexcharts-gridline"></line>
                                        <line id="SvgjsLine5339" x1="0" y1="16"
                                            x2="260" y2="16" stroke="#e0e0e0"
                                            stroke-dasharray="4" stroke-linecap="butt"
                                            class="apexcharts-gridline"></line>
                                        <line id="SvgjsLine5340" x1="0" y1="24"
                                            x2="260" y2="24" stroke="#e0e0e0"
                                            stroke-dasharray="4" stroke-linecap="butt"
                                            class="apexcharts-gridline"></line>
                                        <line id="SvgjsLine5341" x1="0" y1="32"
                                            x2="260" y2="32" stroke="#e0e0e0"
                                            stroke-dasharray="4" stroke-linecap="butt"
                                            class="apexcharts-gridline"></line>
                                        <line id="SvgjsLine5342" x1="0" y1="40"
                                            x2="260" y2="40" stroke="#e0e0e0"
                                            stroke-dasharray="4" stroke-linecap="butt"
                                            class="apexcharts-gridline"></line>
                                    </g>
                                    <g id="SvgjsG5336" class="apexcharts-gridlines-vertical"
                                        style="display: none;"></g>
                                    <line id="SvgjsLine5344" x1="0" y1="40" x2="260"
                                        y2="40" stroke="transparent" stroke-dasharray="0"
                                        stroke-linecap="butt"></line>
                                    <line id="SvgjsLine5343" x1="0" y1="1" x2="0"
                                        y2="40" stroke="transparent" stroke-dasharray="0"
                                        stroke-linecap="butt"></line>
                                </g>
                                <g id="SvgjsG5319" class="apexcharts-area-series apexcharts-plot-series">
                                    <g id="SvgjsG5320" class="apexcharts-series" seriesName="Profits"
                                        data:longestSeries="true" rel="1" data:realIndex="0">
                                        <path id="SvgjsPath5323"
                                            d="M 0 40L 0 25.2C 3.137931034482759 25.2 5.8275862068965525 26 8.965517241379311 26C 12.103448275862071 26 14.793103448275865 22.4 17.931034482758623 22.4C 21.06896551724138 22.4 23.758620689655174 28.8 26.896551724137932 28.8C 30.03448275862069 28.8 32.724137931034484 25.6 35.862068965517246 25.6C 39 25.6 41.689655172413794 30.4 44.827586206896555 30.4C 47.96551724137932 30.4 50.65517241379311 14 53.793103448275865 14C 56.931034482758626 14 59.62068965517242 27.6 62.75862068965518 27.6C 65.89655172413794 27.6 68.58620689655173 25.2 71.72413793103449 25.2C 74.86206896551725 25.2 77.55172413793103 24.4 80.6896551724138 24.4C 83.82758620689656 24.4 86.51724137931035 15.2 89.65517241379311 15.2C 92.79310344827587 15.2 95.48275862068967 19.6 98.62068965517243 19.6C 101.75862068965519 19.6 104.44827586206897 26 107.58620689655173 26C 110.72413793103449 26 113.41379310344828 23.6 116.55172413793105 23.6C 119.68965517241381 23.6 122.3793103448276 26 125.51724137931036 26C 128.6551724137931 26 131.34482758620692 29.2 134.48275862068968 29.2C 137.62068965517244 29.2 140.31034482758622 2.799999999999997 143.44827586206898 2.799999999999997C 146.58620689655174 2.799999999999997 149.27586206896552 18.8 152.41379310344828 18.8C 155.55172413793105 18.8 158.24137931034483 15.600000000000001 161.3793103448276 15.600000000000001C 164.51724137931035 15.600000000000001 167.20689655172416 29.2 170.34482758620692 29.2C 173.48275862068968 29.2 176.17241379310346 18.4 179.31034482758622 18.4C 182.44827586206898 18.4 185.13793103448276 22.8 188.27586206896552 22.8C 191.41379310344828 22.8 194.1034482758621 32.4 197.24137931034485 32.4C 200.37931034482762 32.4 203.0689655172414 21.6 206.20689655172416 21.6C 209.34482758620692 21.6 212.0344827586207 24.4 215.17241379310346 24.4C 218.31034482758622 24.4 221.00000000000003 15.2 224.1379310344828 15.2C 227.27586206896555 15.2 229.96551724137933 19.6 233.1034482758621 19.6C 236.24137931034485 19.6 238.93103448275863 26 242.0689655172414 26C 245.20689655172416 26 247.89655172413796 23.6 251.03448275862073 23.6C 254.17241379310346 23.6 256.86206896551727 13.2 260 13.2C 260 13.2 260 13.2 260 40M 260 13.2z"
                                            fill="rgba(32,107,196,0.16)" fill-opacity="1" stroke-opacity="1"
                                            stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                            class="apexcharts-area" index="0"
                                            clip-path="url(#gridRectMaskf76d1b66)"
                                            pathTo="M 0 40L 0 25.2C 3.137931034482759 25.2 5.8275862068965525 26 8.965517241379311 26C 12.103448275862071 26 14.793103448275865 22.4 17.931034482758623 22.4C 21.06896551724138 22.4 23.758620689655174 28.8 26.896551724137932 28.8C 30.03448275862069 28.8 32.724137931034484 25.6 35.862068965517246 25.6C 39 25.6 41.689655172413794 30.4 44.827586206896555 30.4C 47.96551724137932 30.4 50.65517241379311 14 53.793103448275865 14C 56.931034482758626 14 59.62068965517242 27.6 62.75862068965518 27.6C 65.89655172413794 27.6 68.58620689655173 25.2 71.72413793103449 25.2C 74.86206896551725 25.2 77.55172413793103 24.4 80.6896551724138 24.4C 83.82758620689656 24.4 86.51724137931035 15.2 89.65517241379311 15.2C 92.79310344827587 15.2 95.48275862068967 19.6 98.62068965517243 19.6C 101.75862068965519 19.6 104.44827586206897 26 107.58620689655173 26C 110.72413793103449 26 113.41379310344828 23.6 116.55172413793105 23.6C 119.68965517241381 23.6 122.3793103448276 26 125.51724137931036 26C 128.6551724137931 26 131.34482758620692 29.2 134.48275862068968 29.2C 137.62068965517244 29.2 140.31034482758622 2.799999999999997 143.44827586206898 2.799999999999997C 146.58620689655174 2.799999999999997 149.27586206896552 18.8 152.41379310344828 18.8C 155.55172413793105 18.8 158.24137931034483 15.600000000000001 161.3793103448276 15.600000000000001C 164.51724137931035 15.600000000000001 167.20689655172416 29.2 170.34482758620692 29.2C 173.48275862068968 29.2 176.17241379310346 18.4 179.31034482758622 18.4C 182.44827586206898 18.4 185.13793103448276 22.8 188.27586206896552 22.8C 191.41379310344828 22.8 194.1034482758621 32.4 197.24137931034485 32.4C 200.37931034482762 32.4 203.0689655172414 21.6 206.20689655172416 21.6C 209.34482758620692 21.6 212.0344827586207 24.4 215.17241379310346 24.4C 218.31034482758622 24.4 221.00000000000003 15.2 224.1379310344828 15.2C 227.27586206896555 15.2 229.96551724137933 19.6 233.1034482758621 19.6C 236.24137931034485 19.6 238.93103448275863 26 242.0689655172414 26C 245.20689655172416 26 247.89655172413796 23.6 251.03448275862073 23.6C 254.17241379310346 23.6 256.86206896551727 13.2 260 13.2C 260 13.2 260 13.2 260 40M 260 13.2z"
                                            pathFrom="M -1 40L -1 40L 8.965517241379311 40L 17.931034482758623 40L 26.896551724137932 40L 35.862068965517246 40L 44.827586206896555 40L 53.793103448275865 40L 62.75862068965518 40L 71.72413793103449 40L 80.6896551724138 40L 89.65517241379311 40L 98.62068965517243 40L 107.58620689655173 40L 116.55172413793105 40L 125.51724137931036 40L 134.48275862068968 40L 143.44827586206898 40L 152.41379310344828 40L 161.3793103448276 40L 170.34482758620692 40L 179.31034482758622 40L 188.27586206896552 40L 197.24137931034485 40L 206.20689655172416 40L 215.17241379310346 40L 224.1379310344828 40L 233.1034482758621 40L 242.0689655172414 40L 251.03448275862073 40L 260 40">
                                        </path>
                                        <path id="SvgjsPath5324"
                                            d="M 0 25.2C 3.137931034482759 25.2 5.8275862068965525 26 8.965517241379311 26C 12.103448275862071 26 14.793103448275865 22.4 17.931034482758623 22.4C 21.06896551724138 22.4 23.758620689655174 28.8 26.896551724137932 28.8C 30.03448275862069 28.8 32.724137931034484 25.6 35.862068965517246 25.6C 39 25.6 41.689655172413794 30.4 44.827586206896555 30.4C 47.96551724137932 30.4 50.65517241379311 14 53.793103448275865 14C 56.931034482758626 14 59.62068965517242 27.6 62.75862068965518 27.6C 65.89655172413794 27.6 68.58620689655173 25.2 71.72413793103449 25.2C 74.86206896551725 25.2 77.55172413793103 24.4 80.6896551724138 24.4C 83.82758620689656 24.4 86.51724137931035 15.2 89.65517241379311 15.2C 92.79310344827587 15.2 95.48275862068967 19.6 98.62068965517243 19.6C 101.75862068965519 19.6 104.44827586206897 26 107.58620689655173 26C 110.72413793103449 26 113.41379310344828 23.6 116.55172413793105 23.6C 119.68965517241381 23.6 122.3793103448276 26 125.51724137931036 26C 128.6551724137931 26 131.34482758620692 29.2 134.48275862068968 29.2C 137.62068965517244 29.2 140.31034482758622 2.799999999999997 143.44827586206898 2.799999999999997C 146.58620689655174 2.799999999999997 149.27586206896552 18.8 152.41379310344828 18.8C 155.55172413793105 18.8 158.24137931034483 15.600000000000001 161.3793103448276 15.600000000000001C 164.51724137931035 15.600000000000001 167.20689655172416 29.2 170.34482758620692 29.2C 173.48275862068968 29.2 176.17241379310346 18.4 179.31034482758622 18.4C 182.44827586206898 18.4 185.13793103448276 22.8 188.27586206896552 22.8C 191.41379310344828 22.8 194.1034482758621 32.4 197.24137931034485 32.4C 200.37931034482762 32.4 203.0689655172414 21.6 206.20689655172416 21.6C 209.34482758620692 21.6 212.0344827586207 24.4 215.17241379310346 24.4C 218.31034482758622 24.4 221.00000000000003 15.2 224.1379310344828 15.2C 227.27586206896555 15.2 229.96551724137933 19.6 233.1034482758621 19.6C 236.24137931034485 19.6 238.93103448275863 26 242.0689655172414 26C 245.20689655172416 26 247.89655172413796 23.6 251.03448275862073 23.6C 254.17241379310346 23.6 256.86206896551727 13.2 260 13.2"
                                            fill="none" fill-opacity="1" stroke="#206bc4"
                                            stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                            stroke-dasharray="0" class="apexcharts-area" index="0"
                                            clip-path="url(#gridRectMaskf76d1b66)"
                                            pathTo="M 0 25.2C 3.137931034482759 25.2 5.8275862068965525 26 8.965517241379311 26C 12.103448275862071 26 14.793103448275865 22.4 17.931034482758623 22.4C 21.06896551724138 22.4 23.758620689655174 28.8 26.896551724137932 28.8C 30.03448275862069 28.8 32.724137931034484 25.6 35.862068965517246 25.6C 39 25.6 41.689655172413794 30.4 44.827586206896555 30.4C 47.96551724137932 30.4 50.65517241379311 14 53.793103448275865 14C 56.931034482758626 14 59.62068965517242 27.6 62.75862068965518 27.6C 65.89655172413794 27.6 68.58620689655173 25.2 71.72413793103449 25.2C 74.86206896551725 25.2 77.55172413793103 24.4 80.6896551724138 24.4C 83.82758620689656 24.4 86.51724137931035 15.2 89.65517241379311 15.2C 92.79310344827587 15.2 95.48275862068967 19.6 98.62068965517243 19.6C 101.75862068965519 19.6 104.44827586206897 26 107.58620689655173 26C 110.72413793103449 26 113.41379310344828 23.6 116.55172413793105 23.6C 119.68965517241381 23.6 122.3793103448276 26 125.51724137931036 26C 128.6551724137931 26 131.34482758620692 29.2 134.48275862068968 29.2C 137.62068965517244 29.2 140.31034482758622 2.799999999999997 143.44827586206898 2.799999999999997C 146.58620689655174 2.799999999999997 149.27586206896552 18.8 152.41379310344828 18.8C 155.55172413793105 18.8 158.24137931034483 15.600000000000001 161.3793103448276 15.600000000000001C 164.51724137931035 15.600000000000001 167.20689655172416 29.2 170.34482758620692 29.2C 173.48275862068968 29.2 176.17241379310346 18.4 179.31034482758622 18.4C 182.44827586206898 18.4 185.13793103448276 22.8 188.27586206896552 22.8C 191.41379310344828 22.8 194.1034482758621 32.4 197.24137931034485 32.4C 200.37931034482762 32.4 203.0689655172414 21.6 206.20689655172416 21.6C 209.34482758620692 21.6 212.0344827586207 24.4 215.17241379310346 24.4C 218.31034482758622 24.4 221.00000000000003 15.2 224.1379310344828 15.2C 227.27586206896555 15.2 229.96551724137933 19.6 233.1034482758621 19.6C 236.24137931034485 19.6 238.93103448275863 26 242.0689655172414 26C 245.20689655172416 26 247.89655172413796 23.6 251.03448275862073 23.6C 254.17241379310346 23.6 256.86206896551727 13.2 260 13.2"
                                            pathFrom="M -1 40L -1 40L 8.965517241379311 40L 17.931034482758623 40L 26.896551724137932 40L 35.862068965517246 40L 44.827586206896555 40L 53.793103448275865 40L 62.75862068965518 40L 71.72413793103449 40L 80.6896551724138 40L 89.65517241379311 40L 98.62068965517243 40L 107.58620689655173 40L 116.55172413793105 40L 125.51724137931036 40L 134.48275862068968 40L 143.44827586206898 40L 152.41379310344828 40L 161.3793103448276 40L 170.34482758620692 40L 179.31034482758622 40L 188.27586206896552 40L 197.24137931034485 40L 206.20689655172416 40L 215.17241379310346 40L 224.1379310344828 40L 233.1034482758621 40L 242.0689655172414 40L 251.03448275862073 40L 260 40">
                                        </path>
                                        <g id="SvgjsG5321" class="apexcharts-series-markers-wrap"
                                            data:realIndex="0">
                                            <g class="apexcharts-series-markers">
                                                <circle id="SvgjsCircle5350" r="0" cx="0"
                                                    cy="0"
                                                    class="apexcharts-marker w7jls06gq no-pointer-events"
                                                    stroke="#ffffff" fill="#206bc4" fill-opacity="1"
                                                    stroke-width="2" stroke-opacity="0.9"
                                                    default-marker-size="0"></circle>
                                            </g>
                                        </g>
                                    </g>
                                    <g id="SvgjsG5322" class="apexcharts-datalabels" data:realIndex="0"></g>
                                </g>
                                <line id="SvgjsLine5345" x1="0" y1="0" x2="260"
                                    y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                    stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                <line id="SvgjsLine5346" x1="0" y1="0" x2="260"
                                    y2="0" stroke-dasharray="0" stroke-width="0"
                                    stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                <g id="SvgjsG5347" class="apexcharts-yaxis-annotations"></g>
                                <g id="SvgjsG5348" class="apexcharts-xaxis-annotations"></g>
                                <g id="SvgjsG5349" class="apexcharts-point-annotations"></g>
                            </g>
                            <rect id="SvgjsRect5285" width="0" height="0" x="0"
                                y="0" rx="0" ry="0" opacity="1"
                                stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect>
                            <g id="SvgjsG5333" class="apexcharts-yaxis" rel="0"
                                transform="translate(-18, 0)"></g>
                            <g id="SvgjsG5282" class="apexcharts-annotations"></g>
                        </svg>
                        <div class="apexcharts-legend" style="max-height: 20px;"></div>
                        <div class="apexcharts-tooltip apexcharts-theme-light">
                            <div class="apexcharts-tooltip-title"
                                style="font-family: inherit; font-size: 12px;"></div>
                            <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                    class="apexcharts-tooltip-marker"
                                    style="background-color: rgb(32, 107, 196);"></span>
                                <div class="apexcharts-tooltip-text"
                                    style="font-family: inherit; font-size: 12px;">
                                    <div class="apexcharts-tooltip-y-group"><span
                                            class="apexcharts-tooltip-text-y-label"></span><span
                                            class="apexcharts-tooltip-text-y-value"></span></div>
                                    <div class="apexcharts-tooltip-goals-group"><span
                                            class="apexcharts-tooltip-text-goals-label"></span><span
                                            class="apexcharts-tooltip-text-goals-value"></span></div>
                                    <div class="apexcharts-tooltip-z-group"><span
                                            class="apexcharts-tooltip-text-z-label"></span><span
                                            class="apexcharts-tooltip-text-z-value"></span></div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                            <div class="apexcharts-yaxistooltip-text"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">New clients</div>
                        <div class="ms-auto lh-1">
                            <div class="dropdown">
                                <a class="dropdown-toggle text-muted" href="#"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last
                                    7 days</a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item active" href="#">Last 7 days</a>
                                    <a class="dropdown-item" href="#">Last 30 days</a>
                                    <a class="dropdown-item" href="#">Last 3 months</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-baseline">
                        <div class="h1 mb-3 me-2">6,782</div>
                        <div class="me-auto">
                            <span class="text-yellow d-inline-flex align-items-center lh-1">
                                0%
                                <!-- Download SVG icon from http://tabler-icons.io/i/minus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="5" y1="12" x2="19" y2="12">
                                    </line>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div id="chart-new-clients" class="chart-sm" style="min-height: 40px;">
                        <div id="apexchartscumoq99f"
                            class="apexcharts-canvas apexchartscumoq99f apexcharts-theme-light"
                            style="width: 220px; height: 40px;"><svg id="SvgjsSvg5353" width="220"
                                height="40" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                style="background: transparent;">
                                <g id="SvgjsG5355" class="apexcharts-inner apexcharts-graphical"
                                    transform="translate(0, 0)">
                                    <defs id="SvgjsDefs5354">
                                        <clipPath id="gridRectMaskcumoq99f">
                                            <rect id="SvgjsRect5391" width="226" height="42"
                                                x="-3" y="-1" rx="0" ry="0"
                                                opacity="1" stroke-width="0" stroke="none"
                                                stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="forecastMaskcumoq99f"></clipPath>
                                        <clipPath id="nonForecastMaskcumoq99f"></clipPath>
                                        <clipPath id="gridRectMarkerMaskcumoq99f">
                                            <rect id="SvgjsRect5392" width="224" height="44"
                                                x="-2" y="-2" rx="0" ry="0"
                                                opacity="1" stroke-width="0" stroke="none"
                                                stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                    </defs>
                                    <line id="SvgjsLine5360" x1="0" y1="0" x2="0"
                                        y2="40" stroke="#b6b6b6" stroke-dasharray="3"
                                        stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0"
                                        y="0" width="1" height="40" fill="#b1b9c4"
                                        filter="none" fill-opacity="0.9" stroke-width="1"></line>
                                    <g id="SvgjsG5402" class="apexcharts-xaxis" transform="translate(0, 0)">
                                        <g id="SvgjsG5403" class="apexcharts-xaxis-texts-g"
                                            transform="translate(0, -4)"></g>
                                    </g>
                                    <g id="SvgjsG5411" class="apexcharts-grid">
                                        <g id="SvgjsG5412" class="apexcharts-gridlines-horizontal"
                                            style="display: none;">
                                            <line id="SvgjsLine5414" x1="0" y1="0"
                                                x2="220" y2="0" stroke="#e0e0e0"
                                                stroke-dasharray="4" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine5415" x1="0" y1="8"
                                                x2="220" y2="8" stroke="#e0e0e0"
                                                stroke-dasharray="4" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine5416" x1="0" y1="16"
                                                x2="220" y2="16" stroke="#e0e0e0"
                                                stroke-dasharray="4" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine5417" x1="0" y1="24"
                                                x2="220" y2="24" stroke="#e0e0e0"
                                                stroke-dasharray="4" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine5418" x1="0" y1="32"
                                                x2="220" y2="32" stroke="#e0e0e0"
                                                stroke-dasharray="4" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine5419" x1="0" y1="40"
                                                x2="220" y2="40" stroke="#e0e0e0"
                                                stroke-dasharray="4" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                        </g>
                                        <g id="SvgjsG5413" class="apexcharts-gridlines-vertical"
                                            style="display: none;"></g>
                                        <line id="SvgjsLine5421" x1="0" y1="40"
                                            x2="220" y2="40" stroke="transparent"
                                            stroke-dasharray="0" stroke-linecap="butt"></line>
                                        <line id="SvgjsLine5420" x1="0" y1="1"
                                            x2="0" y2="40" stroke="transparent"
                                            stroke-dasharray="0" stroke-linecap="butt"></line>
                                    </g>
                                    <g id="SvgjsG5393" class="apexcharts-line-series apexcharts-plot-series">
                                        <g id="SvgjsG5394" class="apexcharts-series" seriesName="May"
                                            data:longestSeries="true" rel="1" data:realIndex="0">
                                            <path id="SvgjsPath5397"
                                                d="M 0 25.2C 2.6551724137931036 25.2 4.931034482758621 26 7.586206896551725 26C 10.24137931034483 26 12.517241379310347 22.4 15.17241379310345 22.4C 17.827586206896555 22.4 20.10344827586207 28.8 22.758620689655174 28.8C 25.413793103448278 28.8 27.689655172413797 25.6 30.3448275862069 25.6C 33.00000000000001 25.6 35.27586206896552 30.4 37.931034482758626 30.4C 40.58620689655173 30.4 42.862068965517246 14 45.51724137931035 14C 48.17241379310345 14 50.44827586206897 27.6 53.10344827586207 27.6C 55.758620689655174 27.6 58.0344827586207 25.2 60.6896551724138 25.2C 63.344827586206904 25.2 65.62068965517243 24.4 68.27586206896552 24.4C 70.93103448275863 24.4 73.20689655172414 15.2 75.86206896551725 15.2C 78.51724137931035 15.2 80.79310344827587 19.6 83.44827586206897 19.6C 86.10344827586208 19.6 88.37931034482759 26 91.0344827586207 26C 93.68965517241381 26 95.96551724137932 23.6 98.62068965517243 23.6C 101.27586206896552 23.6 103.55172413793105 26 106.20689655172414 26C 108.86206896551725 26 111.13793103448276 29.2 113.79310344827587 29.2C 116.44827586206898 29.2 118.72413793103449 2.799999999999997 121.3793103448276 2.799999999999997C 124.03448275862071 2.799999999999997 126.31034482758622 18.8 128.96551724137933 18.8C 131.62068965517244 18.8 133.89655172413794 15.600000000000001 136.55172413793105 15.600000000000001C 139.20689655172416 15.600000000000001 141.48275862068965 29.2 144.13793103448276 29.2C 146.79310344827587 29.2 149.0689655172414 18.4 151.7241379310345 18.4C 154.37931034482762 18.4 156.6551724137931 22.8 159.31034482758622 22.8C 161.96551724137933 22.8 164.24137931034483 38.4 166.89655172413794 38.4C 169.55172413793105 38.4 171.82758620689657 21.6 174.48275862068968 21.6C 177.1379310344828 21.6 179.41379310344828 24.4 182.0689655172414 24.4C 184.7241379310345 24.4 187 15.2 189.6551724137931 15.2C 192.31034482758622 15.2 194.58620689655174 19.6 197.24137931034485 19.6C 199.89655172413796 19.6 202.17241379310346 26 204.82758620689657 26C 207.48275862068968 26 209.75862068965517 23.6 212.41379310344828 23.6C 215.0689655172414 23.6 217.34482758620692 13.2 220.00000000000003 13.2"
                                                fill="none" fill-opacity="1" stroke="rgba(32,107,196,1)"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-line" index="0"
                                                clip-path="url(#gridRectMaskcumoq99f)"
                                                pathTo="M 0 25.2C 2.6551724137931036 25.2 4.931034482758621 26 7.586206896551725 26C 10.24137931034483 26 12.517241379310347 22.4 15.17241379310345 22.4C 17.827586206896555 22.4 20.10344827586207 28.8 22.758620689655174 28.8C 25.413793103448278 28.8 27.689655172413797 25.6 30.3448275862069 25.6C 33.00000000000001 25.6 35.27586206896552 30.4 37.931034482758626 30.4C 40.58620689655173 30.4 42.862068965517246 14 45.51724137931035 14C 48.17241379310345 14 50.44827586206897 27.6 53.10344827586207 27.6C 55.758620689655174 27.6 58.0344827586207 25.2 60.6896551724138 25.2C 63.344827586206904 25.2 65.62068965517243 24.4 68.27586206896552 24.4C 70.93103448275863 24.4 73.20689655172414 15.2 75.86206896551725 15.2C 78.51724137931035 15.2 80.79310344827587 19.6 83.44827586206897 19.6C 86.10344827586208 19.6 88.37931034482759 26 91.0344827586207 26C 93.68965517241381 26 95.96551724137932 23.6 98.62068965517243 23.6C 101.27586206896552 23.6 103.55172413793105 26 106.20689655172414 26C 108.86206896551725 26 111.13793103448276 29.2 113.79310344827587 29.2C 116.44827586206898 29.2 118.72413793103449 2.799999999999997 121.3793103448276 2.799999999999997C 124.03448275862071 2.799999999999997 126.31034482758622 18.8 128.96551724137933 18.8C 131.62068965517244 18.8 133.89655172413794 15.600000000000001 136.55172413793105 15.600000000000001C 139.20689655172416 15.600000000000001 141.48275862068965 29.2 144.13793103448276 29.2C 146.79310344827587 29.2 149.0689655172414 18.4 151.7241379310345 18.4C 154.37931034482762 18.4 156.6551724137931 22.8 159.31034482758622 22.8C 161.96551724137933 22.8 164.24137931034483 38.4 166.89655172413794 38.4C 169.55172413793105 38.4 171.82758620689657 21.6 174.48275862068968 21.6C 177.1379310344828 21.6 179.41379310344828 24.4 182.0689655172414 24.4C 184.7241379310345 24.4 187 15.2 189.6551724137931 15.2C 192.31034482758622 15.2 194.58620689655174 19.6 197.24137931034485 19.6C 199.89655172413796 19.6 202.17241379310346 26 204.82758620689657 26C 207.48275862068968 26 209.75862068965517 23.6 212.41379310344828 23.6C 215.0689655172414 23.6 217.34482758620692 13.2 220.00000000000003 13.2"
                                                pathFrom="M -1 40L -1 40L 7.586206896551725 40L 15.17241379310345 40L 22.758620689655174 40L 30.3448275862069 40L 37.931034482758626 40L 45.51724137931035 40L 53.10344827586207 40L 60.6896551724138 40L 68.27586206896552 40L 75.86206896551725 40L 83.44827586206897 40L 91.0344827586207 40L 98.62068965517243 40L 106.20689655172414 40L 113.79310344827587 40L 121.3793103448276 40L 128.96551724137933 40L 136.55172413793105 40L 144.13793103448276 40L 151.7241379310345 40L 159.31034482758622 40L 166.89655172413794 40L 174.48275862068968 40L 182.0689655172414 40L 189.6551724137931 40L 197.24137931034485 40L 204.82758620689657 40L 212.41379310344828 40L 220.00000000000003 40">
                                            </path>
                                            <g id="SvgjsG5395" class="apexcharts-series-markers-wrap"
                                                data:realIndex="0">
                                                <g class="apexcharts-series-markers">
                                                    <circle id="SvgjsCircle5427" r="0"
                                                        cx="0" cy="0"
                                                        class="apexcharts-marker w7aac59a no-pointer-events"
                                                        stroke="#ffffff" fill="#206bc4" fill-opacity="1"
                                                        stroke-width="2" stroke-opacity="0.9"
                                                        default-marker-size="0"></circle>
                                                </g>
                                            </g>
                                        </g>
                                        <g id="SvgjsG5398" class="apexcharts-series" seriesName="April"
                                            data:longestSeries="true" rel="2" data:realIndex="1">
                                            <path id="SvgjsPath5401"
                                                d="M 0 2.799999999999997C 2.6551724137931036 2.799999999999997 4.931034482758621 18.4 7.586206896551725 18.4C 10.24137931034483 18.4 12.517241379310347 19.6 15.17241379310345 19.6C 17.827586206896555 19.6 20.10344827586207 30.4 22.758620689655174 30.4C 25.413793103448278 30.4 27.689655172413797 26 30.3448275862069 26C 33.00000000000001 26 35.27586206896552 26 37.931034482758626 26C 40.58620689655173 26 42.862068965517246 27.6 45.51724137931035 27.6C 48.17241379310345 27.6 50.44827586206897 13.2 53.10344827586207 13.2C 55.758620689655174 13.2 58.0344827586207 32.4 60.6896551724138 32.4C 63.344827586206904 32.4 65.62068965517243 22.8 68.27586206896552 22.8C 70.93103448275863 22.8 73.20689655172414 28.8 75.86206896551725 28.8C 78.51724137931035 28.8 80.79310344827587 25.6 83.44827586206897 25.6C 86.10344827586208 25.6 88.37931034482759 15.2 91.0344827586207 15.2C 93.68965517241381 15.2 95.96551724137932 15.600000000000001 98.62068965517243 15.600000000000001C 101.27586206896552 15.600000000000001 103.55172413793105 29.2 106.20689655172414 29.2C 108.86206896551725 29.2 111.13793103448276 24.4 113.79310344827587 24.4C 116.44827586206898 24.4 118.72413793103449 26 121.3793103448276 26C 124.03448275862071 26 126.31034482758622 23.6 128.96551724137933 23.6C 131.62068965517244 23.6 133.89655172413794 29.2 136.55172413793105 29.2C 139.20689655172416 29.2 141.48275862068965 26 144.13793103448276 26C 146.79310344827587 26 149.0689655172414 19.6 151.7241379310345 19.6C 154.37931034482762 19.6 156.6551724137931 21.6 159.31034482758622 21.6C 161.96551724137933 21.6 164.24137931034483 15.2 166.89655172413794 15.2C 169.55172413793105 15.2 171.82758620689657 25.2 174.48275862068968 25.2C 177.1379310344828 25.2 179.41379310344828 22.4 182.0689655172414 22.4C 184.7241379310345 22.4 187 18.8 189.6551724137931 18.8C 192.31034482758622 18.8 194.58620689655174 23.6 197.24137931034485 23.6C 199.89655172413796 23.6 202.17241379310346 14 204.82758620689657 14C 207.48275862068968 14 209.75862068965517 24.4 212.41379310344828 24.4C 215.0689655172414 24.4 217.34482758620692 25.2 220.00000000000003 25.2"
                                                fill="none" fill-opacity="1" stroke="rgba(168,174,183,1)"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="1"
                                                stroke-dasharray="3" class="apexcharts-line" index="1"
                                                clip-path="url(#gridRectMaskcumoq99f)"
                                                pathTo="M 0 2.799999999999997C 2.6551724137931036 2.799999999999997 4.931034482758621 18.4 7.586206896551725 18.4C 10.24137931034483 18.4 12.517241379310347 19.6 15.17241379310345 19.6C 17.827586206896555 19.6 20.10344827586207 30.4 22.758620689655174 30.4C 25.413793103448278 30.4 27.689655172413797 26 30.3448275862069 26C 33.00000000000001 26 35.27586206896552 26 37.931034482758626 26C 40.58620689655173 26 42.862068965517246 27.6 45.51724137931035 27.6C 48.17241379310345 27.6 50.44827586206897 13.2 53.10344827586207 13.2C 55.758620689655174 13.2 58.0344827586207 32.4 60.6896551724138 32.4C 63.344827586206904 32.4 65.62068965517243 22.8 68.27586206896552 22.8C 70.93103448275863 22.8 73.20689655172414 28.8 75.86206896551725 28.8C 78.51724137931035 28.8 80.79310344827587 25.6 83.44827586206897 25.6C 86.10344827586208 25.6 88.37931034482759 15.2 91.0344827586207 15.2C 93.68965517241381 15.2 95.96551724137932 15.600000000000001 98.62068965517243 15.600000000000001C 101.27586206896552 15.600000000000001 103.55172413793105 29.2 106.20689655172414 29.2C 108.86206896551725 29.2 111.13793103448276 24.4 113.79310344827587 24.4C 116.44827586206898 24.4 118.72413793103449 26 121.3793103448276 26C 124.03448275862071 26 126.31034482758622 23.6 128.96551724137933 23.6C 131.62068965517244 23.6 133.89655172413794 29.2 136.55172413793105 29.2C 139.20689655172416 29.2 141.48275862068965 26 144.13793103448276 26C 146.79310344827587 26 149.0689655172414 19.6 151.7241379310345 19.6C 154.37931034482762 19.6 156.6551724137931 21.6 159.31034482758622 21.6C 161.96551724137933 21.6 164.24137931034483 15.2 166.89655172413794 15.2C 169.55172413793105 15.2 171.82758620689657 25.2 174.48275862068968 25.2C 177.1379310344828 25.2 179.41379310344828 22.4 182.0689655172414 22.4C 184.7241379310345 22.4 187 18.8 189.6551724137931 18.8C 192.31034482758622 18.8 194.58620689655174 23.6 197.24137931034485 23.6C 199.89655172413796 23.6 202.17241379310346 14 204.82758620689657 14C 207.48275862068968 14 209.75862068965517 24.4 212.41379310344828 24.4C 215.0689655172414 24.4 217.34482758620692 25.2 220.00000000000003 25.2"
                                                pathFrom="M -1 40L -1 40L 7.586206896551725 40L 15.17241379310345 40L 22.758620689655174 40L 30.3448275862069 40L 37.931034482758626 40L 45.51724137931035 40L 53.10344827586207 40L 60.6896551724138 40L 68.27586206896552 40L 75.86206896551725 40L 83.44827586206897 40L 91.0344827586207 40L 98.62068965517243 40L 106.20689655172414 40L 113.79310344827587 40L 121.3793103448276 40L 128.96551724137933 40L 136.55172413793105 40L 144.13793103448276 40L 151.7241379310345 40L 159.31034482758622 40L 166.89655172413794 40L 174.48275862068968 40L 182.0689655172414 40L 189.6551724137931 40L 197.24137931034485 40L 204.82758620689657 40L 212.41379310344828 40L 220.00000000000003 40">
                                            </path>
                                            <g id="SvgjsG5399" class="apexcharts-series-markers-wrap"
                                                data:realIndex="1">
                                                <g class="apexcharts-series-markers">
                                                    <circle id="SvgjsCircle5428" r="0"
                                                        cx="0" cy="0"
                                                        class="apexcharts-marker whx4mplmx no-pointer-events"
                                                        stroke="#ffffff" fill="#a8aeb7" fill-opacity="1"
                                                        stroke-width="2" stroke-opacity="0.9"
                                                        default-marker-size="0"></circle>
                                                </g>
                                            </g>
                                        </g>
                                        <g id="SvgjsG5396" class="apexcharts-datalabels" data:realIndex="0">
                                        </g>
                                        <g id="SvgjsG5400" class="apexcharts-datalabels" data:realIndex="1">
                                        </g>
                                    </g>
                                    <line id="SvgjsLine5422" x1="0" y1="0" x2="220"
                                        y2="0" stroke="#b6b6b6" stroke-dasharray="0"
                                        stroke-width="1" stroke-linecap="butt"
                                        class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine5423" x1="0" y1="0" x2="220"
                                        y2="0" stroke-dasharray="0" stroke-width="0"
                                        stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG5424" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG5425" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG5426" class="apexcharts-point-annotations"></g>
                                </g>
                                <rect id="SvgjsRect5359" width="0" height="0" x="0"
                                    y="0" rx="0" ry="0" opacity="1"
                                    stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe">
                                </rect>
                                <g id="SvgjsG5410" class="apexcharts-yaxis" rel="0"
                                    transform="translate(-18, 0)"></g>
                                <g id="SvgjsG5356" class="apexcharts-annotations"></g>
                            </svg>
                            <div class="apexcharts-legend" style="max-height: 20px;"></div>
                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                <div class="apexcharts-tooltip-title"
                                    style="font-family: inherit; font-size: 12px;"></div>
                                <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                        class="apexcharts-tooltip-marker"
                                        style="background-color: rgb(32, 107, 196);"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: inherit; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                                <div class="apexcharts-tooltip-series-group" style="order: 2;"><span
                                        class="apexcharts-tooltip-marker"
                                        style="background-color: rgb(168, 174, 183);"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: inherit; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                <div class="apexcharts-yaxistooltip-text"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">Active users</div>
                        <div class="ms-auto lh-1">
                            <div class="dropdown">
                                <a class="dropdown-toggle text-muted" href="#"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last
                                    7 days</a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item active" href="#">Last 7 days</a>
                                    <a class="dropdown-item" href="#">Last 30 days</a>
                                    <a class="dropdown-item" href="#">Last 3 months</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-baseline">
                        <div class="h1 mb-3 me-2">2,986</div>
                        <div class="me-auto">
                            <span class="text-green d-inline-flex align-items-center lh-1">
                                4%
                                <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="3 17 9 11 13 15 21 7"></polyline>
                                    <polyline points="14 7 21 7 21 14"></polyline>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div id="chart-active-users" class="chart-sm" style="min-height: 40px;">
                        <div id="apexcharts9jh20gmbf"
                            class="apexcharts-canvas apexcharts9jh20gmbf apexcharts-theme-light"
                            style="width: 220px; height: 40px;"><svg id="SvgjsSvg5429" width="220"
                                height="40" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                style="background: transparent;">
                                <g id="SvgjsG5431" class="apexcharts-inner apexcharts-graphical"
                                    transform="translate(11.528735632183908, 0)">
                                    <defs id="SvgjsDefs5430">
                                        <linearGradient id="SvgjsLinearGradient5435" x1="0"
                                            y1="0" x2="0" y2="1">
                                            <stop id="SvgjsStop5436" stop-opacity="0.4"
                                                stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                            <stop id="SvgjsStop5437" stop-opacity="0.5"
                                                stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                            <stop id="SvgjsStop5438" stop-opacity="0.5"
                                                stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                        </linearGradient>
                                        <clipPath id="gridRectMask9jh20gmbf">
                                            <rect id="SvgjsRect5470" width="223.99999999999997"
                                                height="40" x="-9.528735632183908" y="0"
                                                rx="0" ry="0" opacity="1"
                                                stroke-width="0" stroke="none" stroke-dasharray="0"
                                                fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="forecastMask9jh20gmbf"></clipPath>
                                        <clipPath id="nonForecastMask9jh20gmbf"></clipPath>
                                        <clipPath id="gridRectMarkerMask9jh20gmbf">
                                            <rect id="SvgjsRect5471" width="208.94252873563218"
                                                height="44" x="-2" y="-2" rx="0"
                                                ry="0" opacity="1" stroke-width="0"
                                                stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                    </defs>
                                    <rect id="SvgjsRect5439" width="3.5334918747522788" height="40"
                                        x="0" y="0" rx="0" ry="0"
                                        opacity="1" stroke-width="0" stroke-dasharray="3"
                                        fill="url(#SvgjsLinearGradient5435)" class="apexcharts-xcrosshairs"
                                        y2="40" filter="none" fill-opacity="0.9"></rect>
                                    <g id="SvgjsG5536" class="apexcharts-xaxis" transform="translate(0, 0)">
                                        <g id="SvgjsG5537" class="apexcharts-xaxis-texts-g"
                                            transform="translate(0, -4)"></g>
                                    </g>
                                    <g id="SvgjsG5544" class="apexcharts-grid">
                                        <g id="SvgjsG5545" class="apexcharts-gridlines-horizontal"
                                            style="display: none;">
                                            <line id="SvgjsLine5547" x1="-7.528735632183908" y1="0"
                                                x2="212.47126436781608" y2="0" stroke="#e0e0e0"
                                                stroke-dasharray="4" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine5548" x1="-7.528735632183908" y1="8"
                                                x2="212.47126436781608" y2="8" stroke="#e0e0e0"
                                                stroke-dasharray="4" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine5549" x1="-7.528735632183908" y1="16"
                                                x2="212.47126436781608" y2="16" stroke="#e0e0e0"
                                                stroke-dasharray="4" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine5550" x1="-7.528735632183908" y1="24"
                                                x2="212.47126436781608" y2="24" stroke="#e0e0e0"
                                                stroke-dasharray="4" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine5551" x1="-7.528735632183908" y1="32"
                                                x2="212.47126436781608" y2="32" stroke="#e0e0e0"
                                                stroke-dasharray="4" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine5552" x1="-7.528735632183908" y1="40"
                                                x2="212.47126436781608" y2="40" stroke="#e0e0e0"
                                                stroke-dasharray="4" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                        </g>
                                        <g id="SvgjsG5546" class="apexcharts-gridlines-vertical"
                                            style="display: none;"></g>
                                        <line id="SvgjsLine5554" x1="0" y1="40"
                                            x2="204.94252873563218" y2="40" stroke="transparent"
                                            stroke-dasharray="0" stroke-linecap="butt"></line>
                                        <line id="SvgjsLine5553" x1="0" y1="1"
                                            x2="0" y2="40" stroke="transparent"
                                            stroke-dasharray="0" stroke-linecap="butt"></line>
                                    </g>
                                    <g id="SvgjsG5472" class="apexcharts-bar-series apexcharts-plot-series">
                                        <g id="SvgjsG5473" class="apexcharts-series" rel="1"
                                            seriesName="Profits" data:realIndex="0">
                                            <path id="SvgjsPath5477"
                                                d="M -1.7667459373761394 40L -1.7667459373761394 25.2Q -1.7667459373761394 25.2 -1.7667459373761394 25.2L 1.7667459373761394 25.2Q 1.7667459373761394 25.2 1.7667459373761394 25.2L 1.7667459373761394 25.2L 1.7667459373761394 40L 1.7667459373761394 40z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1" stroke-opacity="1"
                                                stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                class="apexcharts-bar-area" index="0"
                                                clip-path="url(#gridRectMask9jh20gmbf)"
                                                pathTo="M -1.7667459373761394 40L -1.7667459373761394 25.2Q -1.7667459373761394 25.2 -1.7667459373761394 25.2L 1.7667459373761394 25.2Q 1.7667459373761394 25.2 1.7667459373761394 25.2L 1.7667459373761394 25.2L 1.7667459373761394 40L 1.7667459373761394 40z"
                                                pathFrom="M -1.7667459373761394 40L -1.7667459373761394 40L 1.7667459373761394 40L 1.7667459373761394 40L 1.7667459373761394 40L 1.7667459373761394 40L 1.7667459373761394 40L -1.7667459373761394 40"
                                                cy="25.2" cx="1.7667459373761394" j="0"
                                                val="37" barHeight="14.8"
                                                barWidth="3.5334918747522788"></path>
                                            <path id="SvgjsPath5479"
                                                d="M 5.300237812128418 40L 5.300237812128418 26Q 5.300237812128418 26 5.300237812128418 26L 8.833729686880696 26Q 8.833729686880696 26 8.833729686880696 26L 8.833729686880696 26L 8.833729686880696 40L 8.833729686880696 40z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask9jh20gmbf)"
                                                pathTo="M 5.300237812128418 40L 5.300237812128418 26Q 5.300237812128418 26 5.300237812128418 26L 8.833729686880696 26Q 8.833729686880696 26 8.833729686880696 26L 8.833729686880696 26L 8.833729686880696 40L 8.833729686880696 40z"
                                                pathFrom="M 5.300237812128418 40L 5.300237812128418 40L 8.833729686880696 40L 8.833729686880696 40L 8.833729686880696 40L 8.833729686880696 40L 8.833729686880696 40L 5.300237812128418 40"
                                                cy="26" cx="8.833729686880696" j="1"
                                                val="35" barHeight="14"
                                                barWidth="3.5334918747522788"></path>
                                            <path id="SvgjsPath5481"
                                                d="M 12.367221561632975 40L 12.367221561632975 22.4Q 12.367221561632975 22.4 12.367221561632975 22.4L 15.900713436385255 22.4Q 15.900713436385255 22.4 15.900713436385255 22.4L 15.900713436385255 22.4L 15.900713436385255 40L 15.900713436385255 40z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask9jh20gmbf)"
                                                pathTo="M 12.367221561632975 40L 12.367221561632975 22.4Q 12.367221561632975 22.4 12.367221561632975 22.4L 15.900713436385255 22.4Q 15.900713436385255 22.4 15.900713436385255 22.4L 15.900713436385255 22.4L 15.900713436385255 40L 15.900713436385255 40z"
                                                pathFrom="M 12.367221561632975 40L 12.367221561632975 40L 15.900713436385255 40L 15.900713436385255 40L 15.900713436385255 40L 15.900713436385255 40L 15.900713436385255 40L 12.367221561632975 40"
                                                cy="22.4" cx="15.900713436385255" j="2"
                                                val="44" barHeight="17.6"
                                                barWidth="3.5334918747522788"></path>
                                            <path id="SvgjsPath5483"
                                                d="M 19.434205311137532 40L 19.434205311137532 28.8Q 19.434205311137532 28.8 19.434205311137532 28.8L 22.96769718588981 28.8Q 22.96769718588981 28.8 22.96769718588981 28.8L 22.96769718588981 28.8L 22.96769718588981 40L 22.96769718588981 40z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask9jh20gmbf)"
                                                pathTo="M 19.434205311137532 40L 19.434205311137532 28.8Q 19.434205311137532 28.8 19.434205311137532 28.8L 22.96769718588981 28.8Q 22.96769718588981 28.8 22.96769718588981 28.8L 22.96769718588981 28.8L 22.96769718588981 40L 22.96769718588981 40z"
                                                pathFrom="M 19.434205311137532 40L 19.434205311137532 40L 22.96769718588981 40L 22.96769718588981 40L 22.96769718588981 40L 22.96769718588981 40L 22.96769718588981 40L 19.434205311137532 40"
                                                cy="28.8" cx="22.96769718588981" j="3"
                                                val="28" barHeight="11.2"
                                                barWidth="3.5334918747522788"></path>
                                            <path id="SvgjsPath5485"
                                                d="M 26.50118906064209 40L 26.50118906064209 25.6Q 26.50118906064209 25.6 26.50118906064209 25.6L 30.03468093539437 25.6Q 30.03468093539437 25.6 30.03468093539437 25.6L 30.03468093539437 25.6L 30.03468093539437 40L 30.03468093539437 40z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask9jh20gmbf)"
                                                pathTo="M 26.50118906064209 40L 26.50118906064209 25.6Q 26.50118906064209 25.6 26.50118906064209 25.6L 30.03468093539437 25.6Q 30.03468093539437 25.6 30.03468093539437 25.6L 30.03468093539437 25.6L 30.03468093539437 40L 30.03468093539437 40z"
                                                pathFrom="M 26.50118906064209 40L 26.50118906064209 40L 30.03468093539437 40L 30.03468093539437 40L 30.03468093539437 40L 30.03468093539437 40L 30.03468093539437 40L 26.50118906064209 40"
                                                cy="25.6" cx="30.03468093539437" j="4"
                                                val="36" barHeight="14.4"
                                                barWidth="3.5334918747522788"></path>
                                            <path id="SvgjsPath5487"
                                                d="M 33.56817281014665 40L 33.56817281014665 30.4Q 33.56817281014665 30.4 33.56817281014665 30.4L 37.10166468489893 30.4Q 37.10166468489893 30.4 37.10166468489893 30.4L 37.10166468489893 30.4L 37.10166468489893 40L 37.10166468489893 40z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask9jh20gmbf)"
                                                pathTo="M 33.56817281014665 40L 33.56817281014665 30.4Q 33.56817281014665 30.4 33.56817281014665 30.4L 37.10166468489893 30.4Q 37.10166468489893 30.4 37.10166468489893 30.4L 37.10166468489893 30.4L 37.10166468489893 40L 37.10166468489893 40z"
                                                pathFrom="M 33.56817281014665 40L 33.56817281014665 40L 37.10166468489893 40L 37.10166468489893 40L 37.10166468489893 40L 37.10166468489893 40L 37.10166468489893 40L 33.56817281014665 40"
                                                cy="30.4" cx="37.10166468489893" j="5"
                                                val="24" barHeight="9.6"
                                                barWidth="3.5334918747522788"></path>
                                            <path id="SvgjsPath5489"
                                                d="M 40.63515655965121 40L 40.63515655965121 14Q 40.63515655965121 14 40.63515655965121 14L 44.16864843440349 14Q 44.16864843440349 14 44.16864843440349 14L 44.16864843440349 14L 44.16864843440349 40L 44.16864843440349 40z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask9jh20gmbf)"
                                                pathTo="M 40.63515655965121 40L 40.63515655965121 14Q 40.63515655965121 14 40.63515655965121 14L 44.16864843440349 14Q 44.16864843440349 14 44.16864843440349 14L 44.16864843440349 14L 44.16864843440349 40L 44.16864843440349 40z"
                                                pathFrom="M 40.63515655965121 40L 40.63515655965121 40L 44.16864843440349 40L 44.16864843440349 40L 44.16864843440349 40L 44.16864843440349 40L 44.16864843440349 40L 40.63515655965121 40"
                                                cy="14" cx="44.16864843440349" j="6"
                                                val="65" barHeight="26"
                                                barWidth="3.5334918747522788"></path>
                                            <path id="SvgjsPath5491"
                                                d="M 47.702140309155766 40L 47.702140309155766 27.6Q 47.702140309155766 27.6 47.702140309155766 27.6L 51.235632183908045 27.6Q 51.235632183908045 27.6 51.235632183908045 27.6L 51.235632183908045 27.6L 51.235632183908045 40L 51.235632183908045 40z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask9jh20gmbf)"
                                                pathTo="M 47.702140309155766 40L 47.702140309155766 27.6Q 47.702140309155766 27.6 47.702140309155766 27.6L 51.235632183908045 27.6Q 51.235632183908045 27.6 51.235632183908045 27.6L 51.235632183908045 27.6L 51.235632183908045 40L 51.235632183908045 40z"
                                                pathFrom="M 47.702140309155766 40L 47.702140309155766 40L 51.235632183908045 40L 51.235632183908045 40L 51.235632183908045 40L 51.235632183908045 40L 51.235632183908045 40L 47.702140309155766 40"
                                                cy="27.6" cx="51.235632183908045" j="7"
                                                val="31" barHeight="12.4"
                                                barWidth="3.5334918747522788"></path>
                                            <path id="SvgjsPath5493"
                                                d="M 54.769124058660324 40L 54.769124058660324 25.2Q 54.769124058660324 25.2 54.769124058660324 25.2L 58.3026159334126 25.2Q 58.3026159334126 25.2 58.3026159334126 25.2L 58.3026159334126 25.2L 58.3026159334126 40L 58.3026159334126 40z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask9jh20gmbf)"
                                                pathTo="M 54.769124058660324 40L 54.769124058660324 25.2Q 54.769124058660324 25.2 54.769124058660324 25.2L 58.3026159334126 25.2Q 58.3026159334126 25.2 58.3026159334126 25.2L 58.3026159334126 25.2L 58.3026159334126 40L 58.3026159334126 40z"
                                                pathFrom="M 54.769124058660324 40L 54.769124058660324 40L 58.3026159334126 40L 58.3026159334126 40L 58.3026159334126 40L 58.3026159334126 40L 58.3026159334126 40L 54.769124058660324 40"
                                                cy="25.2" cx="58.3026159334126" j="8"
                                                val="37" barHeight="14.8"
                                                barWidth="3.5334918747522788"></path>
                                            <path id="SvgjsPath5495"
                                                d="M 61.83610780816488 40L 61.83610780816488 24.4Q 61.83610780816488 24.4 61.83610780816488 24.4L 65.36959968291715 24.4Q 65.36959968291715 24.4 65.36959968291715 24.4L 65.36959968291715 24.4L 65.36959968291715 40L 65.36959968291715 40z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask9jh20gmbf)"
                                                pathTo="M 61.83610780816488 40L 61.83610780816488 24.4Q 61.83610780816488 24.4 61.83610780816488 24.4L 65.36959968291715 24.4Q 65.36959968291715 24.4 65.36959968291715 24.4L 65.36959968291715 24.4L 65.36959968291715 40L 65.36959968291715 40z"
                                                pathFrom="M 61.83610780816488 40L 61.83610780816488 40L 65.36959968291715 40L 65.36959968291715 40L 65.36959968291715 40L 65.36959968291715 40L 65.36959968291715 40L 61.83610780816488 40"
                                                cy="24.4" cx="65.36959968291715" j="9"
                                                val="39" barHeight="15.6"
                                                barWidth="3.5334918747522788"></path>
                                            <path id="SvgjsPath5497"
                                                d="M 68.90309155766943 40L 68.90309155766943 15.2Q 68.90309155766943 15.2 68.90309155766943 15.2L 72.4365834324217 15.2Q 72.4365834324217 15.2 72.4365834324217 15.2L 72.4365834324217 15.2L 72.4365834324217 40L 72.4365834324217 40z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask9jh20gmbf)"
                                                pathTo="M 68.90309155766943 40L 68.90309155766943 15.2Q 68.90309155766943 15.2 68.90309155766943 15.2L 72.4365834324217 15.2Q 72.4365834324217 15.2 72.4365834324217 15.2L 72.4365834324217 15.2L 72.4365834324217 40L 72.4365834324217 40z"
                                                pathFrom="M 68.90309155766943 40L 68.90309155766943 40L 72.4365834324217 40L 72.4365834324217 40L 72.4365834324217 40L 72.4365834324217 40L 72.4365834324217 40L 68.90309155766943 40"
                                                cy="15.2" cx="72.4365834324217" j="10"
                                                val="62" barHeight="24.8"
                                                barWidth="3.5334918747522788"></path>
                                            <path id="SvgjsPath5499"
                                                d="M 75.97007530717399 40L 75.97007530717399 19.6Q 75.97007530717399 19.6 75.97007530717399 19.6L 79.50356718192626 19.6Q 79.50356718192626 19.6 79.50356718192626 19.6L 79.50356718192626 19.6L 79.50356718192626 40L 79.50356718192626 40z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask9jh20gmbf)"
                                                pathTo="M 75.97007530717399 40L 75.97007530717399 19.6Q 75.97007530717399 19.6 75.97007530717399 19.6L 79.50356718192626 19.6Q 79.50356718192626 19.6 79.50356718192626 19.6L 79.50356718192626 19.6L 79.50356718192626 40L 79.50356718192626 40z"
                                                pathFrom="M 75.97007530717399 40L 75.97007530717399 40L 79.50356718192626 40L 79.50356718192626 40L 79.50356718192626 40L 79.50356718192626 40L 79.50356718192626 40L 75.97007530717399 40"
                                                cy="19.6" cx="79.50356718192626" j="11"
                                                val="51" barHeight="20.4"
                                                barWidth="3.5334918747522788"></path>
                                            <path id="SvgjsPath5501"
                                                d="M 83.03705905667854 40L 83.03705905667854 26Q 83.03705905667854 26 83.03705905667854 26L 86.57055093143082 26Q 86.57055093143082 26 86.57055093143082 26L 86.57055093143082 26L 86.57055093143082 40L 86.57055093143082 40z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask9jh20gmbf)"
                                                pathTo="M 83.03705905667854 40L 83.03705905667854 26Q 83.03705905667854 26 83.03705905667854 26L 86.57055093143082 26Q 86.57055093143082 26 86.57055093143082 26L 86.57055093143082 26L 86.57055093143082 40L 86.57055093143082 40z"
                                                pathFrom="M 83.03705905667854 40L 83.03705905667854 40L 86.57055093143082 40L 86.57055093143082 40L 86.57055093143082 40L 86.57055093143082 40L 86.57055093143082 40L 83.03705905667854 40"
                                                cy="26" cx="86.57055093143082" j="12"
                                                val="35" barHeight="14"
                                                barWidth="3.5334918747522788"></path>
                                            <path id="SvgjsPath5503"
                                                d="M 90.1040428061831 40L 90.1040428061831 23.6Q 90.1040428061831 23.6 90.1040428061831 23.6L 93.63753468093537 23.6Q 93.63753468093537 23.6 93.63753468093537 23.6L 93.63753468093537 23.6L 93.63753468093537 40L 93.63753468093537 40z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask9jh20gmbf)"
                                                pathTo="M 90.1040428061831 40L 90.1040428061831 23.6Q 90.1040428061831 23.6 90.1040428061831 23.6L 93.63753468093537 23.6Q 93.63753468093537 23.6 93.63753468093537 23.6L 93.63753468093537 23.6L 93.63753468093537 40L 93.63753468093537 40z"
                                                pathFrom="M 90.1040428061831 40L 90.1040428061831 40L 93.63753468093537 40L 93.63753468093537 40L 93.63753468093537 40L 93.63753468093537 40L 93.63753468093537 40L 90.1040428061831 40"
                                                cy="23.6" cx="93.63753468093537" j="13"
                                                val="41" barHeight="16.4"
                                                barWidth="3.5334918747522788"></path>
                                            <path id="SvgjsPath5505"
                                                d="M 97.17102655568766 40L 97.17102655568766 26Q 97.17102655568766 26 97.17102655568766 26L 100.70451843043993 26Q 100.70451843043993 26 100.70451843043993 26L 100.70451843043993 26L 100.70451843043993 40L 100.70451843043993 40z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask9jh20gmbf)"
                                                pathTo="M 97.17102655568766 40L 97.17102655568766 26Q 97.17102655568766 26 97.17102655568766 26L 100.70451843043993 26Q 100.70451843043993 26 100.70451843043993 26L 100.70451843043993 26L 100.70451843043993 40L 100.70451843043993 40z"
                                                pathFrom="M 97.17102655568766 40L 97.17102655568766 40L 100.70451843043993 40L 100.70451843043993 40L 100.70451843043993 40L 100.70451843043993 40L 100.70451843043993 40L 97.17102655568766 40"
                                                cy="26" cx="100.70451843043993" j="14"
                                                val="35" barHeight="14"
                                                barWidth="3.5334918747522788"></path>
                                            <path id="SvgjsPath5507"
                                                d="M 104.23801030519222 40L 104.23801030519222 29.2Q 104.23801030519222 29.2 104.23801030519222 29.2L 107.77150217994449 29.2Q 107.77150217994449 29.2 107.77150217994449 29.2L 107.77150217994449 29.2L 107.77150217994449 40L 107.77150217994449 40z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask9jh20gmbf)"
                                                pathTo="M 104.23801030519222 40L 104.23801030519222 29.2Q 104.23801030519222 29.2 104.23801030519222 29.2L 107.77150217994449 29.2Q 107.77150217994449 29.2 107.77150217994449 29.2L 107.77150217994449 29.2L 107.77150217994449 40L 107.77150217994449 40z"
                                                pathFrom="M 104.23801030519222 40L 104.23801030519222 40L 107.77150217994449 40L 107.77150217994449 40L 107.77150217994449 40L 107.77150217994449 40L 107.77150217994449 40L 104.23801030519222 40"
                                                cy="29.2" cx="107.77150217994449" j="15"
                                                val="27" barHeight="10.8"
                                                barWidth="3.5334918747522788"></path>
                                            <path id="SvgjsPath5509"
                                                d="M 111.30499405469678 40L 111.30499405469678 2.799999999999997Q 111.30499405469678 2.799999999999997 111.30499405469678 2.799999999999997L 114.83848592944905 2.799999999999997Q 114.83848592944905 2.799999999999997 114.83848592944905 2.799999999999997L 114.83848592944905 2.799999999999997L 114.83848592944905 40L 114.83848592944905 40z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask9jh20gmbf)"
                                                pathTo="M 111.30499405469678 40L 111.30499405469678 2.799999999999997Q 111.30499405469678 2.799999999999997 111.30499405469678 2.799999999999997L 114.83848592944905 2.799999999999997Q 114.83848592944905 2.799999999999997 114.83848592944905 2.799999999999997L 114.83848592944905 2.799999999999997L 114.83848592944905 40L 114.83848592944905 40z"
                                                pathFrom="M 111.30499405469678 40L 111.30499405469678 40L 114.83848592944905 40L 114.83848592944905 40L 114.83848592944905 40L 114.83848592944905 40L 114.83848592944905 40L 111.30499405469678 40"
                                                cy="2.799999999999997" cx="114.83848592944905"
                                                j="16" val="93" barHeight="37.2"
                                                barWidth="3.5334918747522788"></path>
                                            <path id="SvgjsPath5511"
                                                d="M 118.37197780420134 40L 118.37197780420134 18.8Q 118.37197780420134 18.8 118.37197780420134 18.8L 121.90546967895361 18.8Q 121.90546967895361 18.8 121.90546967895361 18.8L 121.90546967895361 18.8L 121.90546967895361 40L 121.90546967895361 40z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask9jh20gmbf)"
                                                pathTo="M 118.37197780420134 40L 118.37197780420134 18.8Q 118.37197780420134 18.8 118.37197780420134 18.8L 121.90546967895361 18.8Q 121.90546967895361 18.8 121.90546967895361 18.8L 121.90546967895361 18.8L 121.90546967895361 40L 121.90546967895361 40z"
                                                pathFrom="M 118.37197780420134 40L 118.37197780420134 40L 121.90546967895361 40L 121.90546967895361 40L 121.90546967895361 40L 121.90546967895361 40L 121.90546967895361 40L 118.37197780420134 40"
                                                cy="18.8" cx="121.90546967895361" j="17"
                                                val="53" barHeight="21.2"
                                                barWidth="3.5334918747522788"></path>
                                            <path id="SvgjsPath5513"
                                                d="M 125.4389615537059 40L 125.4389615537059 15.600000000000001Q 125.4389615537059 15.600000000000001 125.4389615537059 15.600000000000001L 128.97245342845818 15.600000000000001Q 128.97245342845818 15.600000000000001 128.97245342845818 15.600000000000001L 128.97245342845818 15.600000000000001L 128.97245342845818 40L 128.97245342845818 40z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask9jh20gmbf)"
                                                pathTo="M 125.4389615537059 40L 125.4389615537059 15.600000000000001Q 125.4389615537059 15.600000000000001 125.4389615537059 15.600000000000001L 128.97245342845818 15.600000000000001Q 128.97245342845818 15.600000000000001 128.97245342845818 15.600000000000001L 128.97245342845818 15.600000000000001L 128.97245342845818 40L 128.97245342845818 40z"
                                                pathFrom="M 125.4389615537059 40L 125.4389615537059 40L 128.97245342845818 40L 128.97245342845818 40L 128.97245342845818 40L 128.97245342845818 40L 128.97245342845818 40L 125.4389615537059 40"
                                                cy="15.600000000000001" cx="128.97245342845818"
                                                j="18" val="61" barHeight="24.4"
                                                barWidth="3.5334918747522788"></path>
                                            <path id="SvgjsPath5515"
                                                d="M 132.50594530321047 40L 132.50594530321047 29.2Q 132.50594530321047 29.2 132.50594530321047 29.2L 136.03943717796275 29.2Q 136.03943717796275 29.2 136.03943717796275 29.2L 136.03943717796275 29.2L 136.03943717796275 40L 136.03943717796275 40z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask9jh20gmbf)"
                                                pathTo="M 132.50594530321047 40L 132.50594530321047 29.2Q 132.50594530321047 29.2 132.50594530321047 29.2L 136.03943717796275 29.2Q 136.03943717796275 29.2 136.03943717796275 29.2L 136.03943717796275 29.2L 136.03943717796275 40L 136.03943717796275 40z"
                                                pathFrom="M 132.50594530321047 40L 132.50594530321047 40L 136.03943717796275 40L 136.03943717796275 40L 136.03943717796275 40L 136.03943717796275 40L 136.03943717796275 40L 132.50594530321047 40"
                                                cy="29.2" cx="136.03943717796275" j="19"
                                                val="27" barHeight="10.8"
                                                barWidth="3.5334918747522788"></path>
                                            <path id="SvgjsPath5517"
                                                d="M 139.572929052715 40L 139.572929052715 18.4Q 139.572929052715 18.4 139.572929052715 18.4L 143.1064209274673 18.4Q 143.1064209274673 18.4 143.1064209274673 18.4L 143.1064209274673 18.4L 143.1064209274673 40L 143.1064209274673 40z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask9jh20gmbf)"
                                                pathTo="M 139.572929052715 40L 139.572929052715 18.4Q 139.572929052715 18.4 139.572929052715 18.4L 143.1064209274673 18.4Q 143.1064209274673 18.4 143.1064209274673 18.4L 143.1064209274673 18.4L 143.1064209274673 40L 143.1064209274673 40z"
                                                pathFrom="M 139.572929052715 40L 139.572929052715 40L 143.1064209274673 40L 143.1064209274673 40L 143.1064209274673 40L 143.1064209274673 40L 143.1064209274673 40L 139.572929052715 40"
                                                cy="18.4" cx="143.1064209274673" j="20"
                                                val="54" barHeight="21.6"
                                                barWidth="3.5334918747522788"></path>
                                            <path id="SvgjsPath5519"
                                                d="M 146.63991280221958 40L 146.63991280221958 22.8Q 146.63991280221958 22.8 146.63991280221958 22.8L 150.17340467697187 22.8Q 150.17340467697187 22.8 150.17340467697187 22.8L 150.17340467697187 22.8L 150.17340467697187 40L 150.17340467697187 40z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask9jh20gmbf)"
                                                pathTo="M 146.63991280221958 40L 146.63991280221958 22.8Q 146.63991280221958 22.8 146.63991280221958 22.8L 150.17340467697187 22.8Q 150.17340467697187 22.8 150.17340467697187 22.8L 150.17340467697187 22.8L 150.17340467697187 40L 150.17340467697187 40z"
                                                pathFrom="M 146.63991280221958 40L 146.63991280221958 40L 150.17340467697187 40L 150.17340467697187 40L 150.17340467697187 40L 150.17340467697187 40L 150.17340467697187 40L 146.63991280221958 40"
                                                cy="22.8" cx="150.17340467697187" j="21"
                                                val="43" barHeight="17.2"
                                                barWidth="3.5334918747522788"></path>
                                            <path id="SvgjsPath5521"
                                                d="M 153.70689655172413 40L 153.70689655172413 32.4Q 153.70689655172413 32.4 153.70689655172413 32.4L 157.24038842647641 32.4Q 157.24038842647641 32.4 157.24038842647641 32.4L 157.24038842647641 32.4L 157.24038842647641 40L 157.24038842647641 40z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask9jh20gmbf)"
                                                pathTo="M 153.70689655172413 40L 153.70689655172413 32.4Q 153.70689655172413 32.4 153.70689655172413 32.4L 157.24038842647641 32.4Q 157.24038842647641 32.4 157.24038842647641 32.4L 157.24038842647641 32.4L 157.24038842647641 40L 157.24038842647641 40z"
                                                pathFrom="M 153.70689655172413 40L 153.70689655172413 40L 157.24038842647641 40L 157.24038842647641 40L 157.24038842647641 40L 157.24038842647641 40L 157.24038842647641 40L 153.70689655172413 40"
                                                cy="32.4" cx="157.24038842647641" j="22"
                                                val="19" barHeight="7.6"
                                                barWidth="3.5334918747522788"></path>
                                            <path id="SvgjsPath5523"
                                                d="M 160.7738803012287 40L 160.7738803012287 21.6Q 160.7738803012287 21.6 160.7738803012287 21.6L 164.307372175981 21.6Q 164.307372175981 21.6 164.307372175981 21.6L 164.307372175981 21.6L 164.307372175981 40L 164.307372175981 40z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask9jh20gmbf)"
                                                pathTo="M 160.7738803012287 40L 160.7738803012287 21.6Q 160.7738803012287 21.6 160.7738803012287 21.6L 164.307372175981 21.6Q 164.307372175981 21.6 164.307372175981 21.6L 164.307372175981 21.6L 164.307372175981 40L 164.307372175981 40z"
                                                pathFrom="M 160.7738803012287 40L 160.7738803012287 40L 164.307372175981 40L 164.307372175981 40L 164.307372175981 40L 164.307372175981 40L 164.307372175981 40L 160.7738803012287 40"
                                                cy="21.6" cx="164.307372175981" j="23"
                                                val="46" barHeight="18.4"
                                                barWidth="3.5334918747522788"></path>
                                            <path id="SvgjsPath5525"
                                                d="M 167.84086405073324 40L 167.84086405073324 24.4Q 167.84086405073324 24.4 167.84086405073324 24.4L 171.37435592548553 24.4Q 171.37435592548553 24.4 171.37435592548553 24.4L 171.37435592548553 24.4L 171.37435592548553 40L 171.37435592548553 40z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask9jh20gmbf)"
                                                pathTo="M 167.84086405073324 40L 167.84086405073324 24.4Q 167.84086405073324 24.4 167.84086405073324 24.4L 171.37435592548553 24.4Q 171.37435592548553 24.4 171.37435592548553 24.4L 171.37435592548553 24.4L 171.37435592548553 40L 171.37435592548553 40z"
                                                pathFrom="M 167.84086405073324 40L 167.84086405073324 40L 171.37435592548553 40L 171.37435592548553 40L 171.37435592548553 40L 171.37435592548553 40L 171.37435592548553 40L 167.84086405073324 40"
                                                cy="24.4" cx="171.37435592548553" j="24"
                                                val="39" barHeight="15.6"
                                                barWidth="3.5334918747522788"></path>
                                            <path id="SvgjsPath5527"
                                                d="M 174.90784780023782 40L 174.90784780023782 15.2Q 174.90784780023782 15.2 174.90784780023782 15.2L 178.4413396749901 15.2Q 178.4413396749901 15.2 178.4413396749901 15.2L 178.4413396749901 15.2L 178.4413396749901 40L 178.4413396749901 40z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask9jh20gmbf)"
                                                pathTo="M 174.90784780023782 40L 174.90784780023782 15.2Q 174.90784780023782 15.2 174.90784780023782 15.2L 178.4413396749901 15.2Q 178.4413396749901 15.2 178.4413396749901 15.2L 178.4413396749901 15.2L 178.4413396749901 40L 178.4413396749901 40z"
                                                pathFrom="M 174.90784780023782 40L 174.90784780023782 40L 178.4413396749901 40L 178.4413396749901 40L 178.4413396749901 40L 178.4413396749901 40L 178.4413396749901 40L 174.90784780023782 40"
                                                cy="15.2" cx="178.4413396749901" j="25"
                                                val="62" barHeight="24.8"
                                                barWidth="3.5334918747522788"></path>
                                            <path id="SvgjsPath5529"
                                                d="M 181.97483154974236 40L 181.97483154974236 19.6Q 181.97483154974236 19.6 181.97483154974236 19.6L 185.50832342449465 19.6Q 185.50832342449465 19.6 185.50832342449465 19.6L 185.50832342449465 19.6L 185.50832342449465 40L 185.50832342449465 40z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask9jh20gmbf)"
                                                pathTo="M 181.97483154974236 40L 181.97483154974236 19.6Q 181.97483154974236 19.6 181.97483154974236 19.6L 185.50832342449465 19.6Q 185.50832342449465 19.6 185.50832342449465 19.6L 185.50832342449465 19.6L 185.50832342449465 40L 185.50832342449465 40z"
                                                pathFrom="M 181.97483154974236 40L 181.97483154974236 40L 185.50832342449465 40L 185.50832342449465 40L 185.50832342449465 40L 185.50832342449465 40L 185.50832342449465 40L 181.97483154974236 40"
                                                cy="19.6" cx="185.50832342449465" j="26"
                                                val="51" barHeight="20.4"
                                                barWidth="3.5334918747522788"></path>
                                            <path id="SvgjsPath5531"
                                                d="M 189.04181529924693 40L 189.04181529924693 26Q 189.04181529924693 26 189.04181529924693 26L 192.57530717399922 26Q 192.57530717399922 26 192.57530717399922 26L 192.57530717399922 26L 192.57530717399922 40L 192.57530717399922 40z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask9jh20gmbf)"
                                                pathTo="M 189.04181529924693 40L 189.04181529924693 26Q 189.04181529924693 26 189.04181529924693 26L 192.57530717399922 26Q 192.57530717399922 26 192.57530717399922 26L 192.57530717399922 26L 192.57530717399922 40L 192.57530717399922 40z"
                                                pathFrom="M 189.04181529924693 40L 189.04181529924693 40L 192.57530717399922 40L 192.57530717399922 40L 192.57530717399922 40L 192.57530717399922 40L 192.57530717399922 40L 189.04181529924693 40"
                                                cy="26" cx="192.57530717399922" j="27"
                                                val="35" barHeight="14"
                                                barWidth="3.5334918747522788"></path>
                                            <path id="SvgjsPath5533"
                                                d="M 196.10879904875148 40L 196.10879904875148 23.6Q 196.10879904875148 23.6 196.10879904875148 23.6L 199.64229092350377 23.6Q 199.64229092350377 23.6 199.64229092350377 23.6L 199.64229092350377 23.6L 199.64229092350377 40L 199.64229092350377 40z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask9jh20gmbf)"
                                                pathTo="M 196.10879904875148 40L 196.10879904875148 23.6Q 196.10879904875148 23.6 196.10879904875148 23.6L 199.64229092350377 23.6Q 199.64229092350377 23.6 199.64229092350377 23.6L 199.64229092350377 23.6L 199.64229092350377 40L 199.64229092350377 40z"
                                                pathFrom="M 196.10879904875148 40L 196.10879904875148 40L 199.64229092350377 40L 199.64229092350377 40L 199.64229092350377 40L 199.64229092350377 40L 199.64229092350377 40L 196.10879904875148 40"
                                                cy="23.6" cx="199.64229092350377" j="28"
                                                val="41" barHeight="16.4"
                                                barWidth="3.5334918747522788"></path>
                                            <path id="SvgjsPath5535"
                                                d="M 203.17578279825602 40L 203.17578279825602 13.2Q 203.17578279825602 13.2 203.17578279825602 13.2L 206.7092746730083 13.2Q 206.7092746730083 13.2 206.7092746730083 13.2L 206.7092746730083 13.2L 206.7092746730083 40L 206.7092746730083 40z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask9jh20gmbf)"
                                                pathTo="M 203.17578279825602 40L 203.17578279825602 13.2Q 203.17578279825602 13.2 203.17578279825602 13.2L 206.7092746730083 13.2Q 206.7092746730083 13.2 206.7092746730083 13.2L 206.7092746730083 13.2L 206.7092746730083 40L 206.7092746730083 40z"
                                                pathFrom="M 203.17578279825602 40L 203.17578279825602 40L 206.7092746730083 40L 206.7092746730083 40L 206.7092746730083 40L 206.7092746730083 40L 206.7092746730083 40L 203.17578279825602 40"
                                                cy="13.2" cx="206.7092746730083" j="29"
                                                val="67" barHeight="26.8"
                                                barWidth="3.5334918747522788"></path>
                                            <g id="SvgjsG5475" class="apexcharts-bar-goals-markers"
                                                style="pointer-events: none">
                                                <g id="SvgjsG5476" className="apexcharts-bar-goals-groups">
                                                </g>
                                                <g id="SvgjsG5478" className="apexcharts-bar-goals-groups">
                                                </g>
                                                <g id="SvgjsG5480" className="apexcharts-bar-goals-groups">
                                                </g>
                                                <g id="SvgjsG5482" className="apexcharts-bar-goals-groups">
                                                </g>
                                                <g id="SvgjsG5484" className="apexcharts-bar-goals-groups">
                                                </g>
                                                <g id="SvgjsG5486" className="apexcharts-bar-goals-groups">
                                                </g>
                                                <g id="SvgjsG5488" className="apexcharts-bar-goals-groups">
                                                </g>
                                                <g id="SvgjsG5490" className="apexcharts-bar-goals-groups">
                                                </g>
                                                <g id="SvgjsG5492" className="apexcharts-bar-goals-groups">
                                                </g>
                                                <g id="SvgjsG5494" className="apexcharts-bar-goals-groups">
                                                </g>
                                                <g id="SvgjsG5496" className="apexcharts-bar-goals-groups">
                                                </g>
                                                <g id="SvgjsG5498" className="apexcharts-bar-goals-groups">
                                                </g>
                                                <g id="SvgjsG5500" className="apexcharts-bar-goals-groups">
                                                </g>
                                                <g id="SvgjsG5502" className="apexcharts-bar-goals-groups">
                                                </g>
                                                <g id="SvgjsG5504" className="apexcharts-bar-goals-groups">
                                                </g>
                                                <g id="SvgjsG5506" className="apexcharts-bar-goals-groups">
                                                </g>
                                                <g id="SvgjsG5508" className="apexcharts-bar-goals-groups">
                                                </g>
                                                <g id="SvgjsG5510" className="apexcharts-bar-goals-groups">
                                                </g>
                                                <g id="SvgjsG5512" className="apexcharts-bar-goals-groups">
                                                </g>
                                                <g id="SvgjsG5514" className="apexcharts-bar-goals-groups">
                                                </g>
                                                <g id="SvgjsG5516" className="apexcharts-bar-goals-groups">
                                                </g>
                                                <g id="SvgjsG5518" className="apexcharts-bar-goals-groups">
                                                </g>
                                                <g id="SvgjsG5520" className="apexcharts-bar-goals-groups">
                                                </g>
                                                <g id="SvgjsG5522" className="apexcharts-bar-goals-groups">
                                                </g>
                                                <g id="SvgjsG5524" className="apexcharts-bar-goals-groups">
                                                </g>
                                                <g id="SvgjsG5526" className="apexcharts-bar-goals-groups">
                                                </g>
                                                <g id="SvgjsG5528" className="apexcharts-bar-goals-groups">
                                                </g>
                                                <g id="SvgjsG5530" className="apexcharts-bar-goals-groups">
                                                </g>
                                                <g id="SvgjsG5532" className="apexcharts-bar-goals-groups">
                                                </g>
                                                <g id="SvgjsG5534" className="apexcharts-bar-goals-groups">
                                                </g>
                                            </g>
                                        </g>
                                        <g id="SvgjsG5474" class="apexcharts-datalabels"
                                            data:realIndex="0"></g>
                                    </g>
                                    <line id="SvgjsLine5555" x1="-7.528735632183908" y1="0"
                                        x2="212.47126436781608" y2="0" stroke="#b6b6b6"
                                        stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                        class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine5556" x1="-7.528735632183908" y1="0"
                                        x2="212.47126436781608" y2="0" stroke-dasharray="0"
                                        stroke-width="0" stroke-linecap="butt"
                                        class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG5557" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG5558" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG5559" class="apexcharts-point-annotations"></g>
                                </g>
                                <g id="SvgjsG5543" class="apexcharts-yaxis" rel="0"
                                    transform="translate(-18, 0)"></g>
                                <g id="SvgjsG5432" class="apexcharts-annotations"></g>
                            </svg>
                            <div class="apexcharts-legend" style="max-height: 20px;"></div>
                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                <div class="apexcharts-tooltip-title"
                                    style="font-family: inherit; font-size: 12px;"></div>
                                <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                        class="apexcharts-tooltip-marker"
                                        style="background-color: rgb(32, 107, 196);"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: inherit; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                <div class="apexcharts-yaxistooltip-text"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row row-cards">
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-blue text-white avatar">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                            width="24" height="24" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2">
                                            </path>
                                            <path d="M12 3v3m0 12v3"></path>
                                        </svg>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        132 Sales
                                    </div>
                                    <div class="text-muted">
                                        12 waiting payments
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-green text-white avatar">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                            width="24" height="24" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="6" cy="19" r="2"></circle>
                                            <circle cx="17" cy="19" r="2"></circle>
                                            <path d="M17 17h-11v-14h-2"></path>
                                            <path d="M6 5l14 1l-1 7h-13"></path>
                                        </svg>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        78 Orders
                                    </div>
                                    <div class="text-muted">
                                        32 shipped
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-twitter text-white avatar">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                            width="24" height="24" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z">
                                            </path>
                                        </svg>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        623 Shares
                                    </div>
                                    <div class="text-muted">
                                        16 today
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-facebook text-white avatar">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                            width="24" height="24" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3">
                                            </path>
                                        </svg>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        132 Likes
                                    </div>
                                    <div class="text-muted">
                                        21 today
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Traffic summary</h3>
                    <div id="chart-mentions" class="chart-lg" style="min-height: 240px;">
                        <div id="apexcharts3b1vzda2"
                            class="apexcharts-canvas apexcharts3b1vzda2 apexcharts-theme-light"
                            style="width: 498px; height: 240px;"><svg id="SvgjsSvg5560" width="498"
                                height="240" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS"
                                transform="translate(0, 0)" style="background: transparent;">
                                <g id="SvgjsG5562" class="apexcharts-inner apexcharts-graphical"
                                    transform="translate(42.203269675925924, 10)">
                                    <defs id="SvgjsDefs5561">
                                        <linearGradient id="SvgjsLinearGradient5567" x1="0"
                                            y1="0" x2="0" y2="1">
                                            <stop id="SvgjsStop5568" stop-opacity="0.4"
                                                stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                            <stop id="SvgjsStop5569" stop-opacity="0.5"
                                                stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                            <stop id="SvgjsStop5570" stop-opacity="0.5"
                                                stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                        </linearGradient>
                                        <clipPath id="gridRectMask3b1vzda2">
                                            <rect id="SvgjsRect5578" width="473.140625" height="199.8"
                                                x="-11.343894675925927" y="0" rx="0"
                                                ry="0" opacity="1" stroke-width="0"
                                                stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="forecastMask3b1vzda2"></clipPath>
                                        <clipPath id="nonForecastMask3b1vzda2"></clipPath>
                                        <clipPath id="gridRectMarkerMask3b1vzda2">
                                            <rect id="SvgjsRect5579" width="454.45283564814815"
                                                height="203.8" x="-2" y="-2"
                                                rx="0" ry="0" opacity="1"
                                                stroke-width="0" stroke="none" stroke-dasharray="0"
                                                fill="#fff"></rect>
                                        </clipPath>
                                    </defs>
                                    <rect id="SvgjsRect5571" width="6.256289384002058" height="199.8"
                                        x="0" y="0" rx="0" ry="0"
                                        opacity="1" stroke-width="0" stroke-dasharray="3"
                                        fill="url(#SvgjsLinearGradient5567)" class="apexcharts-xcrosshairs"
                                        y2="199.8" filter="none" fill-opacity="0.9"></rect>
                                    <g id="SvgjsG5698" class="apexcharts-xaxis"
                                        transform="translate(0, 0)">
                                        <g id="SvgjsG5699" class="apexcharts-xaxis-texts-g"
                                            transform="translate(0, -4)"><text id="SvgjsText5701"
                                                font-family="inherit" x="37.53773630401234" y="228.8"
                                                text-anchor="middle" dominant-baseline="auto"
                                                font-size="12px" font-weight="400" fill="#373d3f"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: inherit;">
                                                <tspan id="SvgjsTspan5702">24 Jun</tspan>
                                                <title>24 Jun</title>
                                            </text><text id="SvgjsText5704" font-family="inherit"
                                                x="125.12578768004117" y="228.8" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-weight="600" fill="#373d3f"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: inherit;">
                                                <tspan id="SvgjsTspan5705">Jul '20</tspan>
                                                <title>Jul '20</title>
                                            </text><text id="SvgjsText5707" font-family="inherit"
                                                x="212.71383905607" y="228.8" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-weight="400" fill="#373d3f"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: inherit;">
                                                <tspan id="SvgjsTspan5708">08 Jul</tspan>
                                                <title>08 Jul</title>
                                            </text><text id="SvgjsText5710" font-family="inherit"
                                                x="312.8144692001029" y="228.8" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-weight="400" fill="#373d3f"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: inherit;">
                                                <tspan id="SvgjsTspan5711">16 Jul</tspan>
                                                <title>16 Jul</title>
                                            </text><text id="SvgjsText5713" font-family="inherit"
                                                x="412.91509934413585" y="228.8" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px"
                                                font-weight="400" fill="#373d3f"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: inherit;">
                                                <tspan id="SvgjsTspan5714">24 Jul</tspan>
                                                <title>24 Jul</title>
                                            </text></g>
                                    </g>
                                    <g id="SvgjsG5735" class="apexcharts-grid">
                                        <g id="SvgjsG5736" class="apexcharts-gridlines-horizontal">
                                            <line id="SvgjsLine5748" x1="-9.343894675925927"
                                                y1="0" x2="459.7967303240741" y2="0"
                                                stroke="#e0e0e0" stroke-dasharray="4"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine5749" x1="-9.343894675925927"
                                                y1="39.96" x2="459.7967303240741" y2="39.96"
                                                stroke="#e0e0e0" stroke-dasharray="4"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine5750" x1="-9.343894675925927"
                                                y1="79.92" x2="459.7967303240741" y2="79.92"
                                                stroke="#e0e0e0" stroke-dasharray="4"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine5751" x1="-9.343894675925927"
                                                y1="119.88" x2="459.7967303240741" y2="119.88"
                                                stroke="#e0e0e0" stroke-dasharray="4"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine5752" x1="-9.343894675925927"
                                                y1="159.84" x2="459.7967303240741" y2="159.84"
                                                stroke="#e0e0e0" stroke-dasharray="4"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine5753" x1="-9.343894675925927"
                                                y1="199.8" x2="459.7967303240741" y2="199.8"
                                                stroke="#e0e0e0" stroke-dasharray="4"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                        </g>
                                        <g id="SvgjsG5737" class="apexcharts-gridlines-vertical">
                                            <line id="SvgjsLine5738" x1="37.53773630401234" y1="0"
                                                x2="37.53773630401234" y2="199.8" stroke="#e0e0e0"
                                                stroke-dasharray="4" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine5740" x1="125.12578768004117"
                                                y1="0" x2="125.12578768004117" y2="199.8"
                                                stroke="#e0e0e0" stroke-dasharray="4"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine5742" x1="212.71383905607" y1="0"
                                                x2="212.71383905607" y2="199.8" stroke="#e0e0e0"
                                                stroke-dasharray="4" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine5744" x1="312.8144692001029" y1="0"
                                                x2="312.8144692001029" y2="199.8" stroke="#e0e0e0"
                                                stroke-dasharray="4" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine5746" x1="412.91509934413585"
                                                y1="0" x2="412.91509934413585" y2="199.8"
                                                stroke="#e0e0e0" stroke-dasharray="4"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                        </g>
                                        <line id="SvgjsLine5739" x1="37.53773630401234" y1="200.8"
                                            x2="37.53773630401234" y2="206.8" stroke="#e0e0e0"
                                            stroke-dasharray="0" stroke-linecap="butt"
                                            class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine5741" x1="125.12578768004117" y1="200.8"
                                            x2="125.12578768004117" y2="206.8" stroke="#e0e0e0"
                                            stroke-dasharray="0" stroke-linecap="butt"
                                            class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine5743" x1="212.71383905607" y1="200.8"
                                            x2="212.71383905607" y2="206.8" stroke="#e0e0e0"
                                            stroke-dasharray="0" stroke-linecap="butt"
                                            class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine5745" x1="312.8144692001029" y1="200.8"
                                            x2="312.8144692001029" y2="206.8" stroke="#e0e0e0"
                                            stroke-dasharray="0" stroke-linecap="butt"
                                            class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine5747" x1="412.91509934413585" y1="200.8"
                                            x2="412.91509934413585" y2="206.8" stroke="#e0e0e0"
                                            stroke-dasharray="0" stroke-linecap="butt"
                                            class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine5755" x1="0" y1="199.8"
                                            x2="450.45283564814815" y2="199.8" stroke="transparent"
                                            stroke-dasharray="0" stroke-linecap="butt"></line>
                                        <line id="SvgjsLine5754" x1="0" y1="1"
                                            x2="0" y2="199.8" stroke="transparent"
                                            stroke-dasharray="0" stroke-linecap="butt"></line>
                                    </g>
                                    <g id="SvgjsG5580" class="apexcharts-bar-series apexcharts-plot-series">
                                        <g id="SvgjsG5581" class="apexcharts-series" seriesName="Web"
                                            rel="1" data:realIndex="0">
                                            <path id="SvgjsPath5583"
                                                d="M -3.128144692001029 199.8L -3.128144692001029 197.80200000000002Q -3.128144692001029 197.80200000000002 -3.128144692001029 197.80200000000002L 3.128144692001029 197.80200000000002Q 3.128144692001029 197.80200000000002 3.128144692001029 197.80200000000002L 3.128144692001029 197.80200000000002L 3.128144692001029 199.8L 3.128144692001029 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M -3.128144692001029 199.8L -3.128144692001029 197.80200000000002Q -3.128144692001029 197.80200000000002 -3.128144692001029 197.80200000000002L 3.128144692001029 197.80200000000002Q 3.128144692001029 197.80200000000002 3.128144692001029 197.80200000000002L 3.128144692001029 197.80200000000002L 3.128144692001029 199.8L 3.128144692001029 199.8z"
                                                pathFrom="M -3.128144692001029 199.8L -3.128144692001029 199.8L 3.128144692001029 199.8L 3.128144692001029 199.8L 3.128144692001029 199.8L 3.128144692001029 199.8L 3.128144692001029 199.8L -3.128144692001029 199.8"
                                                cy="197.80200000000002" cx="3.1281446920010287"
                                                j="0" val="1"
                                                barHeight="1.9980000000000002" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5584"
                                                d="M 9.384434076003087 199.8L 9.384434076003087 199.8Q 9.384434076003087 199.8 9.384434076003087 199.8L 15.640723460005145 199.8Q 15.640723460005145 199.8 15.640723460005145 199.8L 15.640723460005145 199.8L 15.640723460005145 199.8L 15.640723460005145 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 9.384434076003087 199.8L 9.384434076003087 199.8Q 9.384434076003087 199.8 9.384434076003087 199.8L 15.640723460005145 199.8Q 15.640723460005145 199.8 15.640723460005145 199.8L 15.640723460005145 199.8L 15.640723460005145 199.8L 15.640723460005145 199.8z"
                                                pathFrom="M 9.384434076003087 199.8L 9.384434076003087 199.8L 15.640723460005145 199.8L 15.640723460005145 199.8L 15.640723460005145 199.8L 15.640723460005145 199.8L 15.640723460005145 199.8L 9.384434076003087 199.8"
                                                cy="199.8" cx="15.640723460005145" j="1"
                                                val="0" barHeight="0"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5585"
                                                d="M 21.897012844007204 199.8L 21.897012844007204 199.8Q 21.897012844007204 199.8 21.897012844007204 199.8L 28.153302228009263 199.8Q 28.153302228009263 199.8 28.153302228009263 199.8L 28.153302228009263 199.8L 28.153302228009263 199.8L 28.153302228009263 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 21.897012844007204 199.8L 21.897012844007204 199.8Q 21.897012844007204 199.8 21.897012844007204 199.8L 28.153302228009263 199.8Q 28.153302228009263 199.8 28.153302228009263 199.8L 28.153302228009263 199.8L 28.153302228009263 199.8L 28.153302228009263 199.8z"
                                                pathFrom="M 21.897012844007204 199.8L 21.897012844007204 199.8L 28.153302228009263 199.8L 28.153302228009263 199.8L 28.153302228009263 199.8L 28.153302228009263 199.8L 28.153302228009263 199.8L 21.897012844007204 199.8"
                                                cy="199.8" cx="28.15330222800926" j="2"
                                                val="0" barHeight="0"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5586"
                                                d="M 34.40959161201132 199.8L 34.40959161201132 199.8Q 34.40959161201132 199.8 34.40959161201132 199.8L 40.66588099601338 199.8Q 40.66588099601338 199.8 40.66588099601338 199.8L 40.66588099601338 199.8L 40.66588099601338 199.8L 40.66588099601338 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 34.40959161201132 199.8L 34.40959161201132 199.8Q 34.40959161201132 199.8 34.40959161201132 199.8L 40.66588099601338 199.8Q 40.66588099601338 199.8 40.66588099601338 199.8L 40.66588099601338 199.8L 40.66588099601338 199.8L 40.66588099601338 199.8z"
                                                pathFrom="M 34.40959161201132 199.8L 34.40959161201132 199.8L 40.66588099601338 199.8L 40.66588099601338 199.8L 40.66588099601338 199.8L 40.66588099601338 199.8L 40.66588099601338 199.8L 34.40959161201132 199.8"
                                                cy="199.8" cx="40.66588099601338" j="3"
                                                val="0" barHeight="0"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5587"
                                                d="M 46.92217038001544 199.8L 46.92217038001544 199.8Q 46.92217038001544 199.8 46.92217038001544 199.8L 53.1784597640175 199.8Q 53.1784597640175 199.8 53.1784597640175 199.8L 53.1784597640175 199.8L 53.1784597640175 199.8L 53.1784597640175 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 46.92217038001544 199.8L 46.92217038001544 199.8Q 46.92217038001544 199.8 46.92217038001544 199.8L 53.1784597640175 199.8Q 53.1784597640175 199.8 53.1784597640175 199.8L 53.1784597640175 199.8L 53.1784597640175 199.8L 53.1784597640175 199.8z"
                                                pathFrom="M 46.92217038001544 199.8L 46.92217038001544 199.8L 53.1784597640175 199.8L 53.1784597640175 199.8L 53.1784597640175 199.8L 53.1784597640175 199.8L 53.1784597640175 199.8L 46.92217038001544 199.8"
                                                cy="199.8" cx="53.1784597640175" j="4"
                                                val="0" barHeight="0"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5588"
                                                d="M 59.43474914801955 199.8L 59.43474914801955 197.80200000000002Q 59.43474914801955 197.80200000000002 59.43474914801955 197.80200000000002L 65.69103853202161 197.80200000000002Q 65.69103853202161 197.80200000000002 65.69103853202161 197.80200000000002L 65.69103853202161 197.80200000000002L 65.69103853202161 199.8L 65.69103853202161 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 59.43474914801955 199.8L 59.43474914801955 197.80200000000002Q 59.43474914801955 197.80200000000002 59.43474914801955 197.80200000000002L 65.69103853202161 197.80200000000002Q 65.69103853202161 197.80200000000002 65.69103853202161 197.80200000000002L 65.69103853202161 197.80200000000002L 65.69103853202161 199.8L 65.69103853202161 199.8z"
                                                pathFrom="M 59.43474914801955 199.8L 59.43474914801955 199.8L 65.69103853202161 199.8L 65.69103853202161 199.8L 65.69103853202161 199.8L 65.69103853202161 199.8L 65.69103853202161 199.8L 59.43474914801955 199.8"
                                                cy="197.80200000000002" cx="65.69103853202161"
                                                j="5" val="1"
                                                barHeight="1.9980000000000002" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5589"
                                                d="M 71.94732791602367 199.8L 71.94732791602367 197.80200000000002Q 71.94732791602367 197.80200000000002 71.94732791602367 197.80200000000002L 78.20361730002573 197.80200000000002Q 78.20361730002573 197.80200000000002 78.20361730002573 197.80200000000002L 78.20361730002573 197.80200000000002L 78.20361730002573 199.8L 78.20361730002573 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 71.94732791602367 199.8L 71.94732791602367 197.80200000000002Q 71.94732791602367 197.80200000000002 71.94732791602367 197.80200000000002L 78.20361730002573 197.80200000000002Q 78.20361730002573 197.80200000000002 78.20361730002573 197.80200000000002L 78.20361730002573 197.80200000000002L 78.20361730002573 199.8L 78.20361730002573 199.8z"
                                                pathFrom="M 71.94732791602367 199.8L 71.94732791602367 199.8L 78.20361730002573 199.8L 78.20361730002573 199.8L 78.20361730002573 199.8L 78.20361730002573 199.8L 78.20361730002573 199.8L 71.94732791602367 199.8"
                                                cy="197.80200000000002" cx="78.20361730002573"
                                                j="6" val="1"
                                                barHeight="1.9980000000000002" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5590"
                                                d="M 84.45990668402779 199.8L 84.45990668402779 199.8Q 84.45990668402779 199.8 84.45990668402779 199.8L 90.71619606802984 199.8Q 90.71619606802984 199.8 90.71619606802984 199.8L 90.71619606802984 199.8L 90.71619606802984 199.8L 90.71619606802984 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 84.45990668402779 199.8L 84.45990668402779 199.8Q 84.45990668402779 199.8 84.45990668402779 199.8L 90.71619606802984 199.8Q 90.71619606802984 199.8 90.71619606802984 199.8L 90.71619606802984 199.8L 90.71619606802984 199.8L 90.71619606802984 199.8z"
                                                pathFrom="M 84.45990668402779 199.8L 84.45990668402779 199.8L 90.71619606802984 199.8L 90.71619606802984 199.8L 90.71619606802984 199.8L 90.71619606802984 199.8L 90.71619606802984 199.8L 84.45990668402779 199.8"
                                                cy="199.8" cx="90.71619606802984" j="7"
                                                val="0" barHeight="0"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5591"
                                                d="M 96.9724854520319 199.8L 96.9724854520319 199.8Q 96.9724854520319 199.8 96.9724854520319 199.8L 103.22877483603396 199.8Q 103.22877483603396 199.8 103.22877483603396 199.8L 103.22877483603396 199.8L 103.22877483603396 199.8L 103.22877483603396 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 96.9724854520319 199.8L 96.9724854520319 199.8Q 96.9724854520319 199.8 96.9724854520319 199.8L 103.22877483603396 199.8Q 103.22877483603396 199.8 103.22877483603396 199.8L 103.22877483603396 199.8L 103.22877483603396 199.8L 103.22877483603396 199.8z"
                                                pathFrom="M 96.9724854520319 199.8L 96.9724854520319 199.8L 103.22877483603396 199.8L 103.22877483603396 199.8L 103.22877483603396 199.8L 103.22877483603396 199.8L 103.22877483603396 199.8L 96.9724854520319 199.8"
                                                cy="199.8" cx="103.22877483603396" j="8"
                                                val="0" barHeight="0"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5592"
                                                d="M 109.48506422003602 199.8L 109.48506422003602 199.8Q 109.48506422003602 199.8 109.48506422003602 199.8L 115.74135360403808 199.8Q 115.74135360403808 199.8 115.74135360403808 199.8L 115.74135360403808 199.8L 115.74135360403808 199.8L 115.74135360403808 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 109.48506422003602 199.8L 109.48506422003602 199.8Q 109.48506422003602 199.8 109.48506422003602 199.8L 115.74135360403808 199.8Q 115.74135360403808 199.8 115.74135360403808 199.8L 115.74135360403808 199.8L 115.74135360403808 199.8L 115.74135360403808 199.8z"
                                                pathFrom="M 109.48506422003602 199.8L 109.48506422003602 199.8L 115.74135360403808 199.8L 115.74135360403808 199.8L 115.74135360403808 199.8L 115.74135360403808 199.8L 115.74135360403808 199.8L 109.48506422003602 199.8"
                                                cy="199.8" cx="115.74135360403808" j="9"
                                                val="0" barHeight="0"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5593"
                                                d="M 121.99764298804013 199.8L 121.99764298804013 195.804Q 121.99764298804013 195.804 121.99764298804013 195.804L 128.2539323720422 195.804Q 128.2539323720422 195.804 128.2539323720422 195.804L 128.2539323720422 195.804L 128.2539323720422 199.8L 128.2539323720422 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 121.99764298804013 199.8L 121.99764298804013 195.804Q 121.99764298804013 195.804 121.99764298804013 195.804L 128.2539323720422 195.804Q 128.2539323720422 195.804 128.2539323720422 195.804L 128.2539323720422 195.804L 128.2539323720422 199.8L 128.2539323720422 199.8z"
                                                pathFrom="M 121.99764298804013 199.8L 121.99764298804013 199.8L 128.2539323720422 199.8L 128.2539323720422 199.8L 128.2539323720422 199.8L 128.2539323720422 199.8L 128.2539323720422 199.8L 121.99764298804013 199.8"
                                                cy="195.804" cx="128.2539323720422" j="10"
                                                val="2" barHeight="3.9960000000000004"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5594"
                                                d="M 134.51022175604425 199.8L 134.51022175604425 175.824Q 134.51022175604425 175.824 134.51022175604425 175.824L 140.7665111400463 175.824Q 140.7665111400463 175.824 140.7665111400463 175.824L 140.7665111400463 175.824L 140.7665111400463 199.8L 140.7665111400463 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 134.51022175604425 199.8L 134.51022175604425 175.824Q 134.51022175604425 175.824 134.51022175604425 175.824L 140.7665111400463 175.824Q 140.7665111400463 175.824 140.7665111400463 175.824L 140.7665111400463 175.824L 140.7665111400463 199.8L 140.7665111400463 199.8z"
                                                pathFrom="M 134.51022175604425 199.8L 134.51022175604425 199.8L 140.7665111400463 199.8L 140.7665111400463 199.8L 140.7665111400463 199.8L 140.7665111400463 199.8L 140.7665111400463 199.8L 134.51022175604425 199.8"
                                                cy="175.824" cx="140.7665111400463" j="11"
                                                val="12" barHeight="23.976000000000003"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5595"
                                                d="M 147.02280052404836 199.8L 147.02280052404836 189.81Q 147.02280052404836 189.81 147.02280052404836 189.81L 153.27908990805042 189.81Q 153.27908990805042 189.81 153.27908990805042 189.81L 153.27908990805042 189.81L 153.27908990805042 199.8L 153.27908990805042 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 147.02280052404836 199.8L 147.02280052404836 189.81Q 147.02280052404836 189.81 147.02280052404836 189.81L 153.27908990805042 189.81Q 153.27908990805042 189.81 153.27908990805042 189.81L 153.27908990805042 189.81L 153.27908990805042 199.8L 153.27908990805042 199.8z"
                                                pathFrom="M 147.02280052404836 199.8L 147.02280052404836 199.8L 153.27908990805042 199.8L 153.27908990805042 199.8L 153.27908990805042 199.8L 153.27908990805042 199.8L 153.27908990805042 199.8L 147.02280052404836 199.8"
                                                cy="189.81" cx="153.27908990805042" j="12"
                                                val="5" barHeight="9.990000000000002"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5596"
                                                d="M 159.53537929205248 199.8L 159.53537929205248 183.816Q 159.53537929205248 183.816 159.53537929205248 183.816L 165.79166867605454 183.816Q 165.79166867605454 183.816 165.79166867605454 183.816L 165.79166867605454 183.816L 165.79166867605454 199.8L 165.79166867605454 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 159.53537929205248 199.8L 159.53537929205248 183.816Q 159.53537929205248 183.816 159.53537929205248 183.816L 165.79166867605454 183.816Q 165.79166867605454 183.816 165.79166867605454 183.816L 165.79166867605454 183.816L 165.79166867605454 199.8L 165.79166867605454 199.8z"
                                                pathFrom="M 159.53537929205248 199.8L 159.53537929205248 199.8L 165.79166867605454 199.8L 165.79166867605454 199.8L 165.79166867605454 199.8L 165.79166867605454 199.8L 165.79166867605454 199.8L 159.53537929205248 199.8"
                                                cy="183.816" cx="165.79166867605454" j="13"
                                                val="8" barHeight="15.984000000000002"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5597"
                                                d="M 172.0479580600566 199.8L 172.0479580600566 155.844Q 172.0479580600566 155.844 172.0479580600566 155.844L 178.30424744405866 155.844Q 178.30424744405866 155.844 178.30424744405866 155.844L 178.30424744405866 155.844L 178.30424744405866 199.8L 178.30424744405866 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 172.0479580600566 199.8L 172.0479580600566 155.844Q 172.0479580600566 155.844 172.0479580600566 155.844L 178.30424744405866 155.844Q 178.30424744405866 155.844 178.30424744405866 155.844L 178.30424744405866 155.844L 178.30424744405866 199.8L 178.30424744405866 199.8z"
                                                pathFrom="M 172.0479580600566 199.8L 172.0479580600566 199.8L 178.30424744405866 199.8L 178.30424744405866 199.8L 178.30424744405866 199.8L 178.30424744405866 199.8L 178.30424744405866 199.8L 172.0479580600566 199.8"
                                                cy="155.844" cx="178.30424744405866" j="14"
                                                val="22" barHeight="43.956"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5598"
                                                d="M 184.56053682806072 199.8L 184.56053682806072 187.812Q 184.56053682806072 187.812 184.56053682806072 187.812L 190.81682621206278 187.812Q 190.81682621206278 187.812 190.81682621206278 187.812L 190.81682621206278 187.812L 190.81682621206278 199.8L 190.81682621206278 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 184.56053682806072 199.8L 184.56053682806072 187.812Q 184.56053682806072 187.812 184.56053682806072 187.812L 190.81682621206278 187.812Q 190.81682621206278 187.812 190.81682621206278 187.812L 190.81682621206278 187.812L 190.81682621206278 199.8L 190.81682621206278 199.8z"
                                                pathFrom="M 184.56053682806072 199.8L 184.56053682806072 199.8L 190.81682621206278 199.8L 190.81682621206278 199.8L 190.81682621206278 199.8L 190.81682621206278 199.8L 190.81682621206278 199.8L 184.56053682806072 199.8"
                                                cy="187.812" cx="190.81682621206278" j="15"
                                                val="6" barHeight="11.988000000000001"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5599"
                                                d="M 197.07311559606484 199.8L 197.07311559606484 183.816Q 197.07311559606484 183.816 197.07311559606484 183.816L 203.3294049800669 183.816Q 203.3294049800669 183.816 203.3294049800669 183.816L 203.3294049800669 183.816L 203.3294049800669 199.8L 203.3294049800669 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 197.07311559606484 199.8L 197.07311559606484 183.816Q 197.07311559606484 183.816 197.07311559606484 183.816L 203.3294049800669 183.816Q 203.3294049800669 183.816 203.3294049800669 183.816L 203.3294049800669 183.816L 203.3294049800669 199.8L 203.3294049800669 199.8z"
                                                pathFrom="M 197.07311559606484 199.8L 197.07311559606484 199.8L 203.3294049800669 199.8L 203.3294049800669 199.8L 203.3294049800669 199.8L 203.3294049800669 199.8L 203.3294049800669 199.8L 197.07311559606484 199.8"
                                                cy="183.816" cx="203.3294049800669" j="16"
                                                val="8" barHeight="15.984000000000002"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5600"
                                                d="M 209.58569436406896 199.8L 209.58569436406896 187.812Q 209.58569436406896 187.812 209.58569436406896 187.812L 215.84198374807102 187.812Q 215.84198374807102 187.812 215.84198374807102 187.812L 215.84198374807102 187.812L 215.84198374807102 199.8L 215.84198374807102 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 209.58569436406896 199.8L 209.58569436406896 187.812Q 209.58569436406896 187.812 209.58569436406896 187.812L 215.84198374807102 187.812Q 215.84198374807102 187.812 215.84198374807102 187.812L 215.84198374807102 187.812L 215.84198374807102 199.8L 215.84198374807102 199.8z"
                                                pathFrom="M 209.58569436406896 199.8L 209.58569436406896 199.8L 215.84198374807102 199.8L 215.84198374807102 199.8L 215.84198374807102 199.8L 215.84198374807102 199.8L 215.84198374807102 199.8L 209.58569436406896 199.8"
                                                cy="187.812" cx="215.84198374807102" j="17"
                                                val="6" barHeight="11.988000000000001"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5601"
                                                d="M 222.09827313207307 199.8L 222.09827313207307 191.80800000000002Q 222.09827313207307 191.80800000000002 222.09827313207307 191.80800000000002L 228.35456251607513 191.80800000000002Q 228.35456251607513 191.80800000000002 228.35456251607513 191.80800000000002L 228.35456251607513 191.80800000000002L 228.35456251607513 199.8L 228.35456251607513 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 222.09827313207307 199.8L 222.09827313207307 191.80800000000002Q 222.09827313207307 191.80800000000002 222.09827313207307 191.80800000000002L 228.35456251607513 191.80800000000002Q 228.35456251607513 191.80800000000002 228.35456251607513 191.80800000000002L 228.35456251607513 191.80800000000002L 228.35456251607513 199.8L 228.35456251607513 199.8z"
                                                pathFrom="M 222.09827313207307 199.8L 222.09827313207307 199.8L 228.35456251607513 199.8L 228.35456251607513 199.8L 228.35456251607513 199.8L 228.35456251607513 199.8L 228.35456251607513 199.8L 222.09827313207307 199.8"
                                                cy="191.80800000000002" cx="228.35456251607513"
                                                j="18" val="4"
                                                barHeight="7.992000000000001" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5602"
                                                d="M 234.61085190007717 199.8L 234.61085190007717 197.80200000000002Q 234.61085190007717 197.80200000000002 234.61085190007717 197.80200000000002L 240.86714128407922 197.80200000000002Q 240.86714128407922 197.80200000000002 240.86714128407922 197.80200000000002L 240.86714128407922 197.80200000000002L 240.86714128407922 199.8L 240.86714128407922 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 234.61085190007717 199.8L 234.61085190007717 197.80200000000002Q 234.61085190007717 197.80200000000002 234.61085190007717 197.80200000000002L 240.86714128407922 197.80200000000002Q 240.86714128407922 197.80200000000002 240.86714128407922 197.80200000000002L 240.86714128407922 197.80200000000002L 240.86714128407922 199.8L 240.86714128407922 199.8z"
                                                pathFrom="M 234.61085190007717 199.8L 234.61085190007717 199.8L 240.86714128407922 199.8L 240.86714128407922 199.8L 240.86714128407922 199.8L 240.86714128407922 199.8L 240.86714128407922 199.8L 234.61085190007717 199.8"
                                                cy="197.80200000000002" cx="240.86714128407922"
                                                j="19" val="1"
                                                barHeight="1.9980000000000002" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5603"
                                                d="M 247.12343066808128 199.8L 247.12343066808128 183.816Q 247.12343066808128 183.816 247.12343066808128 183.816L 253.37972005208334 183.816Q 253.37972005208334 183.816 253.37972005208334 183.816L 253.37972005208334 183.816L 253.37972005208334 199.8L 253.37972005208334 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 247.12343066808128 199.8L 247.12343066808128 183.816Q 247.12343066808128 183.816 247.12343066808128 183.816L 253.37972005208334 183.816Q 253.37972005208334 183.816 253.37972005208334 183.816L 253.37972005208334 183.816L 253.37972005208334 199.8L 253.37972005208334 199.8z"
                                                pathFrom="M 247.12343066808128 199.8L 247.12343066808128 199.8L 253.37972005208334 199.8L 253.37972005208334 199.8L 253.37972005208334 199.8L 253.37972005208334 199.8L 253.37972005208334 199.8L 247.12343066808128 199.8"
                                                cy="183.816" cx="253.37972005208331" j="20"
                                                val="8" barHeight="15.984000000000002"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5604"
                                                d="M 259.63600943608543 199.8L 259.63600943608543 151.848Q 259.63600943608543 151.848 259.63600943608543 151.848L 265.8922988200875 151.848Q 265.8922988200875 151.848 265.8922988200875 151.848L 265.8922988200875 151.848L 265.8922988200875 199.8L 265.8922988200875 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 259.63600943608543 199.8L 259.63600943608543 151.848Q 259.63600943608543 151.848 259.63600943608543 151.848L 265.8922988200875 151.848Q 265.8922988200875 151.848 265.8922988200875 151.848L 265.8922988200875 151.848L 265.8922988200875 199.8L 265.8922988200875 199.8z"
                                                pathFrom="M 259.63600943608543 199.8L 259.63600943608543 199.8L 265.8922988200875 199.8L 265.8922988200875 199.8L 265.8922988200875 199.8L 265.8922988200875 199.8L 265.8922988200875 199.8L 259.63600943608543 199.8"
                                                cy="151.848" cx="265.8922988200875" j="21"
                                                val="24" barHeight="47.952000000000005"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5605"
                                                d="M 272.14858820408955 199.8L 272.14858820408955 141.858Q 272.14858820408955 141.858 272.14858820408955 141.858L 278.4048775880916 141.858Q 278.4048775880916 141.858 278.4048775880916 141.858L 278.4048775880916 141.858L 278.4048775880916 199.8L 278.4048775880916 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 272.14858820408955 199.8L 272.14858820408955 141.858Q 272.14858820408955 141.858 272.14858820408955 141.858L 278.4048775880916 141.858Q 278.4048775880916 141.858 278.4048775880916 141.858L 278.4048775880916 141.858L 278.4048775880916 199.8L 278.4048775880916 199.8z"
                                                pathFrom="M 272.14858820408955 199.8L 272.14858820408955 199.8L 278.4048775880916 199.8L 278.4048775880916 199.8L 278.4048775880916 199.8L 278.4048775880916 199.8L 278.4048775880916 199.8L 272.14858820408955 199.8"
                                                cy="141.858" cx="278.4048775880916" j="22"
                                                val="29" barHeight="57.94200000000001"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5606"
                                                d="M 284.66116697209367 199.8L 284.66116697209367 97.902Q 284.66116697209367 97.902 284.66116697209367 97.902L 290.9174563560957 97.902Q 290.9174563560957 97.902 290.9174563560957 97.902L 290.9174563560957 97.902L 290.9174563560957 199.8L 290.9174563560957 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 284.66116697209367 199.8L 284.66116697209367 97.902Q 284.66116697209367 97.902 284.66116697209367 97.902L 290.9174563560957 97.902Q 290.9174563560957 97.902 290.9174563560957 97.902L 290.9174563560957 97.902L 290.9174563560957 199.8L 290.9174563560957 199.8z"
                                                pathFrom="M 284.66116697209367 199.8L 284.66116697209367 199.8L 290.9174563560957 199.8L 290.9174563560957 199.8L 290.9174563560957 199.8L 290.9174563560957 199.8L 290.9174563560957 199.8L 284.66116697209367 199.8"
                                                cy="97.902" cx="290.9174563560957" j="23"
                                                val="51" barHeight="101.89800000000001"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5607"
                                                d="M 297.1737457400978 199.8L 297.1737457400978 119.88Q 297.1737457400978 119.88 297.1737457400978 119.88L 303.43003512409985 119.88Q 303.43003512409985 119.88 303.43003512409985 119.88L 303.43003512409985 119.88L 303.43003512409985 199.8L 303.43003512409985 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 297.1737457400978 199.8L 297.1737457400978 119.88Q 297.1737457400978 119.88 297.1737457400978 119.88L 303.43003512409985 119.88Q 303.43003512409985 119.88 303.43003512409985 119.88L 303.43003512409985 119.88L 303.43003512409985 199.8L 303.43003512409985 199.8z"
                                                pathFrom="M 297.1737457400978 199.8L 297.1737457400978 199.8L 303.43003512409985 199.8L 303.43003512409985 199.8L 303.43003512409985 199.8L 303.43003512409985 199.8L 303.43003512409985 199.8L 297.1737457400978 199.8"
                                                cy="119.88" cx="303.43003512409985" j="24"
                                                val="40" barHeight="79.92000000000002"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5608"
                                                d="M 309.6863245081019 199.8L 309.6863245081019 105.894Q 309.6863245081019 105.894 309.6863245081019 105.894L 315.94261389210396 105.894Q 315.94261389210396 105.894 315.94261389210396 105.894L 315.94261389210396 105.894L 315.94261389210396 199.8L 315.94261389210396 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 309.6863245081019 199.8L 309.6863245081019 105.894Q 309.6863245081019 105.894 309.6863245081019 105.894L 315.94261389210396 105.894Q 315.94261389210396 105.894 315.94261389210396 105.894L 315.94261389210396 105.894L 315.94261389210396 199.8L 315.94261389210396 199.8z"
                                                pathFrom="M 309.6863245081019 199.8L 309.6863245081019 199.8L 315.94261389210396 199.8L 315.94261389210396 199.8L 315.94261389210396 199.8L 315.94261389210396 199.8L 315.94261389210396 199.8L 309.6863245081019 199.8"
                                                cy="105.894" cx="315.94261389210396" j="25"
                                                val="47" barHeight="93.906"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5609"
                                                d="M 322.198903276106 199.8L 322.198903276106 153.846Q 322.198903276106 153.846 322.198903276106 153.846L 328.4551926601081 153.846Q 328.4551926601081 153.846 328.4551926601081 153.846L 328.4551926601081 153.846L 328.4551926601081 199.8L 328.4551926601081 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 322.198903276106 199.8L 322.198903276106 153.846Q 322.198903276106 153.846 322.198903276106 153.846L 328.4551926601081 153.846Q 328.4551926601081 153.846 328.4551926601081 153.846L 328.4551926601081 153.846L 328.4551926601081 199.8L 328.4551926601081 199.8z"
                                                pathFrom="M 322.198903276106 199.8L 322.198903276106 199.8L 328.4551926601081 199.8L 328.4551926601081 199.8L 328.4551926601081 199.8L 328.4551926601081 199.8L 328.4551926601081 199.8L 322.198903276106 199.8"
                                                cy="153.846" cx="328.4551926601081" j="26"
                                                val="23" barHeight="45.95400000000001"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5610"
                                                d="M 334.71148204411014 199.8L 334.71148204411014 147.852Q 334.71148204411014 147.852 334.71148204411014 147.852L 340.9677714281122 147.852Q 340.9677714281122 147.852 340.9677714281122 147.852L 340.9677714281122 147.852L 340.9677714281122 199.8L 340.9677714281122 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 334.71148204411014 199.8L 334.71148204411014 147.852Q 334.71148204411014 147.852 334.71148204411014 147.852L 340.9677714281122 147.852Q 340.9677714281122 147.852 340.9677714281122 147.852L 340.9677714281122 147.852L 340.9677714281122 199.8L 340.9677714281122 199.8z"
                                                pathFrom="M 334.71148204411014 199.8L 334.71148204411014 199.8L 340.9677714281122 199.8L 340.9677714281122 199.8L 340.9677714281122 199.8L 340.9677714281122 199.8L 340.9677714281122 199.8L 334.71148204411014 199.8"
                                                cy="147.852" cx="340.9677714281122" j="27"
                                                val="26" barHeight="51.94800000000001"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5611"
                                                d="M 347.22406081211426 199.8L 347.22406081211426 99.89999999999999Q 347.22406081211426 99.89999999999999 347.22406081211426 99.89999999999999L 353.4803501961163 99.89999999999999Q 353.4803501961163 99.89999999999999 353.4803501961163 99.89999999999999L 353.4803501961163 99.89999999999999L 353.4803501961163 199.8L 353.4803501961163 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 347.22406081211426 199.8L 347.22406081211426 99.89999999999999Q 347.22406081211426 99.89999999999999 347.22406081211426 99.89999999999999L 353.4803501961163 99.89999999999999Q 353.4803501961163 99.89999999999999 353.4803501961163 99.89999999999999L 353.4803501961163 99.89999999999999L 353.4803501961163 199.8L 353.4803501961163 199.8z"
                                                pathFrom="M 347.22406081211426 199.8L 347.22406081211426 199.8L 353.4803501961163 199.8L 353.4803501961163 199.8L 353.4803501961163 199.8L 353.4803501961163 199.8L 353.4803501961163 199.8L 347.22406081211426 199.8"
                                                cy="99.89999999999999" cx="353.4803501961163"
                                                j="28" val="50"
                                                barHeight="99.90000000000002" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5612"
                                                d="M 359.7366395801184 199.8L 359.7366395801184 147.852Q 359.7366395801184 147.852 359.7366395801184 147.852L 365.99292896412044 147.852Q 365.99292896412044 147.852 365.99292896412044 147.852L 365.99292896412044 147.852L 365.99292896412044 199.8L 365.99292896412044 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 359.7366395801184 199.8L 359.7366395801184 147.852Q 359.7366395801184 147.852 359.7366395801184 147.852L 365.99292896412044 147.852Q 365.99292896412044 147.852 365.99292896412044 147.852L 365.99292896412044 147.852L 365.99292896412044 199.8L 365.99292896412044 199.8z"
                                                pathFrom="M 359.7366395801184 199.8L 359.7366395801184 199.8L 365.99292896412044 199.8L 365.99292896412044 199.8L 365.99292896412044 199.8L 365.99292896412044 199.8L 365.99292896412044 199.8L 359.7366395801184 199.8"
                                                cy="147.852" cx="365.99292896412044" j="29"
                                                val="26" barHeight="51.94800000000001"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5613"
                                                d="M 372.2492183481225 199.8L 372.2492183481225 117.882Q 372.2492183481225 117.882 372.2492183481225 117.882L 378.50550773212456 117.882Q 378.50550773212456 117.882 378.50550773212456 117.882L 378.50550773212456 117.882L 378.50550773212456 199.8L 378.50550773212456 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 372.2492183481225 199.8L 372.2492183481225 117.882Q 372.2492183481225 117.882 372.2492183481225 117.882L 378.50550773212456 117.882Q 378.50550773212456 117.882 378.50550773212456 117.882L 378.50550773212456 117.882L 378.50550773212456 199.8L 378.50550773212456 199.8z"
                                                pathFrom="M 372.2492183481225 199.8L 372.2492183481225 199.8L 378.50550773212456 199.8L 378.50550773212456 199.8L 378.50550773212456 199.8L 378.50550773212456 199.8L 378.50550773212456 199.8L 372.2492183481225 199.8"
                                                cy="117.882" cx="378.50550773212456" j="30"
                                                val="41" barHeight="81.918"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5614"
                                                d="M 384.7617971161266 199.8L 384.7617971161266 155.844Q 384.7617971161266 155.844 384.7617971161266 155.844L 391.0180865001287 155.844Q 391.0180865001287 155.844 391.0180865001287 155.844L 391.0180865001287 155.844L 391.0180865001287 199.8L 391.0180865001287 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 384.7617971161266 199.8L 384.7617971161266 155.844Q 384.7617971161266 155.844 384.7617971161266 155.844L 391.0180865001287 155.844Q 391.0180865001287 155.844 391.0180865001287 155.844L 391.0180865001287 155.844L 391.0180865001287 199.8L 391.0180865001287 199.8z"
                                                pathFrom="M 384.7617971161266 199.8L 384.7617971161266 199.8L 391.0180865001287 199.8L 391.0180865001287 199.8L 391.0180865001287 199.8L 391.0180865001287 199.8L 391.0180865001287 199.8L 384.7617971161266 199.8"
                                                cy="155.844" cx="391.0180865001287" j="31"
                                                val="22" barHeight="43.956"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5615"
                                                d="M 397.27437588413073 199.8L 397.27437588413073 107.892Q 397.27437588413073 107.892 397.27437588413073 107.892L 403.5306652681328 107.892Q 403.5306652681328 107.892 403.5306652681328 107.892L 403.5306652681328 107.892L 403.5306652681328 199.8L 403.5306652681328 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 397.27437588413073 199.8L 397.27437588413073 107.892Q 397.27437588413073 107.892 397.27437588413073 107.892L 403.5306652681328 107.892Q 403.5306652681328 107.892 403.5306652681328 107.892L 403.5306652681328 107.892L 403.5306652681328 199.8L 403.5306652681328 199.8z"
                                                pathFrom="M 397.27437588413073 199.8L 397.27437588413073 199.8L 403.5306652681328 199.8L 403.5306652681328 199.8L 403.5306652681328 199.8L 403.5306652681328 199.8L 403.5306652681328 199.8L 397.27437588413073 199.8"
                                                cy="107.892" cx="403.5306652681328" j="32"
                                                val="46" barHeight="91.90800000000002"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5616"
                                                d="M 409.78695465213485 199.8L 409.78695465213485 105.894Q 409.78695465213485 105.894 409.78695465213485 105.894L 416.0432440361369 105.894Q 416.0432440361369 105.894 416.0432440361369 105.894L 416.0432440361369 105.894L 416.0432440361369 199.8L 416.0432440361369 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 409.78695465213485 199.8L 409.78695465213485 105.894Q 409.78695465213485 105.894 409.78695465213485 105.894L 416.0432440361369 105.894Q 416.0432440361369 105.894 416.0432440361369 105.894L 416.0432440361369 105.894L 416.0432440361369 199.8L 416.0432440361369 199.8z"
                                                pathFrom="M 409.78695465213485 199.8L 409.78695465213485 199.8L 416.0432440361369 199.8L 416.0432440361369 199.8L 416.0432440361369 199.8L 416.0432440361369 199.8L 416.0432440361369 199.8L 409.78695465213485 199.8"
                                                cy="105.894" cx="416.0432440361369" j="33"
                                                val="47" barHeight="93.906"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5617"
                                                d="M 422.29953342013897 199.8L 422.29953342013897 37.96199999999999Q 422.29953342013897 37.96199999999999 422.29953342013897 37.96199999999999L 428.55582280414103 37.96199999999999Q 428.55582280414103 37.96199999999999 428.55582280414103 37.96199999999999L 428.55582280414103 37.96199999999999L 428.55582280414103 199.8L 428.55582280414103 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 422.29953342013897 199.8L 422.29953342013897 37.96199999999999Q 422.29953342013897 37.96199999999999 422.29953342013897 37.96199999999999L 428.55582280414103 37.96199999999999Q 428.55582280414103 37.96199999999999 428.55582280414103 37.96199999999999L 428.55582280414103 37.96199999999999L 428.55582280414103 199.8L 428.55582280414103 199.8z"
                                                pathFrom="M 422.29953342013897 199.8L 422.29953342013897 199.8L 428.55582280414103 199.8L 428.55582280414103 199.8L 428.55582280414103 199.8L 428.55582280414103 199.8L 428.55582280414103 199.8L 422.29953342013897 199.8"
                                                cy="37.96199999999999" cx="428.55582280414103"
                                                j="34" val="81"
                                                barHeight="161.83800000000002" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5618"
                                                d="M 434.8121121881431 199.8L 434.8121121881431 107.892Q 434.8121121881431 107.892 434.8121121881431 107.892L 441.06840157214515 107.892Q 441.06840157214515 107.892 441.06840157214515 107.892L 441.06840157214515 107.892L 441.06840157214515 199.8L 441.06840157214515 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 434.8121121881431 199.8L 434.8121121881431 107.892Q 434.8121121881431 107.892 434.8121121881431 107.892L 441.06840157214515 107.892Q 441.06840157214515 107.892 441.06840157214515 107.892L 441.06840157214515 107.892L 441.06840157214515 199.8L 441.06840157214515 199.8z"
                                                pathFrom="M 434.8121121881431 199.8L 434.8121121881431 199.8L 441.06840157214515 199.8L 441.06840157214515 199.8L 441.06840157214515 199.8L 441.06840157214515 199.8L 441.06840157214515 199.8L 434.8121121881431 199.8"
                                                cy="107.892" cx="441.06840157214515" j="35"
                                                val="46" barHeight="91.90800000000002"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5619"
                                                d="M 447.3246909561472 199.8L 447.3246909561472 187.812Q 447.3246909561472 187.812 447.3246909561472 187.812L 453.58098034014927 187.812Q 453.58098034014927 187.812 453.58098034014927 187.812L 453.58098034014927 187.812L 453.58098034014927 199.8L 453.58098034014927 199.8z"
                                                fill="rgba(32,107,196,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="0" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 447.3246909561472 199.8L 447.3246909561472 187.812Q 447.3246909561472 187.812 447.3246909561472 187.812L 453.58098034014927 187.812Q 453.58098034014927 187.812 453.58098034014927 187.812L 453.58098034014927 187.812L 453.58098034014927 199.8L 453.58098034014927 199.8z"
                                                pathFrom="M 447.3246909561472 199.8L 447.3246909561472 199.8L 453.58098034014927 199.8L 453.58098034014927 199.8L 453.58098034014927 199.8L 453.58098034014927 199.8L 453.58098034014927 199.8L 447.3246909561472 199.8"
                                                cy="187.812" cx="453.58098034014927" j="36"
                                                val="6" barHeight="11.988000000000001"
                                                barWidth="6.256289384002058"></path>
                                        </g>
                                        <g id="SvgjsG5620" class="apexcharts-series" seriesName="Social"
                                            rel="2" data:realIndex="1">
                                            <path id="SvgjsPath5622"
                                                d="M -3.128144692001029 197.80200000000002L -3.128144692001029 193.806Q -3.128144692001029 193.806 -3.128144692001029 193.806L 3.128144692001029 193.806Q 3.128144692001029 193.806 3.128144692001029 193.806L 3.128144692001029 193.806L 3.128144692001029 197.80200000000002L 3.128144692001029 197.80200000000002z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M -3.128144692001029 197.80200000000002L -3.128144692001029 193.806Q -3.128144692001029 193.806 -3.128144692001029 193.806L 3.128144692001029 193.806Q 3.128144692001029 193.806 3.128144692001029 193.806L 3.128144692001029 193.806L 3.128144692001029 197.80200000000002L 3.128144692001029 197.80200000000002z"
                                                pathFrom="M -3.128144692001029 197.80200000000002L -3.128144692001029 197.80200000000002L 3.128144692001029 197.80200000000002L 3.128144692001029 197.80200000000002L 3.128144692001029 197.80200000000002L 3.128144692001029 197.80200000000002L 3.128144692001029 197.80200000000002L -3.128144692001029 197.80200000000002"
                                                cy="193.806" cx="3.1281446920010287" j="0"
                                                val="2" barHeight="3.9960000000000004"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5623"
                                                d="M 9.384434076003087 199.8L 9.384434076003087 189.81Q 9.384434076003087 189.81 9.384434076003087 189.81L 15.640723460005145 189.81Q 15.640723460005145 189.81 15.640723460005145 189.81L 15.640723460005145 189.81L 15.640723460005145 199.8L 15.640723460005145 199.8z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 9.384434076003087 199.8L 9.384434076003087 189.81Q 9.384434076003087 189.81 9.384434076003087 189.81L 15.640723460005145 189.81Q 15.640723460005145 189.81 15.640723460005145 189.81L 15.640723460005145 189.81L 15.640723460005145 199.8L 15.640723460005145 199.8z"
                                                pathFrom="M 9.384434076003087 199.8L 9.384434076003087 199.8L 15.640723460005145 199.8L 15.640723460005145 199.8L 15.640723460005145 199.8L 15.640723460005145 199.8L 15.640723460005145 199.8L 9.384434076003087 199.8"
                                                cy="189.81" cx="15.640723460005145" j="1"
                                                val="5" barHeight="9.990000000000002"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5624"
                                                d="M 21.897012844007204 199.8L 21.897012844007204 191.80800000000002Q 21.897012844007204 191.80800000000002 21.897012844007204 191.80800000000002L 28.153302228009263 191.80800000000002Q 28.153302228009263 191.80800000000002 28.153302228009263 191.80800000000002L 28.153302228009263 191.80800000000002L 28.153302228009263 199.8L 28.153302228009263 199.8z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 21.897012844007204 199.8L 21.897012844007204 191.80800000000002Q 21.897012844007204 191.80800000000002 21.897012844007204 191.80800000000002L 28.153302228009263 191.80800000000002Q 28.153302228009263 191.80800000000002 28.153302228009263 191.80800000000002L 28.153302228009263 191.80800000000002L 28.153302228009263 199.8L 28.153302228009263 199.8z"
                                                pathFrom="M 21.897012844007204 199.8L 21.897012844007204 199.8L 28.153302228009263 199.8L 28.153302228009263 199.8L 28.153302228009263 199.8L 28.153302228009263 199.8L 28.153302228009263 199.8L 21.897012844007204 199.8"
                                                cy="191.80800000000002" cx="28.15330222800926"
                                                j="2" val="4"
                                                barHeight="7.992000000000001" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5625"
                                                d="M 34.40959161201132 199.8L 34.40959161201132 193.806Q 34.40959161201132 193.806 34.40959161201132 193.806L 40.66588099601338 193.806Q 40.66588099601338 193.806 40.66588099601338 193.806L 40.66588099601338 193.806L 40.66588099601338 199.8L 40.66588099601338 199.8z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 34.40959161201132 199.8L 34.40959161201132 193.806Q 34.40959161201132 193.806 34.40959161201132 193.806L 40.66588099601338 193.806Q 40.66588099601338 193.806 40.66588099601338 193.806L 40.66588099601338 193.806L 40.66588099601338 199.8L 40.66588099601338 199.8z"
                                                pathFrom="M 34.40959161201132 199.8L 34.40959161201132 199.8L 40.66588099601338 199.8L 40.66588099601338 199.8L 40.66588099601338 199.8L 40.66588099601338 199.8L 40.66588099601338 199.8L 34.40959161201132 199.8"
                                                cy="193.806" cx="40.66588099601338" j="3"
                                                val="3" barHeight="5.994000000000001"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5626"
                                                d="M 46.92217038001544 199.8L 46.92217038001544 193.806Q 46.92217038001544 193.806 46.92217038001544 193.806L 53.1784597640175 193.806Q 53.1784597640175 193.806 53.1784597640175 193.806L 53.1784597640175 193.806L 53.1784597640175 199.8L 53.1784597640175 199.8z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 46.92217038001544 199.8L 46.92217038001544 193.806Q 46.92217038001544 193.806 46.92217038001544 193.806L 53.1784597640175 193.806Q 53.1784597640175 193.806 53.1784597640175 193.806L 53.1784597640175 193.806L 53.1784597640175 199.8L 53.1784597640175 199.8z"
                                                pathFrom="M 46.92217038001544 199.8L 46.92217038001544 199.8L 53.1784597640175 199.8L 53.1784597640175 199.8L 53.1784597640175 199.8L 53.1784597640175 199.8L 53.1784597640175 199.8L 46.92217038001544 199.8"
                                                cy="193.806" cx="53.1784597640175" j="4"
                                                val="3" barHeight="5.994000000000001"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5627"
                                                d="M 59.43474914801955 197.80200000000002L 59.43474914801955 195.80400000000003Q 59.43474914801955 195.80400000000003 59.43474914801955 195.80400000000003L 65.69103853202161 195.80400000000003Q 65.69103853202161 195.80400000000003 65.69103853202161 195.80400000000003L 65.69103853202161 195.80400000000003L 65.69103853202161 197.80200000000002L 65.69103853202161 197.80200000000002z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 59.43474914801955 197.80200000000002L 59.43474914801955 195.80400000000003Q 59.43474914801955 195.80400000000003 59.43474914801955 195.80400000000003L 65.69103853202161 195.80400000000003Q 65.69103853202161 195.80400000000003 65.69103853202161 195.80400000000003L 65.69103853202161 195.80400000000003L 65.69103853202161 197.80200000000002L 65.69103853202161 197.80200000000002z"
                                                pathFrom="M 59.43474914801955 197.80200000000002L 59.43474914801955 197.80200000000002L 65.69103853202161 197.80200000000002L 65.69103853202161 197.80200000000002L 65.69103853202161 197.80200000000002L 65.69103853202161 197.80200000000002L 65.69103853202161 197.80200000000002L 59.43474914801955 197.80200000000002"
                                                cy="195.80400000000003" cx="65.69103853202161"
                                                j="5" val="1"
                                                barHeight="1.9980000000000002" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5628"
                                                d="M 71.94732791602367 197.80200000000002L 71.94732791602367 189.81000000000003Q 71.94732791602367 189.81000000000003 71.94732791602367 189.81000000000003L 78.20361730002573 189.81000000000003Q 78.20361730002573 189.81000000000003 78.20361730002573 189.81000000000003L 78.20361730002573 189.81000000000003L 78.20361730002573 197.80200000000002L 78.20361730002573 197.80200000000002z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 71.94732791602367 197.80200000000002L 71.94732791602367 189.81000000000003Q 71.94732791602367 189.81000000000003 71.94732791602367 189.81000000000003L 78.20361730002573 189.81000000000003Q 78.20361730002573 189.81000000000003 78.20361730002573 189.81000000000003L 78.20361730002573 189.81000000000003L 78.20361730002573 197.80200000000002L 78.20361730002573 197.80200000000002z"
                                                pathFrom="M 71.94732791602367 197.80200000000002L 71.94732791602367 197.80200000000002L 78.20361730002573 197.80200000000002L 78.20361730002573 197.80200000000002L 78.20361730002573 197.80200000000002L 78.20361730002573 197.80200000000002L 78.20361730002573 197.80200000000002L 71.94732791602367 197.80200000000002"
                                                cy="189.81000000000003" cx="78.20361730002573"
                                                j="6" val="4"
                                                barHeight="7.992000000000001" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5629"
                                                d="M 84.45990668402779 199.8L 84.45990668402779 185.81400000000002Q 84.45990668402779 185.81400000000002 84.45990668402779 185.81400000000002L 90.71619606802984 185.81400000000002Q 90.71619606802984 185.81400000000002 90.71619606802984 185.81400000000002L 90.71619606802984 185.81400000000002L 90.71619606802984 199.8L 90.71619606802984 199.8z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 84.45990668402779 199.8L 84.45990668402779 185.81400000000002Q 84.45990668402779 185.81400000000002 84.45990668402779 185.81400000000002L 90.71619606802984 185.81400000000002Q 90.71619606802984 185.81400000000002 90.71619606802984 185.81400000000002L 90.71619606802984 185.81400000000002L 90.71619606802984 199.8L 90.71619606802984 199.8z"
                                                pathFrom="M 84.45990668402779 199.8L 84.45990668402779 199.8L 90.71619606802984 199.8L 90.71619606802984 199.8L 90.71619606802984 199.8L 90.71619606802984 199.8L 90.71619606802984 199.8L 84.45990668402779 199.8"
                                                cy="185.81400000000002" cx="90.71619606802984"
                                                j="7" val="7"
                                                barHeight="13.986000000000002" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5630"
                                                d="M 96.9724854520319 199.8L 96.9724854520319 189.81Q 96.9724854520319 189.81 96.9724854520319 189.81L 103.22877483603396 189.81Q 103.22877483603396 189.81 103.22877483603396 189.81L 103.22877483603396 189.81L 103.22877483603396 199.8L 103.22877483603396 199.8z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 96.9724854520319 199.8L 96.9724854520319 189.81Q 96.9724854520319 189.81 96.9724854520319 189.81L 103.22877483603396 189.81Q 103.22877483603396 189.81 103.22877483603396 189.81L 103.22877483603396 189.81L 103.22877483603396 199.8L 103.22877483603396 199.8z"
                                                pathFrom="M 96.9724854520319 199.8L 96.9724854520319 199.8L 103.22877483603396 199.8L 103.22877483603396 199.8L 103.22877483603396 199.8L 103.22877483603396 199.8L 103.22877483603396 199.8L 96.9724854520319 199.8"
                                                cy="189.81" cx="103.22877483603396" j="8"
                                                val="5" barHeight="9.990000000000002"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5631"
                                                d="M 109.48506422003602 199.8L 109.48506422003602 197.80200000000002Q 109.48506422003602 197.80200000000002 109.48506422003602 197.80200000000002L 115.74135360403808 197.80200000000002Q 115.74135360403808 197.80200000000002 115.74135360403808 197.80200000000002L 115.74135360403808 197.80200000000002L 115.74135360403808 199.8L 115.74135360403808 199.8z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 109.48506422003602 199.8L 109.48506422003602 197.80200000000002Q 109.48506422003602 197.80200000000002 109.48506422003602 197.80200000000002L 115.74135360403808 197.80200000000002Q 115.74135360403808 197.80200000000002 115.74135360403808 197.80200000000002L 115.74135360403808 197.80200000000002L 115.74135360403808 199.8L 115.74135360403808 199.8z"
                                                pathFrom="M 109.48506422003602 199.8L 109.48506422003602 199.8L 115.74135360403808 199.8L 115.74135360403808 199.8L 115.74135360403808 199.8L 115.74135360403808 199.8L 115.74135360403808 199.8L 109.48506422003602 199.8"
                                                cy="197.80200000000002" cx="115.74135360403808"
                                                j="9" val="1"
                                                barHeight="1.9980000000000002" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5632"
                                                d="M 121.99764298804013 195.804L 121.99764298804013 191.808Q 121.99764298804013 191.808 121.99764298804013 191.808L 128.2539323720422 191.808Q 128.2539323720422 191.808 128.2539323720422 191.808L 128.2539323720422 191.808L 128.2539323720422 195.804L 128.2539323720422 195.804z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 121.99764298804013 195.804L 121.99764298804013 191.808Q 121.99764298804013 191.808 121.99764298804013 191.808L 128.2539323720422 191.808Q 128.2539323720422 191.808 128.2539323720422 191.808L 128.2539323720422 191.808L 128.2539323720422 195.804L 128.2539323720422 195.804z"
                                                pathFrom="M 121.99764298804013 195.804L 121.99764298804013 195.804L 128.2539323720422 195.804L 128.2539323720422 195.804L 128.2539323720422 195.804L 128.2539323720422 195.804L 128.2539323720422 195.804L 121.99764298804013 195.804"
                                                cy="191.808" cx="128.2539323720422" j="10"
                                                val="2" barHeight="3.9960000000000004"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5633"
                                                d="M 134.51022175604425 175.824L 134.51022175604425 165.834Q 134.51022175604425 165.834 134.51022175604425 165.834L 140.7665111400463 165.834Q 140.7665111400463 165.834 140.7665111400463 165.834L 140.7665111400463 165.834L 140.7665111400463 175.824L 140.7665111400463 175.824z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 134.51022175604425 175.824L 134.51022175604425 165.834Q 134.51022175604425 165.834 134.51022175604425 165.834L 140.7665111400463 165.834Q 140.7665111400463 165.834 140.7665111400463 165.834L 140.7665111400463 165.834L 140.7665111400463 175.824L 140.7665111400463 175.824z"
                                                pathFrom="M 134.51022175604425 175.824L 134.51022175604425 175.824L 140.7665111400463 175.824L 140.7665111400463 175.824L 140.7665111400463 175.824L 140.7665111400463 175.824L 140.7665111400463 175.824L 134.51022175604425 175.824"
                                                cy="165.834" cx="140.7665111400463" j="11"
                                                val="5" barHeight="9.990000000000002"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5634"
                                                d="M 147.02280052404836 189.81L 147.02280052404836 183.816Q 147.02280052404836 183.816 147.02280052404836 183.816L 153.27908990805042 183.816Q 153.27908990805042 183.816 153.27908990805042 183.816L 153.27908990805042 183.816L 153.27908990805042 189.81L 153.27908990805042 189.81z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 147.02280052404836 189.81L 147.02280052404836 183.816Q 147.02280052404836 183.816 147.02280052404836 183.816L 153.27908990805042 183.816Q 153.27908990805042 183.816 153.27908990805042 183.816L 153.27908990805042 183.816L 153.27908990805042 189.81L 153.27908990805042 189.81z"
                                                pathFrom="M 147.02280052404836 189.81L 147.02280052404836 189.81L 153.27908990805042 189.81L 153.27908990805042 189.81L 153.27908990805042 189.81L 153.27908990805042 189.81L 153.27908990805042 189.81L 147.02280052404836 189.81"
                                                cy="183.816" cx="153.27908990805042" j="12"
                                                val="3" barHeight="5.994000000000001"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5635"
                                                d="M 159.53537929205248 183.816L 159.53537929205248 179.82Q 159.53537929205248 179.82 159.53537929205248 179.82L 165.79166867605454 179.82Q 165.79166867605454 179.82 165.79166867605454 179.82L 165.79166867605454 179.82L 165.79166867605454 183.816L 165.79166867605454 183.816z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 159.53537929205248 183.816L 159.53537929205248 179.82Q 159.53537929205248 179.82 159.53537929205248 179.82L 165.79166867605454 179.82Q 165.79166867605454 179.82 165.79166867605454 179.82L 165.79166867605454 179.82L 165.79166867605454 183.816L 165.79166867605454 183.816z"
                                                pathFrom="M 159.53537929205248 183.816L 159.53537929205248 183.816L 165.79166867605454 183.816L 165.79166867605454 183.816L 165.79166867605454 183.816L 165.79166867605454 183.816L 165.79166867605454 183.816L 159.53537929205248 183.816"
                                                cy="179.82" cx="165.79166867605454" j="13"
                                                val="2" barHeight="3.9960000000000004"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5636"
                                                d="M 172.0479580600566 155.844L 172.0479580600566 143.856Q 172.0479580600566 143.856 172.0479580600566 143.856L 178.30424744405866 143.856Q 178.30424744405866 143.856 178.30424744405866 143.856L 178.30424744405866 143.856L 178.30424744405866 155.844L 178.30424744405866 155.844z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 172.0479580600566 155.844L 172.0479580600566 143.856Q 172.0479580600566 143.856 172.0479580600566 143.856L 178.30424744405866 143.856Q 178.30424744405866 143.856 178.30424744405866 143.856L 178.30424744405866 143.856L 178.30424744405866 155.844L 178.30424744405866 155.844z"
                                                pathFrom="M 172.0479580600566 155.844L 172.0479580600566 155.844L 178.30424744405866 155.844L 178.30424744405866 155.844L 178.30424744405866 155.844L 178.30424744405866 155.844L 178.30424744405866 155.844L 172.0479580600566 155.844"
                                                cy="143.856" cx="178.30424744405866" j="14"
                                                val="6" barHeight="11.988000000000001"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5637"
                                                d="M 184.56053682806072 187.812L 184.56053682806072 173.82600000000002Q 184.56053682806072 173.82600000000002 184.56053682806072 173.82600000000002L 190.81682621206278 173.82600000000002Q 190.81682621206278 173.82600000000002 190.81682621206278 173.82600000000002L 190.81682621206278 173.82600000000002L 190.81682621206278 187.812L 190.81682621206278 187.812z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 184.56053682806072 187.812L 184.56053682806072 173.82600000000002Q 184.56053682806072 173.82600000000002 184.56053682806072 173.82600000000002L 190.81682621206278 173.82600000000002Q 190.81682621206278 173.82600000000002 190.81682621206278 173.82600000000002L 190.81682621206278 173.82600000000002L 190.81682621206278 187.812L 190.81682621206278 187.812z"
                                                pathFrom="M 184.56053682806072 187.812L 184.56053682806072 187.812L 190.81682621206278 187.812L 190.81682621206278 187.812L 190.81682621206278 187.812L 190.81682621206278 187.812L 190.81682621206278 187.812L 184.56053682806072 187.812"
                                                cy="173.82600000000002" cx="190.81682621206278"
                                                j="15" val="7"
                                                barHeight="13.986000000000002" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5638"
                                                d="M 197.07311559606484 183.816L 197.07311559606484 169.83Q 197.07311559606484 169.83 197.07311559606484 169.83L 203.3294049800669 169.83Q 203.3294049800669 169.83 203.3294049800669 169.83L 203.3294049800669 169.83L 203.3294049800669 183.816L 203.3294049800669 183.816z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 197.07311559606484 183.816L 197.07311559606484 169.83Q 197.07311559606484 169.83 197.07311559606484 169.83L 203.3294049800669 169.83Q 203.3294049800669 169.83 203.3294049800669 169.83L 203.3294049800669 169.83L 203.3294049800669 183.816L 203.3294049800669 183.816z"
                                                pathFrom="M 197.07311559606484 183.816L 197.07311559606484 183.816L 203.3294049800669 183.816L 203.3294049800669 183.816L 203.3294049800669 183.816L 203.3294049800669 183.816L 203.3294049800669 183.816L 197.07311559606484 183.816"
                                                cy="169.83" cx="203.3294049800669" j="16"
                                                val="7" barHeight="13.986000000000002"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5639"
                                                d="M 209.58569436406896 187.812L 209.58569436406896 185.81400000000002Q 209.58569436406896 185.81400000000002 209.58569436406896 185.81400000000002L 215.84198374807102 185.81400000000002Q 215.84198374807102 185.81400000000002 215.84198374807102 185.81400000000002L 215.84198374807102 185.81400000000002L 215.84198374807102 187.812L 215.84198374807102 187.812z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 209.58569436406896 187.812L 209.58569436406896 185.81400000000002Q 209.58569436406896 185.81400000000002 209.58569436406896 185.81400000000002L 215.84198374807102 185.81400000000002Q 215.84198374807102 185.81400000000002 215.84198374807102 185.81400000000002L 215.84198374807102 185.81400000000002L 215.84198374807102 187.812L 215.84198374807102 187.812z"
                                                pathFrom="M 209.58569436406896 187.812L 209.58569436406896 187.812L 215.84198374807102 187.812L 215.84198374807102 187.812L 215.84198374807102 187.812L 215.84198374807102 187.812L 215.84198374807102 187.812L 209.58569436406896 187.812"
                                                cy="185.81400000000002" cx="215.84198374807102"
                                                j="17" val="1"
                                                barHeight="1.9980000000000002" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5640"
                                                d="M 222.09827313207307 191.80800000000002L 222.09827313207307 181.818Q 222.09827313207307 181.818 222.09827313207307 181.818L 228.35456251607513 181.818Q 228.35456251607513 181.818 228.35456251607513 181.818L 228.35456251607513 181.818L 228.35456251607513 191.80800000000002L 228.35456251607513 191.80800000000002z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 222.09827313207307 191.80800000000002L 222.09827313207307 181.818Q 222.09827313207307 181.818 222.09827313207307 181.818L 228.35456251607513 181.818Q 228.35456251607513 181.818 228.35456251607513 181.818L 228.35456251607513 181.818L 228.35456251607513 191.80800000000002L 228.35456251607513 191.80800000000002z"
                                                pathFrom="M 222.09827313207307 191.80800000000002L 222.09827313207307 191.80800000000002L 228.35456251607513 191.80800000000002L 228.35456251607513 191.80800000000002L 228.35456251607513 191.80800000000002L 228.35456251607513 191.80800000000002L 228.35456251607513 191.80800000000002L 222.09827313207307 191.80800000000002"
                                                cy="181.818" cx="228.35456251607513" j="18"
                                                val="5" barHeight="9.990000000000002"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5641"
                                                d="M 234.61085190007717 197.80200000000002L 234.61085190007717 187.812Q 234.61085190007717 187.812 234.61085190007717 187.812L 240.86714128407922 187.812Q 240.86714128407922 187.812 240.86714128407922 187.812L 240.86714128407922 187.812L 240.86714128407922 197.80200000000002L 240.86714128407922 197.80200000000002z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 234.61085190007717 197.80200000000002L 234.61085190007717 187.812Q 234.61085190007717 187.812 234.61085190007717 187.812L 240.86714128407922 187.812Q 240.86714128407922 187.812 240.86714128407922 187.812L 240.86714128407922 187.812L 240.86714128407922 197.80200000000002L 240.86714128407922 197.80200000000002z"
                                                pathFrom="M 234.61085190007717 197.80200000000002L 234.61085190007717 197.80200000000002L 240.86714128407922 197.80200000000002L 240.86714128407922 197.80200000000002L 240.86714128407922 197.80200000000002L 240.86714128407922 197.80200000000002L 240.86714128407922 197.80200000000002L 234.61085190007717 197.80200000000002"
                                                cy="187.812" cx="240.86714128407922" j="19"
                                                val="5" barHeight="9.990000000000002"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5642"
                                                d="M 247.12343066808128 183.816L 247.12343066808128 179.82Q 247.12343066808128 179.82 247.12343066808128 179.82L 253.37972005208334 179.82Q 253.37972005208334 179.82 253.37972005208334 179.82L 253.37972005208334 179.82L 253.37972005208334 183.816L 253.37972005208334 183.816z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 247.12343066808128 183.816L 247.12343066808128 179.82Q 247.12343066808128 179.82 247.12343066808128 179.82L 253.37972005208334 179.82Q 253.37972005208334 179.82 253.37972005208334 179.82L 253.37972005208334 179.82L 253.37972005208334 183.816L 253.37972005208334 183.816z"
                                                pathFrom="M 247.12343066808128 183.816L 247.12343066808128 183.816L 253.37972005208334 183.816L 253.37972005208334 183.816L 253.37972005208334 183.816L 253.37972005208334 183.816L 253.37972005208334 183.816L 247.12343066808128 183.816"
                                                cy="179.82" cx="253.37972005208331" j="20"
                                                val="2" barHeight="3.9960000000000004"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5643"
                                                d="M 259.63600943608543 151.848L 259.63600943608543 127.87200000000001Q 259.63600943608543 127.87200000000001 259.63600943608543 127.87200000000001L 265.8922988200875 127.87200000000001Q 265.8922988200875 127.87200000000001 265.8922988200875 127.87200000000001L 265.8922988200875 127.87200000000001L 265.8922988200875 151.848L 265.8922988200875 151.848z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 259.63600943608543 151.848L 259.63600943608543 127.87200000000001Q 259.63600943608543 127.87200000000001 259.63600943608543 127.87200000000001L 265.8922988200875 127.87200000000001Q 265.8922988200875 127.87200000000001 265.8922988200875 127.87200000000001L 265.8922988200875 127.87200000000001L 265.8922988200875 151.848L 265.8922988200875 151.848z"
                                                pathFrom="M 259.63600943608543 151.848L 259.63600943608543 151.848L 265.8922988200875 151.848L 265.8922988200875 151.848L 265.8922988200875 151.848L 265.8922988200875 151.848L 265.8922988200875 151.848L 259.63600943608543 151.848"
                                                cy="127.87200000000001" cx="265.8922988200875"
                                                j="21" val="12"
                                                barHeight="23.976000000000003" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5644"
                                                d="M 272.14858820408955 141.858L 272.14858820408955 133.866Q 272.14858820408955 133.866 272.14858820408955 133.866L 278.4048775880916 133.866Q 278.4048775880916 133.866 278.4048775880916 133.866L 278.4048775880916 133.866L 278.4048775880916 141.858L 278.4048775880916 141.858z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 272.14858820408955 141.858L 272.14858820408955 133.866Q 272.14858820408955 133.866 272.14858820408955 133.866L 278.4048775880916 133.866Q 278.4048775880916 133.866 278.4048775880916 133.866L 278.4048775880916 133.866L 278.4048775880916 141.858L 278.4048775880916 141.858z"
                                                pathFrom="M 272.14858820408955 141.858L 272.14858820408955 141.858L 278.4048775880916 141.858L 278.4048775880916 141.858L 278.4048775880916 141.858L 278.4048775880916 141.858L 278.4048775880916 141.858L 272.14858820408955 141.858"
                                                cy="133.866" cx="278.4048775880916" j="22"
                                                val="4" barHeight="7.992000000000001"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5645"
                                                d="M 284.66116697209367 97.902L 284.66116697209367 85.914Q 284.66116697209367 85.914 284.66116697209367 85.914L 290.9174563560957 85.914Q 290.9174563560957 85.914 290.9174563560957 85.914L 290.9174563560957 85.914L 290.9174563560957 97.902L 290.9174563560957 97.902z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 284.66116697209367 97.902L 284.66116697209367 85.914Q 284.66116697209367 85.914 284.66116697209367 85.914L 290.9174563560957 85.914Q 290.9174563560957 85.914 290.9174563560957 85.914L 290.9174563560957 85.914L 290.9174563560957 97.902L 290.9174563560957 97.902z"
                                                pathFrom="M 284.66116697209367 97.902L 284.66116697209367 97.902L 290.9174563560957 97.902L 290.9174563560957 97.902L 290.9174563560957 97.902L 290.9174563560957 97.902L 290.9174563560957 97.902L 284.66116697209367 97.902"
                                                cy="85.914" cx="290.9174563560957" j="23"
                                                val="6" barHeight="11.988000000000001"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5646"
                                                d="M 297.1737457400978 119.88L 297.1737457400978 83.916Q 297.1737457400978 83.916 297.1737457400978 83.916L 303.43003512409985 83.916Q 303.43003512409985 83.916 303.43003512409985 83.916L 303.43003512409985 83.916L 303.43003512409985 119.88L 303.43003512409985 119.88z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 297.1737457400978 119.88L 297.1737457400978 83.916Q 297.1737457400978 83.916 297.1737457400978 83.916L 303.43003512409985 83.916Q 303.43003512409985 83.916 303.43003512409985 83.916L 303.43003512409985 83.916L 303.43003512409985 119.88L 303.43003512409985 119.88z"
                                                pathFrom="M 297.1737457400978 119.88L 297.1737457400978 119.88L 303.43003512409985 119.88L 303.43003512409985 119.88L 303.43003512409985 119.88L 303.43003512409985 119.88L 303.43003512409985 119.88L 297.1737457400978 119.88"
                                                cy="83.916" cx="303.43003512409985" j="24"
                                                val="18" barHeight="35.964000000000006"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5647"
                                                d="M 309.6863245081019 105.894L 309.6863245081019 99.9Q 309.6863245081019 99.9 309.6863245081019 99.9L 315.94261389210396 99.9Q 315.94261389210396 99.9 315.94261389210396 99.9L 315.94261389210396 99.9L 315.94261389210396 105.894L 315.94261389210396 105.894z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 309.6863245081019 105.894L 309.6863245081019 99.9Q 309.6863245081019 99.9 309.6863245081019 99.9L 315.94261389210396 99.9Q 315.94261389210396 99.9 315.94261389210396 99.9L 315.94261389210396 99.9L 315.94261389210396 105.894L 315.94261389210396 105.894z"
                                                pathFrom="M 309.6863245081019 105.894L 309.6863245081019 105.894L 315.94261389210396 105.894L 315.94261389210396 105.894L 315.94261389210396 105.894L 315.94261389210396 105.894L 315.94261389210396 105.894L 309.6863245081019 105.894"
                                                cy="99.9" cx="315.94261389210396" j="25"
                                                val="3" barHeight="5.994000000000001"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5648"
                                                d="M 322.198903276106 153.846L 322.198903276106 143.856Q 322.198903276106 143.856 322.198903276106 143.856L 328.4551926601081 143.856Q 328.4551926601081 143.856 328.4551926601081 143.856L 328.4551926601081 143.856L 328.4551926601081 153.846L 328.4551926601081 153.846z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 322.198903276106 153.846L 322.198903276106 143.856Q 322.198903276106 143.856 322.198903276106 143.856L 328.4551926601081 143.856Q 328.4551926601081 143.856 328.4551926601081 143.856L 328.4551926601081 143.856L 328.4551926601081 153.846L 328.4551926601081 153.846z"
                                                pathFrom="M 322.198903276106 153.846L 322.198903276106 153.846L 328.4551926601081 153.846L 328.4551926601081 153.846L 328.4551926601081 153.846L 328.4551926601081 153.846L 328.4551926601081 153.846L 322.198903276106 153.846"
                                                cy="143.856" cx="328.4551926601081" j="26"
                                                val="5" barHeight="9.990000000000002"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5649"
                                                d="M 334.71148204411014 147.852L 334.71148204411014 143.856Q 334.71148204411014 143.856 334.71148204411014 143.856L 340.9677714281122 143.856Q 340.9677714281122 143.856 340.9677714281122 143.856L 340.9677714281122 143.856L 340.9677714281122 147.852L 340.9677714281122 147.852z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 334.71148204411014 147.852L 334.71148204411014 143.856Q 334.71148204411014 143.856 334.71148204411014 143.856L 340.9677714281122 143.856Q 340.9677714281122 143.856 340.9677714281122 143.856L 340.9677714281122 143.856L 340.9677714281122 147.852L 340.9677714281122 147.852z"
                                                pathFrom="M 334.71148204411014 147.852L 334.71148204411014 147.852L 340.9677714281122 147.852L 340.9677714281122 147.852L 340.9677714281122 147.852L 340.9677714281122 147.852L 340.9677714281122 147.852L 334.71148204411014 147.852"
                                                cy="143.856" cx="340.9677714281122" j="27"
                                                val="2" barHeight="3.9960000000000004"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5650"
                                                d="M 347.22406081211426 99.89999999999999L 347.22406081211426 73.92599999999999Q 347.22406081211426 73.92599999999999 347.22406081211426 73.92599999999999L 353.4803501961163 73.92599999999999Q 353.4803501961163 73.92599999999999 353.4803501961163 73.92599999999999L 353.4803501961163 73.92599999999999L 353.4803501961163 99.89999999999999L 353.4803501961163 99.89999999999999z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 347.22406081211426 99.89999999999999L 347.22406081211426 73.92599999999999Q 347.22406081211426 73.92599999999999 347.22406081211426 73.92599999999999L 353.4803501961163 73.92599999999999Q 353.4803501961163 73.92599999999999 353.4803501961163 73.92599999999999L 353.4803501961163 73.92599999999999L 353.4803501961163 99.89999999999999L 353.4803501961163 99.89999999999999z"
                                                pathFrom="M 347.22406081211426 99.89999999999999L 347.22406081211426 99.89999999999999L 353.4803501961163 99.89999999999999L 353.4803501961163 99.89999999999999L 353.4803501961163 99.89999999999999L 353.4803501961163 99.89999999999999L 353.4803501961163 99.89999999999999L 347.22406081211426 99.89999999999999"
                                                cy="73.92599999999999" cx="353.4803501961163"
                                                j="28" val="13"
                                                barHeight="25.974000000000004" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5651"
                                                d="M 359.7366395801184 147.852L 359.7366395801184 117.882Q 359.7366395801184 117.882 359.7366395801184 117.882L 365.99292896412044 117.882Q 365.99292896412044 117.882 365.99292896412044 117.882L 365.99292896412044 117.882L 365.99292896412044 147.852L 365.99292896412044 147.852z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 359.7366395801184 147.852L 359.7366395801184 117.882Q 359.7366395801184 117.882 359.7366395801184 117.882L 365.99292896412044 117.882Q 365.99292896412044 117.882 365.99292896412044 117.882L 365.99292896412044 117.882L 365.99292896412044 147.852L 365.99292896412044 147.852z"
                                                pathFrom="M 359.7366395801184 147.852L 359.7366395801184 147.852L 365.99292896412044 147.852L 365.99292896412044 147.852L 365.99292896412044 147.852L 365.99292896412044 147.852L 365.99292896412044 147.852L 359.7366395801184 147.852"
                                                cy="117.882" cx="365.99292896412044" j="29"
                                                val="15" barHeight="29.970000000000002"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5652"
                                                d="M 372.2492183481225 117.882L 372.2492183481225 77.922Q 372.2492183481225 77.922 372.2492183481225 77.922L 378.50550773212456 77.922Q 378.50550773212456 77.922 378.50550773212456 77.922L 378.50550773212456 77.922L 378.50550773212456 117.882L 378.50550773212456 117.882z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 372.2492183481225 117.882L 372.2492183481225 77.922Q 372.2492183481225 77.922 372.2492183481225 77.922L 378.50550773212456 77.922Q 378.50550773212456 77.922 378.50550773212456 77.922L 378.50550773212456 77.922L 378.50550773212456 117.882L 378.50550773212456 117.882z"
                                                pathFrom="M 372.2492183481225 117.882L 372.2492183481225 117.882L 378.50550773212456 117.882L 378.50550773212456 117.882L 378.50550773212456 117.882L 378.50550773212456 117.882L 378.50550773212456 117.882L 372.2492183481225 117.882"
                                                cy="77.922" cx="378.50550773212456" j="30"
                                                val="20" barHeight="39.96000000000001"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5653"
                                                d="M 384.7617971161266 155.844L 384.7617971161266 61.93799999999999Q 384.7617971161266 61.93799999999999 384.7617971161266 61.93799999999999L 391.0180865001287 61.93799999999999Q 391.0180865001287 61.93799999999999 391.0180865001287 61.93799999999999L 391.0180865001287 61.93799999999999L 391.0180865001287 155.844L 391.0180865001287 155.844z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 384.7617971161266 155.844L 384.7617971161266 61.93799999999999Q 384.7617971161266 61.93799999999999 384.7617971161266 61.93799999999999L 391.0180865001287 61.93799999999999Q 391.0180865001287 61.93799999999999 391.0180865001287 61.93799999999999L 391.0180865001287 61.93799999999999L 391.0180865001287 155.844L 391.0180865001287 155.844z"
                                                pathFrom="M 384.7617971161266 155.844L 384.7617971161266 155.844L 391.0180865001287 155.844L 391.0180865001287 155.844L 391.0180865001287 155.844L 391.0180865001287 155.844L 391.0180865001287 155.844L 384.7617971161266 155.844"
                                                cy="61.93799999999999" cx="391.0180865001287"
                                                j="31" val="47" barHeight="93.906"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5654"
                                                d="M 397.27437588413073 107.892L 397.27437588413073 71.928Q 397.27437588413073 71.928 397.27437588413073 71.928L 403.5306652681328 71.928Q 403.5306652681328 71.928 403.5306652681328 71.928L 403.5306652681328 71.928L 403.5306652681328 107.892L 403.5306652681328 107.892z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 397.27437588413073 107.892L 397.27437588413073 71.928Q 397.27437588413073 71.928 397.27437588413073 71.928L 403.5306652681328 71.928Q 403.5306652681328 71.928 403.5306652681328 71.928L 403.5306652681328 71.928L 403.5306652681328 107.892L 403.5306652681328 107.892z"
                                                pathFrom="M 397.27437588413073 107.892L 397.27437588413073 107.892L 403.5306652681328 107.892L 403.5306652681328 107.892L 403.5306652681328 107.892L 403.5306652681328 107.892L 403.5306652681328 107.892L 397.27437588413073 107.892"
                                                cy="71.928" cx="403.5306652681328" j="32"
                                                val="18" barHeight="35.964000000000006"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5655"
                                                d="M 409.78695465213485 105.894L 409.78695465213485 75.924Q 409.78695465213485 75.924 409.78695465213485 75.924L 416.0432440361369 75.924Q 416.0432440361369 75.924 416.0432440361369 75.924L 416.0432440361369 75.924L 416.0432440361369 105.894L 416.0432440361369 105.894z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 409.78695465213485 105.894L 409.78695465213485 75.924Q 409.78695465213485 75.924 409.78695465213485 75.924L 416.0432440361369 75.924Q 416.0432440361369 75.924 416.0432440361369 75.924L 416.0432440361369 75.924L 416.0432440361369 105.894L 416.0432440361369 105.894z"
                                                pathFrom="M 409.78695465213485 105.894L 409.78695465213485 105.894L 416.0432440361369 105.894L 416.0432440361369 105.894L 416.0432440361369 105.894L 416.0432440361369 105.894L 416.0432440361369 105.894L 409.78695465213485 105.894"
                                                cy="75.924" cx="416.0432440361369" j="33"
                                                val="15" barHeight="29.970000000000002"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5656"
                                                d="M 422.29953342013897 37.96199999999999L 422.29953342013897 15.983999999999988Q 422.29953342013897 15.983999999999988 422.29953342013897 15.983999999999988L 428.55582280414103 15.983999999999988Q 428.55582280414103 15.983999999999988 428.55582280414103 15.983999999999988L 428.55582280414103 15.983999999999988L 428.55582280414103 37.96199999999999L 428.55582280414103 37.96199999999999z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 422.29953342013897 37.96199999999999L 422.29953342013897 15.983999999999988Q 422.29953342013897 15.983999999999988 422.29953342013897 15.983999999999988L 428.55582280414103 15.983999999999988Q 428.55582280414103 15.983999999999988 428.55582280414103 15.983999999999988L 428.55582280414103 15.983999999999988L 428.55582280414103 37.96199999999999L 428.55582280414103 37.96199999999999z"
                                                pathFrom="M 422.29953342013897 37.96199999999999L 422.29953342013897 37.96199999999999L 428.55582280414103 37.96199999999999L 428.55582280414103 37.96199999999999L 428.55582280414103 37.96199999999999L 428.55582280414103 37.96199999999999L 428.55582280414103 37.96199999999999L 422.29953342013897 37.96199999999999"
                                                cy="15.983999999999988" cx="428.55582280414103"
                                                j="34" val="11" barHeight="21.978"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5657"
                                                d="M 434.8121121881431 107.892L 434.8121121881431 87.91199999999999Q 434.8121121881431 87.91199999999999 434.8121121881431 87.91199999999999L 441.06840157214515 87.91199999999999Q 441.06840157214515 87.91199999999999 441.06840157214515 87.91199999999999L 441.06840157214515 87.91199999999999L 441.06840157214515 107.892L 441.06840157214515 107.892z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 434.8121121881431 107.892L 434.8121121881431 87.91199999999999Q 434.8121121881431 87.91199999999999 434.8121121881431 87.91199999999999L 441.06840157214515 87.91199999999999Q 441.06840157214515 87.91199999999999 441.06840157214515 87.91199999999999L 441.06840157214515 87.91199999999999L 441.06840157214515 107.892L 441.06840157214515 107.892z"
                                                pathFrom="M 434.8121121881431 107.892L 434.8121121881431 107.892L 441.06840157214515 107.892L 441.06840157214515 107.892L 441.06840157214515 107.892L 441.06840157214515 107.892L 441.06840157214515 107.892L 434.8121121881431 107.892"
                                                cy="87.91199999999999" cx="441.06840157214515"
                                                j="35" val="10"
                                                barHeight="19.980000000000004" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5658"
                                                d="M 447.3246909561472 187.812L 447.3246909561472 187.812Q 447.3246909561472 187.812 447.3246909561472 187.812L 453.58098034014927 187.812Q 453.58098034014927 187.812 453.58098034014927 187.812L 453.58098034014927 187.812L 453.58098034014927 187.812L 453.58098034014927 187.812z"
                                                fill="rgba(121,166,220,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="1" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 447.3246909561472 187.812L 447.3246909561472 187.812Q 447.3246909561472 187.812 447.3246909561472 187.812L 453.58098034014927 187.812Q 453.58098034014927 187.812 453.58098034014927 187.812L 453.58098034014927 187.812L 453.58098034014927 187.812L 453.58098034014927 187.812z"
                                                pathFrom="M 447.3246909561472 187.812L 447.3246909561472 187.812L 453.58098034014927 187.812L 453.58098034014927 187.812L 453.58098034014927 187.812L 453.58098034014927 187.812L 453.58098034014927 187.812L 447.3246909561472 187.812"
                                                cy="187.812" cx="453.58098034014927" j="36"
                                                val="0" barHeight="0"
                                                barWidth="6.256289384002058"></path>
                                        </g>
                                        <g id="SvgjsG5659" class="apexcharts-series" seriesName="Other"
                                            rel="3" data:realIndex="2">
                                            <path id="SvgjsPath5661"
                                                d="M -3.128144692001029 193.806L -3.128144692001029 189.81Q -3.128144692001029 189.81 -3.128144692001029 189.81L 3.128144692001029 189.81Q 3.128144692001029 189.81 3.128144692001029 189.81L 3.128144692001029 189.81L 3.128144692001029 193.806L 3.128144692001029 193.806z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M -3.128144692001029 193.806L -3.128144692001029 189.81Q -3.128144692001029 189.81 -3.128144692001029 189.81L 3.128144692001029 189.81Q 3.128144692001029 189.81 3.128144692001029 189.81L 3.128144692001029 189.81L 3.128144692001029 193.806L 3.128144692001029 193.806z"
                                                pathFrom="M -3.128144692001029 193.806L -3.128144692001029 193.806L 3.128144692001029 193.806L 3.128144692001029 193.806L 3.128144692001029 193.806L 3.128144692001029 193.806L 3.128144692001029 193.806L -3.128144692001029 193.806"
                                                cy="189.81" cx="3.1281446920010287" j="0"
                                                val="2" barHeight="3.9960000000000004"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5662"
                                                d="M 9.384434076003087 189.81L 9.384434076003087 171.828Q 9.384434076003087 171.828 9.384434076003087 171.828L 15.640723460005145 171.828Q 15.640723460005145 171.828 15.640723460005145 171.828L 15.640723460005145 171.828L 15.640723460005145 189.81L 15.640723460005145 189.81z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 9.384434076003087 189.81L 9.384434076003087 171.828Q 9.384434076003087 171.828 9.384434076003087 171.828L 15.640723460005145 171.828Q 15.640723460005145 171.828 15.640723460005145 171.828L 15.640723460005145 171.828L 15.640723460005145 189.81L 15.640723460005145 189.81z"
                                                pathFrom="M 9.384434076003087 189.81L 9.384434076003087 189.81L 15.640723460005145 189.81L 15.640723460005145 189.81L 15.640723460005145 189.81L 15.640723460005145 189.81L 15.640723460005145 189.81L 9.384434076003087 189.81"
                                                cy="171.828" cx="15.640723460005145" j="1"
                                                val="9" barHeight="17.982000000000003"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5663"
                                                d="M 21.897012844007204 191.80800000000002L 21.897012844007204 189.81000000000003Q 21.897012844007204 189.81000000000003 21.897012844007204 189.81000000000003L 28.153302228009263 189.81000000000003Q 28.153302228009263 189.81000000000003 28.153302228009263 189.81000000000003L 28.153302228009263 189.81000000000003L 28.153302228009263 191.80800000000002L 28.153302228009263 191.80800000000002z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 21.897012844007204 191.80800000000002L 21.897012844007204 189.81000000000003Q 21.897012844007204 189.81000000000003 21.897012844007204 189.81000000000003L 28.153302228009263 189.81000000000003Q 28.153302228009263 189.81000000000003 28.153302228009263 189.81000000000003L 28.153302228009263 189.81000000000003L 28.153302228009263 191.80800000000002L 28.153302228009263 191.80800000000002z"
                                                pathFrom="M 21.897012844007204 191.80800000000002L 21.897012844007204 191.80800000000002L 28.153302228009263 191.80800000000002L 28.153302228009263 191.80800000000002L 28.153302228009263 191.80800000000002L 28.153302228009263 191.80800000000002L 28.153302228009263 191.80800000000002L 21.897012844007204 191.80800000000002"
                                                cy="189.81000000000003" cx="28.15330222800926"
                                                j="2" val="1"
                                                barHeight="1.9980000000000002" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5664"
                                                d="M 34.40959161201132 193.806L 34.40959161201132 179.82000000000002Q 34.40959161201132 179.82000000000002 34.40959161201132 179.82000000000002L 40.66588099601338 179.82000000000002Q 40.66588099601338 179.82000000000002 40.66588099601338 179.82000000000002L 40.66588099601338 179.82000000000002L 40.66588099601338 193.806L 40.66588099601338 193.806z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 34.40959161201132 193.806L 34.40959161201132 179.82000000000002Q 34.40959161201132 179.82000000000002 34.40959161201132 179.82000000000002L 40.66588099601338 179.82000000000002Q 40.66588099601338 179.82000000000002 40.66588099601338 179.82000000000002L 40.66588099601338 179.82000000000002L 40.66588099601338 193.806L 40.66588099601338 193.806z"
                                                pathFrom="M 34.40959161201132 193.806L 34.40959161201132 193.806L 40.66588099601338 193.806L 40.66588099601338 193.806L 40.66588099601338 193.806L 40.66588099601338 193.806L 40.66588099601338 193.806L 34.40959161201132 193.806"
                                                cy="179.82000000000002" cx="40.66588099601338"
                                                j="3" val="7"
                                                barHeight="13.986000000000002" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5665"
                                                d="M 46.92217038001544 193.806L 46.92217038001544 177.822Q 46.92217038001544 177.822 46.92217038001544 177.822L 53.1784597640175 177.822Q 53.1784597640175 177.822 53.1784597640175 177.822L 53.1784597640175 177.822L 53.1784597640175 193.806L 53.1784597640175 193.806z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 46.92217038001544 193.806L 46.92217038001544 177.822Q 46.92217038001544 177.822 46.92217038001544 177.822L 53.1784597640175 177.822Q 53.1784597640175 177.822 53.1784597640175 177.822L 53.1784597640175 177.822L 53.1784597640175 193.806L 53.1784597640175 193.806z"
                                                pathFrom="M 46.92217038001544 193.806L 46.92217038001544 193.806L 53.1784597640175 193.806L 53.1784597640175 193.806L 53.1784597640175 193.806L 53.1784597640175 193.806L 53.1784597640175 193.806L 46.92217038001544 193.806"
                                                cy="177.822" cx="53.1784597640175" j="4"
                                                val="8" barHeight="15.984000000000002"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5666"
                                                d="M 59.43474914801955 195.80400000000003L 59.43474914801955 189.81000000000003Q 59.43474914801955 189.81000000000003 59.43474914801955 189.81000000000003L 65.69103853202161 189.81000000000003Q 65.69103853202161 189.81000000000003 65.69103853202161 189.81000000000003L 65.69103853202161 189.81000000000003L 65.69103853202161 195.80400000000003L 65.69103853202161 195.80400000000003z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 59.43474914801955 195.80400000000003L 59.43474914801955 189.81000000000003Q 59.43474914801955 189.81000000000003 59.43474914801955 189.81000000000003L 65.69103853202161 189.81000000000003Q 65.69103853202161 189.81000000000003 65.69103853202161 189.81000000000003L 65.69103853202161 189.81000000000003L 65.69103853202161 195.80400000000003L 65.69103853202161 195.80400000000003z"
                                                pathFrom="M 59.43474914801955 195.80400000000003L 59.43474914801955 195.80400000000003L 65.69103853202161 195.80400000000003L 65.69103853202161 195.80400000000003L 65.69103853202161 195.80400000000003L 65.69103853202161 195.80400000000003L 65.69103853202161 195.80400000000003L 59.43474914801955 195.80400000000003"
                                                cy="189.81000000000003" cx="65.69103853202161"
                                                j="5" val="3"
                                                barHeight="5.994000000000001" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5667"
                                                d="M 71.94732791602367 189.81000000000003L 71.94732791602367 177.82200000000003Q 71.94732791602367 177.82200000000003 71.94732791602367 177.82200000000003L 78.20361730002573 177.82200000000003Q 78.20361730002573 177.82200000000003 78.20361730002573 177.82200000000003L 78.20361730002573 177.82200000000003L 78.20361730002573 189.81000000000003L 78.20361730002573 189.81000000000003z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 71.94732791602367 189.81000000000003L 71.94732791602367 177.82200000000003Q 71.94732791602367 177.82200000000003 71.94732791602367 177.82200000000003L 78.20361730002573 177.82200000000003Q 78.20361730002573 177.82200000000003 78.20361730002573 177.82200000000003L 78.20361730002573 177.82200000000003L 78.20361730002573 189.81000000000003L 78.20361730002573 189.81000000000003z"
                                                pathFrom="M 71.94732791602367 189.81000000000003L 71.94732791602367 189.81000000000003L 78.20361730002573 189.81000000000003L 78.20361730002573 189.81000000000003L 78.20361730002573 189.81000000000003L 78.20361730002573 189.81000000000003L 78.20361730002573 189.81000000000003L 71.94732791602367 189.81000000000003"
                                                cy="177.82200000000003" cx="78.20361730002573"
                                                j="6" val="6"
                                                barHeight="11.988000000000001" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5668"
                                                d="M 84.45990668402779 185.81400000000002L 84.45990668402779 175.824Q 84.45990668402779 175.824 84.45990668402779 175.824L 90.71619606802984 175.824Q 90.71619606802984 175.824 90.71619606802984 175.824L 90.71619606802984 175.824L 90.71619606802984 185.81400000000002L 90.71619606802984 185.81400000000002z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 84.45990668402779 185.81400000000002L 84.45990668402779 175.824Q 84.45990668402779 175.824 84.45990668402779 175.824L 90.71619606802984 175.824Q 90.71619606802984 175.824 90.71619606802984 175.824L 90.71619606802984 175.824L 90.71619606802984 185.81400000000002L 90.71619606802984 185.81400000000002z"
                                                pathFrom="M 84.45990668402779 185.81400000000002L 84.45990668402779 185.81400000000002L 90.71619606802984 185.81400000000002L 90.71619606802984 185.81400000000002L 90.71619606802984 185.81400000000002L 90.71619606802984 185.81400000000002L 90.71619606802984 185.81400000000002L 84.45990668402779 185.81400000000002"
                                                cy="175.824" cx="90.71619606802984" j="7"
                                                val="5" barHeight="9.990000000000002"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5669"
                                                d="M 96.9724854520319 189.81L 96.9724854520319 179.82Q 96.9724854520319 179.82 96.9724854520319 179.82L 103.22877483603396 179.82Q 103.22877483603396 179.82 103.22877483603396 179.82L 103.22877483603396 179.82L 103.22877483603396 189.81L 103.22877483603396 189.81z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 96.9724854520319 189.81L 96.9724854520319 179.82Q 96.9724854520319 179.82 96.9724854520319 179.82L 103.22877483603396 179.82Q 103.22877483603396 179.82 103.22877483603396 179.82L 103.22877483603396 179.82L 103.22877483603396 189.81L 103.22877483603396 189.81z"
                                                pathFrom="M 96.9724854520319 189.81L 96.9724854520319 189.81L 103.22877483603396 189.81L 103.22877483603396 189.81L 103.22877483603396 189.81L 103.22877483603396 189.81L 103.22877483603396 189.81L 96.9724854520319 189.81"
                                                cy="179.82" cx="103.22877483603396" j="8"
                                                val="5" barHeight="9.990000000000002"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5670"
                                                d="M 109.48506422003602 197.80200000000002L 109.48506422003602 189.81000000000003Q 109.48506422003602 189.81000000000003 109.48506422003602 189.81000000000003L 115.74135360403808 189.81000000000003Q 115.74135360403808 189.81000000000003 115.74135360403808 189.81000000000003L 115.74135360403808 189.81000000000003L 115.74135360403808 197.80200000000002L 115.74135360403808 197.80200000000002z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 109.48506422003602 197.80200000000002L 109.48506422003602 189.81000000000003Q 109.48506422003602 189.81000000000003 109.48506422003602 189.81000000000003L 115.74135360403808 189.81000000000003Q 115.74135360403808 189.81000000000003 115.74135360403808 189.81000000000003L 115.74135360403808 189.81000000000003L 115.74135360403808 197.80200000000002L 115.74135360403808 197.80200000000002z"
                                                pathFrom="M 109.48506422003602 197.80200000000002L 109.48506422003602 197.80200000000002L 115.74135360403808 197.80200000000002L 115.74135360403808 197.80200000000002L 115.74135360403808 197.80200000000002L 115.74135360403808 197.80200000000002L 115.74135360403808 197.80200000000002L 109.48506422003602 197.80200000000002"
                                                cy="189.81000000000003" cx="115.74135360403808"
                                                j="9" val="4"
                                                barHeight="7.992000000000001" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5671"
                                                d="M 121.99764298804013 191.808L 121.99764298804013 179.82Q 121.99764298804013 179.82 121.99764298804013 179.82L 128.2539323720422 179.82Q 128.2539323720422 179.82 128.2539323720422 179.82L 128.2539323720422 179.82L 128.2539323720422 191.808L 128.2539323720422 191.808z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 121.99764298804013 191.808L 121.99764298804013 179.82Q 121.99764298804013 179.82 121.99764298804013 179.82L 128.2539323720422 179.82Q 128.2539323720422 179.82 128.2539323720422 179.82L 128.2539323720422 179.82L 128.2539323720422 191.808L 128.2539323720422 191.808z"
                                                pathFrom="M 121.99764298804013 191.808L 121.99764298804013 191.808L 128.2539323720422 191.808L 128.2539323720422 191.808L 128.2539323720422 191.808L 128.2539323720422 191.808L 128.2539323720422 191.808L 121.99764298804013 191.808"
                                                cy="179.82" cx="128.2539323720422" j="10"
                                                val="6" barHeight="11.988000000000001"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5672"
                                                d="M 134.51022175604425 165.834L 134.51022175604425 157.842Q 134.51022175604425 157.842 134.51022175604425 157.842L 140.7665111400463 157.842Q 140.7665111400463 157.842 140.7665111400463 157.842L 140.7665111400463 157.842L 140.7665111400463 165.834L 140.7665111400463 165.834z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 134.51022175604425 165.834L 134.51022175604425 157.842Q 134.51022175604425 157.842 134.51022175604425 157.842L 140.7665111400463 157.842Q 140.7665111400463 157.842 140.7665111400463 157.842L 140.7665111400463 157.842L 140.7665111400463 165.834L 140.7665111400463 165.834z"
                                                pathFrom="M 134.51022175604425 165.834L 134.51022175604425 165.834L 140.7665111400463 165.834L 140.7665111400463 165.834L 140.7665111400463 165.834L 140.7665111400463 165.834L 140.7665111400463 165.834L 134.51022175604425 165.834"
                                                cy="157.842" cx="140.7665111400463" j="11"
                                                val="4" barHeight="7.992000000000001"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5673"
                                                d="M 147.02280052404836 183.816L 147.02280052404836 181.818Q 147.02280052404836 181.818 147.02280052404836 181.818L 153.27908990805042 181.818Q 153.27908990805042 181.818 153.27908990805042 181.818L 153.27908990805042 181.818L 153.27908990805042 183.816L 153.27908990805042 183.816z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 147.02280052404836 183.816L 147.02280052404836 181.818Q 147.02280052404836 181.818 147.02280052404836 181.818L 153.27908990805042 181.818Q 153.27908990805042 181.818 153.27908990805042 181.818L 153.27908990805042 181.818L 153.27908990805042 183.816L 153.27908990805042 183.816z"
                                                pathFrom="M 147.02280052404836 183.816L 147.02280052404836 183.816L 153.27908990805042 183.816L 153.27908990805042 183.816L 153.27908990805042 183.816L 153.27908990805042 183.816L 153.27908990805042 183.816L 147.02280052404836 183.816"
                                                cy="181.818" cx="153.27908990805042" j="12"
                                                val="1" barHeight="1.9980000000000002"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5674"
                                                d="M 159.53537929205248 179.82L 159.53537929205248 161.838Q 159.53537929205248 161.838 159.53537929205248 161.838L 165.79166867605454 161.838Q 165.79166867605454 161.838 165.79166867605454 161.838L 165.79166867605454 161.838L 165.79166867605454 179.82L 165.79166867605454 179.82z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 159.53537929205248 179.82L 159.53537929205248 161.838Q 159.53537929205248 161.838 159.53537929205248 161.838L 165.79166867605454 161.838Q 165.79166867605454 161.838 165.79166867605454 161.838L 165.79166867605454 161.838L 165.79166867605454 179.82L 165.79166867605454 179.82z"
                                                pathFrom="M 159.53537929205248 179.82L 159.53537929205248 179.82L 165.79166867605454 179.82L 165.79166867605454 179.82L 165.79166867605454 179.82L 165.79166867605454 179.82L 165.79166867605454 179.82L 159.53537929205248 179.82"
                                                cy="161.838" cx="165.79166867605454" j="13"
                                                val="9" barHeight="17.982000000000003"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5675"
                                                d="M 172.0479580600566 143.856L 172.0479580600566 137.862Q 172.0479580600566 137.862 172.0479580600566 137.862L 178.30424744405866 137.862Q 178.30424744405866 137.862 178.30424744405866 137.862L 178.30424744405866 137.862L 178.30424744405866 143.856L 178.30424744405866 143.856z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 172.0479580600566 143.856L 172.0479580600566 137.862Q 172.0479580600566 137.862 172.0479580600566 137.862L 178.30424744405866 137.862Q 178.30424744405866 137.862 178.30424744405866 137.862L 178.30424744405866 137.862L 178.30424744405866 143.856L 178.30424744405866 143.856z"
                                                pathFrom="M 172.0479580600566 143.856L 172.0479580600566 143.856L 178.30424744405866 143.856L 178.30424744405866 143.856L 178.30424744405866 143.856L 178.30424744405866 143.856L 178.30424744405866 143.856L 172.0479580600566 143.856"
                                                cy="137.862" cx="178.30424744405866" j="14"
                                                val="3" barHeight="5.994000000000001"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5676"
                                                d="M 184.56053682806072 173.82600000000002L 184.56053682806072 161.83800000000002Q 184.56053682806072 161.83800000000002 184.56053682806072 161.83800000000002L 190.81682621206278 161.83800000000002Q 190.81682621206278 161.83800000000002 190.81682621206278 161.83800000000002L 190.81682621206278 161.83800000000002L 190.81682621206278 173.82600000000002L 190.81682621206278 173.82600000000002z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 184.56053682806072 173.82600000000002L 184.56053682806072 161.83800000000002Q 184.56053682806072 161.83800000000002 184.56053682806072 161.83800000000002L 190.81682621206278 161.83800000000002Q 190.81682621206278 161.83800000000002 190.81682621206278 161.83800000000002L 190.81682621206278 161.83800000000002L 190.81682621206278 173.82600000000002L 190.81682621206278 173.82600000000002z"
                                                pathFrom="M 184.56053682806072 173.82600000000002L 184.56053682806072 173.82600000000002L 190.81682621206278 173.82600000000002L 190.81682621206278 173.82600000000002L 190.81682621206278 173.82600000000002L 190.81682621206278 173.82600000000002L 190.81682621206278 173.82600000000002L 184.56053682806072 173.82600000000002"
                                                cy="161.83800000000002" cx="190.81682621206278"
                                                j="15" val="6"
                                                barHeight="11.988000000000001" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5677"
                                                d="M 197.07311559606484 169.83L 197.07311559606484 155.84400000000002Q 197.07311559606484 155.84400000000002 197.07311559606484 155.84400000000002L 203.3294049800669 155.84400000000002Q 203.3294049800669 155.84400000000002 203.3294049800669 155.84400000000002L 203.3294049800669 155.84400000000002L 203.3294049800669 169.83L 203.3294049800669 169.83z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 197.07311559606484 169.83L 197.07311559606484 155.84400000000002Q 197.07311559606484 155.84400000000002 197.07311559606484 155.84400000000002L 203.3294049800669 155.84400000000002Q 203.3294049800669 155.84400000000002 203.3294049800669 155.84400000000002L 203.3294049800669 155.84400000000002L 203.3294049800669 169.83L 203.3294049800669 169.83z"
                                                pathFrom="M 197.07311559606484 169.83L 197.07311559606484 169.83L 203.3294049800669 169.83L 203.3294049800669 169.83L 203.3294049800669 169.83L 203.3294049800669 169.83L 203.3294049800669 169.83L 197.07311559606484 169.83"
                                                cy="155.84400000000002" cx="203.3294049800669"
                                                j="16" val="7"
                                                barHeight="13.986000000000002" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5678"
                                                d="M 209.58569436406896 185.81400000000002L 209.58569436406896 175.824Q 209.58569436406896 175.824 209.58569436406896 175.824L 215.84198374807102 175.824Q 215.84198374807102 175.824 215.84198374807102 175.824L 215.84198374807102 175.824L 215.84198374807102 185.81400000000002L 215.84198374807102 185.81400000000002z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 209.58569436406896 185.81400000000002L 209.58569436406896 175.824Q 209.58569436406896 175.824 209.58569436406896 175.824L 215.84198374807102 175.824Q 215.84198374807102 175.824 215.84198374807102 175.824L 215.84198374807102 175.824L 215.84198374807102 185.81400000000002L 215.84198374807102 185.81400000000002z"
                                                pathFrom="M 209.58569436406896 185.81400000000002L 209.58569436406896 185.81400000000002L 215.84198374807102 185.81400000000002L 215.84198374807102 185.81400000000002L 215.84198374807102 185.81400000000002L 215.84198374807102 185.81400000000002L 215.84198374807102 185.81400000000002L 209.58569436406896 185.81400000000002"
                                                cy="175.824" cx="215.84198374807102" j="17"
                                                val="5" barHeight="9.990000000000002"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5679"
                                                d="M 222.09827313207307 181.818L 222.09827313207307 177.822Q 222.09827313207307 177.822 222.09827313207307 177.822L 228.35456251607513 177.822Q 228.35456251607513 177.822 228.35456251607513 177.822L 228.35456251607513 177.822L 228.35456251607513 181.818L 228.35456251607513 181.818z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 222.09827313207307 181.818L 222.09827313207307 177.822Q 222.09827313207307 177.822 222.09827313207307 177.822L 228.35456251607513 177.822Q 228.35456251607513 177.822 228.35456251607513 177.822L 228.35456251607513 177.822L 228.35456251607513 181.818L 228.35456251607513 181.818z"
                                                pathFrom="M 222.09827313207307 181.818L 222.09827313207307 181.818L 228.35456251607513 181.818L 228.35456251607513 181.818L 228.35456251607513 181.818L 228.35456251607513 181.818L 228.35456251607513 181.818L 222.09827313207307 181.818"
                                                cy="177.822" cx="228.35456251607513" j="18"
                                                val="2" barHeight="3.9960000000000004"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5680"
                                                d="M 234.61085190007717 187.812L 234.61085190007717 171.828Q 234.61085190007717 171.828 234.61085190007717 171.828L 240.86714128407922 171.828Q 240.86714128407922 171.828 240.86714128407922 171.828L 240.86714128407922 171.828L 240.86714128407922 187.812L 240.86714128407922 187.812z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 234.61085190007717 187.812L 234.61085190007717 171.828Q 234.61085190007717 171.828 234.61085190007717 171.828L 240.86714128407922 171.828Q 240.86714128407922 171.828 240.86714128407922 171.828L 240.86714128407922 171.828L 240.86714128407922 187.812L 240.86714128407922 187.812z"
                                                pathFrom="M 234.61085190007717 187.812L 234.61085190007717 187.812L 240.86714128407922 187.812L 240.86714128407922 187.812L 240.86714128407922 187.812L 240.86714128407922 187.812L 240.86714128407922 187.812L 234.61085190007717 187.812"
                                                cy="171.828" cx="240.86714128407922" j="19"
                                                val="8" barHeight="15.984000000000002"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5681"
                                                d="M 247.12343066808128 179.82L 247.12343066808128 171.828Q 247.12343066808128 171.828 247.12343066808128 171.828L 253.37972005208334 171.828Q 253.37972005208334 171.828 253.37972005208334 171.828L 253.37972005208334 171.828L 253.37972005208334 179.82L 253.37972005208334 179.82z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 247.12343066808128 179.82L 247.12343066808128 171.828Q 247.12343066808128 171.828 247.12343066808128 171.828L 253.37972005208334 171.828Q 253.37972005208334 171.828 253.37972005208334 171.828L 253.37972005208334 171.828L 253.37972005208334 179.82L 253.37972005208334 179.82z"
                                                pathFrom="M 247.12343066808128 179.82L 247.12343066808128 179.82L 253.37972005208334 179.82L 253.37972005208334 179.82L 253.37972005208334 179.82L 253.37972005208334 179.82L 253.37972005208334 179.82L 247.12343066808128 179.82"
                                                cy="171.828" cx="253.37972005208331" j="20"
                                                val="4" barHeight="7.992000000000001"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5682"
                                                d="M 259.63600943608543 127.87200000000001L 259.63600943608543 109.89000000000001Q 259.63600943608543 109.89000000000001 259.63600943608543 109.89000000000001L 265.8922988200875 109.89000000000001Q 265.8922988200875 109.89000000000001 265.8922988200875 109.89000000000001L 265.8922988200875 109.89000000000001L 265.8922988200875 127.87200000000001L 265.8922988200875 127.87200000000001z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 259.63600943608543 127.87200000000001L 259.63600943608543 109.89000000000001Q 259.63600943608543 109.89000000000001 259.63600943608543 109.89000000000001L 265.8922988200875 109.89000000000001Q 265.8922988200875 109.89000000000001 265.8922988200875 109.89000000000001L 265.8922988200875 109.89000000000001L 265.8922988200875 127.87200000000001L 265.8922988200875 127.87200000000001z"
                                                pathFrom="M 259.63600943608543 127.87200000000001L 259.63600943608543 127.87200000000001L 265.8922988200875 127.87200000000001L 265.8922988200875 127.87200000000001L 265.8922988200875 127.87200000000001L 265.8922988200875 127.87200000000001L 265.8922988200875 127.87200000000001L 259.63600943608543 127.87200000000001"
                                                cy="109.89000000000001" cx="265.8922988200875"
                                                j="21" val="9"
                                                barHeight="17.982000000000003" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5683"
                                                d="M 272.14858820408955 133.866L 272.14858820408955 131.86800000000002Q 272.14858820408955 131.86800000000002 272.14858820408955 131.86800000000002L 278.4048775880916 131.86800000000002Q 278.4048775880916 131.86800000000002 278.4048775880916 131.86800000000002L 278.4048775880916 131.86800000000002L 278.4048775880916 133.866L 278.4048775880916 133.866z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 272.14858820408955 133.866L 272.14858820408955 131.86800000000002Q 272.14858820408955 131.86800000000002 272.14858820408955 131.86800000000002L 278.4048775880916 131.86800000000002Q 278.4048775880916 131.86800000000002 278.4048775880916 131.86800000000002L 278.4048775880916 131.86800000000002L 278.4048775880916 133.866L 278.4048775880916 133.866z"
                                                pathFrom="M 272.14858820408955 133.866L 272.14858820408955 133.866L 278.4048775880916 133.866L 278.4048775880916 133.866L 278.4048775880916 133.866L 278.4048775880916 133.866L 278.4048775880916 133.866L 272.14858820408955 133.866"
                                                cy="131.86800000000002" cx="278.4048775880916"
                                                j="22" val="1"
                                                barHeight="1.9980000000000002" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5684"
                                                d="M 284.66116697209367 85.914L 284.66116697209367 81.918Q 284.66116697209367 81.918 284.66116697209367 81.918L 290.9174563560957 81.918Q 290.9174563560957 81.918 290.9174563560957 81.918L 290.9174563560957 81.918L 290.9174563560957 85.914L 290.9174563560957 85.914z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 284.66116697209367 85.914L 284.66116697209367 81.918Q 284.66116697209367 81.918 284.66116697209367 81.918L 290.9174563560957 81.918Q 290.9174563560957 81.918 290.9174563560957 81.918L 290.9174563560957 81.918L 290.9174563560957 85.914L 290.9174563560957 85.914z"
                                                pathFrom="M 284.66116697209367 85.914L 284.66116697209367 85.914L 290.9174563560957 85.914L 290.9174563560957 85.914L 290.9174563560957 85.914L 290.9174563560957 85.914L 290.9174563560957 85.914L 284.66116697209367 85.914"
                                                cy="81.918" cx="290.9174563560957" j="23"
                                                val="2" barHeight="3.9960000000000004"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5685"
                                                d="M 297.1737457400978 83.916L 297.1737457400978 71.928Q 297.1737457400978 71.928 297.1737457400978 71.928L 303.43003512409985 71.928Q 303.43003512409985 71.928 303.43003512409985 71.928L 303.43003512409985 71.928L 303.43003512409985 83.916L 303.43003512409985 83.916z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 297.1737457400978 83.916L 297.1737457400978 71.928Q 297.1737457400978 71.928 297.1737457400978 71.928L 303.43003512409985 71.928Q 303.43003512409985 71.928 303.43003512409985 71.928L 303.43003512409985 71.928L 303.43003512409985 83.916L 303.43003512409985 83.916z"
                                                pathFrom="M 297.1737457400978 83.916L 297.1737457400978 83.916L 303.43003512409985 83.916L 303.43003512409985 83.916L 303.43003512409985 83.916L 303.43003512409985 83.916L 303.43003512409985 83.916L 297.1737457400978 83.916"
                                                cy="71.928" cx="303.43003512409985" j="24"
                                                val="6" barHeight="11.988000000000001"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5686"
                                                d="M 309.6863245081019 99.9L 309.6863245081019 85.914Q 309.6863245081019 85.914 309.6863245081019 85.914L 315.94261389210396 85.914Q 315.94261389210396 85.914 315.94261389210396 85.914L 315.94261389210396 85.914L 315.94261389210396 99.9L 315.94261389210396 99.9z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 309.6863245081019 99.9L 309.6863245081019 85.914Q 309.6863245081019 85.914 309.6863245081019 85.914L 315.94261389210396 85.914Q 315.94261389210396 85.914 315.94261389210396 85.914L 315.94261389210396 85.914L 315.94261389210396 99.9L 315.94261389210396 99.9z"
                                                pathFrom="M 309.6863245081019 99.9L 309.6863245081019 99.9L 315.94261389210396 99.9L 315.94261389210396 99.9L 315.94261389210396 99.9L 315.94261389210396 99.9L 315.94261389210396 99.9L 309.6863245081019 99.9"
                                                cy="85.914" cx="315.94261389210396" j="25"
                                                val="7" barHeight="13.986000000000002"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5687"
                                                d="M 322.198903276106 143.856L 322.198903276106 133.86599999999999Q 322.198903276106 133.86599999999999 322.198903276106 133.86599999999999L 328.4551926601081 133.86599999999999Q 328.4551926601081 133.86599999999999 328.4551926601081 133.86599999999999L 328.4551926601081 133.86599999999999L 328.4551926601081 143.856L 328.4551926601081 143.856z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 322.198903276106 143.856L 322.198903276106 133.86599999999999Q 322.198903276106 133.86599999999999 322.198903276106 133.86599999999999L 328.4551926601081 133.86599999999999Q 328.4551926601081 133.86599999999999 328.4551926601081 133.86599999999999L 328.4551926601081 133.86599999999999L 328.4551926601081 143.856L 328.4551926601081 143.856z"
                                                pathFrom="M 322.198903276106 143.856L 322.198903276106 143.856L 328.4551926601081 143.856L 328.4551926601081 143.856L 328.4551926601081 143.856L 328.4551926601081 143.856L 328.4551926601081 143.856L 322.198903276106 143.856"
                                                cy="133.86599999999999" cx="328.4551926601081"
                                                j="26" val="5"
                                                barHeight="9.990000000000002" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5688"
                                                d="M 334.71148204411014 143.856L 334.71148204411014 141.858Q 334.71148204411014 141.858 334.71148204411014 141.858L 340.9677714281122 141.858Q 340.9677714281122 141.858 340.9677714281122 141.858L 340.9677714281122 141.858L 340.9677714281122 143.856L 340.9677714281122 143.856z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 334.71148204411014 143.856L 334.71148204411014 141.858Q 334.71148204411014 141.858 334.71148204411014 141.858L 340.9677714281122 141.858Q 340.9677714281122 141.858 340.9677714281122 141.858L 340.9677714281122 141.858L 340.9677714281122 143.856L 340.9677714281122 143.856z"
                                                pathFrom="M 334.71148204411014 143.856L 334.71148204411014 143.856L 340.9677714281122 143.856L 340.9677714281122 143.856L 340.9677714281122 143.856L 340.9677714281122 143.856L 340.9677714281122 143.856L 334.71148204411014 143.856"
                                                cy="141.858" cx="340.9677714281122" j="27"
                                                val="1" barHeight="1.9980000000000002"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5689"
                                                d="M 347.22406081211426 73.92599999999999L 347.22406081211426 57.941999999999986Q 347.22406081211426 57.941999999999986 347.22406081211426 57.941999999999986L 353.4803501961163 57.941999999999986Q 353.4803501961163 57.941999999999986 353.4803501961163 57.941999999999986L 353.4803501961163 57.941999999999986L 353.4803501961163 73.92599999999999L 353.4803501961163 73.92599999999999z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 347.22406081211426 73.92599999999999L 347.22406081211426 57.941999999999986Q 347.22406081211426 57.941999999999986 347.22406081211426 57.941999999999986L 353.4803501961163 57.941999999999986Q 353.4803501961163 57.941999999999986 353.4803501961163 57.941999999999986L 353.4803501961163 57.941999999999986L 353.4803501961163 73.92599999999999L 353.4803501961163 73.92599999999999z"
                                                pathFrom="M 347.22406081211426 73.92599999999999L 347.22406081211426 73.92599999999999L 353.4803501961163 73.92599999999999L 353.4803501961163 73.92599999999999L 353.4803501961163 73.92599999999999L 353.4803501961163 73.92599999999999L 353.4803501961163 73.92599999999999L 347.22406081211426 73.92599999999999"
                                                cy="57.941999999999986" cx="353.4803501961163"
                                                j="28" val="8"
                                                barHeight="15.984000000000002" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5690"
                                                d="M 359.7366395801184 117.882L 359.7366395801184 111.888Q 359.7366395801184 111.888 359.7366395801184 111.888L 365.99292896412044 111.888Q 365.99292896412044 111.888 365.99292896412044 111.888L 365.99292896412044 111.888L 365.99292896412044 117.882L 365.99292896412044 117.882z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 359.7366395801184 117.882L 359.7366395801184 111.888Q 359.7366395801184 111.888 359.7366395801184 111.888L 365.99292896412044 111.888Q 365.99292896412044 111.888 365.99292896412044 111.888L 365.99292896412044 111.888L 365.99292896412044 117.882L 365.99292896412044 117.882z"
                                                pathFrom="M 359.7366395801184 117.882L 359.7366395801184 117.882L 365.99292896412044 117.882L 365.99292896412044 117.882L 365.99292896412044 117.882L 365.99292896412044 117.882L 365.99292896412044 117.882L 359.7366395801184 117.882"
                                                cy="111.888" cx="365.99292896412044" j="29"
                                                val="3" barHeight="5.994000000000001"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5691"
                                                d="M 372.2492183481225 77.922L 372.2492183481225 73.926Q 372.2492183481225 73.926 372.2492183481225 73.926L 378.50550773212456 73.926Q 378.50550773212456 73.926 378.50550773212456 73.926L 378.50550773212456 73.926L 378.50550773212456 77.922L 378.50550773212456 77.922z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 372.2492183481225 77.922L 372.2492183481225 73.926Q 372.2492183481225 73.926 372.2492183481225 73.926L 378.50550773212456 73.926Q 378.50550773212456 73.926 378.50550773212456 73.926L 378.50550773212456 73.926L 378.50550773212456 77.922L 378.50550773212456 77.922z"
                                                pathFrom="M 372.2492183481225 77.922L 372.2492183481225 77.922L 378.50550773212456 77.922L 378.50550773212456 77.922L 378.50550773212456 77.922L 378.50550773212456 77.922L 378.50550773212456 77.922L 372.2492183481225 77.922"
                                                cy="73.926" cx="378.50550773212456" j="30"
                                                val="2" barHeight="3.9960000000000004"
                                                barWidth="6.256289384002058"></path>
                                            <path id="SvgjsPath5692"
                                                d="M 384.7617971161266 61.93799999999999L 384.7617971161266 55.94399999999999Q 384.7617971161266 55.94399999999999 384.7617971161266 55.94399999999999L 391.0180865001287 55.94399999999999Q 391.0180865001287 55.94399999999999 391.0180865001287 55.94399999999999L 391.0180865001287 55.94399999999999L 391.0180865001287 61.93799999999999L 391.0180865001287 61.93799999999999z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 384.7617971161266 61.93799999999999L 384.7617971161266 55.94399999999999Q 384.7617971161266 55.94399999999999 384.7617971161266 55.94399999999999L 391.0180865001287 55.94399999999999Q 391.0180865001287 55.94399999999999 391.0180865001287 55.94399999999999L 391.0180865001287 55.94399999999999L 391.0180865001287 61.93799999999999L 391.0180865001287 61.93799999999999z"
                                                pathFrom="M 384.7617971161266 61.93799999999999L 384.7617971161266 61.93799999999999L 391.0180865001287 61.93799999999999L 391.0180865001287 61.93799999999999L 391.0180865001287 61.93799999999999L 391.0180865001287 61.93799999999999L 391.0180865001287 61.93799999999999L 384.7617971161266 61.93799999999999"
                                                cy="55.94399999999999" cx="391.0180865001287"
                                                j="31" val="3"
                                                barHeight="5.994000000000001" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5693"
                                                d="M 397.27437588413073 71.928L 397.27437588413073 63.93599999999999Q 397.27437588413073 63.93599999999999 397.27437588413073 63.93599999999999L 403.5306652681328 63.93599999999999Q 403.5306652681328 63.93599999999999 403.5306652681328 63.93599999999999L 403.5306652681328 63.93599999999999L 403.5306652681328 71.928L 403.5306652681328 71.928z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 397.27437588413073 71.928L 397.27437588413073 63.93599999999999Q 397.27437588413073 63.93599999999999 397.27437588413073 63.93599999999999L 403.5306652681328 63.93599999999999Q 403.5306652681328 63.93599999999999 403.5306652681328 63.93599999999999L 403.5306652681328 63.93599999999999L 403.5306652681328 71.928L 403.5306652681328 71.928z"
                                                pathFrom="M 397.27437588413073 71.928L 397.27437588413073 71.928L 403.5306652681328 71.928L 403.5306652681328 71.928L 403.5306652681328 71.928L 403.5306652681328 71.928L 403.5306652681328 71.928L 397.27437588413073 71.928"
                                                cy="63.93599999999999" cx="403.5306652681328"
                                                j="32" val="4"
                                                barHeight="7.992000000000001" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5694"
                                                d="M 409.78695465213485 75.924L 409.78695465213485 57.94200000000001Q 409.78695465213485 57.94200000000001 409.78695465213485 57.94200000000001L 416.0432440361369 57.94200000000001Q 416.0432440361369 57.94200000000001 416.0432440361369 57.94200000000001L 416.0432440361369 57.94200000000001L 416.0432440361369 75.924L 416.0432440361369 75.924z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 409.78695465213485 75.924L 409.78695465213485 57.94200000000001Q 409.78695465213485 57.94200000000001 409.78695465213485 57.94200000000001L 416.0432440361369 57.94200000000001Q 416.0432440361369 57.94200000000001 416.0432440361369 57.94200000000001L 416.0432440361369 57.94200000000001L 416.0432440361369 75.924L 416.0432440361369 75.924z"
                                                pathFrom="M 409.78695465213485 75.924L 409.78695465213485 75.924L 416.0432440361369 75.924L 416.0432440361369 75.924L 416.0432440361369 75.924L 416.0432440361369 75.924L 416.0432440361369 75.924L 409.78695465213485 75.924"
                                                cy="57.94200000000001" cx="416.0432440361369"
                                                j="33" val="9"
                                                barHeight="17.982000000000003" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5695"
                                                d="M 422.29953342013897 15.983999999999988L 422.29953342013897 1.9979999999999851Q 422.29953342013897 1.9979999999999851 422.29953342013897 1.9979999999999851L 428.55582280414103 1.9979999999999851Q 428.55582280414103 1.9979999999999851 428.55582280414103 1.9979999999999851L 428.55582280414103 1.9979999999999851L 428.55582280414103 15.983999999999988L 428.55582280414103 15.983999999999988z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 422.29953342013897 15.983999999999988L 422.29953342013897 1.9979999999999851Q 422.29953342013897 1.9979999999999851 422.29953342013897 1.9979999999999851L 428.55582280414103 1.9979999999999851Q 428.55582280414103 1.9979999999999851 428.55582280414103 1.9979999999999851L 428.55582280414103 1.9979999999999851L 428.55582280414103 15.983999999999988L 428.55582280414103 15.983999999999988z"
                                                pathFrom="M 422.29953342013897 15.983999999999988L 422.29953342013897 15.983999999999988L 428.55582280414103 15.983999999999988L 428.55582280414103 15.983999999999988L 428.55582280414103 15.983999999999988L 428.55582280414103 15.983999999999988L 428.55582280414103 15.983999999999988L 422.29953342013897 15.983999999999988"
                                                cy="1.9979999999999851" cx="428.55582280414103"
                                                j="34" val="7"
                                                barHeight="13.986000000000002" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5696"
                                                d="M 434.8121121881431 87.91199999999999L 434.8121121881431 85.91399999999999Q 434.8121121881431 85.91399999999999 434.8121121881431 85.91399999999999L 441.06840157214515 85.91399999999999Q 441.06840157214515 85.91399999999999 441.06840157214515 85.91399999999999L 441.06840157214515 85.91399999999999L 441.06840157214515 87.91199999999999L 441.06840157214515 87.91199999999999z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 434.8121121881431 87.91199999999999L 434.8121121881431 85.91399999999999Q 434.8121121881431 85.91399999999999 434.8121121881431 85.91399999999999L 441.06840157214515 85.91399999999999Q 441.06840157214515 85.91399999999999 441.06840157214515 85.91399999999999L 441.06840157214515 85.91399999999999L 441.06840157214515 87.91199999999999L 441.06840157214515 87.91199999999999z"
                                                pathFrom="M 434.8121121881431 87.91199999999999L 434.8121121881431 87.91199999999999L 441.06840157214515 87.91199999999999L 441.06840157214515 87.91199999999999L 441.06840157214515 87.91199999999999L 441.06840157214515 87.91199999999999L 441.06840157214515 87.91199999999999L 434.8121121881431 87.91199999999999"
                                                cy="85.91399999999999" cx="441.06840157214515"
                                                j="35" val="1"
                                                barHeight="1.9980000000000002" barWidth="6.256289384002058">
                                            </path>
                                            <path id="SvgjsPath5697"
                                                d="M 447.3246909561472 187.812L 447.3246909561472 175.824Q 447.3246909561472 175.824 447.3246909561472 175.824L 453.58098034014927 175.824Q 453.58098034014927 175.824 453.58098034014927 175.824L 453.58098034014927 175.824L 453.58098034014927 187.812L 453.58098034014927 187.812z"
                                                fill="rgba(191,227,153,1)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-bar-area"
                                                index="2" clip-path="url(#gridRectMask3b1vzda2)"
                                                pathTo="M 447.3246909561472 187.812L 447.3246909561472 175.824Q 447.3246909561472 175.824 447.3246909561472 175.824L 453.58098034014927 175.824Q 453.58098034014927 175.824 453.58098034014927 175.824L 453.58098034014927 175.824L 453.58098034014927 187.812L 453.58098034014927 187.812z"
                                                pathFrom="M 447.3246909561472 187.812L 447.3246909561472 187.812L 453.58098034014927 187.812L 453.58098034014927 187.812L 453.58098034014927 187.812L 453.58098034014927 187.812L 453.58098034014927 187.812L 447.3246909561472 187.812"
                                                cy="175.824" cx="453.58098034014927" j="36"
                                                val="6" barHeight="11.988000000000001"
                                                barWidth="6.256289384002058"></path>
                                        </g>
                                        <g id="SvgjsG5582" class="apexcharts-datalabels"
                                            data:realIndex="0"></g>
                                        <g id="SvgjsG5621" class="apexcharts-datalabels"
                                            data:realIndex="1"></g>
                                        <g id="SvgjsG5660" class="apexcharts-datalabels"
                                            data:realIndex="2"></g>
                                    </g>
                                    <line id="SvgjsLine5756" x1="-9.343894675925927" y1="0"
                                        x2="459.7967303240741" y2="0" stroke="#b6b6b6"
                                        stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                        class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine5757" x1="-9.343894675925927" y1="0"
                                        x2="459.7967303240741" y2="0" stroke-dasharray="0"
                                        stroke-width="0" stroke-linecap="butt"
                                        class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG5758" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG5759" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG5760" class="apexcharts-point-annotations"></g>
                                    <rect id="SvgjsRect5761" width="0" height="0"
                                        x="0" y="0" rx="0" ry="0"
                                        opacity="1" stroke-width="0" stroke="none"
                                        stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect">
                                    </rect>
                                    <rect id="SvgjsRect5762" width="0" height="0"
                                        x="0" y="0" rx="0" ry="0"
                                        opacity="1" stroke-width="0" stroke="none"
                                        stroke-dasharray="0" fill="#fefefe"
                                        class="apexcharts-selection-rect"></rect>
                                </g>
                                <g id="SvgjsG5715" class="apexcharts-yaxis" rel="0"
                                    transform="translate(14.859375, 0)">
                                    <g id="SvgjsG5716" class="apexcharts-yaxis-texts-g"><text
                                            id="SvgjsText5718" font-family="inherit" x="4"
                                            y="11.5" text-anchor="end" dominant-baseline="auto"
                                            font-size="11px" font-weight="400" fill="#373d3f"
                                            class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: inherit;">
                                            <tspan id="SvgjsTspan5719">100</tspan>
                                            <title>100</title>
                                        </text><text id="SvgjsText5721" font-family="inherit"
                                            x="4" y="51.46" text-anchor="end"
                                            dominant-baseline="auto" font-size="11px" font-weight="400"
                                            fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: inherit;">
                                            <tspan id="SvgjsTspan5722">80</tspan>
                                            <title>80</title>
                                        </text><text id="SvgjsText5724" font-family="inherit"
                                            x="4" y="91.42" text-anchor="end"
                                            dominant-baseline="auto" font-size="11px" font-weight="400"
                                            fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: inherit;">
                                            <tspan id="SvgjsTspan5725">60</tspan>
                                            <title>60</title>
                                        </text><text id="SvgjsText5727" font-family="inherit"
                                            x="4" y="131.38" text-anchor="end"
                                            dominant-baseline="auto" font-size="11px" font-weight="400"
                                            fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: inherit;">
                                            <tspan id="SvgjsTspan5728">40</tspan>
                                            <title>40</title>
                                        </text><text id="SvgjsText5730" font-family="inherit"
                                            x="4" y="171.34" text-anchor="end"
                                            dominant-baseline="auto" font-size="11px" font-weight="400"
                                            fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: inherit;">
                                            <tspan id="SvgjsTspan5731">20</tspan>
                                            <title>20</title>
                                        </text><text id="SvgjsText5733" font-family="inherit"
                                            x="4" y="211.3" text-anchor="end"
                                            dominant-baseline="auto" font-size="11px" font-weight="400"
                                            fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: inherit;">
                                            <tspan id="SvgjsTspan5734">0</tspan>
                                            <title>0</title>
                                        </text></g>
                                </g>
                                <g id="SvgjsG5563" class="apexcharts-annotations"></g>
                            </svg>
                            <div class="apexcharts-legend" style="max-height: 120px;"></div>
                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                <div class="apexcharts-tooltip-title"
                                    style="font-family: inherit; font-size: 12px;"></div>
                                <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                        class="apexcharts-tooltip-marker"
                                        style="background-color: rgb(32, 107, 196);"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: inherit; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                                <div class="apexcharts-tooltip-series-group" style="order: 2;"><span
                                        class="apexcharts-tooltip-marker"
                                        style="background-color: rgb(121, 166, 220);"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: inherit; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                                <div class="apexcharts-tooltip-series-group" style="order: 3;"><span
                                        class="apexcharts-tooltip-marker"
                                        style="background-color: rgb(191, 227, 153);"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: inherit; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                <div class="apexcharts-yaxistooltip-text"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header border-0">
                    <div class="card-title">Development activity</div>
                </div>
                <div class="position-relative">
                    <div class="position-absolute top-0 left-0 px-3 mt-1 w-75">
                        <div class="row g-2">
                            <div class="col-auto">
                                <div class="chart-sparkline chart-sparkline-square" id="sparkline-activity"
                                    style="min-height: 41px;">
                                    <div id="apexcharts6rchq3fvg"
                                        class="apexcharts-canvas apexcharts6rchq3fvg apexcharts-theme-light"
                                        style="width: 40px; height: 41px;"><svg id="SvgjsSvg5176"
                                            width="40" height="41"
                                            xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                            xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                            style="background: transparent;">
                                            <g id="SvgjsG5178" class="apexcharts-inner apexcharts-graphical"
                                                transform="translate(0, 0)">
                                                <defs id="SvgjsDefs5177">
                                                    <clipPath id="gridRectMask6rchq3fvg">
                                                        <rect id="SvgjsRect5180" width="46"
                                                            height="42" x="-3" y="-1"
                                                            rx="0" ry="0" opacity="1"
                                                            stroke-width="0" stroke="none"
                                                            stroke-dasharray="0" fill="#fff"></rect>
                                                    </clipPath>
                                                    <clipPath id="forecastMask6rchq3fvg"></clipPath>
                                                    <clipPath id="nonForecastMask6rchq3fvg"></clipPath>
                                                    <clipPath id="gridRectMarkerMask6rchq3fvg">
                                                        <rect id="SvgjsRect5181" width="44"
                                                            height="44" x="-2" y="-2"
                                                            rx="0" ry="0" opacity="1"
                                                            stroke-width="0" stroke="none"
                                                            stroke-dasharray="0" fill="#fff"></rect>
                                                    </clipPath>
                                                </defs>
                                                <g id="SvgjsG5182" class="apexcharts-radialbar">
                                                    <g id="SvgjsG5183">
                                                        <g id="SvgjsG5184" class="apexcharts-tracks">
                                                            <g id="SvgjsG5185"
                                                                class="apexcharts-radialbar-track apexcharts-track"
                                                                rel="1">
                                                                <path id="apexcharts-radialbarTrack-0"
                                                                    d="M 20 4.146341463414631 A 15.85365853658537 15.85365853658537 0 1 1 19.99723301461454 4.1463417048796565"
                                                                    fill="none" fill-opacity="1"
                                                                    stroke="rgba(242,242,242,0.85)"
                                                                    stroke-opacity="1" stroke-linecap="butt"
                                                                    stroke-width="2.3658536585365857"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-radialbar-area"
                                                                    data:pathOrig="M 20 4.146341463414631 A 15.85365853658537 15.85365853658537 0 1 1 19.99723301461454 4.1463417048796565">
                                                                </path>
                                                            </g>
                                                        </g>
                                                        <g id="SvgjsG5187">
                                                            <g id="SvgjsG5189"
                                                                class="apexcharts-series apexcharts-radial-series"
                                                                seriesName="seriesx1" rel="1"
                                                                data:realIndex="0">
                                                                <path id="SvgjsPath5190"
                                                                    d="M 20 4.146341463414631 A 15.85365853658537 15.85365853658537 0 0 1 32.82587917911502 29.31854668268555"
                                                                    fill="none" fill-opacity="0.85"
                                                                    stroke="rgba(32,107,196,0.85)"
                                                                    stroke-opacity="1" stroke-linecap="butt"
                                                                    stroke-width="2.439024390243903"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-radialbar-area apexcharts-radialbar-slice-0"
                                                                    data:angle="126" data:value="35"
                                                                    index="0" j="0"
                                                                    data:pathOrig="M 20 4.146341463414631 A 15.85365853658537 15.85365853658537 0 0 1 32.82587917911502 29.31854668268555">
                                                                </path>
                                                            </g>
                                                            <circle id="SvgjsCircle5188"
                                                                r="14.670731707317076" cx="20"
                                                                cy="20"
                                                                class="apexcharts-radialbar-hollow"
                                                                fill="transparent"></circle>
                                                        </g>
                                                    </g>
                                                </g>
                                                <line id="SvgjsLine5191" x1="0" y1="0"
                                                    x2="40" y2="0" stroke="#b6b6b6"
                                                    stroke-dasharray="0" stroke-width="1"
                                                    stroke-linecap="butt" class="apexcharts-ycrosshairs">
                                                </line>
                                                <line id="SvgjsLine5192" x1="0" y1="0"
                                                    x2="40" y2="0" stroke-dasharray="0"
                                                    stroke-width="0" stroke-linecap="butt"
                                                    class="apexcharts-ycrosshairs-hidden"></line>
                                            </g>
                                            <g id="SvgjsG5179" class="apexcharts-annotations"></g>
                                        </svg>
                                        <div class="apexcharts-legend"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div>Today's Earning: $4,262.40</div>
                                <div class="text-muted">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-inline text-green" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="3 17 9 11 13 15 21 7"></polyline>
                                        <polyline points="14 7 21 7 21 14"></polyline>
                                    </svg>
                                    +5% more than yesterday
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="chart-development-activity" style="min-height: 192px;">
                        <div id="apexchartsscit2p9m"
                            class="apexcharts-canvas apexchartsscit2p9m apexcharts-theme-light"
                            style="width: 538px; height: 192px;"><svg id="SvgjsSvg5764" width="538"
                                height="192" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                class="apexcharts-svg" xmlns:data="ApexChartsNS"
                                transform="translate(0, 0)" style="background: transparent;">
                                <g id="SvgjsG5766" class="apexcharts-inner apexcharts-graphical"
                                    transform="translate(0, 0)">
                                    <defs id="SvgjsDefs5765">
                                        <clipPath id="gridRectMaskscit2p9m">
                                            <rect id="SvgjsRect5802" width="544" height="194"
                                                x="-3" y="-1" rx="0"
                                                ry="0" opacity="1" stroke-width="0"
                                                stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="forecastMaskscit2p9m"></clipPath>
                                        <clipPath id="nonForecastMaskscit2p9m"></clipPath>
                                        <clipPath id="gridRectMarkerMaskscit2p9m">
                                            <rect id="SvgjsRect5803" width="542" height="196"
                                                x="-2" y="-2" rx="0"
                                                ry="0" opacity="1" stroke-width="0"
                                                stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                    </defs>
                                    <line id="SvgjsLine5771" x1="0" y1="0"
                                        x2="0" y2="192" stroke="#b6b6b6"
                                        stroke-dasharray="3" stroke-linecap="butt"
                                        class="apexcharts-xcrosshairs" x="0" y="0"
                                        width="1" height="192" fill="#b1b9c4" filter="none"
                                        fill-opacity="0.9" stroke-width="1"></line>
                                    <g id="SvgjsG5810" class="apexcharts-xaxis"
                                        transform="translate(0, 0)">
                                        <g id="SvgjsG5811" class="apexcharts-xaxis-texts-g"
                                            transform="translate(0, -4)"></g>
                                    </g>
                                    <g id="SvgjsG5823" class="apexcharts-grid">
                                        <g id="SvgjsG5824" class="apexcharts-gridlines-horizontal"
                                            style="display: none;">
                                            <line id="SvgjsLine5826" x1="0" y1="0"
                                                x2="538" y2="0" stroke="#e0e0e0"
                                                stroke-dasharray="4" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine5827" x1="0" y1="48"
                                                x2="538" y2="48" stroke="#e0e0e0"
                                                stroke-dasharray="4" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine5828" x1="0" y1="96"
                                                x2="538" y2="96" stroke="#e0e0e0"
                                                stroke-dasharray="4" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine5829" x1="0" y1="144"
                                                x2="538" y2="144" stroke="#e0e0e0"
                                                stroke-dasharray="4" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine5830" x1="0" y1="192"
                                                x2="538" y2="192" stroke="#e0e0e0"
                                                stroke-dasharray="4" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                        </g>
                                        <g id="SvgjsG5825" class="apexcharts-gridlines-vertical"
                                            style="display: none;"></g>
                                        <line id="SvgjsLine5832" x1="0" y1="192"
                                            x2="538" y2="192" stroke="transparent"
                                            stroke-dasharray="0" stroke-linecap="butt"></line>
                                        <line id="SvgjsLine5831" x1="0" y1="1"
                                            x2="0" y2="192" stroke="transparent"
                                            stroke-dasharray="0" stroke-linecap="butt"></line>
                                    </g>
                                    <g id="SvgjsG5804"
                                        class="apexcharts-area-series apexcharts-plot-series">
                                        <g id="SvgjsG5805" class="apexcharts-series"
                                            seriesName="Purchases" data:longestSeries="true"
                                            rel="1" data:realIndex="0">
                                            <path id="SvgjsPath5808"
                                                d="M 0 192L 0 184.8C 6.4931034482758605 184.8 12.058620689655172 180 18.551724137931032 180C 25.044827586206893 180 30.610344827586204 182.4 37.103448275862064 182.4C 43.596551724137925 182.4 49.162068965517236 177.6 55.655172413793096 177.6C 62.14827586206896 177.6 67.71379310344827 175.2 74.20689655172413 175.2C 80.69999999999999 175.2 86.2655172413793 180 92.75862068965516 180C 99.25172413793102 180 104.81724137931033 177.6 111.31034482758619 177.6C 117.80344827586205 177.6 123.36896551724138 172.8 129.86206896551724 172.8C 136.3551724137931 172.8 141.9206896551724 134.4 148.41379310344826 134.4C 154.90689655172412 134.4 160.47241379310344 175.2 166.9655172413793 175.2C 173.45862068965516 175.2 179.02413793103446 163.2 185.51724137931032 163.2C 192.01034482758618 163.2 197.5758620689655 180 204.06896551724137 180C 210.56206896551723 180 216.12758620689652 177.6 222.62068965517238 177.6C 229.11379310344824 177.6 234.67931034482757 184.8 241.17241379310343 184.8C 247.6655172413793 184.8 253.23103448275862 172.8 259.7241379310345 172.8C 266.21724137931034 172.8 271.7827586206896 182.4 278.27586206896547 182.4C 284.7689655172413 182.4 290.33448275862065 158.4 296.8275862068965 158.4C 303.3206896551724 158.4 308.8862068965517 120 315.37931034482756 120C 321.8724137931034 120 327.43793103448274 151.2 333.9310344827586 151.2C 340.42413793103447 151.2 345.9896551724138 146.4 352.48275862068965 146.4C 358.9758620689655 146.4 364.5413793103448 156 371.03448275862064 156C 377.5275862068965 156 383.0931034482758 158.4 389.5862068965517 158.4C 396.07931034482755 158.4 401.6448275862069 132 408.13793103448273 132C 414.6310344827586 132 420.1965517241379 115.2 426.6896551724138 115.2C 433.18275862068964 115.2 438.7482758620689 96 445.24137931034477 96C 451.73448275862063 96 457.29999999999995 60 463.7931034482758 60C 470.2862068965517 60 475.851724137931 48 482.34482758620686 48C 488.8379310344827 48 494.40344827586205 76.80000000000001 500.8965517241379 76.80000000000001C 507.38965517241377 76.80000000000001 512.9551724137931 67.2 519.448275862069 67.2C 525.9413793103448 67.2 531.5068965517241 24 538 24C 538 24 538 24 538 192M 538 24z"
                                                fill="rgba(32,107,196,0.16)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-area"
                                                index="0" clip-path="url(#gridRectMaskscit2p9m)"
                                                pathTo="M 0 192L 0 184.8C 6.4931034482758605 184.8 12.058620689655172 180 18.551724137931032 180C 25.044827586206893 180 30.610344827586204 182.4 37.103448275862064 182.4C 43.596551724137925 182.4 49.162068965517236 177.6 55.655172413793096 177.6C 62.14827586206896 177.6 67.71379310344827 175.2 74.20689655172413 175.2C 80.69999999999999 175.2 86.2655172413793 180 92.75862068965516 180C 99.25172413793102 180 104.81724137931033 177.6 111.31034482758619 177.6C 117.80344827586205 177.6 123.36896551724138 172.8 129.86206896551724 172.8C 136.3551724137931 172.8 141.9206896551724 134.4 148.41379310344826 134.4C 154.90689655172412 134.4 160.47241379310344 175.2 166.9655172413793 175.2C 173.45862068965516 175.2 179.02413793103446 163.2 185.51724137931032 163.2C 192.01034482758618 163.2 197.5758620689655 180 204.06896551724137 180C 210.56206896551723 180 216.12758620689652 177.6 222.62068965517238 177.6C 229.11379310344824 177.6 234.67931034482757 184.8 241.17241379310343 184.8C 247.6655172413793 184.8 253.23103448275862 172.8 259.7241379310345 172.8C 266.21724137931034 172.8 271.7827586206896 182.4 278.27586206896547 182.4C 284.7689655172413 182.4 290.33448275862065 158.4 296.8275862068965 158.4C 303.3206896551724 158.4 308.8862068965517 120 315.37931034482756 120C 321.8724137931034 120 327.43793103448274 151.2 333.9310344827586 151.2C 340.42413793103447 151.2 345.9896551724138 146.4 352.48275862068965 146.4C 358.9758620689655 146.4 364.5413793103448 156 371.03448275862064 156C 377.5275862068965 156 383.0931034482758 158.4 389.5862068965517 158.4C 396.07931034482755 158.4 401.6448275862069 132 408.13793103448273 132C 414.6310344827586 132 420.1965517241379 115.2 426.6896551724138 115.2C 433.18275862068964 115.2 438.7482758620689 96 445.24137931034477 96C 451.73448275862063 96 457.29999999999995 60 463.7931034482758 60C 470.2862068965517 60 475.851724137931 48 482.34482758620686 48C 488.8379310344827 48 494.40344827586205 76.80000000000001 500.8965517241379 76.80000000000001C 507.38965517241377 76.80000000000001 512.9551724137931 67.2 519.448275862069 67.2C 525.9413793103448 67.2 531.5068965517241 24 538 24C 538 24 538 24 538 192M 538 24z"
                                                pathFrom="M -1 192L -1 192L 18.551724137931032 192L 37.103448275862064 192L 55.655172413793096 192L 74.20689655172413 192L 92.75862068965516 192L 111.31034482758619 192L 129.86206896551724 192L 148.41379310344826 192L 166.9655172413793 192L 185.51724137931032 192L 204.06896551724137 192L 222.62068965517238 192L 241.17241379310343 192L 259.7241379310345 192L 278.27586206896547 192L 296.8275862068965 192L 315.37931034482756 192L 333.9310344827586 192L 352.48275862068965 192L 371.03448275862064 192L 389.5862068965517 192L 408.13793103448273 192L 426.6896551724138 192L 445.24137931034477 192L 463.7931034482758 192L 482.34482758620686 192L 500.8965517241379 192L 519.448275862069 192L 538 192">
                                            </path>
                                            <path id="SvgjsPath5809"
                                                d="M 0 184.8C 6.4931034482758605 184.8 12.058620689655172 180 18.551724137931032 180C 25.044827586206893 180 30.610344827586204 182.4 37.103448275862064 182.4C 43.596551724137925 182.4 49.162068965517236 177.6 55.655172413793096 177.6C 62.14827586206896 177.6 67.71379310344827 175.2 74.20689655172413 175.2C 80.69999999999999 175.2 86.2655172413793 180 92.75862068965516 180C 99.25172413793102 180 104.81724137931033 177.6 111.31034482758619 177.6C 117.80344827586205 177.6 123.36896551724138 172.8 129.86206896551724 172.8C 136.3551724137931 172.8 141.9206896551724 134.4 148.41379310344826 134.4C 154.90689655172412 134.4 160.47241379310344 175.2 166.9655172413793 175.2C 173.45862068965516 175.2 179.02413793103446 163.2 185.51724137931032 163.2C 192.01034482758618 163.2 197.5758620689655 180 204.06896551724137 180C 210.56206896551723 180 216.12758620689652 177.6 222.62068965517238 177.6C 229.11379310344824 177.6 234.67931034482757 184.8 241.17241379310343 184.8C 247.6655172413793 184.8 253.23103448275862 172.8 259.7241379310345 172.8C 266.21724137931034 172.8 271.7827586206896 182.4 278.27586206896547 182.4C 284.7689655172413 182.4 290.33448275862065 158.4 296.8275862068965 158.4C 303.3206896551724 158.4 308.8862068965517 120 315.37931034482756 120C 321.8724137931034 120 327.43793103448274 151.2 333.9310344827586 151.2C 340.42413793103447 151.2 345.9896551724138 146.4 352.48275862068965 146.4C 358.9758620689655 146.4 364.5413793103448 156 371.03448275862064 156C 377.5275862068965 156 383.0931034482758 158.4 389.5862068965517 158.4C 396.07931034482755 158.4 401.6448275862069 132 408.13793103448273 132C 414.6310344827586 132 420.1965517241379 115.2 426.6896551724138 115.2C 433.18275862068964 115.2 438.7482758620689 96 445.24137931034477 96C 451.73448275862063 96 457.29999999999995 60 463.7931034482758 60C 470.2862068965517 60 475.851724137931 48 482.34482758620686 48C 488.8379310344827 48 494.40344827586205 76.80000000000001 500.8965517241379 76.80000000000001C 507.38965517241377 76.80000000000001 512.9551724137931 67.2 519.448275862069 67.2C 525.9413793103448 67.2 531.5068965517241 24 538 24"
                                                fill="none" fill-opacity="1" stroke="#206bc4"
                                                stroke-opacity="1" stroke-linecap="round" stroke-width="2"
                                                stroke-dasharray="0" class="apexcharts-area"
                                                index="0" clip-path="url(#gridRectMaskscit2p9m)"
                                                pathTo="M 0 184.8C 6.4931034482758605 184.8 12.058620689655172 180 18.551724137931032 180C 25.044827586206893 180 30.610344827586204 182.4 37.103448275862064 182.4C 43.596551724137925 182.4 49.162068965517236 177.6 55.655172413793096 177.6C 62.14827586206896 177.6 67.71379310344827 175.2 74.20689655172413 175.2C 80.69999999999999 175.2 86.2655172413793 180 92.75862068965516 180C 99.25172413793102 180 104.81724137931033 177.6 111.31034482758619 177.6C 117.80344827586205 177.6 123.36896551724138 172.8 129.86206896551724 172.8C 136.3551724137931 172.8 141.9206896551724 134.4 148.41379310344826 134.4C 154.90689655172412 134.4 160.47241379310344 175.2 166.9655172413793 175.2C 173.45862068965516 175.2 179.02413793103446 163.2 185.51724137931032 163.2C 192.01034482758618 163.2 197.5758620689655 180 204.06896551724137 180C 210.56206896551723 180 216.12758620689652 177.6 222.62068965517238 177.6C 229.11379310344824 177.6 234.67931034482757 184.8 241.17241379310343 184.8C 247.6655172413793 184.8 253.23103448275862 172.8 259.7241379310345 172.8C 266.21724137931034 172.8 271.7827586206896 182.4 278.27586206896547 182.4C 284.7689655172413 182.4 290.33448275862065 158.4 296.8275862068965 158.4C 303.3206896551724 158.4 308.8862068965517 120 315.37931034482756 120C 321.8724137931034 120 327.43793103448274 151.2 333.9310344827586 151.2C 340.42413793103447 151.2 345.9896551724138 146.4 352.48275862068965 146.4C 358.9758620689655 146.4 364.5413793103448 156 371.03448275862064 156C 377.5275862068965 156 383.0931034482758 158.4 389.5862068965517 158.4C 396.07931034482755 158.4 401.6448275862069 132 408.13793103448273 132C 414.6310344827586 132 420.1965517241379 115.2 426.6896551724138 115.2C 433.18275862068964 115.2 438.7482758620689 96 445.24137931034477 96C 451.73448275862063 96 457.29999999999995 60 463.7931034482758 60C 470.2862068965517 60 475.851724137931 48 482.34482758620686 48C 488.8379310344827 48 494.40344827586205 76.80000000000001 500.8965517241379 76.80000000000001C 507.38965517241377 76.80000000000001 512.9551724137931 67.2 519.448275862069 67.2C 525.9413793103448 67.2 531.5068965517241 24 538 24"
                                                pathFrom="M -1 192L -1 192L 18.551724137931032 192L 37.103448275862064 192L 55.655172413793096 192L 74.20689655172413 192L 92.75862068965516 192L 111.31034482758619 192L 129.86206896551724 192L 148.41379310344826 192L 166.9655172413793 192L 185.51724137931032 192L 204.06896551724137 192L 222.62068965517238 192L 241.17241379310343 192L 259.7241379310345 192L 278.27586206896547 192L 296.8275862068965 192L 315.37931034482756 192L 333.9310344827586 192L 352.48275862068965 192L 371.03448275862064 192L 389.5862068965517 192L 408.13793103448273 192L 426.6896551724138 192L 445.24137931034477 192L 463.7931034482758 192L 482.34482758620686 192L 500.8965517241379 192L 519.448275862069 192L 538 192">
                                            </path>
                                            <g id="SvgjsG5806" class="apexcharts-series-markers-wrap"
                                                data:realIndex="0">
                                                <g class="apexcharts-series-markers">
                                                    <circle id="SvgjsCircle5838" r="0"
                                                        cx="0" cy="0"
                                                        class="apexcharts-marker wqahqsfm9 no-pointer-events"
                                                        stroke="#ffffff" fill="#206bc4" fill-opacity="1"
                                                        stroke-width="2" stroke-opacity="0.9"
                                                        default-marker-size="0"></circle>
                                                </g>
                                            </g>
                                        </g>
                                        <g id="SvgjsG5807" class="apexcharts-datalabels"
                                            data:realIndex="0"></g>
                                    </g>
                                    <line id="SvgjsLine5833" x1="0" y1="0"
                                        x2="538" y2="0" stroke="#b6b6b6"
                                        stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                        class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine5834" x1="0" y1="0"
                                        x2="538" y2="0" stroke-dasharray="0"
                                        stroke-width="0" stroke-linecap="butt"
                                        class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG5835" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG5836" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG5837" class="apexcharts-point-annotations"></g>
                                </g>
                                <rect id="SvgjsRect5770" width="0" height="0" x="0"
                                    y="0" rx="0" ry="0" opacity="1"
                                    stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe">
                                </rect>
                                <g id="SvgjsG5822" class="apexcharts-yaxis" rel="0"
                                    transform="translate(-18, 0)"></g>
                                <g id="SvgjsG5767" class="apexcharts-annotations"></g>
                            </svg>
                            <div class="apexcharts-legend" style="max-height: 96px;"></div>
                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                <div class="apexcharts-tooltip-title"
                                    style="font-family: inherit; font-size: 12px;"></div>
                                <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                        class="apexcharts-tooltip-marker"
                                        style="background-color: rgb(32, 107, 196);"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: inherit; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                <div class="apexcharts-yaxistooltip-text"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Most Visited Pages</h3>
                </div>
                <div class="card-table table-responsive">
                    <table class="table table-vcenter">
                        <thead>
                            <tr>
                                <th>Page name</th>
                                <th>Visitors</th>
                                <th>Unique</th>
                                <th colspan="2">Bounce rate</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    /about.html
                                    <a href="#" class="ms-1" aria-label="Open website">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/link -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                            width="24" height="24" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5">
                                            </path>
                                            <path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5">
                                            </path>
                                        </svg>
                                    </a>
                                </td>
                                <td class="text-muted">4,896</td>
                                <td class="text-muted">3,654</td>
                                <td class="text-muted">82.54%</td>
                                <td class="text-end w-1">
                                    <div class="chart-sparkline chart-sparkline-sm"
                                        id="sparkline-bounce-rate-1" style="min-height: 24px;">
                                        <div id="apexchartsoap46csj"
                                            class="apexcharts-canvas apexchartsoap46csj apexcharts-theme-light"
                                            style="width: 64px; height: 24px;"><svg id="SvgjsSvg5193"
                                                width="64" height="24"
                                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                style="background: transparent;">
                                                <g id="SvgjsG5195"
                                                    class="apexcharts-inner apexcharts-graphical"
                                                    transform="translate(0, 0)">
                                                    <defs id="SvgjsDefs5194">
                                                        <clipPath id="gridRectMaskoap46csj">
                                                            <rect id="SvgjsRect5200" width="70"
                                                                height="26" x="-3"
                                                                y="-1" rx="0"
                                                                ry="0" opacity="1"
                                                                stroke-width="0" stroke="none"
                                                                stroke-dasharray="0" fill="#fff"></rect>
                                                        </clipPath>
                                                        <clipPath id="forecastMaskoap46csj"></clipPath>
                                                        <clipPath id="nonForecastMaskoap46csj"></clipPath>
                                                        <clipPath id="gridRectMarkerMaskoap46csj">
                                                            <rect id="SvgjsRect5201" width="68"
                                                                height="28" x="-2"
                                                                y="-2" rx="0"
                                                                ry="0" opacity="1"
                                                                stroke-width="0" stroke="none"
                                                                stroke-dasharray="0" fill="#fff"></rect>
                                                        </clipPath>
                                                    </defs>
                                                    <line id="SvgjsLine5199" x1="0" y1="0"
                                                        x2="0" y2="24" stroke="#b6b6b6"
                                                        stroke-dasharray="3" stroke-linecap="butt"
                                                        class="apexcharts-xcrosshairs" x="0"
                                                        y="0" width="1" height="24"
                                                        fill="#b1b9c4" filter="none" fill-opacity="0.9"
                                                        stroke-width="1"></line>
                                                    <g id="SvgjsG5207" class="apexcharts-xaxis"
                                                        transform="translate(0, 0)">
                                                        <g id="SvgjsG5208" class="apexcharts-xaxis-texts-g"
                                                            transform="translate(0, -4)"></g>
                                                    </g>
                                                    <g id="SvgjsG5219" class="apexcharts-grid">
                                                        <g id="SvgjsG5220"
                                                            class="apexcharts-gridlines-horizontal"
                                                            style="display: none;">
                                                            <line id="SvgjsLine5222" x1="0"
                                                                y1="0" x2="64"
                                                                y2="0" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine5223" x1="0"
                                                                y1="6" x2="64"
                                                                y2="6" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine5224" x1="0"
                                                                y1="12" x2="64"
                                                                y2="12" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine5225" x1="0"
                                                                y1="18" x2="64"
                                                                y2="18" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine5226" x1="0"
                                                                y1="24" x2="64"
                                                                y2="24" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                        </g>
                                                        <g id="SvgjsG5221"
                                                            class="apexcharts-gridlines-vertical"
                                                            style="display: none;"></g>
                                                        <line id="SvgjsLine5228" x1="0"
                                                            y1="24" x2="64" y2="24"
                                                            stroke="transparent" stroke-dasharray="0"
                                                            stroke-linecap="butt"></line>
                                                        <line id="SvgjsLine5227" x1="0"
                                                            y1="1" x2="0" y2="24"
                                                            stroke="transparent" stroke-dasharray="0"
                                                            stroke-linecap="butt"></line>
                                                    </g>
                                                    <g id="SvgjsG5202"
                                                        class="apexcharts-line-series apexcharts-plot-series">
                                                        <g id="SvgjsG5203" class="apexcharts-series"
                                                            seriesName="seriesx1" data:longestSeries="true"
                                                            rel="1" data:realIndex="0">
                                                            <path id="SvgjsPath5206"
                                                                d="M 0 7L 8 0L 16 4L 24 14L 32 19L 40 23L 48 20L 56 6L 64 11"
                                                                fill="none" fill-opacity="1"
                                                                stroke="rgba(32,107,196,0.85)"
                                                                stroke-opacity="1" stroke-linecap="round"
                                                                stroke-width="2" stroke-dasharray="0"
                                                                class="apexcharts-line" index="0"
                                                                clip-path="url(#gridRectMaskoap46csj)"
                                                                pathTo="M 0 7L 8 0L 16 4L 24 14L 32 19L 40 23L 48 20L 56 6L 64 11"
                                                                pathFrom="M -1 24L -1 24L 8 24L 16 24L 24 24L 32 24L 40 24L 48 24L 56 24L 64 24">
                                                            </path>
                                                            <g id="SvgjsG5204"
                                                                class="apexcharts-series-markers-wrap"
                                                                data:realIndex="0"></g>
                                                        </g>
                                                        <g id="SvgjsG5205" class="apexcharts-datalabels"
                                                            data:realIndex="0"></g>
                                                    </g>
                                                    <line id="SvgjsLine5229" x1="0" y1="0"
                                                        x2="64" y2="0" stroke="#b6b6b6"
                                                        stroke-dasharray="0" stroke-width="1"
                                                        stroke-linecap="butt"
                                                        class="apexcharts-ycrosshairs"></line>
                                                    <line id="SvgjsLine5230" x1="0" y1="0"
                                                        x2="64" y2="0" stroke-dasharray="0"
                                                        stroke-width="0" stroke-linecap="butt"
                                                        class="apexcharts-ycrosshairs-hidden"></line>
                                                    <g id="SvgjsG5231" class="apexcharts-yaxis-annotations">
                                                    </g>
                                                    <g id="SvgjsG5232" class="apexcharts-xaxis-annotations">
                                                    </g>
                                                    <g id="SvgjsG5233" class="apexcharts-point-annotations">
                                                    </g>
                                                </g>
                                                <rect id="SvgjsRect5198" width="0" height="0"
                                                    x="0" y="0" rx="0"
                                                    ry="0" opacity="1" stroke-width="0"
                                                    stroke="none" stroke-dasharray="0" fill="#fefefe">
                                                </rect>
                                                <g id="SvgjsG5218" class="apexcharts-yaxis" rel="0"
                                                    transform="translate(-18, 0)"></g>
                                                <g id="SvgjsG5196" class="apexcharts-annotations"></g>
                                            </svg>
                                            <div class="apexcharts-legend" style="max-height: 12px;"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    /special-promo.html
                                    <a href="#" class="ms-1" aria-label="Open website">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/link -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                            width="24" height="24" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5">
                                            </path>
                                            <path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5">
                                            </path>
                                        </svg>
                                    </a>
                                </td>
                                <td class="text-muted">3,652</td>
                                <td class="text-muted">3,215</td>
                                <td class="text-muted">76.29%</td>
                                <td class="text-end w-1">
                                    <div class="chart-sparkline chart-sparkline-sm"
                                        id="sparkline-bounce-rate-2" style="min-height: 24px;">
                                        <div id="apexchartsl4vtghx"
                                            class="apexcharts-canvas apexchartsl4vtghx apexcharts-theme-light"
                                            style="width: 64px; height: 24px;"><svg id="SvgjsSvg5839"
                                                width="64" height="24"
                                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                style="background: transparent;">
                                                <g id="SvgjsG5841"
                                                    class="apexcharts-inner apexcharts-graphical"
                                                    transform="translate(0, 0)">
                                                    <defs id="SvgjsDefs5840">
                                                        <clipPath id="gridRectMaskl4vtghx">
                                                            <rect id="SvgjsRect5846" width="70"
                                                                height="26" x="-3"
                                                                y="-1" rx="0"
                                                                ry="0" opacity="1"
                                                                stroke-width="0" stroke="none"
                                                                stroke-dasharray="0" fill="#fff"></rect>
                                                        </clipPath>
                                                        <clipPath id="forecastMaskl4vtghx"></clipPath>
                                                        <clipPath id="nonForecastMaskl4vtghx"></clipPath>
                                                        <clipPath id="gridRectMarkerMaskl4vtghx">
                                                            <rect id="SvgjsRect5847" width="68"
                                                                height="28" x="-2"
                                                                y="-2" rx="0"
                                                                ry="0" opacity="1"
                                                                stroke-width="0" stroke="none"
                                                                stroke-dasharray="0" fill="#fff"></rect>
                                                        </clipPath>
                                                    </defs>
                                                    <line id="SvgjsLine5845" x1="0" y1="0"
                                                        x2="0" y2="24" stroke="#b6b6b6"
                                                        stroke-dasharray="3" stroke-linecap="butt"
                                                        class="apexcharts-xcrosshairs" x="0"
                                                        y="0" width="1" height="24"
                                                        fill="#b1b9c4" filter="none" fill-opacity="0.9"
                                                        stroke-width="1"></line>
                                                    <g id="SvgjsG5853" class="apexcharts-xaxis"
                                                        transform="translate(0, 0)">
                                                        <g id="SvgjsG5854" class="apexcharts-xaxis-texts-g"
                                                            transform="translate(0, -4)"></g>
                                                    </g>
                                                    <g id="SvgjsG5865" class="apexcharts-grid">
                                                        <g id="SvgjsG5866"
                                                            class="apexcharts-gridlines-horizontal"
                                                            style="display: none;">
                                                            <line id="SvgjsLine5868" x1="0"
                                                                y1="0" x2="64"
                                                                y2="0" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine5869" x1="0"
                                                                y1="4.8" x2="64"
                                                                y2="4.8" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine5870" x1="0"
                                                                y1="9.6" x2="64"
                                                                y2="9.6" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine5871" x1="0"
                                                                y1="14.399999999999999" x2="64"
                                                                y2="14.399999999999999" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine5872" x1="0"
                                                                y1="19.2" x2="64"
                                                                y2="19.2" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine5873" x1="0"
                                                                y1="24" x2="64"
                                                                y2="24" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                        </g>
                                                        <g id="SvgjsG5867"
                                                            class="apexcharts-gridlines-vertical"
                                                            style="display: none;"></g>
                                                        <line id="SvgjsLine5875" x1="0"
                                                            y1="24" x2="64" y2="24"
                                                            stroke="transparent" stroke-dasharray="0"
                                                            stroke-linecap="butt"></line>
                                                        <line id="SvgjsLine5874" x1="0"
                                                            y1="1" x2="0" y2="24"
                                                            stroke="transparent" stroke-dasharray="0"
                                                            stroke-linecap="butt"></line>
                                                    </g>
                                                    <g id="SvgjsG5848"
                                                        class="apexcharts-line-series apexcharts-plot-series">
                                                        <g id="SvgjsG5849" class="apexcharts-series"
                                                            seriesName="seriesx1" data:longestSeries="true"
                                                            rel="1" data:realIndex="0">
                                                            <path id="SvgjsPath5852"
                                                                d="M 0 11.520000000000001L 8 13.440000000000001L 16 5.760000000000002L 24 2.8800000000000026L 32 12.48L 40 17.28L 48 10.56L 56 21.12L 64 3.84"
                                                                fill="none" fill-opacity="1"
                                                                stroke="rgba(32,107,196,0.85)"
                                                                stroke-opacity="1" stroke-linecap="round"
                                                                stroke-width="2" stroke-dasharray="0"
                                                                class="apexcharts-line" index="0"
                                                                clip-path="url(#gridRectMaskl4vtghx)"
                                                                pathTo="M 0 11.520000000000001L 8 13.440000000000001L 16 5.760000000000002L 24 2.8800000000000026L 32 12.48L 40 17.28L 48 10.56L 56 21.12L 64 3.84"
                                                                pathFrom="M -1 24L -1 24L 8 24L 16 24L 24 24L 32 24L 40 24L 48 24L 56 24L 64 24">
                                                            </path>
                                                            <g id="SvgjsG5850"
                                                                class="apexcharts-series-markers-wrap"
                                                                data:realIndex="0"></g>
                                                        </g>
                                                        <g id="SvgjsG5851" class="apexcharts-datalabels"
                                                            data:realIndex="0"></g>
                                                    </g>
                                                    <line id="SvgjsLine5876" x1="0" y1="0"
                                                        x2="64" y2="0" stroke="#b6b6b6"
                                                        stroke-dasharray="0" stroke-width="1"
                                                        stroke-linecap="butt"
                                                        class="apexcharts-ycrosshairs"></line>
                                                    <line id="SvgjsLine5877" x1="0" y1="0"
                                                        x2="64" y2="0" stroke-dasharray="0"
                                                        stroke-width="0" stroke-linecap="butt"
                                                        class="apexcharts-ycrosshairs-hidden"></line>
                                                    <g id="SvgjsG5878" class="apexcharts-yaxis-annotations">
                                                    </g>
                                                    <g id="SvgjsG5879" class="apexcharts-xaxis-annotations">
                                                    </g>
                                                    <g id="SvgjsG5880" class="apexcharts-point-annotations">
                                                    </g>
                                                </g>
                                                <rect id="SvgjsRect5844" width="0" height="0"
                                                    x="0" y="0" rx="0"
                                                    ry="0" opacity="1" stroke-width="0"
                                                    stroke="none" stroke-dasharray="0" fill="#fefefe">
                                                </rect>
                                                <g id="SvgjsG5864" class="apexcharts-yaxis" rel="0"
                                                    transform="translate(-18, 0)"></g>
                                                <g id="SvgjsG5842" class="apexcharts-annotations"></g>
                                            </svg>
                                            <div class="apexcharts-legend" style="max-height: 12px;"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    /news/1,new-ui-kit.html
                                    <a href="#" class="ms-1" aria-label="Open website">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/link -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                            width="24" height="24" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5">
                                            </path>
                                            <path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5">
                                            </path>
                                        </svg>
                                    </a>
                                </td>
                                <td class="text-muted">3,256</td>
                                <td class="text-muted">2,865</td>
                                <td class="text-muted">72.65%</td>
                                <td class="text-end w-1">
                                    <div class="chart-sparkline chart-sparkline-sm"
                                        id="sparkline-bounce-rate-3" style="min-height: 24px;">
                                        <div id="apexchartsbd68lnxfh"
                                            class="apexcharts-canvas apexchartsbd68lnxfh apexcharts-theme-light"
                                            style="width: 64px; height: 24px;"><svg id="SvgjsSvg5881"
                                                width="64" height="24"
                                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                style="background: transparent;">
                                                <g id="SvgjsG5883"
                                                    class="apexcharts-inner apexcharts-graphical"
                                                    transform="translate(0, 0)">
                                                    <defs id="SvgjsDefs5882">
                                                        <clipPath id="gridRectMaskbd68lnxfh">
                                                            <rect id="SvgjsRect5888" width="70"
                                                                height="26" x="-3"
                                                                y="-1" rx="0"
                                                                ry="0" opacity="1"
                                                                stroke-width="0" stroke="none"
                                                                stroke-dasharray="0" fill="#fff"></rect>
                                                        </clipPath>
                                                        <clipPath id="forecastMaskbd68lnxfh"></clipPath>
                                                        <clipPath id="nonForecastMaskbd68lnxfh"></clipPath>
                                                        <clipPath id="gridRectMarkerMaskbd68lnxfh">
                                                            <rect id="SvgjsRect5889" width="68"
                                                                height="28" x="-2"
                                                                y="-2" rx="0"
                                                                ry="0" opacity="1"
                                                                stroke-width="0" stroke="none"
                                                                stroke-dasharray="0" fill="#fff"></rect>
                                                        </clipPath>
                                                    </defs>
                                                    <line id="SvgjsLine5887" x1="0" y1="0"
                                                        x2="0" y2="24" stroke="#b6b6b6"
                                                        stroke-dasharray="3" stroke-linecap="butt"
                                                        class="apexcharts-xcrosshairs" x="0"
                                                        y="0" width="1" height="24"
                                                        fill="#b1b9c4" filter="none" fill-opacity="0.9"
                                                        stroke-width="1"></line>
                                                    <g id="SvgjsG5895" class="apexcharts-xaxis"
                                                        transform="translate(0, 0)">
                                                        <g id="SvgjsG5896" class="apexcharts-xaxis-texts-g"
                                                            transform="translate(0, -4)"></g>
                                                    </g>
                                                    <g id="SvgjsG5907" class="apexcharts-grid">
                                                        <g id="SvgjsG5908"
                                                            class="apexcharts-gridlines-horizontal"
                                                            style="display: none;">
                                                            <line id="SvgjsLine5910" x1="0"
                                                                y1="0" x2="64"
                                                                y2="0" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine5911" x1="0"
                                                                y1="4.8" x2="64"
                                                                y2="4.8" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine5912" x1="0"
                                                                y1="9.6" x2="64"
                                                                y2="9.6" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine5913" x1="0"
                                                                y1="14.399999999999999" x2="64"
                                                                y2="14.399999999999999" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine5914" x1="0"
                                                                y1="19.2" x2="64"
                                                                y2="19.2" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine5915" x1="0"
                                                                y1="24" x2="64"
                                                                y2="24" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                        </g>
                                                        <g id="SvgjsG5909"
                                                            class="apexcharts-gridlines-vertical"
                                                            style="display: none;"></g>
                                                        <line id="SvgjsLine5917" x1="0"
                                                            y1="24" x2="64" y2="24"
                                                            stroke="transparent" stroke-dasharray="0"
                                                            stroke-linecap="butt"></line>
                                                        <line id="SvgjsLine5916" x1="0"
                                                            y1="1" x2="0" y2="24"
                                                            stroke="transparent" stroke-dasharray="0"
                                                            stroke-linecap="butt"></line>
                                                    </g>
                                                    <g id="SvgjsG5890"
                                                        class="apexcharts-line-series apexcharts-plot-series">
                                                        <g id="SvgjsG5891" class="apexcharts-series"
                                                            seriesName="seriesx1" data:longestSeries="true"
                                                            rel="1" data:realIndex="0">
                                                            <path id="SvgjsPath5894"
                                                                d="M 0 14.4L 8 11.520000000000001L 16 14.4L 24 20.16L 32 7.68L 40 21.12L 48 1.9200000000000017L 56 2.8800000000000026L 64 5.760000000000002"
                                                                fill="none" fill-opacity="1"
                                                                stroke="rgba(32,107,196,0.85)"
                                                                stroke-opacity="1" stroke-linecap="round"
                                                                stroke-width="2" stroke-dasharray="0"
                                                                class="apexcharts-line" index="0"
                                                                clip-path="url(#gridRectMaskbd68lnxfh)"
                                                                pathTo="M 0 14.4L 8 11.520000000000001L 16 14.4L 24 20.16L 32 7.68L 40 21.12L 48 1.9200000000000017L 56 2.8800000000000026L 64 5.760000000000002"
                                                                pathFrom="M -1 24L -1 24L 8 24L 16 24L 24 24L 32 24L 40 24L 48 24L 56 24L 64 24">
                                                            </path>
                                                            <g id="SvgjsG5892"
                                                                class="apexcharts-series-markers-wrap"
                                                                data:realIndex="0"></g>
                                                        </g>
                                                        <g id="SvgjsG5893" class="apexcharts-datalabels"
                                                            data:realIndex="0"></g>
                                                    </g>
                                                    <line id="SvgjsLine5918" x1="0" y1="0"
                                                        x2="64" y2="0" stroke="#b6b6b6"
                                                        stroke-dasharray="0" stroke-width="1"
                                                        stroke-linecap="butt"
                                                        class="apexcharts-ycrosshairs"></line>
                                                    <line id="SvgjsLine5919" x1="0" y1="0"
                                                        x2="64" y2="0" stroke-dasharray="0"
                                                        stroke-width="0" stroke-linecap="butt"
                                                        class="apexcharts-ycrosshairs-hidden"></line>
                                                    <g id="SvgjsG5920" class="apexcharts-yaxis-annotations">
                                                    </g>
                                                    <g id="SvgjsG5921" class="apexcharts-xaxis-annotations">
                                                    </g>
                                                    <g id="SvgjsG5922" class="apexcharts-point-annotations">
                                                    </g>
                                                </g>
                                                <rect id="SvgjsRect5886" width="0" height="0"
                                                    x="0" y="0" rx="0"
                                                    ry="0" opacity="1" stroke-width="0"
                                                    stroke="none" stroke-dasharray="0" fill="#fefefe">
                                                </rect>
                                                <g id="SvgjsG5906" class="apexcharts-yaxis" rel="0"
                                                    transform="translate(-18, 0)"></g>
                                                <g id="SvgjsG5884" class="apexcharts-annotations"></g>
                                            </svg>
                                            <div class="apexcharts-legend" style="max-height: 12px;"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    /lorem-ipsum-dolor-sit-amet-very-long-url.html
                                    <a href="#" class="ms-1" aria-label="Open website">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/link -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                            width="24" height="24" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5">
                                            </path>
                                            <path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5">
                                            </path>
                                        </svg>
                                    </a>
                                </td>
                                <td class="text-muted">986</td>
                                <td class="text-muted">865</td>
                                <td class="text-muted">44.89%</td>
                                <td class="text-end w-1">
                                    <div class="chart-sparkline chart-sparkline-sm"
                                        id="sparkline-bounce-rate-4" style="min-height: 24px;">
                                        <div id="apexchartsihp1zfmc"
                                            class="apexcharts-canvas apexchartsihp1zfmc apexcharts-theme-light"
                                            style="width: 64px; height: 24px;"><svg id="SvgjsSvg5923"
                                                width="64" height="24"
                                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                style="background: transparent;">
                                                <g id="SvgjsG5925"
                                                    class="apexcharts-inner apexcharts-graphical"
                                                    transform="translate(0, 0)">
                                                    <defs id="SvgjsDefs5924">
                                                        <clipPath id="gridRectMaskihp1zfmc">
                                                            <rect id="SvgjsRect5930" width="70"
                                                                height="26" x="-3"
                                                                y="-1" rx="0"
                                                                ry="0" opacity="1"
                                                                stroke-width="0" stroke="none"
                                                                stroke-dasharray="0" fill="#fff"></rect>
                                                        </clipPath>
                                                        <clipPath id="forecastMaskihp1zfmc"></clipPath>
                                                        <clipPath id="nonForecastMaskihp1zfmc"></clipPath>
                                                        <clipPath id="gridRectMarkerMaskihp1zfmc">
                                                            <rect id="SvgjsRect5931" width="68"
                                                                height="28" x="-2"
                                                                y="-2" rx="0"
                                                                ry="0" opacity="1"
                                                                stroke-width="0" stroke="none"
                                                                stroke-dasharray="0" fill="#fff"></rect>
                                                        </clipPath>
                                                    </defs>
                                                    <line id="SvgjsLine5929" x1="0" y1="0"
                                                        x2="0" y2="24" stroke="#b6b6b6"
                                                        stroke-dasharray="3" stroke-linecap="butt"
                                                        class="apexcharts-xcrosshairs" x="0"
                                                        y="0" width="1" height="24"
                                                        fill="#b1b9c4" filter="none" fill-opacity="0.9"
                                                        stroke-width="1"></line>
                                                    <g id="SvgjsG5937" class="apexcharts-xaxis"
                                                        transform="translate(0, 0)">
                                                        <g id="SvgjsG5938" class="apexcharts-xaxis-texts-g"
                                                            transform="translate(0, -4)"></g>
                                                    </g>
                                                    <g id="SvgjsG5949" class="apexcharts-grid">
                                                        <g id="SvgjsG5950"
                                                            class="apexcharts-gridlines-horizontal"
                                                            style="display: none;">
                                                            <line id="SvgjsLine5952" x1="0"
                                                                y1="0" x2="64"
                                                                y2="0" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine5953" x1="0"
                                                                y1="6" x2="64"
                                                                y2="6" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine5954" x1="0"
                                                                y1="12" x2="64"
                                                                y2="12" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine5955" x1="0"
                                                                y1="18" x2="64"
                                                                y2="18" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine5956" x1="0"
                                                                y1="24" x2="64"
                                                                y2="24" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                        </g>
                                                        <g id="SvgjsG5951"
                                                            class="apexcharts-gridlines-vertical"
                                                            style="display: none;"></g>
                                                        <line id="SvgjsLine5958" x1="0"
                                                            y1="24" x2="64" y2="24"
                                                            stroke="transparent" stroke-dasharray="0"
                                                            stroke-linecap="butt"></line>
                                                        <line id="SvgjsLine5957" x1="0"
                                                            y1="1" x2="0" y2="24"
                                                            stroke="transparent" stroke-dasharray="0"
                                                            stroke-linecap="butt"></line>
                                                    </g>
                                                    <g id="SvgjsG5932"
                                                        class="apexcharts-line-series apexcharts-plot-series">
                                                        <g id="SvgjsG5933" class="apexcharts-series"
                                                            seriesName="seriesx1" data:longestSeries="true"
                                                            rel="1" data:realIndex="0">
                                                            <path id="SvgjsPath5936"
                                                                d="M 0 21L 8 7.5L 16 10.5L 24 10.5L 32 22.5L 40 19.5L 48 4.5L 56 0L 64 1.5"
                                                                fill="none" fill-opacity="1"
                                                                stroke="rgba(32,107,196,0.85)"
                                                                stroke-opacity="1" stroke-linecap="round"
                                                                stroke-width="2" stroke-dasharray="0"
                                                                class="apexcharts-line" index="0"
                                                                clip-path="url(#gridRectMaskihp1zfmc)"
                                                                pathTo="M 0 21L 8 7.5L 16 10.5L 24 10.5L 32 22.5L 40 19.5L 48 4.5L 56 0L 64 1.5"
                                                                pathFrom="M -1 30L -1 30L 8 30L 16 30L 24 30L 32 30L 40 30L 48 30L 56 30L 64 30">
                                                            </path>
                                                            <g id="SvgjsG5934"
                                                                class="apexcharts-series-markers-wrap"
                                                                data:realIndex="0"></g>
                                                        </g>
                                                        <g id="SvgjsG5935" class="apexcharts-datalabels"
                                                            data:realIndex="0"></g>
                                                    </g>
                                                    <line id="SvgjsLine5959" x1="0" y1="0"
                                                        x2="64" y2="0" stroke="#b6b6b6"
                                                        stroke-dasharray="0" stroke-width="1"
                                                        stroke-linecap="butt"
                                                        class="apexcharts-ycrosshairs"></line>
                                                    <line id="SvgjsLine5960" x1="0" y1="0"
                                                        x2="64" y2="0" stroke-dasharray="0"
                                                        stroke-width="0" stroke-linecap="butt"
                                                        class="apexcharts-ycrosshairs-hidden"></line>
                                                    <g id="SvgjsG5961" class="apexcharts-yaxis-annotations">
                                                    </g>
                                                    <g id="SvgjsG5962" class="apexcharts-xaxis-annotations">
                                                    </g>
                                                    <g id="SvgjsG5963" class="apexcharts-point-annotations">
                                                    </g>
                                                </g>
                                                <rect id="SvgjsRect5928" width="0" height="0"
                                                    x="0" y="0" rx="0"
                                                    ry="0" opacity="1" stroke-width="0"
                                                    stroke="none" stroke-dasharray="0" fill="#fefefe">
                                                </rect>
                                                <g id="SvgjsG5948" class="apexcharts-yaxis" rel="0"
                                                    transform="translate(-18, 0)"></g>
                                                <g id="SvgjsG5926" class="apexcharts-annotations"></g>
                                            </svg>
                                            <div class="apexcharts-legend" style="max-height: 12px;"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    /colors.html
                                    <a href="#" class="ms-1" aria-label="Open website">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/link -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                            width="24" height="24" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5">
                                            </path>
                                            <path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5">
                                            </path>
                                        </svg>
                                    </a>
                                </td>
                                <td class="text-muted">912</td>
                                <td class="text-muted">822</td>
                                <td class="text-muted">41.12%</td>
                                <td class="text-end w-1">
                                    <div class="chart-sparkline chart-sparkline-sm"
                                        id="sparkline-bounce-rate-5" style="min-height: 24px;">
                                        <div id="apexchartsm449o3bu"
                                            class="apexcharts-canvas apexchartsm449o3bu apexcharts-theme-light"
                                            style="width: 64px; height: 24px;"><svg id="SvgjsSvg5234"
                                                width="64" height="24"
                                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                style="background: transparent;">
                                                <g id="SvgjsG5236"
                                                    class="apexcharts-inner apexcharts-graphical"
                                                    transform="translate(0, 0)">
                                                    <defs id="SvgjsDefs5235">
                                                        <clipPath id="gridRectMaskm449o3bu">
                                                            <rect id="SvgjsRect5242" width="70"
                                                                height="26" x="-3"
                                                                y="-1" rx="0"
                                                                ry="0" opacity="1"
                                                                stroke-width="0" stroke="none"
                                                                stroke-dasharray="0" fill="#fff"></rect>
                                                        </clipPath>
                                                        <clipPath id="forecastMaskm449o3bu"></clipPath>
                                                        <clipPath id="nonForecastMaskm449o3bu"></clipPath>
                                                        <clipPath id="gridRectMarkerMaskm449o3bu">
                                                            <rect id="SvgjsRect5243" width="68"
                                                                height="28" x="-2"
                                                                y="-2" rx="0"
                                                                ry="0" opacity="1"
                                                                stroke-width="0" stroke="none"
                                                                stroke-dasharray="0" fill="#fff"></rect>
                                                        </clipPath>
                                                    </defs>
                                                    <line id="SvgjsLine5241" x1="0" y1="0"
                                                        x2="0" y2="24" stroke="#b6b6b6"
                                                        stroke-dasharray="3" stroke-linecap="butt"
                                                        class="apexcharts-xcrosshairs" x="0"
                                                        y="0" width="1" height="24"
                                                        fill="#b1b9c4" filter="none" fill-opacity="0.9"
                                                        stroke-width="1"></line>
                                                    <g id="SvgjsG5249" class="apexcharts-xaxis"
                                                        transform="translate(0, 0)">
                                                        <g id="SvgjsG5250" class="apexcharts-xaxis-texts-g"
                                                            transform="translate(0, 4)"></g>
                                                    </g>
                                                    <g id="SvgjsG5262" class="apexcharts-grid">
                                                        <g id="SvgjsG5263"
                                                            class="apexcharts-gridlines-horizontal"
                                                            style="display: none;">
                                                            <line id="SvgjsLine5265" x1="0"
                                                                y1="0" x2="64"
                                                                y2="0" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine5266" x1="0"
                                                                y1="4.8" x2="64"
                                                                y2="4.8" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine5267" x1="0"
                                                                y1="9.6" x2="64"
                                                                y2="9.6" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine5268" x1="0"
                                                                y1="14.399999999999999" x2="64"
                                                                y2="14.399999999999999" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine5269" x1="0"
                                                                y1="19.2" x2="64"
                                                                y2="19.2" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine5270" x1="0"
                                                                y1="24" x2="64"
                                                                y2="24" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                        </g>
                                                        <g id="SvgjsG5264"
                                                            class="apexcharts-gridlines-vertical"
                                                            style="display: none;"></g>
                                                        <line id="SvgjsLine5272" x1="0"
                                                            y1="24" x2="64" y2="24"
                                                            stroke="transparent" stroke-dasharray="0"
                                                            stroke-linecap="butt"></line>
                                                        <line id="SvgjsLine5271" x1="0"
                                                            y1="1" x2="0" y2="24"
                                                            stroke="transparent" stroke-dasharray="0"
                                                            stroke-linecap="butt"></line>
                                                    </g>
                                                    <g id="SvgjsG5244"
                                                        class="apexcharts-line-series apexcharts-plot-series">
                                                        <g id="SvgjsG5245" class="apexcharts-series"
                                                            seriesName="seriesx1" data:longestSeries="true"
                                                            rel="1" data:realIndex="0">
                                                            <path id="SvgjsPath5248"
                                                                d="M 0 22.08L 7.111111111111111 13.440000000000001L 14.222222222222221 9.600000000000001L 21.333333333333332 10.56L 28.444444444444443 3.84L 35.55555555555556 4.800000000000001L 42.666666666666664 16.32L 49.77777777777778 1.9200000000000017L 56.888888888888886 6.720000000000002L 64 10.56"
                                                                fill="none" fill-opacity="1"
                                                                stroke="rgba(32,107,196,0.85)"
                                                                stroke-opacity="1" stroke-linecap="round"
                                                                stroke-width="2" stroke-dasharray="0"
                                                                class="apexcharts-line" index="0"
                                                                clip-path="url(#gridRectMaskm449o3bu)"
                                                                pathTo="M 0 22.08L 7.111111111111111 13.440000000000001L 14.222222222222221 9.600000000000001L 21.333333333333332 10.56L 28.444444444444443 3.84L 35.55555555555556 4.800000000000001L 42.666666666666664 16.32L 49.77777777777778 1.9200000000000017L 56.888888888888886 6.720000000000002L 64 10.56"
                                                                pathFrom="M -1 24L -1 24L 7.111111111111111 24L 14.222222222222221 24L 21.333333333333332 24L 28.444444444444443 24L 35.55555555555556 24L 42.666666666666664 24L 49.77777777777778 24L 56.888888888888886 24L 64 24">
                                                            </path>
                                                            <g id="SvgjsG5246"
                                                                class="apexcharts-series-markers-wrap"
                                                                data:realIndex="0"></g>
                                                        </g>
                                                        <g id="SvgjsG5247" class="apexcharts-datalabels"
                                                            data:realIndex="0"></g>
                                                    </g>
                                                    <line id="SvgjsLine5273" x1="0" y1="0"
                                                        x2="64" y2="0" stroke="#b6b6b6"
                                                        stroke-dasharray="0" stroke-width="1"
                                                        stroke-linecap="butt"
                                                        class="apexcharts-ycrosshairs"></line>
                                                    <line id="SvgjsLine5274" x1="0" y1="0"
                                                        x2="64" y2="0" stroke-dasharray="0"
                                                        stroke-width="0" stroke-linecap="butt"
                                                        class="apexcharts-ycrosshairs-hidden"></line>
                                                    <g id="SvgjsG5275" class="apexcharts-yaxis-annotations">
                                                    </g>
                                                    <g id="SvgjsG5276" class="apexcharts-xaxis-annotations">
                                                    </g>
                                                    <g id="SvgjsG5277" class="apexcharts-point-annotations">
                                                    </g>
                                                </g>
                                                <rect id="SvgjsRect5240" width="0" height="0"
                                                    x="0" y="0" rx="0"
                                                    ry="0" opacity="1" stroke-width="0"
                                                    stroke="none" stroke-dasharray="0" fill="#fefefe">
                                                </rect>
                                                <g id="SvgjsG5261" class="apexcharts-yaxis" rel="0"
                                                    transform="translate(-18, 0)"></g>
                                                <g id="SvgjsG5237" class="apexcharts-annotations"></g>
                                            </svg>
                                            <div class="apexcharts-legend" style="max-height: 12px;"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    /docs/index.html
                                    <a href="#" class="ms-1" aria-label="Open website">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/link -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                            width="24" height="24" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5">
                                            </path>
                                            <path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5">
                                            </path>
                                        </svg>
                                    </a>
                                </td>
                                <td class="text-muted">855</td>
                                <td class="text-muted">798</td>
                                <td class="text-muted">32.65%</td>
                                <td class="text-end w-1">
                                    <div class="chart-sparkline chart-sparkline-sm"
                                        id="sparkline-bounce-rate-6" style="min-height: 24px;">
                                        <div id="apexcharts211mz9op"
                                            class="apexcharts-canvas apexcharts211mz9op apexcharts-theme-light"
                                            style="width: 64px; height: 24px;"><svg id="SvgjsSvg5964"
                                                width="64" height="24"
                                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                style="background: transparent;">
                                                <g id="SvgjsG5966"
                                                    class="apexcharts-inner apexcharts-graphical"
                                                    transform="translate(0, 0)">
                                                    <defs id="SvgjsDefs5965">
                                                        <clipPath id="gridRectMask211mz9op">
                                                            <rect id="SvgjsRect5972" width="70"
                                                                height="26" x="-3"
                                                                y="-1" rx="0"
                                                                ry="0" opacity="1"
                                                                stroke-width="0" stroke="none"
                                                                stroke-dasharray="0" fill="#fff"></rect>
                                                        </clipPath>
                                                        <clipPath id="forecastMask211mz9op"></clipPath>
                                                        <clipPath id="nonForecastMask211mz9op"></clipPath>
                                                        <clipPath id="gridRectMarkerMask211mz9op">
                                                            <rect id="SvgjsRect5973" width="68"
                                                                height="28" x="-2"
                                                                y="-2" rx="0"
                                                                ry="0" opacity="1"
                                                                stroke-width="0" stroke="none"
                                                                stroke-dasharray="0" fill="#fff"></rect>
                                                        </clipPath>
                                                    </defs>
                                                    <line id="SvgjsLine5971" x1="0" y1="0"
                                                        x2="0" y2="24" stroke="#b6b6b6"
                                                        stroke-dasharray="3" stroke-linecap="butt"
                                                        class="apexcharts-xcrosshairs" x="0"
                                                        y="0" width="1" height="24"
                                                        fill="#b1b9c4" filter="none" fill-opacity="0.9"
                                                        stroke-width="1"></line>
                                                    <g id="SvgjsG5979" class="apexcharts-xaxis"
                                                        transform="translate(0, 0)">
                                                        <g id="SvgjsG5980" class="apexcharts-xaxis-texts-g"
                                                            transform="translate(0, 4)"></g>
                                                    </g>
                                                    <g id="SvgjsG5992" class="apexcharts-grid">
                                                        <g id="SvgjsG5993"
                                                            class="apexcharts-gridlines-horizontal"
                                                            style="display: none;">
                                                            <line id="SvgjsLine5995" x1="0"
                                                                y1="0" x2="64"
                                                                y2="0" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine5996" x1="0"
                                                                y1="4.8" x2="64"
                                                                y2="4.8" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine5997" x1="0"
                                                                y1="9.6" x2="64"
                                                                y2="9.6" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine5998" x1="0"
                                                                y1="14.399999999999999" x2="64"
                                                                y2="14.399999999999999" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine5999" x1="0"
                                                                y1="19.2" x2="64"
                                                                y2="19.2" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine6000" x1="0"
                                                                y1="24" x2="64"
                                                                y2="24" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                        </g>
                                                        <g id="SvgjsG5994"
                                                            class="apexcharts-gridlines-vertical"
                                                            style="display: none;"></g>
                                                        <line id="SvgjsLine6002" x1="0"
                                                            y1="24" x2="64" y2="24"
                                                            stroke="transparent" stroke-dasharray="0"
                                                            stroke-linecap="butt"></line>
                                                        <line id="SvgjsLine6001" x1="0"
                                                            y1="1" x2="0" y2="24"
                                                            stroke="transparent" stroke-dasharray="0"
                                                            stroke-linecap="butt"></line>
                                                    </g>
                                                    <g id="SvgjsG5974"
                                                        class="apexcharts-line-series apexcharts-plot-series">
                                                        <g id="SvgjsG5975" class="apexcharts-series"
                                                            seriesName="seriesx1" data:longestSeries="true"
                                                            rel="1" data:realIndex="0">
                                                            <path id="SvgjsPath5978"
                                                                d="M 0 2.8800000000000026L 7.111111111111111 12.48L 14.222222222222221 17.28L 21.333333333333332 10.56L 28.444444444444443 21.12L 35.55555555555556 3.84L 42.666666666666664 16.32L 49.77777777777778 1.9200000000000017L 56.888888888888886 6.720000000000002L 64 10.56"
                                                                fill="none" fill-opacity="1"
                                                                stroke="rgba(32,107,196,0.85)"
                                                                stroke-opacity="1" stroke-linecap="round"
                                                                stroke-width="2" stroke-dasharray="0"
                                                                class="apexcharts-line" index="0"
                                                                clip-path="url(#gridRectMask211mz9op)"
                                                                pathTo="M 0 2.8800000000000026L 7.111111111111111 12.48L 14.222222222222221 17.28L 21.333333333333332 10.56L 28.444444444444443 21.12L 35.55555555555556 3.84L 42.666666666666664 16.32L 49.77777777777778 1.9200000000000017L 56.888888888888886 6.720000000000002L 64 10.56"
                                                                pathFrom="M -1 24L -1 24L 7.111111111111111 24L 14.222222222222221 24L 21.333333333333332 24L 28.444444444444443 24L 35.55555555555556 24L 42.666666666666664 24L 49.77777777777778 24L 56.888888888888886 24L 64 24">
                                                            </path>
                                                            <g id="SvgjsG5976"
                                                                class="apexcharts-series-markers-wrap"
                                                                data:realIndex="0"></g>
                                                        </g>
                                                        <g id="SvgjsG5977" class="apexcharts-datalabels"
                                                            data:realIndex="0"></g>
                                                    </g>
                                                    <line id="SvgjsLine6003" x1="0" y1="0"
                                                        x2="64" y2="0" stroke="#b6b6b6"
                                                        stroke-dasharray="0" stroke-width="1"
                                                        stroke-linecap="butt"
                                                        class="apexcharts-ycrosshairs"></line>
                                                    <line id="SvgjsLine6004" x1="0" y1="0"
                                                        x2="64" y2="0" stroke-dasharray="0"
                                                        stroke-width="0" stroke-linecap="butt"
                                                        class="apexcharts-ycrosshairs-hidden"></line>
                                                    <g id="SvgjsG6005" class="apexcharts-yaxis-annotations">
                                                    </g>
                                                    <g id="SvgjsG6006" class="apexcharts-xaxis-annotations">
                                                    </g>
                                                    <g id="SvgjsG6007" class="apexcharts-point-annotations">
                                                    </g>
                                                </g>
                                                <rect id="SvgjsRect5970" width="0" height="0"
                                                    x="0" y="0" rx="0"
                                                    ry="0" opacity="1" stroke-width="0"
                                                    stroke="none" stroke-dasharray="0" fill="#fefefe">
                                                </rect>
                                                <g id="SvgjsG5991" class="apexcharts-yaxis" rel="0"
                                                    transform="translate(-18, 0)"></g>
                                                <g id="SvgjsG5967" class="apexcharts-annotations"></g>
                                            </svg>
                                            <div class="apexcharts-legend" style="max-height: 12px;"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Invoices</h3>
                </div>
                <div class="card-body border-bottom py-3">
                    <div class="d-flex">
                        <div class="text-muted">
                            Show
                            <div class="mx-2 d-inline-block">
                                <input type="text" class="form-control form-control-sm" value="8"
                                    size="3" aria-label="Invoices count">
                            </div>
                            entries
                        </div>
                        <div class="ms-auto text-muted">
                            Search:
                            <div class="ms-2 d-inline-block">
                                <input type="text" class="form-control form-control-sm"
                                    aria-label="Search invoice">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                            <tr>
                                <th class="w-1"><input class="form-check-input m-0 align-middle"
                                        type="checkbox" aria-label="Select all invoices"></th>
                                <th class="w-1">No.
                                    <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-sm text-dark icon-thick" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="6 15 12 9 18 15"></polyline>
                                    </svg>
                                </th>
                                <th>Invoice Subject</th>
                                <th>Client</th>
                                <th>VAT No.</th>
                                <th>Created</th>
                                <th>Status</th>
                                <th>Price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                        aria-label="Select invoice"></td>
                                <td><span class="text-muted">001401</span></td>
                                <td><a href="invoice.html" class="text-reset" tabindex="-1">Design
                                        Works</a></td>
                                <td>
                                    <span class="flag flag-country-us"></span>
                                    Carlson Limited
                                </td>
                                <td>
                                    87956621
                                </td>
                                <td>
                                    15 Dec 2017
                                </td>
                                <td>
                                    <span class="badge bg-success me-1"></span> Paid
                                </td>
                                <td>$887</td>
                                <td class="text-end">
                                    <span class="dropdown">
                                        <button class="btn dropdown-toggle align-text-top"
                                            data-bs-boundary="viewport"
                                            data-bs-toggle="dropdown">Actions</button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">
                                                Action
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                Another action
                                            </a>
                                        </div>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                        aria-label="Select invoice"></td>
                                <td><span class="text-muted">001402</span></td>
                                <td><a href="invoice.html" class="text-reset" tabindex="-1">UX
                                        Wireframes</a></td>
                                <td>
                                    <span class="flag flag-country-gb"></span>
                                    Adobe
                                </td>
                                <td>
                                    87956421
                                </td>
                                <td>
                                    12 Apr 2017
                                </td>
                                <td>
                                    <span class="badge bg-warning me-1"></span> Pending
                                </td>
                                <td>$1200</td>
                                <td class="text-end">
                                    <span class="dropdown">
                                        <button class="btn dropdown-toggle align-text-top"
                                            data-bs-boundary="viewport"
                                            data-bs-toggle="dropdown">Actions</button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">
                                                Action
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                Another action
                                            </a>
                                        </div>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                        aria-label="Select invoice"></td>
                                <td><span class="text-muted">001403</span></td>
                                <td><a href="invoice.html" class="text-reset" tabindex="-1">New
                                        Dashboard</a></td>
                                <td>
                                    <span class="flag flag-country-de"></span>
                                    Bluewolf
                                </td>
                                <td>
                                    87952621
                                </td>
                                <td>
                                    23 Oct 2017
                                </td>
                                <td>
                                    <span class="badge bg-warning me-1"></span> Pending
                                </td>
                                <td>$534</td>
                                <td class="text-end">
                                    <span class="dropdown">
                                        <button class="btn dropdown-toggle align-text-top"
                                            data-bs-boundary="viewport"
                                            data-bs-toggle="dropdown">Actions</button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">
                                                Action
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                Another action
                                            </a>
                                        </div>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                        aria-label="Select invoice"></td>
                                <td><span class="text-muted">001404</span></td>
                                <td><a href="invoice.html" class="text-reset" tabindex="-1">Landing
                                        Page</a></td>
                                <td>
                                    <span class="flag flag-country-br"></span>
                                    Salesforce
                                </td>
                                <td>
                                    87953421
                                </td>
                                <td>
                                    2 Sep 2017
                                </td>
                                <td>
                                    <span class="badge bg-secondary me-1"></span> Due in 2 Weeks
                                </td>
                                <td>$1500</td>
                                <td class="text-end">
                                    <span class="dropdown">
                                        <button class="btn dropdown-toggle align-text-top"
                                            data-bs-boundary="viewport"
                                            data-bs-toggle="dropdown">Actions</button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">
                                                Action
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                Another action
                                            </a>
                                        </div>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                        aria-label="Select invoice"></td>
                                <td><span class="text-muted">001405</span></td>
                                <td><a href="invoice.html" class="text-reset" tabindex="-1">Marketing
                                        Templates</a></td>
                                <td>
                                    <span class="flag flag-country-pl"></span>
                                    Printic
                                </td>
                                <td>
                                    87956621
                                </td>
                                <td>
                                    29 Jan 2018
                                </td>
                                <td>
                                    <span class="badge bg-danger me-1"></span> Paid Today
                                </td>
                                <td>$648</td>
                                <td class="text-end">
                                    <span class="dropdown">
                                        <button class="btn dropdown-toggle align-text-top"
                                            data-bs-boundary="viewport"
                                            data-bs-toggle="dropdown">Actions</button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">
                                                Action
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                Another action
                                            </a>
                                        </div>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                        aria-label="Select invoice"></td>
                                <td><span class="text-muted">001406</span></td>
                                <td><a href="invoice.html" class="text-reset" tabindex="-1">Sales
                                        Presentation</a></td>
                                <td>
                                    <span class="flag flag-country-br"></span>
                                    Tabdaq
                                </td>
                                <td>
                                    87956621
                                </td>
                                <td>
                                    4 Feb 2018
                                </td>
                                <td>
                                    <span class="badge bg-secondary me-1"></span> Due in 3 Weeks
                                </td>
                                <td>$300</td>
                                <td class="text-end">
                                    <span class="dropdown">
                                        <button class="btn dropdown-toggle align-text-top"
                                            data-bs-boundary="viewport"
                                            data-bs-toggle="dropdown">Actions</button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">
                                                Action
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                Another action
                                            </a>
                                        </div>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                        aria-label="Select invoice"></td>
                                <td><span class="text-muted">001407</span></td>
                                <td><a href="invoice.html" class="text-reset" tabindex="-1">Logo &amp;
                                        Print</a></td>
                                <td>
                                    <span class="flag flag-country-us"></span>
                                    Apple
                                </td>
                                <td>
                                    87956621
                                </td>
                                <td>
                                    22 Mar 2018
                                </td>
                                <td>
                                    <span class="badge bg-success me-1"></span> Paid Today
                                </td>
                                <td>$2500</td>
                                <td class="text-end">
                                    <span class="dropdown">
                                        <button class="btn dropdown-toggle align-text-top"
                                            data-bs-boundary="viewport"
                                            data-bs-toggle="dropdown">Actions</button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">
                                                Action
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                Another action
                                            </a>
                                        </div>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                        aria-label="Select invoice"></td>
                                <td><span class="text-muted">001408</span></td>
                                <td><a href="invoice.html" class="text-reset" tabindex="-1">Icons</a>
                                </td>
                                <td>
                                    <span class="flag flag-country-pl"></span>
                                    Tookapic
                                </td>
                                <td>
                                    87956621
                                </td>
                                <td>
                                    13 May 2018
                                </td>
                                <td>
                                    <span class="badge bg-success me-1"></span> Paid Today
                                </td>
                                <td>$940</td>
                                <td class="text-end">
                                    <span class="dropdown">
                                        <button class="btn dropdown-toggle align-text-top"
                                            data-bs-boundary="viewport"
                                            data-bs-toggle="dropdown">Actions</button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">
                                                Action
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                Another action
                                            </a>
                                        </div>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex align-items-center">
                    <p class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of <span>16</span>
                        entries</p>
                    <ul class="pagination m-0 ms-auto">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="15 6 9 12 15 18"></polyline>
                                </svg>
                                prev
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                next
                                <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="9 6 15 12 9 18"></polyline>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
<div class="modal modal-blur fade" id="modal-report" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="example-text-input"
                        placeholder="Your report name">
                </div>
                <label class="form-label">Report type</label>
                <div class="form-selectgroup-boxes row mb-3">
                    <div class="col-lg-6">
                        <label class="form-selectgroup-item">
                            <input type="radio" name="report-type" value="1"
                                class="form-selectgroup-input" checked="">
                            <span class="form-selectgroup-label d-flex align-items-center p-3">
                                <span class="me-3">
                                    <span class="form-selectgroup-check"></span>
                                </span>
                                <span class="form-selectgroup-label-content">
                                    <span class="form-selectgroup-title strong mb-1">Simple</span>
                                    <span class="d-block text-muted">Provide only basic data needed for the
                                        report</span>
                                </span>
                            </span>
                        </label>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-selectgroup-item">
                            <input type="radio" name="report-type" value="1"
                                class="form-selectgroup-input">
                            <span class="form-selectgroup-label d-flex align-items-center p-3">
                                <span class="me-3">
                                    <span class="form-selectgroup-check"></span>
                                </span>
                                <span class="form-selectgroup-label-content">
                                    <span class="form-selectgroup-title strong mb-1">Advanced</span>
                                    <span class="d-block text-muted">Insert charts and additional advanced analyses to
                                        be inserted in the report</span>
                                </span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="mb-3">
                            <label class="form-label">Report url</label>
                            <div class="input-group input-group-flat">
                                <span class="input-group-text">
                                    https://tabler.io/reports/
                                </span>
                                <input type="text" class="form-control ps-0" value="report-01"
                                    autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label">Visibility</label>
                            <select class="form-select">
                                <option value="1" selected="">Private</option>
                                <option value="2">Public</option>
                                <option value="3">Hidden</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Client name</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Reporting period</label>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div>
                            <label class="form-label">Additional information</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Cancel
                </a>
                <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    Create new report
                </a>
            </div>
        </div>
    </div>
</div>
