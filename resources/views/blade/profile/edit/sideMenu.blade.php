<ul>
    <li class="{{ (request()->is('profile-edit')) ? 'active' : '' }}">
        <a href="{{ route('profile.edit') }}">Profile</a>
    </li>
    <li class="{{ (request()->is('customization')) ? 'active' : '' }}">
        <a href="{{ route('customization.edit') }}"">Customization</a>
    </li>
    <li class="{{ (request()->is('account')) ? 'active' : '' }}">
        <a href="{{ route('account.edit') }}"">Account</a>
    </li>
</ul>
