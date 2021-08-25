<nav class="sidebar-nav">
    <ul id="sidebarnav">
        <li class="{{request()->is('organizations') || request()->is('organizations/create') ? 'active':''}}">
            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                    class="fas fa-home"></i><span class="hide-menu"> Organizations </span></a>
            <ul aria-expanded="false" class="collapse">
                <li>
                    <a class="{{request()->is('organizations') ? 'active':''}}"
                       href="{{route('organizations.index')}}">Index</a>
                </li>
                <li>
                    <a class="{{request()->is('admin-conferences') ? 'active':''}}"
                       href="{{route('organizations.create')}}">Create</a>
                </li>
            </ul>
        </li>
        <li class="nav-devider"></li>
        <li class="{{request()->is('contacts') || request()->is('contacts/create') ? 'active':''}}">
            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                    class="mdi mdi-account"></i><span class="hide-menu"> Contacts </span></a>
            <ul aria-expanded="false" class="collapse">
                <li>
                    <a class="{{request()->is('contacts') ? 'active':''}}"
                       href="{{route('contacts.index')}}">Index</a>
                </li>
                <li>
                    <a class="{{request()->is('contacts/crate') ? 'active':''}}"
                       href="{{route('contacts.create')}}">Create</a>
                </li>
            </ul>
        </li>
        <li class="nav-devider"></li>
    </ul>
</nav>
