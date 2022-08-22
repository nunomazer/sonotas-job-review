@extends('layouts.app')

@section('content')
    <div class="row row-deck row-cards">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('home') }}">
                        <div class="form-group row">
                            <div class="col-form-label col-1">
                                Período
                            </div>
                            <div class="col-9">
                                <select class="form-select" name="periodo">
                                    <option value="{{ now()->format('Y-m') }}" {{ $periodo ==  now()->format('Y-m') ? 'selected' : '' }}>Mês atual</option>
                                    <option value="{{ now()->subMonths(1)->format('Y-m') }}"  {{ $periodo ==  now()->subMonths(1)->format('Y-m') ? 'selected' : '' }}>Mês anterior</option>
                                </select>
                            </div>
                            <div class="col">
                                <input type="submit" class="btn btn-primary" value="Alterar período"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<!--        <div class="col-sm-6 col-lg-3">
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
        </div>-->
<!--        <div class="col-sm-6 col-lg-3">
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
                                &lt;!&ndash; Download SVG icon from http://tabler-icons.io/i/trending-up &ndash;&gt;
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
        </div>-->
<!--        <div class="col-sm-6 col-lg-3">
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
                                &lt;!&ndash; Download SVG icon from http://tabler-icons.io/i/minus &ndash;&gt;
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
        </div>-->
<!--        <div class="col-sm-6 col-lg-3">
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
                                &lt;!&ndash; Download SVG icon from http://tabler-icons.io/i/trending-up &ndash;&gt;
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
        </div>-->

        <div class="col-12">
            <div class="row row-cards">

                @include('pages.dashboard.partials.qtde-vendas')

                @include('pages.dashboard.partials.qtde-nfs')

                @include('pages.dashboard.partials.qtde-servicos')

                @include('pages.dashboard.partials.qtde-empresas')

            </div>
        </div>
        <div class="col-12">
            @include('pages.dashboard.partials.vendas-mes-por-dia')
        </div>
<!--        <div class="col-lg-6">
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
                                    &lt;!&ndash; Download SVG icon from http://tabler-icons.io/i/trending-up &ndash;&gt;
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
        </div>-->

        @include('pages.dashboard.partials.servicos-mais-vendidos')

<!--        <div class="col-12">
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
                                &lt;!&ndash; Download SVG icon from http://tabler-icons.io/i/chevron-up &ndash;&gt;
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
                                &lt;!&ndash; Download SVG icon from http://tabler-icons.io/i/chevron-left &ndash;&gt;
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
                                &lt;!&ndash; Download SVG icon from http://tabler-icons.io/i/chevron-right &ndash;&gt;
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
        </div>-->
    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@endpush
