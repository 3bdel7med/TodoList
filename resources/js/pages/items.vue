<template>
    <div>
      <ul>
        <li v-for="item in data" :key="item.id">{{ item.name }}</li>
      </ul>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        data: []
      };
    },
    mounted() {
      this.fetchData();
    },
    methods: {
      fetchData() {
        axios.get('/api/items')
          .then(response => {
            this.data = response.data.data;
          })
          .catch(error => {
            console.error(error);
          });
      }
    }
  }
  </script>