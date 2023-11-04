<template>
  <v-layout class="rounded rounded-md">

    <v-app-bar short app>
      <!-- <v-app-bar-nav-icon @click.stop="drawer = !drawer" ></v-app-bar-nav-icon> -->
      <v-toolbar-title :to="{name:'home'}" >Eyecare</v-toolbar-title>
    </v-app-bar>
    <!-- <v-app-bar title="Eyecare"></v-app-bar> -->
    <SideBar/>


    <v-main
      class="d-flex align-center justify-center"
    >
    <v-container>
      <router-view />
    </v-container>
    </v-main>
  </v-layout>
</template>

<script setup>
    import SideBar from './SideBar.vue';
</script>
