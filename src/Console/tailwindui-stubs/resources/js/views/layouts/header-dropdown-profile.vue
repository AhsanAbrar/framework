<template>
  <div class="ml-3 relative">
    <v-dropdown name="profile">
      <template #trigger>
        <div>
          <button type="button" class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="user-menu" aria-expanded="false" aria-haspopup="true">
            <span class="sr-only">Open user menu</span>

            <span class="ml-2">{{ user.name }}</span>
          </button>
        </div>
      </template>

      <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
        <router-link to="/profile" custom v-slot="{ href, navigate }">
          <a
            :href="href"
            @click="navigate"
            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition ease-in-out duration-150"
          >
            {{ $t('Your Profile') }}
          </a>
        </router-link>

        <form method="POST" action="/logout">
          <input type="hidden" name="_token" :value="csrf_token">

          <a
            href="/logout"
            onclick="event.preventDefault(); this.closest('form').submit();"
            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition ease-in-out duration-150" role="menuitem"
          >
            {{ $t('Logout') }}
          </a>
        </form>
      </div>
    </v-dropdown>
  </div>
</template>

<script setup>
  import { VDropdown } from 'laranext'

  const user = Config.user
  const csrf_token = Config.csrf_token
</script>
