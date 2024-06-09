<!-- sidebar -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <h2>Kasir App</h2>
    </div>
    <nav class="sidebar-nav">
        @php
            $selectedMenu = 'invoices';
        @endphp
        <ul>
            <li><a href="{{ route('dashboard') }}"> <i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li>
                <a href="#sales"><i class="fas fa-shopping-cart"></i> Sales</a>
                <ul class="dropdown">
                    <li class="{{ $selectedMenu == 'invoices' ? 'active' : 'inactive' }}"><a href="{{  route('invoices.index') }}">Invoice</a></li>
                </ul>
            </li>
            <li><a href="#inventory"><i class="fas fa-boxes"></i> Inventory</a></li>
            <li><a href="#reports"><i class="fas fa-chart-line"></i> Reports</a></li>
            <li><a href="#settings"><i class="fas fa-cogs"></i> Settings</a></li>
        </ul>
    </nav>
</aside>
<!-- end sidebar -->
