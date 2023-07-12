<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="/dashobardlayoutawal">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a href="/perusahaan" class="nav-link collapsed">
          <i class="bx bxs-building-house"></i><span>Perusahaan</span>
        </a>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="/wilayah">
          <i class="bi bi-journal-text"></i><span>Wilayah</span>
        </a>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="/sekolah">
          <i class="bx bxs-school"></i><span>Sekolah</span>
        </a>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a  href="/kategori" class="nav-link collapsed">
          <i class="bi bi-bar-chart"></i><span>Kategori</span>
        </a>
      </li><!-- End Charts Nav -->

      

      <li class="nav-heading">Order</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="/createtransaksipt1">
          <i class="bi bi-person"></i>
          <span>Pembelanjaan</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="/invoice">
          <i class="bi bi-person"></i>
          <span>Invoice</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-heading">Report</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="/laporan">
          <i class="bi bi-person"></i>
          <span>Laporan</span>
        </a>
      </li><!-- End Profile Page Nav -->
      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="/laporantab">
          <i class="bi bi-person"></i>
          <span>Laporan Invoice</span>
        </a>
      </li><!-- End Profile Page Nav --> --}}
      <li class="nav-heading">E Commerce</li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Login </span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="https://siplah.blibli.com/login/merchant" target="_blank" class="nav-link collapsed">
              <i class="bi bi-circle"></i><span>SIPLAH BLIBLI</span>
            </a>
          </li>
          <li>
            <a href="https://siplahtelkom.com/auth/login" target="_blank" class="nav-link collapsed">
              <i class="bi bi-circle"></i><span>SIPLAH TELKOM</span>
            </a>
          </li>
          <li>
            <a href="https://siplahgramedia.id/login" target="_blank" class="nav-link collapsed">
              <i class="bi bi-circle"></i><span>GRAMEDIA</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->
      <li class="nav-heading">Bank</li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Login</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="https://mib.bankmandiri.co.id/sme/common/login.do?action=logoutSME" target="_blank" class="nav-link collapsed">
              <i class="bi bi-circle"></i><span>MANDIRI SIPLAH NET</span>
            </a>
          </li>
          <li>
            <a href="https://mcm2.bankmandiri.co.id/corporate/#!/login" target="_blank" class="nav-link collapsed">
              <i class="bi bi-circle"></i><span>MANDIRI KANAL SHOP</span>
            </a>
          </li>
          <li>
            <a href="https://mcm2.bankmandiri.co.id/corporate/#!/login" target="_blank" class="nav-link collapsed">
              <i class="bi bi-circle"></i><span>MANDIRI SAIN</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-heading">User</li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav1" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Login</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('users.index') }}" class="nav-link collapsed">
              <i class="bi bi-circle"></i><span>User</span>
            </a>
          </li>
          <li>
            <a href="{{ route('roles.index') }}" class="nav-link collapsed">
              <i class="bi bi-circle"></i><span>Role</span>
            </a>
          </li>
          <li>
            <a href="{{ route('products.index') }}"  class="nav-link collapsed">
              <i class="bi bi-circle"></i><span>Produk</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Icons Nav -->

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="https://siplah.blibli.com/login/merchant" target="_blank">
          <i class="bi bi-person"></i>
          <span>SIPLAH BLIBLI</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="https://siplahtelkom.com/auth/login" target="_blank">
          <i class="bi bi-person"></i>
          <span>SIPLAH TELKOM</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="https://siplahgramedia.id/login" target="_blank">
          <i class="bi bi-person"></i>
          <span>GRAMEDIA</span>
        </a>
      </li><!-- End Profile Page Nav -->
      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="https://siplahgramedia.id/login" target="_blank">
          <i class="bi bi-person"></i>
          <span>GRAMEDIA</span>
        </a>
      </li><!-- End Profile Page Nav --> --}}



{{-- 
      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li><!-- End Error 404 Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li><!-- End Blank Page Nav --> --}}

    </ul>

  </aside>