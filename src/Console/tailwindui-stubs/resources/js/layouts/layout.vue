<template>
  <div class="h-screen flex overflow-hidden bg-gray-100">
    <layout-sidebar-mobile/>

    <layout-sidebar/>

    <div class="flex flex-col w-0 flex-1 overflow-hidden">
      <layout-header/>

      <main class="flex-1 relative overflow-y-auto focus:outline-none">
        <div class="main-wrap pt-2 pb-6 md:py-6">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <router-view/>
          </div>
        </div>
      </main>
    </div>
  </div>
</template>

<script setup>
  import LayoutHeader from './header.vue'
  import LayoutSidebar from './sidebar.vue'
  import LayoutSidebarMobile from './sidebar-mobile.vue'
</script>
