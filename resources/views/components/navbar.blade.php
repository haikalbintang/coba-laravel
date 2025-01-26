<nav class="bg-red-500 flex rounded-b-lg">

    <div class="flex w-full justify-between">
      <ul class="flex space-x-4 p-3 text-white font-medium text-base items-center">
        <li class="flex items-center cursor-pointer {{ request()->is('/') ? 'bg-white rounded-full bg-opacity-25' : '' }}">
          <a href="/"><x-navbar.home-icon :color="request()->is('/') ? '#9333ea' : '#fff'" /></a>
        </li>
        <li class="flex items-center"><a class="{{ request()->routeIs('products.index') || request()->routeIs('products.show') ? 'bg-purple-600 border-2 border-white' : 'bg-red-600 hover:bg-red-700' }} px-3 py-1 rounded-md" href="/products">Barang</a></li>
        <li class="flex items-center"><a class="{{ request()->routeIs('profile.index') || request()->routeIs('profile.show') ? 'bg-purple-600 border-2 border-white' : 'bg-red-600 hover:bg-red-700' }} px-3 py-1 rounded-md" href="/profiles">Users</a></li>
        <li class="flex items-center"><a class="{{ request()->is('about') ? 'bg-purple-600 border-2 border-white' : 'bg-red-600 hover:bg-red-700' }} px-3 py-1 rounded-md" href="/welcome">Help</a></li>
        <li class="flex items-center"><a class="{{ request()->is('contact') ? 'bg-purple-600 border-2 border-white' : 'bg-red-600 hover:bg-red-700' }} px-3 py-1 rounded-md" href="/contact">Kontak</a></li>
        <li class="flex items-center"><a class="{{ request()->is('products/create') ? 'bg-purple-600 border-2 border-white' : 'bg-red-600 hover:bg-red-700' }} px-3 py-1 rounded-md border-2 border-green-400 flex ml-[70px]" href="/products/create">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="3" y="6" width="18" height="12" rx="2" stroke="{{ request()->is('products/create') ? '#fff' : '#4ade80' }}" stroke-width="2"/>
            <path d="M6 9H8" stroke="{{ request()->is('products/create') ? '#fff' : '#4ade80' }}" stroke-width="2" stroke-linecap="round"/>
            <path d="M16 15H18" stroke="{{ request()->is('products/create') ? '#fff' : '#4ade80' }}" stroke-width="2" stroke-linecap="round"/>
            <circle cx="12" cy="12" r="2" stroke="{{ request()->is('products/create') ? '#fff' : '#4ade80' }}" stroke-width="2"/>
            </svg>
            <span class="text-white ml-1.5">Jual</span></a></li>
        <li class="flex items-center"><a class="{{ request()->is('chirps') ? 'bg-purple-500 border-2 border-white' : 'bg-red-600 hover:bg-red-700  border-yellow-400' }} px-3 py-1 rounded-md border-2 flex" href="/chirps">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="12" cy="8" r="3" stroke="{{ request()->is('chirps') ? '#fff' : '#facc15'}}" stroke-width="2" stroke-linecap="round"/>
            <path d="M15.2679 8C15.5332 7.54063 15.97 7.20543 16.4824 7.06815C16.9947 6.93086 17.5406 7.00273 18 7.26795C18.4594 7.53317 18.7946 7.97 18.9319 8.48236C19.0691 8.99472 18.9973 9.54063 18.7321 10C18.4668 10.4594 18.03 10.7946 17.5176 10.9319C17.0053 11.0691 16.4594 10.9973 16 10.7321C15.5406 10.4668 15.2054 10.03 15.0681 9.51764C14.9309 9.00528 15.0027 8.45937 15.2679 8L15.2679 8Z" stroke="{{ request()->is('chirps') ? '#fff' : '#facc15'}}" stroke-width="2"/>
            <path d="M5.26795 8C5.53317 7.54063 5.97 7.20543 6.48236 7.06815C6.99472 6.93086 7.54063 7.00273 8 7.26795C8.45937 7.53317 8.79457 7.97 8.93185 8.48236C9.06914 8.99472 8.99727 9.54063 8.73205 10C8.46683 10.4594 8.03 10.7946 7.51764 10.9319C7.00528 11.0691 6.45937 10.9973 6 10.7321C5.54063 10.4668 5.20543 10.03 5.06815 9.51764C4.93086 9.00528 5.00273 8.45937 5.26795 8L5.26795 8Z" stroke="{{ request()->is('chirps') ? '#fff' : '#facc15'}}" stroke-width="2"/>
            <path d="M16.8816 18L15.9013 18.1974L16.0629 19H16.8816V18ZM20.7202 16.9042L21.6627 16.5699L20.7202 16.9042ZM14.7808 14.7105L14.176 13.9142L13.0194 14.7927L14.2527 15.5597L14.7808 14.7105ZM19.8672 17H16.8816V19H19.8672V17ZM19.7777 17.2384C19.7707 17.2186 19.7642 17.181 19.7725 17.1354C19.7804 17.0921 19.7982 17.0593 19.8151 17.0383C19.8474 16.9982 19.874 17 19.8672 17V19C21.0132 19 22.1414 17.9194 21.6627 16.5699L19.7777 17.2384ZM17 15C18.6416 15 19.4027 16.1811 19.7777 17.2384L21.6627 16.5699C21.1976 15.2588 19.9485 13 17 13V15ZM15.3857 15.5069C15.7702 15.2148 16.282 15 17 15V13C15.8381 13 14.9028 13.3622 14.176 13.9142L15.3857 15.5069ZM14.2527 15.5597C15.2918 16.206 15.7271 17.3324 15.9013 18.1974L17.8619 17.8026C17.644 16.7204 17.0374 14.9364 15.309 13.8614L14.2527 15.5597Z" fill="{{ request()->is('chirps') ? '#fff' : '#facc15'}}"/>
            <path d="M9.21918 14.7105L9.7473 15.5597L10.9806 14.7927L9.82403 13.9142L9.21918 14.7105ZM3.2798 16.9041L4.22227 17.2384L4.22227 17.2384L3.2798 16.9041ZM7.11835 18V19H7.93703L8.09867 18.1974L7.11835 18ZM7.00001 15C7.71803 15 8.22986 15.2148 8.61433 15.5069L9.82403 13.9142C9.09723 13.3621 8.1619 13 7.00001 13V15ZM4.22227 17.2384C4.59732 16.1811 5.35842 15 7.00001 15V13C4.0515 13 2.80238 15.2587 2.33733 16.5699L4.22227 17.2384ZM4.13278 17C4.126 17 4.15264 16.9982 4.18486 17.0383C4.20176 17.0593 4.21961 17.0921 4.22748 17.1354C4.2358 17.181 4.22931 17.2186 4.22227 17.2384L2.33733 16.5699C1.85864 17.9194 2.98677 19 4.13278 19V17ZM7.11835 17H4.13278V19H7.11835V17ZM8.09867 18.1974C8.27289 17.3324 8.70814 16.206 9.7473 15.5597L8.69106 13.8614C6.96257 14.9363 6.356 16.7203 6.13804 17.8026L8.09867 18.1974Z" fill="{{ request()->is('chirps') ? '#fff' : '#facc15'}}"/>
            <path d="M12 14C15.5715 14 16.5919 16.5512 16.8834 18.0089C16.9917 18.5504 16.5523 19 16 19H8C7.44772 19 7.00829 18.5504 7.11659 18.0089C7.4081 16.5512 8.42846 14 12 14Z" stroke="{{ request()->is('chirps') ? '#fff' : '#facc15'}}" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <span class="ml-1.5 text-white">Hub</span></a></li>
      </ul>
      <div class="flex space-x-4 p-3 text-white font-medium items-center">
        @guest
        <a href="{{ route('login') }}" class="rounded-md px-3 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
          Log in
        </a>
        <a href="{{ route('register') }}" class="rounded-md px-3 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
          Register
        </a>
        @endguest
        @auth
          <div x-data="{ open: false }" class="relative">
            <img @click="open = !open" class="w-10 h-10 p-0.5 bg-white rounded-full cursor-pointer" src="https://picsum.photos/180/180/?random={{ Auth::user()->id }}" alt="">
            <div x-show="open" class="absolute -right-3 top-14 bg-red-500 p-2 space-y-3 rounded-lg">
              <a href="{{ route('profile.show', Auth::user()) }}" class="rounded-md px-3 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white" >Profile</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button class="rounded-md px-3 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white" type="submit">Logout</button>
              </form>
            </div>
          </div>
        @endauth
      </div>
    </div>
  </nav>