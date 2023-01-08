   <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column list-group">
            <li class="nav-item list-group-item">
              <a class="nav-link  {{Request::is('project*') ? 'active' :''}}" aria-current="page" href="/project">
                <span data-feather="server" class="align-text-bottom"></span>
                PROJECT MONITORING
              </a>
            </li>
            <li class="nav-item list-group-item">
              <a class="nav-link  {{Request::is('leader*') ? 'active' :''}}" aria-current="page" href="/leader">
                <span data-feather="users" class="align-text-bottom"></span>
                LEADER
              </a>
            </li>
            <li class="nav-item list-group-item">
              <a class="nav-link  {{Request::is('client*') ? 'active' :''}}" aria-current="page" href="/client">
                <span data-feather="user" class="align-text-bottom"></span>
                CLIENT
              </a>
            </li>
          </ul>
        </div>
      </nav>