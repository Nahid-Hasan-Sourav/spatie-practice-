<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
               
                @hasanyrole('admin|editor')
                {{-- Display this menu for admin and editor --}}
                <li class="mt-5">
                    <a class="{{ Request::is('all-roles') ? 'bg-dark' : '' }}" href="{{ route('all.roles') }}" aria-expanded="false">
                        <span class="hide-menu">Roles</span>
                    </a>
                </li>
            @endhasanyrole
            
            @hasrole('admin')
                {{-- Display this menu for admin only --}}
                <li class="mb-5">
                    <a class="{{ Request::is('all-users') ? 'bg-dark' : '' }}" href="{{ route('all.users') }}" aria-expanded="false">
                        <span class="hide-menu">Users</span>
                    </a>
                </li>
            @endhasrole
            

            


                <li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    
                    <a class="waves-effect waves-dark" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="far fa-circle text-success"></i>
                        <span class="hide-menu">Log Out</span>
                    </a>
                    
                    
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
