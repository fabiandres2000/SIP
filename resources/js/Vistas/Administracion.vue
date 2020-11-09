<template>
    <div>
        <div style="margin-top: -4%;">
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-toolbar">
                        <ul
                            class="nav nav-tabs nav-tabs-bold nav-tabs-line nav-tabs-line-brand  nav-tabs-line-right nav-tabs-line-danger"
                            role="tablist"
                        >
                            <li class="nav-item">
                                <a
                                    class="nav-link active"
                                    data-toggle="tab"
                                    href="#tabZonas"
                                    role="tab"
                                    @click="cambiarTab2('tabZonas')"                                    
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px"
                                        height="24px"
                                        viewBox="0 0 24 24"
                                        version="1.1"
                                        class="kt-svg-icon"
                                    >
                                        <g
                                            stroke="none"
                                            stroke-width="1"
                                            fill="none"
                                            fill-rule="evenodd"
                                        >
                                            <rect
                                                id="bound"
                                                x="0"
                                                y="0"
                                                width="24"
                                                height="24"
                                            />
                                            <path
                                                d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                                                id="Combined-Shape"
                                                fill="#000000"
                                                opacity="0.3"
                                            />
                                            <path
                                                d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                                                id="Combined-Shape"
                                                fill="#000000"
                                            />
                                            <rect
                                                id="Rectangle-152"
                                                fill="#000000"
                                                opacity="0.3"
                                                x="10"
                                                y="9"
                                                width="7"
                                                height="2"
                                                rx="1"
                                            />
                                            <rect
                                                id="Rectangle-152-Copy-2"
                                                fill="#000000"
                                                opacity="0.3"
                                                x="7"
                                                y="9"
                                                width="2"
                                                height="2"
                                                rx="1"
                                            />
                                            <rect
                                                id="Rectangle-152-Copy-3"
                                                fill="#000000"
                                                opacity="0.3"
                                                x="7"
                                                y="13"
                                                width="2"
                                                height="2"
                                                rx="1"
                                            />
                                            <rect
                                                id="Rectangle-152-Copy"
                                                fill="#000000"
                                                opacity="0.3"
                                                x="10"
                                                y="13"
                                                width="7"
                                                height="2"
                                                rx="1"
                                            />
                                            <rect
                                                id="Rectangle-152-Copy-5"
                                                fill="#000000"
                                                opacity="0.3"
                                                x="7"
                                                y="17"
                                                width="2"
                                                height="2"
                                                rx="1"
                                            />
                                            <rect
                                                id="Rectangle-152-Copy-4"
                                                fill="#000000"
                                                opacity="0.3"
                                                x="10"
                                                y="17"
                                                width="7"
                                                height="2"
                                                rx="1"
                                            />
                                        </g>
                                    </svg>
                                    <span
                                        class="bold"
                                        style="color:#818bb4; font-size: 16px;"
                                        >Zonas</span
                                    >
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    data-toggle="tab"
                                    href="#tabPoblacion"
                                    role="tab"
                                    @click="cambiarTab2('tabPoblacion')"                                    
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px"
                                        height="24px"
                                        viewBox="0 0 24 24"
                                        version="1.1"
                                        class="kt-svg-icon"
                                    >
                                        <g
                                            stroke="none"
                                            stroke-width="1"
                                            fill="none"
                                            fill-rule="evenodd"
                                        >
                                            <polygon
                                                id="Shape"
                                                points="0 0 24 0 24 24 0 24"
                                            />
                                            <path
                                                d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                id="Combined-Shape"
                                                fill="#000000"
                                                fill-rule="nonzero"
                                                opacity="0.3"
                                            />
                                            <path
                                                d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                id="Combined-Shape"
                                                fill="#000000"
                                                fill-rule="nonzero"
                                            />
                                        </g>
                                    </svg>
                                    <span
                                        class="bold"
                                        style="color:#818bb4; font-size: 16px;"
                                        >Población</span
                                    >
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    data-toggle="tab"
                                    href="#tabSalud"
                                    role="tab"
                                    @click="cambiarTab2('tabSalud')"                                    
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px"
                                        height="24px"
                                        viewBox="0 0 24 24"
                                        version="1.1"
                                        class="kt-svg-icon"
                                    >
                                        <g
                                            stroke="none"
                                            stroke-width="1"
                                            fill="none"
                                            fill-rule="evenodd"
                                        >
                                            <rect
                                                id="bound"
                                                x="0"
                                                y="0"
                                                width="24"
                                                height="24"
                                            />
                                            <rect
                                                id="Combined-Shape"
                                                fill="#000000"
                                                opacity="0.3"
                                                x="2"
                                                y="3"
                                                width="20"
                                                height="18"
                                                rx="2"
                                            />
                                            <path
                                                d="M9.9486833,13.3162278 C9.81256925,13.7245699 9.43043041,14 9,14 L5,14 C4.44771525,14 4,13.5522847 4,13 C4,12.4477153 4.44771525,12 5,12 L8.27924078,12 L10.0513167,6.68377223 C10.367686,5.73466443 11.7274983,5.78688777 11.9701425,6.75746437 L13.8145063,14.1349195 L14.6055728,12.5527864 C14.7749648,12.2140024 15.1212279,12 15.5,12 L19,12 C19.5522847,12 20,12.4477153 20,13 C20,13.5522847 19.5522847,14 19,14 L16.118034,14 L14.3944272,17.4472136 C13.9792313,18.2776054 12.7550291,18.143222 12.5298575,17.2425356 L10.8627389,10.5740611 L9.9486833,13.3162278 Z"
                                                id="Path-108"
                                                fill="#000000"
                                                fill-rule="nonzero"
                                            />
                                            <circle
                                                id="Oval"
                                                fill="#000000"
                                                opacity="0.3"
                                                cx="19"
                                                cy="6"
                                                r="1"
                                            />
                                        </g>
                                    </svg>
                                    <span
                                        class="bold"
                                        style="color:#818bb4; font-size: 16px;"
                                        >Salud</span
                                    >
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    data-toggle="tab"
                                    href="#tabAmbiental"
                                    role="tab"
                                    @click="cambiarTab2('tabAmbiental')"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px"
                                        height="24px"
                                        viewBox="0 0 24 24"
                                        version="1.1"
                                        class="kt-svg-icon"
                                    >
                                        <g
                                            stroke="none"
                                            stroke-width="1"
                                            fill="none"
                                            fill-rule="evenodd"
                                        >
                                            <polygon
                                                id="Shape"
                                                points="0 0 24 0 24 24 0 24"
                                            />
                                            <rect
                                                id="Rectangle-89"
                                                fill="#000000"
                                                opacity="0.3"
                                                x="2"
                                                y="5"
                                                width="20"
                                                height="2"
                                                rx="1"
                                            />
                                            <rect
                                                id="Rectangle-89-Copy-5"
                                                fill="#000000"
                                                opacity="0.3"
                                                x="2"
                                                y="17"
                                                width="20"
                                                height="2"
                                                rx="1"
                                            />
                                            <rect
                                                id="Rectangle-89-Copy-2"
                                                fill="#000000"
                                                opacity="0.3"
                                                x="2"
                                                y="9"
                                                width="5"
                                                height="2"
                                                rx="1"
                                            />
                                            <rect
                                                id="Rectangle-89-Copy-4"
                                                fill="#000000"
                                                opacity="0.3"
                                                x="16"
                                                y="13"
                                                width="6"
                                                height="2"
                                                rx="1"
                                            />
                                            <rect
                                                id="Rectangle-89-Copy-3"
                                                fill="#000000"
                                                opacity="0.3"
                                                x="9"
                                                y="9"
                                                width="13"
                                                height="2"
                                                rx="1"
                                            />
                                            <rect
                                                id="Rectangle-89-Copy"
                                                fill="#000000"
                                                opacity="0.3"
                                                x="2"
                                                y="13"
                                                width="12"
                                                height="2"
                                                rx="1"
                                            />
                                        </g>
                                    </svg>
                                    <span
                                        class="bold"
                                        style="color:#818bb4; font-size: 16px;"
                                        >Ambiental</span
                                    >
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body" style="background-color:#F2F3F8;">
                    <div class="tab-content" ref="divtab">
                        <!-- PANEL ZONAS -->
                        <div
                            class="tab-pane active"
                            id="tabZonas"
                            role="tabpanel"                            
                        >
                            <div class="row" >
                                <!--Begin:: App Aside-->
                                <div class="col-3" >
                                    <div
                                        class="kt-portlet kt-portlet--height-fluid-half "
                                        style="background-color:#818bb4; height: auto;width: 230px;"
                                    >
                                        <div
                                            class="kt-portlet__body kt-portlet__body--fit-y"
                                        >
                                            <!--begin::Widget -->
                                            <div
                                                class="kt-widget kt-widget--user-profile-1 camhov"
                                            >
                                                <div class="kt-widget__body ">
                                                    <br />
                                                    <div
                                                        class="kt-widget__items "
                                                    >
                                                        <a
                                                            href="javascript:;"
                                                            class="kt-widget__item "
                                                        >
                                                            <span
                                                                class="kt-widget__section"
                                                            >
                                                                <span
                                                                    class="kt-widget__icon"
                                                                >
                                                                    <i
                                                                        class="kt-nav__link-icon flaticon2-layers"
                                                                        style="color: white;"
                                                                    ></i>
                                                                </span>
                                                                <span
                                                                    class="kt-widget__desc"
                                                                    style="color: white;"
                                                                    >General</span
                                                                >
                                                            </span>
                                                        </a>                                                    
                                                        <a
                                                            href="javascript:;"
                                                            class="kt-widget__item "
                                                        >
                                                            <span
                                                                class="kt-widget__section"
                                                            >
                                                                <span
                                                                    class="kt-widget__icon"
                                                                >
                                                                    <i
                                                                        class="kt-nav__link-icon flaticon2-layers"
                                                                        style="color: white;"
                                                                    ></i>
                                                                </span>
                                                                <span
                                                                    class="kt-widget__desc"
                                                                    style="color: white;"
                                                                    >Zona
                                                                    1</span
                                                                >
                                                            </span>
                                                        </a>
                                                        <a
                                                            href="javascript:;"
                                                            class="kt-widget__item"
                                                        >
                                                            <span
                                                                class="kt-widget__section"
                                                            >
                                                                <span
                                                                    class="kt-widget__icon"
                                                                >
                                                                    <i
                                                                        class="kt-nav__link-icon flaticon2-layers"
                                                                        style="color: white;"
                                                                    ></i>
                                                                </span>
                                                                <span
                                                                    class="kt-widget__desc"
                                                                    style="color: white;"
                                                                    >Zona
                                                                    2</span
                                                                >
                                                            </span>
                                                        </a>
                                                        <a
                                                            href="javascript:;"
                                                            class="kt-widget__item"
                                                        >
                                                            <span
                                                                class="kt-widget__section"
                                                            >
                                                                <span
                                                                    class="kt-widget__icon"
                                                                >
                                                                    <i
                                                                        class="kt-nav__link-icon flaticon2-layers"
                                                                        style="color: white;"
                                                                    ></i>
                                                                </span>
                                                                <span
                                                                    class="kt-widget__desc"
                                                                    style="color: white;"
                                                                    >Zona
                                                                    3</span
                                                                >
                                                            </span>
                                                        </a>
                                                        <a
                                                            href="javascript:;"
                                                            class="kt-widget__item "
                                                        >
                                                            <span
                                                                class="kt-widget__section"
                                                            >
                                                                <span
                                                                    class="kt-widget__icon"
                                                                >
                                                                    <i
                                                                        class="kt-nav__link-icon flaticon2-layers camhov2"
                                                                        style="color: white;"
                                                                    ></i>
                                                                </span>
                                                                <span
                                                                    class="kt-widget__desc camhov"
                                                                    style="color: white;"
                                                                    >Zona
                                                                    4</span
                                                                >
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Widget -->
                                        </div>
                                    </div>
                                </div>
                                <!--End:: App Aside-->
                                <!--Begin:: App Content-->
                                <div
                                    class="table-responsive"
                                    style="width: 700px;"
                                    id="baradescroll"
                                    
                                >
                                    <table class="table table-sm table-hover responsive" >
                                        <tr>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid grayclase"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 11px;"
                                                            >
                                                                Población
                                                                Entrevistada
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content "
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center "
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/zonas/poblacion.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                705 Personas
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 11px;"
                                                            >
                                                                Viviendas
                                                                Visitadas
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/zonas/viviendas.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                200 Viviendas
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 11px;"
                                                            >
                                                                Hogares
                                                                Visitados
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <div
                                                                    class="kt-font-danger font-weight-bold text-center"
                                                                >
                                                                    <img
                                                                        style="height: 100px; width: 140px; float: right;"
                                                                        :src="
                                                                            `${$store.state.serverPath}assets/iconos/zonas/hogares.png`
                                                                        "
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                200 Hogares
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 10px;"
                                                            >
                                                                Riesgos
                                                                Materializados
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <div
                                                                    class="kt-font-danger font-weight-bold text-center"
                                                                >
                                                                    <img
                                                                        style="height: 100px; width: 140px; float: right;"
                                                                        :src="
                                                                            `${$store.state.serverPath}assets/iconos/zonas/riesgosmate.png`
                                                                        "
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid grayclase"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 10px;"
                                                            >
                                                                Identificación
                                                                de Riesgo
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/zonas/riesgosalud.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                % Salud
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 10px;"
                                                            >
                                                                Identificación
                                                                de Riesgo
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/zonas/riesgosambi.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                % Ambiental
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 11px;"
                                                            >
                                                                Nivel
                                                                Socioeconomico
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <div
                                                                    class="kt-font-danger font-weight-bold text-center"
                                                                >
                                                                    <img
                                                                        style="height: 100px; width: 140px; float: right;"
                                                                        :src="
                                                                            `${$store.state.serverPath}assets/iconos/zonas/socio.png`
                                                                        "
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h4
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 11px;"
                                                            >
                                                                Georeferenciación
                                                            </h4>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <div
                                                                    class="kt-font-danger font-weight-bold text-center"
                                                                >
                                                                    <img
                                                                        style="height: 100px; width: 140px; float: right;"
                                                                        :src="
                                                                            `${$store.state.serverPath}assets/iconos/zonas/geo.png`
                                                                        "
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid grayclase "
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 11px;"
                                                            >
                                                                Población
                                                                Migrante
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <div
                                                                    class="kt-font-danger font-weight-bold text-center"
                                                                >
                                                                    <img
                                                                        style="height: 100px; width: 140px; float: right;"
                                                                        :src="
                                                                            `${$store.state.serverPath}assets/iconos/zonas/migrante.png`
                                                                        "
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 11px;"
                                                            >
                                                                Kit Entregados
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <div
                                                                    class="kt-font-danger font-weight-bold text-center"
                                                                >
                                                                    <img
                                                                        style="height: 100px; width: 140px; float: right;"
                                                                        :src="
                                                                            `${$store.state.serverPath}assets/iconos/zonas/kit.png`
                                                                        "
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid grayclase"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 11px;"
                                                            >
                                                                Vias de Accesos
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <div
                                                                    class="kt-font-danger font-weight-bold text-center"
                                                                >
                                                                    <img
                                                                        style="height: 100px; width: 140px; float: right;"
                                                                        :src="
                                                                            `${$store.state.serverPath}assets/iconos/zonas/vias.png`
                                                                        "
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!--End:: App Content-->
                            </div>
                        </div>
                        <!-- PANEL ZONAS -->
                        <!-- PANEL POBLACION -->
                        <div class="tab-pane" id="tabPoblacion" role="tabpanel" >
                            <div class="row">                                                     
                                <!--Begin:: App Aside-->
                                <div class="col-3">
                                    <div
                                        class="kt-portlet kt-portlet--height-fluid-half "
                                        style="background-color:#818bb4;height: auto;width: 230px;"                                        
                                    >
                                        <div
                                            class="kt-portlet__body kt-portlet__body--fit-y"
                                        >
                                            <!--begin::Widget -->
                                            <div
                                                class="kt-widget kt-widget--user-profile-1 camhov"
                                            >
                                                <div class="kt-widget__body ">
                                                    <br />
                                                    <div
                                                        class="kt-widget__items "
                                                    >
                                                        <a
                                                            href="javascript:;"
                                                            class="kt-widget__item "
                                                        >
                                                            <span
                                                                class="kt-widget__section"
                                                            >
                                                                <span
                                                                    class="kt-widget__icon"
                                                                >
                                                                    <i
                                                                        class="kt-nav__link-icon flaticon2-layers"
                                                                        style="color: white;"
                                                                    ></i>
                                                                </span>
                                                                <span
                                                                    class="kt-widget__desc"
                                                                    style="color: white;"
                                                                    >General</span
                                                                >
                                                            </span>
                                                        </a>                                                    
                                                        <a
                                                            href="javascript:;"
                                                            class="kt-widget__item "
                                                        >
                                                            <span
                                                                class="kt-widget__section"
                                                            >
                                                                <span
                                                                    class="kt-widget__icon"
                                                                >
                                                                    <i
                                                                        class="kt-nav__link-icon flaticon2-layers"
                                                                        style="color: white;"
                                                                    ></i>
                                                                </span>
                                                                <span
                                                                    class="kt-widget__desc"
                                                                    style="color: white;"
                                                                    >Urbano</span
                                                                >
                                                            </span>
                                                        </a>
                                                        <a
                                                            href="javascript:;"
                                                            class="kt-widget__item"
                                                        >
                                                            <span
                                                                class="kt-widget__section"
                                                            >
                                                                <span
                                                                    class="kt-widget__icon"
                                                                >
                                                                    <i
                                                                        class="kt-nav__link-icon flaticon2-layers"
                                                                        style="color: white;"
                                                                    ></i>
                                                                </span>
                                                                <span
                                                                    class="kt-widget__desc"
                                                                    style="color: white;"
                                                                    >Rural</span
                                                                >
                                                            </span>
                                                        </a>
                                                        <a
                                                            href="javascript:;"
                                                            class="kt-widget__item"
                                                        >
                                                            <span
                                                                class="kt-widget__section"
                                                            >
                                                                <span
                                                                    class="kt-widget__icon"
                                                                >
                                                                    <i
                                                                        class="kt-nav__link-icon flaticon2-layers"
                                                                        style="color: white;"
                                                                    ></i>
                                                                </span>
                                                                <span
                                                                    class="kt-widget__desc"
                                                                    style="color: white;"
                                                                    >Vereda</span
                                                                >
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Widget -->
                                        </div>
                                    </div>
                                </div>
                                <!--End:: App Aside-->
                                <!--Begin:: App Content-->
                                <div
                                    class="table-responsive"
                                    style="width: 700px;"
                                    id="baradescroll1"
                                >
                                    <table class="table table-sm table-hover responsive" >
                                        <tr>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid grayclase"
                                                    data-container="body" 
                                                    data-toggle="kt-popover" 
                                                    data-placement="left" 
                                                    data-content=""
                                                    data-html="true"
                                                    title="<b>Población Entrevistada</b>"
                                                    @click="abrirModal('PobEnt')"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 11px;"
                                                            >
                                                                Población
                                                                Entrevistada
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"                                                            
                                                        >
                                                            
                                                            <div
                                                                class="kt-widget14__chart text-center "
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/zonas/poblacion.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                {{pob_entrevistada}} Personas
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"    
                                                    data-container="body" 
                                                    data-toggle="kt-popover" 
                                                    data-placement="left" 
                                                    data-content=""
                                                    data-html="true"
                                                    title="<b>Viviendas Visitadas</b>"
                                                    @click="abrirModal('VivVis')"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 11px;"
                                                            >
                                                                Viviendas
                                                                Visitadas
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/zonas/viviendas.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                {{viv_visitadas}} Viviendas
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                    data-container="body" 
                                                    data-toggle="kt-popover" 
                                                    data-placement="left" 
                                                    data-content=""
                                                    data-html="true"
                                                    title="<b>Hogares Visitados</b>"
                                                    @click="abrirModal('HogVis')"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 11px;"
                                                            >
                                                                Hogares
                                                                Visitados
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <div
                                                                    class="kt-font-danger font-weight-bold text-center"
                                                                >
                                                                    <img
                                                                        style="height: 100px; width: 140px; float: right;"
                                                                        :src="
                                                                            `${$store.state.serverPath}assets/iconos/zonas/hogares.png`
                                                                        "
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                200 Hogares
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 10px;"
                                                            >
                                                                Riesgos
                                                                Materializados
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <div
                                                                    class="kt-font-danger font-weight-bold text-center"
                                                                >
                                                                    <img
                                                                        style="height: 100px; width: 140px; float: right;"
                                                                        :src="
                                                                            `${$store.state.serverPath}assets/iconos/zonas/riesgosmate.png`
                                                                        "
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid grayclase"
                                                    @click="abrirModal('Salud')"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"                                                        
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 10px;"
                                                            >
                                                                Identificación
                                                                de Riesgo
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/zonas/riesgosalud.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                % Salud
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 10px;"
                                                            >
                                                                Identificación
                                                                de Riesgo
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/zonas/riesgosambi.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                % Ambiental
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                    @click="abrirModal('Socio')"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                        
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 11px;"
                                                            >
                                                                Nivel
                                                                Socioeconomico
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <div
                                                                    class="kt-font-danger font-weight-bold text-center"
                                                                >
                                                                    <img
                                                                        style="height: 100px; width: 140px; float: right;"
                                                                        :src="
                                                                            `${$store.state.serverPath}assets/iconos/zonas/socio.png`
                                                                        "
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h4
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 11px;"
                                                            >
                                                                Georeferenciación
                                                            </h4>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <div
                                                                    class="kt-font-danger font-weight-bold text-center"
                                                                >
                                                                    <img
                                                                        style="height: 100px; width: 140px; float: right;"
                                                                        :src="
                                                                            `${$store.state.serverPath}assets/iconos/zonas/geo.png`
                                                                        "
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid grayclase "
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 11px;"
                                                            >
                                                                Población
                                                                Migrante
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <div
                                                                    class="kt-font-danger font-weight-bold text-center"
                                                                >
                                                                    <img
                                                                        style="height: 100px; width: 140px; float: right;"
                                                                        :src="
                                                                            `${$store.state.serverPath}assets/iconos/zonas/migrante.png`
                                                                        "
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 11px;"
                                                            >
                                                                Kit Entregados
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <div
                                                                    class="kt-font-danger font-weight-bold text-center"
                                                                >
                                                                    <img
                                                                        style="height: 100px; width: 140px; float: right;"
                                                                        :src="
                                                                            `${$store.state.serverPath}assets/iconos/zonas/kit.png`
                                                                        "
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid grayclase"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 11px;"
                                                            >
                                                                Vias de Accesos
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <div
                                                                    class="kt-font-danger font-weight-bold text-center"
                                                                >
                                                                    <img
                                                                        style="height: 100px; width: 140px; float: right;"
                                                                        :src="
                                                                            `${$store.state.serverPath}assets/iconos/zonas/vias.png`
                                                                        "
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!--End:: App Content-->                                                              
                            </div>
                        </div>
                        <!-- PANEL POBLACION -->

                        <!-- PANEL SALUD -->
                        <div class="tab-pane" id="tabSalud" role="tabpanel" >
                            <div class="row">
                                <!--Begin:: App Aside-->
                                <div class="col-3">
                                    <div
                                        class="kt-portlet kt-portlet--height-fluid-half "
                                        style="background-color:#818bb4;height: auto;width: 230px;"
                                    >
                                        <div
                                            class="kt-portlet__body kt-portlet__body--fit-y"
                                        >
                                            <!--begin::Widget -->
                                            <div
                                                class="kt-widget kt-widget--user-profile-1 camhov"
                                            >
                                                <div class="kt-widget__body ">
                                                    <br />
                                                    <div
                                                        class="kt-widget__items "
                                                    >
                                                        <a
                                                            href="javascript:;"
                                                            class="kt-widget__item "
                                                        >
                                                            <span
                                                                class="kt-widget__section"
                                                            >
                                                                <span
                                                                    class="kt-widget__icon"
                                                                >
                                                                    <i
                                                                        class="kt-nav__link-icon flaticon2-layers"
                                                                        style="color: white;"
                                                                    ></i>
                                                                </span>
                                                                <span
                                                                    class="kt-widget__desc"
                                                                    style="color: white;"
                                                                    >General</span
                                                                >
                                                            </span>
                                                        </a>
                                                        <a
                                                            href="javascript:;"
                                                            class="kt-widget__item "
                                                        >
                                                            <span
                                                                class="kt-widget__section"
                                                            >
                                                                <span
                                                                    class="kt-widget__icon"
                                                                >
                                                                    <i
                                                                        class="kt-nav__link-icon flaticon2-layers"
                                                                        style="color: white;"
                                                                    ></i>
                                                                </span>
                                                                <span
                                                                    class="kt-widget__desc"
                                                                    style="color: white;"
                                                                    >Zonas</span
                                                                >
                                                            </span>
                                                        </a>                                                        
                                                        <a
                                                            href="javascript:;"
                                                            class="kt-widget__item "
                                                        >
                                                            <span
                                                                class="kt-widget__section"
                                                            >
                                                                <span
                                                                    class="kt-widget__icon"
                                                                >
                                                                    <i
                                                                        class="kt-nav__link-icon flaticon2-layers"
                                                                        style="color: white;"
                                                                    ></i>
                                                                </span>
                                                                <span
                                                                    class="kt-widget__desc"
                                                                    style="color: white;"
                                                                    >Urbano</span
                                                                >
                                                            </span>
                                                        </a>
                                                        <a
                                                            href="javascript:;"
                                                            class="kt-widget__item"
                                                        >
                                                            <span
                                                                class="kt-widget__section"
                                                            >
                                                                <span
                                                                    class="kt-widget__icon"
                                                                >
                                                                    <i
                                                                        class="kt-nav__link-icon flaticon2-layers"
                                                                        style="color: white;"
                                                                    ></i>
                                                                </span>
                                                                <span
                                                                    class="kt-widget__desc"
                                                                    style="color: white;"
                                                                    >Rural</span
                                                                >
                                                            </span>
                                                        </a>
                                                        <a
                                                            href="javascript:;"
                                                            class="kt-widget__item"
                                                        >
                                                            <span
                                                                class="kt-widget__section"
                                                            >
                                                                <span
                                                                    class="kt-widget__icon"
                                                                >
                                                                    <i
                                                                        class="kt-nav__link-icon flaticon2-layers"
                                                                        style="color: white;"
                                                                    ></i>
                                                                </span>
                                                                <span
                                                                    class="kt-widget__desc"
                                                                    style="color: white;"
                                                                    >Vereda</span
                                                                >
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Widget -->
                                        </div>
                                    </div>
                                </div>
                                <!--End:: App Aside-->
                                <!--Begin:: App Content-->
                                <div
                                    class="table-responsive"
                                    style="width: 700px;"
                                    id="baradescroll2"
                                >
                                    <table class="table table-sm table-hover responsive" >
                                        <tr>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid grayclase"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 9px;"
                                                            >
                                                                Población
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content "
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center "
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/salud/poblacion.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                3000
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>                                            
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 9px;"
                                                            >
                                                                Materno Perinatal
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/salud/maternoPerinatal.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>                                            
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 9px;"
                                                            >
                                                                Alteraciones Nutricionales
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/salud/alteracionesNutricionales.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>                                            
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 9px;"
                                                            >
                                                                Enfermedades Infecciosas
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/salud/enfermedadesInfecciosas.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 9px;"
                                                            >
                                                                Transtornos por uso de SPA
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/salud/usospa.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 8px;"
                                                            >
                                                                Enfermedad Cardiovascular
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/salud/enfermedadesCardiovascular.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>                                                                                                                                                                                                                                                                                                                                                       
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid grayclase"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 9px;"
                                                            >
                                                                Cáncer
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content "
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center "
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/salud/cancer.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                3000
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>                                            
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 9px;"
                                                            >
                                                                Transtornos Visuales
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/salud/transtornosVisuales.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>                                            
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 9px;"
                                                            >
                                                                Transtornos de Audición
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/salud/transtornosAuditivos.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>                                            
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 9px;"
                                                            >
                                                                Transtornos Bucales
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/salud/saludBucal.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 9px;"
                                                            >
                                                                Salud Mental
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/salud/saludMental.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 9px;"
                                                            >
                                                                Violencias
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/salud/violencias.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>                                                                                                                                                                                                                                                            
                                        </tr>
                                        <tr>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 9px;"
                                                            >
                                                                Enfermedades Respiratorias
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/salud/enfermedadesRespiratorias.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 9px;"
                                                            >
                                                                Enfermedades Zoonoticas
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/salud/enfermedadesZoonoticas.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 9px;"
                                                            >
                                                                Enfermedades Huerfanas
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/salud/enfermedadesHuerfanas.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 9px;"
                                                            >
                                                                Transtornos Degenerativos
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/salud/transtornosDegenerativos.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>                                            
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>                                            
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 9px;"
                                                            >
                                                                Adolescentes en Embarazo
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/salud/adolescentesEmbarazo.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 9px;"
                                                            >
                                                                Gestantes
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/salud/gestantes.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 9px;"
                                                            >
                                                                Menores No Escolarizados
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/salud/menoresNoEscolarizados.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 9px;"
                                                            >
                                                                Población No Asegurada
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/salud/poblacionNoAsegurada.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 9px;"
                                                            >
                                                                Adulto Mayor
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/salud/adultoMayor.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 9px;"
                                                            >
                                                                Estadisticas
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/salud/estadisticas.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 9px;"
                                                            >
                                                                Riesgos Materializados
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/zonas/riesgosmate.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                        </tr>                                       
                                    </table>
                                </div>
                                <!--End:: App Content-->                             
                            </div>
                        </div>
                        <!-- PANEL SALUD -->

                        <!-- PANEL AMBIENTAL -->
                        <div class="tab-pane" id="tabAmbiental" role="tabpanel" >
                            <div class="row">
                                <!--Begin:: App Aside-->
                                <div class="col-3">
                                    <div
                                        class="kt-portlet kt-portlet--height-fluid-half "
                                        style="background-color:#818bb4;height: auto;width: 230px;"
                                    >
                                        <div
                                            class="kt-portlet__body kt-portlet__body--fit-y"
                                        >
                                            <!--begin::Widget -->
                                            <div
                                                class="kt-widget kt-widget--user-profile-1 camhov"
                                            >
                                                <div class="kt-widget__body ">
                                                    <br />
                                                    <div
                                                        class="kt-widget__items "
                                                    >
                                                        <a
                                                            href="javascript:;"
                                                            class="kt-widget__item "
                                                        >
                                                            <span
                                                                class="kt-widget__section"
                                                            >
                                                                <span
                                                                    class="kt-widget__icon"
                                                                >
                                                                    <i
                                                                        class="kt-nav__link-icon flaticon2-layers"
                                                                        style="color: white;"
                                                                    ></i>
                                                                </span>
                                                                <span
                                                                    class="kt-widget__desc"
                                                                    style="color: white;"
                                                                    >General</span
                                                                >
                                                            </span>
                                                        </a>
                                                        <a
                                                            href="javascript:;"
                                                            class="kt-widget__item "
                                                        >
                                                            <span
                                                                class="kt-widget__section"
                                                            >
                                                                <span
                                                                    class="kt-widget__icon"
                                                                >
                                                                    <i
                                                                        class="kt-nav__link-icon flaticon2-layers"
                                                                        style="color: white;"
                                                                    ></i>
                                                                </span>
                                                                <span
                                                                    class="kt-widget__desc"
                                                                    style="color: white;"
                                                                    >Zonas</span
                                                                >
                                                            </span>
                                                        </a>                                                        
                                                        <a
                                                            href="javascript:;"
                                                            class="kt-widget__item "
                                                        >
                                                            <span
                                                                class="kt-widget__section"
                                                            >
                                                                <span
                                                                    class="kt-widget__icon"
                                                                >
                                                                    <i
                                                                        class="kt-nav__link-icon flaticon2-layers"
                                                                        style="color: white;"
                                                                    ></i>
                                                                </span>
                                                                <span
                                                                    class="kt-widget__desc"
                                                                    style="color: white;"
                                                                    >Urbano</span
                                                                >
                                                            </span>
                                                        </a>
                                                        <a
                                                            href="javascript:;"
                                                            class="kt-widget__item"
                                                        >
                                                            <span
                                                                class="kt-widget__section"
                                                            >
                                                                <span
                                                                    class="kt-widget__icon"
                                                                >
                                                                    <i
                                                                        class="kt-nav__link-icon flaticon2-layers"
                                                                        style="color: white;"
                                                                    ></i>
                                                                </span>
                                                                <span
                                                                    class="kt-widget__desc"
                                                                    style="color: white;"
                                                                    >Rural</span
                                                                >
                                                            </span>
                                                        </a>
                                                        <a
                                                            href="javascript:;"
                                                            class="kt-widget__item"
                                                        >
                                                            <span
                                                                class="kt-widget__section"
                                                            >
                                                                <span
                                                                    class="kt-widget__icon"
                                                                >
                                                                    <i
                                                                        class="kt-nav__link-icon flaticon2-layers"
                                                                        style="color: white;"
                                                                    ></i>
                                                                </span>
                                                                <span
                                                                    class="kt-widget__desc"
                                                                    style="color: white;"
                                                                    >Vereda</span
                                                                >
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Widget -->
                                        </div>
                                    </div>
                                </div>
                                <!--End:: App Aside-->
                                <!--Begin:: App Content-->
                                <div
                                    class="table-responsive"
                                    style="width: 700px;"
                                    id="baradescroll3"
                                >
                                    <table class="table table-sm table-hover responsive" >
                                        <tr>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid grayclase"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 9px;"
                                                            >
                                                                Contaminación del Aire
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content "
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center "
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/ambiental/CONTAMINACION_AIRE.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                3000
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>                                            
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 9px;"
                                                            >
                                                                Contaminación del Suelo
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/ambiental/CONTAMINACION_SUELO.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>                                            
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 9px;"
                                                            >
                                                                Incendios
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/ambiental/INCENDIOS.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>                                            
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 9px;"
                                                            >
                                                                Insalubridad
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/ambiental/INSALUBRIDAD.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>                                                                                                                                                                                                                                                  
                                        </tr>
                                        <tr>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 9px;"
                                                            >
                                                                Inundaciones
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/ambiental/INUNDACIONES.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 9px;"
                                                            >
                                                                No Acceso a Agua
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/ambiental/NO_ACCESO_AGUA.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div
                                                    class="kt-portlet kt-portlet--height-fluid"
                                                >
                                                    <div
                                                        class="kt-widget14 img-contenedor"
                                                        style="cursor:pointer;width: 200px;"
                                                    >
                                                        <div
                                                            class="kt-widget14__header"
                                                        >
                                                            <h3
                                                                class="kt-widget14__title text-center font-weight-bold"
                                                                style="font-size: 9px;"
                                                            >
                                                                Proliferación de Plaga
                                                            </h3>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__content"
                                                        >
                                                            <div
                                                                class="kt-widget14__chart text-center"
                                                            >
                                                                <img
                                                                    style="height: 100px; width: 140px; float: right;"
                                                                    :src="
                                                                        `${$store.state.serverPath}assets/iconos/ambiental/PROLIFERACION_DE_PLAGA.png`
                                                                    "
                                                                />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="kt-widget14__info"
                                                        >
                                                            <h3
                                                                class="kt-widget14__legend kt-font-danger font-weight-bold text-center"
                                                                style="font-size: 12px;color: #818bb4 !important;"
                                                            >
                                                                Detalles
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                        </tr>                                       
                                    </table>
                                </div>
                                <!--End:: App Content-->                             
                            </div>
                        </div>
                        <!-- PANEL AMBIENTAL -->                        
                    </div>
                    <div class="kt-form__actions">
                        <div class="kt-portlet__foot">
                            <div class="row">
                                <div class="col-6 ml-lg-auto">
                                    <div class="kt-badge kt-badge--xl kt-badge--brand" style="cursor: pointer;" @click="izquierda">
                                        <i class="flaticon2-back"></i>
                                    </div>
                                    <div class="kt-badge kt-badge--xl kt-badge--brand" style="cursor: pointer;" @click="derecha">
                                        <i class="flaticon2-next"></i>
                                    </div>                                                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--begin::Modal-->
                <div class="modal fade" id="modalProfesional" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title " id="exampleModalLabel"><span style="color:#5d78ff;font-size: 2.3rem; "> Estadisticas</span></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <section v-show="varmodal == 'PobEnt'">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="kt-portlet kt-portlet--height-fluid">
                                                <div class="kt-widget14">
                                                    <div class="kt-widget14__header">
                                                        <h3 class="kt-widget14__title">
                                                            Total de Población Entrevistada
                                                        </h3>
                                                        <!-- <span class="kt-widget14__desc">
                                                            Revenue change breakdown by cities
                                                        </span> -->
                                                    </div>
                                                    <div class="kt-widget14__content">
                                                        <div class="kt-widget14__chart">
                                                            <div ref="graficaPobEnt1" id="graficaPobEnt1" style="height: 300px; width: 300px;"></div>
                                                        </div>
                                                        <div class="kt-widget14__legends">
                                                            <div class="kt-widget14__legend">
                                                                <span class="kt-widget14__bullet " style="background-color: #646C9A !important;"></span>
                                                                <span class="kt-widget14__stats"><span style="color: black;">{{poblacion}}% Total</span></span>
                                                            </div>
                                                            <div class="kt-widget14__legend">
                                                                <span class="kt-widget14__bullet" style="background-color: #5d78ff !important;"></span>
                                                                <span class="kt-widget14__stats"><span style="color: black;">{{pob_entrevistadaPor}}% Entrevistada</span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="kt-portlet kt-portlet--height-fluid">
                                                <div class="kt-widget14">
                                                    <div class="kt-widget14__header">
                                                        <h3 class="kt-widget14__title">
                                                            Viviendas Visitadas
                                                        </h3>
                                                    </div>
                                                    <div class="kt-widget14__content">
                                                        <div class="kt-widget14__chart">
                                                            <div ref="graficaPorCi" id="graficaPorCi" style="height: 300px; width: 300px;"></div>
                                                        </div>
                                                        <div class="kt-widget14__legends">
                                                            <div class="kt-widget14__legend">
                                                                <span class="kt-widget14__bullet " style="background-color: #646C9A !important;"></span>
                                                                <span class="kt-widget14__stats"><span style="color: black;">{{viviendas}}% Total</span></span>
                                                            </div>
                                                            <div class="kt-widget14__legend">
                                                                <span class="kt-widget14__bullet" style="background-color: #dd0b19 !important;"></span>
                                                                <span class="kt-widget14__stats"><span style="color: black;">{{viv_visitadas}}% Entrevistada</span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                                                                                                    
                                    </div>
                                </section>

                                <section v-show="varmodal == 'VivVis'">
                                    <div class="row">
                                        <div class="col-md-12" >
                                            <div class="kt-portlet kt-portlet--height-fluid ">
                                                <div class="kt-widget14">
                                                    <div class="kt-widget14__header">
                                                        <h3 class="kt-widget14__title">
                                                            Viviendas Visitadas
                                                        </h3>
                                                    </div>
                                                    <div class="kt-widget14__content">
                                                        <div class="kt-widget14__chart">
                                                            <div ref="graficaPorCi2" id="graficaPorCi2" style="height: 300px; width: 300px;" class=""></div>
                                                        </div>
                                                        <div class="kt-widget14__legends">
                                                            <div class="kt-widget14__legend">
                                                                <span class="kt-widget14__bullet " style="background-color: #646C9A !important;"></span>
                                                                <span class="kt-widget14__stats"><span style="color: black;">{{viviendas}}% Total</span></span>
                                                            </div>
                                                            <div class="kt-widget14__legend">
                                                                <span class="kt-widget14__bullet" style="background-color: #dd0b19 !important;"></span>
                                                                <span class="kt-widget14__stats"><span style="color: black;">{{viv_visitadas}}% Visitadas</span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                                                                                                    
                                    </div>
                                </section>

                                <section v-show="varmodal == 'HogVis'">
                                    <div class="row">
                                        <div class="col-md-12" >
                                            <div class="kt-portlet kt-portlet--height-fluid ">
                                                <div class="kt-widget14">
                                                    <div class="kt-widget14__header">
                                                        <h3 class="kt-widget14__title">
                                                            Hogares Visitados
                                                        </h3>
                                                    </div>
                                                    <div class="kt-widget14__content">
                                                        <div class="kt-widget14__chart">
                                                            <div ref="graficaHogVis" id="graficaHogVis" style="height: 300px; width: 300px;" class=""></div>
                                                        </div>
                                                        <div class="kt-widget14__legends">
                                                            <div class="kt-widget14__legend">
                                                                <span class="kt-widget14__bullet " style="background-color: #646C9A !important;"></span>
                                                                <span class="kt-widget14__stats"><span style="color: black;">{{viviendas}}% Total</span></span>
                                                            </div>
                                                            <div class="kt-widget14__legend">
                                                                <span class="kt-widget14__bullet" style="background-color: #dd0b19 !important;"></span>
                                                                <span class="kt-widget14__stats"><span style="color: black;">{{totalhogares}} Visitados</span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                                                                                                    
                                    </div>
                                </section>

                                <section v-show="varmodal == 'Salud'">
                                    <div class="row">
                                        <div class="col-md-6" >
                                            <div class="kt-portlet kt-portlet--height-fluid ">
                                                <div class="kt-widget14">
                                                    <div class="kt-widget14__header">
                                                        <h3 class="kt-widget14__title">
                                                            Adolescentes Embarazadas
                                                        </h3>
                                                    </div>
                                                    <div class="kt-widget14__content">
                                                        <div class="kt-widget14__chart">
                                                            <div ref="graficaAdoEmb" id="graficaAdoEmb" style="height: 300px; width: 300px;" class=""></div>
                                                        </div>
                                                        <div class="kt-widget14__legends">
                                                            <div class="kt-widget14__legend">
                                                                <span class="kt-widget14__bullet " style="background-color: #646C9A !important;"></span>
                                                                <span class="kt-widget14__stats"><span style="color: black;">{{poblacion}}% Total</span></span>
                                                            </div>
                                                            <div class="kt-widget14__legend">
                                                                <span class="kt-widget14__bullet" style="background-color: #dd0b19 !important;"></span>
                                                                <span class="kt-widget14__stats"><span style="color: black;">{{adolescentes}} Embarazadas</span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" >
                                            <div class="kt-portlet kt-portlet--height-fluid ">
                                                <div class="kt-widget14">
                                                    <div class="kt-widget14__header">
                                                        <h3 class="kt-widget14__title">
                                                            Adultos con Enfermedades Cronicas
                                                        </h3>
                                                    </div>
                                                    <div class="kt-widget14__content">
                                                        <div class="kt-widget14__chart">
                                                            <div ref="graficaAdulCro" id="graficaAdulCro" style="height: 300px; width: 300px;" class=""></div>
                                                        </div>
                                                        <div class="kt-widget14__legends">
                                                            <div class="kt-widget14__legend">
                                                                <span class="kt-widget14__bullet " style="background-color: #646C9A !important;"></span>
                                                                <span class="kt-widget14__stats"><span style="color: black;">{{poblacion}}% Total</span></span>
                                                            </div>
                                                            <div class="kt-widget14__legend">
                                                                <span class="kt-widget14__bullet" style="background-color: #e1b621 !important;"></span>
                                                                <span class="kt-widget14__stats"><span style="color: black;">{{adulCron}} Enf. Cronicas</span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">   
                                        <div class="col-md-6" >
                                            <div class="kt-portlet kt-portlet--height-fluid ">
                                                <div class="kt-widget14">
                                                    <div class="kt-widget14__header">
                                                        <h3 class="kt-widget14__title">
                                                            Adultos con Enfermedades Infecciosas
                                                        </h3>
                                                    </div>
                                                    <div class="kt-widget14__content">
                                                        <div class="kt-widget14__chart">
                                                            <div ref="graficaAdulInfec" id="graficaAdulInfec" style="height: 300px; width: 300px;" class=""></div>
                                                        </div>
                                                        <div class="kt-widget14__legends">
                                                            <div class="kt-widget14__legend">
                                                                <span class="kt-widget14__bullet " style="background-color: #646C9A !important;"></span>
                                                                <span class="kt-widget14__stats"><span style="color: black;">{{poblacion}}% Total</span></span>
                                                            </div>
                                                            <div class="kt-widget14__legend">
                                                                <span class="kt-widget14__bullet" style="background-color: #3c84c5 !important;"></span>
                                                                <span class="kt-widget14__stats"><span style="color: black;">{{adulInfec}} Enf. Infecciosas</span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6" >
                                            <div class="kt-portlet kt-portlet--height-fluid ">
                                                <div class="kt-widget14">
                                                    <div class="kt-widget14__header">
                                                        <h3 class="kt-widget14__title">
                                                            Total de Gestantes
                                                        </h3>
                                                    </div>
                                                    <div class="kt-widget14__content">
                                                        <div class="kt-widget14__chart">
                                                            <div ref="graficaGestan" id="graficaGestan" style="height: 300px; width: 300px;" class=""></div>
                                                        </div>
                                                        <div class="kt-widget14__legends">
                                                            <div class="kt-widget14__legend">
                                                                <span class="kt-widget14__bullet " style="background-color: #646C9A !important;"></span>
                                                                <span class="kt-widget14__stats"><span style="color: black;">{{poblacion}}% Total</span></span>
                                                            </div>
                                                            <div class="kt-widget14__legend">
                                                                <span class="kt-widget14__bullet" style="background-color: #de3f41 !important;"></span>
                                                                <span class="kt-widget14__stats"><span style="color: black;">{{gestantes}} Gestantes</span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                                                                                                                                                                                                                            
                                    </div>
                                </section>

                                <section v-show="varmodal == 'Socio'">
                                    <div class="row">
                                        <div class="col-md-6" >
                                            <div class="kt-portlet kt-portlet--height-fluid ">
                                                <div class="kt-widget14">
                                                    <div class="kt-widget14__header">
                                                        <h3 class="kt-widget14__title">
                                                            Población Inmigrante
                                                        </h3>
                                                    </div>
                                                    <div class="kt-widget14__content">
                                                        <div class="kt-widget14__chart">
                                                            <div ref="graficaPobInm" id="graficaPobInm" style="height: 300px; width: 300px;" class=""></div>
                                                        </div>
                                                        <div class="kt-widget14__legends">
                                                            <div class="kt-widget14__legend">
                                                                <span class="kt-widget14__bullet " style="background-color: #646C9A !important;"></span>
                                                                <span class="kt-widget14__stats"><span style="color: black;">{{poblacion}}% Total</span></span>
                                                            </div>
                                                            <div class="kt-widget14__legend">
                                                                <span class="kt-widget14__bullet" style="background-color: #dd0b19 !important;"></span>
                                                                <span class="kt-widget14__stats"><span style="color: black;">{{inmigrantes}} Inmigrantes</span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" >
                                            <div class="kt-portlet kt-portlet--height-fluid ">
                                                <div class="kt-widget14">
                                                    <div class="kt-widget14__header">
                                                        <h3 class="kt-widget14__title">
                                                            Desempleados
                                                        </h3>
                                                    </div>
                                                    <div class="kt-widget14__content">
                                                        <div class="kt-widget14__chart">
                                                            <div ref="graficaDesem" id="graficaDesem" style="height: 300px; width: 300px;" class=""></div>
                                                        </div>
                                                        <div class="kt-widget14__legends">
                                                            <div class="kt-widget14__legend">
                                                                <span class="kt-widget14__bullet " style="background-color: #646C9A !important;"></span>
                                                                <span class="kt-widget14__stats"><span style="color: black;">{{poblacion}}% Total</span></span>
                                                            </div>
                                                            <div class="kt-widget14__legend">
                                                                <span class="kt-widget14__bullet" style="background-color: #e1b621 !important;"></span>
                                                                <span class="kt-widget14__stats"><span style="color: black;">{{desempleados}} Desempleados</span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">   
                                        <div class="col-md-6" >
                                            <div class="kt-portlet kt-portlet--height-fluid ">
                                                <div class="kt-widget14">
                                                    <div class="kt-widget14__header">
                                                        <h3 class="kt-widget14__title">
                                                            Población Indigenas
                                                        </h3>
                                                    </div>
                                                    <div class="kt-widget14__content">
                                                        <div class="kt-widget14__chart">
                                                            <div ref="graficaIndi" id="graficaIndi" style="height: 300px; width: 300px;" class=""></div>
                                                        </div>
                                                        <div class="kt-widget14__legends">
                                                            <div class="kt-widget14__legend">
                                                                <span class="kt-widget14__bullet " style="background-color: #646C9A !important;"></span>
                                                                <span class="kt-widget14__stats"><span style="color: black;">{{poblacion}}% Total</span></span>
                                                            </div>
                                                            <div class="kt-widget14__legend">
                                                                <span class="kt-widget14__bullet" style="background-color: #3c84c5 !important;"></span>
                                                                <span class="kt-widget14__stats"><span style="color: black;">{{indigenas}} Indigenas</span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6" >
                                            <div class="kt-portlet kt-portlet--height-fluid ">
                                                <div class="kt-widget14">
                                                    <div class="kt-widget14__header">
                                                        <h3 class="kt-widget14__title">
                                                            Analfabetas
                                                        </h3>
                                                    </div>
                                                    <div class="kt-widget14__content">
                                                        <div class="kt-widget14__chart">
                                                            <div ref="graficaAnalfa" id="graficaAnalfa" style="height: 300px; width: 300px;" class=""></div>
                                                        </div>
                                                        <div class="kt-widget14__legends">
                                                            <div class="kt-widget14__legend">
                                                                <span class="kt-widget14__bullet " style="background-color: #646C9A !important;"></span>
                                                                <span class="kt-widget14__stats"><span style="color: black;">{{poblacion}}% Total</span></span>
                                                            </div>
                                                            <div class="kt-widget14__legend">
                                                                <span class="kt-widget14__bullet" style="background-color: #de3f41 !important;"></span>
                                                                <span class="kt-widget14__stats"><span style="color: black;">{{analfabetas}} Analfabetas</span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                                                                                                                                                                                                                            
                                    </div>
                                </section>                                                                                                                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" @click="cerrarModal">
                                        <i class="fa fa-window-close"></i> Cerrar
                                    </button>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Modal-->              
            </div>
        </div>
    </div>
</template>

<script>
"use strict";
import * as administracionServicios from "../Servicios/administracion_servicios";
export default {
    mounted() {
        this.nuevo();
    },
    data() {
        return {
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            barra: "baradescroll",
            varmodal: "",
            poblacion: 0,
            pob_entrevistada: 0,
            pob_entrevistadaPor: 0,
            viviendas: 0,
            viv_visitadas: 0,
            viv_visitadasPor: 0,
            hog_visitados: 0,
            hog_visitadosPor: 0,
            totalhogares: 0,
            adolescentes: 0,
            adulCron: 0,
            adulInfec: 0,
            gestantes: 0,
            inmigrantes: 0,
            desempleados: 0,
            indigenas: 0,
            analfabetas: 0
        };
    },
    methods: {
        nuevo: async function() {
            const parametros = {
                _token: this.csrf,
                opcion: "Todos"
            };

            try {
            await administracionServicios
                .listar(parametros)
                .then(respuesta => {
                    this.pob_entrevistada = respuesta.data.totalEntrevistada;
                    this.viv_visitadas = respuesta.data.viviendasVisitados;
                });
            } catch (error) {
                switch (error.response.status) {
                    case 422:
                    this.$swal("Error...!", "Ocurrio un error!", "error");
                    break;
                    default:
                    this.$swal("Error...!", "Ocurrio un error!", "error");
                    break;
                }
            }            
        },
        derecha(){
            var imageWidth = 500;
            $("#"+this.barra).animate({scrollLeft:"+="+imageWidth}, 500);
        },
        izquierda(){
            var imageWidth = 500;
            $("#"+this.barra).animate({scrollLeft:"-="+imageWidth}, 500);
        },
        cambiarTab2(opcion) {
            if(opcion==="tabZonas"){
                this.barra = "baradescroll";                
            }
            if(opcion==="tabPoblacion"){
                this.barra = "baradescroll1";
            }
            if(opcion==="tabSalud"){
                this.barra = "baradescroll2";
            }
            if(opcion==="tabAmbiental"){
                this.barra = "baradescroll3";
            }
            $("#"+this.barra).animate({scrollLeft:"-="+0}, 500);
        },
        abrirModal(opcion) {
            // this.$refs.modalProfesional.show();
            $("#modalProfesional").modal("show");
            this.buscar(opcion);
        },
        cerrarModal() {
            $("#modalProfesional").modal("hide");
        },
        buscar: async function(opcion){
            //POBLACION ENTREVISTADA
            if(opcion === "PobEnt"){
                const parametros = {
                    _token: this.csrf,
                    opcion: opcion
                };

                try {
                await administracionServicios
                    .listar(parametros)
                    .then(respuesta => {
                        
                        this.poblacion = Math.floor(respuesta.data.poblacion/respuesta.data.poblacion*100);
                        this.pob_entrevistadaPor = Math.floor(respuesta.data.totalEntrevistada/respuesta.data.poblacion*100);
                        this.viviendas = Math.floor(respuesta.data.viviendas/respuesta.data.viviendas*100);
                        this.viv_visitadasPor = Math.floor(respuesta.data.viviendasVisitados/respuesta.data.viviendas*100);

                        this.$refs.graficaPobEnt1.length="";
                        $("#graficaPobEnt1").html("");
                        Morris.Donut({
                            element: 'graficaPobEnt1',
                            resize: true,
                            data: [{
                                    label: "Población Total",
                                    value: respuesta.data.poblacion
                                },
                                {
                                    label: "Población Entrevistada",
                                    value: respuesta.data.totalEntrevistada
                                }
                            ],
                            // formatter: function (value, data) { 
                            //     return Math.floor(value/3000*100) + '%'; 
                            // },                    
                            colors: [
                                "networking", "#5d78ff", "#5d78ff"
                            ],
                        });                        
                        $("#graficaPobEnt1").find("tspan").attr('dy', '5');
                        
                        this.$refs.graficaPorCi.length="";
                        $("#graficaPorCi").html("");
                        Morris.Donut({
                            element: 'graficaPorCi',
                            resize: true,
                            data: [{
                                    label: "Total Viviendas",
                                    value: respuesta.data.viviendas
                                },
                                {
                                    label: "Viviendas Visitadas",
                                    value: respuesta.data.viviendasVisitados
                                }
                            ],
                            // formatter: function (value, data) { 
                            //     return Math.floor(value/3000*100) + '%'; 
                            // },                    
                            colors: [
                                "networking", "#dd0b19", "#5d78ff"
                            ],
                        });                        
                        $("#graficaPorCi").find("tspan").attr('dy', '5');                        
                        // console.log(this.totalCiclos);
                        });


                } catch (error) {
                    switch (error.response.status) {
                        case 422:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                        default:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                    }
                }                
            }
            if(opcion === "VivVis"){
                const parametros = {
                    _token: this.csrf,
                    opcion: opcion
                };

                try {
                await administracionServicios
                    .listar(parametros)
                    .then(respuesta => {                        
                        this.viviendas = Math.floor(respuesta.data.viviendas/respuesta.data.viviendas*100);
                        this.viv_visitadasPor = Math.floor(respuesta.data.viviendasVisitados/respuesta.data.viviendas*100);
                        
                        this.$refs.graficaPorCi2.length="";
                        $("#graficaPorCi2").html("");
                        Morris.Donut({
                            element: 'graficaPorCi2',
                            resize: true,
                            data: [{
                                    label: "Total Viviendas",
                                    value: respuesta.data.viviendas
                                },
                                {
                                    label: "Viviendas Visitadas",
                                    value: respuesta.data.viviendasVisitados
                                }
                            ],
                            // formatter: function (value, data) { 
                            //     return Math.floor(value/3000*100) + '%'; 
                            // },                    
                            colors: [
                                "networking", "#dd0b19", "#5d78ff"
                            ],
                        });                        
                        $("#graficaPorCi2").find("tspan").attr('dy', '5');                        
                        // console.log(this.totalCiclos);
                        });


                } catch (error) {
                    switch (error.response.status) {
                        case 422:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                        default:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                    }
                }                
            }
            if(opcion === "HogVis"){
                const parametros = {
                    _token: this.csrf,
                    opcion: opcion
                };

                try {
                await administracionServicios
                    .listar(parametros)
                    .then(respuesta => {                        
                        this.viviendas = Math.floor(respuesta.data.viviendas/respuesta.data.viviendas*100);
                        this.viv_visitadasPor = Math.floor(respuesta.data.viviendasVisitados/respuesta.data.viviendas*100);
                        this.totalhogares = respuesta.data.totalhogares;
                        this.$refs.graficaHogVis.length="";
                        $("#graficaHogVis").html("");
                        Morris.Donut({
                            element: 'graficaHogVis',
                            resize: true,
                            data: [{
                                    label: "Total Viviendas",
                                    value: respuesta.data.viviendas
                                },
                                {
                                    label: "Hogares Visitados",
                                    value: respuesta.data.totalhogares
                                }
                            ],
                            // formatter: function (value, data) { 
                            //     return Math.floor(value/3000*100) + '%'; 
                            // },                    
                            colors: [
                                "networking", "#dd0b19", "#5d78ff"
                            ],
                        });                        
                        $("#graficaHogVis").find("tspan").attr('dy', '5');                        
                        // console.log(this.totalCiclos);
                        });


                } catch (error) {
                    switch (error.response.status) {
                        case 422:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                        default:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                    }
                }                
            }            
            if(opcion === "Salud"){
                const parametros = {
                    _token: this.csrf,
                    opcion: opcion
                };

                try {
                await administracionServicios
                    .listar(parametros)
                    .then(respuesta => {                        
                        this.poblacion = Math.floor(respuesta.data.poblacion/respuesta.data.poblacion*100);                        
                        this.adolescentes = respuesta.data.adolescentes;
                        this.adulCron = respuesta.data.adulCron;
                        this.adulInfec = respuesta.data.adulInfec;
                        this.gestantes = respuesta.data.gestantes;
                        
                        
                        this.$refs.graficaAdoEmb.length="";
                        $("#graficaAdoEmb").html("");
                        Morris.Donut({
                            element: 'graficaAdoEmb',
                            resize: true,
                            data: [{
                                    label: "Total Población",
                                    value: respuesta.data.poblacion
                                },
                                {
                                    label: "Adolescentes Embarazadas",
                                    value: respuesta.data.adolescentes
                                }
                            ],                 
                            colors: [
                                "networking", "#dd0b19", "#5d78ff"
                            ],
                        });                        
                        $("#graficaAdoEmb").find("tspan").attr('dy', '5');                        

                        this.$refs.graficaAdulCro.length="";
                        $("#graficaAdulCro").html("");
                        Morris.Donut({
                            element: 'graficaAdulCro',
                            resize: true,
                            data: [{
                                    label: "Total Población",
                                    value: respuesta.data.poblacion
                                },
                                {
                                    label: "Enfermedades Cronicas",
                                    value: respuesta.data.adulCron
                                }
                            ],                 
                            colors: [
                                "networking", "#e1b621", "#5d78ff"
                            ],
                        });                        
                        $("#graficaAdulCro").find("tspan").attr('dy', '5');

                        this.$refs.graficaAdulInfec.length="";
                        $("#graficaAdulInfec").html("");
                        Morris.Donut({
                            element: 'graficaAdulInfec',
                            resize: true,
                            data: [{
                                    label: "Total Población",
                                    value: respuesta.data.poblacion
                                },
                                {
                                    label: "Enfermedades Infecciosas",
                                    value: respuesta.data.adulInfec
                                }
                            ],                 
                            colors: [
                                "networking", "#3c84c5", "#5d78ff"
                            ],
                        });                        
                        $("#graficaAdulInfec").find("tspan").attr('dy', '5');

                        this.$refs.graficaGestan.length="";
                        $("#graficaGestan").html("");
                        Morris.Donut({
                            element: 'graficaGestan',
                            resize: true,
                            data: [{
                                    label: "Total Población",
                                    value: respuesta.data.poblacion
                                },
                                {
                                    label: "Gestantes",
                                    value: respuesta.data.gestantes
                                }
                            ],                 
                            colors: [
                                "networking", "#de3f41", "#5d78ff"
                            ],
                        });                        
                        $("#graficaGestan").find("tspan").attr('dy', '5');                        
                            
                            
                    });


                } catch (error) {
                    switch (error.response.status) {
                        case 422:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                        default:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                    }
                }                
            }
            if(opcion === "Socio"){
                const parametros = {
                    _token: this.csrf,
                    opcion: opcion
                };

                try {
                await administracionServicios
                    .listar(parametros)
                    .then(respuesta => {                        
                        this.poblacion = Math.floor(respuesta.data.poblacion/respuesta.data.poblacion*100);                        
                        this.inmigrantes = respuesta.data.inmigrantes;
                        this.desempleados = respuesta.data.desempleados;
                        this.indigenas = respuesta.data.indigenas;
                        this.analfabetas = respuesta.data.analfabetas;
                        
                        this.$refs.graficaPobInm.length="";
                        $("#graficaPobInm").html("");
                        Morris.Donut({
                            element: 'graficaPobInm',
                            resize: true,
                            data: [{
                                    label: "Total Población",
                                    value: respuesta.data.poblacion
                                },
                                {
                                    label: "Población Inmigrante",
                                    value: respuesta.data.inmigrantes
                                }
                            ],                 
                            colors: [
                                "networking", "#dd0b19", "#5d78ff"
                            ],
                        });                        
                        $("#graficaPobInm").find("tspan").attr('dy', '5');                        

                        this.$refs.graficaDesem.length="";
                        $("#graficaDesem").html("");
                        Morris.Donut({
                            element: 'graficaDesem',
                            resize: true,
                            data: [{
                                    label: "Total Población",
                                    value: respuesta.data.poblacion
                                },
                                {
                                    label: "Desempleados",
                                    value: respuesta.data.desempleados
                                }
                            ],                 
                            colors: [
                                "networking", "#e1b621", "#5d78ff"
                            ],
                        });                        
                        $("#graficaDesem").find("tspan").attr('dy', '5');  

                        this.$refs.graficaIndi.length="";
                        $("#graficaIndi").html("");
                        Morris.Donut({
                            element: 'graficaIndi',
                            resize: true,
                            data: [{
                                    label: "Total Población",
                                    value: respuesta.data.poblacion
                                },
                                {
                                    label: "Indigenas",
                                    value: respuesta.data.indigenas
                                }
                            ],                 
                            colors: [
                                "networking", "#3c84c5", "#5d78ff"
                            ],
                        });                        
                        $("#graficaIndi").find("tspan").attr('dy', '5');
                        
                        this.$refs.graficaAnalfa.length="";
                        $("#graficaAnalfa").html("");
                        Morris.Donut({
                            element: 'graficaAnalfa',
                            resize: true,
                            data: [{
                                    label: "Total Población",
                                    value: respuesta.data.poblacion
                                },
                                {
                                    label: "Analfabetas",
                                    value: respuesta.data.analfabetas
                                }
                            ],                 
                            colors: [
                                "networking", "#de3f41", "#de3f41"
                            ],
                        });                        
                        $("#graficaAnalfa").find("tspan").attr('dy', '5');                                                 



                    });


                } catch (error) {
                    switch (error.response.status) {
                        case 422:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                        default:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                    }
                }                
            }                                  
            this.varmodal = opcion;
            //POBLACION ENTREVISTADA
            
        }      
    }
};
</script>

<style>
.kt-bg-wor{
    background-color: #646C9A !important;
}
.modal-lg, .modal-xl {
    max-width: 90%;
}
  .modal-backdrop {
    background-color: rgba(0, 0, 0, 0.5) !important;
  }
  .modal-title {
    color: #f8f9fa !important;
  }
  .close {
    display: none;
  }
.color-datepicker {
    background: #f2f2f2;
    border: 1px solid #ddd;
    padding: 0em 1em 1em;
    margin-bottom: 2em;
}
/* #baradescroll::-webkit-scrollbar {
    display: none;
} */
#baradescroll,#baradescroll1,#baradescroll2,#baradescroll3 {
    overflow-x: hidden;
}

#baradescroll:hover {
    overflow-x: auto;
}
#baradescroll1:hover {
    overflow-x: auto;
}
#baradescroll2:hover {
    overflow-x: auto;
}
#baradescroll3:hover {
    overflow-x: auto;
}
.kt-widget__item a:hover {
    color: black !important;
}
/* .kt-nav__link-icon:hover{color: black !important;} */
.kt-widget__item:hover {
    background: black !important;
    color: black !important;
}
.grayclase {
    animation: flip 6s linear infinite;
    transform: rotateX(0deg);
}

@keyframes flip {
    0% {
        transform: rotateX(0deg);
    }
    15% {
        transform: rotateX(360deg);
    }
    100% {
        transform: rotateX(360deg);
    }
}

@keyframes fade {
    0% {
        opacity: 0;
    }
    10% {
        opacity: 1;
    }
    50% {
        opacity: 1;
    }
    60% {
        opacity: 0;
    }
}

.img-contenedor {
    -webkit-transition: all 0.9s ease; /* Safari y Chrome */
    -moz-transition: all 0.9s ease; /* Firefox */
    -o-transition: all 0.9s ease; /* IE 9 */
    -ms-transition: all 0.9s ease; /* Opera */
    width: 100%;
}
.img-contenedor:hover {
    -webkit-transform: scale(1.25);
    -moz-transform: scale(1.25);
    -ms-transform: scale(1.25);
    -o-transform: scale(1.25);
    transform: scale(1.25);
}
</style>
