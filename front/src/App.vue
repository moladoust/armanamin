<template>
  <search-box @getQuery="resultHandler" />

  <div v-if="data">
    <search-result v-for="item in data" :key="item.id" :title="item.title" :year="item.year" :poster="item.poster" />
  </div>
  <div v-else>
    no result
  </div>
</template>

<script>
import axios from 'axios';

// import HelloWorld from './components/HelloWorld.vue'
import SearchBox from './components/SearchBox.vue';
import SearchResult from './components/SearchResult.vue';

export default {
  name: 'App',
  components: {
    'search-box': SearchBox,
    'search-result': SearchResult,
  },
  data() {
    return {
      data: [],
    }
  },
  methods: {
    async resultHandler(query) {
      const result = await axios.get(`http://localhost:8000/api/load-movies?query=${query}`);
      // const data = result.data.data;
      console.log(result.data);
      this.data = result.data;
    }
  },
  watch: {
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
