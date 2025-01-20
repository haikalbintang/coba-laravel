<nav class="bg-red-500 flex rounded-b-lg">

    <div class="flex w-full justify-between">
      <ul class="flex space-x-4 p-3 text-white font-medium text-base items-center">
        <li class="bg-red-600 px-3 py-1 rounded-md"><a href="/">Home</a></li>
        <li class="bg-red-600 px-3 py-1 rounded-md"><a href="">Detail</a></li>
        <li class="bg-red-600 px-3 py-1 rounded-md"><a href="/about">About</a></li>
        <li class="bg-red-600 px-3 py-1 rounded-md"><a href="/contact">Contact</a></li>
        <li class="bg-red-600 px-3 py-1 rounded-md"><a href="/products/create">Jual</a></li>
        <li class="bg-red-600 px-3 py-1 rounded-md"><a href="/chirps">Hub</a></li>
      </ul>
      <div class="flex space-x-4 p-3 text-white font-medium items-center">
        <a href="{{ route('login') }}" class="rounded-md px-3 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
          Log in
        </a>
        <a href="{{ route('register') }}" class="rounded-md px-3 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
          Register
        </a>
      </div>
    </div>
  </nav>