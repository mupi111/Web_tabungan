<li class="nav-item">
    <a href="{{ route('nasabahs.index') }}"
       class="nav-link {{ Request::is('nasabahs*') ? 'active' : '' }}">
        <p>Nasabahs</p>
    </a>
</li>



<li class="nav-item">
    <a href="{{ route('tabungans.index') }}"
       class="nav-link {{ Request::is('tabungans*') ? 'active' : '' }}">
        <p>Tabungans</p>
    </a>
</li>


