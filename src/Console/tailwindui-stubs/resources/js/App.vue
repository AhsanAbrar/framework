<template>
  <Layout v-if="main.layout"/>

  <router-view v-else/>
</template>

<script setup>
  import Layout from 'Layout/layout.vue'
  import { useMainStore } from 'Store/main'

  const main = useMainStore()
</script>
