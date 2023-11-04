<template>
    <div>
      <v-navigation-drawer
        expand-on-hover
        rail
        disable-resize-watcher
      >

        <v-divider></v-divider>
        <v-list density="compact" nav>
          <v-list-item prepend-icon="mdi-folder" title="Pacientes" value="patients"  :to="{name:'patientIndex'}"></v-list-item>
        </v-list>
      </v-navigation-drawer>

    </div>
</template>
