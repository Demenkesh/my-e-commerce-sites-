{{-- Admin sidebar --}}
<div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Menu</li>

            <li>
                <a href="{{ url('dashboard') }}" class="waves-effect"><i class="mdi mdi-view-dashboard">
                    </i><span class="badge badge-pill badge-info float-right">
                        <i class="bi bi-house-fill"  style="color:#1c1c50"></i></span><span>Dashboard</span></a>
            </li>
            <li>
                <a class="waves-effect">
                    <i class="mdi mdi-book-open-page-variant"></i>
                    <span class="badge badge-pill badge-info float-right">
                        <i class="bi bi-book" style="color:#1c1c50"></i>
                    </span>
                    <span>Slider</span></a>
                <ul class="sub-menu"  aria-expanded="false">
                    <li><a href="{{ url('slider') }}">Slider views</a></li>
                    <li><a href="{{ url('add-slider') }}">Add Slider</a></li>
                </ul>
            </li>
                <li>
                    <a class="waves-effect">
                        <i class="mdi mdi-book-open-page-variant"></i>
                        <span class="badge badge-pill badge-info float-right">
                            <i class="bi bi-file-text-fill " style="color:#1c1c50"></i>
                        </span>
                        <span>Category</span></a>
                    <ul class="sub-menu"  aria-expanded="false">
                        <li ><a href="{{ url('categories') }}">Category views</a></li>
                        <li><a href="{{ url('add-category') }}">Add Categorys</a></li>
                    </ul>
                </li>
                <li>
                    <a class="waves-effect">
                        <i class="mdi mdi-book-open-page-variant"></i>
                        <span class="badge badge-pill badge-info float-right">
                            <i class="bi bi-patch-plus-fill" style="color:#1c1c50"></i>
                        </span>
                        <span>Product</span></a>
                    <ul class="sub-menu"  aria-expanded="false">
                        <li><a href="{{ url('products') }}">Product views</a></li>
                        <li><a href="{{ url('add-products') }}">Add Products</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('orders') }}" class="waves-effect"><i class="mdi mdi-view-dashboard">
                        </i><span class="badge badge-pill badge-info float-right">
                            <i class="bi bi-cart"  style="color:#1c1c50"></i></span><span>Orders</span></a>
                </li>
                <li>
                    <a href="{{ url('users') }}" class="waves-effect"><i class="mdi mdi-view-dashboard">
                        </i><span class="badge badge-pill badge-info float-right">
                            <i class="bi bi-person-circle"  style="color:#1c1c50"></i></span><span>Users</span></a>
                </li>
                <li>
                    <a class="waves-effect">
                        <i class="mdi mdi-book-open-page-variant"></i>
                        <span class="badge badge-pill badge-info float-right">
                            <i class="bi bi-patch-plus-fill" style="color:#1c1c50"></i>
                        </span>
                        <span>Currency</span></a>
                    <ul class="sub-menu"  aria-expanded="false">
                        <li><a href="{{ url('currency') }}">currencies views</a></li>
                        <li><a href="{{ url('add-currency') }}">Add currencies</a></li>
                    </ul>
                </li>
            <li class="menu-title">{{ config('app.name') }}</li>

            {{-- <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                        class="mdi mdi-briefcase-check"></i><span>UI Elements</span></a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="ui-buttons.html">Buttons</a></li>
                    <li><a href="ui-cards.html">Cards</a></li>
                    <li><a href="ui-carousel.html">Carousel</a>
                    <li><a href="ui-embeds.html">Embeds</a>
                    <li><a href="ui-general.html">General</a></li>
                    <li><a href="ui-grid.html">Grid</a></li>
                    <li><a href="ui-media-objects.html">Media Objects</a></li>
                    <li><a href="ui-modals.html">Modals</a></li>
                    <li><a href="ui-progressbars.html">Progress Bars</a></li>
                    <li><a href="ui-tabs.html">Tabs</a></li>
                    <li><a href="ui-typography.html">Typography</a></li>
                    <li><a href="ui-toasts.html">Toasts</a></li>
                    <li><a href="ui-tooltips-popovers.html">Tooltips & Popovers</a></li>
                    <li><a href="ui-scrollspy.html">Scrollspy</a></li>
                    <li><a href="ui-spinners.html">Spinners</a></li>
                    <li><a href="ui-sweetalerts.html">Sweet Alerts</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="waves-effect"><i class="mdi mdi-format-page-break"></i><span
                        class="badge badge-pill badge-danger float-right">6</span><span>Forms</span></a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="forms-elements.html">Elements</a></li>
                    <li><a href="forms-plugins.html">Plugins</a></li>
                    <li><a href="forms-validation.html">Validation</a></li>
                    <li><a href="forms-mask.html">Masks</a></li>
                    <li><a href="forms-quilljs.html">Quilljs</a></li>
                    <li><a href="forms-uploads.html">File Uploads</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                        class="mdi mdi-table-merge-cells"></i><span>Tables</span></a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="tables-basic.html">Basic Tables</a></li>
                    <li><a href="tables-datatables.html">Data Tables</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                        class="mdi mdi-chart-donut"></i><span>Charts</span></a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="charts-morris.html">Morris</a></li>
                    <li><a href="charts-google.html">Google</a></li>
                    <li><a href="charts-chartjs.html">Chartjs</a></li>
                    <li><a href="charts-sparkline.html">Sparkline</a></li>
                    <li><a href="charts-knob.html">Jquery Knob</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                        class="mdi mdi-black-mesa"></i><span>Icons</span></a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="icons-feather.html">Feather Icons</a></li>
                    <li><a href="icons-materialdesign.html">Material Design</a></li>
                    <li><a href="icons-dripicons.html">Dripicons</a></li>
                    <li><a href="icons-fontawesome.html">Font awesome</a></li>
                </ul>
            </li>

            <li class="menu-title">More</li>

            <li><a href="calendar.html" class=" waves-effect"><i class="mdi mdi-calendar"></i><span>Calendar</span></a>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                        class="mdi mdi-map-marker-multiple"></i><span>Maps</span></a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="maps-google.html">Google Maps</a></li>
                    <li><a href="maps-vector.html">Vector Maps</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                        class="mdi mdi-share-variant"></i><span>Multi Level</span></a>
                <ul class="sub-menu" aria-expanded="true">
                    <li><a href="javascript: void(0);">Level 1.1</a></li>
                    <li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="javascript: void(0);">Level 2.1</a></li>
                            <li><a href="javascript: void(0);">Level 2.2</a></li>
                        </ul>
                    </li>
                </ul>
            </li> --}}

        </ul>
    </div>
    <!-- Sidebar -->
</div>
