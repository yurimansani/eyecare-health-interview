<template>
  <v-container>
    <v-data-table-server
      v-model:items-per-page="itemsPerPage"
      :headers="headers"
      :items-length="totalItems"
      :loading="loading"
      :items="patients"
      item-value="id"
      @update:options="loadItems"
      class="elevation-1"
    >
     <template v-slot:top>
      <v-toolbar
        flat
      >
        <v-toolbar-title>Pacientes</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-btn color="blue" :to="{name:'patientCreate'}">Cadastrar Paciente</v-btn>
        
      </v-toolbar>
    </template>

    
      <template v-slot:item="{ item }">
        <tr>
          <td>{{ item.name }}</td>
          <td>{{ item.cpf }}</td>
          <td>{{ item.phone }}</td>
          <td>{{ item.birth_date }}</td>
          <td>
            <v-btn color="blue"><v-icon icon="mdi-pencil"></v-icon></v-btn>
          </td>
        </tr>
      </template> </v-data-table-server
  ></v-container>
</template>
<script>
import axios from "axios";
export default {
  mounted() {},
  methods: {
    loadItems(options) {
      this.loading = true;
      axios
        .get("http://localhost/api/patients", {
          params: {
            per_page: options.itemsPerPage,
            page: options.page,
          },
        })
        .then((response) => {
          this.patients = response.data.data;
          this.totalItems = response.data.total;
          this.loading = false;
        });
    },
  },
  data() {
    return {
      itemsPerPage: 5,
      headers: [
        {
          title: "Nome do Paciente",
          align: "start",
          sortable: false,
          key: "name",
        },
        { title: "CPF", align: "start", key: "cpf", sortable: false },
        { title: "Celular", align: "start", key: "phone", sortable: false },
        {
          title: "Data de Nascimento",
          align: "start",
          key: "birth_date",
          sortable: false,
        },
        { title: "Ações", align: "center", key: "actions", sortable: false },
      ],
      patients: [],
      totalItems: 0,
      loading: true,
    };
  },
};
</script>
