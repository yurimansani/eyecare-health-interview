<template>
  <DefaultTemplate />
</template>

<script setup>
import DefaultTemplate from "./layouts/default/DefaultLayout.vue";
</script>
<script>
import axios from 'axios';
export default {
  mounted() {
    this.getCSRFToken();
  },
  methods: {
    getCSRFToken() {
      return axios
        .get("http://localhost/api/token")
        .then((response) => {
          axios.defaults.headers.common["x-csrftoken"] =
            response.data.csrf_token;
        })
        .catch((error) => {
          return Promise.reject(error.response.data);
        });
    },
  },
};
</script>
