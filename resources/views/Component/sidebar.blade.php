<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Elektrofoton</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">E!</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Master</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Master</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" asp-area="" asp-controller="Customer" asp-action="Index">Customer</a></li>
                    <li><a class="nav-link" asp-area="" asp-controller="Produk" asp-action="Index">Produk</a></li>
                </ul>
            </li>
            <li class="menu-header">Transaction</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Transaction</span></a>
                <ul class="dropdown-menu">
                    <li>
                    <li><a class="nav-link" asp-area="" asp-controller="Penjualan" asp-action="Index">Penjualan</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>