<template>
  <div class="relative z-10 flex-shrink-0 flex h-16 bg-white shadow">
    <button class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden" @click="main.mobileSidebar = true">
      <span class="sr-only">Open sidebar</span>
      <MenuAlt2Icon class="h-6 w-6" aria-hidden="true" />
    </button>
    <div class="flex-1 px-4 flex justify-between">
      <div class="flex-1 flex items-center">
        &nbsp;
      </div>
      <div class="ml-4 flex items-center md:ml-6">
        <button class="bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <span class="sr-only">View notifications</span>
          <BellIcon class="h-6 w-6" aria-hidden="true" />
        </button>

        <profile-dropdown/>
      </div>
    </div>
  </div>
</template>

<script setup>
  import ProfileDropdown from './profile-dropdown.vue'
  import { BellIcon, MenuAlt2Icon } from '@heroicons/vue/outline'
  import { useMainStore } from 'Store/main'

  const main = useMainStore()
</script>
