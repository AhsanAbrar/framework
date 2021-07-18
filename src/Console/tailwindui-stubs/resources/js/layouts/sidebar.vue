<template>
  <div class="hidden md:flex md:flex-shrink-0">
    <div class="flex flex-col w-64">
      <!-- Sidebar component, swap this element with another sidebar if you like -->
      <div class="flex flex-col h-0 flex-1">
        <router-link to="/" custom v-slot="{ href, navigate }">
          <a :href="href" @click="navigate" class="flex items-center h-16 flex-shrink-0 px-4 bg-gray-900">
            <sidebar-logo/>
          </a>
        </router-link>

        <div class="flex-1 flex flex-col overflow-y-auto">
          <sidebar-nav/>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
  import SidebarNav from './sidebar-nav.vue'
  import SidebarLogo from './sidebar-logo.vue'
</script>
