<template>
  <form @submit.prevent="searchHandler">
    <input v-model="query" />
    <button type="submit">Search</button>
  </form>
</template>

<script>

export default {
  name: 'SearchBox',
  props: {
  },
  data() {
    return {
      query: '',
    }
  },
  methods: {
    searchHandler() {
      this.$emit('get-query', this.query)
    }
  },
  emits: ['get-query']
}
</script>