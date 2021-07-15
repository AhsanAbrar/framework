<template>
  <nav class="flex-1 px-2 py-4 bg-gray-800 overflow-y-auto sidebar-nav">
    <div class="space-y-1">
      <template v-for="item in items" :key="item.label">
        <router-link
          custom
          :to="item.uri"
          v-slot="{ href, navigate, isActive }"
          v-if="!item.permission || can(item.permission)"
        >
          <a :href="href" @click="navigate" :class="[isActive ? activeClass : defaultClass]">
            <component :is="item.icon" :class="isActive ? 'mr-3 h-6 w-6 text-gray-300' : 'mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-300'"/>
            {{ $t(item.label, item.count) }}

            <span class="ml-auto cursor-pointer w-5 h-5 rounded bg-gray-700 text-white hover:bg-gray-800 group-hover:bg-gray-500 hover:opacity-250 hover:text-gray-300 flex items-center justify-center" @click.prevent="add(item.add)" v-if="item.add && can(item.createPermission)">
              <component is="plus-icon" class="h-3.5 w-3.5"/>
            </span>
          </a>
        </router-link>

        <v-collapsible v-if="item.items">
          <template #trigger="{ open }">
            <span class="w-full group flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:text-white hover:bg-gray-700 cursor-pointer">
              <component :is="item.icon + '-icon'" class="mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-300"/>

              {{ $t(item.label, item.count) }}

              <svg class="ml-auto h-5 w-5 transform group-hover:text-gray-300 transition-colors ease-in-out duration-150" viewBox="0 0 20 20" :class="open ? 'text-gray-400 rotate-90' : 'text-gray-400'" aria-hidden="true">
                <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
              </svg>
            </span>
          </template>

          <div class="space-y-1 mt-1">
            <template v-for="subItem in item.items" :key="subItem.label">
              <router-link
                custom
                :to="subItem.uri"
                v-slot="{ href, navigate, isActive }"
                v-if="!subItem.permission"
              >
                <a :href="href" @click="navigate" :class="[isActive ? 'group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-white rounded-md bg-gray-900' : 'group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:text-white hover:bg-gray-700']">
                  {{ $t(subItem.label, subItem.count) }}

                  <span class="ml-auto cursor-pointer w-5 h-5 rounded bg-gray-700 text-white hover:bg-gray-800 group-hover:bg-gray-500 hover:opacity-250 hover:text-gray-300 flex items-center justify-center" @click.prevent="add(subItem.add)" v-if="subItem.add && can(subItem.createPermission)">
                    <component is="svg-plus" class="h-4 w-4"/>
                  </span>
                </a>
              </router-link>
            </template>
          </div>
        </v-collapsible>
      </template>
    </div>
  </nav>
</template>

<script>
  import { VCollapsible } from 'laranext'
  import { sidebarNavItems } from 'Use/sidebar-nav'
  import { PlusIcon } from '@heroicons/vue/outline'

  export default {
    components: {
      VCollapsible,
      PlusIcon,
    },

    setup() {
      return {
        items: sidebarNavItems,
        defaultClass: 'group flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:text-white hover:bg-gray-700',
        activeClass: 'flex items-center px-2 py-2 text-sm font-medium text-white rounded-md bg-gray-900',
      }
    }
  }
</script>
