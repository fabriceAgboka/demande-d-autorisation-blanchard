<ul class="menu-inner py-1">
    <li class="menu-header small text-uppercase mb-2 mt-2">
        <span class="menu-header-text">ADMINISTRATION</span>
    </li>
    <li class="{{ url()->current() == route('welcome') ? 'menu-item active' : 'menu-item' }}">
        <a href="{{ route('welcome') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-home"></i>
            <div data-i18n="Dashboard">Dashboard</div>
        </a>
    </li>

    <li class="menu-item">
        <a href="#" class="menu-link">
            <i class="menu-icon tf-icons ti ti-circle"></i>
            <div data-i18n="Demande en attente">Demande en attente</div>
        </a>
    </li>

    <li class="menu-item">
        <a href="#" class="menu-link">
            <i class="menu-icon tf-icons ti ti-circle"></i>
            <div data-i18n="Demande confirmer">Demande confirmer</div>
        </a>
    </li>

    <li class="menu-item">
        <a href="#" class="menu-link">
            <i class="menu-icon tf-icons ti ti-circle"></i>
            <div data-i18n="Demande valider">Demande valider</div>
        </a>
    </li>

    <li class="menu-item">
        <a href="#" class="menu-link">
            <i class="menu-icon tf-icons ti ti-circle"></i>
            <div data-i18n="Demande Rejeter">Demande Rejeter</div>
        </a>
    </li>

    <li class="{{ url()->current() == route('users.index') ? 'menu-item active' : 'menu-item' }}">
        <a href="{{ route('users.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-users"></i>
            <div data-i18n="Administrateurs">Administrateurs</div>
        </a>
    </li>
</ul>
