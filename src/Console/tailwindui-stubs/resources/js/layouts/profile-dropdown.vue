<template>
  <Menu as="div" class="ml-3 relative">
    <div>
      <MenuButton class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        <span class="sr-only">Open user menu</span>

        <img class="h-8 w-8 rounded-full" :src="user.avatar" v-if="user.avatar">

        <span class="inline-block h-8 w-8 rounded-full overflow-hidden bg-gray-200" v-else>
          <svg class="h-full w-full text-gray-400" fill="currentColor" viewBox="0 0 24 24">
            <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
          </svg>
        </span>

        <span class="ml-2">{{ user.name }}</span>
      </MenuButton>
    </div>
    <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
      <MenuItems class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
        <router-link to="/profile" custom v-slot="{ href, navigate }">
          <a
            :href="href"
            @click="navigate"
            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition ease-in-out duration-150"
          >
            {{ $t('Your Profile') }}
          </a>
        </router-link>

        <MenuItem>
          <form method="POST" action="/logout">
            <input type="hidden" name="_token" :value="csrf_token">

            <a
              href="/logout"
              onclick="event.preventDefault(); this.closest('form').submit();"
              class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition ease-in-out duration-150"
            >
              {{ $t('Logout') }}
            </a>
          </form>
        </MenuItem>
      </MenuItems>
    </transition>
  </Menu>
</template>

<script setup>
  import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'

  const user = Config.user
  const csrf_token = Config.csrf_token
</script>
