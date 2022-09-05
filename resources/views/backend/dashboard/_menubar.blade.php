<div class="br-logo"><a href=""><span>[</span>bracket <i>plus</i><span>]</span></a></div>
<div class="br-sideleft sideleft-scrollbar">
    <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
    <ul class="br-sideleft-menu">
      <li class="br-menu-item">
        <a href="{{ Route('dashboard') }}" class="br-menu-link  @yield('dashboard')">
          <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
          <span class="menu-item-label">Dashboard</span>
        </a><!-- br-menu-link -->
      </li><!-- br-menu-item -->
                  <!-- this is branch section  -->
      <li class="br-menu-item">
        <a href="{{ Route('branch') }}" class="br-menu-link  @yield('branch')">
          <i class="fas fa-briefcase tx-24"></i>
          <span class="menu-item-label">Branch</span>
        </a><!-- br-menu-link -->
      </li><!-- br-menu-item -->
         <!-- End Branch section  -->
                  <!-- this is product section  -->
      <li class="br-menu-item">
        <a href="{{Route('product')}}" class="br-menu-link @yield('product')">
          <i class="fab fa-product-hunt tx-24"></i>
          <span class="menu-item-label">Product</span>
        </a><!-- br-menu-link -->
      </li><!-- br-menu-item -->
                  <!-- this is Employee section  -->
      <li class="br-menu-item">
        <a href="{{ Route('employee') }}" class="br-menu-link @yield('employee')">
          <i class="fas fa-user-circle tx-24"></i>
          <span class="menu-item-label">Employee</span>
        </a><!-- br-menu-link -->
      </li><!-- br-menu-item -->
                  <!-- this is Company section  -->
      <li class="br-menu-item">
        <a href="{{ Route('company') }}" class="br-menu-link  @yield('company')">
          <i class="fas fa-building tx-24"></i>
          <span class="menu-item-label">Company</span>
        </a><!-- br-menu-link -->
      </li><!-- br-menu-item -->
                        <!-- this is cost section  -->
      <li class="br-menu-item">
        <a href="{{ Route('cost') }}" class="br-menu-link  @yield('cost')">
          <i class="fas fa-hand-holding-usd tx-24"></i>
          <span class="menu-item-label">Cost</span>
        </a><!-- br-menu-link -->
      </li><!-- br-menu-item -->
                       <!-- End cost section  -->
      <li class="br-menu-item">
        <a href="#" class="br-menu-link with-sub  @yield('bank')">
            <i class="fas fa-piggy-bank tx-24"></i>
          <span class="menu-item-label">Bank Information</span>
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub">
          <li class="sub-item"><a href="{{ Route('Banksaving') }}" class="sub-link  @yield('banksave')">Bank Saving</a></li>
          <li class="sub-item"><a href="{{ Route('Bankcost') }}" class="sub-link  @yield('bankcost')">Bank Cost </a></li>
        </ul>
      </li>
                       <!-- End bank section  -->
      <li class="br-menu-item">
        <a href="{{ Route('purchase') }}" class="br-menu-link  @yield('purchase')">
            <i class=" fas fa-box tx-24"></i>
          <span class="menu-item-label">Purchase</span>
        </a><!-- br-menu-link -->
      </li>
                       <!-- End purchase section  -->
      <li class="br-menu-item">
        <a href="{{ Route('sales') }}" class="br-menu-link   @yield('sales')">
            <i class=" fas fa-coins tx-24"></i>
          <span class="menu-item-label">Sale</span>
        </a><!-- br-menu-link -->
      </li>
                       <!-- End sales section  -->
      <li class="br-menu-item">
        <a href="#" class="br-menu-link with-sub  @yield('stock')">
            <i class="fas fa-store-alt tx-24"></i>
          <span class="menu-item-label">Stock And Buy </span>
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub">
          <li class="sub-item"><a href="{{ Route('StockProduct') }}" class="sub-link @yield('total_stock')">Total Stock</a></li>
          <li class="sub-item"><a href="{{ Route('BuyNeed') }}" class="sub-link @yield('buy')">Need Buy </a></li>
        </ul>
      </li>
                       <!-- End Stock section  -->
                       <label class="sidebar-label pd-x-10 mg-t-20 text-danger ">Working Process</label>
      <li class="br-menu-item">
        <a href="#" class="br-menu-link with-sub  @yield('income')">
            <i class="far fa-credit-card tx-24"></i>
          <span class="menu-item-label">Income</span>
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub">
          <li class="sub-item"><a href="{{ Route('dailyincome') }}" class="sub-link @yield('todayincome')">Today Income</a></li>
          <li class="sub-item"><a href="{{ Route('monthlyincome') }}" class="sub-link @yield('monthlyincome')">Monthly Income </a></li>
          <li class="sub-item"><a href="{{ Route('yearlyincome') }}" class="sub-link @yield('yearlyincome')">Yearly Income </a></li>
        </ul>
      </li>
                       <!-- End Income  section  -->
      <li class="br-menu-item">
        <a href="#" class="br-menu-link  @yield('Approved')">
            <i class="fas fa-user-shield tx-24"></i>
          <span class="menu-item-label">Approved User</span>
        </a><!-- br-menu-link -->
      </li>
                       <!-- End Approved  section  -->

    </ul><!-- br-sideleft-menu -->

    <br>
  </div><!-- br-sideleft -->
