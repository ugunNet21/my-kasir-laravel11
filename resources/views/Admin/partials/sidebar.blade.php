<!-- sidebar -->
{{-- <aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <h2>Kasir App</h2>
    </div>
    <nav class="sidebar-nav">
        <ul>
            <li><a href="{{ route('dashboard') }}"> <i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="#sales"><i class="fas fa-shopping-cart"></i> Sales</a></li>
            <li class=""><a href="{{  route('invoices.index') }}">Invoice</a></li>
            <li class=""><a href="{{  route('invoices.index') }}">Customer</a></li>
            <li class=""><a href="{{  route('invoices.index') }}">services</a></li>
            <li class=""><a href="{{  route('invoices.index') }}">spareparts</a></li>
            <li class=""><a href="{{  route('invoices.index') }}">technicians</a></li>
            <li class=""><a href="{{  route('invoices.index') }}">paymentmethods</a></li>
            <li class=""><a href="{{  route('invoices.index') }}">repairstatuses</a></li>
            <li class=""><a href="{{  route('invoices.index') }}">categories</a></li>
            <li class=""><a href="{{  route('invoices.index') }}">taxes</a></li>
            <li class=""><a href="{{  route('invoices.index') }}">invoices-status</a></li>
            <li><a href="#inventory"><i class="fas fa-boxes"></i> Inventory</a></li>
            <li><a href="#reports"><i class="fas fa-chart-line"></i> Reports</a></li>
            <li><a href="#settings"><i class="fas fa-cogs"></i> Settings</a></li>
        </ul>
    </nav>
</aside> --}}

<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <h2>Kasir App</h2>
    </div>
    <nav class="sidebar-nav">
        <ul>
            <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}"> <i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
            <li class="{{ request()->routeIs('sales.*') ? 'active' : '' }}">
                <a href="#salesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-shopping-cart"></i> Sales
                </a>
                <ul class="collapse list-unstyled" id="salesSubmenu">
                    <li><a href="{{ route('invoices.index') }}">Invoices</a></li>
                    <li><a href="{{ route('customers.index') }}">Customers</a></li>
                </ul>
            </li>
            <li class="{{ request()->routeIs('inventory.*') ? 'active' : '' }}">
                <a href="#inventorySubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-boxes"></i> Inventory
                </a>
                <ul class="collapse list-unstyled" id="inventorySubmenu">
                    <li><a href="{{ route('spareparts.index') }}">Spare Parts</a></li>
                    <li><a href="{{ route('services.index') }}">Services</a></li>
                </ul>
            </li>
            <li class="{{ request()->routeIs('management.*') ? 'active' : '' }}">
                <a href="#managementSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-users-cog"></i> Management
                </a>
                <ul class="collapse list-unstyled" id="managementSubmenu">
                    <li><a href="{{ route('technicians.index') }}">Technicians</a></li>
                    <li><a href="{{ route('paymentmethods.index') }}">Payment Methods</a></li>
                    <li><a href="{{ route('repairstatuses.index') }}">Repair Statuses</a></li>
                    <li><a href="{{ route('categories.index') }}">Categories</a></li>
                    <li><a href="{{ route('taxes.index') }}">Taxes</a></li>
                    <li><a href="{{ route('invoices.checkStatus') }}">Invoice Status</a></li>
                </ul>
            </li>
            <li class="{{ request()->routeIs('reports.*') ? 'active' : '' }}">
                <a href="#reportsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-chart-line"></i> Reports
                </a>
                <ul class="collapse list-unstyled" id="reportsSubmenu">
                    <li><a href="#salesReports">Sales Reports</a></li>
                    <li><a href="#inventoryReports">Inventory Reports</a></li>
                </ul>
            </li>
            <li class="{{ request()->routeIs('settings.*') ? 'active' : '' }}">
                <a href="#settingsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-cogs"></i> Settings
                </a>
                <ul class="collapse list-unstyled" id="settingsSubmenu">
                    <li><a href="#generalSettings">General Settings</a></li>
                    <li><a href="#userSettings">User Settings</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>

<!-- end sidebar -->
