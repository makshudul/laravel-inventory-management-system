<div class="br-logo"><a href=""><span>[</span>bracket <i>plus</i><span>]</span></a></div>
<div class="br-sideleft sideleft-scrollbar">
    <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
    <ul class="br-sideleft-menu">
      <li class="br-menu-item">
        <a href="{{ Route('dashboard') }}" class="br-menu-link ">
          <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
          <span class="menu-item-label">Dashboard</span>
        </a><!-- br-menu-link -->
      </li><!-- br-menu-item -->
                  <!-- this is product section  -->
      <li class="br-menu-item">
        <a href="#" class="br-menu-link with-sub">
          <i class="fab fa-product-hunt tx-24"></i>
          <span class="menu-item-label">Product</span>
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{Route('Product_code') }}" class="sub-link">Insert Product Code</a></li>
            <li class="sub-item"><a href="{{Route('product')}}" class="sub-link">Insert Product</a></li>
          </ul>
      </li><!-- br-menu-item -->
                  <!-- this is Employee section  -->
      <li class="br-menu-item">
        <a href="{{ Route('employee') }}" class="br-menu-link">
          <i class="fas fa-user-circle tx-24"></i>
          <span class="menu-item-label">Employee</span>
        </a><!-- br-menu-link -->
      </li><!-- br-menu-item -->
                  <!-- this is Company section  -->
      <li class="br-menu-item">
        <a href="{{ Route('company') }}" class="br-menu-link">
          <i class="fas fa-building tx-24"></i>
          <span class="menu-item-label">Company</span>
        </a><!-- br-menu-link -->
      </li><!-- br-menu-item -->
                        <!-- this is cost section  -->
      <li class="br-menu-item">
        <a href="{{ Route('cost') }}" class="br-menu-link">
          <i class="fas fa-hand-holding-usd tx-24"></i>
          <span class="menu-item-label">Cost</span>
        </a><!-- br-menu-link -->
      </li><!-- br-menu-item -->
                       <!-- End cost section  -->
      <li class="br-menu-item">
        <a href="#" class="br-menu-link with-sub">
            <i class="fas fa-piggy-bank tx-24"></i>
          <span class="menu-item-label">Bank Information</span>
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub">
          <li class="sub-item"><a href="{{ Route('Banksaving') }}" class="sub-link">Bank Saving</a></li>
          <li class="sub-item"><a href="{{ Route('Bankcost') }}" class="sub-link">Bank Cost </a></li>
        </ul>
      </li>
    </ul><!-- br-sideleft-menu -->

    <br>
  </div><!-- br-sideleft -->
