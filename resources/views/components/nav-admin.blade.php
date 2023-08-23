<nav class="bg-red-100 w-full flex flex-row justify-center items-center">
    <ul class="text-red-800 p-3 flex gap-10">
        <li><a href="/home/{{Auth::user()->role_id}}">{{__('navbar.Home')}}</a></li>
        <li><a href="/cart/{{Auth::user()->id}}">{{__('navbar.Cart')}}</a></li>
        <li><a href="/profile/{{Auth::user()->id}}">{{__('navbar.Profile')}}</a></li>
        <li><a href="/account-maintenance">{{__('navbar.AccountMaintenance')}}</a></li>
    </ul>
</nav>
