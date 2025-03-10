<div class="app-menu">
    <!-- Sidebar -->

    <div class="navbar-vertical navbar nav-dashboard">
        <div class="h-100" data-simplebar>
            <!-- Brand logo -->
            <a class="navbar-brand" href="index-2.html">
                <img src="{{ asset('assets/images/brand/logo/logo-2.svg') }}"
                    alt="dash ui - bootstrap 5 admin dashboard template">
            </a>
            <!-- Navbar nav -->
            <ul class="navbar-nav flex-column" id="sideNavbar">

                <!-- Nav item -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                        href="{{ route('dashboard') }}">
                        <svg style="margin-right: 5px"
                            width="18" height="18"
                            viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M1 6V15H6V11C6 9.89543 6.89543 9 8 9C9.10457 9 10 9.89543 10 11V15H15V6L8 0L1 6Z"
                                     fill="{{ request()->routeIs('dashboard') ? '#624bff' : '#9199a5' }}"></path>
                            </g>
                        </svg> dashboard
                    </a>
                </li>

                <!-- Nav item users seart ............... -->
                <li class="nav-item">
                    <div class="navbar-heading">Users</div>
                </li>
                <!-- Nav item admin start -->
                <li class="nav-item">
                    <a class="nav-link has-arrow  collapsed {{ request()->routeIs('admin.user.admin.*') ? 'active' : '' }}"
                        href="#!" data-bs-toggle="collapse" data-bs-target="#admin" aria-expanded="false"
                        aria-controls="admin">
                        <svg style="margin-right:7px"
                            fill="{{ request()->routeIs('admin.user.admin.*') ? '#624bff' : '#9199a5' }}" width="18"
                            height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path
                                        d="M12 14v2a6 6 0 0 0-6 6H4a8 8 0 0 1 8-8zm0-1c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm9 6h1v5h-8v-5h1v-1a3 3 0 0 1 6 0v1zm-2 0v-1a1 1 0 0 0-2 0v1h2z">
                                    </path>
                                </g>
                            </g>
                        </svg> Admin
                    </a>

                    <div id="admin" class="collapse {{ request()->routeIs('admin.user.admin.*') ? 'show' : '' }}"
                        data-bs-parent="#sideNavbar">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link has-arrow {{ request()->routeIs('admin.user.admin.index') ? 'active' : '' }}"
                                    href="{{ route('admin.user.admin.index') }}">
                                    Admin List
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- Nav item admin end -->

                <!-- Nav item crue start -->
                <li class="nav-item">
                    <a class="nav-link has-arrow  collapsed {{ request()->routeIs('admin.user.crue.*') ? 'active' : '' }}"
                        href="#!" data-bs-toggle="collapse" data-bs-target="#crue" aria-expanded="false"
                        aria-controls="crue">
                        <svg style="margin-right: 5px"
                            fill="{{ request()->routeIs('admin.user.crue.*') ? '#624bff' : '#9199a5' }}" width="18"
                            height="18" viewBox="0 0 100 100" id="Layer_1" version="1.1" xml:space="preserve"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g id="jackhammer"></g>
                                <g id="drilling_machine"></g>
                                <g id="hammer"></g>
                                <g id="measuring_tape"></g>
                                <g id="wrench"></g>
                                <g id="saw"></g>
                                <g id="building"></g>
                                <g id="wall"></g>
                                <g id="crane"></g>
                                <g id="barrier_sign"></g>
                                <g id="concept"></g>
                                <g id="shovel"></g>
                                <g id="architecture"></g>
                                <g id="safety_helmet"></g>
                                <g id="worker">
                                    <g>
                                        <path
                                            d="M45.1,43c0.6,0,1-0.4,1-1c0-2.2-1.8-4-4-4s-4,1.8-4,4c0,0.6,0.4,1,1,1s1-0.4,1-1c0-1.1,0.9-2,2-2s2,0.9,2,2 C44.1,42.6,44.6,43,45.1,43z">
                                        </path>
                                        <path
                                            d="M56,50.4c0.2-0.5,0-1.1-0.4-1.3c-0.5-0.2-1.1,0-1.3,0.4c-0.8,1.5-2.3,2.4-4.1,2.4s-3.4-0.9-4.1-2.4 c-0.2-0.5-0.8-0.7-1.3-0.4c-0.5,0.2-0.7,0.8-0.4,1.3c1.1,2.2,3.4,3.6,5.9,3.6S54.9,52.6,56,50.4z">
                                        </path>
                                        <path
                                            d="M55.1,43c0.6,0,1-0.4,1-1c0-1.1,0.9-2,2-2s2,0.9,2,2c0,0.6,0.4,1,1,1s1-0.4,1-1c0-2.2-1.8-4-4-4s-4,1.8-4,4 C54.1,42.6,54.6,43,55.1,43z">
                                        </path>
                                        <path
                                            d="M89.4,80.5c-0.9-5.1-4.7-9.1-9.8-10.2l-21.6-5V60l0,0c5.4-2.9,9-8.5,9-15h1c2.8,0,5-2.2,5-5c0-1.3-0.5-2.5-1.3-3.4 C73,36,74,34.6,74,33c0-1.9-1.3-3.4-3-3.9v-3c0-5.3-2.2-10.3-6-13.9V9c0-1.7-1.3-3-3-3c-1.4,0-2.6,1-2.9,2.4 c-1.6-0.6-3.3-1.1-5.1-1.2V7c0-1.7-1.3-3-3-3h-2c-1.7,0-3,1.3-3,3v0.2c-1.7,0.2-3.4,0.6-5.1,1.3C40.7,7.1,39.5,6,38,6 c-1.7,0-3,1.3-3,3v3.2c-3.8,3.6-6,8.6-6,13.9v3c-1.7,0.4-3,2-3,3.9c0,1.6,1,3,2.3,3.6C27.5,37.5,27,38.7,27,40c0,2.8,2.2,5,5,5h1 c0,6.5,3.7,12.1,9,15l0,0v5.2l-21.6,5c-5,1.2-8.8,5.2-9.8,10.2L8,94.8c-0.1,0.3,0,0.6,0.2,0.8C8.4,95.9,8.7,96,9,96h19h16h6h6h16 h19c0.3,0,0.6-0.1,0.8-0.4c0.2-0.2,0.3-0.5,0.2-0.8L89.4,80.5z M72,90H56c-0.6,0-1,0.4-1,1v3h-4v-7c8.9-0.2,18-3.4,18-10v-7.2 l8,1.9V94h-4v-3C73,90.4,72.6,90,72,90z M44,90H28c-0.6,0-1,0.4-1,1v3h-4V71.7l8-1.9V77c0,3.2,2.2,5.9,6.2,7.7 c3.2,1.4,7.3,2.2,11.8,2.3v7h-4v-3C45,90.4,44.6,90,44,90z M44.7,69.9C46.1,70.6,48,71,50,71c3.4,0,7-1.2,7.8-3.8L61,68l0,0 c0,3.9-5.5,6-11,6s-11-2.1-11-6l0,0l3.2-0.7C42.6,68.3,43.4,69.2,44.7,69.9z M41.3,74.1c2.3,1.2,5.4,1.9,8.7,1.9 c6.1,0,12.6-2.4,13-7.6l4,0.9V77c0,5.3-8.6,8-17,8s-17-2.7-17-8v-7.6l4-0.9C37.2,70.8,38.6,72.8,41.3,74.1z M68,43h-1v-6h1 c1.7,0,3,1.3,3,3S69.7,43,68,43z M69,26.1V29h-6v-6h1c0.6,0,1-0.4,1-1v-6.8C67.6,18.2,69,22.1,69,26.1z M62,8c0.6,0,1,0.4,1,1v12 h-2V9C61,8.4,61.4,8,62,8z M50,17c2.2,0,4,1.8,4,4s-1.8,4-4,4s-4-1.8-4-4S47.8,17,50,17z M49,6h2c0.6,0,1,0.4,1,1v8.4 c-0.6-0.2-1.3-0.4-2-0.4s-1.4,0.1-2,0.4V7C48,6.4,48.4,6,49,6z M46,16.5c-1.2,1.1-2,2.7-2,4.5c0,3.3,2.7,6,6,6s6-2.7,6-6 c0-1.8-0.8-3.4-2-4.5V9.1c1.7,0.2,3.4,0.7,5,1.4V22c0,0.6,0.4,1,1,1h1v6H39v-6h1c0.6,0,1-0.4,1-1V10.6c1.6-0.7,3.3-1.2,5-1.5V16.5 z M37,9c0-0.6,0.4-1,1-1s1,0.4,1,1v12h-2V9z M31,26.1c0-4,1.4-7.9,4-11V22c0,0.6,0.4,1,1,1h1v6h-6V26.1z M30,31h40 c1.1,0,2,0.9,2,2c0,1.1-0.9,2-2,2h-2h-2H34h-2h-2c-1.1,0-2-0.9-2-2S28.9,31,30,31z M32,43c-1.7,0-3-1.3-3-3s1.3-3,3-3h1v6H32z M35,45v-1v-7h30v7v1c0,8.3-6.7,15-15,15S35,53.3,35,45z M50,62c2.1,0,4.1-0.4,6-1.1V66c0,1.9-3.1,3-6,3s-6-1.1-6-3v-5.1 C45.9,61.6,47.9,62,50,62z M12.6,80.9c0.8-4.3,4-7.7,8.2-8.7H21V94H10.2L12.6,80.9z M29,94v-2h14v2H29z M57,94v-2h14v2H57z M79,94 V72.2h0.2c4.2,1,7.5,4.4,8.2,8.7L89.8,94H79z">
                                        </path>
                                    </g>
                                </g>
                                <g id="teamwork"></g>
                                <g id="roller_brush"></g>
                                <g id="designs"></g>
                                <g id="trolley"></g>
                                <g id="pick_axe"></g>
                            </g>
                        </svg> Crew
                    </a>

                    <div id="crue" class="collapse {{ request()->routeIs('admin.user.crue.*') ? 'show' : '' }}"
                        data-bs-parent="#sideNavbar">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link has-arrow {{ request()->routeIs('admin.user.crue.index') ? 'active' : '' }}"
                                    href="{{ route('admin.user.crue.index') }}">
                                    Crew List
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- Nav item crue end -->

                <!-- Nav item freelancers  start -->
                <li class="nav-item">
                    <a class="nav-link has-arrow  collapsed {{ request()->routeIs('admin.user.freelancer.*') ? 'active' : '' }}"
                        href="#!" data-bs-toggle="collapse" data-bs-target="#freelancers" aria-expanded="false"
                        aria-controls="freelancers">
                        <svg style="margin-right: 8px"
                            fill="{{ request()->routeIs('admin.user.freelancer.*') ? '#624bff' : '#9199a5' }}"
                            height="15px" width="15px" version="1.1" id="Capa_1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 0 198.744 198.743" xml:space="preserve">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <g>
                                        <ellipse cx="131.847" cy="16.613" rx="16.834" ry="16.613">
                                        </ellipse>
                                        <path
                                            d="M165.47,113.123v-5.752c1.106-0.79,1.965-1.964,2.334-3.393c0.543-2.101,12.979-51.64-14.863-67.516 c-0.797-0.454-2.039-0.791-3.256-0.791c-9.182,0-35.981,0.028-35.981,0.028s0-0.014,0-0.013c-2.115-0.016-4.172,1.081-5.282,3.053 c-5.867,10.428-12.872,16.617-20.816,18.4c-11.104,2.49-20.98-4.388-21.055-4.442c-2.686-1.941-6.438-1.342-8.382,1.343 c-1.945,2.686-1.344,6.438,1.342,8.382c0.481,0.348,10.213,7.268,23.097,7.268c2.391,0,4.89-0.241,7.458-0.803 c8.133-1.783,15.338-6.404,21.618-13.781V189.74c0,4.971,4.01,9.003,8.983,9.003s8.985-4.032,8.985-9.003v-68h4.308v68 c0,4.971,4.015,9.003,8.985,9.003c4.973,0,8.984-4.032,8.984-9.003V51.088c10.586,12.614,6.905,39.427,4.221,49.889 c-0.738,2.853,0.703,5.754,3.287,6.947v5.199c-3.33,0-6.029,2.7-6.029,6.03v27.942c0,3.329,2.699,6.029,6.029,6.029h6.896 c3.33,0,6.029-2.7,6.029-6.029v-27.942c0-3.33-2.699-6.03-6.029-6.03H165.47L165.47,113.123z M127.927,43.781 c0-1.471,1.192-2.663,2.663-2.663h2.552c1.471,0,2.662,1.192,2.662,2.663v2.675c0,1.471-1.191,2.663-2.662,2.663h-2.552 c-1.471,0-2.663-1.192-2.663-2.663V43.781z M132.966,77.342c-0.643,0.559-1.6,0.559-2.242-0.001l-3.104-2.703 c-1.101-0.959-1.615-2.426-1.354-3.861l3.326-18.285c0.146-0.813,0.854-1.402,1.68-1.402h1.151c0.825,0,1.532,0.59,1.681,1.402 l3.326,18.285c0.26,1.437-0.255,2.903-1.354,3.862L132.966,77.342z">
                                        </path>
                                        <path
                                            d="M69.215,84.197c0-3.33-2.7-6.03-6.03-6.03h-23.88c-3.33,0-6.03,2.7-6.03,6.03v3.94h35.94V84.197z">
                                        </path>
                                        <path
                                            d="M26.38,140.081c0,3.33,2.7,6.03,6.03,6.03h37.914c3.33,0,6.03-2.7,6.03-6.03v-40.99c0-3.33-2.7-6.03-6.03-6.03H32.412 c-3.33,0-6.03,2.7-6.03,6.03L26.38,140.081L26.38,140.081z M50.787,104.083c8.58,0,15.535,6.955,15.535,15.534 c0,8.58-6.955,15.537-15.535,15.537s-15.535-6.957-15.535-15.537C35.25,111.038,42.207,104.083,50.787,104.083z">
                                        </path>
                                        <path
                                            d="M50.836,121.125h8.503c0.83,0,1.501-0.648,1.501-1.479c0-0.828-0.671-1.478-1.501-1.478h-6.986v-10.058 c0-0.828-0.711-1.5-1.539-1.5c-0.829,0-1.539,0.672-1.539,1.5v11.505C49.275,120.446,50.007,121.125,50.836,121.125z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </svg> Freelancers
                    </a>

                    <div id="freelancers"
                        class="collapse {{ request()->routeIs('admin.user.freelancer.*') ? 'show' : '' }}"
                        data-bs-parent="#sideNavbar">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link has-arrow {{ request()->routeIs('admin.user.freelancer.index') ? 'active' : '' }}"
                                    href="{{ route('admin.user.freelancer.index') }}">
                                    Freelancers List
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- Nav item freelancers end -->

                <!-- Nav item suppliers  start -->
                <li class="nav-item">
                    <a class="nav-link has-arrow  collapsed {{ request()->routeIs('admin.user.supplier.*') ? 'active' : '' }}"
                        href="#!" data-bs-toggle="collapse" data-bs-target="#suppliers" aria-expanded="false"
                        aria-controls="suppliers">
                        <svg style="margin-right: 5px" width="18px" height="18px" viewBox="0 0 24.00 24.00"
                            fill="none" xmlns="http://www.w3.org/2000/svg"
                            transform="rotate(0)matrix(1, 0, 0, 1, 0, 0)">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"
                                stroke="#CCCCCC" stroke-width="0.048"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8.69506 16.961C8.70931 17.8033 8.22553 18.5709 7.47078 18.9035C6.71603 19.236 5.84015 19.0675 5.25424 18.477C4.66833 17.8865 4.48871 16.9912 4.79969 16.2114C5.11066 15.4316 5.85049 14.9221 6.67193 14.922C7.20385 14.9172 7.71584 15.1293 8.09525 15.5117C8.47466 15.8941 8.69042 16.4154 8.69506 16.961Z"
                                    stroke="{{ request()->routeIs('admin.user.supplier.*') ? '#624bff' : '#9199a5' }}"
                                    stroke-width="1.224" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M18.33 16.961C18.3443 17.8033 17.8605 18.5709 17.1057 18.9035C16.351 19.236 15.4751 19.0675 14.8892 18.477C14.3033 17.8865 14.1237 16.9912 14.4346 16.2114C14.7456 15.4316 15.4854 14.9221 16.3069 14.922C16.8388 14.9172 17.3508 15.1293 17.7302 15.5117C18.1096 15.8941 18.3254 16.4154 18.33 16.961V16.961Z"
                                    stroke="{{ request()->routeIs('admin.user.supplier.*') ? '#624bff' : '#9199a5' }}"
                                    stroke-width="1.224" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M2.92499 8.75195V13.372H8.92904V8.75195H2.92499Z"
                                    stroke="{{ request()->routeIs('admin.user.supplier.*') ? '#624bff' : '#9199a5' }}"
                                    stroke-width="1.224" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path
                                    d="M14.0497 17.711C14.464 17.711 14.7997 17.3752 14.7997 16.961C14.7997 16.5468 14.464 16.211 14.0497 16.211V17.711ZM8.69504 16.211C8.28082 16.211 7.94504 16.5468 7.94504 16.961C7.94504 17.3752 8.28082 17.711 8.69504 17.711V16.211ZM14.0497 16.211C13.6355 16.211 13.2997 16.5468 13.2997 16.961C13.2997 17.3752 13.6355 17.711 14.0497 17.711V16.211ZM14.2876 17.711C14.7019 17.711 15.0376 17.3752 15.0376 16.961C15.0376 16.5468 14.7019 16.211 14.2876 16.211V17.711ZM13.2997 16.961C13.2997 17.3752 13.6355 17.711 14.0497 17.711C14.464 17.711 14.7997 17.3752 14.7997 16.961H13.2997ZM14.7997 13.372C14.7997 12.9578 14.464 12.622 14.0497 12.622C13.6355 12.622 13.2997 12.9578 13.2997 13.372H14.7997ZM18.33 16.211C17.9158 16.211 17.58 16.5468 17.58 16.961C17.58 17.3752 17.9158 17.711 18.33 17.711V16.211ZM20.475 14.761H21.225C21.225 14.7163 21.221 14.6716 21.213 14.6276L20.475 14.761ZM20.7177 11.8866C20.6441 11.479 20.2539 11.2083 19.8463 11.282C19.4387 11.3556 19.168 11.7458 19.2416 12.1534L20.7177 11.8866ZM14.0497 6.878C13.6355 6.878 13.2997 7.21379 13.2997 7.628C13.2997 8.04221 13.6355 8.378 14.0497 8.378V6.878ZM17.4408 7.628V8.378C17.4519 8.378 17.463 8.37775 17.474 8.37726L17.4408 7.628ZM19.4785 9.221L18.7465 9.38436C18.7488 9.39445 18.7513 9.4045 18.7539 9.41448L19.4785 9.221ZM19.5819 9.821L18.8343 9.88121C18.8363 9.90566 18.8394 9.92999 18.8438 9.95413L19.5819 9.821ZM19.2406 12.1541C19.3142 12.5618 19.7042 12.8326 20.1118 12.7591C20.5195 12.6856 20.7903 12.2955 20.7168 11.8879L19.2406 12.1541ZM14.7997 7.628C14.7997 7.21379 14.464 6.878 14.0497 6.878C13.6355 6.878 13.2997 7.21379 13.2997 7.628H14.7997ZM13.2997 12.02C13.2997 12.4342 13.6355 12.77 14.0497 12.77C14.464 12.77 14.7997 12.4342 14.7997 12.02H13.2997ZM13.2997 7.628C13.2997 8.04221 13.6355 8.378 14.0497 8.378C14.464 8.378 14.7997 8.04221 14.7997 7.628H13.2997ZM14.0497 5H14.7997C14.7997 4.58579 14.464 4.25 14.0497 4.25V5ZM6.61926 5V4.25C6.20505 4.25 5.86926 4.58579 5.86926 5H6.61926ZM5.86926 8.752C5.86926 9.16621 6.20505 9.502 6.61926 9.502C7.03348 9.502 7.36926 9.16621 7.36926 8.752H5.86926ZM14.7997 12.02C14.7997 11.6058 14.464 11.27 14.0497 11.27C13.6355 11.27 13.2997 11.6058 13.2997 12.02H14.7997ZM13.2997 13.372C13.2997 13.7862 13.6355 14.122 14.0497 14.122C14.464 14.122 14.7997 13.7862 14.7997 13.372H13.2997ZM14.0497 11.27C13.6355 11.27 13.2997 11.6058 13.2997 12.02C13.2997 12.4342 13.6355 12.77 14.0497 12.77V11.27ZM19.9797 12.77C20.3939 12.77 20.7297 12.4342 20.7297 12.02C20.7297 11.6058 20.3939 11.27 19.9797 11.27V12.77ZM4.64976 17.711C5.06398 17.711 5.39976 17.3752 5.39976 16.961C5.39976 16.5468 5.06398 16.211 4.64976 16.211V17.711ZM3.93606 16.961L3.93606 16.2109L3.92548 16.2111L3.93606 16.961ZM3.22641 16.6709L3.75646 16.1403L3.75646 16.1403L3.22641 16.6709ZM2.92499 15.951L2.17493 15.951L2.17504 15.9602L2.92499 15.951ZM2.92499 13.372V12.622C2.51077 12.622 2.17499 12.9578 2.17499 13.372H2.92499ZM14.0497 14.122C14.464 14.122 14.7997 13.7862 14.7997 13.372C14.7997 12.9578 14.464 12.622 14.0497 12.622V14.122ZM14.0497 16.211H8.69504V17.711H14.0497V16.211ZM14.0497 17.711H14.2876V16.211H14.0497V17.711ZM14.7997 16.961V13.372H13.2997V16.961H14.7997ZM18.33 17.711C19.9466 17.711 21.225 16.3722 21.225 14.761H19.725C19.725 15.5798 19.0826 16.211 18.33 16.211V17.711ZM21.213 14.6276L20.7177 11.8866L19.2416 12.1534L19.7369 14.8944L21.213 14.6276ZM14.0497 8.378H17.4408V6.878H14.0497V8.378ZM17.474 8.37726C18.0626 8.35114 18.6074 8.76077 18.7465 9.38436L20.2105 9.05764C19.9186 7.74979 18.749 6.8192 17.4075 6.87874L17.474 8.37726ZM18.7539 9.41448C18.7947 9.56708 18.8216 9.72332 18.8343 9.88121L20.3295 9.76079C20.3095 9.51299 20.2672 9.26753 20.2032 9.02752L18.7539 9.41448ZM18.8438 9.95413L19.2406 12.1541L20.7168 11.8879L20.32 9.68787L18.8438 9.95413ZM13.2997 7.628V12.02H14.7997V7.628H13.2997ZM14.7997 7.628V5H13.2997V7.628H14.7997ZM14.0497 4.25H6.61926V5.75H14.0497V4.25ZM5.86926 5V8.752H7.36926V5H5.86926ZM13.2997 12.02V13.372H14.7997V12.02H13.2997ZM14.0497 12.77H19.9797V11.27H14.0497V12.77ZM4.64976 16.211H3.93606V17.711H4.64976V16.211ZM3.92548 16.2111C3.86604 16.2119 3.80491 16.1887 3.75646 16.1403L2.69636 17.2016C3.02721 17.532 3.47667 17.7176 3.94665 17.7109L3.92548 16.2111ZM3.75646 16.1403C3.70737 16.0913 3.6759 16.0203 3.67493 15.9418L2.17504 15.9602C2.18076 16.4247 2.36616 16.8717 2.69636 17.2016L3.75646 16.1403ZM3.67499 15.951V13.372H2.17499V15.951H3.67499ZM2.92499 14.122H14.0497V12.622H2.92499V14.122Z"
                                    fill="{{ request()->routeIs('admin.user.supplier.*') ? '#624bff' : '#9199a5' }}">
                                </path>
                            </g>
                        </svg>
                        Suppliers
                    </a>

                    <div id="suppliers"
                        class="collapse {{ request()->routeIs('admin.user.supplier.*') ? 'show' : '' }}"
                        data-bs-parent="#sideNavbar">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link has-arrow {{ request()->routeIs('admin.user.supplier.index') ? 'active' : '' }}"
                                    href="{{ route('admin.user.supplier.index') }}">
                                    Suppliers List
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- Nav item suppliers end -->

                <!-- Nav item yacth  start -->
                <li class="nav-item">
                    <a class="nav-link has-arrow  collapsed {{ request()->routeIs('admin.user.yacth.*') ? 'active' : '' }}"
                        href="#!" data-bs-toggle="collapse" data-bs-target="#yacth" aria-expanded="false"
                        aria-controls="yacth">
                        <svg style="margin-right: 8px"
                            fill="{{ request()->routeIs('admin.user.yacth.*') ? '#624bff' : '#9199a5' }}"
                            height="15px" width="15px" version="1.1" id="Layer_1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 0 512.252 512.252" xml:space="preserve">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g transform="translate(1 1)">
                                    <g>
                                        <g>
                                            <path
                                                d="M511.035,389.135c-0.853-3.413-4.267-5.973-8.533-5.973h-71.68l-57.173-114.347c-1.707-3.413-4.267-5.12-7.68-5.12 h-59.733V118.628c0-5.12-3.413-8.533-8.533-8.533h-51.2c-5.12,0-8.533,3.413-8.533,8.533v145.067h-51.2v-93.867 c0-5.12-3.413-8.533-8.533-8.533h-51.2c-5.12,0-8.533,3.413-8.533,8.533v93.867H58.768c-5.12,0-8.533,3.413-8.533,8.533v110.933 H7.568c-3.413,0-6.827,1.707-7.68,5.12c-1.707,3.413-0.853,6.827,1.707,9.387l76.8,85.333c0.853,1.707,3.413,2.56,5.973,2.56 h264.533c1.707,0,2.56,0,4.267-1.707l153.6-85.333C510.181,396.815,511.888,392.548,511.035,389.135z M255.035,127.162h34.133 v136.533h-34.133V127.162z M135.568,178.362h34.133v85.333h-34.133V178.362z M67.301,280.762h59.733h51.2h68.267h51.2h63.147 l51.2,102.4H67.301V280.762z M346.341,468.495H87.781l-61.44-68.267h32.427h366.933h43.52L346.341,468.495z">
                                            </path>
                                            <path
                                                d="M212.368,297.828h-59.733H92.901c-5.12,0-8.533,3.413-8.533,8.533v51.2c0,5.12,3.413,8.533,8.533,8.533h59.733h59.733 c5.12,0,8.533-3.413,8.533-8.533v-51.2C220.901,301.242,217.488,297.828,212.368,297.828z M101.435,314.895h42.667v34.133 h-42.667V314.895z M203.835,349.028h-42.667v-34.133h42.667V349.028z">
                                            </path>
                                            <path
                                                d="M373.648,354.148l-25.6-51.2c-1.707-3.413-4.267-5.12-7.68-5.12h-93.867c-5.12,0-8.533,3.413-8.533,8.533v51.2 c0,5.12,3.413,8.533,8.533,8.533h119.467c2.56,0,6.827-0.853,7.68-3.413C374.501,360.122,375.355,356.708,373.648,354.148z M255.035,349.028v-34.133h80.213l17.067,34.133H255.035z">
                                            </path>
                                            <path
                                                d="M138.981,135.695h34.133c11.947,0,22.187-9.387,21.333-22.187c0-9.387-0.853-17.92-8.533-25.6 c3.413-5.12,5.12-11.093,5.12-17.067c0-9.387-2.56-18.773-7.68-25.6c-11.093-14.507-22.187-21.333-33.28-20.48 c-12.8,0.853-19.627,11.947-20.48,12.8c-1.707,2.56-1.707,5.973,0,8.533s4.267,4.267,7.68,4.267c4.267,0,6.827,4.267,6.827,8.533 c0,3.413-0.853,5.973-6.827,7.68c-19.627,2.56-32.427,16.213-33.28,33.28c-0.853,9.387,2.56,17.92,9.387,24.747 C120.208,131.428,129.595,135.695,138.981,135.695z M138.981,82.788c13.653-1.707,22.187-11.093,22.187-23.893 c0-5.973-1.707-11.947-5.12-16.213c4.267,1.707,9.387,5.973,14.507,14.507c3.413,4.267,4.267,11.093,4.267,15.36 c0,3.397-1.626,6.791-4.01,9.327c-0.667,0.233-1.325,0.53-1.963,0.913c-2.56,2.56-5.12,3.413-8.533,3.413 c-4.267,0.853-7.68,4.267-7.68,9.387c0,4.267,4.267,7.68,8.533,7.68c4.446-0.556,8.529-1.479,12.487-3.23 c4.579,3.836,4.579,7.389,4.579,14.324c0,2.56-2.56,4.267-5.12,4.267h-34.133c-5.12,0-10.24-2.56-13.653-5.973 s-5.12-8.533-5.12-12.8C120.208,87.055,134.715,83.642,138.981,82.788z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg> Yacth
                    </a>

                    <div id="yacth" class="collapse {{ request()->routeIs('admin.user.yacth.*') ? 'show' : '' }}"
                        data-bs-parent="#sideNavbar">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link has-arrow {{ request()->routeIs('admin.user.yacth.index') ? 'active' : '' }}"
                                    href="{{ route('admin.user.yacth.index') }}">
                                    Yacth List
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- Nav item yacth end -->

                <!-- Nav item users end .................. -->


                <!-- Nav item dropdown seart ............... -->
                <li class="nav-item">
                    <div class="navbar-heading">Dropdowns</div>
                </li>
                <!-- Nav item admin start -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.yacht.type.*') ? 'active' : '' }}"
                        href="{{ route('admin.yacht.type.index') }}">
                        <svg fill="{{ request()->routeIs('admin.yacht.type.*') ? '#624bff' : '#9199a5' }}"
                            height="18px" width="18px" viewBox="0 0 24 24" data-name="Layer 1" id="Layer_1"
                            style="margin-right: 5px" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <title></title>
                                <path
                                    d="M20.64,18.23,22.39,13H20V7H10V3H8V7H4v6H1.61L3,17.14A3.39,3.39,0,0,0,2,17v2c.56,0,.8.22,1.29.71A3.56,3.56,0,0,0,6,21,3.56,3.56,0,0,0,8.7,19.71c.49-.49.73-.71,1.29-.71s.8.22,1.29.71a3.48,3.48,0,0,0,5.42,0c.49-.49.73-.71,1.3-.71s.8.22,1.29.71A3.57,3.57,0,0,0,22,21V19c-.56,0-.8-.22-1.29-.71ZM15,10h2v2H15Zm-4,0h2v2H11ZM7,10H9v2H7Zm11.91,7.12A3.44,3.44,0,0,0,18,17a3.57,3.57,0,0,0-2.71,1.29c-.49.49-.73.71-1.29.71s-.8-.22-1.29-.71a3.48,3.48,0,0,0-5.41,0C6.8,18.78,6.56,19,6,19a1.47,1.47,0,0,1-.29,0L4.39,15H19.61Z">
                                </path>
                            </g>
                        </svg> Yacht-Types
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.country.*') ? 'active' : '' }}"
                        href="{{ route('admin.country.index') }}">
                        <svg fill="{{ request()->routeIs('admin.country.type.*') ? '#624bff' : '#9199a5' }}"
                            height="18px" width="18px" viewBox="0 0 24 24" data-name="Layer 1" id="Layer_1"
                            style="margin-right: 5px" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <title></title>
                                <path d="M4 3v18h2v-6h14V3H4zm12 8H6V5h10v6z"></path>
                            </g>
                        </svg> Country-List
                    </a>
                </li> --}}




                <li class="nav-item">
                    <a class="nav-link has-arrow collapsed {{ request()->routeIs('admin.country.*') || request()->routeIs('admin.state.*') || request()->routeIs('admin.city.*') ? 'active' : '' }}"
                        href="#!" data-bs-toggle="collapse" data-bs-target="#country" aria-expanded="false"
                        aria-controls="country">
                        <svg style="margin-right: 8px"
                            fill="{{ request()->routeIs('admin.country.*') ? '#624bff' : '#9199a5' }}"
                            height="18px" width="18px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 4.25 3.9 8.91 6.21 11.43a1.5 1.5 0 0 0 2.58 0C15.1 17.91 19 13.25 19 9c0-3.87-3.13-7-7-7zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                        </svg>
                        Location
                    </a>

                    <div id="country" class="collapse {{ request()->routeIs('admin.country.*') || request()->routeIs('admin.state.*') || request()->routeIs('admin.city.*') ? 'show' : '' }}"
                        data-bs-parent="#sideNavbar">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link has-arrow {{ request()->routeIs('admin.city.index') ? 'active' : '' }}"
                                    href="{{ route('admin.city.index') }}">
                                    City
                                </a>
                                <a class="nav-link has-arrow {{ request()->routeIs('admin.country.index') ? 'active' : '' }}"
                                    href="{{ route('admin.country.index') }}">
                                    Country
                                </a>
                                <a class="nav-link has-arrow {{ request()->routeIs('admin.state.index') ? 'active' : '' }}"
                                    href="{{ route('admin.state.index') }}">
                                    State
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>




                <!-- Nav item dropdown end ............... -->

            </ul>

        </div>
    </div>

</div>
